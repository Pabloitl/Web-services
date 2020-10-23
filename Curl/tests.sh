#! /bin/sh

curl -v -X GET 'localhost:8000/Clase9/productos.php'

curl -v -X POST -H 'Content-Type: application/json' -d '{"folio": "003","nombre": "Coche"}' 'localhost:8000/Clase9/productos.php'

curl -v -X PUT -H 'Content-Type: application/json' -d '{"folio": "003","nombre": "Coche"}' 'localhost:8000/Clase9/productos.php'

curl -v -X DELETE 'localhost:8000/Clase9/productos.php?folio=005'
