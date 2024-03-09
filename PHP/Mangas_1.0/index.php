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

  $consultaSQL = "SELECT * FROM inicio I ";
  $consultaSQL .= "WHERE id=1 ";

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $inicio = $sentencia->fetchAll();
} catch (PDOException $error) {
  $error = $error->getMessage();
}
?>

<?php include "templates/header.php"; ?>

<body>

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
      if ($inicio && $sentencia->rowCount() > 0) {
        foreach ($inicio as $fila) {
      ?>
          <p align="center"><img src="data:imagen/jpg;charset=utf8;base64,<?php echo ($fila['portada']); ?>" alt="Portada Del Proyecto" /></p>
          <p><?php echo escapar($fila["introduccion"]); ?></p>
          <p>Para cualquier pedido debera de cumplirse una serie de requisitos:
          <p>
          <ul>
            <li>No se aceptan mangas con contenido sexual explicito de manera recurrente, no obstante, si se aceptan si es contenido ocasional, aparte en lo que respecta al gore esta permitido.</li>
            <li>Que el manga no este en una espera de 40 años.</li>
          </ul>
          <br>
          <h2>Contacto</h2>
          <p><u><b><?php echo escapar($fila["contacto"]); ?></b></u></p>
          <br>
          <p>Cabe aclarar que nada del contenido presentado me pertence, creditos a sus respectivos autores y traductores.</p>
      <?php
        }
      }
      ?>
    </div>
  </div>
</body>
<?php include "templates/footer.php"; ?>