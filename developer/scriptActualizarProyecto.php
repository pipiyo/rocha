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
$estado= $_POST['dos'];
if($estado == 'ENPROCESO' )
{
$estado = 'EN PROCESO';
}

mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];



$buscarcli  = $_POST['buscarcli'];
$buscareje  = $_POST['buscareje'];
$buscarcod  = $_POST['buscarcod'];

$contador = 0;


$CODIGO_ROCHA= $_POST['rocha'];
$FECHA_ENTREGA= $_POST['col'];	
$FECHA_INGRESO= $_POST['cil'];	
$FECHA_CONFIRMACION = $_POST['cul'];	
$DIS= $_POST['dis'];
$REP= $_POST['rep'];
$FECHA = date('Y/m/d');
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];

$obs= $_POST['obs'];	
$area= $_POST['area'];
$razon= $_POST['razon'];


mysql_select_db($database_conn, $conn);

$contador = "select * from proyecto where CODIGO_PROYECTO = '".$CODIGO_ROCHA."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
$cuenta = 0;

 while($row = mysql_fetch_array($result1))
  {
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  }
  mysql_free_result($result1);
  
if( substr($FECHA_ENTREGA,0,10) != substr($FECHA_CONFIRMACION,0,10))
{
$segundos=strtotime($FECHA_CONFIRMACION) - strtotime($FECHA_INGRESO);
$dias=intval($segundos/60/60/24);
$dias1=$dias - $DIS;
$dias2=(($dias - $DIS) + $REP);


$sql6="UPDATE proyecto set FECHA_CONFIRMACION = '".$FECHA_CONFIRMACION."', DIAS = '".$dias."', REPROGRAMACION = '".$dias2."' where CODIGO_PROYECTO ='".$CODIGO_ROCHA."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());
$contador++;

/*
$para      = 'cri.maturana@gmail.com';
$titulo    = 'Reprogramación';
$mensaje   = 'El Rocha '.$CODIGO_ROCHA.' ha sido reprogramado para el dia '.$FECHA_CONFIRMACION.', por el area '.$area.', con la causal '.$obs.'. ';
$cabeceras = 'From: wolf@system.com' . "\r\n" .
    'Reply-To: wolf@system.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);*/





if(isset($_POST['act']))
{





}else{


$sql = "INSERT INTO actualizaciones (OBSERVACIONES,FECHA,USUARIO,NOMBRE_USUARIO,AREA,RAZON) values ('Reprogramacion: ".($obs)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','".($area)."','".($razon)."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

$sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
$result8 = mysql_query($sql8, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result8))
  {
	$CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
  }
mysql_free_result($result8);

$sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_GENERAL) values ('".($CODIGO_A)."','".($CODIGO_ROCHA)."')";
$resulta = mysql_query($sqla, $conn) or die(mysql_error());


};













}
else
{
$sql6="UPDATE proyecto set FECHA_CONFIRMACION = '".$FECHA_CONFIRMACION."' where CODIGO_PROYECTO ='".$CODIGO_ROCHA."'"; 
$result6 = mysql_query($sql6, $conn) or die(mysql_error());	
}


if($estado == 'rocha')
{
echo '<script language = javascript>
alert("Fecha Modificada")
self.location = "editarProyecto.php?CODIGO_PROYECTO='.urlencode($CODIGO_ROCHA).'"
</script>';
}
else
{
	echo '<script language = javascript>
alert("Fecha Modificada")
self.location = "proyectos.php?rangonegativo=3&rangopositivo=14&buscarcli='.urlencode($buscarcli).'&buscarcod='.urlencode($buscarcod).'&buscareje='.urlencode($buscareje).'&estado='.$estado.'&"
</script>';
}

?>