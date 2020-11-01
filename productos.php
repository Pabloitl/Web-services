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

        // Responder la solicitud
        if ($producto != null) { // Si se encontro el producto
            // Si lo encontro
            header('Content-Type: application/json');
            $respuesta = [
                'producto' => (object) [
                    'folio'         => $producto->folio,
                    'nombre'        => $producto->nombre,
                    'color'         => $producto->color,
                    'costo'         => $producto->costo,
                    'unidad_medida' => $producto->unidad_medida,
                    'fecha_baja'    => $producto->fecha_baja
                ]
            ];

            // Enviar
            echo(json_encode($respuesta));
        } else {
            // No lo encontro
            header('Content-Type: application/json');
            $respuesta = [
                'producto' => (object) [ ]
            ];

            // Enviar
            echo(json_encode($respuesta));
        }
    } else {
        // 2: Consultar todo

        // Obtiene todos los productos de la base de datos
        $productos = buscar_todo();

        if (is_array($productos) && sizeof($productos) > 0) { // Si tiene productos
            // Si tiene elementos
            header('Content-Type: application/json');

            $array_productos = [];
            foreach ($productos as $item) { // Obtener todos los productos de la base de datos
                $array_productos[] = $item;
            }

            $respuesta = [
                'mensaje' => 'Proceso exitoso',
                'productos' => $array_productos
            ];

            // Enviar
            echo(json_encode($respuesta));
        } else {
            // No hay elementos
            header('Content-Type: application/json');
            $respuesta = [
                'mensaje' => 'Proceso exitoso',
                'productos' => [ ]
        ];

            // Enviar
            echo(json_encode($respuesta));
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') // Registrar
{
    // Procesar POST

    // Obtener valores de la solicitud
    $datos_recibidos = json_decode(
        file_get_contents('php://input')
    );

    $folio         = $datos_recibidos->folio;
    $nombre        = $datos_recibidos->nombre;
    $color         = $datos_recibidos->color;
    $costo         = $datos_recibidos->costo;
    $unidad_medida = $datos_recibidos->unidad_medida;
    $fecha_baja    = $datos_recibidos->fecha_baja;

    // Registrar en la base de datos
    // $resultado = insertar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);
    $resultado = insertar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);

    if ($resultado != null) {
        // Si se realizo
        header('Content-Type: application/json'); // La respuesta es en JSON
        $respuesta = [
            'mensaje' => 'Registro exitoso'
        ];
        echo(json_encode($respuesta));
    } else {
        // No se realizo
        header('Content-Type: application/json'); // La respuesta es en JSON
        $respuesta = [
            'mensaje' => 'No se pudo registrar'
        ];
        echo(json_encode($respuesta));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') // Actualizar
{
    // Procesar PUT

    $datos_recibidos = json_decode(
        file_get_contents('php://input')
    );

    $folio         = $datos_recibidos->folio;
    $nombre        = $datos_recibidos->nombre;
    $color         = $datos_recibidos->color;
    $costo         = $datos_recibidos->costo;
    $unidad_medida = $datos_recibidos->unidad_medida;
    $fecha_baja    = $datos_recibidos->fecha_baja;

    $folio = $datos_recibidos->folio;
    $nombre = $datos_recibidos->nombre;

    $resultado = actualizar($folio, $nombre, $color, $costo, $unidad_medida, $fecha_baja);

    if ($resultado != null) {
        // Si se actualizo
        header('Content-Type: application/json'); // La respuesta es en JSON

        $respuesta = [
            'mensaje' => 'Actualizacion correcta'
        ];

        echo(json_encode($respuesta));
    } else {
        // No se actualizo
        header('Content-Type: application/json'); // La respuesta es en JSON

        $respuesta = [
            'mensaje' => 'No se pudo actualizar'
        ];

        echo(json_encode($respuesta));
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') // Eliminar
{
    // Procesar DELETE

    $folio = $_GET['folio'];

    $resultado = eliminar($folio);

    if ($resultado != null) {
        // Si se elimino
        header('Content-Type: application/json'); // La respuesta es en JSON

        $respuesta = [
            'mensaje' => 'Eliminacion correcta'
        ];

        echo(json_encode($respuesta));
    } else {
        // No se elimino
        header('Content-Type: application/json'); // La respuesta es en JSON

        $respuesta = [
            'mensaje' => 'No se pudo eliminar'
        ];

        echo(json_encode($respuesta));
    }
} else
{
    // Procesar error y responder
}
