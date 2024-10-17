<?php

function permitirAcceso($tipo, $modulo) {

	include('conexion.php');

	$sql = "SELECT * FROM `privilegio` WHERE `tipoUsuario` = '$tipo' AND `modulo` = '$modulo'";

	$resultado = $conexion -> query($sql);

	if($resultado -> num_rows > 0) {
		return true;
	}
	else {
		return false;
	}
}

?>