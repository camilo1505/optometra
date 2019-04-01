<?php
include("BDconection.php");

function getCatalogo(){
    $username = "root";
    $password = "";
    $consulta2 = "SELECT * FROM catalogo";

    $consulta = "SELECT producto.nombre_producto, catalogo.costo, catalogo.descripcion, catalogo.imagen, catalogo.marca, catalogo.referencia
                 FROM producto, catalogo 
                 WHERE producto.id_producto = catalogo.fk_producto";

    $respuesta = getData($consulta, $username, $password);

    return $respuesta;
}
function redirect($url, $statusCode = 303)
	{
	   header('Location: ' . $url, true, $statusCode);
	   die();
	   
	}
?>