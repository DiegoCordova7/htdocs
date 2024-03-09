<?php
require_once "main.php";

# Almacenando los datos #
$nombre = limpiar_cadena($_POST['usuario_nombre']);
$apellido = limpiar_cadena($_POST['usuario_apellido']);

$usuario = limpiar_cadena($_POST['usuario_usuario']);
$email = limpiar_cadena($_POST['usuario_email']);

$clave_1 = limpiar_cadena($_POST['usuario_clave_1']);
$clave_2 = limpiar_cadena($_POST['usuario_clave_2']);

# Verificando los campos obligatorios #

if ($nombre == "" || $apellido == "" || $usuario == "" || $clave_1 == "" || $clave_2 == "") {
    echo '
            <div class="notification is-danger is-light">
                ¡Ocurrio un error inesperado!<br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}

# Verificando integridad de los datos #

if (verificar_datos("[a-zA-Z0-9$@.-]{4,100}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El nombre no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{4,100}", $apellido)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El apellido no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El usuario no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (
    verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_1) ||
    verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_2)
) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                Las claves no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

# Verificar el email #
if ($email != "") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_email = conexion();
        $check_email = $check_email->query("SELECT usuario_email
            FROM usuarios WHERE usuario_email='$email'");
        if ($check_email->rowCount() > 0) {
            echo '
                    <div class="notification is-danger is-light">
                        <b>¡Ocurrio un error inesperado!</b><br>
                        El Correo ingresado ya se encuentra registrado, favor de ingresar otro.
                    </div>
                ';
            exit();
        }
        $check_email = null;
    } else {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    El Correo Electronico no es valido.
                </div>
            ';
        exit();
    }
}

# Verificar el usuario #

$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT usuario_usuario
        FROM usuarios WHERE usuario_usuario='$usuario'");
if ($check_usuario->rowCount() > 0) {
    echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    El Usuario ingresado ya se encuentra registrado, favor de ingresar otro.
                </div>
            ';
    exit();
}
$check_usuario = null;

# Verificando las claves#
if ($clave_1 != $clave_2) {
    echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    Las claves no coinciden, favor de ingresarlas correctamente.
                </div>
            ';
    exit();
} else {
    $clave = password_hash($clave1, PASSWORD_BCRYPT, ["cost" => 10]);
}

# Guardando datos #

$guardar_usuario = conexion();
$guardar_usuario = $guardar_usuario->prepare("INSERT INTO usuarios
        (usuario_nombre,usuario_apellido,usuario_usuario,usuario_clave,usuario_email)
        VALUES(:nombre,:apellidos,:usuario,:clave,:email)");

$datos_login = [
    ":nombre" => $nombre,
    ":apellidos" => $apellido,
    ":usuario" => $usuario,
    ":clave" => $clave,
    ":email" => $email
];

$guardar_usuario->execute($datos_login);

if ($guardar_usuario->rowCount() == 1) {
    echo
    '<div class="notification is-info is-light">
                <b>¡Registro Completado!</b><br>
                El usuario ha sido registrado con exito.
            </div>
        ';
} else {
    echo
    '<div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No se pudo registrar el usuario, favor de intentarlo nuevamente.
            </div>
        ';
}
$guardar_usuario = null;
