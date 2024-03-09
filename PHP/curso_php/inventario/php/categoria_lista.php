<?php
$inicio = ($pagina > 0) ? (($registro * $pagina) - $registro) : 0;
$tabla = "";

if (isset($busqueda) && $busqueda != "") {
    $consulta_datos = "SELECT * FROM categoria WHERE categoria_nombre LIKE '%$busqueda%'
        OR categoria_ubicacion LIKE '%$busqueda%' ORDER BY categoria_nombre ASC LIMIT $inicio,$registro";

    $consulta_total = "SELECT COUNT(categoria_id) FROM categoria WHERE
        categoria_nombre LIKE '%$busqueda%' OR categoria_ubicacion LIKE '%$busqueda%'";
} else {
    $consulta_datos = "SELECT * FROM categoria ORDER BY categoria_nombre ASC LIMIT $inicio,$registro";

    $consulta_total = "SELECT COUNT(categoria_id) FROM categoria";
}

$conexion = conexion();

$datos = $conexion->query($consulta_datos);
$datos = $datos->fetchAll();

$total = $conexion->query($consulta_total);
$total = (int) $total->fetchColumn();

$npaginas = ceil($total / $registro);

$tabla .= '
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr class="has-text-centered">
                        <th class="has-text-centered">#</th>
                        <th class="has-text-centered">Nombre</th>
                        <th class="has-text-centered">Ubicación</th>
                        <th class="has-text-centered">Productos</th>
                        <th colspan="2" class="has-text-centered">Opciones</th>
                    </tr>
                </thead>
                <body>
    ';

if ($total >= 1 && $pagina <= $npaginas) {
    $contador = $inicio + 1;
    $pag_inicio = $inicio + 1;
    foreach ($datos as $fila) {
        $tabla .= '
                <tr class="has-text-centered" >
                    <td>' . $contador . '</td>
                    <td>' . $fila['categoria_nombre'] . '</td>
                    <td>' . substr($fila['categoria_ubicacion'], 0, 25) . '</td>
                    <td>
                        <a href="index.php?vista=product_category&category_id=' . $fila['categoria_id'] . '" class="button is-link is-rounded is-small">Ver productos</a>
                    </td>
                    <td>
                        <a href="index.php?vista=category_update&category_id_up=' . $fila['categoria_id'] . '" class="button is-success is-rounded is-small">Actualizar</a>
                    </td>
                    <td>
                        <a href="' . $url . $pagina . '&category_id_del=' . $fila['categoria_id'] . '" class="button is-danger is-rounded is-small">Eliminar</a>
                    </td>
                </tr>
            ';
        $contador++;
    }
    $pag_final = $contador - 1;
} else {
    if ($total >= 1) {
        $tabla .= '
                <tr class="has-text-centered" >
                    <td colspan="6">
                        <a href="' . $url . '1" class="button is-link is-rounded is-small mt-4 mb-4">
                            Haga clic acá para recargar el listado
                        </a>
                    </td>
                </tr>
            ';
    } else {
        $tabla .= '
                <tr class="has-text-centered" >
                    <td colspan="6">
                        No hay registros en el sistema
                    </td>
                </tr>
            ';
    }
}


$tabla .= ' </tbody></table></div>';

if ($total >= 1 && $pagina <= $npaginas) {
    $tabla .= '<p class="has-text-right">Mostrando categorias <strong>' . $pag_inicio . '
        </strong> al <strong>' . $pag_final . '</strong> de un <strong>total de ' . $total . '</strong></p>';
}
$conexion = null;
echo $tabla;

if ($total >= 1 && $pagina <= $npaginas) {
    echo paginador_tablas($pagina, $npaginas, $url, 6);
}
