<?php
	require 'conexion.php';
	$nombre_cd=$_POST['cmuc-t'];
	$numero=$_POST['cmuc-n'];
	//$nombre_cd='s';
	//$numero=$_POST['cmuc-n'];
	if(empty($nombre_cd)&&empty($numero)){
			echo json_encode("Llena algun campo");
	}else if(!empty($nombre_cd)&&empty($numero)){
			$nombre_cd_like="%{$nombre_cd}%";
				$sql='select c.id_CD, c.nombre, rc.estado from cd c, reservacion_cd rc where c.id_CD=rc.idcd and  c.nombre like :Titulo';
			 	$resultado=$base->prepare($sql);
			 	$resultado->bindParam(":Titulo",$nombre_cd_like, PDO::PARAM_STR);
			 	$resultado->execute();
			 	$json=array();
			 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
			 		$json[]= array(
			 			'idCD' => $res['id_CD'],
			 			'Nombre' => $res['nombre'],
			 			'estado' => $res['estado']
			 		);
			 	}
			 	if(!empty($json)){
					//echo $res['idLibro'];
					echo json_encode($json);
			 	}else{
			 		echo json_encode("CD no existe");
			 	}

	}else if(empty($nombre_cd)&& !empty($numero)){
		$sql='select c.id_CD, c.nombre, rc.estado from cd c, reservacion_cd rc  where c.id_CD=rc.idcd and c.id_CD = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$numero);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json[]= array(
			 			'idCD' => $res['id_CD'],
			 			'Nombre' => $res['nombre'],
			 			'estado' => $res['estado']
			 	);
	 	
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("CD no existe");
	 	}
	}

?>