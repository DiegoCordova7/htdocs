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
  $consultaSQL .= "INNER JOIN inicio I ";
  $consultaSQL .= "ON M.id=I.manga_id ";
  $consultaSQL .= "WHERE A.id=5";

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
    <h2 class="mt-3">Fukui Takumi Y Umemura Shinya</h2><br>
    <h3 class="mt-3">Obras: </h3>
    <?php
    if ($mangas && $sentencia->rowCount() > 0) {
      foreach ($mangas as $fila) {
    ?>
        <ul>
          <li>
            <b>
              <a href="http://localhost/Mangas_1.0/<?php echo escapar($fila["direccion"]); ?>" target="_parent">
                <?php echo escapar($fila["nombre_manga"]); ?>
              </a>
            </b>
          </li>
        </ul>
    <?php
      }
    }
    ?>
  </div>
</div>
<?php include "templates/footer.php"; ?>