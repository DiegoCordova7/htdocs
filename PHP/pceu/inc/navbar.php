<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php?vista=home">
      <img src="./img/unisierralogo.png" width="40" height="40">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Usuario</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=user_new">Nuevo</a>
          <a class="navbar-item" href="index.php?vista=user_list">Lista</a>
          <a class="navbar-item" href="index.php?vista=user_search">Buscar</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Matematicas</a>

        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=regla_3">Reglas de 3</a>
          <a class="navbar-item" href="index.php?vista=fig">Figuras</a>
          <a class="navbar-item" href="index.php?vista=pitagoras">Pitagoras</a>
          <a class="navbar-item" href="index.php?vista=eculineal_menu">Ecuaciones Lineales</a>
          <a class="navbar-item" href="index.php?vista=formulagen">Formula General</a>
          <a class="navbar-item" href="index.php?vista=dis2puntos">Distancia entre 2 puntos</a>
          <a class="navbar-item" href="index.php?vista=conversiones-sistemas">Conversiones Sistemas Numericos</a>
          <a class="navbar-item" href="index.php?vista=fibonacci">Fibonacci</a>
        </div>
      </div>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">Fisica</a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="index.php?vista=velocidad_menu">Velocidad</a>
          <a class="navbar-item" href="index.php?vista=densidad_menu">Densidad</a>
          <a class="navbar-item" href="index.php?vista=aceleracion_menu">Aceleracion</a>
          <a class="navbar-item" href="index.php?vista=fuerza_menu">Fuerza</a>
          <a class="navbar-item" href="index.php?vista=caida_libre_menu">Caida Libre</a>
          <a class="navbar-item" href="index.php?vista=tiro_parabolico">Tiro Parabolico</a>
          <a class="navbar-item" href="index.php?vista=mov_rectilineo_uniforme">M.R.U.A.</a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary is-rounded">
            Mi cuenta
          </a>
          <a class="button is-link is-rounded">
            Salir
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>