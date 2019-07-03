<?php
    include("../BDConection.php");
    $producto = $_POST["nombre_producto"];
    echo "hola".$producto;
    $username = "jp";
    $password = "1234";
    $consulta = "INSERT INTO producto(nombre_producto) VALUES('$producto')";
    $respuesta = setData($consulta, $username, $password);
    if($respuesta){
        echo "
        <script>
            alert('Guardado Correctamente');
            window.location.href='addProducto.php';
        </script>
    ";
    }else{
        echo "
        <script>
            alert('Error Guardando el Producto');
            window.location.href='addProducto.php';
        </script>
    ";
    }
?>