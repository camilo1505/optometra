<?php

    include("BDservices.php");
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $tipo = $_POST["tipo"];
    $imagen = $_POST["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];
    $producto = $_POST["producto"];

    $catalogo = array();

    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$tipo);
    array_push($catalogo,$imagen);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);
    array_push($catalogo,$producto);

    $done = newCatalogo($catalogo);
    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='../addCatalogo.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='../addCatalogo.php';
            </script>
        ";
    }

?>