<?php
$product_id_del = limpiar_cadena($_GET['product_id_del']);

//Verificar el producto
$check_producto = conexion();
$check_producto = $check_producto->query("SELECT * FROM producto
    WHERE producto_id='$product_id_del'");

if ($check_producto->rowCount() == 1) {
    $datos = $check_producto->fetch();
    $eliminar_producto = conexion();
    $eliminar_producto = $eliminar_producto->prepare("DELETE FROM producto
        WHERE producto_id=:id");

    $eliminar_producto->execute([":id" => $product_id_del]);

    if ($eliminar_producto->rowCount() == 1) {
        if (is_file("./img/producto/" . $datos['producto_foto'])) {
            chmod("./img/producto/" . $datos['producto_foto'], 0777);
            unlink("./img/producto/" . $datos['producto_foto']);
        }

        echo '
                <div class="notification is-info is-light">
                    <b>¡Producto Eliminado Exitosamente!</b><br>
                    Los datos del producto se eliminaron correctamente.
                </div>
            ';
    } else {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    No se pudo eliminar el producto, por favor intente nuevamente
                </div>
            ';
    }
    $eliminar_producto = null;
} else {
    echo '
        <div class="notification is-danger is-light">
            <b>¡Ocurrio un error inesperado!</b><br>
            La producto que intenta eliminar no existe.
        </div>
    ';
}
$check_producto = null;
