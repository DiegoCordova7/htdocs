<form action='' method='POST' class="box login" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
    <fieldset>
        <legend><strong> Datos: </strong></legend>
        <label for='nombre'> Nombre:
            <input type="text" name="nombre" placeholder="Tu nombre" pattern="[a-zA-ZÀ-ÖØ-öø-ÿ ]{2,100}" style="width: 200px;" require>
        </label><br><br>
        <label for='correo'> Correo:
            <input type="email" name="correo" placeholder="Correo Electronico" pattern="[a-zA-Z0-9$@.-]{7,100}" style="width: 200px;" require>
        </label><br><br>
        <label for='telefono'> Telefono:
            <input type="number" name="telefono" placeholder="No. Telefono" pattern="[0-9]{10}" style="width: 100px;" require>
        </label><br><br>
        <label for="nombreFoto"> Nombre De La Foto:
            <input type="text" id="nombreFoto" name="nombreFoto" style="width: 100px;">
        </label><br><br>
        <label for="img"> Foto:
            <input type="file" id="img" name="img">
        </label>
    </fieldset>
    <fieldset>
        <legend><strong> Puestos: </strong></legend>
        <label for='puesto'> Puesto:
            <input type="text" name="puesto" placeholder="Puesto" pattern="[a-zA-ZÀ-ÖØ-öø-ÿ ]{7,100}" style="width: 250px;" require>
        </label><br><br>
        <label for='comentario'> Comentario:
            <br><textarea type="text" id="comentarios" name="comentarios" placeholder="Algo a comentar?" pattern="[a-zA-ZÀ-ÖØ-öø-ÿ., ]{7,100}" style="width: 350px;"></textarea>
        </label><br><br>
        <button type='submit'>Enviar</button>
    </fieldset>
</form>
<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = ($_POST['nombre']);
    $correo = ($_POST['correo']);
    $telefono = ($_POST['telefono']);
    $puesto = ($_POST['puesto']);
    $comentarios = ($_POST['comentarios']);
    $nombreFoto = ($_POST['nombreFoto']);
    # Verificar que lleno los campos oblgatorios #

    if ($nombre == "" || $correo == "" || $telefono == "" || $puesto == "") {
        echo '
                <div>
                    <b>¡Ocurrio un error inesperado!</b><br>
                    No has llenado todos los campos que son obligatorios
                </div>
            ';
        exit();
    }

    # Verficicar el correo #

    if ($correo != "") {
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $check_correo = conexion();
            $check_correo = $check_correo->query("SELECT correo
                FROM datos WHERE correo='$correo'");
            if ($check_correo->rowCount() > 0) {
                echo '
                        <div class="notification is-danger is-light">
                            <b>¡Ocurrio un error inesperado!</b><br>
                            El Correo ingresado ya se encuentra registrado, favor de ingresar otro.
                        </div>
                    ';
                exit();
            }
            $check_correo = null;
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

    # Verificar el telefono #

    $check_telefono = conexion();
    $check_telefono = $check_telefono->query("SELECT telefono
            FROM datos WHERE telefono='$telefono'");
    if ($check_telefono->rowCount() > 0) {
        echo '
                    <div class="notification is-danger is-light">
                        <b>¡Ocurrio un error inesperado!</b><br>
                        El telefono ingresado ya se encuentra registrado, favor de ingresar otro.
                    </div>
                ';
        exit();
    }
    $check_telefono = null;

    $imagen = "img/imgReferencia/" . $nombreFoto . ".png"; //Sigues viendo lo de la imagen el nuevo enfoque es enviarla a una carpeta, obtener su extension y junto con su nombre traerla de la carpeta
    move_uploaded_file($_FILES['img']['tmp_name'], $imagen . $_FILES['img']['name']);
    $guardar_referencia = conexion();
    $guardar_referencia = $guardar_referencia->prepare("INSERT INTO datos (nombre,correo,telefono,puesto,comentarios,img)
        VALUES (:nombre,:correo,:telefono,:puesto,:comentarios,:img)");

    $datos_registro = [
        ":nombre" => $nombre,
        ":correo" => $correo,
        ":telefono" => $telefono,
        ":puesto" => $puesto,
        ":comentarios" => $comentarios,
        ":img" => $imagen,
    ];

    $guardar_referencia->execute($datos_registro);
    $guardar_referencia = null;
}
?>