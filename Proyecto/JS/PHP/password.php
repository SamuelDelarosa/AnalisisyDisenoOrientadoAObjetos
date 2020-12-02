<?php
	//$boleta=2014030327;
	$boleta=$_POST['boleta'];
	if($boleta===''){
		echo json_encode('vacio');
	}else{
	 require 'conexion.php';
	 $sql='select correo, contraseña from usuario where boleta= :boleta';
	 $resultado=$base->prepare($sql);
	 $resultado->bindParam(":boleta",$boleta);
	 $resultado->execute();
	 $datos=$resultado->fetch(PDO::FETCH_ASSOC);
	 $correo = $datos['correo'];
		//$correo = "de.la.rosa.samuel9@gmail.com";
	 $contrasena =$datos['contraseña'];
	 $texto="contraseña: ".$contrasena;
	 $asunto ="Recuperar contraseña";
	 $resultado->closeCursor();
	 $exito =mail($correo,$asunto,$texto);

	 if($exito){

	 	 //echo "bien";
	 	
	 	echo json_encode("exito");
	 }else{
	 	 //echo "t";
	 	echo json_encode("falso");
	 }
	 //}

?>