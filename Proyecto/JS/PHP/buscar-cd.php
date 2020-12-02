<?php
	require 'conexion.php';
	$nombre_cd=$_POST['titulo-cd'];
	$numero=$_POST['Num_cd'];

	if(empty($nombre_cd)&&empty($numero)){
			echo json_encode("Llena algun campo");
	}else if(!empty($nombre_cd)&&empty($numero)){
			$nombre_cd_like="%{$nombre_cd}%";
				$sql='select id_CD, nombre from cd where nombre like :Titulo';
			 	$resultado=$base->prepare($sql);
			 	$resultado->bindParam(":Titulo",$nombre_cd_like, PDO::PARAM_STR);
			 	$resultado->execute();
			 	$json=array();
			 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
			 		$json[]= array(
			 			'idCD' => $res['id_CD'],
			 			'Nombre' => $res['nombre']);
			 	}
			 	if(!empty($json)){
					//echo $res['idLibro'];
					echo json_encode($json);
			 	}else{
			 		echo json_encode("Libro no existe");
			 	}

	}else if(empty($nombre_cd)&& !empty($numero)){
		$sql='select id_CD, Nombre from cd where id_CD = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$numero);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json[]= array(
			 			'idCD' => $res['id_CD'],
			 			'Nombre' => $res['Nombre']);
	 	
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}

?>