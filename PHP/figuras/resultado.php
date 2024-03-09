<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuras</title>
</head>

<body>
    <h2>Calculadora de Perimetros, Areas Y Volumenes:</h2>
    <form action='figuras.php' method='POST'>
        <label for='dato_buscado'>Seleccione el resultado a buscar:</label>
        <select id='dato_buscado' name='dato[]'>
            <option value=''>...</option>
            <option value='perimetro'>Perimetro</option>
            <option value='area'>Area</option>
            <option value='volumen'>Volumen</option>
        </select>
        <button type='submit'>Enviar</button>
    </form>
</body>

</html>