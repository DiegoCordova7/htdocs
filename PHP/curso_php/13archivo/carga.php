<?php
if (!file_exists('archivos')) {
    if (!mkdir('archivos', 0777)) {
        echo 'error al crear el directorio';
        exit();
    }
}

chmod('archivos', 0777);

if (move_uploaded_file($_FILES['fichero']['tmp_name'], 'archivos/' . $_FILES['fichero']['name'])) {
    echo 'subido con exito';
} else {
    echo 'error al subir el archivo';
}
