<?php	
	$l_titulo=$_POST['l-titulo'];
	$l_autor= $_POST['l-autor'];
	$l_edit= $_POST['l-edit'];
	$l_isbn= $_POST['l-isbn'];
	if($l_titulo===''){
		echo json_encode('Favor de escribir un titulo');
	}else if($l_autor===''){
		echo json_encode('Favor de escribir un autor');
	}else if($l_edit==''){
		echo json_encode('Favor de escribir una editorial');
	}else if($l_isbn===''){
		echo json_encode('Favor de escribir un ID');
	}else {
		require 'conexion.php';
	$sql="insert into libro (idlibro, nombre, Editorial, Autor) values(:id, :nombre,  :edit, :autor)";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":id",$l_isbn);
	$resultado->bindParam(":nombre",$l_titulo);
	$resultado->bindParam(":edit",$l_edit);
	$resultado->bindParam(":autor",$l_autor);
	if($resultado->execute()){
		echo json_encode('Libro registrado');
	}else{
		echo json_encode('Ocurrio un error al registrar el libro');
	}
	}

?>