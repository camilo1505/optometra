<?php
include("BDconection.php");

function getCatalogo(){
    $username = "jp";
    $password = "1234";

    $consulta = "SELECT catalogo.id_catalogo, producto.nombre_producto, catalogo.costo, catalogo.descripcion, catalogo.imagen, catalogo.marca, catalogo.referencia, catalogo.promocion
                 FROM producto, catalogo 
                 WHERE producto.id_producto = catalogo.fk_producto and producto.activado = '0'
                 ORDER BY catalogo.id_catalogo";

    $respuesta = getData($consulta, $username, $password);

    return $respuesta;
}

function newProducto($producto){
    $username = "jp";
    $password = "1234";
    $consulta = "INSERT INTO producto(nombre_producto) VALUES('$producto')";
    $respuesta = setData($consulta, $username, $password);
    if($respuesta){
        return true;
    }else{
        return false;
    }
}

function redirect($url, $statusCode = 303)
{
	header('Location: ' . $url, true, $statusCode);
	die();
}

function getProductos() {
    $username = "jp";
    $password = "1234";
    $consulta = "SELECT producto.id_producto, producto.nombre_producto, producto.activado FROM producto";

    $respuesta = getData($consulta, $username, $password);
    if($respuesta){
        return true;
    }else{
        return false;
    }
}

function newCatalogo($producto) {
    $username = "jp";
    $password = "1234";

    $consulta = "INSERT INTO catalogo(fk_producto, fk_usuario, referencia, marca, imagen, costo, descripcion)
                 VALUES('$producto[0]',$producto[1],'$producto[2]','$producto[3]','$producto[4]','$producto[5]','$producto[6]')";

    print($consulta);
    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function editarProducto($IdProducto, $producto){
    $username = "jp";
    $password = "1234";
    $consulta = "UPDATE producto SET nombre_producto = '$producto' WHERE id_producto = '$IdProducto'";

    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function editarCatalogo($catalogo){
    $username = "jp";
    $password = "1234";
    if($catalogo[4] != ""){
        $consulta = "UPDATE catalogo
                    SET catalogo.referencia = '$catalogo[2]', 
                        catalogo.marca = '$catalogo[3]',
                        catalogo.imagen = '$catalogo[4]',
                        catalogo.costo = '$catalogo[5]',
                        catalogo.descripcion = '$catalogo[6]',
                        catalogo.promocion = $catalogo[7]
                    WHERE catalogo.id_catalogo = '$catalogo[0]'";
    }
    else {
        $consulta = "UPDATE catalogo
                 SET catalogo.referencia = '$catalogo[2]', 
                     catalogo.marca = '$catalogo[3]',
                     catalogo.costo = '$catalogo[5]',
                     catalogo.descripcion = '$catalogo[6]',
                     catalogo.promocion = $catalogo[7]
                 WHERE catalogo.id_catalogo = '$catalogo[0]'";
    }


    if(setData($consulta, $username, $password)){
        return TRUE;
    }
    if(! setData($consulta, $username, $password)){
        return FALSE;
    }
}

function ordenar( $a, $b ) {
    return strtotime($a['control']) - strtotime($b['control']);
}

?>