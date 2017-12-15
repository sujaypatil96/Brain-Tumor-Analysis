<?php
    // grab array data from the main processing page
    session_start();
    $pta = $_SESSION['PTA_ASSOC'];
    $gene_names = $_SESSION['GENE_NAMES'];
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="icon" type="image/png" href="../../dist/images/favicon.png">
</head>

<!-- The content begins here -->
<body>

<div class="container">
  <div class="row">
    <div class="column">
      <h4 class="hero-heading">Please select the filter of your choice from the cell type drop-down below.</h4>

    <form action="form_processing.php" method="POST" target="_blank">
    <div class="row drop-down">
        <select name="cell-type" id="cell_type">
            <option value="" disabled selected>Select your option--</option>
            <option value="pta">Peri Tumor Astrocytes</option>
            <option value="hsha">Human Sclerotic Hippocampi Astrocytes</option>
            <option value="hfa">Human Fetal Astrocytes</option>
            <option value="hma">Human Mature Astrocytes</option>
        </select>
    </div>

        <br><br><br><br><br><br><br><br><br><br>

      <button type="submit" class="button button-primary">Search</a>
    </form>
    </div>
  </div>
</div>

</html>
