<?php

return [
  'db' => [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    // Aqui va el nombre de nuestra base de datos
    'name' => 'chiquismundo',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];