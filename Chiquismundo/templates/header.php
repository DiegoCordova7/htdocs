<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Proyecto - M4</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <!-- Esta es la barra de navegación principal, si quieren cambiar el color busquen https://htmlcolorcodes.com/es/tabla-de-colores/  -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="#">M4</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- Todos estos son los enlaces, pueden agregar mas solo copien y pongan la url correcta -->
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="repartidores_lst.php">Repartidores</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="clientes_lst.php">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="paquetes_lst.php">Paquetes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="productos_lst.php">Productos</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="paquetes_productos_lst.php">Paquetes_Productos</a>
          </li>
        </ul>
        <a href="reporte.php" class="btn btn-outline-info">Reporte</a>                
      </div>
    </nav>
    <hr>