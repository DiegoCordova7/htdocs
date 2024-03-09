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
  $conexion->exec("set names utf8");
  
  //Formamos la consulta a nuestra tabal
  $consultaSQL = "SELECT * FROM productos";

  // Aqui se ejecuta la consulta ¡en caso de error nos envia el mensaje
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $productos = $sentencia->fetchAll();
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
    <h2 class="mt-3">Productos</h2>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>No. Existencias</th>
          <th>Descricion</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Preguntamos si la consulta regreso renglones
        if ($productos && $sentencia->rowCount() > 0) {
          //en caso de encontrar, recoremos fila por fila y la creamos como tabla
          foreach ($productos as $fila) {
        ?>
            <tr>
              <!-- La variable $fila alamcena cada renglon de la DB, y la columna se accede $fila["columna"] -->
              <td><?php echo escapar($fila["id"]); ?></td>
              <td><?php echo escapar($fila["codigo"]); ?></td>
              <td><?php echo escapar($fila["existencias"]); ?></td>
              <td><?php echo escapar($fila["descripcion"]); ?></td>
              <td><?php echo escapar($fila["precio"]); ?></td>
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