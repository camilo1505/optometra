<?php

    include("BDservices.php");
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $imagen = $_FILES["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];
    $producto = $_POST["producto"];

    print_r($imagen);


    $catalogo = array();
    
    array_push($catalogo,$producto);
    array_push($catalogo,$_SESSION['cedula']);
    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$imagen["name"]);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);
    echo $catalogo;
    /*$done = newCatalogo($catalogo);
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