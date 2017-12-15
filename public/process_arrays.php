<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Process Arrays</title>
</head>
<body>

</body>
</html>

<?php
    // split the associative arrays
    session_start();
?>

<?php
    $pta = $_SESSION['PTA'];

    echo "<pre>";
        print_r($pta);
    echo "</pre>";

    echo "<hr />";

    $pta_assoc = [];

    foreach ($pta as $key => $value) {
        $pta_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($pta_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $pta_assoc[0][0];
    echo "</pre>";

    $_SESSION['PTA_ASSOC'] = $pta_assoc;

?>
