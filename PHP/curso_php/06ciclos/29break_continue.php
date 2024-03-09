<?php

echo
'$c = 1;' . '<br>' .
    'while($c<=20){' . '<br>' .
    'echo $c . br;' . '<br>' .
    'if($c==10){' . '<br>' .
    'break;' . '<br>' .
    '}' . '<br>' .
    '$c++;' . '<br>' .
    '};' . '<hr>';

$c = 1;
while ($c <= 20) {
    echo $c . '<br>';
    if ($c == 10) {
        break;
    }
    $c++;
};

echo '<hr>';

echo
'$pc = [SO, SSD, GPU, RAM, CPU];' . '<br>' .
    'foreach($pc as $componentes){' . '<br>' .
    'echo $componentes . br;' . '<br>' .
    'if($componentes==GPU){' . '<br>' .
    'break;' . '<br>' .
    '}' . '<br>' .
    '};' . '<br>';

echo '<hr>';

$pc = ['SO', 'SSD', 'GPU', 'RAM', 'CPU'];
foreach ($pc as $componentes) {
    echo $componentes . '<br>';
    if ($componentes == 'GPU') {
        break;
    }
};

echo '<hr>';

echo
'for ($i = 1; $i<=10; $i++){' . '<br>' .
    'if($i==5){' . '<br>' .
    'continue;' . '<br>' .
    '}' . '<br>' .
    'echo $i.br;' . '<br>' .
    '};';

echo 'hr;';

echo
'for ($i = 1; $i<=10; $i++){' . '<br>' .
    'if($i==5){' . '<br>' .
    'continue;' . '<br>' .
    '}' . '<br>' .
    'echo $i.br;' . '<br>' .
    '};';

echo '<hr>';

for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        continue;
    }
    echo $i . '<br>';
};
