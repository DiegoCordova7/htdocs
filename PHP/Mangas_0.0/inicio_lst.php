<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include 'config.php';

try {
  // Aqui se establece la conexion a la base de datos
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  //Formamos la consulta a nuestra tabal
  $consultaSQL = "SELECT * FROM inicio";

  // Aqui se ejecuta la consulta ¡en caso de error nos envia el mensaje
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $inicio = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
?>

<!-- Aqui empieza la pagina HTML -->
<?php include "templates/header.php"; ?>

<?php
// Si hay error lo mostraremos en esta etiqueta
if ($error) {
?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
<!-- En este rengolon ira la tabla con los resultados -->
<div class="row">
  <div class="col-md-12">
    <h2 class="mt-3">Lista del Inicio</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Ids</th>
          <th>Introduccion</th>
          <th>Portada</th>
          <th>Nombre Del Manga</th>
          <th>Letra De Inicio</th>
          <th>Mangas Id</th>
          <th>Contacto</th>
          <th>Direccion</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Preguntamos si la consulta regreso renglones
        if ($inicio && $sentencia->rowCount() > 0) {
          //en caso de encontrar, recoremos fila por fila y la creamos como tabla
          foreach ($inicio as $fila) {
        ?>
            <tr>
              <!-- La variable $fila alamcena cada renglon de la DB, y la columna se accede $fila["columna"] -->
              <td><?php echo $fila["id"]; ?></td>
              <td><?php echo $fila["introduccion"]; ?></td>
              <td><img src="data:image/jpg;charset=utf8;base64,<?php echo $fila['portada']; ?>" /></td>
              <td><?php echo $fila["nombre_manga"]; ?></td>
              <td><?php echo $fila["letra_inicio"]; ?></td>
              <td><?php echo $fila["manga_id"]; ?></td>
              <td><?php echo $fila["contacto"]; ?></td>
              <td><?php echo $fila["direccion"]; ?></td>
            </tr>
        <?php
          }
        }
        ?>
      <tbody>
    </table>
  </div>
</div>
<?php include "templates/footer.php"; ?>