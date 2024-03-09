<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="39_1respuesta.php" method="GET">
        <div>
            <label for='nombre'>Nombre</label>
            <input type='text' id='nombre' name='nombre'>
        </div>

        <br>

        <label for='asignatura'>Asignatura</label>
        <select id='asignatura' name='asignatura'>
            <option value='Ingles'>Ingles</option>
            <option value='Matematicas'>Matematicas</option>
            <option value='Ciencia'>Ciencia</option>
            <option value='Lenguaje'>Lenguaje</option>

            <br><br>

            <label for='opcion-1'>
                <input type='checkbox' value='Manzana' id='opcion-1' name='fruta'>
                Manzana
            </label>

            <br><br><br>

            <button type='submit'>Enviar</button>
    </form>
    <p>La diferencia radica que GET muestra en la URL los valores y en POST van ocultos</p>

</body>

</html>