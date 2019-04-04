<?php
    include("BDservices.php");
    $producto = $_GET["nombre_producto"];

    if(newProducto($producto)) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='../addProducto.php';
            </script>
        ";
    }
    if(! newProducto($producto)) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='../addProducto.php';
            </script>
        ";
    }
?>