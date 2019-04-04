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
        echo FALSE;
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
    $consulta = "SELECT producto.nombre_producto FROM producto";

    $respuesta = getData($consulta, $username, $password);

    echo $respuesta;

    return $respuesta;
}

?>