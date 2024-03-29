<?php
$category_id_del = limpiar_cadena($_GET['category_id_del']);

//Verificar la categoria
$check_categoria = conexion();
$check_categoria = $check_categoria->query("SELECT categoria_id FROM categoria
    WHERE categoria_id='$category_id_del'");

if ($check_categoria->rowCount() == 1) {
    $check_productos = conexion();
    $check_productos = $check_productos->query("SELECT categoria_id FROM producto
        WHERE categoria_id='$category_id_del' LIMIT 1");

    if ($check_productos->rowCount() <= 0) {
        $eliminar_categoria = conexion();
        $eliminar_categoria = $eliminar_categoria->prepare("DELETE FROM categoria
            WHERE categoria_id=:id");

        $eliminar_categoria->execute([":id" => $category_id_del]);

        if ($eliminar_categoria->rowCount() == 1) {
            echo '
                    <div class="notification is-info is-light">
                        <b>¡Categoria Eliminado Exitosamente!</b><br>
                        Los datos de la categoria se eliminaron correctamente.
                    </div>
                ';
        } else {
            echo '
                    <div class="notification is-danger is-light">
                        <b>¡Ocurrio un error inesperado!</b><br>
                        No se pudo eliminar la categoria, por favor intente nuevamente
                    </div>
                ';
        }
        $eliminar_categoria = null;
    } else {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    No podemos la categoria ya que tiene productos asociados.
                </div>
            ';
    }
    $check_productos = null;
} else {
    echo '
        <div class="notification is-danger is-light">
            <b>¡Ocurrio un error inesperado!</b><br>
            La categoria que intenta eliminar no existe.
        </div>
    ';
}
$check_categoria = null;
