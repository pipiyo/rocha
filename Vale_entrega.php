<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_VALE = $_GET['CODIGO_VALE'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM vale_emision where COD_VALE = '".$CODIGO_VALE."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_VALE= $row["COD_VALE"];
	$FECHA = $row["FECHA"];
	$FECHA_T = $row["FECHA_TERMINO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];

	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	$EMPLEADO = $row["EMPLEADO"];
	$DIFERENCIA_TOTAL = $row["DIFERENCIA_TOTAL"];
  }
  
  if($ESTADO == 'NULO')
  {
	  $che = 'checked';
  }
  else
  {
	   $che = '';
  }
  
  mysql_free_result($result);

?>

<!doctype html>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title>Vale Entrega V1.2.2</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_vale_entrega.css" />
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

<script>  

function enviar()
{
  document.getElementById("formularionulo").submit();
} 




$(document).ready(function(){
for (var i = 1 ; i < $('#table_vale_entrega tr').length ; i++) {
if ( $("#dif"+i+"").val().length == 0 ) {
$("#dif"+i+"").val( $("#cans"+i+"").val() );

 if ( $("#cane"+i+"").val().length == 0 ) {
 	$("#cane"+i+"").val("0");
 };

 if ( $("#entr"+i+"").val().length == 0 ) {
 	$("#entr"+i+"").val("0");
 };

};
}
	var sum = 0;
	var sums = 0;
	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
    if (this.value < 0) {
    	sums++; 
    };
});
if (sums == 0) {
	$('#aceptar').removeAttr('disabled','disabled');
};
$("#diftot").val(sum);
});





$(document).ready(function(){
$(".entrega").change( function(e){
var row = $(this).attr("name").substring(4, 6);

if (this.value.length == 0) {

$(this).val("0");

$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );

}else if ($("#entr"+row+"").val().length == 0) {

$("#entr"+row+"").val("0");

$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );

}else{

$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );

};



if ( $("#dif"+row+"").val() <  0 ) {
	$('#aceptar').attr('disabled','disabled');
	var sum = 0;
	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
});
$("#diftot").val(sum);
}else{
	var sum = 0;
	var sums = 0;
	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
    if (this.value < 0) {
    	sums++; 
    };
});
if (sums == 0) {
	$('#aceptar').removeAttr('disabled','disabled');
};
$("#diftot").val(sum);
};
});
});






$(document).ready(function(){
$(".yaentregado").change( function(e){
var row = $(this).attr("name").substring(4, 6);



if (this.value.length == 0) {
$(this).val("0");
$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );

}else if ($("#cane"+row+"").val().length == 0) {
$("#cane"+row+"").val("0");
$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );

}else{
$("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );



};

if ( $("#dif"+row+"").val() <  0 ) {
	$('#aceptar').attr('disabled','disabled');
	var sum = 0;
	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
});
$("#diftot").val(sum);
}else{
$('#aceptar').removeAttr('disabled','disabled');
	var sum = 0;
	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
});
$("#diftot").val(sum);
};
});
});





</script>

<body>
<div id='bread'><div id="menu1"></div></div>
<div id='wrap'>
<table bordercolor="#ccc" rules="all" id = 'encabezado'  >
<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> </b></h3></td>
  <td width="86"  align="center"></td>
  <td width="106"  align="center"></td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b> Vale Entrega</b></h3></td>
  <td height="25" align="center"></td>
  <td align="center"><input class='formulario_ingreso_servicio' type='text' value='' id='CODIGO_PROYECTO' name = 'CODIGO_PROYECTO' /></td>
</tr>
<tr>
  <td height="29" align="center">Fecha</td>
  <td align="center"><?php echo date("Y-m-d")?></td>
</tr>
<tr>
  <td align="center">Pagina</td>
  <td align="center">1 de 1</td>
</tr>
</table>

<form action = "scriptValeEntrega.php" method="post" id='formulario'>
<br />
<table rules="all" border="1" bordercolor="#ccc">
	<tr style="">
		<td  class='color_ti' width='180'><h3 style="font-size:10px;">ROCHA</h3></td>
        <td width="153"><a class="linkrocha" href="editarProyecto.php?CODIGO_PROYECTO=<?php echo urlencode($CODIGO_PROYECTO) ?>"> <input class='vale_trega_input'  onKeyUp="" type="text" id = "rocha" name = "rocha" value="<?php echo $CODIGO_PROYECTO?>"/></a></td>
        <td class='color_ti' width='180'><h3 style="font-size:10px;">DEPARTAMENTO</h3></td>
        <td width="150"><input class='vale_trega_input' id = "departamento" name="departamento" value="<?php echo $DEPARTAMENTO?>"/>
        <td class='color_ti'width='100'><h3 style="font-size:10px;">SOLICITADO</h3></td>
        <td width="200"><input class='vale_trega_input'  id = "empleado" name="empleado" value="<?php echo $EMPLEADO?>"/>
</td>
</tr>
<tr>
        <td class='color_ti' ><h3 style="font-size:10px;">FECHA</h3></td>
        <td style="background:#E6E6E6;" width="150"><h3><center><input class='vale_trega_input1'readonly type="text"   id= "fecha" name = "fecha" value="<?php echo $FECHA?>"/></center></h3></td>
        <td class='color_ti'width="50"><h3 style="font-size:10px;">FECHA T</h3></td>
        <td style="background:#E6E6E6;" width="150"><h3><center><input class='vale_trega_input1' readonly type="text"   id= "fecha_t" name = "fecha_t" value="<?php echo $FECHA_T?>"/></center></h3></td>
        
   
        <td class='color_ti'><h3 style="font-size:10px;">N° VALE</h3></td>
        <td style="background:#E6E6E6" width="150"><input class='vale_trega_input1' readonly type="text"   id= "n_vale" name = "n_vale" value="<?php echo $CODIGO_VALE?>"/></td>
	</tr>
		</table>

</div>

<table id='table_vale_entrega' bordercolor="#ccc" rules="all" border="1" width="100%">
<tr>
<th   width="40">#</th>
<th width="230">Codigo Producto</th>
<th>  Descripcion</th>
<th width="80" height="30">Stock</th>
<th width="80">Vale emitidos</th>
<th width="80">OC En Transito</th>
<th width="80">Cantidad Solicitada</th>
<th width="80">U/M</th>
<th width="80">Cantidad Entregada</th>
<th width="80">Entregado</th>
<th width="80">Diferencia</th>
<th width="200" >Observaciones</th>
</tr>

<?php
$query_registro3 = "select DIFERENCIA,CANTIDAD_ENTREGADA,CODIGO_PRODUCTO,ID, OBSERVACIONES,CANTIDAD_SOLICITADA FROM producto_vale_emision where CODIGO_VALE = '".$CODIGO_VALE."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$ID = $row["ID"]; 
	$OBSERVACIONES = $row["OBSERVACIONES"]; 
	$CANTIDAD_SOLICITADA = $row["CANTIDAD_SOLICITADA"];
	$CANTIDAD_ENTREGADA = $row["CANTIDAD_ENTREGADA"];
	$DIFERENCIA = $row["DIFERENCIA"];

$query_registroPRO = "select DESCRIPCION, UNIDAD_DE_MEDIDA,STOCK_ACTUAL FROM producto where CODIGO_PRODUCTO = '".$COD_PRODUCTO."'";
$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultPRO))
  {
	$DESCRIPCIONES= $row["DESCRIPCION"]; 
	$UNIDAD_DE_MEDIDA= $row["UNIDAD_DE_MEDIDA"]; 
	$STOCK= $row["STOCK_ACTUAL"];
  }
  mysql_free_result($resultPRO);

	mysql_select_db($database_conn, $conn);
$query_registro = "SELECT sum(oc_producto.CANTIDAD_RECIBIDA) as trans,sum(oc_producto.CANTIDAD) as trans1  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$COD_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
  
  	$trans1 = $row["trans1"];
	$trans = $row["trans"];
	$trans = $trans1 -$trans;
    
  }
  
  mysql_free_result($result1);
  
  
  $query_registro4 = "SELECT count(producto_vale_emision.CODIGO_VALE) AS CUENT FROM vale_emision, producto ,producto_vale_emision WHERE vale_emision.COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO AND  producto.CODIGO_PRODUCTO  = '".$COD_PRODUCTO."' AND  vale_emision.ESTADO = 'ENTREGADO'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result4))
  {
	$CUENT = $row["CUENT"];

  }
  mysql_free_result($result4);
  
  
  
echo "<tr><td height='20' style='background:#E6E6E6;' id = 'cel1'><center> <input style='font-size:10px;' class='form1' name =cor".$contador." id =cor".$contador." type = 'text' value = '" . 
	    $ID. "' /></center></td>";	
echo "<td style='background:#E6E6E6;'  id = 'cel2'> <center><a href=Producto.php?buscar_codigo=".urlencode($COD_PRODUCTO)."&buscar_usuario=&familias=&buscar=Buscar&valor=0>  <input style='font-size:10px;' class='form2' name =cod".$contador." id =cod".$contador." type = 'text' value = '".$COD_PRODUCTO."' /></a> </center></td>";	
echo "<td style='background:#E6E6E6;'  id = 'cel3'>".$DESCRIPCIONES."<input style='display:none'  class='form3' name =des".$contador." id =des".$contador." type = 'text' value='".$DESCRIPCIONES."' /></td>";
echo "<td style='background:#E6E6E6;'  id = 'cel4'><input style='font-size:10px;' class='form4' name = stock".$contador." id =stock".$contador." type = 'text' value = '".($STOCK)."' /></td>";
echo "<td style='background:#E6E6E6;font-size:10px;' ><center>".$CUENT."</center></td>";
echo "<td style='background:#E6E6E6;font-size:10px;' ><center>".$trans."</center></td>";
echo "<td style='background:#E6E6E6;'  id = 'cel4'><input style='font-size:10px;' class='form4' name = cans".$contador." id =cans".$contador." type = 'text' value = '".($CANTIDAD_SOLICITADA)."' /></td>";
echo "<td style='background:#E6E6E6;'  id = 'cel5'><center><input style='font-size:10px;'  class='form5' name =um".$contador." id =um".$contador." type = 'text' value = '".($UNIDAD_DE_MEDIDA)."' /></center></td>";
echo "<td id = 'cel6'><center><input style='font-size:10px;' onfocus='suma();' onkeydown='suma();' onchange='suma();' class='form6 entrega' id =cane".$contador." name =cane".$contador." type = 'text' value = '' />  </center></td>";
echo "<td  style='background:#E6E6E6;'  id = 'cel7'><center><input  style='background:#E6E6E6;width:95%;border:#E6E6E6 1px solid;font-size:10px;' class='yaentregado' onfocus='suma();' onkeydown='suma();' onchange='suma();'  name =entr".$contador." id =entr".$contador." type = 'text' value = '".($CANTIDAD_ENTREGADA)."'/></center></td>"; 
echo "<td  style='background:#E6E6E6;'  id = 'cel7'><center><input  style='background:#E6E6E6;width:95%;border:#E6E6E6 1px solid;font-size:10px;' class='diferencia' name =dif".$contador." id =dif".$contador." type = 'text' value = '".($DIFERENCIA)."'/></center></td>"; 
echo "<td   id = 'cel11'><center><input style='font-size:10px;' class='form8' name =obs".$contador." id =obs".$contador." type = 'text' value = '".($OBSERVACIONES)."' /></center></td></tr>"; 
    $contador++; 
  }
  mysql_free_result($result3);
  mysql_close($conn);



?>


</table>
<div align="right">
<table>
<tr>
 <td>Diferencia Total<td>
 </tr>
 <td> <input type = 'text'  style="display:none;" id="ciclos" name ="ciclos" value = "<?php echo ($contador - 1 );?>"  /> </td>
 <tr><td> <input   type = 'text' id="diftot" style="width:185px;" name ="diftot" value = "<?php echo $DIFERENCIA_TOTAL;?>"  /> </td>
 <?php if($ESTADO == "PENDIENTE") { ?>
</tr>
<tr> 
<td> <input class='ingreso-servicio' style="width:188px;" type = 'submit' id="aceptar" name ="aceptar" value = "aceptar"  /> </td>
</tr>


</form>
<form action = "editar_Vale.php" method="post" id='formulario'>
<tr>
<td>
<a href="CopiarValeEntrega.php?CODIGO_VALE=<?php echo $CODIGO_VALE?>&COD_PRODUCTO=<?php echo $CODIGO_VALE?>">
<input style="width:188px;" class='ingreso-servicio' type="button" id="CopiarVale" name ="CopiarVale" value = "Copiar"  />
</a>
<td>
</tr>

<tr>
<td>
<?php if($CODIGO_USUARIO  ==  3 || $CODIGO_USUARIO  ==  2) { ?>
<input class='ingreso-servicio' style="width:188px;" type = 'submit' id="editar" name ="editar" value = "Editar"  />
<?php } ?>
<input type='hidden' id="CODIGO_VALE" name ="CODIGO_VALE" value = "<?php echo $CODIGO_VALE?>" />
</form> 
<?php } else { ?>
</td>
</tr>
</table>

<?php } ?>

      <form id = 'formularionulo'  name = 'formularionulo' method="GET" action="scriptActualizarNuloValeEntrega.php"/>
      <input style="display:none;" type="text" id="codigo_va" name="codigo_va" value="<?php echo $CODIGO_VALE ?> ">
      <table>
      <tr>
      <td> Nulo </td>
      <td> <input  <?php echo $che ?> onClick="enviar()" type="checkbox" id="enviado" name="enviado" value="NULO"> <td>
      </tr>
      </table>
      </form> 
</div>

</body>
</html>