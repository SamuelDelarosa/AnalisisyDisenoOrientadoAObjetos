<?php
	$id_usu= $_POST['ID'];
	if($id_usu===''){
			echo json_encode("ID vacio");
	}else{
		require 'conexion.php';
		$sql='delete from usuario where boleta = :ID';
		$resultado=$base->prepare($sql);
		$resultado->bindParam(":ID",$id_usu);
		if($resultado->execute()){
		echo json_encode("Eliminado");
		}else{
		echo json_encode("Error");
		}
	}

?>