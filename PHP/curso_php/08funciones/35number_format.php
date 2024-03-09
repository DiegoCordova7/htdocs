<?php

echo 'number_format(cantidad,decimales,sepdecimal,sepmillar)' . '<br>';

$cantidad1 = 12732.77;
echo $cantidad1 . '<br>';
$cantidad2 = 1931.81;
echo $cantidad2 . '<br>';

echo number_format($cantidad1, 1, ',', '´');
