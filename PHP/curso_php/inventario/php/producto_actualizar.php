<?php
require_once "main.php";

$id = limpiar_cadena($_POST['producto_id']);

# Verificar el producto #
$check_producto = conexion();
$check_producto = $check_producto->query("SELECT * FROM producto
    WHERE producto_id='$id'");

if ($check_producto->rowCount() <= 0) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El producto no existe en el sistema.
            </div>
        ';
    exit();
} else {
    $datos = $check_producto->fetch();
}
$check_producto = null;

# Almacenando los datos #
$codigo = limpiar_cadena($_POST['producto_codigo']);
$nombre = limpiar_cadena($_POST['producto_nombre']);

$precio = limpiar_cadena($_POST['producto_precio']);
$stock = limpiar_cadena($_POST['producto_stock']);
$categoria = limpiar_cadena($_POST['producto_categoria']);

# Verificando los campos obligatorios #

if ($codigo == "" || $nombre == "" || $precio == "" || $stock == "" || $categoria == "") {
    echo '
            <div class="notification is-danger is-light">
                ¡Ocurrio un error inesperado!<br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
    exit();
}

# Verificando integridad de los datos #

if (verificar_datos("[a-zA-Z0-9- ]{1,70}", $codigo)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Codigo de Barras no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,70}", $nombre)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Nombre no coincide con el formato solicitado.
            </div>
        ';
    exit();
}
if (verificar_datos("[0-9.]{1,25}", $precio)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Precio no coincide con el formato solicitado.
            </div>
        ';
    exit();
}
if (verificar_datos("[0-9]{1,25}", $stock)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Stock no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

# Verificando el codigo #
if ($codigo != $datos['producto_codigo']) {
    $check_codigo = conexion();
    $check_codigo = $check_codigo->query("SELECT producto_codigo
        FROM producto WHERE producto_codigo='$codigo'");
    if ($check_codigo->rowCount() > 0) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    El Codigo ingresado ya se encuentra registrado, favor de ingresar otro.
                </div>
            ';
        exit();
    }
    $check_codigo = null;
}

# Verificando el nombre #
if ($nombre != $datos['producto_nombre']) {
    $check_nombre = conexion();
    $check_nombre = $check_nombre->query("SELECT producto_nombre
        FROM producto WHERE producto_nombre='$nombre'");
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
}

# Verificar la categoria #
if ($categoria != $datos['categoria_id']) {
    $check_categoria = conexion();
    $check_categoria = $check_categoria->query("SELECT categoria_id
        FROM categoria WHERE categoria_id='$categoria'");
    if ($check_categoria->rowCount() > 0) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    La categoria seleccionada no existe.
                </div>
            ';
        exit();
    }
    $check_categoria = null;
}

# Actualizar los datos #
$actualizar_producto = conexion();
$actualizar_producto = $actualizar_producto->prepare("UPDATE producto SET
    producto_codigo=:codigo,producto_nombre=:nombre,producto_precio=:precio,
    producto_stock=:stock,categoria_id=:categoria WHERE producto_id=:id");

$datos = [
    ":codigo" => $codigo,
    ":nombre" => $nombre,
    ":precio" => $precio,
    ":stock" => $stock,
    ":categoria" => $categoria,
    ":id" => $id
];

if ($actualizar_producto->execute($datos)) {
    echo '
            <div class="notification is-info is-light">
                <b>¡Producto Actualizado!</b><br>
                El producto se actualizo correctamente.
            </div>
        ';
} else {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No se pudo actualizar el producto.
            </div>
        ';
}

$actualizar_producto = null;
