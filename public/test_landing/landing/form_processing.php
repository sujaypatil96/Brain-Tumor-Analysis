<?php
    // grab array data from the main processing page
    session_start();
    $pta = $_SESSION['PTA_ASSOC'];
    $hsha = $_SESSION['HSHA_ASSOC'];
    $hfa = $_SESSION['HFA_ASSOC'];
    $hma = $_SESSION['HMA_ASSOC'];
    $hma = $_SESSION['HMA_ASSOC'];
    $hn = $_SESSION['HN_ASSOC'];
    $ho = $_SESSION['HO_ASSOC'];
    $hm = $_SESSION['HM_ASSOC'];
    $he = $_SESSION['HE_ASSOC'];
    $hwc = $_SESSION['HWC_ASSOC'];

    $mn = $_SESSION['MN_ASSOC'];
    $maf = $_SESSION['MAF_ASSOC'];
    $mai = $_SESSION['MAI_ASSOC'];
    $mo = $_SESSION['MO_ASSOC'];
    $me = $_SESSION['ME_ASSOC'];
    $mm = $_SESSION['MM_ASSOC'];
    $mwb = $_SESSION['MWB_ASSOC'];

    $gene_names = $_SESSION['GENE_NAMES'];
    // get the form data
    $selected_val = $_POST["cell-type"];

    $_SESSION['CELL'] = $selected_val;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Barres Data</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../../dist/css/normalize.css">
    <link rel="stylesheet" href="../../dist/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

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
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Peri Tumor Astrocytes</u></b></i></h5>";

            echo
            "<table id=\"pta-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>69 yo surround</th>
            <th>59 yo</th>
            <th>65 yo</th>
            <th>64 yo</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>" . $pta[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HSHA -->
    <?php
        if ($selected_val == "hsha") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Sclerotic Hippocampi Astrocytes</u></b></i></h5>";

            echo
            "<table id=\"hsha-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>21 yo</th>
            <th>22 yo</th>
            <th>53 yo - A</th>
            <th>53 yo - B</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>" . $hsha[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HFA -->
    <?php
        if ($selected_val == "hfa") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Fetal Astrocytes</u></b></i></h5>";

            echo
            "<table id=\"hfa-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>18 gw - 1</th>
            <th>18 gw - 2</th>
            <th>18.5 gw - 1</th>
            <th>18.1 gw</th>
            <th>18.5 gw - 2</th>
            <th>18.5 gw - 3</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 6; $i++) {
                    echo "<td>" . $hfa[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>


<!-- This is the block of code for HMA -->
    <?php
        if ($selected_val == "hma") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Mature Astrocytes</u></b></i></h5>";

            echo
            "<table id=\"hma-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>8 yo</th>
            <th>13 yo</th>
            <th>16 yo</th>
            <th>21 yo</th>
            <th>22 yo</th>
            <th>35 yo</th>
            <th>47 yo</th>
            <th>51 yo</th>
            <th>53 yo</th>
            <th>60 yo</th>
            <th>63 yo - 1</th>
            <th>63 yo - 2</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 12; $i++) {
                    echo "<td>" . $hma[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HN -->
    <?php
        if ($selected_val == "hn") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Neurons/u></b></i></h5>";

            echo
            "<table id=\"hn-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>25 yo</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 1; $i++) {
                    echo "<td>" . $hn[$key][$i] . "</td>";
                }
            }
            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HO -->
    <?php
        if ($selected_val == "ho") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Oligodendrocytes</u></b></i></h5>";

            echo
            "<table id=\"ho-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>22 yo GC</th>
            <th>63 yo GC - 1</th>
            <th>63 yo GC - 2</th>
            <th>47 yo O4</th>
            <th>63 yo O4</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 5; $i++) {
                    echo "<td>" . $ho[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
        ?>

<!-- This is the block of code for HM -->
    <?php
        if ($selected_val == "hm") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Oligodendrocytes</u></b></i></h5>";

            echo
            "<table id=\"hm-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>45 yo</th>
            <th>51 yo</th>
            <th>63 yo</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 3; $i++) {
                    echo "<td>" . $hm[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HE -->
    <?php
        if ($selected_val == "he") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Endothelial</u></b></i></h5>";

            echo
            "<table id=\"he-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>13 yo</th>
            <th>37 yo</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 2; $i++) {
                    echo "<td>" . $he[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for HWC -->
    <?php
        if ($selected_val == "hwc") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Human Whole Cortex</u></b></i></h5>";

            echo
            "<table id=\"hwc-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>45 yo</th>
            <th>63 yo</th>
            <th>25 yo</th>
            <th>53 yo</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>" . $hwc[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MAF -->
    <?php
        if ($selected_val == "maf") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Astrocytes - FACS</u></b></i></h5>";

            echo
            "<table id=\"maf-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>FACS - p69</th>
            <th>FACS - p70</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 2; $i++) {
                    echo "<td>" . $maf[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MAI -->
    <?php
        if ($selected_val == "mai") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Astrocytes - Immunopanned</u></b></i></h5>";

            echo
            "<table id=\"mai-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>1 month</th>
            <th>4 months</th>
            <th>7 months</th>
            <th>9 months</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 4; $i++) {
                    echo "<td>" . $mai[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MN -->
    <?php
        if ($selected_val == "mn") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Neurons/u></b></i></h5>";

            echo
            "<table id=\"mn-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>Neuron 3</th>
            <th>Neuron 4</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 2; $i++) {
                    echo "<td>" . $mn[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MO -->
    <?php
        if ($selected_val == "mo") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Oligodendrocytes</u></b></i></h5>";

            echo
            "<table id=\"mo-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>Oligodendrocyte precursor cell 3</th>
            <th>Oligodendrocyte precursor cell 4</th>
            <th>Newly formed oligodendrocyte 3</th>
            <th>Newly formed oligodendrocyte 4</th>
            <th>Myelinating oligodendrocyte 4</th>
            <th>Myelinating oligodendrocyte 5</th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 6; $i++) {
                    echo "<td>" . $mo[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MM -->
    <?php
        if ($selected_val == "mm") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Microglia</u></b></i></h5>";

            echo
            "<table id=\"mm-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>Microglia 1/th>
            <th>Microglia 2/th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 2; $i++) {
                    echo "<td>" . $mm[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for ME -->
    <?php
        if ($selected_val == "me") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Endothelial</u></b></i></h5>";

            echo
            "<table id=\"me-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>Endo 1/th>
            <th>Endo 2/th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 2; $i++) {
                    echo "<td>" . $me[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

<!-- This is the block of code for MWB -->
    <?php
        if ($selected_val == "mwb") {
            echo "<div class=\"container\"><div class=\"row\"><div id=\"pta\"><h5>Type of cell - <i><b><u>Mouse Whole Brain</u></b></i></h5>";

            echo
            "<table id=\"mwb-table\" class=\"u-full-width\">
            <thead>
            <tr>
            <th>Gene Name</th>
            <th>Whole Cortex 1/th>
            <th>Whole Cortex 2/th>
            <th>Whole Cortex 3/th>
            </tr>
            </thead>
            <tbody id=\"fbody\">";

            foreach ($gene_names as $key => $value) {
                echo "<tr>";
                echo "<td>" . $value . "</td>";
                for ($i = 0; $i < 3; $i++) {
                    echo "<td>" . $mwb[$key][$i] . "</td>";
                }
            }

            echo "</tbody></table></div></div></div>";
        }
    ?>

    <!-- <form action="../../heat_map.php" method="POST" target="_blank">
        <button type="submit" class="button button-primary" id="heatmap">Generate Visualization</button>
    </form> -->
</body>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

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

    $(function(){
        $("#pta-table").dataTable();
    })

    $(function(){
        $("#hsha-table").dataTable();
    })

    $(function(){
        $("#hfa-table").dataTable();
    })

    $(function(){
        $("#hma-table").dataTable();
    })

    $(function(){
        $("#hn-table").dataTable();
    })

    $(function(){
        $("#ho-table").dataTable();
    })

    $(function(){
        $("#hm-table").dataTable();
    })

    $(function(){
        $("#he-table").dataTable();
    })

    $(function(){
        $("#hwc-table").dataTable();
    })

    // mouse responsivity
    $(function(){
        $("#maf-table").dataTable();
    })

    $(function(){
        $("#mai-table").dataTable();
    })

    $(function(){
        $("#mn-table").dataTable();
    })

    $(function(){
        $("#mo-table").dataTable();
    })

    $(function(){
        $("#mm-table").dataTable();
    })

    $(function(){
        $("#me-table").dataTable();
    })

    $(function(){
        $("#mwb-table").dataTable();
    })
</script>
