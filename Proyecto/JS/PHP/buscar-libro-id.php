<?php
	require 'conexion.php';
	$codigo=$_POST['texto'];
	//$codigo=7;
	if (empty($codigo)){
		echo json_encode('Inicia la busqueda');
	}else if(!empty($codigo)){
		$nombre_codigo_like="%{$codigo}%";
	 	$sql='select l.*, rl.idrl, rl.estado from libro l, reservacion_l rl where l.idLibro=rl.idLibro and l.idlibro like :codigo order by l.idlibro';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$nombre_codigo_like);
	 	$resultado->execute();
	 	//$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idrl'=>$res['idrl'],
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre'],
	 			'Editorial' => $res['Editorial'],
	 			'Autor' => $res['Autor'],
	 			'Estado' => $res['estado']
	 		);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}


?>