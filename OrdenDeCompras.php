<?php require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);

$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];

$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];

$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";

$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
  $nombres = $row["nombres"];
  $apellido = $row["apellido_paterno"];
  $numero++;
  }
mysql_free_result($result1);
$CODIGO_OC = 0;
$sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
  $CODIGO_OC = $row["CODIGO_OC"];
  $numero++;
  }
?>

<?php
switch (date("m")) {
    case "01":
        $mes = "Enero";
        break;
    case "02":
        $mes = "Febrero";
        break;
    case "03":
        $mes = "Marzo";
        break;
  case "04":
        $mes = "Abril";
        break;
    case "05":
        $mes = "Mayo";
        break;
    case "06":
        $mes = "Junio";
        break;
  case "07":
        $mes = "Julio";
        break;
    case "08":
        $mes = "Agosto";
        break;
    case "09":
        $mes = "Septiembre";
        break;
  case "10":
        $mes = "Octubre";
        break;
    case "11":
        $mes = "Noviembre";
        break;
    case "12":
        $mes = "Diciembre";
        break;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Orden de compra V1.1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_oc.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>

  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
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

var listaproOC = new Array();

$(".codigoproducto").each( function(){
  if ($(this).val().length != 0 ) {
    listaproOC.push(this.value);
};
});

$.ajax({
    type: "POST",
    url: 'ajax_llenar_oc.php',
    data: { 'consulta': listaproOC },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
  for(var i=0;i<data.length; i++)
    {
      $("td[id='exss"+data[i].LUGAR+"']").children().val(data[i].EX);
      $("td[id='precc"+data[i].LUGAR+"']").children().val(data[i].PRECIO);
      $("td[id='cantt"+data[i].LUGAR+"']").children().val(data[i].CANT);
      $("td[id='tott"+data[i].LUGAR+"']").children().val(data[i].PSD);
      $("td[id='descc"+data[i].LUGAR+"']").children().val(data[i].DESCUENTO);
      $("td[id='dess"+data[i].LUGAR+"']").children().val(data[i].DES);
      $("td[id='stockk"+data[i].LUGAR+"']").children().val(data[i].STOCK);
      $("td[id='precll"+data[i].LUGAR+"']").children().val(data[i].PSD);
      $("td[id='ivaa"+data[i].LUGAR+"']").children().val(data[i].PRECIO);
      $("td[id='umm"+data[i].LUGAR+"']").children().val(data[i].UM);

      total();
      final();
    }
}
});




});

</script>

</head>
<body>
  <div id='bread'><div id="menu1"></div></div>
<div class='content'>
<h1 id='titulo_oc'>Orden de compra</h1>
<form action = "scriptOC.php" method="POST" id='formulario' enctype="multipart/form-data">
<table id='form_oc'>
<tr>
<td><input onkeyup="es_vacio2();" placeholder="Proveedor" class='textbox' onblur="es_vacio2();" type="text" id = "proveedor" name="proveedor"/></br>
<input  onkeyup="es_vacio2();" placeholder="Rut Proveedor" class='textbox' onblur="es_vacio2();" type="text" id = "rut_prove" name="rut_prove"/>
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
<td><input placeholder="Fecha Entrega" class='textbox' onkeyup="es_vacio2();" onblur="es_vacio2();" type="text" id = "fechaE" name="fechaE"/></td>
</tr>

<tr>
<td><textarea class='textbox' readonly="readonly" id = "proveedor1" rows="7" cols="25"></textarea></td>
<td><input type="text" class='textbox' id = "despachar1" name="despachar1"/><br />
<input type="text" class='textbox' id = "despachar_nombre" name="despachar_nombre"/><br />
<input type="text" class='textbox' id = "despachar_direccion" name="despachar_direccion"/><br />
<input type="text" class='textbox' id = "despachar_comuna" name="despachar_comuna"/><br />
<input type="text" class='textbox' id = "despachar_telefono" name="despachar_telefono"/></td>
<td> <input class='textbox' type="text" id = "fecha" name="fecha" value = "<?php echo date("Y-m-d")?>"/> </td>
<td ><select  class='textbox' onchange="seleccion1()" id = "cond" name = "cond">
<option> Condiciones Pag </option>
<option> A Definir </option>
</select>
</br>
<input class='textbox' type="text" id = "condicion" name="condicion"/></td>
</tr>


<tr> 
<td> 
<select class='textbox' id='prooc' name='prooc'>
<option>MULTIOFICINA</option>
<option>MUEBLES Y DISEÑOS</option>
<option>SILLAS Y SILLAS</option>
<option>TRANSPORTE JJ </option>
<option>WELLPLACE</option>
<option>ZILLA.CL</option>
<option>GR ASESORIAS Y CONSULTORIAS SPA</option>
</select>
</td>
<td> 
<input placeholder="Reclamo" class='textbox' type = "text" id="reclamo" name="reclamo" />
</td>
</tr> 

<tr>
<td> 
<input placeholder="Rocha" class='textbox' type = "text" id="rochapri" name="rochapri" />
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
<option value="">Sub Actividad </option>
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
<table width="100%" frame="box" rules="all" id='OC' cellspacing=0 cellpadding=0> 
<tr>
<th  width="70" height="40">Codigo</th>
<th  width="70" height="40">rocha</th>
<th  width="70" height="40">Existe Rocha</th>
<th  width="310" height="40">Descripcion</th>
<th  width="80" height="40">Obs</th>
<th  width="80" height="40">Existe</th>
<th  width="80" height="40">Stock</th>
<th  width="40" height="40">Cant.</th>
<th  width="30" height="40">U/M</th>
<th  width="80" height="40">Precio B</th>
<th  width="55" height="40">Pre/U.</th>
<th  width="80" height="40">Precio l</th>
<th  width="55" height="40">Desc</th>
<th  width="80" height="40">Total</th>
</tr>
<?php
$contador = 1;

if ( empty($_POST['proaoc']) ) {
  
 while($contador < 76)
  {

  echo "<tr><td height='30' style ='background:#fff;'> <input autocomplete='off' ondblclick='limpiar(this.id);' onblur='final();vagregar(this.id);' class='form1 codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></td> 
  <td height='30'> <input autocomplete='off'  class='form8 proyecto' name =roch".$contador." id =roch".$contador." onblur='vagregar1(this.id);' type = 'text' value = '' /></td>
  <td height='30'><input class='form9' id=resultador".$contador." type = 'text' value = '' /></td>  
  <td height='30'><input autocomplete='off' ondblclick='dialog_submit(this.value);mostrar();' onblur='final();vagregar(this.id);' class='form2 descripcion' name =des".$contador." id =des".$contador." type = 'text' value = '' /></td>
  <td height='30'><input class='form9' name =obs".$contador."  id =obs".$contador." type = 'text' value = '' /></td>
  <td height='30'><input class='form9' id =exs".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;'><input class='form10' name =stock".$contador." id =stock".$contador." type = 'text' value = '' /></td>
  <td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '' /></td>
  <td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =um".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;'><input class='form4' name =prec".$contador." id =prec".$contador." type = 'text' value = '' /></td> 
  <td height='30' style ='background:#CCC;'> <input class='form6' name =iva".$contador." id =iva".$contador." type = 'text' value = '' /></td>
  <td height='30'> <input onblur='total();final();' onkeydown='total();final();' class='form11' id =precl".$contador." name =precl".$contador." type = 'text' value = '' />
  <td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form5' id =desc".$contador." name =desc".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;'><input class='form7' name =tot".$contador." id =tot".$contador." type = 'text' value = '' /></td></tr>";    
  
   $contador++; 
  }

}else{

$LISTAPRODUCTOS = array();

$i = 1;

foreach ($_SESSION['prooc'] as $key => $value) {

$LISTAPRODUCTOS[$i] = $key;

$i++;
}

 while($contador < 76)
  {

  echo  (empty($LISTAPRODUCTOS[$contador]))  ?  "<tr><td height='30' style ='background:#fff;'> <input autocomplete='off' ondblclick='limpiar(this.id);' onblur='final();vagregar(this.id);' class='form1 codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></td><td height='30'> <input autocomplete='off'  class='form8 proyecto' name =roch".$contador." id =roch".$contador." onblur='vagregar1(this.id);' type = 'text' value = '' /></td>
<td height='30'><input class='form9' id=resultador".$contador." type = 'text' value = '' /></td>  
<td height='30'><input autocomplete='off' ondblclick='dialog_submit(this.value);mostrar();' onblur='final();vagregar(this.id);' class='form2 descripcion' name =des".$contador." id =des".$contador." type = 'text' value = '' /></td>
<td height='30'><input class='form9' name =obs".$contador."  id =obs".$contador." type = 'text' value = '' /></td>
<td height='30'><input class='form9' id =exs".$contador." type = 'text' value = '' /></td>
<td height='30' style ='background:#CCC;'><input class='form10' name =stock".$contador." id =stock".$contador." type = 'text' value = '' /></td>
<td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '' /></td>
<td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form3' id =um".$contador." type = 'text' value = '' /></td>
<td height='30' style ='background:#CCC;'><input class='form4' name =prec".$contador." id =prec".$contador." type = 'text' value = '' /></td> 
<td height='30' style ='background:#CCC;'> <input class='form6' name =iva".$contador." id =iva".$contador." type = 'text' value = '' /></td>
<td height='30'> <input onblur='total();final();' onkeydown='total();final();' class='form11' id =precl".$contador." name =precl".$contador." type = 'text' value = '' />
<td height='30'><input onblur='total();final();' onkeydown='total();final();' class='form5' id =desc".$contador." name =desc".$contador." type = 'text' value = '' /></td>
<td height='30' style ='background:#CCC;'><input class='form7' name =tot".$contador." id =tot".$contador." type = 'text' value = '' /></td></tr>"   : "<tr><td    height='30' style ='background:#fff;'> <input autocomplete='off' ondblclick='limpiar(this.id);' onblur='final();vagregar(this.id);' class='form1 codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '".$LISTAPRODUCTOS[$contador]."' /></td><td height='30'> <input autocomplete='off'  class='form8 proyecto' name =roch".$contador." id =roch".$contador." onblur='vagregar1(this.id);' type = 'text' value = '' /></td>
  <td height='30'><input class='form9' id=resultador".$contador." type = 'text' value = '' /></td>  
  <td height='30' id='dess".$LISTAPRODUCTOS[$contador]."' ><input autocomplete='off' ondblclick='dialog_submit(this.value);mostrar();' onblur='final();vagregar(this.id);' class='form2 descripcion' name =des".$contador." id =des".$contador." type = 'text' value = '' /></td>
  <td height='30'><input class='form9' name =obs".$contador."  id =obs".$contador." type = 'text' value = '' /></td>
  <td height='30' id='exss".$LISTAPRODUCTOS[$contador]."' ><input class='form9' id =exs".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;' id='stockk".$LISTAPRODUCTOS[$contador]."' ><input class='form10' name =stock".$contador." id =stock".$contador." type = 'text' value = '' /></td>
  <td height='30' id='cantt".$LISTAPRODUCTOS[$contador]."' ><input onblur='total();final();' onkeydown='total();final();' class='form3' id =cant".$contador." name =cant".$contador." type = 'text' value = '' /></td>
  <td height='30' id='umm".$LISTAPRODUCTOS[$contador]."' ><input onblur='total();final();' onkeydown='total();final();' class='form3' id =um".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;' id='precc".$LISTAPRODUCTOS[$contador]."' ><input class='form4' name =prec".$contador." id =prec".$contador." type = 'text' value = '' /></td> 
  <td height='30' style ='background:#CCC;' id='ivaa".$LISTAPRODUCTOS[$contador]."' > <input class='form6' name =iva".$contador." id =iva".$contador." type = 'text' value = '' /></td>
  <td height='30' id='precll".$LISTAPRODUCTOS[$contador]."' > <input onblur='total();final();' onkeydown='total();final();' class='form11' id =precl".$contador." name =precl".$contador." type = 'text' value = '' />
  <td height='30' id='descc".$LISTAPRODUCTOS[$contador]."' ><input onblur='total();final();' onkeydown='total();final();' class='form5' id =desc".$contador." name =desc".$contador." type = 'text' value = '' /></td>
  <td height='30' style ='background:#CCC;' id='tott".$LISTAPRODUCTOS[$contador]."' ><input class='form7' name =tot".$contador." id =tot".$contador." type = 'text' value = '' /></td></tr>"; 

   $contador++; 
  }

}

?>
<tr>
<td colspan="12" > Observacion: </td>
</tr>
<tr>
<td colspan="12" rowspan="7"><textarea rows="10" name = "obsgeneral" id = "obsgeneral" ></textarea></td>
<td width="55" height="30"> Sub-tot </td>
<td width="90" height="30"><input onblur="total();final();" onkeydown="total();final();"class = "forma" type="text" id = "sub1" name="sub1"/> </td>
</tr>
<tr>
<td width="55" height="30"> Descuento %</td>
<td width="90" height="30"><input onblur="total();final();" onkeydown="total();final();" class = "forma" type="text" id = "descuento1" name="descuento1" value=""/> </td>
</tr>
<tr>
<td width="55" height="30"> Descuento pesos</td>
<td width="90" height="30"><input onblur="total();final();" onkeydown="total();final();" class = "forma" type="text" id = "descuento2" name="descuento2" value=""/> </td>
</tr>
<tr>
<td width="55" height="30"> neto</td>
<td width="80" height="30"><input onblur="total();final();" onkeydown="total();final();"class = "forma" type="text" id = "neto" name="neto"/> </td>
</tr>
<tr>
<td width="80" height="30">
<select class='textbox' onchange="seleccion1();total();final();" id = "ivaf" name = "ivaf">
<option> Seleccione </option>
<option> Iva Retenido </option>
<option> Iva </option>
<option> Retencion </option>
</select>
</td>
<td>  <input onblur="total();final();" onkeydown="total();final();" class = "forma" type="text" id = "valoriva" name="valoriva" /> </td>
</tr>
<tr>
<td width="55" height="30"> Total</td>
<td width="80" height="30"><input onblur="total();final();" onkeydown="total();final();" class = "forma" type="text" id = "tota" name="tota" /> </td>
</tr>
<tr>
<td width="80" height="30"><input disabled="disabled" onclick="final()" value = "Realizar"  type="submit" id = "cal" name="cal" /> </td>
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
