<?php
	require 'conexion.php';

	$sql="select bp.idBpeticion, bp.ID, b.nombre, b.apPaterno, b.apMaterno from b_peticion bp, bibliotecario b where bp.ID=b.ID and bp.estado= 0";
	$resultado=$base->prepare($sql);
	$resultado->execute();
	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idBpeticion' => $res['idBpeticion'],
	 			'ID' => $res['ID'],
	 			'nombre' => $res['nombre'],
	 			'aP' => $res['apPaterno'],
	 			'aM' => $res['apMaterno']
	 		);
	 	}
	 echo json_encode($json);

?>