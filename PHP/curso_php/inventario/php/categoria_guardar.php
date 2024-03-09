<?php
require_once "main.php";

# Almacenando los datos #
$nombre = limpiar_cadena($_POST['categoria_nombre']);
$ubicacion = limpiar_cadena($_POST['categoria_ubicacion']);

# Verificando los campos obligatorios #

if ($nombre == "") {
    echo '
            <div class="notification is-danger is-light">
                ¡Ocurrio un error inesperado!<br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}
# Verificando integridad de los datos #

if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{4,50}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El nombre no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if ($ubicacion != "") {
    if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{5,150}", $ubicacion)) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    La ubicacion no coincide con el formato solicitado.
                </div>
            ';
        exit();
    }
}

# Verificar el nombre #

$check_nombre = conexion();
$check_nombre = $check_nombre->query("SELECT categoria_nombre
    FROM categoria WHERE categoria_nombre='$nombre'");
if ($check_nombre->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El nombre ingresado ya se encuentra registrado, favor de ingresar otro.
            </div>
        ';
    exit();
}
$check_nombre = null;

# Guardando datos en un comentario #

$guardar_categoria = conexion();
$guardar_categoria = $guardar_categoria->prepare("INSERT INTO categoria
        (categoria_nombre,categoria_ubicacion) VALUES(:nombre,:ubicacion)");

$datos = [
    ":nombre" => $nombre,
    ":ubicacion" => $ubicacion
];

$guardar_categoria->execute($datos);

if ($guardar_categoria->rowCount() == 1) {
    echo
    '<div class="notification is-info is-light">
                <b>¡Categria Registrada!</b><br>
                La categoria se ha sido registrado con exito.
            </div>
        ';
} else {
    echo
    '<div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No se pudo registrar la categoria, favor de intentarlo nuevamente.
            </div>
        ';
}
$guardar_categoria = null;
