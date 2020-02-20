<?php
    require_once 'vendor/autoload.php';

    $mpdf = new \Mpdf\mpdf();

    $mpdf->writeHTML('<strong>Hello, Chanon</storng>');
    $mpdf->output();

?>