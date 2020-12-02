<?php
session_start();
$boleta=$_SESSION['numero_boleta'];
$json=array();
require 'conexion.php';
$sql="select rl.idrl, l.idlibro, l.nombre, rl.fecha_r, rl.fecha_e, rl.estado from reservacion_l rl, libro l where  l.idlibro=rl.idlibro and rl.boleta= :boleta order by 1";
	$resultado=$base->prepare($sql);
	$resultado->bindParam(":boleta",$boleta);
	$resultado->execute();
	 	while($res= $resultado->fetch(PDO::FETCH_ASSOC)){
	 		$tex='';
	 		if($res['fecha_e']===null){
	 			$text='sin definir';
	 		}

	 		$json[]= array(
	 			'id_prestamo' => $res['idrl'],
	 			'tipo' => 'Libro',
	 			'id_mat' => $res['idlibro'],
	 			'titulo' => $res['nombre'],
	 			'fp' => $res['fecha_r'],
	 			'fe' => $text,
	 			'estado' => $res['estado']
	 		);
	 	}
///////////////////////////////////////////////////////////
$sql2="select rt.idrtt, t.id_tt, t.titulo, rt.fecha_r, rt.fecha_e, rt.estado from reservacion_tt rt, tt t where  t.id_tt=rt.idtt and rt.boleta= :boleta order by 1";
	$resultado2=$base->prepare($sql2);
	$resultado2->bindParam(":boleta",$boleta);
	$resultado2->execute();
	 	while($res2= $resultado2->fetch(PDO::FETCH_ASSOC)){
	 		$tex2='';
	 		if($res2['fecha_e']===null){
	 			$text2='sin definir';
	 		}

	 		$json[]= array(
	 			'id_prestamo' => $res2['idrtt'],
	 			'tipo' => 'TT',
	 			'id_mat' => $res2['id_tt'],
	 			'titulo' => $res2['titulo'],
	 			'fp' => $res2['fecha_r'],
	 			'fe' => $text2,
	 			'estado' => $res2['estado']
	 		);
	 	}
///////////////////////////////////////////////////////////////////////////////////////////////
$sql3="select rc.idrcd, c.id_cd, c.nombre, rc.fecha_r, rc.fecha_e, rc.estado from reservacion_cd rc, cd c where  c.id_cd=rc.idcd and rc.boleta= :boleta order by 1";
	$resultado3=$base->prepare($sql3);
	$resultado3->bindParam(":boleta",$boleta);
	$resultado3->execute();
	 	while($res3= $resultado3->fetch(PDO::FETCH_ASSOC)){
	 		$tex3='';
	 		if($res3['fecha_e']===null){
	 			$text3='sin definir';
	 		}

	 		$json[]= array(
	 			'id_prestamo' => $res3['idrcd'],
	 			'tipo' => 'TT',
	 			'id_mat' => $res3['id_cd'],
	 			'titulo' => $res3['nombre'],
	 			'fp' => $res3['fecha_r'],
	 			'fe' => $text3,
	 			'estado' => $res3['estado']
	 		);
	 	}
///////////////////////////////////////////////////////////////////////////////////////////////
	 echo json_encode($json);

?>