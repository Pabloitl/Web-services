#! /bin/sh

curl -X GET 'localhost:8080/productos.php'
curl -X GET 'localhost:8080/productos.php?folio=003'

curl -X POST -H 'Content-Type: application/json' 'localhost:8080/productos.php' -d \
    '{"folio": "003","nombre": "Coche", "color": "Negro", "costo": "150.5", "unidad_medida": "pieza", "fecha_baja": null}'

curl -X PUT -H 'Content-Type: application/json' 'localhost:8080/productos.php' -d \
    '{"folio": "003","nombre": "Coche", "color": "Blanco", "costo": "150.5", "unidad_medida": "pieza", "fecha_baja": null}'

curl -X DELETE 'localhost:8080/productos.php?folio=003'
