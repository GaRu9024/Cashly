<?php
function conectarse(){
	$link=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($link,"conekta");
	if (!$link) {
		echo 'Error conectando base de datos';
	}
	if (!$db) {
		echo 'Error seleccionando la base de datos';
	}
	return $link;
}
echo'Conexion exitosa con la base de datos';
?>