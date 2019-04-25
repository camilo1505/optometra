<?php
    include("../BDservices.php");
    $idCatalogo = $_POST["id_catalogo"];
    $nombreProducto = $_POST["nombre_producto"];
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $imagen = $_POST["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];
    $promocion = $_POST["promocion"];

    $catalogo = array();


    array_push($catalogo,$idCatalogo);
    array_push($catalogo,$nombreProducto);
    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$imagen);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);
    array_push($catalogo,$promocion);

    print_r($catalogo);
    $done = editarCatalogo($catalogo);

    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='editarCatalogo.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Editando el Producto, no se eligio un tipo de promocion');
                window.location.href='editarCatalogo.php';
            </script>
        ";
    }
?>