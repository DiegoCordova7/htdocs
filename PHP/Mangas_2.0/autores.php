<?php
$config = include 'config.php';
$autores_id = $_GET["id"];

try {
  include "conexiones.php";
  $consultaSQL = "SELECT * FROM mangas ";
  $consultaSQL .= "INNER JOIN autores ";
  $consultaSQL .= "ON autores.id=mangas.autores_id ";
  $consultaSQL .= "WHERE autores.id=$autores_id ";
  $consultaSQL .= "ORDER BY mangas.nombre ASC";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $mangas = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}

include "templates/header.php";

echo "
    <div class=row>
      <div class=col-md-12>";
$n = 0;
if ($mangas && $sentencia->rowCount() > 0) {
  foreach ($mangas as $fila) {
    if ($n == 0) {
      echo "
        <h2 class=mt-3>
          Obras De " . $fila["autor_nombre"] . "
        </h2><br>
        <table>
          <tbody>";
      $n = $n + 1;
    }
    echo "
            <tr>
              <td>
                <div>
                  <img src=./img/mangas/$fila[img].jpg width=90 height=130 />
                </div><br>
              </td>
              <td width=50></td>
              <td>
                <a href=mangas.php?manga_id=" . $fila["mangas_id"] . ">
                  <h5>
                    $fila[nombre].
                  </h5>
                </a>
              </td>
            </tr>";
  }
}
echo "
          </tbody>
        </table>
      </div>
    </div>";
include "templates/footer.php";
