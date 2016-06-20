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

    	<h1>SISTEMA DE ENCUESTA</h1>
    	<ul class="votacion index">
		<?php
			while($result = mysql_fetch_object($req)){
				echo '<li><a href="encuesta.php?id='.$result->id.'">'.$result->titulo.'</a></li>';
			}
		?>
		</ul>
    	<table>
		<tr>
		<!--<a href="agregar.php">+ Agregar nueva encuesta</a></td>-->
		</tr>
		<tr>
		</tr>
		<tr>
		<td><a href="login.php">+ Cerrar Sesion</a></td>
		</tr>
		</table>
	</div>
</body>
</html>