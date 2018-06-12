<?php
    // grab array data from the main processing page
    error_reporting(0);
    session_start();
    $pta = $_SESSION['PTA_ASSOC'];

    $gene_names = $_SESSION['GENE_NAMES'];

    $gene_one = $_POST['geneone'];
?>

<?php
    // process the PTA array
    $pta_json_array1 = [];
    $pta_json_array2 = [];
    $pta_json_array3 = [];
    $pta_json_array4 = [];

    foreach ($pta as $key => $value) {
        array_push($pta_json_array1, $value[0]);
        array_push($pta_json_array2, $value[1]);
        array_push($pta_json_array3, $value[2]);
        array_push($pta_json_array4, $value[3]);
    }

    $pta_json_array1 = json_encode($pta_json_array1);
    $pta_json_array2 = json_encode($pta_json_array2);
    $pta_json_array3 = json_encode($pta_json_array3);
    $pta_json_array4 = json_encode($pta_json_array4);

    $gene_names_json = json_encode($gene_names);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizations</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/plotly-latest.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div id="pie2"></div>
        </div>
    </div>
    <div class="row">
        <div id="heatmap"></div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-4 col-xs-offset-3">
            <input type="text" class="form-control" id="boxinput" placeholder="Enter gene name here.." />
        </div>
        <button type="button" class="btn btn-primary" id="boxbtn">Apply Gene!</button>
    </div>
<div id="boxplot"></div>
<div id="scatterplot"></div>
</div>

<?php
    // database part
    // connect to mongodb
    $m = new MongoClient();
    // echo "Connection to the Mongo database was created successfully!<br>";

    // select a database
    $db = $m->test;
    // echo "The Database test was selected<br>";

    // Select a collection from a group of collections in Mongo
    $collection = $db->selectCollection("newcoll");

    // query to fetch all the expr. values for a given gene name
    $dom = new domDocument;

    $boxip = $dom->getElementById("boxinput");
    echo "<script>console.log(" . $boxip .  ")</script>";

    $query = array('gene_name' => 'Azin1');

    // issue the above query on the database
    $expr_cursor = $collection->find($query);

    $expr_levels_arr_temp = [];
    $expr_levels_arr = [];

    foreach ($expr_cursor as $key => $value) {
        $expr_levels_arr_temp[] = explode("|", $value["expression_level"]);
    }

    foreach ($expr_levels_arr_temp as $key => $value) {
        foreach ($value as $subkey => $subvalue) {
            array_push($expr_levels_arr, $subvalue);
        }
    }

    $js_array = json_encode($expr_levels_arr);
?>

<script>
    var xValues = [
        <?php
            foreach ($gene_names as $key => $value) {
                echo " ' " . $value . " ' " . ", ";
            }
        ?>
    ];

    var yValues = ['69 Y/O', '59 Y/O', '65 Y/O', '64 Y/O'];

    var zValues = [
        <?php
            for ($i = 0; $i < 4; $i++) {
                echo "[";
                for ($j = 0; $j < 15041; $j++) {
                    echo $pta[$j][$i] . " , ";
                }
                echo "],";
            }
        ?>
    ];

    var colorscaleValue = [
        [0, '#ff0000'],
        [1, '#000000']
    ];

    var colorscaleValue = [
        [0, '#ff0000'],
        [1, '#000000']
    ];

    var data = [{
        x: xValues,
        y: yValues,
        z: zValues,
        type: 'heatmap',
        colorscale: colorscaleValue,
        showscale: false
    }];

    var layout = {
        title: 'Heatmap for Peri Tumor Astrocytes',
        font : {
            family: 'Josefin Sans'
        },
        xaxis: {
            title: 'Gene Name',
            ticks: '',
            side: 'bottom'
        },
        yaxis: {
            title: 'Sample Type',
            ticks: '',
            ticksuffix: ' ',
            width: 700,
            height: 700,
            autosize: false
        }
    };

    Plotly.plot('heatmap', data, layout);

    var per_calc = [];
    for(var i = 0; i < yValues.length; i++) {
        var val = 100 / yValues.length;
        per_calc.push(val);
    }

    var count1 = 0, count2 = 0, count3 = 0;

    for (var i = 0; i < 4; i++) {
        for (var j = 0; j < 15041; j++) {
            if (zValues[i][j] < 1) {
                count1++
            } else if (zValues[i][j] >= 1 && zValues[i][j] < 10) {
                count2++
            } else {
                count3++;
            }
        }
    }

    var arr = [count1, count2, count3];

    // code for pie chart 2
    var data = [{
        values: arr,
        labels: ["<1.0", ">=1.0 && < 10.0", ">= 10.0"],
        type: 'pie'
    }];

    var layout = {
    title: 'Pie chart with percentages based on expression levels',
    font : {
        family: 'Josefin Sans'
    },
    height: 400,
    width: 500
    };

    Plotly.newPlot('pie2', data, layout);

    // code for boxplot
    var arr = [];
    arr = <?php echo $js_array; ?>

    var trace1 = {
      y: arr,
      type: 'box',
      name: 'Only Mean',
      marker: {
        color: 'rgb(8,81,156)'
      },
      boxmean: true
    };

    var trace2 = {
      y: arr,
      type: 'box',
      name: 'Mean and Standard Deviation',
      marker: {
        color: 'rgb(10,140,208)'
      },
      boxmean: 'sd'
    };

    var data = [trace1, trace2];

    var layout = {
        title: 'Boxplot showing Expression Levels of Peri Tumor Astrocytes',
        font: {
            family: 'Josefin Sans'
        }
    }

    Plotly.newPlot('boxplot', data, layout);

    // code for scatter plot
    var json_arr1 = [];
    json_arr1 = <?php echo $pta_json_array1; ?>

    var json_arr2 = [];
    json_arr2 = <?php echo $pta_json_array2; ?>

    var json_arr3 = [];
    json_arr3 = <?php echo $pta_json_array3; ?>

    var json_arr4 = [];
    json_arr4 = <?php echo $pta_json_array4; ?>

    var gene_names_json = [];
    gene_names_json = <?php echo $gene_names_json; ?>

    var trace1 = {
        x: gene_names_json,
        y: json_arr1,
        mode: 'markers',
        type: 'scatter',
        name: '69 Y/O',
    };

    var trace2 = {
        x: gene_names_json,
        y: json_arr3,
        mode: 'markers',
        type: 'scatter',
        name: '59 Y/O',
    };

    var trace3 = {
        x: gene_names_json,
        y: json_arr4,
        mode: 'markers',
        type: 'scatter',
        name: '65 Y/O',
    };

    var trace4 = {
        x: gene_names_json,
        y: json_arr2,
        mode: 'markers',
        type: 'scatter',
        name: '64 Y/O',
    };

    var data = [ trace1, trace2, trace3, trace4 ];

    var layout = {
        font: {
            family: 'Josefin Sans'
        },
        xaxis: {
        range: [ 'Abat', 'zzz3' ]
    },
    yaxis: {
        range: [0, 100]
    },
        title:'Scatter Plot for Peri Tumor Astrocytes'
    };

    Plotly.newPlot('scatterplot', data, layout);

    $(document).ready(function() { /// Wait till page is loaded
        $('#boxbtn').click(function() {
            $('#boxplot').load('heat_map.php #boxplot');
        })
    });

</script>

</body>
</html>
