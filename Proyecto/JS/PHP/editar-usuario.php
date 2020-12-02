<?php
	$id_usu= $_POST['ID'];
	$nombre= $_POST['nombre'];
	$aP= $_POST['aP'];
	$aM= $_POST['aM'];
	$correo= $_POST['correo'];
	$telefono= $_POST['telefono'];
	$contrasena= $_POST['contrasena'];
	$tipo= $_POST['tipo'];
	$tipo_n=0;

	if($id_usu===''||$nombre===''||$aP===''||$aM===''||$correo===''||$telefono===''||$contrasena===''||$tipo===''){
			echo json_encode("Algun campo esta vacio");
	}else{
		if($tipo==='Alumno'){
			$tipo_n=1;
		require 'conexion.php';
		$sql='update usuario set nombre = :nombre , apPaterno = :aP , apMaterno = :aM , correo = :correo, telefono = :telefono , contrasena = :contrasena, ID_TU= :tipo where boleta= :ID';
		$resultado=$base->prepare($sql);
		$resultado->bindParam(":nombre",$nombre);
		$resultado->bindParam(":aP",$aP);
		$resultado->bindParam(":aM",$aM);
		$resultado->bindParam(":correo",$correo);
		$resultado->bindParam(":telefono",$telefono);
		$resultado->bindParam(":contrasena",$contrasena);
		$resultado->bindParam(":tipo",$tipo_n);
		$resultado->bindParam(":ID",$id_usu);
		if($resultado->execute()){
		echo json_encode("Alumno actualizado ");
		}else{
		echo json_encode("Error");
		}
		}else if($tipo==='Profesor'){
			$tipo_n=2;
			require 'conexion.php';
		$sql='update usuario set nombre = :nombre , apPaterno = :aP , apMaterno = :aM , correo = :correo, telefono = :telefono , contrasena = :contrasena, ID_TU= :tipo where boleta= :ID';
		$resultado=$base->prepare($sql);
		$resultado->bindParam(":nombre",$nombre);
		$resultado->bindParam(":aP",$aP);
		$resultado->bindParam(":aM",$aM);
		$resultado->bindParam(":correo",$correo);
		$resultado->bindParam(":telefono",$telefono);
		$resultado->bindParam(":contrasena",$contrasena);
		$resultado->bindParam(":tipo",$tipo_n);
		$resultado->bindParam(":ID",$id_usu);
		if($resultado->execute()){
		echo json_encode("Profesor actualizado ");
		}else{
		echo json_encode("Error");
		}
		}else{
			echo json_encode('no existe ese tipo de usuario');
		}
		
	}

?>