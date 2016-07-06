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

$txt_desde =$_POST['txt_desde'];
$txt_hasta =$_POST['txt_hasta'];
$contador = 1;
while($contador < 7)
{
$AM=$_POST['am'.$contador];


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

if($AM == "" )	
{

}
else
{
$sql = "UPDATE control_produccion SET PROYECTADO = '".$AM."' WHERE FECHA between '".$txt_desde."' and '".$txt_hasta."' AND TIPO = '".$TIPO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}

$contador++;


}
	

echo '<script language = javascript>
javascript:history.go(-2)
</script>';

?>