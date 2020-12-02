<?php

require 'conexion.php';
session_start();
$boleta=$_SESSION['numero_boleta'];
$id=$_POST['id-c'];
if(empty($id)){
	echo json_encode("no");
}else{
$sql="insert into reservacion_cd (boleta,idcd,fecha_r,Estado) values(:boleta, :idlibro,now(),'Sin entregar')";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$boleta);
	$resultado->bindParam(":idlibro",$id);
	if($resultado->execute()){
		echo json_encode("actualizado");}
		else{
			echo json_encode("Problemas");
		}}
?>