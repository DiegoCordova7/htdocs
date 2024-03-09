<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Curriculum Diego</title>
</head>

<body>
    <main>
        <h1>
            Curriculum Diego
        </h1>
        <section>
            <h2>
                Informacion Personal
            </h2>
            <figure>
                <img src="img/cordovadiego.png" alt="foto Diego" width="150px">
                <figcaption>Foto de Diego Cordova</figcaption>
            </figure>
            <ul>
                <li>Correo Electronico: <strong>cordovadiegoemilio@gmail.com</strong></li>
                <li>Telefono: <em>6343476146</em></li>
            </ul>
        </section>
        <section>
            <h2>
                Educacion:
            </h2>
            <ul>
                <li>Kinder "Bello Principio" (2009-2011)</li>
                <li>Escuela Primaria "Nueva Creacion" (2011-2017)</li>
                <li>Secundaria "7 de noviembre" (2017-2020)</li>
                <li>Bachillerato: "CBTa No. 53" (2020-2023)</li>
            </ul>
        </section>
        <section>
            <h2>
                Habilidades
            </h2>
            <ul>
                <li>Conocimientos de HTML.</li>
                <li>Conocimientos de SQL.</li>
                <li>Conocimientos de PHP.</li>
                <li>Experiencia en Paginas Web.</li>
            </ul>
        </section>
        <section>
            <h2>
                Agregar Informacion
            </h2>
            <figure>
                <a href="http://unisierra.edu.mx" target="_blank">
                    <img src="img/unisierralogo.png" width="175px">
                </a>
                <figcaption><b>Unisierra</b></figcaption>
            </figure>
        </section>
        <hr>
        <section>
            <?php
            require_once "formulario.php";
            ?>
        </section>
        <hr>
        <section>

            <ul>
                <?php
                require_once "conexion.php";

                $sql = "SELECT * FROM datos";

                $resultado = mysqli_query($con, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    echo "<h2>Referencias</h2>";
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo
                        "<table border=" . "1" . " style=" . "border:1px solid black;margin-left:auto;margin-right:auto;" . ">
                                    <tbody>
                                        <th>";
                        if ($fila['img'] != NULL) {
                            echo "<img src=img/imgReferencia/FotoDePerfil.jpg width=90px>";
                            echo "<img src=" . $fila['img'] . " width=90px>";
                        } else {
                            echo "<img src=img/imgperfil.jpg width=90px>";
                        };
                        echo "
                                        </th>
                                        <th width=900px>
                                            <ul>" .
                            "<li><strong>Nombre:</strong> " . $fila['nombre'] .
                            "<li><strong>Correo:</strong> " . $fila['correo'] .
                            "<li><strong>Telefono:</strong> " . $fila['telefono'] .
                            "<li><strong>Puesto:</strong> " . $fila['puesto'] .
                            "<li><strong>Comentario:</strong> " . $fila['comentarios'] .
                            "</ul>
                                        </th>
                                    </tbody>
                                </table>
                                <hr>";
                    }
                } else {
                    echo "<h2>Referencias</h2>" .
                        "<li><strong>Nombre:</strong> </li>" .
                        "<li><strong>Correo:</strong> </li>" .
                        "<li><strong>Telefono:</strong> </li>" .
                        "<li><strong>Puesto:</strong> </li>" .
                        "<li><strong>Comentario:</strong> </li>";
                }
                mysqli_close($con);
                ?>
            </ul>
        </section>
    </main>
</body>

</html>