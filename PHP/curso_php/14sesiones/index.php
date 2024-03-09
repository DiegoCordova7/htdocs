<?php
session_name('LOGIN');
session_start();
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-AU-Compatible" content='IE-edge'>
    <meta name='viewport' content='width=device-width,initial-scale=1.0'>
    <title>Sesiones en PHP</title>
</head>

<body>
    <form action='login.php' method='POST'>
        <label>Usuario</label>
        <input type='text' name='usuario'>
        <br><br>
        <label>Clave</label>
        <input type='password' name='clave'><br>
        <button type='submit'>Enviar</button>
    </form>
</body>

</html>