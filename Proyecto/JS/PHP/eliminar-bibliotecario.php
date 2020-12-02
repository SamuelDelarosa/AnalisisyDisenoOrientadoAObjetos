<?php
	$id_bib= $_POST['ID'];
	if($id_bib===''){
			echo json_encode("ID vacio");
	}else{
		require 'conexion.php';
		$sql='delete from bibliotecario where ID = :ID';
		$resultado=$base->prepare($sql);
		$resultado->bindParam(":ID",$id_bib);
		if($resultado->execute()){
		echo json_encode("Eliminado");
		}else{
		echo json_encode("Error");
		}
	}

?>