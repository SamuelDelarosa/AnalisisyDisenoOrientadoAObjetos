<?php
	
	$boleta = $_POST['numero_boleta'];
	$contrasena =$_POST['contrasena'];
	/*$boleta = 20140313;
	$contrasena ="prueba";*/

	if($boleta===''||$contrasena===''){
	 	echo json_encode('Llena todos los campos');
	 }else{
	 require 'conexion.php';
	 if($boleta<100){
		$sql='select ID from administrador where ID = :boleta and contrasena = :contrasena';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":boleta",$boleta);
		 $resultado->bindParam(":contrasena",$contrasena);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		  if(!empty($res)){
	 	session_start();
	 	$_SESSION['numero_boleta']=$boleta;
	 	echo json_encode('Entrar-Admin');
	 	}else { 	
	 	echo json_encode('Error de contrase&ntilde;a o usuario');
	 	}
	}else if($boleta>=100 && $boleta<200){
		$sql='select ID from bibliotecario where ID = :boleta and contrasena = :contrasena ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":boleta",$boleta);
		 $resultado->bindParam(":contrasena",$contrasena);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		  if(!empty($res)){
		 $sql2='select ID from b_peticion where ID = :boleta and estado = 1';
		 $resultado2=$base->prepare($sql2);
		 $resultado2->bindParam(":boleta",$boleta);
		 $resultado2->execute();
		 $res2=$resultado2 ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res2)){
		 session_start();
	 	$_SESSION['numero_boleta']=$boleta;
	 	echo json_encode('Entrar-bibli');
		 }else{
		 echo json_encode('Peticion no aceptada espere a ser aceptado');
		 }
	 	}else { 	
	 	echo json_encode('Error de contrase&ntilde;a o usuario');
	 	}
	}else if ($boleta>=200){
		//echo "hola";
		$sql='select boleta from usuario where boleta = :boleta and contrasena = :contrasena ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":boleta",$boleta);
		 $resultado->bindParam(":contrasena",$contrasena);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		  if(!empty($res)){
		 $sql2='select boleta from a_peticion where boleta = :boleta and estado = 1';
		 $resultado2=$base->prepare($sql2);
		 $resultado2->bindParam(":boleta",$boleta);
		 $resultado2->execute();
		 $res2=$resultado2 ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res2)){
		 session_start();
	 	$_SESSION['numero_boleta']=$boleta;
	 	echo json_encode('Entrar-usua');
		 }else{
		 echo json_encode('Peticion no aceptada espere a ser aceptado');
		 }
	 	}else { 	
	 	echo json_encode('Error de contrase&ntilde;a o usuario');
	 	}
	}
	 }

?>