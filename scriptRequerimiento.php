<?php 
//Proceso de conexi�n con la base de datos
require_once('Conexion/Conexion.php'); 

  session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
if ($_SESSION["autentificado"] != "SI") { 
    //si no est� logueado lo env�o a la p�gina de autentificaci�n 
    header("Location: index.php"); 
} else { 
    //sino, calculamos el tiempo transcurrido 
    $fechaGuardada = $_SESSION["ultimoAcceso"]; 
    $ahora = date("Y-n-j H:i:s"); 
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

    //comparamos el tiempo transcurrido 
     if($tiempo_transcurrido >= 1200) { 
     //si pasaron 10 minutos o m�s 
      session_destroy(); // destruyo la sesi�n 
      echo '<script language = javascript>
alert("Sesion Caducada ")
self.location = "index.php"
</script>'; //env�o al usuario a la pag. de autenticaci�n 
      //sino, actualizo la fecha de la sesi�n 
    }else { 
    $_SESSION["ultimoAcceso"] = $ahora; 
   } 
} 

$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$OBS = $_GET["solicitud_requerimiento"];
$DEPARTAMENTO = $_GET['departamento_requerimiento'];

$fecha = date("y-m-y G:i:s");
mysql_select_db($database_conn, $conn);
$sql = "insert into requerimiento(CODIGO_USUARIO,OBSERVACIONES,DEPARTAMENTO,FECHA,ESTADO) values ('".$CODIGO_USUARIO."','".$OBS."','".$DEPARTAMENTO."','".date("Y-m-d")."','EN ESPERA') ";
$result = mysql_query($sql, $conn) or die(mysql_error());


echo '<script language = javascript>
alert("Ok")
self.location = "Requerimiento.php"
</script>';

?>