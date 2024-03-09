<?php
require_once "../inc/session_start.php";

require_once "main.php";

$id = limpiar_cadena($_POST['usuario_id']);

# Verificar el usuario #
$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT * FROM usuarios
    WHERE usuario_id='$id'");

if ($check_usuario->rowCount() <= 0) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Usuario no existe en el sistema.
            </div>
        ';
    exit();
} else {
    $datos = $check_usuario->fetch();
}
$check_usuario = null;

$admin_usuario = limpiar_cadena($_POST['administrador_usuario']);
$admin_clave = limpiar_cadena($_POST['administrador_clave']);

# Verificando los campos obligatorios #

if ($admin_usuario == "" || $admin_clave == "") {
    echo '
            <div class="notification is-danger is-light">
                ¡Ocurrio un error inesperado!<br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9]{4,20}", $admin_usuario)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                Su Usuario no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $admin_clave)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                Su Clave no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

# Verificando en la DB #
$check_admin = conexion();
$check_admin = $check_admin->query("SELECT usuario_usuario,usuario_clave FROM
    usuarios WHERE usuario_usuario='$admin_usuario' AND usuario_id='" . $_SESSION['id'] . "'");

if ($check_admin->rowCount() == 1) {
    $check_admin = $check_admin->fetch();

    if ($check_admin['usuario_usuario'] != $admin_usuario || !password_verify($admin_clave, $check_admin['usuario_clave'])) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    Usuario y Clave incorrectos.
                </div>
            ';
        exit();
    } else {
    }
} else {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                Usuario y Clave incorrectos.
            </div>
        ';
    exit();
}
$check_admin = null;

# Almacenando los datos #
$nombre = limpiar_cadena($_POST['usuario_nombre']);
$apellido = limpiar_cadena($_POST['usuario_apellido']);

$usuario = limpiar_cadena($_POST['usuario_usuario']);
$email = limpiar_cadena($_POST['usuario_email']);

$clave_1 = limpiar_cadena($_POST['usuario_clave_1']);
$clave_2 = limpiar_cadena($_POST['usuario_clave_2']);

# Verificando los campos obligatorios #

if ($nombre == "" || $apellido == "" || $usuario == "") {
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

# Verificar el email #
if ($email != "" && $email != $datos['usuario_email']) {
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
if ($usuario != "" && $usuario != $datos['usuario_usuario']) {
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
}

# Verificando las claves #
if ($clave1 != "" || $clave2 != "") {
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
    } else {
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
    }
} else {
    $clave = $datos['usuario_clave'];
}

#Actualizar los datos#
$actualizar_usuario = conexion();
$actualizar_usuario = $actualizar_usuario->prepare("UPDATE usuarios SET
    usuario_nombre=:nombre,usuario_apellido=:apellido,usuario_usuario=:usuario,
    usuario_clave=:clave,usuario_email=:email WHERE usuario_id=:id");

$datos = [
    ":nombre" => $nombre,
    ":apellidos" => $apellido,
    ":usuario" => $usuario,
    ":clave" => $clave,
    ":email" => $email,
    ":id" => $id
];

if ($actualizar_usuario->execute($datos)) {
    echo '
            <div class="notification is-info is-light">
                <b>¡Usuario Actualizado!</b><br>
                El usuario se actualizo correctamente.
            </div>
        ';
} else {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No se pudo actualizar el usuario.
            </div>
        ';
}

$actualizar_usuario = null;
