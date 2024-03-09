<?php

echo 'Caso 1: Array Escalar:' . '<br>' .

    'Este es un array escalar, no tienen posición asignadas por nosotros, entonces es automatica, empezando por el 0' . '<hr>' .

    '$estudiantes=array(Diego,Kevin,Santiago,Maria);' . '<br>' .
    '//aqui estoy modificando el valor del 3er array por Jorge' . '<br>' .
    '$estudiantes[3]=Jorge;' . '<br>' .
    'echo $estudiantes[3];' . '<br>' . '<hr>';

$estudiantes = array('Diego', 'Kevin', 'Santiago', 'Maria');
//aqui estoy modificando el valor del 3er array por Jorge
$estudiantes[3] = 'Jorge';
echo $estudiantes[3];
echo '<hr>';

echo 'Caso 2: Array Asociativo:' . '<br>' .
    '//Asosiamos una clave a un valor con el simbolo =>.' . '<hr>' .

    '$tutor=[' . '<br>' .
    '"nombre"=>"Diego",' . '<br>' .
    '"apellido"=>"Cordova",' . '<br>' .
    '"edad"=>18' . '<br>' .
    '];' . '<br>' .

    '$tutor["edad"]=27;' . '<br>' .

    'echo $tutor["edad"];' . '<br>' . '<hr>';

$tutor = [
    "nombre" => "Diego",
    "apellido" => "Cordova",
    "edad" => 18
];

$tutor["edad"] = 27;

echo $tutor["edad"];
echo '<hr>';

echo 'Caso 3: Array De Multiples Dimensiones.' . '<br>' . '<hr>' .
    '$tutor_2=[' . '<br>' .
    '"nombre"=>"Fulanito",' . '<br>' .
    '"apellido"=>"Mengano",' . '<br>' .
    '"edad"=>43,' . '<br>' .
    '"cursos"=>["CSC","PHP","HTML"]' . '<br>' .
    '];' . '<br>' .

    'echo $tutor_2["cursos"][2];' . '<br>' . '<hr>';

$tutor_2 = [
    "nombre" => "Fulanito",
    "apellido" => "Mengano",
    "edad" => 43,
    "cursos" => ["CSC", "PHP", "HTML"]
];

echo $tutor_2["cursos"][2];
