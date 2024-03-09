<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga De Archivos</title>
</head>

<body>
    <h3>Subir archivos con PHP</h3>
    <form action='carga.php' method='POST' enctype="multipart/form-data">
        <input type='file' name='fichero'>
        <br><br>
        <button type='submit'>Enviar</button>
    </form>
</body>

</html>