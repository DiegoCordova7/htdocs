<?php
date_default_timezone_set('America/Hermosillo');

function fecha_espanol_larga()
{
    $fecha_dia = date('d');
    $fecha_mes = date('m');
    $fecha_year = date('Y');

    $dia_semana = [
        'Monday' => 'Lunes',
        'Tuesday' => 'Martes',
        'Wednesday' => 'Miercoles',
        'Thursday' => 'Jueves',
        'Friday' => 'Viernes',
        'Saturday' => 'Sabado',
        'Sunday' => 'Domingo'
    ];

    $meses_year = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre'
    ];

    $fecha_final = $dia_semana[date('l')] . ' ' . $fecha_dia . ' de ' . $meses_year[date('m')] . ' de ' . $fecha_year;

    return $fecha_final;
}

echo fecha_espanol_larga();
