<?php
$config = include "config.php";
$id = $_GET["manga_id"];

try {
  include "conexiones.php";
  $consultaSQL = "SELECT * FROM mangas ";
  $consultaSQL .= "INNER JOIN autores ";
  $consultaSQL .= "ON autores.id=mangas.autores_id ";
  $consultaSQL .= "INNER JOIN estado ";
  $consultaSQL .= "ON estado.id=mangas.estado_id ";
  $consultaSQL .= "INNER JOIN demografia ";
  $consultaSQL .= "ON demografia.id=mangas.demografia_id ";
  $consultaSQL .= "WHERE mangas.mangas_id=" . $id . "";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $mangas = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
include "./templates/header.php";
echo "
  <div class=row>
    <div class=col-md-12>";
if ($mangas && $sentencia->rowCount() > 0) {
  foreach ($mangas as $fila) {
    echo "
      <h1 class=mt-3 align=center>"
      . $fila["nombre"] .
      "</h1>
      <div align=center>
      <img src=./img/mangas/$fila[img].jpg width=180 height=275/>
      </div>
      <br>
      <center>
        <div style=width:90%>
          <p align=justify>"
      . $fila["resena"] .
      "</p>
          <p>
            <b>
              Tipo: 
            </b>"
      . $fila["tipo"] . ".
          </p>
          <p>
            <b>
              Autor: 
            </b>
            <a href=autores.php?id=" . $fila["autores_id"] . ">"
      . $fila["autor_nombre"] .
      "</a>.
          </p>
          <p>
            <b>
              Estado: 
            </b>"
      . $fila["estado_act"] .
      ".</p>
          <p>
            <b>
              Número De Capitulos: 
            </b>"
      . $fila["num_capitulos"] .
      ".</p>
          <p>
            <b>
              Número De Volúmenes: 
            </b>"
      . $fila["num_volumenes"] .
      ".</p>
          <p>
            <b>
              Año De Estreno: 
            </b>"
      . $fila["fecha_creacion"] .
      ".</p>
          <a href=https://drive.google.com/drive/folders/" . $fila["descarga"] . " target=_blank>
            <img src=./img/descargamanga.png width=250 height=75 alt=link de descarga>
          </a>
        </div>
      </center>
    ";
  }
}
echo "
    </div>
  </div>";
include "./templates/footer.php";
