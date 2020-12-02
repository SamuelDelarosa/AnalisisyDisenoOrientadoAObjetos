<?php
	require 'conexion.php';
	/*$nombre_lib=$_POST['titulo_lib'];

	$nombre_autor=$_POST['autor_lib'];
	$nombre_edit=$_POST['editorial_lib'];
	$codigo=$_POST['codigo_lib'];
	*/
	$nombre_lib="sa";
	$nombre_autor;
	$nombre_edit;
	$codigo;
	if(!empty($nombre_lib)&&empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
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

	 }else if(empty($nombre_lib)&&!empty($nombre_autor)&&empty($nombre_edit)&&empty($codigo)){
	 	$nombre_autor_like="%{$nombre_autor}%";
	 	$sql='select l.idLibro, l.nombre from libro l, autor a where (l.idAutor1=a.idAutor or l.idAutor2=a.idAutor or l.idAutor3=a.idAutor) and a.nombre like :autor';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":autor",$nombre_autor_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array(
	 		'idLibro'=> $res['idLibro'],
			'nombre'=> $res['nombre']
			);
	 }else if(empty($nombre_lib)&&empty($nombre_autor)&&!empty($nombre_edit)&&empty($codigo)){
	 	$nombre_editorial_like="%{$nombre_editorial}%";
	 	$sql='select idLibro, nombre from libro where nombre like :Editorial order by 1';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":Editorial",$nombre_editorial_like, PDO::PARAM_STR);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array(
	 		'idLibro'=> $res['idLibro'],
			'nombre'=> $res['nombre']
			);
	 }else if(empty($nombre_lib)&&empty($nombre_autor)&&empty($nombre_edit)&&!empty($codigo)){
	 	$sql='select idLibro, nombre from libro where idLibro = :codigo ';
	 	$resultado=$base->prepare($sql);
	 	$resultado->bindParam(":codigo",$codigo_lib);
	 	$resultado->execute();
	 	$res= $resultado->fetch(PDO::FETCH_ASSOC);
	 	$json=array(
	 		'idLibro'=> $res['idLibro'],
			'nombre'=> $res['nombre']
			);
	}


?>