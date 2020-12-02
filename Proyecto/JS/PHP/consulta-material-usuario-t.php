<?php
	require 'conexion.php';
	$nombre_tt=$_POST['cmut-t'];
	$nombre_corto=$_POST['cmut-nc'];
	$numerott=$_POST['cmut-n'];
	$autor=$_POST['cmut-a'];
	$director=$_POST['cmut-d'];
	if (empty($nombre_tt)&&empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		echo json_encode('Llena algun campo');
	}else if(!empty($nombre_tt)&&empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		$nombre_tt_like="%{$nombre_tt}%";
		$sql='select t.id_TT, t.titulo, t.nom_corto, t.autor, t.director, rt.estado from tt t, reservacion_tt rt where t.id_TT=rt.idtt and t.titulo like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_tt_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo'],
	 			'nc'=> $res['nom_corto'],
	 			'autor'=> $res['autor'],
	 			'director'=> $res['director'],
	 			'estado'=> $res['estado']
	 		);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Trabajo terminal no existe");
	 	}
	}else if(empty($nombre_tt)&& !empty($nombre_corto)&&empty($numerott)&&empty($autor)&&empty($director)){
		$nombre_corto_like="%{$nombre_corto}%";	
		$sql='select t.id_TT, t.titulo, t.nom_corto, t.autor, t.director, rt.estado from tt t, reservacion_tt rt where t.id_TT=rt.idtt and t.nom_corto like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_corto_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo'],
	 			'nc'=> $res['nom_corto'],
	 			'autor'=> $res['autor'],
	 			'director'=> $res['director'],
	 			'estado'=> $res['estado']
	 		);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Trabajo terminal no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& !empty($numerott)&&empty($autor)&&empty($director)){
		$sql='select t.id_TT, t.titulo, t.nom_corto, t.autor, t.director, rt.estado from tt t, reservacion_tt rt where t.id_TT=rt.idtt and t.id_TT = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$numerott);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo'],
	 			'nc'=> $res['nom_corto'],
	 			'autor'=> $res['autor'],
	 			'director'=> $res['director'],
	 			'estado'=> $res['estado']
	 		);
	 	
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Trabajo terminal no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& empty($numerott)&& !empty($autor)&&empty($director)){

		$nombre_autor_like="%{$autor}%";	
		$sql='select t.id_TT, t.titulo, t.nom_corto, t.autor, t.director, rt.estado from tt t, reservacion_tt rt where t.id_TT=rt.idtt and t.Autor like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_autor_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo'],
	 			'nc'=> $res['nom_corto'],
	 			'autor'=> $res['autor'],
	 			'director'=> $res['director'],
	 			'estado'=> $res['estado']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Trabajo terminal no existe");
	 	}
	}else if(empty($nombre_tt)&& empty($nombre_corto)&& empty($numerott)&& empty($autor)&& !empty($director)){
		$nombre_director_like="%{$director}%";	
		$sql='select t.id_TT, t.titulo, t.nom_corto, t.autor, t.director, rt.estado from tt t, reservacion_tt rt where t.id_TT=rt.idtt and t.director like :Titulo';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Titulo",$nombre_director_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$json=array();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$json[]= array(
	 			'idTT' => $res['id_TT'],
	 			'titulo' => $res['titulo'],
	 			'nc'=> $res['nom_corto'],
	 			'autor'=> $res['autor'],
	 			'director'=> $res['director'],
	 			'estado'=> $res['estado']);
	 	}
	 	if(!empty($json)){
			//echo $res['idLibro'];
			echo json_encode($json);
	 	}else{
	 		echo json_encode("Trabajo terminal no existe");
	 	}
	}
?>