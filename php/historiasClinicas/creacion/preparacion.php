<?php

include("../../BDServices.php");
session_start();
    $cliente = $_POST['fk_cliente'];
    $sql = "SELECT * FROM cliente WHERE id_cliente = '$cliente'";
    $datosClientes = getData($sql, 'root', '');
    $sql = "SELECT MAX(id_historia_clinica) as numero , rx_final_od_esfera ,  rx_final_od_cilindro ,  rx_final_od_eje ,  rx_final_od_adicion ,  rx_final_oi_esfera ,  rx_final_oi_cilindro ,  rx_final_oi_eje ,  rx_final_oi_adicion ,  rx_final_od_agudes_visual ,  rx_final_oi_agudes_visual
                            FROM historia_clinica, cliente
                            WHERE fk_cliente = '$cliente' and fk_cliente = id_cliente;";
    $historia = getData($sql, 'root', '');
    if($historia[0]['numero']!=null){
        redirect("actualizarHistoriaClinica.php?fk_cliente=".$cliente);
    }
    else{
        redirect("crearHistoriaClinica.php?fk_cliente=".$cliente);
    }
?>