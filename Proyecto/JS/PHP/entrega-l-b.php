<?php
	require 'conexion.php';
	$cod_res=$_POST['reser'];

	if (empty($cod_res)){
		echo json_encode('Ingrese algun id');
	}else{
		//echo json_encode($cod_res);
		$sql="update reservacion_l set Estado='Entregado' where idrl= :ID ";
			$resultado=$base->prepare($sql);
			$resultado->bindParam(":ID",$cod_res);
			if($resultado->execute()){
				echo json_encode('Entregado');
			}else{
				echo json_encode('Error');
			}
	}

?>