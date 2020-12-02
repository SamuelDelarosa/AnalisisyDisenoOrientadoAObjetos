<?php	
	$t_titulo=$_POST['t-titulo'];
	$t_TC= $_POST['t-NC'];
	$t_num= $_POST['t-NUM'];
	$t_autor= $_POST['t-Autor'];
	$t_direct= $_POST['t-Direc'];
	if($t_titulo===''){
		echo json_encode('Favor de escribir un titulo');
	}else if($t_TC===''){
		echo json_encode('Favor de escribir un titulo corto');
	}else if($t_num==''){
		echo json_encode('Favor de escribir un numero de tt');
	}else if($t_autor===''){
		echo json_encode('Favor de escribir un autor');
	}
	else if($t_direct===''){
		echo json_encode('Favor de escribir un director');
	}else {
		require 'conexion.php';
	$sql="insert into tt (id_tt, titulo, nom_corto, Autor, Director) values(:id, :nombre, :NC, :autor, :dir)";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":id",$t_num);
	$resultado->bindParam(":nombre",$t_titulo);
	$resultado->bindParam(":NC",$t_TC);
	$resultado->bindParam(":autor",$t_autor);
	$resultado->bindParam(":dir",$t_direct);
	if($resultado->execute()){
		echo json_encode('Trabajo Terminal registrado');
	}else{
		echo json_encode('Ocurrio un error al registrar el Trabajo Terminal');
	}
	}

?>