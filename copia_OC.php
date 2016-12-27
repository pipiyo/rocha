<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_OC1 = $_GET['CODIGO_OC'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT orden_de_compra.ROCHA_PROYECTO,  orden_de_compra.DESCUENTO_2,orden_de_compra.DESPACHAR_NOMBRE,orden_de_compra.DESPACHAR_TELEFONO, orden_de_compra.CODIGO_OC,orden_de_compra.CODIGO_USUARIO,orden_de_compra.FECHA_REALIZACION,orden_de_compra.FECHA_ENTREGA,orden_de_compra.DESPACHAR_DIRECCION,orden_de_compra.DESPACHAR_COMUNA,orden_de_compra.DESPACHAR_RUT,orden_de_compra.TOTAL,orden_de_compra.ESTADO,orden_de_compra.NOMBRE_PROVEEDOR, orden_de_compra.CONDICION_PAGO, orden_de_compra.DESCUENTO_OC,orden_de_compra.SUB_TOTAL, orden_de_compra.TIPO_IVA, orden_de_compra.IVA, orden_de_compra.NETO, orden_de_compra.OBSERVACION FROM orden_de_compra, usuario where orden_de_compra.CODIGO_OC ='".($CODIGO_OC1)."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
  $CODIGO_OC = $row["CODIGO_OC"];
  $FECHA_REALIZACION = $row["FECHA_REALIZACION"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $DESPACHAR = $row["DESPACHAR_DIRECCION"];
  $DESPACHAR_RUT = $row["DESPACHAR_RUT"];
  $DESPACHAR_NOMBRE = $row["DESPACHAR_NOMBRE"];
  $DESPACHAR_COMUNA = $row["DESPACHAR_COMUNA"];
  $DESPACHAR_TELEFONO = $row["DESPACHAR_TELEFONO"];
  $TOTAL = $row["TOTAL"];
  $NOMBRE_PROVEEDOR = $row["NOMBRE_PROVEEDOR"];
  $CODIGO_USUARIO1 = $row["CODIGO_USUARIO"];
  $ESTADO = $row["ESTADO"];
  $CONDICION_PAGO = $row["CONDICION_PAGO"];
  $DESCUENTO_OC = $row["DESCUENTO_OC"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $TIPO_IVA = $row["TIPO_IVA"];
  $NETO = $row["NETO"];
  $IVA = $row["IVA"];
  $OBSERVACION = $row["OBSERVACION"];
  $ROCHA_PROYECTO = $row["ROCHA_PROYECTO"];
  $DESCUENTO_2 = $row["DESCUENTO_2"];
  
  $MENSAJE = 2;
  }
  
  mysql_free_result($result);
  $ivr = '';
  $ivaa = '';
  $ret = '';
  if($TIPO_IVA == 'Iva Retenido')
  {
   $ivr = 'selected';
  }
  if($TIPO_IVA == 'Iva')
  {
    $ivaa ='selected';
  }
  if($TIPO_IVA == 'Retencion')
  {
    $ret ='selected';
  }
  
  /////////////////////////////////////////

$query_registro2 = "select proveedor.COMUNA, proveedor.DIRECCION, proveedor.RUT_PROVEEDOR, proveedor.NOMBRE_FANTASIA from orden_de_compra, oc_proveedor, proveedor where proveedor.CODIGO_PROVEEDOR = oc_proveedor.CODIGO_PROVEEDOR AND oc_proveedor.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".($CODIGO_OC)."'";
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
  
 $sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
  $CODIGO_OC = $row["CODIGO_OC"];
  $numero++;
  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title> Copia OC V1.1.0</title>
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_oc.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>

$(document).ready(function() {
  $(".btn-sub-actividad").click(function() {
    $.ajax({
      type: "POST",
      url: 'ajax_sub_actividad.php',
      dataType:'json',
      error: function(xhr, status, error) {
      console.log(xhr.responseText);
    },
      success: function(data) {
      var option = "";
      for(var i=0;i<data.length; i++)
      {
       option += "<option value='"+data[i].codigo+"''> "+data[i].proyecto+ " - "+data[i].sub+"</option>"
      }
        $(".btn-sub-actividad").before("<select name='subservicio[]' class='subservicio textbox'><option value=''>Sub Actividad </option>"+option+"</select>");
      }
    });

  });  
});

</script>


</head>
<?php
$frase = ($NOMBRE_FANTASIA)."\n".($RUT_PROVEEDOR)."\n".($DIRECCION)."\n".($COMUNA);
?>
<body>
  <div id='bread'><div id="menu1"></div></div>
<div class='content'>
<form action = "scriptOC.php" method="post" id='formulario'>

<input style="display:none" type = "text" id="codiguito" name="codiguito" value="<?php echo $CODIGO_USUARIO; ?>" />
<h1 id='titulo_oc'>Orden de compra</h1>
<form action = "scriptOC.php" method="POST" id='formulario' enctype="multipart/form-data">
<table id='form_oc'>
<tr>
<td><input onkeyup="es_vacio2();" placeholder="Proveedor" class='textbox' value="<?php echo ($NOMBRE_FANTASIA);?>" onblur="es_vacio2();" type="text" id = "proveedor" name="proveedor"/></br>
<input  onkeyup="es_vacio2();" placeholder="Rut Proveedor" class='textbox' onblur="es_vacio2();" value="<?php echo $RUT_PROVEEDOR; ?>" type="text" id = "rut_prove" name="rut_prove"/>
</td>
<td> 
<select class='textbox'  onchange="seleccion();es_vacio2();" id = "despachar" name = "despachar">
<option> Despachar A: </option>
<option> Fabrica </option>
<option> Los Conquistadores </option>
<option> La Dehesa </option>
<option> Otro </option>
</select> </td>
<td><input type="text" readonly placeholder="Rut Proveedor" class='textbox' id = "folio" name="folio" value = "<?php echo $CODIGO_OC + 1; ?>"/> </td>
<td><input placeholder="Fecha Entrega" class='textbox' onkeyup="es_vacio2();" onblur="es_vacio2();" value="<?php echo $FECHA_ENTREGA ?>" type="text" id = "fechaE" name="fechaE"/></td>
</tr>

<tr>
<td><textarea class='textbox' readonly="readonly" id = "proveedor1" rows="7" cols="25"><?php echo $frase; ?></textarea></td>
<td>
<input type="text" class='textbox' value="<?php echo $DESPACHAR_RUT; ?>"  id = "despachar1" name="despachar1"/><br />
<input type="text" class='textbox' value="<?php echo ($DESPACHAR_NOMBRE); ?>" id = "despachar_nombre" name="despachar_nombre"/><br />
<input type="text" class='textbox' value="<?php echo ($DESPACHAR); ?>" id = "despachar_direccion" name="despachar_direccion"/><br />
<input type="text" class='textbox' value="<?php echo ($DESPACHAR_COMUNA); ?>" id = "despachar_comuna" name="despachar_comuna"/><br />
<input type="text" class='textbox' value="<?php echo $DESPACHAR_TELEFONO; ?>" id = "despachar_telefono" name="despachar_telefono"/></td>
<td> <input class='textbox' type="text" id = "fecha" name="fecha" value = "<?php echo date("Y-m-d") ; ?>"/> </td>
<td ><select  class='textbox' onchange="seleccion1()" id = "cond" name = "cond">
<option> Condiciones Pag </option>
<option> A Definir </option>
</select>
</br>
<input class='textbox'  type="text" id = "condicion" name="condicion"/></td>
</tr>


<tr> 
<td> 
<select class='textbox' id='prooc' name='prooc'>

<option>MULTIOFICINA</option>
<option>MUEBLES Y DISEÑOS</option>
<option>SILLAS Y SILLAS</option>
<option>TRANSPORTE JJ </option>
</select>
</td>
<td> 
<input placeholder="Reclamo" class='textbox' type = "text" id="reclamo" name="reclamo" />
</td>
</tr> 
<tr>
<td> 
<input VALUE="<?php echo $ROCHA_PROYECTO; ?>" placeholder="Rocha" class='textbox' type = "text" id="rochapri" name="rochapri" />
</td>
<td> 
<select class='textbox' id='tipooc' name='tipooc'>
<option>OC</option>
<option>VALE</option>
</select>
</td>

<td><select class='textbox'  onchange="" id = "departamento" name="departamento">
<option>Departamento</option>
<option>PRODUCCION</option>
<option>ADQUICICIONES</option>
<option>ABASTECIMIENTO</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DAM</option>
<option>DESARROLLO</option>
<option>SILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>DAM</option>
<option>MUEBLES ESPECIALES</option>
<option>SERVICIO TECNICO</option>
</select></td>

    <td><input placeholder="Empleado" class='textbox' type='text'  onchange="" id = "empleado" name="empleado" /></td>
</tr>
<tr>
<td><select name="subservicio[]" class="subservicio textbox">
<option>Sub Actividad </option>
<?php 
$query_registro = 
"select servicio.CODIGO_PROYECTO, sub_servicio.CODIGO_SUBSERVICIO, sub_servicio.SUB_DESCRIPCION from sub_servicio, servicio where sub_servicio.SUB_CODIGO_SERVICIO =  servicio.CODIGO_SERVICIO and sub_servicio.SUB_ESTADO = 'En Proceso' and sub_servicio.SUB_NOMBRE_SERVICIO  = 'Adquisiciones'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['CODIGO_SUBSERVICIO']); ?>" > <?php echo ($row['CODIGO_PROYECTO']); ?> - <?php echo ($row['SUB_DESCRIPCION']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select>
<a class="btn-sub-actividad" id="b1">+ Sub Actividad</a>
</td>
</tr>
</table>
</div>



<table  id='OC' width="100%" frame="box" rules="all" cellspacing=0 cellpadding=0> 

<tr>
<th width="80">Codigo</th>
<th width="60">Rocha</th>
<th  width="70" height="40">Existe Rocha</th>
<th width="260">Descripcion</th>
<th width="110">Obs</th>
<th  width="80" height="40">Existe</th>
<th width="30">Stock</th>
<th width="30">Cant</th>
<th  width="40" height="40">U/M</th>
<th width="50">Precio B</th>
<th width="50">Precio U</th>
<th width="50">Precio L</th>
<th width="50">Desc</th>
<th width="68">Total</th>

</tr>
<?php
$query_registro3 = "select producto.UNIDAD_DE_MEDIDA,oc_producto.PRECIO_UNITARIO, oc_producto.PRECIO_LISTA,producto.STOCK_ACTUAL, oc_producto.OBSERVACION, producto.DESCRIPCION,oc_producto.ROCHA,producto.CODIGO_PRODUCTO, oc_producto.TOTAL, oc_producto.DESCUENTO, oc_producto.CANTIDAD, oc_producto.PRECIO_BODEGA from orden_de_compra, oc_producto, producto where producto.CODIGO_PRODUCTO = oc_producto.CODIGO_PRODUCTO AND oc_producto.CODIGO_OC = orden_de_compra.CODIGO_OC AND orden_de_compra.CODIGO_OC = '".$CODIGO_OC1."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
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
     echo "<tr><td id = 'cel1'> <input autocomplete='off' ondblclick='limpiar(this.id);' onblur='final();vagregar(this.id);'  class='form1 codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '" . 
     $COD_PRODUCTO . "' /></td>"; 
   echo "<td id = 'cel2'> <input autocomplete='off' class='form8 proyecto' onblur='final();vagregar1(this.id);' name =roch".$contador." id =roch".$contador." type = 'text' value = '" . 
      ($ROCHA) . "' /></td>";
      echo "<td height='30'><input class='form9'  id=resultador".$contador." type = 'text' value = '' /></td>";    
     echo "<td id = 'cel3'><input autocomplete='off' onblur='final();vagregar(this.id);' class='form2 descripcion' name =des".$contador." id =des".$contador." type = 'text' value = '" . 
      $DESCRIPCION . "' /></td>";
     echo "<td id = 'cel4'><input class='form9' name =obs".$contador." id =obs".$contador." type = 'text' value = '". 
      ($OBSERVACION1)."' /></td>";
     echo "<td height='30'><input class='form9'  id =exs".$contador." type = 'text' value = '' /></td>";
   echo "<td id = 'cel5' style='background:#ccc'><input class='form10'  id =stock".$contador." type = 'text' value = '" . 
      $STOCK. "' /></td>";
   echo "<td id = 'cel6'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '" . 
      $CANTIDAD . "' /></td>";
     echo "<td id = 'cel6'><input class='form3' id =um".$contador." type = 'text' value = '" . 
      $UNIDAD_DE_MEDIDA . "' /></td>";
     echo "<td id = 'cel7' style='background:#ccc'><input class='form4' name =prec".$contador." id =prec".$contador." type = 'text' value = '" . 
      $PRECIO_BODEGA.   "' /></td>"; 
   echo "<td id = 'cel8' style='background:#ccc'> <input class='form6' name =iva".$contador." id =iva".$contador." type = 'text' value = '" . 
      $PRECIO_UNITARIO.   "' /></td>";
   echo "<td id = 'cel9'> <input onblur='total();final();' onkeydown='total();final();' class='form11' id =precl".$contador." name =precl".$contador." type = 'text' value = '  " . 
      $PRECIO_LISTA.   "' />";
   echo "<td id = 'cel10'><input onblur='total();final();' onkeydown='total();final();' class='form5' id =desc".$contador." name =desc".$contador." type = 'text' value = '" . 
      $DESCUENTO_PRODUCTO.   "' /></td>";
     echo "<td id = 'cel11' style='background:#ccc'><input class='form7' name =tot".$contador." id =tot".$contador." type = 'text' value = ' " . 
      $TOTAL_PRODUCTO. "' /></td></tr>"; 
    $contador++; 
  }
  mysql_free_result($result3);
  mysql_close($conn);
  
  while($contador < 76)
  {
  echo "<tr><td id = 'cel1'> <input autocomplete='off' ondblclick='limpiar(this.id);' onblur='final();vagregar(this.id);'  class='form1 codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></td>";  
   echo "<td id = 'cel2'> <input autocomplete='off' onblur='final();vagregar1(this.id);' class='form8 proyecto' name =roch".$contador." id =roch".$contador." type = 'text' value = '' /></td>";  
    echo "<td height='30'><input class='form9'   id=resultador".$contador." type = 'text' value = '' /></td>"; 
     echo "<td id = 'cel3'><input autocomplete='off' onblur='final();es_vacio2();vagregar(this.id);' class='form2 descripcion' name =des".$contador." id =des".$contador." type = 'text' value = '' /></td>";
     echo "<td id = 'cel4'><input class='form9' name =obs".$contador."  id =obs".$contador." type = 'text' value = '' /></td>";
    echo "<td height='30'><input class='form9'   id =exs".$contador." type = 'text' value = '' /></div></td>";
   echo "<td id = 'cel5' style='background:#ccc'><input class='form10'  id =stock".$contador." type = 'text' value = '' /></td>";
   echo "<td id = 'cel6'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '' /></td>";
    echo "<td id = 'cel6'><input class='form3' id =um".$contador." name=um".$contador."  type = 'text' value = '' /></td>";
     echo "<td id = 'cel7' style='background:#ccc'><input class='form4' name =prec".$contador." id =prec".$contador." type = 'text' value = '' /></td>"; 
   echo "<td id = 'cel8' style='background:#ccc'> <input class='form6' name =iva".$contador." id =iva".$contador." type = 'text' value = '' /></td>";
   echo "<td id = 'cel9'> <input onblur='total();final();' onkeydown='total();final();' class='form11' id =precl".$contador." name =precl".$contador." type = 'text' value = '' />";
   echo "<td id = 'cel10'><input onblur='total();final();' onkeydown='total();final();' class='form5' id =desc".$contador." name =desc".$contador." type = 'text' value = '' /></td>";
     echo "<td id = 'cel11' style='background:#ccc'><input class='form7' name =tot".$contador." id =tot".$contador." type = 'text' value = '' /></td></tr>"; 
   $contador++; 
  }
?>
<tr>
<td colspan="12"> Observacion: </td>
</tr>
<tr>
<td  colspan="12" rowspan="8" style=""><textarea name = "obsgeneral" id = "obsgeneral"rows="5" cols="40"><?php echo ($OBSERVACION)?></textarea></td>
</tr>
<tr>
<td style=" border-right:inset #000 1px;"> Sub-tot </td>
<td style=" border-right:inset #000 1px;"><input onBlur="total();final();" onKeyDown="total();final();"class = "forma" type="text" id = "sub1" name="sub1" value="<?php echo $SUB_TOTAL?>"/></td>
</tr>
<tr>
<td width="55" height="20" style=" border-right:inset #000 1px;"> Descuento </td>
<td width="70" height="20" style=" border-right:inset #000 1px;"><input onBlur="total();final();" onKeyDown="total();final();" class = "forma" type="text" id = "descuento1" name="descuento1" value="<?php echo $DESCUENTO_OC ?>"/></td>
</tr>
<tr>
<td width="55" height="30"> Descuento pesos</td>
<td width="90" height="30"><input onBlur="total();final();" onKeyDown="total();final();" class = "forma" type="text" id = "descuento2" name="descuento2" value="<?php echo $DESCUENTO_2?>"/> </td>
</tr>

<tr>
<td style=" border-right:inset #000 1px;"> neto</td>
<td style=" border-right:inset #000 1px;"><input onBlur="total();final();" onKeyDown="total();final();"class = "forma" type="text" id = "neto" name="neto" value="<?php echo $NETO ?>"/></td>
</tr>
<tr>
<td style=" border-right:inset #000 1px;"> <select onBlur="total();final();" onChange="total();final();" id = "ivaf" name = "ivaf">
    <option> </option>
    <option <?php echo $ivr ?>> Iva Retenido </option>
    <option <?php echo $ivaa ?>> Iva </option>
    <option <?php echo $ret ?>> Retencion </option>
  </select></td>
<td style=" border-right:inset #000 1px;"><input onBlur="total();final();" onKeyDown="total();final();" class = "forma" type="text" id = "valoriva" name="valoriva" value="<?php echo $IVA ?>"/> </td>
</tr>
<tr>
<td style=" border-right:inset #000 1px;"> Total</td>
<td style=" border:inset #000 1px;"><input onBlur="total();final();" onKeyDown="total();final();" class = "forma" type="text" id = "tota" name="tota" value="<?php echo $TOTAL ?>"/></td>
</tr>
<tr>
<td width="80" height="30"><input onClick="final()" value = "Realizar"  type="submit" id = "cal" name="cal" disabled="disabled"/> </td>
</tr>
</table>
<input style="display:none" type = "text" id="codiguito" name="codiguito" value="<?php echo $CODIGO_USUARIO; ?>" />
<input style="display:none" type = "text" id="nombresito" name="nombresito" value="<?php echo $NOMBRE_USUARIO; ?>" />
<div  id="listaproyectos"></div>
<div  id="listacodigos"></div>
<div  id="listadescripciones"></div>

</form>
</body>
</html>