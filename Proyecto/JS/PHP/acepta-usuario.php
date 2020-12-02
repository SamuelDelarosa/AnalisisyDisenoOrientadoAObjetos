<?php
	require 'conexion.php';

	$sql="select ap.idApeticion, ap.boleta, u.nombre, u.apPaterno, u.apMaterno, u.ID_TU from a_peticion ap, usuario u where ap.boleta=u.boleta and ap.estado= 0";
	$resultado=$base->prepare($sql);
	$resultado->execute();
	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idBpeticion' => $res['idApeticion'],
	 			'ID' => $res['boleta'],
	 			'nombre' => $res['nombre'],
	 			'aP' => $res['apPaterno'],
	 			'aM' => $res['apMaterno'],
	 			'tipo'=> $res['ID_TU']
	 		);
	 	}
	 echo json_encode($json)

?>