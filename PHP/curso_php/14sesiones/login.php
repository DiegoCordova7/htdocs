<?php
if ($_POST['usuario'] == 'Diego' && $_POST['clave'] = '1234') {
    session_name('LOGIN');
    session_start();

    $_SESSION['Nombre'] = 'Diego';
    $_SESSION['Apellido'] = 'Cordova';
    $_SESSION['Pais'] = 'Mexico';

    header('Location: contador.php');
} else {
    echo 'Datos incorrectos';
}
