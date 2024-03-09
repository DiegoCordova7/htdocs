<?php

# Almacenando los datos #
$usuario_login = limpiar_cadena($_POST['login_usuario']);
$clave_login = limpiar_cadena($_POST['login_clave']);

# Verificar campos obligatorios #
if ($usuario_login == "" || $clave_login == "") {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9.-]{4,20}", $usuario_login)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El usuario no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_login)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El contrasena no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

$check_user = conexion();
$check_user = $check_user->query("SELECT * FROM usuarios WHERE usuario_usuario='$usuario_login'");

if ($check_user->rowCount() == 1) {
    $check_user = $check_user->fetch();

    if (
        $check_user['usuario_usuario'] == $usuario_login &&
        password_verify($clave, $check_user['usuario_clave']) == $clave_login
    ) {

        $_SESSION['id'] = $check_user['usuario_id'];
        $_SESSION['nombre'] = $check_user['usuario_nombre'];
        $_SESSION['apellido'] = $check_user['usuario_apellido'];
        $_SESSION['usuario'] = $check_user['usuario_usuario'];

        if (headers_sent()) {
            echo
            "<script>
                        window.location.href='index.php?vista=home';
                </script>";
        } else {
            header("Location: index.php?vista=home");
        }
    } else {
        echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                Usuario o clave incorrecta.
            </div>
        ';
    }
} else {
    echo '
        <div class="notification is-danger is-light">
            <b>¡Ocurrio un error inesperado!</b><br>
            Usuario o clave incorrecta.
        </div>
    ';
}
$check_user = null;
