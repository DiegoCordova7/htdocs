<?php
function conexion()
{
    $pdo = new PDO('mysql:host=localhost;dbname=ejemplo', 'root', '');
    return $pdo;
};

$servername = "localhost";
$database = "ejemplo";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);
