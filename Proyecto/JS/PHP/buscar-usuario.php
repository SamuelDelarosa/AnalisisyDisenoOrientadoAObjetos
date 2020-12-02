<?php
	
	$id_usu= $_POST['buscar-usu'];
	//$id_usu = 2014030329;
	//$contrasena ="prueba";

	if($id_usu===''){
	 	echo json_encode('Ingrese alguna ID de usuario');
	 }else{
	 require 'conexion.php';
		$sql='select * from usuario where boleta = :id ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":id",$id_usu);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res)){
		 $json=array(
		 	'ID'=>$res['boleta'],
		 	'nombre'=>$res['nombre'],
		 	'aP'=>$res['apPaterno'],
		 	'aM'=>$res['apMaterno'],
		 	'correo'=>$res['correo'],
		 	'telefono'=>$res['telefono'],
		 	'contrasena'=>$res['contrasena'],	 	
		 	'tipo'=>$res['ID_TU']
		 );
		 echo json_encode($json);
		}else{
		echo json_encode("No existe");
		}
		  
	}
?>