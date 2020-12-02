<?php
session_start();
$boleta=$_SESSION['numero_boleta'];
require 'conexion.php';
$sql="select ID, nombre, apPaterno, apMaterno, correo, telefono from bibliotecario where ID= :boleta";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$boleta);
	$resultado->execute();
	$res= $resultado ->fetch(PDO::FETCH_ASSOC);
	/*echo $res['boleta'];
	echo $res['nombre'];
	*/
	/*if($res['ID_TU']==='1'){
	$tipo='Alumno';
	}else{
	$tipo='Profesor';	
	}*/
	$json=array(
		'ID'=> $res['ID'],
		'nombre'=> $res['nombre'],
		'apPaterno'=> $res['apPaterno'],
		'apMaterno'=> $res['apMaterno'],
		'correo'=> $res['correo'],
		'telefono'=> $res['telefono']
	);
	//$jsonstring= json_encode($json);
	echo json_encode($json);

?>