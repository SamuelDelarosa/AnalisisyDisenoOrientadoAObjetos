<?php
	$id_bib= $_POST['ID'];
	$nombre= $_POST['nombre'];
	$aP= $_POST['aP'];
	$aM= $_POST['aM'];
	$correo= $_POST['correo'];
	$telefono= $_POST['telefono'];
	$contrasena= $_POST['contrasena'];

	if($id_bib===''||$nombre===''||$aP===''||$aM===''||$correo===''||$telefono===''||$contrasena===''){
			echo json_encode("Campos vacios");
	}else{
		require 'conexion.php';
		$sql='update bibliotecario set nombre = :nombre , apPaterno = :aP , apMaterno = :aM , correo = :correo, telefono = :telefono , contrasena = :contrasena where ID= :ID';
		$resultado=$base->prepare($sql);
		$resultado->bindParam(":nombre",$nombre);
		$resultado->bindParam(":aP",$aP);
		$resultado->bindParam(":aM",$aM);
		$resultado->bindParam(":correo",$correo);
		$resultado->bindParam(":telefono",$telefono);
		$resultado->bindParam(":contrasena",$contrasena);
		$resultado->bindParam(":ID",$id_bib);
		if($resultado->execute()){
		echo json_encode("Actualizado");
		}else{
		echo json_encode("Error");
		}
	}

?>