<?php
	
	$id_usu= $_POST['buscar-mat'];
	$tipo=$_POST['tipo'];
	//echo json_encode($id_usu);
	//$id_usu = 2014030329;
	//$contrasena ="prueba";

	if($id_usu===''){
	 	echo json_encode('Ingrese alguna ID de material');
	 }else{

	
	require 'conexion.php';
	 if($tipo==='1'){
	 	$sql='select * from libro where idlibro = :id ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":id",$id_usu);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res)){
		 $json=array(
		 	'tipo'=> 'Libro',
		 	'ID'=>$res['idLibro'],
		 	'nombre'=>$res['nombre'],
		 	'edt'=>$res['Editorial'],
		 	'aut'=>$res['Autor']
		 );
		 echo json_encode($json);
		}else{
		echo json_encode("No existe");
		}
	 }else if($tipo==='2'){
	 	$sql='select * from tt where id_TT = :id ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":id",$id_usu);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res)){
		 $json=array(
		 	'tipo'=> 'TT',
		 	'ID'=>$res['id_TT'],
		 	'nombre'=>$res['titulo'],
		 	'nc'=>$res['nom_corto'],
		 	'aut'=>$res['Autor'],
		 	'dire'=>$res['Director']

		 );
		 echo json_encode($json);
		}else{
		echo json_encode("No existe");
		}
	 }else if($tipo==='3'){
	 	$sql='select * from cd where id_CD = :id ';
		 $resultado=$base->prepare($sql);
		 $resultado->bindParam(":id",$id_usu);
		 $resultado->execute();
		 $res= $resultado ->fetch(PDO::FETCH_ASSOC);
		 if(!empty($res)){
		 $json=array(
		 	'tipo'=> 'CD',
		 	'ID'=>$res['id_CD'],
		 	'nombre'=>$res['Nombre']

		 );
		 echo json_encode($json);
		}else{
		echo json_encode("No existe");
		}
	 }
	 
		
		  
	}
?>