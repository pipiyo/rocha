<?php
require_once('Conexion/Conexion.php'); 
session_start();
mysql_select_db($database_conn, $conn);

$CUERPO= $_POST['cuerpo'];
$FRENTE = $_POST['frente'];
$ID = $_POST['idp'];
$METALES = $_POST['metales'];
$TRASCARA = $_POST['trascara'];
$ESPESOR = $_POST['espesor'];
$CANTO = $_POST['canto'];

$CUERPOFINAL = array();



foreach ($ID as $key => $value) 
{
	$sql="INSERT INTO acabado (ID_CP, CUERPO, FRENTE, ESPESOR, TRASCARA, CANTO, METALES) VALUES ('".$value."','".$CUERPO[$key]."','".$FRENTE[$key]."','".$ESPESOR[$key]."','".$TRASCARA[$key]."','".$CANTO[$key]."','".$METALES[$key]."')";
  $result = mysql_query($sql, $conn) or die(mysql_error());
}

echo json_encode($ID);

?>
