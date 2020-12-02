<?php

require 'conexion.php';
session_start();
$boleta=$_SESSION['numero_boleta'];
$ID_pet=$_POST['texto'];
if(empty($ID_pet)){
	echo json_encode("Ingrese alguna ID");
}else{
	$sql="update a_peticion set estado=1 where idApeticion= :ID and estado=0";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":ID",$ID_pet);
	if($resultado->execute()){
		//echo json_encode("actualizado");
		$sql2='insert into a_aceptacion (idApeticion,ID_bibliotecario,fecha) values(:ID, :boleta, now())';
		//echo json_encode($sql2);
	$resultado2=$base->prepare($sql2);
	$resultado2->bindParam(":ID",$ID_pet);
	$resultado2->bindParam(":boleta",$boleta);
	if($resultado2->execute()){
		echo json_encode("Aceptado");
	}else{
		echo json_encode("Error");
	}
	}else{
		echo json_encode("ID no existe");
	}

}
?>