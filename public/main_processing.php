<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Processing</title>
</head>
<body>

</body>
</html>

<?php
    // start a PHP session to share data
    session_start();
?>

<?php
    //  Include PHPExcel_IOFactory
    include '../includes/PHPExcel/Classes/PHPExcel.php';

    $inputFileName = 'data/wd1/test_data.xlsx';

    //  Read your Excel workbook
    try {
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": '.$e->getMessage());
    }

    //  Get worksheet dimensions
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();    // returns a char

    // test - the number of rows and columns that need to be used
    echo "The number of rows in the excel sheet is: " . $highestRow  . "<br />";
    echo "The number of columns in the excel sheet is: " . $highestColumn  . "<br />";
    $rowCount = $highestRow - 2;
    $colCount = PHPExcel_Cell::columnIndexFromString($highestColumn);
    echo "The number of rows in the excel sheet to be considered: " . $rowCount . "<br />";
    echo "The number of columns in the excel sheet to be considered: " . $colCount . "<br />";

    // Get the column number ,i.e., convert the char to an int
    $colNumber = PHPExcel_Cell::columnIndexFromString($highestColumn);

    // Generate the final assoc array with the FPKM data
    // store all the keys in this array
    $keySet = [];
    $keys = [];

    // contains all the individual gene FPKM data (expression levels)
    $finalSet = [];
    $keys_string = null;    // store the keys as a string
    $exp_vals = [];   // store the expression levels for all 18 genes
    $gene_name_array = [];  // array for storing all the specified gene names

    for ($row = 2; $row <= $highestRow; $row++){
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        // print the entire data in excel sheet
        echo "<pre>";
            print_r($rowData[0]);
        echo "</pre>";

        if($row == 2) {
            $keySet = $rowData[0];
        }
    }

    for ($row = 3; $row <= $highestRow; $row++){
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        echo "<pre>";
            print_r($rowData[0]);
        echo "</pre>";

        $finalSet[] = $rowData[0];

        $i = 0;
        if ($row == $highestRow) {
            while ($i <= $row) {
                $gene_name_array[] = $finalSet[$i][0];

                $i++;
            }
        }
    }

    // generate a key string which is delimited by "|" operator
    foreach ($keySet as $key => $value) {
        $keys_string .= $value . " | ";
    }

    echo "<hr />";

    // generate a string which has expression level values delimited by "|" operator
    for ($i = 0; $i < 18; $i++) {
        foreach ($finalSet[$i] as $key => $value) {
            $exp_vals[$i] .= $value . " | ";
        }
    }

    echo "<hr />";

    $gene_name_array = array_filter($gene_name_array);
    $_SESSION['GENE_NAMES'] = $gene_name_array;

    // display all the gene names in the set
    echo "Gene Names:<br />";
    echo "<pre>";
    print_r($gene_name_array);
    echo "</pre>";

    echo "<hr />";
    echo "<pre>";
        echo "<p>Displaying keySet content:</p><br>";
        print_r($keySet);
    echo "<pre>";

    echo "<hr />";
    echo "<pre>";
        echo "<p>Displaying finalSet content:</p><br>";
        print_r($finalSet);
    echo "<pre>";

    echo "<hr />";
    echo "<pre>";
        echo "<p>Displaying Keys:</p><br>";
        echo $keys_string;
    echo "<pre>";

    echo "<hr />";
    echo "<pre>";
        echo "<p>Displaying all gene expression levels:</p><br>";
        for ($i = 0; $i < 18; $i++) {
            print_r($exp_vals[$i]);
            echo "<br>";
        }
    echo "<pre>";

    $split_arr = [];

    for ($i = 0; $i < 18; $i++) {
        $split_arr[$i] = split(" | ", $exp_vals[$i], 3);
    }

    echo "<hr />";
    echo "<pre>";
    echo "<p>Displaying split array values:</p><br>";
    for ($i = 0; $i < 18; $i++) {
        print_r($split_arr[$i]);
        echo "<hr />";
    }
    echo "<pre>";

    $split_arr_keys = split(" | ", $keys_string, 3);

    echo "<hr />";
    echo "<pre>";
    echo "<p>Displaying split key values:</p><br>";
    print_r($split_arr_keys);
    echo "<br>";
    echo $split_arr_keys[2];
    echo "<pre>";

    echo "<hr />";
?>

<!-- MongoDB part begins here -->

<?php
    // connect to mongodb
    $m = new MongoClient();
    echo "Connection to the Mongo database was created successfully!<br>";

    // select a database
    $db = $m->test;
    echo "The Database test was selected<br>";

    // create a new collection
    $collection = $db->createCollection("newcoll");
    echo "Collection newcoll was created successfully!<br>";

    echo "<hr />";

    $document = [];

    for ($i = 0; $i < 18; $i++) {
        $document[$i] = array(
            "gene_name" => $finalSet[$i][0],
            "cell_type" => $split_arr_keys[2],
            "expression_level" => $split_arr[$i]
        );
    }

    for ($i = 0; $i < 18; $i++) {
        $collection->insert($document[$i]);
        echo "Document " . $i . " was inserted successfully!<br>";
    }

    echo "<hr />";

    $cursor = $collection->find();

    // iterate cursor to display title of documents
    foreach ($cursor as $document) {
        // echo $document["gene_name"] . "<br>";
        // echo $document["cell_type"] . "<br>";
        // echo $document["expression_level"] . "<br>";
        foreach ($document as $key => $value) {
                if (gettype($value) == "string")
                    echo $value;
                elseif (gettype($value) == "array") {
                    print_r($value[2]);
                }
                echo "<br>";
            }
        echo "<hr />";
    }

    $pta = [];
    $pta_assoc = []; // create an array for Peri Tumor Astrocytes

    $temp_string = null;

    // custom query for Peri Tumor Astrocytes
    foreach ($cursor as $document) {
        foreach ($document as $key => $value) {
            if (gettype($value) == "array") {
                print_r($value[2]);

            $pta = split(" | ", $value[2]);
            print_r(array_slice($pta, 0, 7));
            echo "<br>";

            $temp_string = implode(array_slice($pta, 0 , 7));
            echo $temp_string . "<br>";
            $pta_assoc[] = $temp_string;
            }
            echo "<br>";
        }
    echo "<hr />";
    }

    $_SESSION['PTA'] = $pta_assoc;
    print_r($pta_assoc);

?>
