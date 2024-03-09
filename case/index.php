<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>CASE</h1>
    <form action='' method='POST'>
        <input type='number' name='numero' style="height: 30px; width: 85px;">
        <button type='submit' style="height: 50px; width: 70px;"><b>Calcular</b></button>
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    echo $numero;
    switch ($numero) {
        case 1 . 3:
            echo "pusiste 1 o 2 o 3";
    }
}
?>