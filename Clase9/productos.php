<?php

// verificar GET
if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    // Procesar GET

    // Obtener pares clave valor
    $folio = $_GET['folio'];

    // Algoritmo o proceso
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // Procesar POST

    // Obtener valores de la solicitud
    $folio  = $_POST['folio'];
    $nombre = $_POST['nombre'];

    // Algoritmo o proceso
} elseif ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    // Procesar PUT

    $datos_recibidos = json_decode(
        file_get_contents('php://input')
    );

    $folio = $datos_recibidos->folio;
    $nombre = $datos_recibidos->nombre;

    // Algoritmo o proceso
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    // Procesar DELETE

    $folio = $_GET['folio'];

    // Algoritmo o proceso
} else
{
    // Procesar error y responder
}
