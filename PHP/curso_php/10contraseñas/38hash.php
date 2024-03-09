<?php
$clave = 'contraseñadeejemplo';
echo 'Para encrpitar se puede usar el md5 o sha1, se usa echo md5/sha1(cosa a encriptar)' . '<br>' .
    'Para hash se usa igual, pero en se coloca el tipo a encriptar los anteriores u otros y la cosa a encriptar.' . '<br>' . '<hr>';

foreach (hash_algos() as $algoritmos) {
    echo $algoritmos . ' - ' . hash($algoritmos, $clave) . '<br>';
};

echo '<hr>' . '<br>';

echo 'password_hash() cambia cada vez la contraseña' . '<br>';
echo password_hash($clave, PASSWORD_DEFAULT, ['cost' => 10]);

echo '<hr>' . '<br>';

echo 'Para comparar una variable(string) con un hash para por ejemplo logearse, se usa esto:' . '<br>' .
    '1.-Creas otra variable $clave_procesada=password_hash($clave,PASSWORD_DEFAULT,[cost=>10]);' . '<br>' .
    '2.-echo password_verify($clave,$clave_procesada); Devolvera en booleano' . '<br>';
$clave_procesada = password_hash($clave, PASSWORD_DEFAULT, ['cost' => 10]);

if (password_verify($clave, $clave_procesada)) {
    echo 'Las claves coinciden';
} else {
    echo 'Las claves no coinciden';
}
