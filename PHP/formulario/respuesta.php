<?php
echo "Si todo salio bien debes ver este mensaje";
$nombre = $_POST["first-name"];
$apellido = $_POST["last-name"];
$email = $_POST["email"];
$password = $_POST["new-password"];
$personal_cuenta = $_POST["personal-account"];
$negocio_cuenta = $_POST["business-account"];
$img = $_POST["profile-picture"];
$edad = $_POST["age"];
$referencia = $_POST["referrer"];
$bio = $_POST["bio"];
echo
"Nombre: " . $nombre . ".<br>" .
    "Apellido: " . $apellido . ".<br>" .
    "Correo: " . $email . ".<br>" .
    "Contrasena: " . $password . ".<br>";
if ($cuenta != "personal-account") {
    "Tipo De Cuenta: Personal.<br>";
} else {
    "Tipo De Cuenta: Negocio.<br>";
};
"Imagen: <br>" . $img . ".<br>" .
    "Edad: " . $edad . ".<br>" .
    "Referancia: " . $referencia . ".<br>" .
    "Info: " . $bio . ".<br>";
