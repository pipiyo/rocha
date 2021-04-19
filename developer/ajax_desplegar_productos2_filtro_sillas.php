<?php
session_start();
   require_once('Conexion/Conexion.php');
   mysql_select_db($database_conn, $conn); 
$listaa = array();

$IN = " IN(";
$LISTACOD = array();
$LISTASTOCK = array();
$LISTASTOCKmin = array();


if(isset($_POST['cue'])){$cuerpo = $_POST['cue']; } else {$cuerpo =  ""; }



if ( empty($_POST['fam']) &&  empty($_POST['famc']) && empty($_POST['famd'])  && empty($_POST['cue']) ) {
$sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND not FAMILIA = 'GENERICO' AND NOT DESHABILITAR = 1";
}


else if ($cuerpo != ""  && $_POST['famd'] != "") {
  if($_POST['famd'] == "B02")
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['cue']."%'   AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
  }
  else
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['cue']."%'  AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
  }
}

else if ( $_POST['fam'] != ""  && $_POST['famd'] != "") {
  if($_POST['famd'] == "B02")
  {
     if($_POST['fam'] == "T08-T10")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T08','T10')  AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T01")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T01','01')  AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T03")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T03','02')  AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T04")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T04','03')  AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
    }
    else
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['fam']."%'   AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
    }
  }
  else
  {
     if($_POST['fam'] == "T08-T10")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND CUERPO in('T08','T10')   AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T01")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND CUERPO in('T01','01')   AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T03")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND CUERPO in('T03','02')   AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
    }
    else if($_POST['fam'] == "T04")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND CUERPO in('T04','03')   AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
    }
    else
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['fam']."%'  AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
    }
   
  }
}

else if ( $_POST['famc'] != ""  && $_POST['famd'] != "") {
  if($_POST['famd'] == "B02")
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['famc']."%'   AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
  }
  else
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['famc']."%'  AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1";
  }
}


else if ($cuerpo != "") {
$sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['cue']."%'  AND NOT DESHABILITAR = 1";
}


else if ( $_POST['fam'] != "") {
  if($_POST['fam'] == "T08-T10")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T08','T10') AND NOT DESHABILITAR = 1";
    }
  else  if($_POST['fam'] == "T01")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T01','01') AND NOT DESHABILITAR = 1";
    }
  else  if($_POST['fam'] == "T03")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T03','02') AND NOT DESHABILITAR = 1";
    }
  else  if($_POST['fam'] == "T04")
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO in('T04','03') AND NOT DESHABILITAR = 1";
    }  
    else
    {
      $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['fam']."%' AND NOT DESHABILITAR = 1";
   }  
  }


else if ( $_POST['famc'] != "") {
$sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  CUERPO LIKE '%".$_POST['famc']."%'  AND NOT DESHABILITAR = 1";
}


else if ( $_POST['famd'] != "") {
  if($_POST['famd'] == "B02")
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  FRENTE in('B02','04') AND NOT DESHABILITAR = 1";
  }
  else
  {
    $sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  FRENTE LIKE '%".$_POST['famd']."%' AND NOT DESHABILITAR = 1 ";
  }
}



/*else  if (empty($_POST['fren'])) {

$sql =   "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  FAMILIA = '".$_POST['fam']."' AND  CUERPO = '".$_POST['cue']."' " ;

}else if (empty($_POST['cue'])) {

$sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  FAMILIA = '".$_POST['fam']."' AND  FRENTE = '".$_POST['fren']."' "   ;

}else{

$sql = "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND  FAMILIA = '".$_POST['fam']."' AND  CUERPO = '".$_POST['cue']."' AND FRENTE =  '".$_POST['fren']."' ";

};*/



$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $listaa[] =  array( "COD" => $row["CODIGO_PRODUCTO"],
            "DES" => $row["DESCRIPCION"], 
            "CAT" => $row["CATEGORIA"], 
            "FAM" => $row["FAMILIA"],
            "FORMATO" => $row["FORMATO"],
            "MAX" => $row["STOCK_MAXIMO"]  );

  $LISTACOD[] = $row["CODIGO_PRODUCTO"];
  $LISTASTOCK[] = array( 'COD' => $row["CODIGO_PRODUCTO"] ,
                        'STOCK' => $row["STOCK_ACTUAL"] ); 
  $LISTASTOCKmin[] = $row["STOCK_MINIMO"];
$IN .= "'".$row["CODIGO_PRODUCTO"]."',";


  }
mysql_free_result($result);









if($IN != " IN("){

$IN = substr( $IN , 0, -1);
$IN .= ")";
$LISTA = array();
$LISTACANT = array();
$query_registro = "SELECT oc_producto.CANTIDAD_RECIBIDA,oc_producto.CANTIDAD,producto.CODIGO_PRODUCTO  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while( $row = mysql_fetch_assoc($result1) )
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANT_RES" =>  $row["CANTIDAD_RECIBIDA"],
                  "CANT" =>  $row["CANTIDAD"] );
  }
mysql_free_result($result1);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANT_RES = "";
$CANT = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $CANT_RES += $LISTA[$llave]["CANT_RES"];
          $CANT += $LISTA[$llave]["CANT"];
      }
    }
$CANT = $CANT - $CANT_RES;
    $LISTACANT[] = array( "COD" =>  $value,
                  "CANT" =>  $CANT );
}

unset($LISTA);
$LISTA = array();
$LISTAEGRESO = array();

$query_registro = "SELECT  actualizaciones.EGRESO,actualizaciones_general.CODIGO_PRODUCTO FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and actualizaciones.FECHA between '2014-01-01' and '".date('Y-m-d')."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result1))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "EGRESO" =>  $row["EGRESO"] );
  }
  mysql_free_result($result1);

$fecha="2014-01-01 00:00:00";
$segundos=strtotime('now')-strtotime($fecha) ;
$diasdif=intval($segundos/60/60/24);

$flujo = "";
$check = "";
foreach ($LISTACOD as $key => $value) {
$EGRESOS = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $EGRESOS += $LISTA[$llave]["EGRESO"];
      }
    }
    if($EGRESOS == 0 || $diasdif == 0)
{
  $flujo = 0;
}
else
{
  $flujo = $EGRESOS / $diasdif;
  $flujo =  number_format($flujo, 2, ",", ".");
}
    $LISTAEGRESO[] = array( "COD" =>  $value,
                  "EGRESO" =>  $EGRESOS,
                  "FLUJO" =>  $flujo  );
}

unset($LISTA);
$LISTA = array();
$LISTAVALE = array();

$query_registro3 = "select producto_vale_emision.CANTIDAD_ENTREGADA,producto_vale_emision.CANTIDAD_SOLICITADA,producto_vale_emision.CODIGO_PRODUCTO  from vale_emision, producto_vale_emision, producto where vale_emision.
COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN."  and vale_emision.ESTADO = 'PENDIENTE'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result3))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANTEN" =>  $row["CANTIDAD_ENTREGADA"],
                  "CANTSO" =>  $row["CANTIDAD_SOLICITADA"] );
  }
  mysql_free_result($result3);
 mysql_close($conn);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANTEN = "";
$CANTSO = "";
  foreach ($LISTA as $llave => $valor1) {
    if ($value == $LISTA[$llave]["COD"]) {
         $CANTEN += $LISTA[$llave]["CANTEN"];
         $CANTSO += $LISTA[$llave]["CANTSO"];
    }
  }
$CANTEN = $CANTSO- $CANTEN;
    $LISTAVALE[] = array( "COD" =>  $value,
                  "VALE" =>  $CANTEN );
}
$LISTAFINAL = array();

foreach ($listaa as $key => $value) {

$color = "#FFF";

if ($LISTASTOCK[$key]['STOCK'] <  $LISTASTOCKmin[$key] ) {
  
$color =   ( ( $LISTASTOCK[$key]['STOCK'] + $LISTACANT[$key]['CANT'] ) >  $LISTASTOCKmin[$key] )  ?  "#F79646"  :   "#F72D2D"   ;

}

$color2 =     ( array_key_exists($listaa[$key]['COD'], $_SESSION['prooc']) )  ?  "#00FF00" :  "#FFF" ;

  $CONT = $LISTACANT[$key]['CANT'] + $LISTASTOCK[$key]['STOCK'];
  $DISP = $CONT - $LISTAVALE[$key]['VALE'];

$LISTAFINAL[] = array(  "COD" =>  $listaa[$key]['COD'],
"DES" => $listaa[$key]['DES'],
"CAT" => $listaa[$key]['CAT'],
"FAM" => $listaa[$key]['FAM'],
"FORMATO" => $listaa[$key]['FORMATO'],
"COLOR" => $color,
"MAX" => $listaa[$key]['MAX'],
                        "CANT" => $LISTACANT[$key]['CANT'],
                        "EGRESO" =>  $LISTAEGRESO[$key]['EGRESO'],
                        "FLUJO" => $LISTAEGRESO[$key]['FLUJO'],
                        "VALE" =>  $LISTAVALE[$key]['VALE'],
                        "CONTABLE" =>  $CONT,
                        "DISPONIBLE" =>  $DISP,
                        "STOCK" => $LISTASTOCK[$key]['STOCK'],
                        "STOCKMIN" => $LISTASTOCKmin[$key],
                        "COLOROC" => $color2 );
}

unset($LISTA);
unset($listaa);
unset($LISTACANT);
unset($LISTAEGRESO);
unset($LISTAVALE);
unset($LISTASTOCK);

}

if(empty($LISTAFINAL))
{ 
    $LISTAFINAL[] = array(  "COD" => "VACIO",
                            "DES" => "",
                            "CAT" => "",
                            "FAM" => "",
                            "FORMATO" => "",
                            "COLOR" => "",
                            "MAX" => "",
                            "CANT" => "",
                            "EGRESO" =>  "",
                            "FLUJO" => "",
                            "VALE" =>  "",
                            "CONTABLE" =>  "",
                            "DISPONIBLE" =>  "",
                            "STOCK" => "",
                            "STOCKMIN" => "",
                            "COLOROC" => "" );
}

echo json_encode($LISTAFINAL);

?>
