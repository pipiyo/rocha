<?php
require_once('Conexion/Conexion.php'); 

$LISTA = json_decode($_POST['lista']);
$LISTA1 = json_decode($_POST['lista1']);
$INDEX = array_values(array_filter(json_decode($_POST['index'])));
$COTIZACION = array();
$COTIZACION[0] = array();

foreach ($INDEX as $llave => $value) {

	if ($value != '') {
	$COTIZACION[$value] =  array();
	}

};

foreach ($LISTA as $key => $value) {

if (in_array($LISTA[$key][0], $INDEX)) {
	$COTIZACION[$LISTA[$key][0]][] = $LISTA[$key];
}else if(count($LISTA[$key]) > 3){

	$COTIZACION[0][] =  $LISTA[$key];		
};

};

session_start();


$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];

mysql_select_db($database_conn, $conn);


  $LISTA1[1][1] = str_replace(".","",$LISTA1[1][1]); 
  $LISTA1[1][1] = str_replace(",",".",$LISTA1[1][1]);

  $LISTA1[2][1] = str_replace(".","",$LISTA1[2][1]); 
  $LISTA1[2][1] = str_replace(",",".",$LISTA1[2][1]);

  $LISTA1[3][1] = str_replace(".","",$LISTA1[3][1]); 
  $LISTA1[3][1] = str_replace(",",".",$LISTA1[3][1]);

  $LISTA1[4][1] = str_replace(".","",$LISTA1[4][1]); 
  $LISTA1[4][1] = str_replace(",",".",$LISTA1[4][1]);

  $LISTA1[5][1] = str_replace(".","",$LISTA1[5][1]); 
  $LISTA1[5][1] = str_replace(",",".",$LISTA1[5][1]);

  $LISTA1[6][1] = str_replace(".","",$LISTA1[6][1]); 
  $LISTA1[6][1] = str_replace(",",".",$LISTA1[6][1]);

  $LISTA1[7][1] = str_replace(".","",$LISTA1[7][1]); 
  $LISTA1[7][1] = str_replace(",",".",$LISTA1[7][1]);

$sql = "UPDATE cotizacion SET USER = '".$CODIGO_USUARIO."', NETO = '".$LISTA1[1][1]."', DESCUENTO = '".$LISTA1[2][1]."',SUB_TOTAL = '".$LISTA1[3][1]."',DESCUENTO2 = '".$LISTA1[4][1]."',SUB_TOTAL2 = '".$LISTA1[5][1]."',IVA = '".$LISTA1[6][1]."',TOTAL = '".$LISTA1[7][1]."'  WHERE CODIGO_RADICADO = '".$LISTA1[0][1]."' ";

$result = mysql_query($sql, $conn) or die(mysql_error());



$sqlA = "SELECT * FROM cotizacion WHERE CODIGO_RADICADO = '".$LISTA1[0][1]."'";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
{
  $CODIGO_COT = $row["CODIGO_COTIZACION"];
}
mysql_free_result($resultA);

$eliminar = "(";
foreach ($COTIZACION as $key => $value)
{
  foreach ($COTIZACION[$key] as $llave => $valor) 
  {
      $contador = 0;

      foreach ($COTIZACION[$key][$llave] as $kk => $vv) 
      {
        if($contador == 9)
        {
         $eliminar .= "'".$vv."',";
        }
        $contador++;
      }
  }
}

$eliminar .= "'')";

$sql = "DELETE FROM cotizacion_producto WHERE CODIGO_COTIZACION = '".$CODIGO_COT ."' AND ID NOT IN ".$eliminar."";
$result = mysql_query($sql, $conn) or die(mysql_error());


foreach ($COTIZACION as $key => $value)
{
	foreach ($COTIZACION[$key] as $llave => $valor) 
	{
      $contador = 0;
      $actualizar = "";
      $insertar = "(";
      
  		foreach ($COTIZACION[$key][$llave] as $kk => $vv) 
  		{

        if($contador == 4 || $contador == 5 || $contador == 6 || $contador == 7 )
        {
          $vv = str_replace(".","",$vv); 
          $vv = str_replace(",",".",$vv);
        }

        $insertar .= "'".trim($vv)."',";

        switch($contador){
          case 0:
            $actualizar .= "CANTIDAD = '".trim($vv)."', ";
          break;
          case 1:
            $actualizar .= "CODIGO_PRODUCTO = '".trim($vv)."', ";
          break;
          case 2:
            $actualizar .= "DESCRIPCION = '".trim($vv)."', ";
          break;
          case 3:
            $actualizar .= "POM = '".trim($vv)."', ";
          break;
          case 4:
            $actualizar .= "VALOR_UNITARIO = '".trim($vv)."', ";
          break;
          case 5:
            $actualizar .= "DESCUENTO = '".trim($vv)."', ";
          break;
          case 6:
            $actualizar .= "VALOR_TOTAL = '".trim($vv)."', ";
          break;
          case 7:
            $actualizar .= "COSTO = '".trim($vv)."', ";
          break;
          case 8:
            $actualizar .= "UBICACION = '".trim($vv)."' ";
          break;
          case 9:
            $actualizar .= "WHERE ID = '".trim($vv)."'";
          break;
        }
        $contador++;
      }

      $insertar .= "'".$CODIGO_COT."')";

      if(strpos($actualizar, "WHERE") !== false)
      {
          $sql = "UPDATE cotizacion_producto SET ".$actualizar;
          $result = mysql_query($sql, $conn) or die(mysql_error());
          $a .= 1;
      }
      else
      {
          $sql = "INSERT INTO cotizacion_producto (CANTIDAD,CODIGO_PRODUCTO,DESCRIPCION,POM,VALOR_UNITARIO,DESCUENTO,VALOR_TOTAL,COSTO,UBICACION,CODIGO_COTIZACION) VALUES " . $insertar;
          $result = mysql_query($sql, $conn) or die(mysql_error());

          $sql = "DELETE FROM cotizacion_producto WHERE CODIGO_COTIZACION = '".$CODIGO_COT ."' AND CODIGO_PRODUCTO = '' ";
          $result = mysql_query($sql, $conn) or die(mysql_error());
          $a .= 2;
      }
  }
}



$_SESSION['cotizacion'] = $a;
$_SESSION['lista1'] = $LISTA1;

?>

