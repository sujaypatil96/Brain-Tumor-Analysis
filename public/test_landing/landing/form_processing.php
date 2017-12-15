<?php
    // grab array data from the main processing page
    session_start();
    $pta = $_SESSION['PTA_ASSOC'];
    $gene_names = $_SESSION['GENE_NAMES'];

    // get the form data
    $selected_val = $_POST["cell-type"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Form Processed Data</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../../dist/css/normalize.css">
    <link rel="stylesheet" href="../../dist/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="icon" type="image/png" href="../../dist/images/favicon.png">
</head>

<style type="text/css">
    .button.button-primary {
        position: relative;
        left: 45%;
    }
</style>

<!-- This is the block of code for PTA -->

    <?php
    if ($selected_val == "pta") {
        echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\">
        <h5>Type of cell - <i><b><u>Peri Tumor Astrocytes</u></i></b></h5>
        <table class=\"u-full-width\">
        <thead>
        <tr>
        <th>Gene Name</th>
        <th>69 yo surround</th>
        <th>59 yo</th>
        <th>65 yo</th>
        <th>64 yo</th>
        </tr>
        </thead>
        <tbody>";
    }
    ?>
    <?php
    if ($selected_val == "pta") {
        foreach ($gene_names as $key => $value) {
            echo "<tr>";
            echo "<td>" . $value . "</td>";
            for ($i = 0; $i < 4; $i++) {
                echo "<td>" . $pta[$key][$i] . "</td>";
            }
        }
    }
    ?>
    <?php
        if ($selected_val == "pta") {
            echo "</tbody></table></div></div></div>";
        }
    ?>
    <form action="../../heat_map.php" method="POST" target="_blank">
        <button type="submit" class="button button-primary" id="heatmap">Generate Heatmap</a>
    </form>
</body>

<script type="text/javascript">

    function toggle_visibility(id) {
        var e = document.getElementById(id);
        if (e.style.display == 'block')
            e.style.display = 'none';
        else
            e.style.display = 'block';
    }

    function get_value(id) {
        var val = document.getElementById(id);
    }

    // Ajax code to execute heatmap generation PHP code on click of a button
    // $(document).ready(function(){
    //     $('#heatmap').click(function(){
    //         var clickBtnValue = $(this).val();
    //         var ajaxurl = 'heat_map.php',
    //         data =  {'action': clickBtnValue};
    //         $.post(ajaxurl, data, function (response) {
    //             // Response div goes here.
    //             alert("action performed successfully");
    //         });
    //     });
    // });

</script>
