<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Curriculum Arturo Gonzalez</title>
</head>

<body>
    <main>
        <h1>Curriculum Arturo Gonzalez</h1>

        <section>
            <h2>Información Personal</h2>
            <figure>
                <img src="Foto Graduacion.jpeg" width="350px" alt="Foto de Arturo">
                <figcaption>Arturo en su Ceremonia de Graduación</figcaption>
            </figure>
            <ul>
                <li>Correo: <strong>arturogonzalez045@gmail.com</strong>
                </li>
                <li>Teléfono: <em>634 112 2525</em>
                </li>
                <li>Twitter: @arturoglz45
                </li>
            </ul>
        </section>

        <section>
            <h2>Educación</h2>
            <ul>
                <li>Técnico en Informatica, CecytesEMSad Cumpas</li>
            </ul>
        </section>

        <section>
            <h2>Habilidades</h2>
            <ul>
                <li>Experiencia avanzada en Hardware Computacional</li>
                <li>Experiencia Intermedia en Ensambles de Ordenadores y Mantenimientos</li>
            </ul>
        </section>

        <section>
            <h2>Universidad</h2>
            <figure>
                <a href="http://unisierra.edu.mx" target="_blank">
                    <img src="logounisierra.jpg" width="350px">
                </a>
                <figcaption>Universidad <strong>Unisierra</strong>
                </figcaption>
            </figure>
        </section>
        <?php require "conexion.php"; ?>
        <section>
            <h2>Agregar Referencias</h2>
            <form action="" method="POST">
                <fieldset>
                    <legend>
                        Informacion Personal
                    </legend>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="John Doe" required>
                </fieldset>
                <fieldset>
                    <legend>
                        Informacion de Profesion
                    </legend>
                    <label for="puesto">Puesto</label>
                    <input type="text" name="puesto" id="puesto" placeholder="Jefe">
                </fieldset>
                <button type="submit">Enviar</button>
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = ($_POST['nombre']);
                $puesto = ($_POST['puesto']);
                $guardar = conexion();
                $guardar = $guardar->prepare("INSERT INTO empleadoresarturo (nombre,puesto)
                        VALUES (:nombre,:puesto)");

                $datos = [
                    ":nombre" => $nombre,
                    ":puesto" => $puesto,
                ];

                $guardar->execute($datos);
                $guardar = null;
            }
            ?>
        </section>
        <?php require "Curriculum.php"; ?>
    </main>
</body>

</html>