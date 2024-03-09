<?php
$inicio = ($pagina > 0) ? (($registro * $pagina) - $registro) : 0;

$tabla = "";

$campos = "producto.producto_id,producto.producto_codigo,producto.producto_nombre,
    producto.producto_precio,producto.producto_stock,producto.producto_foto,
    categoria.categoria_nombre,usuarios.usuario_nombre,usuarios.usuario_apellido";

if (isset($busqueda) && $busqueda != "") {
    $consulta_datos = "SELECT $campos FROM producto
        INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id
        INNER JOIN usuarios ON producto.usuario_id=usuarios.usuario_id
        WHERE producto.producto_codigo LIKE '%$busqueda%' OR producto.producto_nombre LIKE '%$busqueda%'
        ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registro";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto
        WHERE producto_codigo LIKE '%$busqueda%' OR producto_nombre LIKE '%$busqueda%'";
} elseif ($categoria_id > 0) {
    $consulta_datos = "SELECT $campos FROM producto
        INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id
        INNER JOIN usuarios ON producto.usuario_id=usuarios.usuario_id
        WHERE producto.categoria_id='$categoria_id'
        ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registro";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto
        WHERE categoria_id='$categoria_id'";
} else {
    $consulta_datos = "SELECT $campos FROM producto
        INNER JOIN categoria ON producto.categoria_id=categoria.categoria_id
        INNER JOIN usuarios ON producto.usuario_id=usuarios.usuario_id
        ORDER BY producto.producto_nombre ASC LIMIT $inicio,$registro";

    $consulta_total = "SELECT COUNT(producto_id) FROM producto";
}

$conexion = conexion();

$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$npaginas = ceil($total / $registro);

if ($total >= 1 && $pagina <= $npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;
    foreach ($datos as $fila) {
        $tabla .= '
                <article class="media">
                    <figure class="media-left">
                        <p class="image is-64x64">';
        if (is_file("./img/producto/" . $fila['producto_foto'])) {
            $tabla .= '<img src="./img/producto/' . $fila['producto_foto'] . '">';
        } else {
            $tabla .= '<img src="./img/producto.png">';
        }
        $tabla .= '</p>
                    </figure>
                    <div class="media-content">
                        <div class="content">
                            <p>
                                <strong>' . $contador . ' - ' . $fila['producto_nombre'] . '</strong><br>
                                <strong>CODIGO:</strong> ' . $fila['producto_codigo'] . ', 
                                <strong>PRECIO:</strong> $' . $fila['producto_precio'] . ', 
                                <strong>STOCK:</strong> ' . $fila['producto_stock'] . ', 
                                <strong>CATEGORIA:</strong> ' . $fila['categoria_nombre'] . ', 
                                <strong>REGISTRADO POR:</strong> ' . $fila['usuario_nombre'] . ' ' . $fila['usuario_apellido'] . '
                            </p>
                        </div>
                        <div class="has-text-right">
                            <a href="index.php?vista=product_img&product_id_up=' . $fila['producto_id'] . '" class="button is-link is-rounded is-small">Imagen</a>
                            <a href="index.php?vista=product_update&product_id_up=' . $fila['producto_id'] . '" class="button is-success is-rounded is-small">Actualizar</a>
                            <a href="' . $url . $pagina . '&product_id_del=' . $fila['producto_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
                        </div>
                    </div>
                </article>
                <hr>
            ';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '
                <center>
                    <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </center>
            ';
    } else {
        $tabla .= '
                <p class="has-text-centered">
                    No hay registros en el sistema
                </p>
            ';
    }
}

if ($total >= 1 && $pagina <= $npaginas) {
    $tabla .= '<p class="has-text-right">Mostrando productos <strong>' . $pag_inicio . '
        </strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}
$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $npaginas) {
    echo paginador_tablas($pagina, $npaginas, $url, 6);
}
