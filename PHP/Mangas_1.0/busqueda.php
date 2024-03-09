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
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $conexion->exec("set names utf8");

  if (isset($_POST['filtro1'])) {
    $consultaSQL = "SELECT *,M.id as idManga FROM mangas M" . PHP_EOL;
    $consultaSQL .= "INNER JOIN inicio I " . PHP_EOL;
    $consultaSQL .= "ON M.id=manga_id " . PHP_EOL;
    $consultaSQL .= "WHERE M.nombre LIKE '%" . $_POST['filtro1'] . "%'";

    $filtro = $_POST['filtro1'];
  } else if (isset($_POST['filtro2'])) {

    $consultaSQL = "SELECT *,M.id as idManga FROM mangas M" . PHP_EOL;
    $consultaSQL .= "INNER JOIN autores A " . PHP_EOL;
    $consultaSQL .= "ON A.id=autores_id " . PHP_EOL;
    $consultaSQL .= "INNER JOIN estado E " . PHP_EOL;
    $consultaSQL .= "ON E.id=estado_id " . PHP_EOL;
    $consultaSQL .= "INNER JOIN demografia D " . PHP_EOL;
    $consultaSQL .= "ON D.id=demografia_id " . PHP_EOL;
    $consultaSQL .= "WHERE fecha_creacion LIKE '%" . $_POST['filtro2'] . "%'";

    $filtro = $_POST['filtro2'];
  } else {
    $consultaSQL = "SELECT *,M.id as idManga FROM mangas M" . PHP_EOL;
    $consultaSQL .= "INNER JOIN inicio I ";
    $consultaSQL .= "ON M.id=manga_id ";
    $consultaSQL .= "ORDER BY idManga ASC ";
  }


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
  <div class="col-md-6">
    <form method="post" class="form-inline">
      <div class="form-group mr-3">
        <input type="text" id="filtro1" name="filtro1" placeholder="Nombre" class="form-control">
      </div>
      <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
      <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>

  <div class="col-md-6">
    <form method="post" class="form-inline">
      <div class="form-group mr-3">
        <input type="text" id="filtro2" name="filtro2" placeholder="Año De Estreno" class="form-control">
      </div>
      <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
      <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>

  <img src="img/cuadro_blanco.png" width="52" height="52" alt="Espacio">

  <div class="row">
    <div class="col-md-12">
      <table class="table" border=3, style='border-collapse:collapse'>
        <thead>
          <tr>
            <th>
              <p align="center"><b>Titulo</b></p>
            </th>
            <th>
              <p align="center"><b>Reseña</b></p>
            </th>
            <th>
              <p align="center"><b>Año De Estreno</b></p>
            </th>
            <th>
              <p align="center"><b>Más Información</b></p>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($mangas) && $sentencia->rowCount() > 0) {
            foreach ($mangas as $fila) {
          ?>
              <tr>
                <td><b><?php echo escapar($fila["nombre"]); ?></b></td>
                <td>
                  <p><?php echo escapar($fila["resena"]); ?></p>
                </td>
                <td><u><?php echo escapar($fila["fecha_creacion"]); ?></u></td>
                <td><a href="<?php echo escapar($fila["direccion"]); ?>" target="_parent"><i>Más Detalles</i></a></td>
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