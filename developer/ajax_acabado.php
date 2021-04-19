<?php
session_start();
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 

$LISTACANTO = array();

$sql5 =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND not FAMILIA = 'GENERICO' AND NOT DESHABILITAR = 1 AND CUERPO = '".$_POST['cue']."'";
$result5 = mysql_query($sql5, $conn) or die(mysql_error());
while($row5 = mysql_fetch_array($result5))
  {
    $LISTACANTO[] = $row5['CANTO'];
  }
mysql_free_result($result5);

echo json_encode($LISTACANTO);

?>
