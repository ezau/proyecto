<?php
/* By http://php-estudios.blogspot.com */

/* PARTE 1: AL INICIO SE EXTRAEN TODAS LAS FILAS */
//Necesitamos establecer una conexión con la base de datos.
$mysql_usuario = "root";
$mysql_password = "";
$mysql_host = "localhost";
$mysql_database = "votacion";

//Datos de conexión
$conexion = mysql_connect($mysql_host, $mysql_usuario, $mysql_password, true);

//Seleccionar la base datos y la conexión y capturar posibles errores con die
mysql_select_db($mysql_database, $conexion) || die('No pudo conectarse: '.mysql_error());

//Preparar la consulta para extraer todos los clientes
$consulta = "SELECT * FROM encuestas";

//Ejecutar la consulta
$resultado = mysql_query($consulta, $conexion) or die(mysql_error());

//Extraer todas la filas y almacenarlas en una tabla
$table = "<table border='1' cellpadding='10'>\n";
$table .= "<tr><th>ID</th><th>titulo</th><th>fecha</th></tr>\n";
while($fila = mysql_fetch_assoc($resultado)){
$table .= "<tr>
      <td>".$fila["id"]."</td>
      <td>".$fila["titulo"]."</td>
      <td>".$fila["fecha"]."</td>
      
      <td><form method='post' action=''> \n
      <input type='hidden' name='id' value='".$fila["id"]."'>
      <input type='submit' value='Eliminar'>
      </form></td>
   </tr>\n";
    }
$table .= "</table>\n"; 


/* PARTE 2: SI SE ENVÍA EL FORMULARIO CAPTURAR LOS DATOS PARA ELIMINAR EL CLIENTE */

if (isset($_POST["id"]))
{
//Se almacena en una variable el id del registro a eliminar
$id = $_POST["id"];

//Preparar la consulta
$consulta = "DELETE FROM encuestas WHERE id=$id";

//Ejecutar la consulta
$resultado = mysql_query($consulta, $conexion) or die(mysql_error());

//redirigir nuevamente a la página para ver el resultado
header("location: eliminar.php");
}
  
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

      <h1>ELIMINAR ENCUESTAS</h1>
      <ul class="votacion index">
      </ul>
      <?php 

/* Mostrar la tabla con los registros */
echo $table; 

echo '<a href="index2.php" class="volver">&larr; Volver</a>';
?>
   </div>
</body>
</html>




<?php 
/* Cerrar la conexión */
mysql_close($conexion); 
?>