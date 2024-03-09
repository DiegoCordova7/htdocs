<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['num_cargas'], $_POST['exponente'], $_POST['distancias'], $_POST['carga_1'], $_POST['cargas'], $_POST['exponentes'], $_POST['distancias'])) {
    $exponente_primera_carga = $_POST['exponente'];
    $carga_primera_carga = $_POST['carga_1'];

    $num_cargas = $_POST['num_cargas'];
    $exponente_primera_carga = $_POST['exponente'];
    $distancias = $_POST['distancias'];

    // Verificar si se proporcionó el valor de la primera carga
    if (isset($_POST['carga_1'])) {
        $carga_primera_carga = $_POST['carga_1'];
    } else {
        // Establecer un valor predeterminado para la primera carga si no se proporcionó
        $carga_primera_carga = 1; // Puedes ajustar este valor según sea necesario
    }

    // Procesar los datos aquí...

    echo "Se han recibido los datos del formulario correctamente.";
} else {
    echo "No se han recibido datos del formulario.";
}
?>
</body>

</html>