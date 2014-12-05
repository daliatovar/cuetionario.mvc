<?php

$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="cuestionario_mvc";

$con=mysql_connect($db_server,$db_user,$db_pass) or die("Error en la conexion a la base de datos");

mysql_select_db($db_name,$con) or die("La base no se encuentra creada");
mysql_query("SET NAMES UTF8");

?>
