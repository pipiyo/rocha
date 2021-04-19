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
while($contador < 12)
{
$AM=$_POST['am'.$contador];
$NO=$_POST['no'.$contador];
$PM= $_POST['pm'.$contador];
$ID= $_POST['id'.$contador];
$OB=$_POST['ob'.$contador];
$FECHA= $_POST['fecha'];

$TIPO='';
switch ($contador)
		 {
	case "1":
        $TIPO = 'CORTE';
        break;
    case "2":
        $TIPO = 'ENCHAPE RECTO';	
        break;
    case "3":
        $TIPO = 'ENCHAPE CURVO';	
        break;
    case "4":
        $TIPO = 'PERFORADOR MULTIPLE';
        break;
    case "5":
        $TIPO = 'CENTRO DE MECANIZADO';	
        break;
    case "6":
         $TIPO = 'LAMINADO';	
        break;
	case "7":
         $TIPO = 'RUTEADO';
        break;
    case "8":
         $TIPO = 'ARMADO';
        break;
    case "9":
         $TIPO = 'MUEBLES ESPECIALES';	
        break;
	case "10":
          $TIPO = 'LIMPIEZA';
        break;
  case "11":
          $TIPO = 'BARNIZ';
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
if($AM == '' && $PM == '' && $NO == '')
{
 
}
else if($ID == "" )	
{
$sql = "INSERT INTO control_produccion(FECHA, AM, PM, TIPO,PROYECTADO,OBSERVACION,NOCHE) VALUES('".$FECHA."','".$AM."','".$PM."','".$TIPO."','".$PROYECTADO."','".$OB."','".$NO."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
}
else
{
$sql = "UPDATE control_produccion SET AM = '".$AM."', PM = '".$PM."', NOCHE = '".$NO."', OBSERVACION = '".$OB."' WHERE ID = '".$ID."'";
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