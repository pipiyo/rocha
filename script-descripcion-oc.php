<?php 

function format($num)
{
   if(is_int($num))
   {
      $number = number_format($num);
      $number = preg_replace('/\,/','.',$number);
      return $number;
   }
   else
   {
           $num = preg_replace('/\,/','.',$num);
           $result =  number_format($num, 2, ',', '.');
 
           $result = preg_replace('/,0*$/','',$result);
           return $result;
 
        }
 
}


$CODIGO_OC1 = $_GET['CODIGO_OC'];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT orden_de_compra.FECHA_CONFIRMACION,orden_de_compra.AUTORIZADA,orden_de_compra.VERSION,orden_de_compra.ENVIADO,orden_de_compra.EMPRESA,orden_de_compra.DESCUENTO_2,orden_de_compra.OBSERVACION_FACTURAS,orden_de_compra.FACTURAS, orden_de_compra.ENVIADO, orden_de_compra.DESPACHAR_TELEFONO, orden_de_compra.CODIGO_OC,orden_de_compra.CODIGO_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.DESPACHAR_RUT,orden_de_compra.DESPACHAR_COMUNA,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.CONDICION_PAGO, orden_de_compra.DESCUENTO_OC,orden_de_compra.SUB_TOTAL, orden_de_compra.TIPO_IVA, orden_de_compra.IVA, orden_de_compra.NETO, orden_de_compra.OBSERVACION FROM orden_de_compra where orden_de_compra.CODIGO_OC ='".($CODIGO_OC1)."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;


 while($row = mysql_fetch_array($result))
  {
  $CODIGO_OC = $row["CODIGO_OC"];
  $FECHA_REALIZACION = $row["FECHA_REALIZACION"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $DESPACHAR = $row["DESPACHAR_DIRECCION"];
  $DESPACHAR_COMUNA = $row["DESPACHAR_COMUNA"];
  $DESPACHAR_RUT = $row["DESPACHAR_RUT"];
  $DESPACHAR_TELEFONO = $row["DESPACHAR_TELEFONO"];
  $TOTAL = $row["TOTAL"];
  $NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
  $CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
  $ESTADO = $row["ESTADO"];
  $CONDICION_PAGO = $row["CONDICION_PAGO"];
  $DESCUENTO_OC = $row["DESCUENTO_OC"];
  $DESCUENTO_2 = $row["DESCUENTO_2"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $TIPO_IVA = $row["TIPO_IVA"];
  $NETO = $row["NETO"];
  $IVA = $row["IVA"];
  $ENVIADO = $row["ENVIADO"];
  $OBSERVACION = $row["OBSERVACION"];
  $FACTURAS = $row["FACTURAS"];
  $OBSERVACION_FACTURAS = $row["OBSERVACION_FACTURAS"];
  $EMPRESA = $row["EMPRESA"];
  $ENVIADO = $row["ENVIADO"];
  $VERSION = $row["VERSION"];
  $FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
  $AUTORIZADA = $row["AUTORIZADA"];
  $MENSAJE = 2;
  }
  
  if($ENVIADO == 1)
  {
    $che = 'checked';
  }
  else
  {
     $che = '';
  }
  
  mysql_free_result($result);
  //////////////////////////////////////////
 mysql_select_db($database_conn, $conn);
$query_registro33 = "select empleado.CARGO, empleado.EMAIL, empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO1)."'";
$result133 = mysql_query($query_registro33, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result133))
  {
  $nombres = $row["nombres"];
  $apellido = $row["apellido_paterno"];
  $email = $row["EMAIL"];
  $cargo = $row["CARGO"];
  $numero++;
  }
  mysql_free_result($result133);
  //////////////////////////////////////////

$query_registro2 = "select proveedor.COMUNA, proveedor.DIRECCION, proveedor.RUT_PROVEEDOR, proveedor.NOMBRE_FANTASIA from orden_de_compra, oc_proveedor, proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".$CODIGO_OC."'";
$result2 = mysql_query($query_registro2, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result2))
  {
  $NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
  $RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
  $DIRECCION = $row["DIRECCION"];
  $COMUNA = $row["COMUNA"];
  }
  
  mysql_free_result($result2);

$proveedor_valor = "RUT: ".$RUT_PROVEEDOR . "\n".$DIRECCION."\n".$COMUNA;   

 /////////////////////////////////////////

$query_registro4 = "select usuario.NOMBRE_USUARIO from usuario where usuario.CODIGO_USUARIO = '".($CODIGO_USUARIO1)."'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result4))
  {
  $USUARIO= $row["NOMBRE_USUARIO"];
  }
  
  mysql_free_result($result4);
  
  
 $query_registro61 = "select oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'";
$result61 = mysql_query($query_registro61, $conn) or die(mysql_error());
$numero6 = 0;

 while($row = mysql_fetch_array($result61))
  {
  $COD_PRODUCTO6 = $row["CODIGO_PRODUCTO"]; 
     $numero6++;
  }
  
  mysql_free_result($result61); 
  
  
///1
$indicador = 1;
$contador_oficial = 0;
$query_registro41 = "select producto.UNIDAD_DE_MEDIDA ,oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'" ;
$result41 = mysql_query($query_registro41, $conn) or die(mysql_error());
$numero4 = 0;
$trd = '';
$trd15 = '';
 while($row = mysql_fetch_array($result41))
  {
  if($indicador <= 15) 
  {
  $COD_PRODUCTO4 = $row["CODIGO_PRODUCTO"]; 
  $DESCRIPCION4 = $row["DESCRIPCION"]; 
  $STOCK4 = $row["STOCK_ACTUAL"]; 
  $ROCHA4 = $row["ROCHA"]; 
  $OBSERVACION14 = $row["OBSERVACION"]; 
  $TOTAL_PRODUCTO4 = $row["TOTAL"];
  $DESCUENTO_PRODUCTO4 = $row["DESCUENTO"];
  $CANTIDAD4 = $row["CANTIDAD"];
  $PRECIO_BODEGA4 = $row["PRECIO_BODEGA"];
  $PRECIO_LISTA4 = $row["PRECIO_LISTA"];
  $PRECIO_UNITARIO4 = $row["PRECIO_UNITARIO"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
    $CUENTA_DE = strlen($DESCRIPCION4);
  $DES1 = substr($DESCRIPCION4,0,65);
  $DES2 = substr($DESCRIPCION4,65,65);
  $DES3 = substr($DESCRIPCION4,130,65);
  $DESA = substr($DESCRIPCION4,195,65);
  
    $CUENTA_OB = strlen($OBSERVACION14);
  $OBS1 = substr($OBSERVACION14 ,0,20);
  $OBS2 = substr($OBSERVACION14 ,20,20);
  $OBS3 = substr($OBSERVACION14 ,40,20);
  $OBS4 = substr($OBSERVACION14 ,60,20);
  
  $COD1 = substr($COD_PRODUCTO4 ,0,11);
  $COD2 = substr($COD_PRODUCTO4 ,11,11);
  $COD3 = substr($COD_PRODUCTO4 ,22,11);
  $CUENTA_CO = strlen($COD_PRODUCTO4);
  
  $ROCH1 = substr($ROCHA4 ,0,9);
  $ROCH2 = substr($ROCHA4 ,9,9);
  $ROCH3 = substr($ROCHA4 ,18,9);
  $CUENTA_ROCHA = strlen($ROCHA4);
  
  if($CUENTA_DE > 65 || $CUENTA_OB > 20|| $CUENTA_CO > 11||$CUENTA_ROCHA > 9)
  {
    $trd.='<tr><td style="font-size:10PX;" height="20"> 
    '.$COD1.'<br> '.$COD2.'<br> '.$COD3.'</td> 
    <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>  
    <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA. '</td>
    <td style="font-size:10PX;">'.($OBS1).'<br> '.($OBS2). '<br> '.($OBS3). '<br> '.($OBS4). '</td>
    <td style="font-size:10PX;">'. format($CANTIDAD4).'/'.$UNIDAD_DE_MEDIDA.'</td>
    <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA4,0, ",", ".").'</td>
    <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO4).'</td>
    <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO4,0, ",", ".").'</td></tr>';  
    $trd15.='<tr><td style="font-size:10PX;" height="20"> 
    '.$COD1.'<br> '.$COD2.'<br> '.$COD3.'</td> 
    <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>  
    <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA. '</td>
    <td style="font-size:10PX;">'.($OBS1).'<br> '.($OBS2). '<br> '.($OBS3).'<br> '.($OBS4). '</td>
    <td style="font-size:10PX;">'. format($CANTIDAD4).'/'.$UNIDAD_DE_MEDIDA.'</td>
    <td style="font-size:10PX;"></td>
    <td style="font-size:10PX;" align="right"></td></tr>';      
    $numero4++;
   }
   else
   {
    $trd.='<tr><td style="font-size:10PX;" height="20"> 
    '.$COD_PRODUCTO4.'</td>  
    <td style="font-size:10PX;">'.$ROCHA4.'</td> 
    <td style="font-size:10PX;" align="left">'.$DESCRIPCION4.'</td>
    <td style="font-size 10PX;">'.($OBSERVACION14).'</td>
    <td style="font-size:10PX;">'. format($CANTIDAD4).'/'.$UNIDAD_DE_MEDIDA.'</td>
    <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA4,0, ",", ".").'</td>
    <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO4).'</td>
    <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO4,0, ",", ".").'</td></tr>';  
    $trd15.='<tr><td style="font-size:10PX;" height="20"> 
    '.$COD_PRODUCTO4.'</td>  
    <td style="font-size:10PX;">'.$ROCHA4.'</td> 
    <td style="font-size:10PX;" align="left">'.$DESCRIPCION4.'</td>
    <td style="font-size 10PX;">'.($OBSERVACION14).'</td>
    <td style="font-size:10PX;">'. format($CANTIDAD4).'/'.$UNIDAD_DE_MEDIDA.'</td>
    <td style="font-size:10PX;"></td>
    <td style="font-size:10PX;" align="right"></td></tr>';    
    $numero4++;
   }
  }
  $indicador++;
  $contador_oficial++;
  }
  
  mysql_free_result($result41);
  
 $filas = $numero6 - $numero4; 

///2
$indicador1 = 1;
$query_registro51 = "select producto.UNIDAD_DE_MEDIDA , oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'" ;
$result51 = mysql_query($query_registro51, $conn) or die(mysql_error());
$numero5 = 0;
$trd5 = '';
$trd25 = '';

 while($row = mysql_fetch_array($result51))
  {
  if($indicador1 >= 16 && $indicador1 <= 30 ) 
  {
  $COD_PRODUCTO5 = $row["CODIGO_PRODUCTO"]; 
  $DESCRIPCION5 = $row["DESCRIPCION"]; 
  $STOCK5 = $row["STOCK_ACTUAL"]; 
  $ROCHA5 = $row["ROCHA"]; 
  $OBSERVACION15 = $row["OBSERVACION"]; 
  $TOTAL_PRODUCTO5 = $row["TOTAL"];
  $DESCUENTO_PRODUCTO5 = $row["DESCUENTO"];
  $CANTIDAD5 = $row["CANTIDAD"];
  $PRECIO_BODEGA5 = $row["PRECIO_BODEGA"];
  $PRECIO_LISTA5 = $row["PRECIO_LISTA"];
  $PRECIO_UNITARIO5 = $row["PRECIO_UNITARIO"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
  $CUENTA_DE = strlen($DESCRIPCION5);
    $DES1 = substr($DESCRIPCION5,0,65);
  $DES2 = substr($DESCRIPCION5,65,65);
  $DES3 = substr($DESCRIPCION5,130,65);
  $DESA = substr($DESCRIPCION5,195,65);
  $CUENTA_OB1 = strlen($OBSERVACION15);
  $OBS3 = substr($OBSERVACION15 ,0,20);
  $OBS4 = substr($OBSERVACION15 ,20,20);
  $OBS5 = substr($OBSERVACION15 ,40,20);
  $OBS6 = substr($OBSERVACION15 ,60,20);

  $COD3 = substr($COD_PRODUCTO5 ,0,11);
  $COD4 = substr($COD_PRODUCTO5 ,11,11);
  $COD5 = substr($COD_PRODUCTO5 ,22,11);
  $CUENTA_CO1 = strlen($COD_PRODUCTO5);
  
  $ROCH1 = substr($ROCHA5 ,0,11);
  $ROCH2 = substr($ROCHA5 ,11,11);
  $ROCH3 = substr($ROCHA5 ,22,11);
  $CUENTA_ROCHA = strlen($ROCHA5);
  if($CUENTA_DE > 65 || $CUENTA_OB1 > 20 || $CUENTA_CO1 > 11 ||$CUENTA_ROCHA > 11)
  {
    $trd5.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
       <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6).  '</td>
        <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trd25.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
       <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6).'</td>
        <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>'; 
         $numero5++;
  }
  else
  {
    $trd5.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
        <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trd25.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
        <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>';  
         $numero5++;
   }
  }
   $indicador1++;
  }
 
 ///2
$indicador2 = 1;
$query_registro51 = "select producto.UNIDAD_DE_MEDIDA , oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'" ;
$result51 = mysql_query($query_registro51, $conn) or die(mysql_error());
$numero5 = 0;
$trda = '';
$trdaa = '';

 while($row = mysql_fetch_array($result51))
  {
  if($indicador2 >= 31 && $indicador2 <= 45 ) 
  {
  $COD_PRODUCTO5 = $row["CODIGO_PRODUCTO"]; 
  $DESCRIPCION5 = $row["DESCRIPCION"]; 
  $STOCK5 = $row["STOCK_ACTUAL"]; 
  $ROCHA5 = $row["ROCHA"]; 
  $OBSERVACION15 = $row["OBSERVACION"]; 
  $TOTAL_PRODUCTO5 = $row["TOTAL"];
  $DESCUENTO_PRODUCTO5 = $row["DESCUENTO"];
  $CANTIDAD5 = $row["CANTIDAD"];
  $PRECIO_BODEGA5 = $row["PRECIO_BODEGA"];
  $PRECIO_LISTA5 = $row["PRECIO_LISTA"];
  $PRECIO_UNITARIO5 = $row["PRECIO_UNITARIO"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
  $CUENTA_DE = strlen($DESCRIPCION5);
    $DES1 = substr($DESCRIPCION5,0,65);
  $DES2 = substr($DESCRIPCION5,65,65);
  $DES3 = substr($DESCRIPCION5,130,65);
  $DESA = substr($DESCRIPCION5,195,65);
  $CUENTA_OB1 = strlen($OBSERVACION15);
  $OBS3 = substr($OBSERVACION15 ,0,20);
  $OBS4 = substr($OBSERVACION15 ,20,20);
  $OBS5 = substr($OBSERVACION15 ,40,20);
  $OBS6 = substr($OBSERVACION15 ,60,20);
  $COD3 = substr($COD_PRODUCTO5 ,0,11);
  $COD4 = substr($COD_PRODUCTO5 ,11,11);
  $COD5 = substr($COD_PRODUCTO5 ,22,11);
  $CUENTA_CO1 = strlen($COD_PRODUCTO5);
  
  $ROCH1 = substr($ROCHA5 ,0,11);
  $ROCH2 = substr($ROCHA5 ,11,11);
  $ROCH3 = substr($ROCHA5 ,22,11);
  $CUENTA_ROCHA = strlen($ROCHA5);
  if($CUENTA_DE > 65 || $CUENTA_OB1 > 20 || $CUENTA_CO1 > 11 ||$CUENTA_ROCHA > 11)
  {
    $trda.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td> 
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6). '</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trdaa.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td> 
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6). '</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>'; 
         $numero5++;
  }
  else
  {
    $trda.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'</td>
       <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trdaa.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>';  
         $numero5++;
   }
  }
   $indicador2++;
  } 
  /////////
  
$indicador3 = 1;
$query_registro51 = "select producto.UNIDAD_DE_MEDIDA , oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'" ;
$result51 = mysql_query($query_registro51, $conn) or die(mysql_error());
$numero5 = 0;
$trdb = '';
$trdbb = '';

 while($row = mysql_fetch_array($result51))
  {
  if($indicador3 >= 46 && $indicador3 <= 60 ) 
  {
  $COD_PRODUCTO5 = $row["CODIGO_PRODUCTO"]; 
  $DESCRIPCION5 = $row["DESCRIPCION"]; 
  $STOCK5 = $row["STOCK_ACTUAL"]; 
  $ROCHA5 = $row["ROCHA"]; 
  $OBSERVACION15 = $row["OBSERVACION"]; 
  $TOTAL_PRODUCTO5 = $row["TOTAL"];
  $DESCUENTO_PRODUCTO5 = $row["DESCUENTO"];
  $CANTIDAD5 = $row["CANTIDAD"];
  $PRECIO_BODEGA5 = $row["PRECIO_BODEGA"];
  $PRECIO_LISTA5 = $row["PRECIO_LISTA"];
  $PRECIO_UNITARIO5 = $row["PRECIO_UNITARIO"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
  $CUENTA_DE = strlen($DESCRIPCION5);
    $DES1 = substr($DESCRIPCION5,0,65);
  $DES2 = substr($DESCRIPCION5,65,65);
  $DES3 = substr($DESCRIPCION5,130,65);
  $DESA = substr($DESCRIPCION5,195,65);
  $CUENTA_OB1 = strlen($OBSERVACION15);
  $OBS3 = substr($OBSERVACION15 ,0,20);
  $OBS4 = substr($OBSERVACION15 ,20,20);
  $OBS5 = substr($OBSERVACION15 ,40,20);
  $OBS6 = substr($OBSERVACION15 ,60,20);
  $COD3 = substr($COD_PRODUCTO5 ,0,11);
  $COD4 = substr($COD_PRODUCTO5 ,11,11);
  $COD5 = substr($COD_PRODUCTO5 ,22,11);
  $CUENTA_CO1 = strlen($COD_PRODUCTO5);
  
  $ROCH1 = substr($ROCHA5 ,0,11);
  $ROCH2 = substr($ROCHA5 ,11,11);
  $ROCH3 = substr($ROCHA5 ,22,11);
  $CUENTA_ROCHA = strlen($ROCHA5);
  if($CUENTA_DE > 65 || $CUENTA_OB1 > 20 || $CUENTA_CO1 > 11 ||$CUENTA_ROCHA > 11)
  {
    $trdb.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td> 
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5). '<br> '.($OBS6). '</td>
      <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
    $trdbb.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD3.'<br> '.$COD4.'<br> '.$COD5.'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td> 
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6).  '</td>
      <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>';
         $numero5++;
  }
  else
  {
    $trdb.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trdbb.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'. format($CANTIDAD5).'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>'; 
         $numero5++;
   }
  }
   $indicador3++;
  } 
  
  /////////
  
$indicador4 = 1;
$query_registro51 = "select producto.UNIDAD_DE_MEDIDA , oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'" ;
$result51 = mysql_query($query_registro51, $conn) or die(mysql_error());
$numero5 = 0;
$trdc = '';
$trdcc = '';

 while($row = mysql_fetch_array($result51))
  {
  if($indicador4 >= 61 && $indicador4 <= 75 ) 
  {
  $COD_PRODUCTO5 = $row["CODIGO_PRODUCTO"]; 
  $DESCRIPCION5 = $row["DESCRIPCION"]; 
  $STOCK5 = $row["STOCK_ACTUAL"]; 
  $ROCHA5 = $row["ROCHA"]; 
  $OBSERVACION15 = $row["OBSERVACION"]; 
  $TOTAL_PRODUCTO5 = $row["TOTAL"];
  $DESCUENTO_PRODUCTO5 = $row["DESCUENTO"];
  $CANTIDAD5 = $row["CANTIDAD"];
  $PRECIO_BODEGA5 = $row["PRECIO_BODEGA"];
  $PRECIO_LISTA5 = $row["PRECIO_LISTA"];
  $PRECIO_UNITARIO5 = $row["PRECIO_UNITARIO"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
  $CUENTA_DE = strlen($DESCRIPCION5);
    $DES1 = substr($DESCRIPCION5,0,65);
  $DES2 = substr($DESCRIPCION5,65,65);
  $DES3 = substr($DESCRIPCION5,130,65);
  $DESA = substr($DESCRIPCION5,195,65);;
  $CUENTA_OB1 = strlen($OBSERVACION15);
  $OBS3 = substr($OBSERVACION15 ,0,20);
  $OBS4 = substr($OBSERVACION15 ,20,20);
  $OBS5 = substr($OBSERVACION15 ,40,20);
  $OBS6 = substr($OBSERVACION15 ,60,20);
    $COD3 = substr($COD_PRODUCTO5 ,0,11);
  $COD4 = substr($COD_PRODUCTO5 ,11,11);
  $COD5 = substr($COD_PRODUCTO5 ,22,11);
  $CUENTA_CO1 = strlen($COD_PRODUCTO5);
  
  $ROCH1 = substr($ROCHA5 ,0,11);
  $ROCH2 = substr($ROCHA5 ,11,11);
  $ROCH3 = substr($ROCHA5 ,22,11);
  $CUENTA_ROCHA = strlen($ROCHA5);
  if($CUENTA_DE > 65 || $CUENTA_OB1 > 20 || $CUENTA_CO1 > 11 ||$CUENTA_ROCHA > 11)
  {
    $trdc.='<tr><td style="font-size:10PX;" height="20"> 
      '.($COD3).'<br> '.($COD4).'<br> '.($COD5).'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6).  '</td>
       <td style="font-size:10PX;">'.$CANTIDAD5.'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trdcc.='<tr><td style="font-size:10PX;" height="20"> 
      '.($COD3).'<br> '.($COD4).'<br> '.($COD5).'</td>  
        <td style="font-size:10PX;">'.($ROCH1).'<br> '.($ROCH2).'<br> '.($ROCH3).'</td>
            <td style="font-size:10PX;" align="left">'.$DES1.'<br> '.$DES2. '<br> '.$DES3.'<br> '.$DESA.  '</td>
         <td style="font-size:10PX;">'.($OBS3).'<br> '.($OBS4).  '<br> '.($OBS5).'<br> '.($OBS6).  '</td>
       <td style="font-size:10PX;">'.$CANTIDAD5.'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>'; 
         $numero5++;
  }
  else
  {
    $trdc.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'.$CANTIDAD5.'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;" align="right">'.number_format($PRECIO_LISTA5,0, ",", ".").'</td>
       <td style="font-size:10PX;">'.format($DESCUENTO_PRODUCTO5).'</td>
         <td style="font-size:10PX;" align="right">'.number_format($TOTAL_PRODUCTO5,0, ",", ".").'</td></tr>'; 
  $trdc.='<tr><td style="font-size:10PX;" height="20"> 
      '.$COD_PRODUCTO5.'</td> 
       <td style="font-size:10PX;">'.$ROCHA5.'</td> 
         <td style="font-size:10PX;" align="left">'.$DESCRIPCION5.'</td>
         <td style="font-size:10PX;">'.($OBSERVACION15).'</td>
       <td style="font-size:10PX;">'.$CANTIDAD5.'/'.$UNIDAD_DE_MEDIDA.'</td>
       <td style="font-size:10PX;"></td>
         <td style="font-size:10PX;" align="right"></td></tr>'; 
         $numero5++;
   }
  }
   $indicador4++;
  }  
  
  
  

$tablapie = '';
$tablapie1 = '';
$tablapie2 = '';
$tablapie3 = '';
$tablapie4 = '';

if($contador_oficial <= 15 )
{
  $tablapie.='<tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
  <td>Sub-Total</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($SUB_TOTAL,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td width="61">Descuento %</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_OC.'</td>
  </tr>
  
  
    <tr>
    <td></td>
    <td width="61">Descuento $</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_2.'</td>
  </tr>
  
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td>Neto</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($NETO,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td>Iva</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($IVA,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td>Total</td>
    <td style=" border:inset #000 1px;" align="right">'.number_format($TOTAL,0, ",", ".").'</td>
  </tr>
    ';
}
else
{
  $tablapie=' <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>';
}
if($contador_oficial <= 30 )
{
  $tablapie1.='<tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
  <td>Sub-Total</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($SUB_TOTAL,0, ",", ".").'</td>
  </tr>
 <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td width="61">Descuento %</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_OC.'</td>
  </tr>
  
  
    <tr>
    <td></td>
    <td width="61">Descuento $</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_2.'</td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td>Neto</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($NETO,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td>Iva</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($IVA,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td>Total</td>
    <td style=" border:inset #000 1px;" align="right">'.number_format($TOTAL,0, ",", ".").'</td>
  </tr>
  ';
}
else
{
  $tablapie1=' <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>';
}
if($contador_oficial <= 45 )
{
  $tablapie2.='<tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
  <td>Sub-Total</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($SUB_TOTAL,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td width="61">Descuento %</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_OC.'</td>
  </tr>
  
  
    <tr>
    <td></td>
    <td width="61">Descuento $</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_2.'</td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td>Neto</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($NETO,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td>Iva</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($IVA,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td>Total</td>
    <td style=" border:inset #000 1px;" align="right">'.number_format($TOTAL,0, ",", ".").'</td>
  </tr>
   ';
}
else
{
  $tablapie2=' <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>';
}
if($contador_oficial <= 60 )
{
  $tablapie3.='<tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
  <td>Sub-Total</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($SUB_TOTAL,0, ",", ".").'</td>
  </tr>
 <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td width="61">Descuento %</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_OC.'</td>
  </tr>
  
  
    <tr>
    <td></td>
    <td width="61">Descuento $</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_2.'</td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td>Neto</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($NETO,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td>Iva</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($IVA,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td>Total</td>
    <td style=" border:inset #000 1px;" align="right">'.number_format($TOTAL,0, ",", ".").'</td>
  </tr>
   ';
}
else
{
  $tablapie3=' <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>';
}
if($contador_oficial <= 75 )
{
  $tablapie4.='<tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
  <td>Sub-Total</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($SUB_TOTAL,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td width="61">Descuento %</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_OC.'</td>
  </tr>
  
  
    <tr>
    <td></td>
    <td width="61">Descuento $</td>
    <td width="50" style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.$DESCUENTO_2.'</td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td>Neto</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($NETO,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td>Iva</td>
    <td style="border-right:inset #000 1px; border-left:inset #000 1px;" align="right">'.number_format($IVA,0, ",", ".").'</td>
  </tr>
  <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td>Total</td>
    <td style=" border:inset #000 1px;" align="right">'.number_format($TOTAL,0, ",", ".").'</td>
  </tr>
  ';
}
else
{
  $tablapie4=' <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>';
}





$tablapiea = '';
$tablapieb = '';
$tablapiec = '';
$tablapied = '';
$tablapiee = '';

if($contador_oficial <= 15 )
{
  $tablapiea.='
  <table cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>FECHA DE RECEPCI�N    </b></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� GUIA DESPACHO</b></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� FACTURA</b></td>
    </tr>
    <tr>
    <td align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;">&nbsp;<br />&nbsp;</td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    </tr>
  <tr>
  
    </tr>
  <tr>
    <td colspan="5" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>RECIBIDO POR</b></td>
    </tr>

  <tr>
  <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" >&nbsp;<br />&nbsp;</td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
  </tr></table>
    ';
}
if($contador_oficial <= 30 )
{
  $tablapieb.='
  <table cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>FECHA DE RECEPCI�N    </b></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� GUIA DESPACHO</b></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� FACTURA</b></td>
    </tr>
    <tr>
    <td align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;">&nbsp;<br />&nbsp;</td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    </tr>
  <tr>
  
    </tr>
  <tr>
    <td colspan="5" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>RECIBIDO POR</b></td>
    </tr>

  <tr>
  <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" >&nbsp;<br />&nbsp;</td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
  </tr></table>
  ';
}

if($contador_oficial <= 45 )
{
  $tablapiec.='
  <table cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>FECHA DE RECEPCI�N    </b></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� GUIA DESPACHO</b></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� FACTURA</b></td>
    </tr>
    <tr>
    <td align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;">&nbsp;<br />&nbsp;</td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    </tr>
  <tr>
  
    </tr>
  <tr>
    <td colspan="5" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>RECIBIDO POR</b></td>
    </tr>

  <tr>
  <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" >&nbsp;<br />&nbsp;</td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
  </tr></table>';
}

if($contador_oficial <= 60 )
{
  $tablapied.=
  '<table cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>FECHA DE RECEPCI�N    </b></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� GUIA DESPACHO</b></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� FACTURA</b></td>
    </tr>
    <tr>
    <td align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;">&nbsp;<br />&nbsp;</td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    </tr>
  <tr>
  
    </tr>
  <tr>
    <td colspan="5" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>RECIBIDO POR</b></td>
    </tr>

  <tr>
  <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" >&nbsp;<br />&nbsp;</td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
  </tr></table>
   ';
}

if($contador_oficial <= 75 )
{
  $tablapiee.='
  <table cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>FECHA DE RECEPCI�N    </b></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� GUIA DESPACHO</b></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:247px;" ><b>N� FACTURA</b></td>
    </tr>
    <tr>
    <td align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;">&nbsp;<br />&nbsp;</td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;width:84px;"></td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;"></td>
    </tr>
  <tr>
  
    </tr>
  <tr>
    <td colspan="5" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ><b>RECIBIDO POR</b></td>
    </tr>

  <tr>
  <td colspan="3" align="center" style="border-right:inset #000 1px; border-left:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" >&nbsp;<br />&nbsp;</td>
  <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
    <td align="center" style="border-right:inset #000 1px;border-bottom:inset #000 1px;border-top:inset #000 1px;" ></td>
  </tr></table>
  ';
}

$tablaheader = '';
if($VERSION != "")
{
$anula = utf8_encode("Esta OC anula a");
}
else
{
$anula = "";  
}


if(substr($EMPRESA, 0, 7) == 'MUEBLES')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoMD.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>'.utf8_encode("Muebles y Dise�os S.A.").'</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>
  <tr>
    <td>Rut: 99.543.470-9</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>
  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Muebles y Dise�os</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}
 else if($EMPRESA == 'TRANSPORTE JJ')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoTransportesJJ.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Transportes JJ</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>
  <tr>
    <td>Rut: 76.074.046-2</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>
  
  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Transportes JJ</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}
else if ($EMPRESA == 'SILLAS Y SILLAS')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoSS.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Sillas y Sillas S.A.</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>

  <tr>
    <td>Rut: 76.038.442-9</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre:  Sillas y Sillas</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>


  ';
}else if ($EMPRESA == 'WELLPLACE')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoWe.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>Inversiones JJ Gomez SPA</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>

  <tr>
    <td>Rut: 77.122.585-3</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnechea</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Inversiones JJ Gomez SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>


  ';
}
else if ($EMPRESA == 'ZILLA.CL')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoZi.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>Inversiones JJ Gomez SPA</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>

  <tr>
    <td>Rut: 77.122.585-3</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnechea</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Inversiones JJ Gomez SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>
  ';
}
else if ($EMPRESA == 'GR ASESORIAS Y CONSU')
{
  $tablaheader.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoCon.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>GR Asesorias y consultorias SPA</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>

  <tr>
    <td>Rut: 77.125.379-2</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
   <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnecheaa</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: GR Asesorias y consultorias SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>
  ';
}
else
{
    $tablaheader.='
    <tr>
    <td  rowspan="5"><img src="Imagenes/Rochag.png" style = "border:0px;"></td>
    <td width="270"><h3> Rocha S.A</h3></td>
    <td colspan="4"><h3>Orden de Compra</h3>  Pag 1 </td>
  </tr>
  <tr>
    <td>Rut: 77.003.680-1</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 2586 21 96, 2586 21 97</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
    
  </tr>
  <tr>
    <td>Nombre: Multioficina</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}
$tablaheader1 = '';
if(substr($EMPRESA, 0, 7) == 'MUEBLES')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoMD.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>'.utf8_encode("Muebles y Dise�os S.A.").'</h3></td>
    <td colspan="4"><h3>Packing List</h3>  Pag 1 </td>
  </tr>
   <tr>
    <td>Rut: 99.543.470-9</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>
  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Muebles y Dise�os</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}
 else if($EMPRESA == 'TRANSPORTE JJ')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoTransportesJJ.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Transportes JJ</h3></td>
    <td colspan="4"><h3>Packing List</h3>  Pag 1 </td>
  </tr>
 <tr>
    <td>Rut: 76.074.046-2</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>
  
  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre: Transportes JJ</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}
else if ($EMPRESA == 'SILLAS Y SILLAS')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoSS.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Sillas y Sillas S.A.</h3></td>
    <td colspan="4"><h3>Packing List</h3> Pag 1 </td>
  </tr>
   <tr>
    <td>Rut: 76.038.442-9</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre:  Sillas y Sillas</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>


  ';
}
else if ($EMPRESA == 'WELLPLACE')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoWe.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Inversiones JJ Gomez SPA</h3></td>
    <td colspan="4"><h3>Packing List</h3> Pag 1 </td>
  </tr>
   <tr>
    <td>Rut: 77.122.585-3</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnechea</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre:  Inversiones JJ Gomez SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>


  ';
}
else if ($EMPRESA == 'ZILLA.CL')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoZi.jpg" style = "border:0px;width:140px;"></td>
    <td width="270"><h3> Inversiones JJ Gomez SPA</h3></td>
    <td colspan="4"><h3>Packing List</h3> Pag 1 </td>
  </tr>
   <tr>
    <td>Rut: 77.122.585-3</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnecheaa</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre:  Inversiones JJ Gomez SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>


  ';
}
else if ($EMPRESA == 'GR ASESORIAS Y CONSU')
{
  $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/LogoCon.png" style = "border:0px;width:140px;"></td>
    <td width="270"><h3>GR Asesorias y consultorias SPA</h3</td>
    <td colspan="4"><h3>Packing List</h3> Pag 1 </td>
  </tr>
   <tr>
    <td>Rut: 77.122.585-3</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. San Josemaría Escrivá de Balaguer 13105, Of. 915, Lo Barnecheaa</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 56 2 29207175 / 56 2 29207176</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>Nombre:  Inversiones JJ Gomez SPA</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>
  ';
}
else
{
    $tablaheader1.='
    <tr>
    <td width="100" rowspan="5"><img src="Imagenes/Rochag.png" style = "border:0px;"></td>
    <td width="270"><h3>Rocha S.A</h3></td>
    <td colspan="4"><h3>Packing List</h3>  Pag 1 </td>
  </tr>
  <tr>
    <td>Rut: 77.003.680-1</td>
    <td>Numero:</td>
    <td style="font-size:15px;">'.($CODIGO_OC).'</td>
    <td>'.$anula.'</td>
    <td style="font-size:15px;">'.($VERSION).'</td>
  </tr>


  <tr>
    <td>Direccion: Av. Los conquistadores 2635, Providencia</td>
    <td>Fecha Emision</td>
    <td>'.($FECHA_REALIZACION).'</td>
    <td>Fecha Entrega:</td>
    <td>'.($FECHA_ENTREGA).'</td>
    
  </tr>

  <tr>
    <td>Fono: 2586 21 96, 2586 21 97</td>
    <td>Forma de pago</td>
    <td>'.(substr($CONDICION_PAGO,0,25)).'</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
    
  </tr>
  <tr>
    <td>Nombre: Multioficina</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>'.(substr($CONDICION_PAGO,25)).'</td>
    
  </tr>

  ';
}






//Aqu� pondriamos por ejemplo la consulta
$html='

<table width="806" border="0" >
'.$tablaheader.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor: </p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar :</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1" width="1000">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Precio</th>
<th width="30">Desc</th>
<th width="51">Total</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trd.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
</div>

<table border="" cellspacing=0 cellpadding=0>
 '.$tablapie.'
</table>';
$html2='
<table width="806" border="0" >
  
'.$tablaheader1.'
 
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a: </p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Reci</th>
<th width="83">Detalle</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trd15.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
'.$tablapiea.'
</div>

<table border="0" cellspacing=0 cellpadding=0 >
  <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl </td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
</table>';
if($contador_oficial >= 16 )
{
$html1='
<table width="806" border="0" >

 '.$tablaheader.'

</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.$RUT_PROVEEDOR.'</td>
<td> </td>
<td>Rut:'.$DESPACHAR_RUT.' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Precio</th>
<th width="30">Desc</th>
<th width="51">Total</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trd5.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
</div>

<table border="" cellspacing=0 cellpadding=0>
 '.$tablapie1.'
</table>';
$html3='
<table width="806" border="0" >

 '.$tablaheader1.'
 
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1" width="1000">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Reci</th>
<th width="83">Detalle</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trd25.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
'.$tablapieb.'
</div>

<table border="0" cellspacing=0 cellpadding=0 >
  <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>
</table>';
}
else
{
  $html1="";
  $html3="";
}
//
if($contador_oficial >= 31 )
{
$htmla='
<table width="806" border="0" >
 
 '.$tablaheader.'

</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.$RUT_PROVEEDOR.'</td>
<td> </td>
<td>Rut:'.$DESPACHAR_RUT.' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Precio</th>
<th width="30">Desc</th>
<th width="51">Total</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trda.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
</div>

<table border="" cellspacing=0 cellpadding=0>
 '.$tablapie2.'
</table>';
$htmlaa='
<table width="806" border="0" >
 '.$tablaheader1.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1" width="1000">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Reci</th>
<th width="83">Detalle</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trdaa.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
'.$tablapiec.'
</div>

<table border="0" cellspacing=0 cellpadding=0 >
  <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>
</table>';
}
else
{
  $htmla = "";
  $htmlaa = "";
}
//

if($contador_oficial >=46 )
{
$htmlb='
<table width="806" border="0" >
'.$tablaheader.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.$RUT_PROVEEDOR.'</td>
<td> </td>
<td>Rut:'.$DESPACHAR_RUT.' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Precio</th>
<th width="30">Desc</th>
<th width="51">Total</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trdb.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
</div>

<table border="" cellspacing=0 cellpadding=0>
 '.$tablapie3.'
</table>';
$htmlbb='
<table width="806" border="0" >
'.$tablaheader1.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1" width="1000">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Reci</th>
<th width="83">Detalle</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trdbb.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
'.$tablapied.'
</div>

<table border="0" cellspacing=0 cellpadding=0 >
  <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>
</table>';
}
else
{
  $htmlb = "";
  $htmlbb = "";
}

//////
if($contador_oficial >= 61 )
{
$htmlc='
<table width="806" border="0" >
'.$tablaheader.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.$RUT_PROVEEDOR.'</td>
<td> </td>
<td>Rut:'.$DESPACHAR_RUT.' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Precio</th>
<th width="30">Desc</th>
<th width="51">Total</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trdc.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
</div>

<table border="" cellspacing=0 cellpadding=0>
 '.$tablapie4.'
</table>';
$htmlcc='
<table width="806" border="0" >
  '.$tablaheader1.'
</table>
<table>
<tr>
<td><b><p style="font-size:12px;">Proveedor:</p></b></td>
<td width="295">&nbsp;</td>
<td><b><p style="font-size:12px;">Despachar a:</p></b></td> 
</tr>
</table>

<table id="tabla_proveedor" align="left">
<tr>
<td width="320">'.($NOMBRE_FANTASIA).'</td>
<td width="30"> </td>
<td width="408">'.utf8_encode("Muebles y Dise�os S.A.").'</td>
</tr>
<tr>
<td>Rut:'.($RUT_PROVEEDOR).'</td>
<td> </td>
<td>Rut:'.($DESPACHAR_RUT).' </td>
</tr>
<tr>
<td>'.($DIRECCION).'</td>
<td> </td>
<td>'.($DESPACHAR).' </td>
</tr>
<tr>
<td>'.($COMUNA).'</td>
<td> </td>
<td>'.($DESPACHAR_COMUNA).' </td>
</tr>
<tr>
<td>Chile</td>
<td></td>
<td>Chile</td>
</tr>
<tr>
<td>&nbsp;</td>
<td></td>
<td>'.$DESPACHAR_TELEFONO.'</td>
</tr>
</table>
<br>
<div id="tabla1">
<table cellspacing=0 cellpadding=0 id="impreso1" width="1000">
<tr>
<th width="87">Codigo</th>
<th width="60">Rocha</th>
<th width="326">Descripcion</th>
<th width="125">Obs</th>
<th width="38">Cant</th>
<th width="45">Reci</th>
<th width="83">Detalle</th>
</tr>
<tr>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
<td style="border-top:inset #000 1px; "></td>
</tr>
'.$trdcc.'
</table>
<table style="border-top:inset #000 1px;">
<tr><td width="770">Obeservacion: '.($OBSERVACION).'</td></tr>
</table>
'.$tablapiee.'
</div>

<table border="0" cellspacing=0 cellpadding=0 >
  <tr>
    <td width="653">NOTA:ADJUNTAR ORDEN DE COMPRA A FACTURA PARA RECEPION</td>
    <td width="61"></td>
    <td width="50"></td>
  </tr>
  <tr>
    <td>HORARIO RECEPCION DE MERCADERIA 08:30 A 12:45 Y 14:00 A 16:45 HRS</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>ENTREGAR FACTURAS EN CAMINO LONQUEN N� 10765, MAIPU O FACTURA ELECTRONICA A pbeltran@multioficina.cl</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
    <td>'.($nombres).' '.($apellido).' '.$cargo.'</td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    </tr>
  <tr>
    <td>Jhon Jairo Gomez C Gerente General</td>
    <td></td>
    <td></td>
    </tr>
</table>';
}
else
{
  $htmlc =  "";
  $htmlcc = "";
}

?>