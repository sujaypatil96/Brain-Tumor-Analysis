<?php
    // grab array data from the main processing page
    session_start();
    $pta = $_SESSION['PTA_ASSOC'];
    $gene_names = $_SESSION['GENE_NAMES'];

    // json encode to send data to ajax
    $json = json_encode($pta);

    print_r($json);
?>
