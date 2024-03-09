<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include 'config.php';
  
try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $conexion->exec("set names utf8");

    $consultaSQL = "SELECT *,M.id as idManga FROM mangas M" . PHP_EOL;
	$consultaSQL .= "INNER JOIN autores A ";
	$consultaSQL .= "ON A.id=autores_id ";
	$consultaSQL .= "INNER JOIN estado E ";
	$consultaSQL .= "ON E.id=estado_id ";
	$consultaSQL .= "INNER JOIN demografia D ";
	$consultaSQL .= "ON D.id=demografia_id ";
	$consultaSQL .= "WHERE M.id=13";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $mangas = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
?>

<?php include "templates/header.php"; ?>

<?php
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
<div class="row">
  <div class="col-md-12">
        <?php
        if ($mangas && $sentencia->rowCount() > 0) {
          foreach ($mangas as $fila) {
        ?>
	<h2 class="mt-3"><?php echo escapar($fila["nombre"]); ?></h2>
    <p><img src="data:image/jpg;charset=utf8;base64,<?php echo ($fila['imagen']);?>" /></p>
    <p><?php echo escapar($fila["resena"]); ?></p>
	<p><b>Tipo: </b><?php echo escapar($fila["tipo"]); ?></p>
	<p><b>Autor: </b><a href="../2.autores/<?php echo ($fila["direccion"]); ?>.php" target="_parent"><?php echo $fila["autor_nombre"]; ?></a></p>
	<p><b>Estado: </b><?php echo escapar($fila["estado_act"]); ?></p>
	<p><b>Número De Capitulos: </b><?php echo escapar($fila["num_capitulos"]); ?></p>
	<p><b>Número De Volúmenes: </b><?php echo escapar($fila["num_tomos"]); ?></p>
	<p><b>Año De Estreno: </b><?php echo escapar($fila["fecha_creacion"]); ?></p>
	<p><a href="<?php echo escapar($fila["tomos"]); ?>" target="_black"><img src="img\descargamanga.png" width="350" height="100" alt="link de descarga"></a></p>
        <?php
          }
        }
        ?>
  </div>
</div>
<?php include "templates/footer.php"; ?>