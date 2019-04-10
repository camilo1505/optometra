<?php
include("BDconection.php");

function getCatalogo(){
    $username = "root";
    $password = "";

    $consulta = "SELECT catalogo.id_catalogo, producto.nombre_producto, catalogo.costo, catalogo.descripcion, catalogo.imagen, catalogo.marca, catalogo.referencia
                 FROM producto, catalogo 
                 WHERE producto.id_producto = catalogo.fk_producto
                 ORDER BY catalogo.id_catalogo";

    $respuesta = getData($consulta, $username, $password);

    return $respuesta;
}

function newProducto($producto){
    $username = "root";
    $password = "";
    $consulta = "INSERT INTO producto(nombre_producto) VALUES('$producto')";

    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	die();
}

function getProductos() {
    $username = "root";
    $password = "";
    $consulta = "SELECT producto.id_producto, producto.nombre_producto FROM producto";

    $respuesta = getData($consulta, $username, $password);

    return $respuesta;
}

function newCatalogo($producto) {
    $username = "root";
    $password = "";

    $consulta = "INSERT INTO catalogo(fk_producto, fk_usuario, referencia, marca, tipo, imagen, costo, descripcion)
                 VALUES('$producto[6]',1,'$producto[0]','$producto[1]','$producto[2]','$producto[3]','$producto[4]','$producto[5]')";

    print($consulta);
    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function editarProducto($IdProducto, $producto){
    $username = "root";
    $password = "";
    $consulta = "UPDATE producto SET nombre_producto = '$producto' WHERE id_producto = '$IdProducto'";

    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function editarCatalogo($catalogo){
    $username = "root";
    $password = "";
    $consulta = "UPDATE catalogo
                 SET catalogo.referencia = '$catalogo[2]', 
                     catalogo.marca = '$catalogo[3]',
                     catalogo.imagen = '$catalogo[4]',
                     catalogo.costo = '$catalogo[5]',
                     catalogo.descripcion = '$catalogo[6]'
                 WHERE catalogo.id_catalogo = '$catalogo[0]'";

    echo $consulta;

    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

?>