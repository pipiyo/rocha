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
while($contador < 12)
{
$AM=$_POST['am'.$contador];


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