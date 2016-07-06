<?php 
//Proceso de conexión con la base de datos
include("Conexion/Conexion.php");

//Inicio de variables de sesión
if (!isset($_SESSION)) {
  session_start();

}

//Recibir los datos ingresados en el formulario
$nombreUsuario= $_POST['username'];
$contrasena= $_POST['password'];

   function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }



    $ip = getRealIP() ;


    date_default_timezone_set("Chile/Continental");

if($nombreUsuario != "" && $contrasena != "" )
{

mysql_select_db($database_conn, $conn);
$sql = "INSERT INTO registro_usuario (NAME,IP,FECHA) values ('".$nombreUsuario."','".$ip."','".date("Y-m-d H:i:s")."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
//Consultar grupos
mysql_select_db($database_conn, $conn);
$consulta= "SELECT * FROM USUARIO WHERE NOMBRE_USUARIO='".$nombreUsuario."'"; 
$resultado= mysql_query($consulta, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultado))
  {
	$PASSBD = $row["PASS"];
	$CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
	$NOMBRE_USUARIO = $row["NOMBRE_USUARIO"];
	$TIPO_USUARIO = $row["TIPO_USUARIO"];
  }
mysql_free_result($resultado);

$consultaa= "SELECT CODIGO_GRUPO FROM grupo_usuario WHERE CODIGO_USUARIO='".$CODIGO_USUARIO1."'"; 

$resultadoo= mysql_query($consultaa, $conn) or die(mysql_error());
	 $GRUPOS = array();
            $i = "0";

 while($row = mysql_fetch_array($resultadoo))
  {
	$GRUPOS[$i] = $row["CODIGO_GRUPO"];
            $i++;
  }
mysql_free_result($resultadoo);




$OBJETOS = array();
$sqlob = "SELECT CODIGO_OBJETO FROM grupo_objeto WHERE CODIGO_GRUPO IN('".implode("','",$GRUPOS)."') "; 
$sqlobr= mysql_query($sqlob, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($sqlobr))
  {
    $OBJETOS[] = $row["CODIGO_OBJETO"];
  }
mysql_free_result($sqlobr);
$OBJETOS = array_unique($OBJETOS);








$SUBOBJETOS = array();
$sqlsob = "SELECT CODIGO_SUBOBJETO FROM grupo_subobjetos WHERE CODIGO_GRUPO IN('".implode("','",$GRUPOS)."') "; 
$sqlsobr= mysql_query($sqlsob, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($sqlsobr))
  {
    $SUBOBJETOS[] = $row["CODIGO_SUBOBJETO"];
  }
mysql_free_result($sqlsobr);










$SUBOBJETOSPLAY = array();
$sqlssob = "SELECT IDENTIFICADOR FROM subobjeto WHERE ID_SUBOBJETO IN('".implode("','",$SUBOBJETOS)."') "; 
$sqlssobr= mysql_query($sqlssob, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($sqlssobr))
  {
    $SUBOBJETOSPLAY[] = $row["IDENTIFICADOR"];
  }
mysql_free_result($sqlssobr);











$LISTA = array();
$sqlob2 = "SELECT * FROM objetos WHERE ID_OBJETO IN('".implode("','",$OBJETOS)."') "; 
$sqlob2r= mysql_query($sqlob2, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($sqlob2r))
  {
    $LISTA[] =  array( "COD"  =>  $row["OBJETO"]  ,   "PHP"  =>  $row["HOJA_PHP"],   "HER"  =>  $row["HERENCIA"]  )  ;
  }
mysql_free_result($sqlob2r);











if (crypt($contrasena, $PASSBD) == $PASSBD || $PASSBD == $contrasena)
{

	$_SESSION['CODIGO_USUARIO'] = $CODIGO_USUARIO1;
	$_SESSION['NOMBRE_USUARIO'] = $NOMBRE_USUARIO;
	$_SESSION['TIPO_USUARIO'] = $TIPO_USUARIO;
	$_SESSION["autentificado"]= "SI";
    $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s"); 
	$_SESSION['GRUPOS'] = $GRUPOS;

	
	$_SESSION['carrito'] = array();
$_SESSION['cotizacion'] = array();
	
	 $_SESSION['prooc'] = array();
	
  $_SESSION['OBJETOS'] = $LISTA;
    $_SESSION['SUBOBJETOS'] = $SUBOBJETOSPLAY;


	header("Location: Home.php");

} 
else
{
echo '<script language = javascript>
	alert("Usuario o Password errados, por favor verifique :(.")
	self.location = "index.php"
	</script>';
}
}
else
{
echo '<script language = javascript>
  alert("Usuario o Password errados, por favor verifique :(.")
  self.location = "index.php"
  </script>';
}
?>