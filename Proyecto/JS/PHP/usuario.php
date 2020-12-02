<?php
session_start();
$boleta=$_SESSION['numero_boleta'];
require 'conexion.php';
$sql="select boleta, nombre, apPaterno, apMaterno, telefono, correo, ID_TU from usuario where boleta= :boleta";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$boleta);
	$resultado->execute();
	$res= $resultado ->fetch(PDO::FETCH_ASSOC);
	/*echo $res['boleta'];
	echo $res['nombre'];
	*/
	if($res['ID_TU']==='1'){
	$tipo='Alumno';
	}else{
	$tipo='Profesor';	
	}
	$json=array(
		'boleta'=> $res['boleta'],
		'nombre'=> $res['nombre'],
		'apPaterno'=> $res['apPaterno'],
		'apMaterno'=> $res['apMaterno'],
		'telefono'=> $res['telefono'],
		'correo'=> $res['correo'],
		'tipo'=> $tipo
	);
	$jsonstring= json_encode($json);
	echo json_encode($json);

?>