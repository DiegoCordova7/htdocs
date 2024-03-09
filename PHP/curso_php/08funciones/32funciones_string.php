<?php

echo 'Las funciones para string son:<br><br>';

echo '<b>Cambio de Mayusculas y Minusculas:</b><br>';
$cadena_texto = 'hola mundo';

echo '-strtolower: Convierte todas las letras a minusculas.<br>';
echo strtolower($cadena_texto) . '; <i>= echo strtolower($cadena_texto)</i>' . '<br>';

echo '-strtoupper: Convierte todas las letras a mayusculas.<br>';
echo strtoupper($cadena_texto) . '; <i>= echo strtoupper($cadena_texto)</i>' . '<br>';

echo '-ucfirst: Convierte la primera letra en mayuscula.<br>';
echo ucfirst($cadena_texto) . '; <i>= echo ucfirst($cadena_texto)</i>' . '<br>';

echo '-ucwords: Convierte cada primera letra de cada palabra a mayusculas.<br>';
echo ucwords($cadena_texto) . '; <i>= echo ucwords($cadena_texto)</i>' . '<br>';

echo '<b>Contar letras:</b><br>';
$longitud = strlen($cadena_texto);
echo $cadena_texto . ' tiene: ' . $longitud . ' letras' . '; <i>= $longitud = strlen($cadena_texto)</i>' . '<br>';

echo '<b>Contar palabras:</b><br>';
$palabras = str_word_count($cadena_texto);
echo $cadena_texto . ' tiene: ' . $palabras . ' palabras' . '; <i>= $palabras = str_word_count($cadena_texto);</i>' . '<br>';
