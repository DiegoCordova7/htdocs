<?php
require_once "main.php";

$product_id = limpiar_cadena($_POST['img_up_id']);

# Verificar el producto #
$check_producto = conexion();
$check_producto = $check_producto->query("SELECT * FROM producto
    WHERE producto_id='$product_id'");

if ($check_producto->rowCount() == 1) {
    $datos = $check_producto->fetch();
} else {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                El imagen del producto no existe en el sistema.
            </div>
        ';
    exit();
}
$check_producto = null;

# Directorio de imagenes #
$img_dir = "../img/producto/";

# Comprobar si se selecciono una imagen #
if ($_FILES['producto_foto']['name'] != "" && $_FILES['producto_foto']['size'] == 0) {
    echo '
            <div class="notification is-danger is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                La imagen que has selecciona es de un formato no permitido.
            </div>
        ';
    exit();
}

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

chmod($img_dir, 0777);

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

$img_nombre = renombrar_fotos($datos['producto_nombre']);
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

if (is_file($img_dir . $datos['producto_foto']) && $datos['producto_foto'] != $foto) {
    chmod($img_dir . $datos['producto_foto'], 0777);
    unlink($img_dir . $datos['producto_foto']);
}

# Actualizar los datos #
$actualizar_producto = conexion();
$actualizar_producto = $actualizar_producto->prepare("UPDATE producto SET
    producto_foto=:foto WHERE producto_id=:id");

$datos = [
    ":foto" => $foto,
    ":id" => $product_id
];

if ($actualizar_producto->execute($datos)) {
    echo '
            <div class="notification is-info is-light">
                <b>¡Imagen eliminada con exito!</b><br>
                El imagen del producto ha sido actualizada correctamente, pulse
                <b>Aceptar</b> para recargar los cambios.

                <p class="has-text-centered" pt-5 pb-5>
                    <a href=index.php?vista=product_img&product_id_up=' . $product_id . ' class="button-is-link" is-rounded>
                        Aceptar
                    </a>
                </p>
            </div>
        ';
} else {
    if (is_file($img_dir . $foto)) {
        chmod($img_dir . $foto, 0777);
        unlink($img_dir . $foto);
    }
    echo '
            <div class="notification is-warning is-light">
                <b>¡Ocurrio un error inesperado!</b><br>
                No podemos subir la imagen en este momento, favor de reintetar
            </div>
        ';
}
$actualizar_producto = null;
