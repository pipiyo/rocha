<?php
session_start();
   require_once('Conexion/Conexion.php');
   mysql_select_db($database_conn, $conn); 

$listaa = array();

$IN = " IN(";
$LISTACOD = array();
$LISTASTOCK = array();
$LISTASTOCKmin = array();

$LISTAFAMILIA = array();
$LISTACUERPO = array();
$LISTAFRENTE = array();
$LISTACANTO = array();
$LISTAMETALES = array();

$sql =  "SELECT * FROM producto WHERE CODIGO_GENERICO = '".$_POST['cod']."' AND not FAMILIA = 'GENERICO' AND NOT DESHABILITAR = 1";

$result = mysql_query($sql, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result))
  {
  $listaa[] =  array("COD" => $row["CODIGO_PRODUCTO"],
  					         "DES" => $row["DESCRIPCION"],	
  					         "CAT" => $row["CATEGORIA"], 
  					         "FAM" => $row["FAMILIA"],
                     "FORMATO" => $row["FORMATO"],
                     "MAX" => $row["STOCK_MAXIMO"]  );

                    $LISTACOD[] = $row["CODIGO_PRODUCTO"];
                    $LISTASTOCK[] = array( 'COD' => $row["CODIGO_PRODUCTO"] ,'STOCK' => $row["STOCK_ACTUAL"] ); 
                    $LISTASTOCKmin[] = $row["STOCK_MINIMO"];
                    $IN .= "'".$row["CODIGO_PRODUCTO"]."',";
                    $LISTAFAMILIA[] = substr($row["FAMILIA"], 0, 1);
                    $LISTACUERPO[] = substr($row["FAMILIA"], 0, 1).$row["CUERPO"];
                    $LISTAFRENTE[] = substr($row["FAMILIA"], 0, 1).$row["FRENTE"];

                    $LISTAMETALES[] = $row["DESCRIPCION"];

                    if(strpos($row["DESCRIPCION"], "Canto") !== false)
                    {  
                      $LISTACANTO[] = $row["DESCRIPCION"];
                    }
  }
  mysql_free_result($result);

/*Familia*/

$resultado = array_unique($LISTAFAMILIA);
$resultado1= array();
foreach($resultado as $k => $v)
{
   $resultado1[] = $v;
}

$resultadoa = array_unique($LISTACUERPO);
$resultadoa1= array();
foreach($resultadoa as $k => $v)
{
   $resultadoa1[] = $v;
}

$resultadob = array_unique($LISTAFRENTE);
$resultadob1= array();
foreach($resultadob as $k => $v)
{
   $resultadob1[] = $v;
}

$CANTOS = array();
foreach($LISTACANTO as $k => $v)
{
    if(strpos($v, "Coigüe Chocolate") !== false)
    {  
      $CANTOS[] = "Coigüe Chocolate";
    }
    else if(strpos($v, "Vison") !== false)
    {  
      $CANTOS[] = "Vison";
    }
    else if(strpos($v, "Aluminio") !== false)
    {  
      $CANTOS[] = "Aluminio";
    }
    else if(strpos($v, "Grafito") !== false)
    {  
      $CANTOS[] = "Grafito";
    }
    else if(strpos($v, "Peral") !== false)
    {  
      $CANTOS[] = "Peral";
    }
    else if(strpos($v, "Gris Humo") !== false)
    {  
      $CANTOS[] = "Gris Humo";
    }
    else if(strpos($v, "Blanco") !== false)
    {  
      $CANTOS[] = "Blanco";
    }
    else if(strpos($v, "White Oak") !== false)
    {  
      $CANTOS[] = "White Oak";
    }
    else if(strpos($v, "Almendra") !== false)
    {  
      $CANTOS[] = "Almendra";
    }
    else if(strpos($v, "Nogal Clasico") !== false)
    {  
      $CANTOS[] = "Nogal Clasico";
    }
}

$resultadoc = array_unique($CANTOS);
$resultadoc1= array();
foreach($resultadoc as $k => $v)
{
   $resultadoc1[] = $v;
}


$METALES = array();
foreach($LISTAMETALES as $k => $v)
{
    if(strpos($v, "Blanco MT") !== false)
    {  
      $METALES[] = "Blanco MT";
    }
    else if(strpos($v, "Gris Estrella") !== false)
    {  
      $METALES[] = "Gris Estrella";
    }
    else if(strpos($v, "Gris Metalizado") !== false)
    {  
      $METALES[] = "Gris Metalizado";
    }
    else if(strpos($v, "Negro MT") !== false)
    {  
      $METALES[] = "Negro MT";
    }
    else if(strpos($v, "Gris MT") !== false)
    {  
      $METALES[] = "Gris MT";
    }
    else if(strpos($v, "Gris México") !== false)
    {  
      $METALES[] = "Gris México";
    }
    else if(strpos($v, "Nopal") !== false)
    {  
      $METALES[] = "Nopal";
    }
    else if(strpos($v, "Gris Metalizado") !== false)
    {  
      $METALES[] = "Gris Metalizado";
    }
    else if(strpos($v, "Gris") !== false)
    {  
      $METALES[] = "Gris";
    }
    else if(strpos($v, "Blanco Brillante") !== false)
    {  
      $METALES[] = "Blanco Brillante";
    }
    else if(strpos($v, "Grafito") !== false)
    {  
      $METALES[] = "Grafito";
    }
    else if(strpos($v, "Negro") !== false)
    {  
      $METALES[] = "Negro";
    }
    else if(strpos($v, "Estrella") !== false)
    {  
      $METALES[] = "Estrella";
    }
    else if(strpos($v, "Terrano 8") !== false)
    {  
      $METALES[] = "Terrano 8";
    }
    else if(strpos($v, "México") !== false)
    {  
      $METALES[] = "México";
    }
}

$resultadod = array_unique($METALES);
$resultadod1= array();
foreach($resultadod as $k => $v)
{
   $resultadod1[] = $v;
}

/*Fín*/

if($IN != " IN(")
{
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
foreach ($LISTACOD as $key => $value) 
{
  $CANT_RES = "";
  $CANT = "";
  foreach ($LISTA as $llave => $valor1) 
  {
    if ($value == $LISTA[$llave]["COD"]) 
    {
      $CANT_RES += $LISTA[$llave]["CANT_RES"];
      $CANT += $LISTA[$llave]["CANT"];
    }
  }

    $CANT = $CANT - $CANT_RES;
    $LISTACANT[] = array( "COD" =>  $value, "CANT" =>  $CANT );
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
      $LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],"EGRESO" =>  $row["EGRESO"] );
  }
  mysql_free_result($result1);

$fecha="2014-01-01 00:00:00";
$segundos=strtotime('now')-strtotime($fecha) ;
$diasdif=intval($segundos/60/60/24);
$flujo = "";
$check = "";

foreach ($LISTACOD as $key => $value) 
{
    $EGRESOS = "";
    foreach ($LISTA as $llave => $valor1) 
    {
      if ($value == $LISTA[$llave]["COD"]) 
      {
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
    $LISTAEGRESO[] = array( "COD" =>  $value,"EGRESO" =>  $EGRESOS, "FLUJO" =>  $flujo  );
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
  foreach ($LISTA as $llave => $valor1) 
  {
    if ($value == $LISTA[$llave]["COD"]) 
    {
        $CANTEN += $LISTA[$llave]["CANTEN"];
        $CANTSO += $LISTA[$llave]["CANTSO"];
    }
  }
$CANTEN = $CANTSO- $CANTEN;
$LISTAVALE[] = array( "COD" =>  $value,"VALE" =>  $CANTEN );
}
$LISTAFINAL = array();



foreach ($listaa as $key => $value) {

$color = "#FFF";

if ($LISTASTOCK[$key]['STOCK'] <  $LISTASTOCKmin[$key] ) 
{
    $color = ( ( $LISTASTOCK[$key]['STOCK'] + $LISTACANT[$key]['CANT'] ) >  $LISTASTOCKmin[$key] )  ?  "#F79646"  :   "#F72D2D"   ;
}

$color2 = ( array_key_exists($listaa[$key]['COD'], $_SESSION['prooc']) )  ?  "#00FF00" :  "#FFF" ;

$CONT = $LISTACANT[$key]['CANT'] + $LISTASTOCK[$key]['STOCK'];
$DISP = $CONT - $LISTAVALE[$key]['VALE'];

$LISTAFINAL[] = array(  "COD" =>  $listaa[$key]['COD'],
                        "DES" => $listaa[$key]['DES'],
                        "CAT" => $listaa[$key]['CAT'],
                        "FAM" => $listaa[$key]['FAM'],
                        "FAMILIA" => $resultado1,
                        "CUERPO" => $resultadoa1,
                        "FRENTE" => $resultadob1,
                        "CANTO" => $resultadoc1,
                        "METALES" => $resultadod1,
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
                        "COLOROC" => $color2,
                    );
}


//print_r($resultadod1);



unset($LISTA);
unset($listaa);
unset($LISTACANT);
unset($LISTAEGRESO);
unset($LISTAVALE);
unset($LISTASTOCK);
}

echo json_encode($LISTAFINAL);
?>