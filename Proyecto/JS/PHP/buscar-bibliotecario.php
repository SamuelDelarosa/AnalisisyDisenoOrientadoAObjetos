<?php
	
	$id_bib= $_POST['buscar-bib'];
	/*$boleta = 20140313;
	$contrasena ="prueba";*/

	if($id_bib===''){
	 	echo json_encode('Ingrese alguna ID de bibliotecario');
	 }else{
	 require 'conexion.php';
		$sql='select * from bibliotecario where ID = :id ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":id",$id_bib);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res)){
		 $json=array(
		 	'ID'=>$res['ID'],
		 	'nombre'=>$res['nombre'],
		 	'aP'=>$res['apPaterno'],
		 	'aM'=>$res['apMaterno'],
		 	'correo'=>$res['correo'],
		 	'telefono'=>$res['telefono'],
		 	'contrasena'=>$res['contrasena']
		 );
		 echo json_encode($json);
		}else{
		echo json_encode("No existe");
		}
		  
	}
?>