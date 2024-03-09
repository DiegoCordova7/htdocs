<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$filtro = "";
$config = include 'config.php';

try {
  // Aquí se establece la conexión a la base de datos
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  //Aquí preguntamos si el filtro1 trae algún valor para filtrar  
  if (isset($_POST['filtro1'])) {
    //en caso de traer un filtro hacemos la conuslta con filtro, en mi caso e filtro 1 es para el apellido
    //Nota: .= solo va a partir de la segunda parte de la consulta.
    $consultaSQL = "SELECT * FROM paquetes P" . PHP_EOL;
	$consultaSQL .= "INNER JOIN repartidores R" . PHP_EOL;
	$consultaSQL .= "ON R.id=P.repartidor_id" . PHP_EOL;
	$consultaSQL .= "INNER JOIN clientes C" . PHP_EOL;
	$consultaSQL .= "ON C.id=P.cliente_id" . PHP_EOL;
    $consultaSQL .= "WHERE fecha_entrega LIKE '%" . $_POST['filtro1'] . "%'";


    //Se usa en la tabla para cuando no hay registros
    $filtro = $_POST['filtro1'];

    //Aquí preguntamos si el filtro2 trae algun valor para filtrar    
  } else if (isset($_POST['filtro2'])) {
    //en caso de traer un filtro hacemos la conuslta con filtro, en mi caso e filtro 1 es para el correo
    $consultaSQL = "SELECT * FROM paquetes P" . PHP_EOL;
	$consultaSQL = "SELECT * FROM paquetes P" . PHP_EOL;
	$consultaSQL .= "INNER JOIN repartidores R" . PHP_EOL;
	$consultaSQL .= "ON R.id=P.repartidor_id" . PHP_EOL;
	$consultaSQL .= "INNER JOIN clientes C" . PHP_EOL;
	$consultaSQL .= "ON C.id=P.cliente_id" . PHP_EOL;
    $consultaSQL .= "WHERE descripcion LIKE '%" . $_POST['filtro2'] . "%'";
	
    //Se usa en la tabla para cuando no hay registros
    $filtro = $_POST['filtro2'];

    //Aquí llegaríamos si no hay filtro
  } else {
    //si no traemos filtro seleccionamos todos
	$consultaSQL = "SELECT * FROM paquetes P" . PHP_EOL;
	$consultaSQL .= "INNER JOIN repartidores R" . PHP_EOL;
	$consultaSQL .= "ON R.id=P.repartidor_id" . PHP_EOL;
	$consultaSQL .= "INNER JOIN clientes C" . PHP_EOL;
	$consultaSQL .= "ON C.id=P.cliente_id" . PHP_EOL;
  }


  // Aquí se ejecuta la consulta ¡en caso de error nos envia el mensaje
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $paquetes = $sentencia->fetchAll();
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
<!-- Aquí se crea el formulario para mandar buscar a la base de datos -->
<div class="row">
  <!-- Filtro uno, cambiar los datos correspondientes -->
  <div class="col-md-6">
    <!-- Empezamos el formulario -->
    <form method="post" class="form-inline">
      <div class="form-group mr-3">
        <!-- En este input, se guarda el texto que el usuario pone, después se envía en el parámetro "filtro1", y se utiliza en la linea 18-->
        <input type="text" id="filtro1" name="filtro1" placeholder="Fecha De Entrega" class="form-control">
      </div>
      <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
      <button type="submit" name="submit" class="btn btn-primary">Ver</button>
    </form>
  </div>

  <div class="col-md-6">
    <!-- Empezamos el formulario -->
    <form method="post" class="form-inline">
      <div class="form-group mr-3">
        <!-- En este input, se guarda el texto que el usuario pone, después se envía en el parámetro "filtro2", y se utiliza en la linea 22-->
        <input type="text" id="filtro2" name="filtro2" placeholder="Descripcion" class="form-control">
      </div>
      <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
      <button type="submit" name="submit" class="btn btn-primary">Ver</button>
    </form>
  </div>
</div>

<!-- En este renglón ira la tabla con los resultados -->
<div class="row">
  <div class="col-md-12">
    <h2 class="mt-3">Paquetes</h2>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Descripcion</th>
          <th>Direccion</th>
          <th>Repartidor</th>
		  <th>Cliente</th>
		  <th>Fecha De Entrega</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Preguntamos si la consulta regreso renglones
        if (isset($paquetes) && $sentencia->rowCount() > 0) {
          //en caso de encontrar, recorremos fila por fila y la creamos como tabla
          foreach ($paquetes as $fila) {
        ?>
            <tr>
              <!-- La variable $fila almacena cada renglón de la DB, y la columna se accede $fila["columna"] -->
              <td><?php echo escapar($fila["id"]); ?></td>
              <td><?php echo escapar($fila["codigo"]); ?></td>
              <td><?php echo escapar($fila["descripcion"]); ?></td>
              <td><?php echo escapar($fila["direccion"]); ?></td>
              <td><?php echo escapar($fila["nombre"]); ?></td>
			  <td><?php echo escapar($fila["nombre_cliente"]); ?></td>
			  <td><?php echo escapar($fila["fecha_entrega"]); ?></td>
            </tr>
          <?php
          }
        } else {
          ?>

          <p class="alert alert-warning" role="alert">No se encontraror resultados para: <b><?= $filtro ?></b></p>

        <?php
        }
        ?>
      <tbody>
    </table>
  </div>
</div>

<?php include "templates/footer.php"; ?>