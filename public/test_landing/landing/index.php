<?php
    session_start();
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
    <!-- <link rel="stylesheet" href="../../dist/css/normalize.css">
    <link rel="stylesheet" href="../../dist/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css"> -->
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <link rel="stylesheet" href="css/main_dup.css">

    <link rel="icon" type="image/png" href="../../dist/images/favicon.png">

    <style type="text/css">
        .blank {
            padding-top: 500px;
        }

        .submit {
            position: relative;
            left: 40%;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
            <div id="main">
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li><a href="http://localhost/DemoProject/Brain_Tumor_Analysis/public/test_landing/landing/index.php" class="active" target="_blank">Barres Filter</a></li>
                        <li><a href="http://localhost:5287" target="_blank">Logical Filter</a></li>
                        <li><a href="../../gene_form.php" target="_blank">Visualizations</a></li>
                        <li><a href="http://localhost/calaca-project/_site/index.html" target="_blank">Full Text Search</a></li>
                    </ul>
                </nav>
                <header id="header" class="alt">
                    <h2 align="center">Please select the filter of your choice from the cell type drop-down below.</h2>
                </header>

                <form action="form_processing.php" method="POST" target="_blank">
                <select name="cell-type" id="cell_type">
                    <option value="" disabled selected>Select your option--</option>
                    <option value="pta">Peri Tumor Astrocytes</option>
                    <option value="hsha">Human Sclerotic Hippocampi Astrocytes</option>
                    <option value="hfa">Human Fetal Astrocytes</option>
                    <option value="hma">Human Mature Astrocytes</option>
                    <option value="hn">Human Neurons</option>
                    <option value="ho">Human Oligodendrocytes</option>
                    <option value="hm">Human Microglia</option>
                    <option value="he">Human Endothelial</option>
                    <option value="hwc">Human Whole Cortex</option>
                    <option value="mn">Mouse Neurons</option>
                    <option value="maf">Mouse Astrocytes - FACS</option>
                    <option value="mai">Mouse Astrocytes - Immunopanned</option>
                    <option value="mo">Mouse Oligodendrocytes</option>
                    <option value="me">Mouse Endothelial</option>
                    <option value="mm">Mouse Microglia</option>
                    <option value="mwb">Mouse Whole Brain</option>
                </select>
                <div class="blank"></div>

                <input type="submit" class="submit"></a>
            </form>
        </div>
    </div>

</html>
