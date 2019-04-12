<?php
    include("../BDservices.php");
    $IdProducto = $_POST["ID_producto"];
    $producto = $_POST["nombre_producto"];

    print($IdProducto);
    print($producto);

    $done = editarProducto($IdProducto, $producto);

    if($done) {
        echo "
            <script>
                alert('Guardado Correctamente');
                window.location.href='editarProducto.php';
            </script>
        ";
    }
    if(! $done) {
        echo "
            <script>
                alert('Error Guardando el Producto');
                window.location.href='editarProducto.php';
            </script>
        ";
    }
?>