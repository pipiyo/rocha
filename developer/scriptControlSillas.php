<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);


///// Declaracion de variables Toma de Información


$contador = 1;
while($contador < 7)
{
$AM=$_POST['am'.$contador];
$PM= $_POST['pm'.$contador];
$ID= $_POST['id'.$contador];
$OB= $_POST['ob'.$contador];
$FECHA= $_POST['fecha'];

$TIPO='';
switch ($contador)
		 {
	case "1":
        $TIPO = 'ARMADO SILLA';
        break;
    case "2":
        $TIPO = 'TAPIZADO';	
        break;
    case "3":
        $TIPO = 'RETAPIZADO';	
        break;
    case "4":
        $TIPO = 'TAPIZADO BALDOSA';
        break;
    case "5":
        $TIPO = 'TAPIZADO PANTALLA';	
        break;
    case "6":
         $TIPO = 'LIMPIEZA SILLAS';	
        break;
		 }
		 
$PROYECTADO  = 1;
$sql1 = "SELECT * FROM control_produccion where TIPO = '".$TIPO."'  ORDER BY PROYECTADO LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$PROYECTADO = $row["PROYECTADO"];
  }		 
mysql_free_result($result2);
if($PROYECTADO == 0 || $PROYECTADO == "")
{
	$PROYECTADO = 1;
}

if($AM == '' && $PM == '')
{
 
}
else if($ID == "" )	
{
$sql = "INSERT INTO control_produccion(FECHA, AM, PM, TIPO,PROYECTADO,OBSERVACION) VALUES('".$FECHA."','".$AM."','".$PM."','".$TIPO."','".$PROYECTADO."','".$OB."')";
$result = mysql_query($sql, $conn) or die(mysql_error());
}
else
{
$sql = "UPDATE control_produccion SET AM = '".$AM."', PM = '".$PM."', OBSERVACION = '".$OB."' WHERE ID = '".$ID."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}
if($ID != "" )
{
if(isset($_POST['el'.$contador]))  
{
  $sql = "delete from control_produccion  WHERE ID = '".$ID."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}
}

$contador++;


}
	

echo '<script language = javascript>
javascript:history.go(-2)
</script>';

?>