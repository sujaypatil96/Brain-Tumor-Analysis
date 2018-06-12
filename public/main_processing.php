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

    // stop notices from being displayed
    error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
?>

<?php
    //  Include PHPExcel_IOFactory
    include '../includes/PHPExcel/Classes/PHPExcel.php';

    $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
    $cacheSettings = array(' memoryCacheSize ' => '8MB');
    PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

    $inputFileName = 'data/wd1/hn.xlsx';

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
    // echo "The number of rows in the excel sheet is: " . $highestRow  . "<br />";
    // echo "The number of columns in the excel sheet is: " . $highestColumn  . "<br />";
    $rowCount = $highestRow - 2;
    $colCount = PHPExcel_Cell::columnIndexFromString($highestColumn);
    // echo "The number of rows in the excel sheet to be considered: " . $rowCount . "<br />";
    // echo "The number of columns in the excel sheet to be considered: " . $colCount . "<br />";

    // Get the column number ,i.e., convert the char to an int
    $colNumber = PHPExcel_Cell::columnIndexFromString($highestColumn);

    // Generate the final assoc array with the FPKM data
    // store all the keys in this array
    $keySet = [];
    $keys = [];

    // contains all the individual gene FPKM data (expression levels)
    $finalSet = [];
    $keys_string = null;    // store the keys as a string
    $exp_vals = [];   // store the expression levels for all 15042 genes
    $gene_name_array = [];  // array for storing all the specified gene names

    for ($row = 2; $row <= $highestRow; $row++){
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        // print the entire data in excel sheet
        // echo "<pre>";
        //     print_r($rowData[0]);
        // echo "</pre>";

        if($row == 2) {
            $keySet = $rowData[0];
        }
    }

    for ($row = 3; $row <= $highestRow; $row++){
        //  Read a row of data into an array
        $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

        // echo "<pre>";
        //     print_r($rowData[0]);
        // echo "</pre>";

        $finalSet[] = $rowData[0];

        if ($row == $highestRow) {
            $i = 0;
            while ($i <= $row) {
                if (isset($finalSet[$i][0])) {
                    $gene_name_array[$i] = $finalSet[$i][0];
                }

                $i++;
            }
        }
    }

    // generate a key string which is delimited by "|" operator
    // foreach ($keySet as $key => $value) {
    //     $keys_string .= $value . " | ";
    // }
    $keys_string = implode(" | ", $keySet);

    // echo "<pre>";
    //     print_r($finalSet);
    // echo "</pre>";
    //
    // echo "<hr />";

    // generate a string which has expression level values delimited by "|" operator
    // for ($i = 0; $i < 15042; $i++) {
    //     foreach ($finalSet[$i] as $key => $value) {
    //         $exp_vals[$i] .= $value . " | ";
    //     }
    // }

    // generate a string which has expression level values delimited by "|" operator
    for ($i = 0; $i < 15041; $i++) {
        $exp_vals[$i] = implode(" | ", $finalSet[$i]);
    }

    // echo "<pre>";
    // print_r($exp_vals);
    // echo "</pre>";
    //
    // echo "<hr />";

    $gene_name_array = array_filter($gene_name_array);
    $_SESSION['GENE_NAMES'] = $gene_name_array;

    // display all the gene names in the set
    // echo "Gene Names:<br />";
    // echo "<pre>";
    // print_r($gene_name_array);
    // echo "</pre>";
    //
    // echo "<hr />";
    // echo "<pre>";
    //     echo "<p>Displaying keySet content:</p><br>";
    //     print_r($keySet);
    // echo "<pre>";
    //
    // echo "<hr />";
    // echo "<pre>";
    //     echo "<p>Displaying finalSet content:</p><br>";
    //     print_r($finalSet);
    // echo "<pre>";
    //
    // echo "<hr />";
    // echo "<pre>";
    //     echo "<p>Displaying Keys:</p><br>";
    //     echo $keys_string;
    // echo "<pre>";
    //
    // echo "<hr />";
    // echo "<pre>";
    //     echo "<p>Displaying all gene expression levels:</p><br>";
    //     for ($i = 0; $i < 15042; $i++) {
    //         print_r($exp_vals[$i]);
    //         echo "<br>";
    //     }
    // echo "<pre>";

    $split_arr = [];

    for ($i = 0; $i < 15042; $i++) {
        $split_arr[$i] = split(" | ", $exp_vals[$i], 3);
    }

    // echo "<hr />";
    // echo "<pre>";
    // echo "<p>Displaying split array values:</p><br>";
    // for ($i = 0; $i < 15042; $i++) {
    //     print_r($split_arr[$i]);
    //     echo "<hr />";
    // }
    // echo "<pre>";

    $split_arr_keys = split(" | ", $keys_string, 3);

    // echo "<hr />";
    // echo "<pre>";
    // echo "<p>Displaying split key values:</p><br>";
    // print_r($split_arr_keys);
    // echo "<br>";
    // echo $split_arr_keys[2];
    // echo "<pre>";
    //
    // echo "<hr />";
?>

<!-- MongoDB part begins here -->

<?php

    // Insertion Script
    // connect to mongodb
    $m = new MongoClient();
    // echo "Connection to the Mongo database was created successfully!<br>";

    // select a database
    $db = $m->test;
    // echo "The Database test was selected<br>";

    // Retreival Script
    // Select a collection from a group of collections in Mongo
    $collection = $db->selectCollection("newcoll");

    // Human part of Barres
    $pta_query = array('cell_type' => 'Peri Tumor Astrocytes');
    $hsha_query = array('cell_type' => 'Human Sclerotic Hippocampi Astrocytes');
    $hfa_query = array('cell_type' => 'Human Fetal Astrocytes');
    $hma_query = array('cell_type' => 'Human Mature Astrocytes');
    $hn_query = array('cell_type' => 'Human Neurons');
    $ho_query = array('cell_type' => 'Human Oligodendrocytes');
    $hm_query = array('cell_type' => 'Human Microglia');
    $he_query = array('cell_type' => 'Human Endothelial');
    $hwc_query = array('cell_type' => 'Human Whole Cortex');

    // Mouse part of Barres
    $mn_query = array('cell_type' => 'Mouse Neurons');
    $maf_query = array('cell_type' => 'Mouse Astrocytes - FACS');
    $mai_query = array('cell_type' => 'Mouse Astrocytes - Immunopanned');
    $mo_query = array('cell_type' => 'Mouse Oligodendrocytes');
    $me_query = array('cell_type' => 'Mouse Endothelial');
    $mm_query = array('cell_type' => 'Mouse Microglia');
    $mwb_query = array('cell_type' => 'Mouse Whole Brain');
    $mma_query = array('cell_type' => 'Mouse Mature Astrocytes');


    // cursors for barres
    $cursor_pta = $collection->find($pta_query);
    $cursor_hsha = $collection->find($hsha_query);
    $cursor_hfa = $collection->find($hfa_query);
    $cursor_hma = $collection->find($hma_query);
    $cursor_hn = $collection->find($hn_query);
    $cursor_ho = $collection->find($ho_query);
    $cursor_hm = $collection->find($hm_query);
    $cursor_he = $collection->find($he_query);
    $cursor_hwc = $collection->find($hwc_query);

    $cursor_mn = $collection->find($mn_query);
    $cursor_maf = $collection->find($maf_query);
    $cursor_mai = $collection->find($mai_query);
    $cursor_mo = $collection->find($mo_query);
    $cursor_me = $collection->find($me_query);
    $cursor_mm = $collection->find($mm_query);
    $cursor_mwb = $collection->find($mwb_query);
    $cursor_mma = $collection->find($mma_query);

    // sample arrays
    $pta = []; // create an array for Peri Tumor Astrocytes
    $hsha = []; // create an array for Human Sclerotic Hippocampi Astrocytes
    $hfa = []; // create an array for Human Fetal Astrocytes
    $hma = []; // create an array for Human Mature Astrocytes
    $hn = []; // create an array for Human Neurons
    $ho = []; // create an array for Human Oligodendrocytes
    $hm = []; // create an array for Human Microglia
    $he = []; // create an array for Human Endothelial
    $hwc = []; // create an array for Human Whole Cortex

    $mn = []; // create an array for Mouse Neurons
    $maf = []; // create an array for Mouse Astrocytes - FACS
    $mai = []; // create an array for Mouse Astrocytes - Immunopanned
    $mo = []; // create an array for Mouse Oligodendrocytes
    $me = []; // create an array for Mouse Endothelial
    $mm = []; // create an array for Mouse Microglia
    $mwb = []; // create an array for Mouse Whole Brain
    $mma = []; // create an array for Mouse Mature Astrocytes

    // custom query for Peri Tumor Astrocytes
    foreach ($cursor_pta as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $pta[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for PTA<br>";
    echo "<pre>";
        print_r($pta);
    echo "</pre>";

    // custom query for Human Sclerotic Hippocampi Astrocytes
    foreach ($cursor_hsha as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hsha[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HSHA<br>";
    echo "<pre>";
        print_r($hsha);
    echo "</pre>";

    // custom query for Human Fetal Astrocytes
    foreach ($cursor_hfa as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hfa[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HFA<br>";
    echo "<pre>";
        print_r($hfa);
    echo "</pre>";

    // custom query for Human Mature Astrocytes
    foreach ($cursor_hma as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hma[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HMA<br>";
    echo "<pre>";
        print_r($hma);
    echo "</pre>";

    // custom query for Human Neurons
    foreach ($cursor_hn as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hn[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HN<br>";
    echo "<pre>";
        print_r($hn);
    echo "</pre>";

    // custom query for Human Oligodendrocytes
    foreach ($cursor_ho as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $ho[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HO<br>";
    echo "<pre>";
        print_r($ho);
    echo "</pre>";

    // custom query for Human Microglia
    foreach ($cursor_hm as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hm[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($hm);
    echo "</pre>";

    // custom query for Human Endothelial
    foreach ($cursor_he as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $he[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($he);
    echo "</pre>";

    // custom query for Human Whole Cortex
    foreach ($cursor_hwc as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $hwc[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($hwc);
    echo "</pre>";

    // custom query for Mouse Neurons
    foreach ($cursor_mn as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mn[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mn);
    echo "</pre>";

    // custom query for Mouse Astrocytes - FACS
    foreach ($cursor_maf as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $maf[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($maf);
    echo "</pre>";

    // custom query for Mouse Astrocytes - Immunopanned
    foreach ($cursor_mai as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mai[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mai);
    echo "</pre>";

    // custom query for Mouse Oligodendrocytes
    foreach ($cursor_mo as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mo[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mo);
    echo "</pre>";

    // custom query for Mouse Endothelial
    foreach ($cursor_me as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $me[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($me);
    echo "</pre>";

    // custom query for Mouse Microglia
    foreach ($cursor_mm as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mm[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mm);
    echo "</pre>";

    // custom query for Mouse Whole Brain
    foreach ($cursor_mwb as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mwb[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mwb);
    echo "</pre>";

    // custom query for Mouse Mature Astrocytes
    foreach ($cursor_mma as $document) {
        foreach ($document as $key => $value) {
            echo $value . "<br>";
        }
        echo "<hr />";
        $mma[] = $document["expression_level"];
    }
    echo "<hr />";

    echo "Printing Expression Values for HM<br>";
    echo "<pre>";
        print_r($mma);
    echo "</pre>";

    $_SESSION['PTA'] = $pta;

    $_SESSION['HSHA'] = $hsha;

    $_SESSION['HFA'] = $hfa;

    $_SESSION['HMA'] = $hma;

    $_SESSION['HN'] = $hn;

    $_SESSION['HO'] = $ho;

    $_SESSION['HM'] = $hm;

    $_SESSION['HE'] = $he;

    $_SESSION['HWC'] = $hwc;

    $_SESSION['MN'] = $mn;

    $_SESSION['MAF'] = $maf;

    $_SESSION['MAI'] = $mai;

    $_SESSION['MO'] = $mo;

    $_SESSION['ME'] = $me;

    $_SESSION['MM'] = $mm;

    $_SESSION['MWB'] = $mwb;

    $_SESSION['MMA'] = $mma;
?>
