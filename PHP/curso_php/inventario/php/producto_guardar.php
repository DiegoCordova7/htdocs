<?php
require_once "main.php";
require_once "../inc/session_start.php";

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
if (verificar_datos("[a-zA-Z0-9- ]{1,70}", $codigo)) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El nombre no coincide con el formato solicitado.
            </div>
        ';
    exit();
}

# Verificar el codigo #
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

# Verificar el nombre #
$check_nombre = conexion();
$check_nombre = $check_nombre->query("SELECT producto_nombre
    FROM producto WHERE producto_nombre='$nombre'");
if ($check_nombre->rowCount() > 0) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El Nombre ingresado ya se encuentra registrado, favor de ingresar otro.
            </div>
        ';
    exit();
}
$check_nombre = null;

# Verificar la categoria #
$check_categoria = conexion();
$check_categoria = $check_categoria->query("SELECT producto_codigo
    FROM producto WHERE categoria_id='$categoria'");
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

# Directorio de imagenes #
$img_dir = "../img/producto/";

# Comprobar si se selecciono una imagen #
if ($_FILES['producto_foto']['name'] != "" && $_FILES['producto_foto']['size'] > 0) {
    # Creando el directorio #
    if (!file_exists($img_dir)) {
        if (!mkdir($imgdir, 0777)) {
            echo '
                    <div class="notification is-danger is-light">
                        <b>¡Ocurrio un error inesperado!</b><br>
                        Error al crear el directorio.
                    </div>
                ';
            exit();
        }
    }
    # Verificar el formato de las imagenes #
    if (
        mime_content_type($_FILES['producto_foto']['tmp_name']) != "image/jpeg" &&
        mime_content_type($_FILES['producto_foto']['tmp_name']) != "image/png"
    ) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    La imagen que has selecciona es de un formato no permitido.
                </div>
            ';
        exit();
    }
    # Verificar el peso de la imagen #
    if (($_FILES['producto_foto']['size'] / 1024) > 3072) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    La imagen que has selecciona supera el peso permitido.
                </div>
            ';
        exit();
    }

    # Extension de la imagen #
    switch (mime_content_type($_FILES['producto_foto']['tmp_name'])) {
        case 'image/jpeg':
            $img_ext = ".jpg";
            break;
        case 'image/png':
            $img_ext = ".png";
            break;
    }

    chmod($img_dir, 0777);

    $img_nombre = renombrar_fotos($nombre);
    $foto = $img_nombre . $img_ext;

    # Moviendo imagen al directorio #
    if (!move_uploaded_file($_FILES['producto_foto']['tmp_name'], $img_dir . $foto)) {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    La imagen no se pudo cargar al sistema.
                </div>
            ';
        exit();
    }
} else {
    $foto = "";
}

# Guardando datos #
$guardar_producto = conexion();
$guardar_producto = $guardar_producto->prepare("INSERT INTO producto
    (producto_codigo,producto_nombre,producto_precio,producto_stock,producto_foto,
    categoria_id,usuario_id) VALUES(:codigo,:nombre,:precio,:stock,
    :foto,:categoria,:usuario)");

$datos = [
    ":codigo" => $codigo,
    ":nombre" => $nombre,
    ":precio" => $precio,
    ":stock" => $stock,
    ":foto" => $foto,
    ":categoria" => $categoria,
    ":usuario" => $_SESSION['id']
];

$guardar_producto->execute($datos);

if ($guardar_producto->rowCount() == 1) {
    echo
    '<div class="notification is-info is-light">
                <b>¡Producto Registrado!</b><br>
                El producto ha sido registrado con exito.
            </div>
        ';
} else {
    if (is_file($img_dir . $foto)) {
        chmod($img_dir, 0777);
        //unlik elimina un archivo en base a una ruta
        unlink($img_dir . $foto);
    }

    echo
    '<div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No se pudo registrar el producto, favor de intentarlo nuevamente.
            </div>
        ';
}
$guardar_producto = null;
