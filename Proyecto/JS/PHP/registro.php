<?php	

	$v1_nombre=$_POST['nombre'];
	$v2_apP= $_POST['apP'];
	$v3_apM= $_POST['apM'];
	$v4_email= $_POST['email'];
	//$v4_email='de.la.rosa.tania07';
	$v5_boleta= $_POST['boleta'];
	$v6_contrasena= $_POST['contrasena'];
	$v7_tipo=$_POST['tipo'];
	$v8_telefono= $_POST['telefono'];
	$l_n = strlen($v1_nombre);
	$l_ap = strlen($v2_apP);
	$l_am = strlen($v3_apM);
	$l_em = strlen($v4_email);
	$l_bo = strlen($v5_boleta);
	$l_te = strlen($v8_telefono);
	$re =is_valid_email($v4_email);
					function is_valid_email($str)
								{
						  $matches = null;
						  return (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $str, $matches));
								}
	if($v1_nombre===''|| $v2_apP===''||$v3_apM===''||$v4_email===''||$v5_boleta===''||$v6_contrasena===''||$v8_telefono===''){
		echo json_encode('Ningun campo puede ser vacio');
	}else{
		if($l_n>30){
			echo json_encode("Tu nombre excede el limite");
		}else if($l_ap>30){
			echo json_encode("Tu apellido paterno excede el limite");
		}
		else if($l_am>30){
			echo json_encode("Tu apellido materno excede el limite");
		}
		else if($l_em>60){
			echo json_encode("Tu correo excede el limite");
		}
		else if($l_bo>11){
			echo json_encode("Tu aboleta excede el limite");
		}else if($l_te>20){
			echo json_encode("Tu aboleta excede el limite");
		}else {
			if(empty($re)){
				echo json_encode('Tu correo no es valido');
			}else{
				require 'conexion.php';
	if($v7_tipo===3){
	$sql="insert into bibliotecario (ID, nombre, apPaterno,apMaterno,correo, telefono, contrasena) values(:boleta, :nombre, :apP, :apM, :email,  :telefono, :contrasena)";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$v5_boleta);
	$resultado->bindParam(":nombre",$v1_nombre);
	$resultado->bindParam(":apP",$v2_apP);
	$resultado->bindParam(":apM",$v3_apM);
	$resultado->bindParam(":email",$v4_email);
	$resultado->bindParam(":contrasena",$v6_contrasena);
	$resultado->bindParam(":telefono",$v8_telefono);
	if($resultado->execute()){
		$sql2="insert into b_peticion (ID,estado) values(:boleta, false )";
		$resultado2=$base->prepare($sql2);
		$resultado2->bindParam(":boleta",$v5_boleta);
		if($resultado2->execute()){
		echo json_encode('Datos registrados');
		}else{
		echo json_encode('error');
		}
		$resultado2->closeCursor();
	}else{
		echo json_encode('Datos no registrados');
	}

	}else{
	$sql="insert into usuario (boleta, nombre, apPaterno,apMaterno,correo, contrasena, telefono, ID_TU) values(:boleta, :nombre, :apP, :apM, :email, :contrasena, :telefono, :tipo)";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$v5_boleta);
	$resultado->bindParam(":nombre",$v1_nombre);
	$resultado->bindParam(":apP",$v2_apP);
	$resultado->bindParam(":apM",$v3_apM);
	$resultado->bindParam(":email",$v4_email);
	$resultado->bindParam(":contrasena",$v6_contrasena);
	$resultado->bindParam(":telefono",$v8_telefono);
	$resultado->bindParam(":tipo",$v7_tipo);
	if($resultado->execute()){
		$sql2="insert into a_peticion (boleta,estado) values(:boleta, false )";
		$resultado2=$base->prepare($sql2);
		$resultado2->bindParam(":boleta",$v5_boleta);
		if($resultado2->execute()){
		echo json_encode('Datos registrados');
		}else{
		echo json_encode('error');
		}
		$resultado2->closeCursor();
	}else{
		echo json_encode('Datos no registrados');
	}
	}
	$resultado->closeCursor();
			}
		}
	
}
?>