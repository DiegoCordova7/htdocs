<?php
$materias = $_POST['asignatura'];
foreach ($materias as $asignatura) {
    echo $asignatura . '<br>';
};

echo '<br>';

$alimento = $_POST['fruta'];
foreach ($alimento as $fruta) {
    echo $fruta . '<br>';
};
