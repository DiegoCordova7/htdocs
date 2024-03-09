<?php
date_default_timezone_set('America/Hermosillo');
$fechaus = date('Y-M-D');
$fechaes = date('D-M-Y');

$hora_12 = date('h:i a');
$hora_24 = date('H:i');

$fecha_completa = date('d-m-Y h:i A');
echo $fecha_completa;
