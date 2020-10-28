<?php

require_once('base_datos.php'); // Se necesita un archivo externo

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

        // Busqueda por numero de folio en base de datos
        $producto = buscar_folio($folio);
    } else {
        // 2: Consultar todo

        // Obtiene todos los productos de la base de datos
        $productos = buscar_todo();
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
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') // Registrar
{
    // Procesar POST

    // Obtener valores de la solicitud
    $folio  = $_POST['folio'];
    $nombre = $_POST['nombre'];

    $resultado = insertar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);

    // Algoritmo o proceso
    header('Content-Type: application/json'); // La respuesta es en JSON

    $respuesta = [
        'mensaje' => 'Registro exitoso'
    ];

    echo(json_encode($respuesta));
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') // Actualizar
{
    // Procesar PUT

    $datos_recibidos = json_decode(
        file_get_contents('php://input')
    );

    $folio = $datos_recibidos->folio;
    $nombre = $datos_recibidos->nombre;

    $resultado = actualizar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);

    // Algoritmo o proceso
    header('Content-Type: application/json'); // La respuesta es en JSON

    $respuesta = [
        'mensaje' => 'Registro exitoso'
    ];

    echo(json_encode($respuesta));
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') // Eliminar
{
    // Procesar DELETE

    $folio = $_GET['folio'];

    $resultado = eliminar($folio);

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
