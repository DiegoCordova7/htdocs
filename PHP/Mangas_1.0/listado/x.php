<?php
include_once 'funciones2.php';

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

  $consultaSQL = "SELECT * FROM inicio I " . PHP_EOL;
  $consultaSQL .= "WHERE I.letra_inicio LIKE 'X'";
  $consultaSQL .= "ORDER BY I.id ASC";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $inicio = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}

?>

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
<h2>X</h2>
<div class="row">
  <div class="col-md-12">
    <?php
    if (isset($inicio) && $sentencia->rowCount() > 0) {
      foreach ($inicio as $fila) {
    ?>
        <div class="row">
          <ul>
            <li>
              <a href="<?php echo escapar($fila["direccion"]); ?>" target="_parent">
                <b>
                  <?php echo escapar($fila["nombre_manga"]); ?>.
                </b>
              </a>
            </li>
          </ul>
        </div>
      <?php
      }
    } else {
      ?>
      <div class="row">
        <ul>
          <li>No hay mangas aún con esa letra. </li>
        </ul>
      </div>
    <?php
    }
    ?>
  </div>
</div>