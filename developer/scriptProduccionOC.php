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

$ID =$_POST['id'];

$contador = 1;
while($contador < 10)
{
$AM=$_POST['am'.$contador];


$TIPO='';
switch ($contador)
		 {
	case "1":
        $TIPO = 'CORTE';
        break;
    case "2":
        $TIPO = 'FORMAS';	
        break;
    case "3":
        $TIPO = 'LAMINADO';	
        break;
    case "4":
        $TIPO = 'ENCHAPE';
        break;
    case "5":
        $TIPO = 'ENCHAPE_CURVO';	
        break;
    case "6":
         $TIPO = 'PERFORADO';	
        break;
	case "7":
         $TIPO = 'ARMADO';
        break;
    case "8":
         $TIPO = 'LIMPIEZA';
        break;
    case "9":
         $TIPO = 'RECLAMO';	
        break;
		 }

if($AM == "" )	
{

}
else
{
$sql = "UPDATE oc_producto SET ".$TIPO." = '".$AM."' WHERE ID = '".$ID."'";
$result = mysql_query($sql, $conn) or die(mysql_error());
}

$contador++;


}
	

echo '<script language = javascript>
javascript:history.go(-1)
</script>';

?>