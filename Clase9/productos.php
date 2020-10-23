<?php

// verificar GET
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    // Procesar GET

    // Algoritmo o proceso

    // 1: Consultar por folio
    // isset() -> Determina si existe o no un valor
    if(isset($_GET['folio'])) {
        // buscar producto

        // Obtener pares clave valor
        $folio = $_GET['folio'];
    } else {
        // 2: Consultar todo
        header('Content-Type: application/json'); // La respuesta es en JSON
        $respuesta = [
            'mensaje' => 'Proceso exitoso',
            'productos' => [
                (object) [
                    'folio'         => '001',
                    'nombre'        => 'Arroz',
                    'color'         => 'Blanco',
                    'costo'         => 25.50,
                    'unidad_medida' => 'Gramos',
                    'fecha_baja'    => null
                ],
                (object) [
                    'folio'         => '002',
                    'nombre'        => 'Malla metalica',
                    'color'         => 'Cromo',
                    'costo'         => 40.80,
                    'unidad_medida' => 'Metros',
                    'fecha_baja'    => null
                ]
            ]
        ];

        echo(json_encode($respuesta));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Procesar POST

    // Obtener valores de la solicitud
    $folio  = $_POST['folio'];
    $nombre = $_POST['nombre'];

    // Algoritmo o proceso
    header('Content-Type: application/json'); // La respuesta es en JSON

    $respuesta = [
        'mensaje' => 'Registro exitoso'
    ];

    echo(json_encode($respuesta));
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    // Procesar PUT

    $datos_recibidos = json_decode(
        file_get_contents('php://input')
    );

    $folio = $datos_recibidos->folio;
    $nombre = $datos_recibidos->nombre;

    // Algoritmo o proceso
    header('Content-Type: application/json'); // La respuesta es en JSON

    $respuesta = [
        'mensaje' => 'Registro exitoso'
    ];

    echo(json_encode($respuesta));
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    // Procesar DELETE

    $folio = $_GET['folio'];

    // Algoritmo o proceso
    header('Content-Type: application/json'); // La respuesta es en JSON

    $respuesta = [
        'mensaje' => 'Registro exitoso' . ' ' . $folio
    ];

    echo(json_encode($respuesta));
} else
{
    // Procesar error y responder
}
