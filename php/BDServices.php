<?php
include("BDconection.php");

function getCatalogo(){
    $username = "root";
    $password = "";

    $consulta = "SELECT producto.nombre_producto, catalogo.costo, catalogo.descripcion, catalogo.imagen, catalogo.marca, catalogo.referencia
                 FROM producto, catalogo 
                 WHERE producto.id_producto = catalogo.fk_producto";

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

?>