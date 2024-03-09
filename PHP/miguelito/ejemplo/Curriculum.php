<section>
    <?php
    $sql = "SELECT * FROM empleadoresarturo";
    $resultado = mysqli_query($con, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h2>Referencias</h2>";
        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo
            "<ul>" .
                "<li><strong>Nombre:</strong> " . $fila['nombre'] .
                "<li><strong>Correo:</strong> " . $fila['correo'] .
                "<li><strong>Telefono:</strong> " . $fila['telefono'] .
                "<li><strong>Puesto:</strong> " . $fila['puesto'] .
                "<li><strong>Empresa:</strong> " . $fila['empresa'] .
                "<li><strong>Comentario:</strong> " . $fila['comentarios'] .
                "</ul><hr>";
        }
    } else {
        echo "<h2>Referencias</h2><ul>" .
            "<li><strong>Nombre:</strong> </li>" .
            "<li><strong>Correo:</strong> </li>" .
            "<li><strong>Telefono:</strong> </li>" .
            "<li><strong>Puesto:</strong> </li>" .
            "<li><strong>Empresa:</strong> " .
            "<li><strong>Comentario:</strong> </li></ul>";
    }
    mysqli_close($con);
    ?>
</section>