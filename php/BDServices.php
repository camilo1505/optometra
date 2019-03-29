<?php
include("BDconection.php");

function obtenerCatalogo() {
    $conexion = conectarBDAdministrador();
    $consultaProductos = 'SELECT id_producto, nombre_producto FROM producto';
    $consultaCatalogo = 'SELECT id_catalogo, fk_producto, fk_usuario, referencia, marca, tipo, imagen, costo, descripcion FROM catalogo';

    $productos = $conexion -> query($consultaProductos);
    $catalogo = $conexion -> query($consultaCatalogo);

    if ($productos->num_rows > 0) {
        if($catalogo->num_rows > 0){
            $productosArray = array.array();
            $catalogoArray = array.array();
            while($row = $productos->fetch_assoc()){
                $productosArray.array_push($row);
            }
        }
    }
}

?>