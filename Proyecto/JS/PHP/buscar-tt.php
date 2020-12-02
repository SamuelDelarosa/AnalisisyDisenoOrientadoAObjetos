<?php
	require 'conexion.php';
	$nombre_tt=$_POST['titulo-tt'];
	$nombre_corto=$_POST['N_corto'];
	$numerott=$_POST['Num_tt'];
	$autor=$_POST['Autor_al'];
	$director=$_POST['Director'];
	if (empty($nombre_tt)&&empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		echo json_encode('Llena algun campo');
	}else if(!empty($nombre_tt)&&empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		$nombre_tt_like="%{$nombre_tt}%";
		$sql='select id_TT, titulo from tt where titulo like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_tt_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}else if(empty($nombre_tt)&& !empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		$nombre_corto_like="%{$nombre_corto}%";	
		$sql='select id_TT, titulo from tt where nom_corto like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_corto_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& !empty($numerott)&&empty($autor)&&empty($director)){
		$sql='select id_TT, titulo from tt where id_TT = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$numerott);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo']);
	 	
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& empty($numerott)&& !empty($autor)&&empty($director)){

		$nombre_autor_like="%{$autor}%";	
		$sql='select id_TT, titulo from tt where Autor like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_autor_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& empty($numerott)&& empty($autor)&& !empty($director)){
		$nombre_director_like="%{$director}%";	
		$sql='select id_TT, titulo from tt where director like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_director_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}

	/*else if(!empty($nombre_tt)&&empty($nombre_corto)&&empty($nombre_edit)&&empty($codigo)){
		$nombre_lib_like="%{$nombre_lib}%";
	 	$sql='select idLibro, nombre from libro where nombre like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_lib_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	//$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}

	 }else if(empty($nombre_tt)&&!empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
	 	$nombre_autor_like="%{$nombre_autor}%";
	 	$sql='select idLibro, nombre from libro where autor like :autor';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":autor",$nombre_autor_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	 }else if(empty($nombre_tt)&&empty($nombre_autor)&&!empty($nombre_edit)&&empty($codigo)){
	 	$nombre_editorial_like="%{$nombre_edit}%";
	 	$sql='select idLibro, nombre from libro where editorial like :Editorial ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Editorial",$nombre_editorial_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idLibro' => $res['idLibro'],
	 			'nombre' => $res['nombre']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Editorial no existe");
	 	}
	 }else if(empty($nombre_tt)&&empty($nombre_autor)&&empty($nombre_edit)&&!empty($codigo)){
	 	$sql='select idLibro, nombre from libro where idLibro = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$codigo);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array(
	 		'idLibro'=> $res['idLibro'],
			'nombre'=> $res['nombre']
			);
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Libro no existe");
	 	}
	}

*/
?>