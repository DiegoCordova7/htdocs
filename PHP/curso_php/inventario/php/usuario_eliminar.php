<?php
$user_id_del = limpiar_cadena($_GET['user_id_del']);
$check_usuario = conexion();
$check_usuario = $check_usuario->query("SELECT usuario_id FROM usuarios
    WHERE usuario_id='$user_id_del'");
if ($check_usuario->rowCount() == 1) {
    $check_productos = conexion();
    $check_productos = $check_productos->query("SELECT usuario_id FROM producto
        WHERE usuario_id='$user_id_del' LIMIT 1");
    if ($check_productos->rowCount() <= 0) {
        $eliminar_usuario = conexion();
        $eliminar_usuario = $eliminar_usuario->prepare("DELETE FROM usuarios
            WHERE usuario_id=:id");
        $eliminar_usuario->execute([":id" => $user_id_del]);
        if ($eliminar_usuario->rowCount() == 1) {
            echo '
                    <div class="notification is-info is-light">
                        <b>¡Usuario Eliminado Exitosamente!</b><br>
                        Los datos del usuario se eliminaron correctamente.
                    </div>
                ';
        } else {
            echo '
                    <div class="notification is-danger is-light">
                        <b>¡Ocurrio un error inesperado!</b><br>
                        No se pudo eliminar al usuario, por favor intente nuevamente
                    </div>
                ';
        }
        $eliminar_usuario = null;
    } else {
        echo '
                <div class="notification is-danger is-light">
                    <b>¡Ocurrio un error inesperado!</b><br>
                    No podemos el usuario ya que tiene productos registrados.
                </div>
            ';
    }
    $check_productos = null;
} else {
    echo '
        <div class="notification is-danger is-light">
            <b>¡Ocurrio un error inesperado!</b><br>
            El usuario a borrar no existe.
        </div>
    ';
}
$check_usuario = null;
