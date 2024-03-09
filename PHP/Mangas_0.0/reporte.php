<?php
include 'funciones.php';

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
    $consultaSQL = "SELECT *,M.id AS idManga FROM mangas M ";
    $consultaSQL .= "INNER JOIN autores A ";
    $consultaSQL .= "ON A.id=M.autores_id ";
    $consultaSQL .= "INNER JOIN estado E ";
    $consultaSQL .= "ON E.id=M.estado_id ";
    $consultaSQL .= "INNER JOIN demografia D ";
    $consultaSQL .= "ON D.id=M.demografia_id ";
    $consultaSQL .= "WHERE M.nombre LIKE '%" . $_POST['filtro1'] . "%'";


    //Se usa en la tabla para cuando no hay registros
    $filtro = $_POST['filtro1'];

    //Aquí preguntamos si el filtro2 trae algun valor para filtrar    
  } else if (isset($_POST['filtro2'])) {
    //en caso de traer un filtro hacemos la conuslta con filtro, en mi caso e filtro 1 es para el correo
    $consultaSQL = "SELECT *,M.id AS idManga FROM mangas M ";
    $consultaSQL .= "INNER JOIN autores A ";
    $consultaSQL .= "ON A.id=M.autores_id ";
    $consultaSQL .= "INNER JOIN estado E ";
    $consultaSQL .= "ON E.id=M.estado_id ";
    $consultaSQL .= "INNER JOIN demografia D ";
    $consultaSQL .= "ON D.id=M.demografia_id ";
    $consultaSQL .= "WHERE M.fecha_creacion LIKE '%" . $_POST['filtro2'] . "%'";

    //Se usa en la tabla para cuando no hay registros
    $filtro = $_POST['filtro2'];

    //Aquí llegaríamos si no hay filtro
  } else {
    //si no traemos filtro seleccionamos todos
    $consultaSQL = "SELECT *,M.id AS idManga FROM mangas M ";
    $consultaSQL .= "INNER JOIN autores A ";
    $consultaSQL .= "ON A.id=M.autores_id ";
    $consultaSQL .= "INNER JOIN estado E ";
    $consultaSQL .= "ON E.id=M.estado_id ";
    $consultaSQL .= "INNER JOIN demografia D ";
    $consultaSQL .= "ON D.id=M.demografia_id ";
  }


  // Aquí se ejecuta la consulta ¡en caso de error nos envia el mensaje
  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $mangas = $sentencia->fetchAll();
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
        <input type="text" id="filtro1" name="filtro1" placeholder="Nombre" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>

  <div class="col-md-6">
    <!-- Empezamos el formulario -->
    <form method="post" class="form-inline">
      <div class="form-group mr-3">
        <!-- En este input, se guarda el texto que el usuario pone, después se envía en el parámetro "filtro2", y se utiliza en la linea 22-->
        <input type="text" id="filtro2" name="filtro2" placeholder="Año De Estreno" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
    </form>
  </div>
</div>

<!-- En este renglón ira la tabla con los resultados -->
<div class="row">
  <div class="col-md-12">
    <h2 class="mt-3">Mangas</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Ids</th>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Reseña</th>
          <th>Demografia</th>
          <th>Autores</th>
          <th>Estado</th>
          <th>No. Caps</th>
          <th>No. Tomos</th>
          <th>Fecha Creacion</th>
          <th>Enlace</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Preguntamos si la consulta regreso renglones
        if (isset($mangas) && $sentencia->rowCount() > 0) {
          //en caso de encontrar, recorremos fila por fila y la creamos como tabla
          foreach ($mangas as $fila) {
        ?>
            <tr>
              <!-- La variable $fila almacena cada renglón de la DB, y la columna se accede $fila["columna"] -->
              <td><?php echo $fila["idManga"]; ?></td>
              <td><img src="data:image/jpg;charset=utf8;base64,<?php echo $fila['imagen']; ?>" width="100px" height="150px" /></td>
              <td><?php echo $fila["nombre"]; ?></td>
              <td>
                <button type="button" data-target="#verResena<?php echo $fila['idManga']; ?>" data-toggle="modal" class="btn btn-primary">Ver</button>
                <!-- Inicia Modal -->
                <div class="modal fade" id="verResena<?php echo $fila['idManga']; ?>" role="dialog">
                  <div class="modal-dialog modal-dialog-centered">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo $fila["nombre"]; ?></h4>
                      </div>
                      <div class="modal-body">
                        <p><?php echo $fila["resena"]; ?></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Termina Modal -->
              </td>
              <td><?php echo $fila["tipo"]; ?></td>
              <td><?php echo $fila["autor_nombre"]; ?></td>
              <td><?php echo $fila["estado_act"]; ?></td>
              <td><?php echo $fila["num_capitulos"]; ?></td>
              <td><?php echo $fila["num_tomos"]; ?></td>
              <td><?php echo $fila["fecha_creacion"]; ?></td>
              <td><a href="<?php echo $fila["tomos"]; ?>"><img src="./img/descargamanga.png" width="150px" height="75px"></a></td>
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