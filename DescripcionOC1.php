<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
require_once('script-descripcion-oc.php');
include('convertToPDF.php');

if ( isset($_POST['PDF_1']) )
    doPDF('ejemplo',$html.$html1.$htmla.$htmlb.$htmlc.$html2.$html3.$htmlaa.$htmlbb.$htmlcc,true,'Style/pdfOC.css');

if ( isset($_POST['PDF_2']) )
    doPDF('ejemplo',$html.$html1.$htmla.$htmlb.$htmlc,true,'Style/pdfOC.css');
	
if ( isset($_POST['PDF_3']) )
    doPDF('ejemplo',$html2.$html3.$htmlaa.$htmlbb.$htmlcc,true,'Style/pdfOC.css');
?>

<!doctype html>
  <html>
  <head>
  <title>Descripcion V1.2.0</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_descripcionOC.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <script type="text/javascript" src="js/tinybox.js"></script>
  <link rel="stylesheet" href="style/estilopopup-new.css" />
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script> 
  function enviar()
  {
   document.getElementById("formulario").submit();
  } 



$(document).ready(function(){
  $('#ingresar1').live( "click", function(){
$.ajax({
    type: "POST",
    url: 'POST_Comentario_OC.php',
    data: { oc: $('#txt_codigo_proyecto15').val() ,  coment : $('#txt_observaciones1').val()  },
    dataType:'html',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
      $('#comentariosOC').val(""+data+"");
      TINY.box.hide();
}
});
    });
  }); 

$(document).ready(function(){
$('#ingresar2').live( "click", function(){
$.ajax({
    type: "POST",
    url: 'POST_Reclamo_OC.php',
    data: { oc1: $('#txt_codigo_proyecto16').val() ,  coment1 : $('#txt_radicado1').val()  },
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
    $('#comentarios-rd').val(""+data+"");
    TINY.box.hide();
}
});
    });
  }); 



</script> 
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<?php 
if($EMPRESA == 'MUEBLES Y DISEÑOS')
{
	$empresa_e = 'Muebles y Diseños S.A.';
	$rut_e = '99.543.470-9';
	$nombre_f = 'Muebles y Diseños S.A.';
}
 else if($EMPRESA == 'TRANSPORTE JJ')
{
	$empresa_e = 'Transportes JJ.';
	$rut_e = '76.074.042-2';
	$nombre_f = 'Transportes JJ.';
	
}
else if ($EMPRESA == 'SILLAS Y SILLAS')
{
	$empresa_e = 'Sillas y Sillas S.A.';
	$rut_e = '76.038.442-9';
	$nombre_f = 'Sillas y Sillas S.A.';
	
}
else
{
	$empresa_e = 'Rocha S.A.';
	$rut_e = '77.003.680';
	$nombre_f = 'Multioficina';
}

?>
<div class='contenedor'>
<form id = 'formulario'  name = 'formulario' method="GET" action="scriptActualizarEnviado.php"/>
<input style="display:none;" type="text" id="codigo_oc" name="codigo_oc" value="<?php echo $CODIGO_OC ?> ">

<table border='1'  rules='all' class='table-descripcion-oc'>
  <tr>
    <td  colspan='2'><h1><?php echo $empresa_e ?></h1></td>
    <td  colspan='2'><h1>Orden de Compra</h1></td>
  </tr>
  <tr>
    <td>Rut: <?php echo $rut_e ?></td>
    <td>Numero: &nbsp; <?php echo $CODIGO_OC ?></td>
    <td>Fecha Emisión: &nbsp;   <?php echo $FECHA_REALIZACION ?></td>
    <td>Estado: &nbsp; <?php echo $ESTADO ?></td>
   </tr>
  <tr>
    <td>Dirección: Av. Los conquistadores 2635, Providencia</td>
    <td>Versión:&nbsp;&nbsp; <?php echo $VERSION?></td>
    <td>Fecha Entrega:&nbsp; <?php echo ($FECHA_ENTREGA) ?></td>

    <td>

    	<input <?php echo $che ?> onClick="enviar()" type="checkbox" id="enviado" name="enviado" value="1" />
      Enviado

  </td>
  </tr>
  <tr>
    <td  >Fono: 2586 21 96, 2586 21 97</td>
     <td  >Forma de pago:&nbsp; <?php echo ($CONDICION_PAGO) ?></td>
        <td colspan="2">Fecha Confirmación: &nbsp; <?php echo $FECHA_CONFIRMACION?></td>
  </tr>
  <tr>
    <td colspan='4'>Nombre: <?php echo $nombre_f ?></td>
  </tr>
 
</table>
<br />

<table  border='0' cellspacing="0"  class='table-descripcion-oc1'>
<tr>
<td><?php echo ($NOMBRE_FANTASIA); ?></td>
<td>Muebles & diseño</td>
</tr>
<tr>
<td>Rut: <?php echo $RUT_PROVEEDOR ?></td>
<td>Rut: <?php echo $DESPACHAR_RUT ?> </td>
</tr>
<tr>
<td><?php echo ($DIRECCION) ?></td>
<td><?php echo ($DESPACHAR) ?> </td>
</tr>
<tr>
<td><?php echo ($COMUNA) ?></td>

<td><?php echo ($DESPACHAR_COMUNA) ?> </td>
</tr>
<tr>
<td>Chile</td>
<td>Chile</td>
</tr>
<tr>
<td></td>
<td><?php echo $DESPACHAR_TELEFONO ?></td>
</tr>
</table>
</div>



<table border='1'  rules='all' class='table-descripcion-oc2'>
<tr>
<th >Codigo</th>
<th>Rocha</th>
<th width="500">Descripcion</th>
<th width="500">Obs</th>
<th>Stock</th>
<th >Cant</th>
<th >U/M</th>
<th>Precio B</th>
<th >Precio U</th>
<th>Precio L</th>
<th >Desc</th>
<th >Total</th>
</tr>
<?php
$query_registro3 = "select producto.UNIDAD_DE_MEDIDA,oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA, orden_de_compra.COMENTARIO, orden_de_compra.RECLAMO from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$numero = 0;
$fila=1;
 while($row = mysql_fetch_array($result3))
  {

  if($fila == 1)
  {
    $filatr = 'uno';
    $fila++;
  }
  else
  {
    $filatr = 'dos';
    $fila = 1;
  }

	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$DESCRIPCION = $row["DESCRIPCION"]; 
	$STOCK = $row["STOCK_ACTUAL"]; 
	$ROCHA = $row["ROCHA"]; 
	$OBSERVACION1 = $row["OBSERVACION"]; 
	$TOTAL_PRODUCTO = $row["TOTAL"];
	$DESCUENTO_PRODUCTO = $row["DESCUENTO"];
	$CANTIDAD = $row["CANTIDAD"];
	$PRECIO_BODEGA = $row["PRECIO_BODEGA"];
	$PRECIO_LISTA = $row["PRECIO_LISTA"];
	$PRECIO_UNITARIO = $row["PRECIO_UNITARIO"];
	$UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
    $COMENT = $row["COMENTARIO"];
     $RECLAMO1 = $row["RECLAMO"];
	
     echo "<tr class=".$filatr."><td> <a target='_blank' href=Producto.php?&buscar_codigo=" .urlencode($COD_PRODUCTO). "&buscar_usuario=&familias=&buscar=Buscar&valor=0>" . 
	    $COD_PRODUCTO . "</a></td>";	
	
	 echo "<td> <a target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($ROCHA). "> " . 
	    ($ROCHA) . "</a></td>";	
     echo "<td>" . 
	    $DESCRIPCION . "</td>";
     echo "<td>" . 
	    ($OBSERVACION1) . "</td>";
	 echo "<td align='right'>" . 
	    $STOCK. "</td>";
	 echo "<td align='right'>" . 
	   format($CANTIDAD) . "</td>";
	  echo "<td align='center'>" . 
	    $UNIDAD_DE_MEDIDA . "</td>";
     echo "<td align='right'>" . 
	    number_format($PRECIO_BODEGA,0, ",", ".")."</td>"; 
	 echo "<td align='right'>" . 
	    number_format($PRECIO_UNITARIO,0, ",", ".") .   "</td>";
	 echo "<td align='right'>" . 
	    number_format($PRECIO_LISTA,0, ",", ".").   "</td>";
	 echo "<td align='right'>" . 
	    $DESCUENTO_PRODUCTO.   "</td>";
     echo "<td align='right'>" . 
	    number_format($TOTAL_PRODUCTO,0, ",", "."). "</td></tr></tbody>"; 
    $numero++;
  }
  
  mysql_free_result($result3);
  mysql_close($conn);

?>
</form>

<form method="get" action="scriptAutorizacionFactura.php">

<tr>
<th align='left' colspan="10"> Observacion: </th>
<th align='left'> Sub-tot </th>
<td align='right' class='tres'><?php echo number_format($SUB_TOTAL,0, ",", ".") ;?></td>

</tr>
<tr>
<td colspan="10" rowspan="8" ><?php echo ($OBSERVACION)?></td>
<th align='left' > Descuento </th>
<td align='center' class='tres'><?php echo $DESCUENTO_OC?>%</td>
</tr>
<tr>
<th align='left'> Descuento $ </th>
<td align='center'class='tres'><?php echo $DESCUENTO_2?></td>
</tr>
<tr>
<th align='left'> neto</th>
<td align='right' class='tres' ><?php echo number_format($NETO,0, ",", ".")?></td>
</tr>
<tr>
<th align='left'> <?php echo $TIPO_IVA ?>  </th>
<td align='right' class='tres'><?php echo number_format($IVA,0, ",", ".") ?></td>
</tr>
<tr>
<th align='left'> Total</th>
<td align='right' class='tres' ><?php echo  number_format($TOTAL,0, ",", ".") ?></td>

</tr>
<tr>
<th align='left' >Factura</th>
<td ><input  type="text" name="factu" id="factu" value="<?php echo $FACTURAS ?>"/></td>
</tr>
<tr>
<th></th>
<td id='td-boton'><input class='enviar' type="submit"  value="Ingresar"/><input  style="display:none;width:100px;" type="text" id="codigo_oc" name="codigo_oc" value="<?php echo $CODIGO_OC ?>"></td>
</tr>
</table>
</form>

<form method="get" action="scriptAutorizacionOC.php">
<table id = "tabla3" align="left" border="0">
<tr>
<td align='center'>OC Realizada por: <?php echo $USUARIO;?></td>
</tr>
<?php if($AUTORIZADA != ""){ ?>
<tr>
<td align='center'>OC Autorizada por: <?php echo $AUTORIZADA; ?></td>
</tr>
<?php } ?>
<tr>
<?php if($NOMBRE_USUARIO == 'enc' || $NOMBRE_USUARIO == 'pbo' && $TOTAL <= 350000 )
{?>
<td>
<select id = "estados" name = "estados">
<option> <?php echo $ESTADO; ?> </option>
<option> Pendiente </option>
<option> Modificacion </option>
<option> En Proceso</option>
<option> Nulo </option>
<option> OK </option>
</select>
</td>
</tr>

<tr>
<td><input value = "Aceptar" class = "boton_descripcion" type="submit" id = "ok" name="ok"/>
<input style = "display:none;" type = "text"  name = "a" id = "a" value="<?php echo $CODIGO_OC; ?>"/></td>

<?php } else if($TIPO_USUARIO == 'administrador' || $TIPO_USUARIO == 'GERENCIA' )
{?>
<td>
<select class='textbox' id = "estados" name = "estados">
<option> <?php echo $ESTADO; ?> </option>
<option> Pendiente </option>
<option> Modificacion </option>
<option> En Proceso</option>
<option> Nulo </option>
<option> OK </option>
</select>
</td>
</tr>

<tr>
<td><input value = "Aceptar" class = "boton_descripcion" type="submit" id = "ok" name="ok"/>
<input style = "display:none;" type = "text"  name = "a" id = "a" value="<?php echo $CODIGO_OC; ?>"/></td>
<?php } else if($NOMBRE_USUARIO == 'enc' || $NOMBRE_USUARIO == 'pbo' && $RUT_PROVEEDOR == '76.038.442-9' || $RUT_PROVEEDOR == '99.543.470-9')
{?>
<td>
<select id = "estados" name = "estados">
<option> <?php echo $ESTADO; ?> </option>
<option> Pendiente </option>
<option> Modificacion </option>
<option> En Proceso</option>
<option> Nulo </option>
<option> OK </option>
</select>
</td>
</tr>

<tr>
<td><input value = "Aceptar" class = "boton_descripcion"type="submit" id = "ok" name="ok"/>
<input style = "display:none;" type = "text"  name = "a" id = "a" value="<?php echo $CODIGO_OC; ?>"/></td>
<?php }?>
<?php if($TIPO_USUARIO != 'administrador' && $ESTADO == 'En Proceso')
{ ?>
<td>

</td>
<tr>
<td>
<input style = "display:none;" type = "text"  name = "a" id = "a" value="<?php echo $CODIGO_OC; ?>"/></td>
<?php }?>
</form>
</tr>
<form  action="copia_OC.php" method="get">
 <tr>
    <td><input class = "boton_descripcion" name="copiar" type="submit" value="Copiar" id="copiar"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
 </tr>
 </form>
 <?php if($ESTADO == 'Pendiente' || $ESTADO == 'Modificacion')
{ if($ENVIADO == 0 ){ ?>
<form  action="editar_OC.php" method="get">
 <tr>
    <td><input class = "boton_descripcion" name="copiar" type="submit" value="Editar" id="copiar"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
 </tr>
 </form>
 <form  action="oc-detalles.php" method="get">
 <tr>
    <td><input class = "boton_descripcion" name="copiar" type="submit" value="Editar Detalle" id="copiar"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
 </tr>
 </form>
<?php }} ?> 

 <?php if($ENVIADO == 1 && $ESTADO != 'Nulo' ){ ?>

<form  action="versionar_OC.php" method="get">
 <tr>
    <td><input class = "boton_descripcion" name="versionar" type="submit" value="Versionar" id="versionar"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
 </tr>
 </form>

<?php }?> 

<?php if($ESTADO == 'En Proceso' || $ESTADO == 'OK' )
{?>
<form  action="" method="POST">
 <tr>
    <td><input class = "boton_descripcion" name="PDF_1" type="submit" value="Generar" id="pdf"/></td>
 </tr>
 <tr>
    <td><input class = "boton_descripcion" name="PDF_2" type="submit" value="Generar oc" id="pdf"/></td>
 </tr>
 <tr>
    <td><input class = "boton_descripcion" name="PDF_3" type="submit" value="Generar pl" id="pdf"/></td>
 </tr>
 </form>

<?php } ?>

<form action="registro_OC.php" method="get">
    <tr>
    <td><input class = "boton_descripcion" name="registro" type="submit" value="Registro OC" id="registro"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
    </tr>
</form>    
<form action="vale_OC.php" method="get">
    <tr>
    <td><input class = "boton_descripcion" name="vale" type="submit" value="vale" id="Vale"/>
    <input style = "display:none;" type = "text"  name = "CODIGO_OC" id = "copiar" value="<?php echo $CODIGO_OC; ?>"/></td>
    </tr>
</form>    

</table>
<table>
  <tr>

     <td>
<div class='comentarios-obser'  onclick="TINY.box.show({url:'generarComentariosOC.php?OC=<?php echo urlencode($CODIGO_OC)?>',width:550})">
  <p>Comentarios:</p>
<textarea class='textbox tear-azul'  readonly id="comentariosOC" cols="40" rows="8"> <?php echo $COMENT ?>  </textarea>
</div>
    </td>
     <td>
<div class='radicado-obser'  onclick="TINY.box.show({url:'generarReclamoOC.php?OC=<?php echo urlencode($CODIGO_OC)?>',width:550,height:320})">
  <p>Reclamo:</p>
<textarea class='textbox tear-azul'  readonly id="comentarios-rd" cols="40" rows="8"> <?php echo $RECLAMO1 ?>  </textarea>
</div>
      </td>
          <td>
<div class='facturas-obser'>
  <p>Facturas:</p>
<textarea class='textbox tear-azul' cols="40" rows="8"> <?php echo $OBSERVACION_FACTURAS ?>  </textarea>
</div>
    </td>
    </tr>
      </table>
</body>
</html>