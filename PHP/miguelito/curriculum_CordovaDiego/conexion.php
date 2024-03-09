<?php
function conexion()
{
    $pdo = new PDO('mysql:host=localhost;dbname=curriculum', 'root', '');
    return $pdo;
};

$servername = "localhost";
$database = "curriculum";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);
