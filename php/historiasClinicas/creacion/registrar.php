<?php
    include("../../BDServices.php");
    session_start();

    $fk_usuario = $_POST['fk_usuario'];
    $fk_cliente = $_POST['fk_cliente'];
    $patologia1 = $_POST['patologia1'];
    $patologia2 = $_POST['patologia2'];
    $patologia3 = $_POST['patologia3'];
    $tratamiento1 = $_POST['tratamiento1'];
    $tratamiento2 = $_POST['tratamiento2'];
    $tratamiento3 = $_POST['tratamiento3'];
    $cronicidad1 = $_POST['cronicidad1'];
    $cronicidad2 = $_POST['cronicidad2'];
    $cronicidad3 = $_POST['cronicidad3'];
    $observacion1 = $_POST['observacion1'];
    $observacion2 = $_POST['observacion2'];
    $observacion3 = $_POST['observacion3'];
    $anamnesis = $_POST['anamnesis'];
    $rx_uso_od_esfera = $_POST['rx_uso_od_esfera'];
    $rx_uso_od_cilindro = $_POST['rx_uso_od_cilindro'];
    $rx_uso_od_eje = $_POST['rx_uso_od_eje'];
    $rx_uso_od_adicion = $_POST['rx_uso_od_adicion'];
    $rx_uso_oi_esfera = $_POST['rx_uso_oi_esfera'];
    $rx_uso_oi_cilindro = $_POST['rx_uso_oi_cilindro'];
    $rx_uso_oi_eje = $_POST['rx_uso_oi_eje'];
    $rx_uso_oi_adicion = $_POST['rx_uso_oi_adicion'];
    $vision_lejos_od = $_POST['vision_lejos_od'];
    $vision_lejos_oi = $_POST['vision_lejos_oi'];
    $vision_cerca_od = $_POST['vision_cerca_od'];
    $vision_cerca_oi = $_POST['vision_cerca_oi'];
    $examen_externo_od = $_POST['examen_externo_od'];
    $examen_externo_oi = $_POST['examen_externo_oi'];
    $reflejos_pupilares_fotomotor = $_POST['reflejos_pupilares_fotomotor'];
    $reflejos_pupilares_consensual = $_POST['reflejos_pupilares_consensual'];
    $reflejos_pupilares_acomodacion = $_POST['reflejos_pupilares_acomodacion'];
    $cover_test_vision_lejos = $_POST['cover_test_vision_lejos'];
    $cover_test_vision_proxima = $_POST['cover_test_vision_proxima'];
    $cover_test_ducciones = $_POST['cover_test_ducciones'];
    $cover_test_versiones = $_POST['cover_test_versiones'];
    $od_oftalmoloscopio = $_POST['od_oftalmoloscopio'];
    $oi_oftalmoloscopio = $_POST['oi_oftalmoloscopio'];
    $od_queratrometra = $_POST['od_queratrometra'];
    $oi_queratrometra = $_POST['oi_queratrometra'];
    $od_retinoscopia = $_POST['od_retinoscopia'];
    $oi_retinoscopia = $_POST['oi_retinoscopia'];
    $rx_final_od_esfera = $_POST['rx_final_od_esfera'];
    $rx_final_od_cilindro = $_POST['rx_final_od_cilindro'];
    $rx_final_od_eje = $_POST['rx_final_od_eje'];
    $rx_final_od_adicion = $_POST['rx_final_od_adicion'];
    $rx_final_oi_esfera = $_POST['rx_final_oi_esfera'];
    $rx_final_oi_cilindro = $_POST['rx_final_oi_cilindro'];
    $rx_final_oi_eje = $_POST['rx_final_oi_eje'];
    $rx_final_oi_adicion = $_POST['rx_final_oi_adicion'];
    $rx_final_od_agudes_visual = $_POST['rx_final_od_agudes_visual'];
    $rx_final_oi_agudes_visual = $_POST['rx_final_oi_agudes_visual'];
    $diagnostico = $_POST['diagnostico'];
    $control = $_POST['control'];
    $observacion = $_POST['observacion'];

	$buscarCliente = "SELECT * FROM cliente WHERE cedula = '$fk_cliente' ";
    $result = getData($buscarCliente,'root','');
    $fk_cliente = $result[0]['id_cliente'];
	$buscarCliente = "SELECT * FROM usuario WHERE cedula = '$fk_usuario' ";
    $result = getData($buscarCliente,'root','');
    $fk_usuario = $result[0]['id_usuario'];
	$hoy =strftime( "%Y-%m-%d-%H-%M-%S", time() );
    $sql = "INSERT INTO historia_clinica ( fk_usuario ,  fk_cliente ,  patologia1 ,  patologia2 ,  patologia3 ,  tratamiento1 ,  tratamiento2 ,  tratamiento3 ,  cronicidad1 ,  cronicidad2 ,  cronicidad3 ,  observacion1 ,  observacion2 ,  observacion3 ,  anamnesis ,  rx_uso_od_esfera ,  rx_uso_od_cilindro ,  rx_uso_od_eje ,  rx_uso_od_adicion ,  rx_uso_oi_esfera ,  rx_uso_oi_cilindro ,  rx_uso_oi_eje ,  rx_uso_oi_adicion ,  vision_lejos_od ,  vision_lejos_oi ,  vision_cerca_od ,  vision_cerca_oi ,  examen_externo_od ,  examen_externo_oi ,  reflejos_pupilares_fotomotor ,  reflejos_pupilares_consensual ,  reflejos_pupilares_acomodacion ,  cover_test_vision_lejos ,  cover_test_vision_proxima ,  cover_test_ducciones ,  cover_test_versiones ,  od_oftalmoloscopio ,  oi_oftalmoloscopio ,  od_queratrometra ,  oi_queratrometra ,  od_retinoscopia ,  oi_retinoscopia ,  rx_final_od_esfera ,  rx_final_od_cilindro ,  rx_final_od_eje ,  rx_final_od_adicion ,  rx_final_oi_esfera ,  rx_final_oi_cilindro ,  rx_final_oi_eje ,  rx_final_oi_adicion ,  rx_final_od_agudes_visual ,  rx_final_oi_agudes_visual ,  diagnostico ,  control ,  observacion , fecha) VALUES ($fk_usuario,$fk_cliente,'$patologia1','$patologia2','$patologia3','$tratamiento1','$tratamiento2','$tratamiento3','$cronicidad1','$cronicidad2','$cronicidad3','$observacion1','$observacion2','$observacion3','$anamnesis','$rx_uso_od_esfera','$rx_uso_od_cilindro','$rx_uso_od_eje','$rx_uso_od_adicion','$rx_uso_oi_esfera','$rx_uso_oi_cilindro','$rx_uso_oi_eje','$rx_uso_oi_adicion','$vision_lejos_od','$vision_lejos_oi','$vision_cerca_od','$vision_cerca_oi','$examen_externo_od','$examen_externo_oi','$reflejos_pupilares_fotomotor','$reflejos_pupilares_consensual','$reflejos_pupilares_acomodacion','$cover_test_vision_lejos','$cover_test_vision_proxima','$cover_test_ducciones','$cover_test_versiones','$od_oftalmoloscopio','$oi_oftalmoloscopio','$od_queratrometra','$oi_queratrometra','$od_retinoscopia','$oi_retinoscopia','$rx_final_od_esfera','$rx_final_od_cilindro','$rx_final_od_eje','$rx_final_od_adicion','$rx_final_oi_esfera','$rx_final_oi_cilindro','$rx_final_oi_eje','$rx_final_oi_adicion','$rx_final_od_agudes_visual','$rx_final_oi_agudes_visual','$diagnostico','$control','$observacion','$hoy')";
    echo($sql);
    $result = setData($sql,'root','');

    if($result){
        echo "
        <script>
            alert('Guardado efectuado Correctamente');
            window.location.href='../../historiaClinica.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error en el Guardado');
            window.location.href='../../historiaClinica.php';
        </script>
    ";
    }
?>