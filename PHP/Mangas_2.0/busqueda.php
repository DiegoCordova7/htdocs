<?php
$filtro = "";
$config = include 'config.php';
try {
  include "conexiones.php";
  if (isset($_POST['filtro1'])) {
    $consultaSQL = "SELECT * FROM mangas ";
    $consultaSQL .= "INNER JOIN autores ";
    $consultaSQL .= "ON autores.id=mangas.autores_id ";
    $consultaSQL .= "INNER JOIN demografia ";
    $consultaSQL .= "ON demografia.id=mangas.demografia_id ";
    $consultaSQL .= "INNER JOIN estado ";
    $consultaSQL .= "ON estado.id=mangas.estado_id ";
    $consultaSQL .= "WHERE nombre LIKE '%" . $_POST['filtro1'] . "%'";
    $consultaSQL .= "ORDER BY nombre ASC ";
    $filtro = $_POST['filtro1'];
  } else if (isset($_POST['filtro2'])) {
    $consultaSQL = "SELECT * FROM mangas ";
    $consultaSQL .= "INNER JOIN autores ";
    $consultaSQL .= "ON autores.id=mangas.autores_id ";
    $consultaSQL .= "INNER JOIN demografia ";
    $consultaSQL .= "ON demografia.id=mangas.demografia_id ";
    $consultaSQL .= "INNER JOIN estado ";
    $consultaSQL .= "ON estado.id=mangas.estado_id ";
    $consultaSQL .= "WHERE fecha_creacion LIKE '%" . $_POST['filtro2'] . "%'";
    $consultaSQL .= "ORDER BY nombre ASC ";
    $filtro = $_POST['filtro2'];
  } else {
    $consultaSQL = "SELECT * FROM mangas ";
    $consultaSQL .= "INNER JOIN autores ";
    $consultaSQL .= "ON autores.id=mangas.autores_id ";
    $consultaSQL .= "INNER JOIN demografia ";
    $consultaSQL .= "ON demografia.id=mangas.demografia_id ";
    $consultaSQL .= "INNER JOIN estado ";
    $consultaSQL .= "ON estado.id=mangas.estado_id ";
    $consultaSQL .= "ORDER BY nombre ASC";
  }
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();
  $mangas = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
include "templates/header.php";
echo "
  <div class=row>
    <div class=row align=center>
      <div class=col-md-6>
        <form method=post class=form-inline>
          <div class=form-group mr-3>
            <input type=text id=filtro1 name=filtro1 placeholder=Nombre class=form-control>
          </div>
          <button type=submit name=submit class=" . '"btn btn-primary"' . ">Buscar</button>
        </form>
      </div>
      <div class=col-md-6>
        <form method=post class=form-inline>
          <div class=form-group mr-3>
            <input type=text id=filtro2 name=filtro2 placeholder=" . '"Año De Estreno"' . " class=form-control>
          </div>
          <button type=submit name=submit class=" . '"btn btn-primary"' . ">Buscar</button>
        </form><br>
      </div>
      <div class=col-md-12>
        <table border=1>
          <thead>
            <tr>
              <th margin=50%>
                <p align=center style=padding:15px>
                  <b>
                    Obra
                  </b>
                </p>
              </th>
              <th>
                <p align=center style=padding:15px>
                  <b>
                    Reseña
                  </b>
                </p>
              </th>
              <th>
                <p align=center style=padding:15px>
                  <b>
                    Año De Estreno
                  </b>
                </p>
              </th>
              <th>
                <p align=center style=padding:15px>
                  <b>
                    Más Información
                  </b>
                </p>
              </th>
            </tr>
          </thead>
          <tbody>";
if (isset($mangas) && $sentencia->rowCount() > 0) {
  foreach ($mangas as $fila) {
    echo "
            <tr align=center>
              <td>
                <p align=center style=padding-top:20px;padding-left:20px;padding-right:20px>
                  <b>
                    $fila[nombre]
                  </b>
                </p>
                <p align=center>
                  <img src=./img/mangas/$fila[img].jpg width=95 height=125 />
                </p>
              </td>
              <td>
                <div style=padding:25px>
                  <p align=justify>
                    $fila[resena]
                  </p>
                </div>
              </td>
              <td>
                <p align=center style=padding:25px>
                  <u>
                    $fila[fecha_creacion]
                  </u>
                </p>
              </td>
              <td>
                <a href=./mangas.php?manga_id=$fila[mangas_id] target =_parent>
                  <i>
                    <p style=padding:25px>Más Detalles</p>
                  </i>
                </a>
              </td>
            </tr>";
  }
} else {
  echo "<p class=alert alert-warning role=alert>No se encontraror resultados para: <b> $filtro </b></p>";
}
echo "
          </tbody>
      </table><br>
      </div>
    </div>
  </div>";
include "./templates/footer.php";
