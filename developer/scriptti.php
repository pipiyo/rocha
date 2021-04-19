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
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];

///// Declaracion de variables Toma de Información

$CLIENTE = $_POST['txt_cliente'];
$RUT_CLIENTE= $_POST['txt_rut'];
$OBRA = $_POST['txt_obra'];
$DIRECCION = $_POST['txt_direccion'];
$TXT_DIRECTOR = $_POST['txt_director'];
$CONTACTO = $_POST['txt_contacto'];
$FONO = $_POST['txt_fono'];
$MAIL = $_POST['txt_mail'];
$FECHA_INGRESO = date("Y-m-d");
$PUESTOS = $_POST['txt_puestos'];
$ESTADO = 'Pendiente';

if($PUESTOS == '')
{
	$PUESTOS = 0;
}

//1
if (isset($_POST['txt_isometrica']))  
{
	$ISOMETRICA = $_POST['txt_isometrica'];
}
else
{
	$ISOMETRICA = 0;
}
//2
if (isset($_POST['txt_fichas_puestos']))  
{
	$FICHAS_PUESTOS = $_POST['txt_fichas_puestos'];
}
else
{
	$FICHAS_PUESTOS = 0;
}
//3
if (isset($_POST['txt_desc_mueble']))  
{
	$DESC_MUEBLES = $_POST['txt_desc_mueble'];
}
else
{
	$DESC_MUEBLES  = 0;
}
//4
if (isset($_POST['txt_sin_desc']))  
{
	$SIN_DESC = $_POST['txt_sin_desc'];
}
else
{
	$SIN_DESC  = 0;
}
//5
if (isset($_POST['txt_fotorrealismo']))  
{
	$FOTORREALISMO = $_POST['txt_fotorrealismo'];
}
else
{
	$FOTORREALISMO  = 0;
}
//6
if (isset($_POST['txt_fichas_sillas']))  
{
	$FICHA_SILLA = $_POST['txt_fichas_sillas'];
}
else
{
	$FICHA_SILLA  = 0;
}
//7
if (isset($_POST['txt_desc_sillas']))  
{
	$DESC_SILLA = $_POST['txt_desc_sillas'];
}
else
{
	$DESC_SILLA  = 0;
}
//8
if (isset($_POST['txt_garantia']))  
{
	$GARANTIA = $_POST['txt_garantia'];
}
else
{
	$GARANTIA  = 0;
}

// FIN TRASPASO DE FORMULARIO

// CONSULTA SQL	              
$sql = "INSERT INTO ti(RUT_CLIENTE, OBRA, DIRECTOR_PROYECTO,DIRECCION_OBRA, CONTACTO, FONO, MAIL, FECHA_INGRESO,  PUESTOS, ISOMETRICA, FICHA_PUESTO, DESC_MUEBLES, SIN_DESCUENTO, FOTORREALISMO, FICHA_SILLA, DESC_SILLA, GARANTIA, CODIGO_USUARIO, ESTADO,PUNTOS) VALUES ('".($RUT_CLIENTE)."','".($OBRA)."','".$TXT_DIRECTOR."','".$DIRECCION."','".($CONTACTO)."',".$FONO.",'".($MAIL)."','".$FECHA_INGRESO."',".$PUESTOS.",'".$ISOMETRICA."','".$FICHAS_PUESTOS."',".$DESC_MUEBLES.",'".$SIN_DESC."','".$FOTORREALISMO."','".($FICHA_SILLA )."','".$DESC_SILLA ."','".$GARANTIA."','".$CODIGO_USUARIO."','".$ESTADO."','0')";
$result = mysql_query($sql, $conn) or die(mysql_error());	


$sql1 = "SELECT * FROM ti ORDER BY CODIGO_TI DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_TI = $row["CODIGO_TI"];

  }

/// TI_DESCRIPCION
$contador = 0;
while ($contador <= 49 )
{
$PUESTO_TIPO = $_POST['txt_puesto_tipo'.$contador];

if($PUESTO_TIPO != "")
{
$LINEA= $_POST['txt_linea'.$contador];





if(is_uploaded_file($_FILES['fleImagen'.$contador]['tmp_name'])) { // verifica haya sido cargado el archivo
//

$sql12 = "SELECT * FROM ti_descripciones ORDER BY ID_TI_DESCRIPCIONES DESC LIMIT 1";
$result22 = mysql_query($sql12, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result22))
  {
	$CODIGO_ID_TI = $row["ID_TI_DESCRIPCIONES"];

  }
  $TOT = $CODIGO_ID_TI + 1;

$archivo = $_FILES['fleImagen'.$contador]['name']; 
$trozos = explode(".", $archivo); 
$extension = end($trozos);
$NOMBRE_FILE = "Planimetria-".$CODIGO_ID_TI.".".$extension;
//
$ruta= "Planimetria/".$NOMBRE_FILE;
move_uploaded_file($_FILES['fleImagen'.$contador]['tmp_name'], ($ruta));
}
$sql01="INSERT INTO ti_descripciones (PUESTO_TIPO, ESQUEMA, LINEA, CODIGO_TI) VALUES ('".$PUESTO_TIPO."','".$ruta."','".$LINEA."','".$CODIGO_TI."')";

$result01 = mysql_query($sql01, $conn) or die(mysql_error());

}
$contador++;
}


echo '<script language = javascript>
alert("La orden de compra esta a la espera de la aprobacion")
self.location = "TiDescripcion.php?CODIGO_TI='.$CODIGO_TI.'"
</script>';

?>