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

<?php
    $hsha = $_SESSION['HSHA'];

    echo "<pre>";
        print_r($hsha);
    echo "</pre>";

    echo "<hr />";

    $hsha_assoc = [];

    foreach ($hsha as $key => $value) {
        $hsha_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hsha_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hsha_assoc[0][0];
    echo "</pre>";

    $_SESSION['HSHA_ASSOC'] = $hsha_assoc;
?>

<?php
    $hfa = $_SESSION['HFA'];

    echo "<pre>";
        print_r($hfa);
    echo "</pre>";

    echo "<hr />";

    $hfa_assoc = [];

    foreach ($hfa as $key => $value) {
        $hfa_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hfa_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hfa_assoc[0][0];
    echo "</pre>";

    $_SESSION['HFA_ASSOC'] = $hfa_assoc;
?>

<?php
    $hma = $_SESSION['HMA'];

    echo "<pre>";
        print_r($hma);
    echo "</pre>";

    echo "<hr />";

    $hma_assoc = [];

    foreach ($hma as $key => $value) {
        $hma_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hma_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hma_assoc[0][0];
    echo "</pre>";

    $_SESSION['HMA_ASSOC'] = $hma_assoc;
?>

<?php
    $hsha = $_SESSION['HN'];

    echo "<pre>";
        print_r($hn);
    echo "</pre>";

    echo "<hr />";

    $hn_assoc = [];

    foreach ($hn as $key => $value) {
        $hn_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hn_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hn_assoc[0][0];
    echo "</pre>";

    $_SESSION['HN_ASSOC'] = $hn_assoc;
?>

<?php
    $ho = $_SESSION['HO'];

    echo "<pre>";
        print_r($ho);
    echo "</pre>";

    echo "<hr />";

    $ho_assoc = [];

    foreach ($ho as $key => $value) {
        $ho_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($ho_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $ho_assoc[0][0];
    echo "</pre>";

    $_SESSION['HO_ASSOC'] = $ho_assoc;
?>

<?php
    $hm = $_SESSION['HM'];

    echo "<pre>";
        print_r($hm);
    echo "</pre>";

    echo "<hr />";

    $hm_assoc = [];

    foreach ($hm as $key => $value) {
        $hm_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hm_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hm_assoc[0][0];
    echo "</pre>";

    $_SESSION['HM_ASSOC'] = $hm_assoc;
?>

<?php
    $he = $_SESSION['HE'];

    echo "<pre>";
        print_r($he);
    echo "</pre>";

    echo "<hr />";

    $he_assoc = [];

    foreach ($he as $key => $value) {
        $he_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($he_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $he_assoc[0][0];
    echo "</pre>";

    $_SESSION['HE_ASSOC'] = $he_assoc;
?>

<?php
    $hwc = $_SESSION['HWC'];

    echo "<pre>";
        print_r($hwc);
    echo "</pre>";

    echo "<hr />";

    $hwc_assoc = [];

    foreach ($hwc as $key => $value) {
        $hwc_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($hwc_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $hwc_assoc[0][0];
    echo "</pre>";

    $_SESSION['HWC_ASSOC'] = $hwc_assoc;
?>

<!-- mouse data -->
<?php
    $mn = $_SESSION['MN'];

    echo "<pre>";
        print_r($mn);
    echo "</pre>";

    echo "<hr />";

    $mn_assoc = [];

    foreach ($mn as $key => $value) {
        $mn_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mn_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mn_assoc[0][0];
    echo "</pre>";

    $_SESSION['MN_ASSOC'] = $mn_assoc;
?>

<!-- mouse data -->
<?php
    $maf = $_SESSION['MAF'];

    echo "<pre>";
        print_r($maf);
    echo "</pre>";

    echo "<hr />";

    $maf_assoc = [];

    foreach ($maf as $key => $value) {
        $maf_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($maf_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $maf_assoc[0][0];
    echo "</pre>";

    $_SESSION['MAF_ASSOC'] = $maf_assoc;
?>

<?php
    $mai = $_SESSION['MAI'];

    echo "<pre>";
        print_r($mai);
    echo "</pre>";

    echo "<hr />";

    $mai_assoc = [];

    foreach ($mai as $key => $value) {
        $mai_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mai_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mai_assoc[0][0];
    echo "</pre>";

    $_SESSION['MAI_ASSOC'] = $mai_assoc;
?>

<?php
    $mo = $_SESSION['MO'];

    echo "<pre>";
        print_r($mo);
    echo "</pre>";

    echo "<hr />";

    $mo_assoc = [];

    foreach ($mo as $key => $value) {
        $mo_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mo_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mo_assoc[0][0];
    echo "</pre>";

    $_SESSION['MO_ASSOC'] = $mo_assoc;
?>

<?php
    $me = $_SESSION['ME'];

    echo "<pre>";
        print_r($me);
    echo "</pre>";

    echo "<hr />";

    $me_assoc = [];

    foreach ($me as $key => $value) {
        $me_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($me_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $me_assoc[0][0];
    echo "</pre>";

    $_SESSION['ME_ASSOC'] = $me_assoc;
?>

<?php
    $mm = $_SESSION['MM'];

    echo "<pre>";
        print_r($mm);
    echo "</pre>";

    echo "<hr />";

    $mm_assoc = [];

    foreach ($mm as $key => $value) {
        $mm_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mm_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mm_assoc[0][0];
    echo "</pre>";

    $_SESSION['MM_ASSOC'] = $mm_assoc;
?>

<?php
    $mwb = $_SESSION['MWB'];

    echo "<pre>";
        print_r($mwb);
    echo "</pre>";

    echo "<hr />";

    $mwb_assoc = [];

    foreach ($mwb as $key => $value) {
        $mwb_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mwb_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mwb_assoc[0][0];
    echo "</pre>";

    $_SESSION['MWB_ASSOC'] = $mwb_assoc;
?>

<?php
    $mma = $_SESSION['MMA'];

    echo "<pre>";
        print_r($mma);
    echo "</pre>";

    echo "<hr />";

    $mma_assoc = [];

    foreach ($mma as $key => $value) {
        $mma_assoc[] = explode("|", $value);
    }

    echo "<pre>";
        print_r($mma_assoc);
    echo "</pre>";

    echo "<hr />";

    echo "<pre>";
        echo $mma_assoc[0][0];
    echo "</pre>";

    $_SESSION['MMA_ASSOC'] = $mma_assoc;
?>
