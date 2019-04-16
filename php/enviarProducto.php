<?php
    include("BDservices.php");
    $producto = $_POST["nombre_producto"];

    $done = newProducto($producto);

    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='../addProducto.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='../addProducto.php';
            </script>
        ";
    }
?>