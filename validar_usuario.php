<?php
/****************************************
**establecemos conexion con el servidor.
**nombre del servidor: localhost.
**Nombre de usuario: root.
**Contrase�a de usuario: root.
**Si la conexion fallara mandamos un msj 'ha fallado la conexion'**/
mysql_connect('localhost','root','')or die ('Ha fallado la conexi�n: '.mysql_error());

/*Luego hacemos la conexi�n a la base de datos. 
**De igual manera mandamos un msj si hay algun error*/
mysql_select_db('votacion')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
 
/*caturamos nuestros datos que fueron enviados desde el formulario mediante el metodo POST
**y los almacenamos en variables.*/
$usuario = $_POST["admin"];   
$password = $_POST["password_usuario"];
$us="administrador";
$pa="jimenez8311";

/*Consulta de mysql con la que indicamos que necesitamos que seleccione
**solo los campos que tenga como nombre_administrador el que el formulario
**le ha enviado*/
$result = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'");

//Validamos si el nombre del administrador existe en la base de datos o es correcto
if($row = mysql_fetch_array($result))
{     
//Si el usuario es correcto ahora validamos su contrase�a
 if($row["password"] == $password)
 {
  //Creamos sesi�n
  session_start();  
  //Almacenamos el nombre de usuario en una variable de sesi�n usuario
  $_SESSION['usuario'] = $usuario;  
  //Redireccionamos a la pagina: index.php
  header("Location: index1.php");  
 }
 else if((strcmp ($usuario , $us ) == 0) && (strcmp ($password , $pa ) == 0))
 {
  //Creamos sesi�n
  session_start();  
  //Almacenamos el nombre de usuario en una variable de sesi�n usuario
  $_SESSION['usuario'] = $usuario;  
  //Redireccionamos a la pagina: index.php
  header("Location: index1.php");  
 }
 else
 {
  //En caso que la contrase�a sea incorrecta enviamos un msj y redireccionamos a login.php
  ?>
   <script languaje="javascript">
    alert("Contrase�a Incorrecta");
    location.href = "login.php";
   </script>
  <?php
            
 }
}


else if((strcmp ($usuario , $us ) == 0) && (strcmp ($password , $pa ) == 0))
 {
  //Creamos sesi�n
  session_start();  
  //Almacenamos el nombre de usuario en una variable de sesi�n usuario
  $_SESSION['usuario'] = $usuario;  
  //Redireccionamos a la pagina: index2.php
  header("Location: index2.php");  
 }

else
{
 //en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
?>
 <script languaje="javascript">
  alert("El nombre de usuario es incorrecto!");
  location.href = "login.php";
 </script>
<?php   
        
}

//Mysql_free_result() se usa para liberar la memoria empleada al realizar una consulta
mysql_free_result($result);

/*Mysql_close() se usa para cerrar la conexi�n a la Base de datos y es 
**necesario hacerlo para no sobrecargar al servidor, bueno en el caso de
**programar una aplicaci�n que tendr� muchas visitas ;) .*/
mysql_close();
?>