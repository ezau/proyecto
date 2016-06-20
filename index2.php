<?php
$host="localhost";
$usuario="root";
$password="";
$conectar=mysql_connect($host, $usuario, $password);
mysql_select_db("votacion",$conectar);
$sql = "SELECT * FROM encuestas ORDER BY id DESC";
$req = mysql_query($sql);
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sistema de encuestas</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>


    <div class="wrap">

    	<h1>ADMINISTRACION</h1>


    	
    	<table>
		<tr>
		<td><a href="agregar.php">+ Agregar nueva encuesta</a></td>
		</tr>
		<tr>
<td><a href="eliminar.php">+Eliminar encuesta</a></td>
		</tr>
		<tr>
		<td><a href="login.php">+Cerrar Sesion</a></td>

                <tr>
                
                </tr>
		</tr>
		</table>
	</div>
</body>
</html>