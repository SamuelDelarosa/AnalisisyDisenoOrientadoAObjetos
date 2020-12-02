<?php	
	$c_titulo=$_POST['c-titulo'];
	$c_num= $_POST['c-NUM'];
	if($c_titulo===''){
		echo json_encode('Favor de escribir un titulo');
	}else if($c_num===''){
		echo json_encode('Favor de escribir un ID');
	}else {
		require 'conexion.php';
	$sql="insert into cd (id_cd, Nombre) values(:id, :nombre)";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":id",$c_num);
	$resultado->bindParam(":nombre",$c_titulo);
	if($resultado->execute()){
		echo json_encode('CD registrado');
	}else{
		echo json_encode('Ocurrio un error al registrar el CD');
	}
	}

?>