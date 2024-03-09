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
  $consultaSQL = "SELECT * FROM clientes";

  // Aqui se ejecuta la consulta ¡en caso de error nos envia el mensaje
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $clientes = $sentencia->fetchAll();
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
    <h2 class="mt-3">Clientes</h2>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>RFC</th>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Paterno</th>
		  <th>Telefono</th>
          <th>Direccion</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Preguntamos si la consulta regreso renglones
        if ($clientes && $sentencia->rowCount() > 0) {
          //en caso de encontrar, recoremos fila por fila y la creamos como tabla
          foreach ($clientes as $fila) {
        ?>
            <tr>
              <!-- La variable $fila alamcena cada renglon de la DB, y la columna se accede $fila["columna"] -->
              <td><?php echo escapar($fila["id"]); ?></td>
              <td><?php echo escapar($fila["rfc"]); ?></td>
              <td><?php echo escapar($fila["nombre_cliente"]); ?></td>
              <td><?php echo escapar($fila["apaterno"]); ?></td>
              <td><?php echo escapar($fila["amaterno"]); ?></td>
			  <td><?php echo escapar($fila["telefono"]); ?></td>
			  <td><?php echo escapar($fila["direccion"]); ?></td>
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