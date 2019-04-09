<?php
    include("../BDservices.php");
    $idCatalogo = $_POST["id_catalogo"];
    $nombreProducto = $_POST["nombre_producto"];
    $referencia = $_POST["referencia"];
    $marca = $_POST["marca"];
    $imagen = $_POST["imagen"];
    $costo = $_POST["costo"];
    $descripcion = $_POST["descripcion"];

    $catalogo = array();

    array_push($catalogo,$idCatalogo);
    array_push($catalogo,$nombreProducto);
    array_push($catalogo,$referencia);
    array_push($catalogo,$marca);
    array_push($catalogo,$imagen);
    array_push($catalogo,$costo);
    array_push($catalogo,$descripcion);

    print_r($catalogo);
    echo "<br>";

    
    $done = editarCatalogo($catalogo);
    /*
    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='../../editarCatalogo.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='../../editarCatalogo.php';
            </script>
        ";
    }*/

?>