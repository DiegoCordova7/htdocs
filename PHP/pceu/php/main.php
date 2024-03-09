<?php
# Asi se conecta a la base de datos #
function conexion()
{
    $pdo = new PDO('mysql:host=localhost;dbname=inventario', 'root', '');
    return $pdo;
};

# Verificacion de datos #

function verificar_datos($filtro, $cadena)
{
    if (preg_match('/^' . $filtro . '$/', $cadena)) {
        return false;
    } else {
        return true;
    }
}

# Limpiar cadenas de texto #

function limpiar_cadena($cadena)
{
    //trim elimina espacios en blanco al inicio o final de una cadena de texto
    $cadena = trim($cadena);
    //striplaches quita las barras de un string con comillas espaciadas
    $cadena = stripslashes($cadena);
    //str_ireplace es insensible de mayus o minus
    //esto se pone para evitar inyeciones tanto js con sql al codigo
    $cadena = str_ireplace("<script>", "", $cadena);
    $cadena = str_ireplace("</script>", "", $cadena);
    $cadena = str_ireplace("<script src", "", $cadena);
    $cadena = str_ireplace("<script type=", "", $cadena);
    $cadena = str_ireplace("SELECT * FROM", "", $cadena);
    $cadena = str_ireplace("DELETE FROM", "", $cadena);
    $cadena = str_ireplace("INSERT INTO", "", $cadena);
    $cadena = str_ireplace("DROP TABLE", "", $cadena);
    $cadena = str_ireplace("DROP DATABASE", "", $cadena);
    $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
    $cadena = str_ireplace("SHOW TABLES;", "", $cadena);
    $cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
    $cadena = str_ireplace("<?php", "", $cadena);
    $cadena = str_ireplace("?>", "", $cadena);
    $cadena = str_ireplace("--", "", $cadena);
    $cadena = str_ireplace("^", "", $cadena);
    $cadena = str_ireplace("<", "", $cadena);
    $cadena = str_ireplace("[", "", $cadena);
    $cadena = str_ireplace("]", "", $cadena);
    $cadena = str_ireplace("==", "", $cadena);
    $cadena = str_ireplace(";", "", $cadena);
    $cadena = str_ireplace("::", "", $cadena);
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    return $cadena;
}

#renombrar las fotos#

function renombrar_fotos($nombre)
{
    $nombre = str_ireplace(" ", "_", $nombre);
    $nombre = str_ireplace("/", "_", $nombre);
    $nombre = str_ireplace("#", "_", $nombre);
    $nombre = str_ireplace("-", "_", $nombre);
    $nombre = str_ireplace("$", "_", $nombre);
    $nombre = str_ireplace(".", "_", $nombre);
    $nombre = str_ireplace(",", "_", $nombre);
    $nombre = $nombre . '_' . rand(0, 100);
    return $nombre;
}

# Paginador de Tablas #

function paginador_tablas($pagina, $npaginas, $url, $botones)
{
    $tabla = '<nav class="pagination is-centered is-rounded"
    role="navigation" aria-label="pagination">';

    if ($pagina <= 1) {
        $tabla .= '
        <a class="pagination-previous is-disabled" disabled >Anterior</a>
        <ul class="pagination-list">
        ';
    } else {
        $tabla .= '
        <a class="pagination-previous" href="' . $url . ($pagina - 1) . '">Anterior</a>
        <ul class="pagination-list">
		    <li><a class="pagination-link is-current" href="' . $url . '1">1</a></li>
            <li><span class="pagination-ellipsis">&hellip;</span></li>

	    </ul>
        ';
    }

    $ci = 0;
    for ($i = $pagina; $i <= $npaginas; $i++) {

        if ($ci >= $botones) {
            break;
        } else {
            $ci++;
        };

        if ($pagina == $i) {
            $tabla .= '<li><a class="pagination-link is current" href="' . $url . $i . '">'
                . $i . '</a></li>';
        } else {
            $tabla .= '<li><a class="pagination-link" href="' . $url . $i . '">'
                . $i . '</a></li>';
        }
    }

    if ($pagina == $npaginas) {
        $tabla .= '
        </ul>
        <a class="pagination-next is-disabled" disabled>Siguiente</a>
        ';
    } else {
        $tabla .= '
            <li><span class="pagination-ellipsis">&hellip;</span></li>
            <li><a class="pagination-link" href="' . $url . $npaginas . '">' .
            $npaginas . '</a></li>
        </ul>
        <a class="pagination-next" href="' . $url . ($pagina + 1) . '">Siguiente</a>

        ';
    }

    $tabla .= '</nav>';

    return $tabla;
}
