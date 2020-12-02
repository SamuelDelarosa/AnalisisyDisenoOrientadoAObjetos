<?php
	require 'conexion.php';
	$nombre_lib=$_POST['cmul-t'];
	$nombre_autor=$_POST['cmul-a'];
	$nombre_edit=$_POST['cmul-e'];
	$codigo=$_POST['cmul-n'];
	//$codigo=77076896;
	if (empty($nombre_lib)&&empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
		echo json_encode('Llena algun campo');
	}else if(!empty($nombre_lib)&&empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
		$nombre_lib_like="%{$nombre_lib}%";
	 	$sql='select l.idLibro, l.nombre, l.autor, l.editorial, rl.estado from libro l, reservacion_l rl where l.idlibro=rl.idLibro and l.nombre like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_lib_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	//$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre'],
	 			'autor'=>$res['autor'],
	 			'edit'=>$res['editorial'],
	 			'estado'=>$res['estado']
	 		);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}

	 }else if(empty($nombre_lib)&&!empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
	 	$nombre_autor_like="%{$nombre_autor}%";
	 	$sql='select l.idLibro, l.nombre, l.autor, l.editorial, rl.estado from libro l, reservacion_l rl where l.idlibro=rl.idLibro and l.autor like :autor';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":autor",$nombre_autor_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre'],
	 			'autor'=>$res['autor'],
	 			'edit'=>$res['editorial'],
	 			'estado'=>$res['estado']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	 }else if(empty($nombre_lib)&&empty($nombre_autor)&&!empty($nombre_edit)&&empty($codigo)){
	 	$nombre_editorial_like="%{$nombre_edit}%";
	 	$sql='select l.idLibro, l.nombre, l.autor, l.editorial, rl.estado from libro l, reservacion_l rl where l.idlibro=rl.idLibro and l.editorial like :Editorial ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Editorial",$nombre_editorial_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre'],
	 			'autor'=>$res['autor'],
	 			'edit'=>$res['editorial'],
	 			'estado'=>$res['estado']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Editorial no existe");
	 	}
	 }else if(empty($nombre_lib)&&empty($nombre_autor)&&empty($nombre_edit)&&!empty($codigo)){
	 	$sql='select l.idLibro, l.nombre, l.autor, l.editorial, rl.estado from libro l, reservacion_l rl where l.idlibro=rl.idLibro and l.idLibro = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$codigo);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array(
	 		'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre'],
	 			'autor'=>$res['autor'],
	 			'edit'=>$res['editorial'],
	 			'estado'=>$res['estado']
			);
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}


?>