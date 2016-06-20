<?php 
// datos para la coneccion a mysql 
$host="localhost";
$usuario="root"; 
$password="";
$conectar=mysql_connect($host, $usuario, $password);
mysql_select_db("votacion",$conectar);
