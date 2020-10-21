<?php

// echo 'Hola'; // Mostrar contenido en el navegador

$estructura = [ // definir pares clave valor
    "ciudad" => "Leon",
    "numero_personas" => 100,
    "cursos" => [ // es un arreglo de objetos
        (object) [
            "nombre" => "Programacion web",
            "fecha_inicio" => "01-11-2020",
            "cupo" => 30
        ],
        (object) [
            "nombre" => "Bootstrap",
            "fecha_iniuio" => "05-11-2021",
            "cupo" => null
        ]
    ]
];

// Convertir y mostrar PHP a JSON
echo(json_encode($estructura) . "\n"); // Convertir JSON encode
