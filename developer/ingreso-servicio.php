<?php require_once('Conexion/Conexion.php');  

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO = $_GET['CODIGO_PROYECTO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Ingreso Servicio V1.1.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/jquery-ui-1.8.4.custom.css" />
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />

  <script type="text/javascript" src="js/jquery.ui.datepicker.js"></script> 
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script type="text/javascript" src="js/ingreso-servicio.js"></script>  
  <script src='js/breadcrumbs.php'></script>

  <script language = javascript>

$(document).ready(function(){
$("#txt_nombre_servicio").change( function(e) {
if (this.value == "Despacho"  || this.value == "Instalacion" ) {
$("#txt_direccions").val( $("#DIRECDESPACHO").val() );
}else{
$("#txt_direccions").val("");
};
});
});

  </script>

<link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>
<body>
<div id='bread'><div id="menu1"></div></div>

<div id="main">	
<div id="site_content">
<form  action="script-ingreso-actividad.php" method="post" name="formulario">

<div id="General">
<table id = 'encabezado'>

<?php
$sql = "SELECT DIRECCION_DESPACHO FROM proyecto WHERE CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' ";
$result = mysql_query($sql, $conn) or die(mysql_error());
 while( $row = mysql_fetch_array($result) )
  {
echo "<input style='display:none;' type='text' value='".$row['DIRECCION_DESPACHO']."' id='DIRECDESPACHO' name = 'DIRECDESPACHO' />";
  }
mysql_free_result($result);
?>

<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> </b></h3></td>
  <td width="86"  align="center"></td>
  <td width="106"  align="center"></td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b> INGRESO SERVICIO</b></h3></td>
  <td height="25" align="center">Rocha</td>
  <td align="center"><input class='formulario_ingreso_servicio' type='text' value='<?php echo $CODIGO_PROYECTO ?>' id='CODIGO_PROYECTO' name = 'CODIGO_PROYECTO' /></td>
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
<br />
  <table bordercolor="#ccc"  rules="all" class= "tabla_descripcion_radicado">
    <tr>
      <td width='140' class='color_ti'>Tipo</td>
      <td width='340' ><select class='formulario_ingreso_servicio' onchange="seleccion1();" id = "txt_nombre_servicio" name="txt_nombre_servicio">
<option>Adquisiciones</option>
<option>Produccion</option>
<option>Despacho</option>
<option>Instalacion</option>
<option>Desarrollo</option>
<option>Mantencion</option>
<option>Sillas</option>
<option>Bodega</option>
<option>Sistema</option>
<option>Servicio Tecnico</option>
<option>Prevención de Riesgos</option>
<option>FI</option>
<option>Factura</option>
<option>Nota de Credito</option>
</select> </td>
      <td width='140'  class='color_ti'>Realizador</td>
      <td width='340' ><input class='formulario_ingreso_servicio' type="text" readonly='readonly'  id= "txt_realizador" name = "txt_realizador" value="<?php echo $USUARIO ?>" /></td>
    </tr>
    <tr>
      <td class='color_ti'>Fecha inicio</td>
      <td><input class='formulario_ingreso_servicio' type="text" onClick="fecha11();" onKeyDown="fecha11();" onchange="dias1();"  id= "txt_fechai_servicio" name = "txt_fechai_servicio" value="" /></td>
      <td class='color_ti'>Fecha entrega</td>
      <td  ><input class='formulario_ingreso_servicio' onClick="fecha11();" onchange="dias1();" type="text"  id= "txt_fechae_servicio" name = "txt_fechae_servicio" value="" /> </td>
      </tr>
    <tr>
      <td class='color_ti'>Descripcion</td>
      <td ><textarea class='formulario_ingreso_serviciot' rows="2" id="txt_descripcion_s" name = "txt_descripcion_s"></textarea></td>
      <td class='color_ti'>Observaciones</td>
      <td><textarea class='formulario_ingreso_serviciot' rows="2"  id="txt_observaciones_s" name = "txt_observaciones_s"></textarea></td>
     
    </tr>
    <tr>
      <td class='color_ti'>Dias</td>
      <td ><input class='formulario_ingreso_servicio' readonly type="text" onchange="dias1();"  id= "txt_cantidad_dias" name = "txt_cantidad_dias" value="" /> </td>
      <td class='color_ti'>Reclamos</td>
      <td ><input class='formulario_ingreso_servicio'  type="text"  id= "txt_reclamos" name = "txt_reclamos" value="" /> </td>
      </tr>
    <tr>
      <td class='color_ti'>Supervisor</td>
      <td ><input class='formulario_ingreso_servicio' type="text"  id= "txt_supervisor" name = "txt_supervisor" value="" /></td>
      <td class='color_ti'>Categoria</td>
      <td ><select required="required" class='formulario_ingreso_servicio' onChange="habilitarpro();habilitarpros();" onBlur="habilitarpro();habilitarpros();"  id = "txt_Categoria" name="txt_Categoria">
<option></option>
<option>Proceso</option>
<option>Proyecto</option>
<option>Solicitud</option>
</select> </td>
      </tr>

    <tr>
      <td class='color_ti'>FI</td>
      <td ><input onKeyPress="return justNumbers(event);" class='formulario_ingreso_servicio' type="text"  id= "txt_fi" name = "txt_fi" value="" /></td>
      <td class='color_ti'></td>
      <td > </td>
    </tr>
    </table>
</div>
<?php
  if(substr($CODIGO_PROYECTO,0,1) == 'M')
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_md ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);
  }
  else if(substr($CODIGO_PROYECTO,0,1) == 'S')
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_si ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);
  }
  else 
  {
    $CODIGO_GUIA = 0;
    $sql1 = "SELECT * FROM guia_despacho_mu ORDER BY CODIGO_GUIA DESC LIMIT 1";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
    $CODIGO_GUIA = $row["CODIGO_GUIA"];
    }
    mysql_free_result($result2);
  }
?>


<div id="Despacho" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Guia de despacho <input onclick="guia();" type="checkbox" id="valguia" name="valguia" value="si"></td> 
<td width='340'><input disabled class='formulario_ingreso_servicio' type="text"  id= "txt_guia" name = "txt_guia" value="<?php echo $CODIGO_GUIA + 1 ?>" /> </td>
<td width='140' class='color_ti'>Vehiculo</td>
<td width='340'><select class='formulario_ingreso_servicio' id = "txt_transporte" name="txt_transporte">
<option></option>
<option>CBWT-96 (Camion 1)</option>
<option>CRBC-30 (Camion 2)</option>
<option>FXVD-65 (Camion 3)</option>
<option>CFDL-32 (Furgon 1)</option>
<option>FYYC-66 (Furgon 2)</option>
<option>DDVG-61 (Camioneta)</option>
<option>Externo</option>
</select> </td>

</tr>
</table>
</div> 




<div id="Instalacion" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Lider 1</td> 
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "lider" name = "lider" value="" /> </td>
<td width='140' class='color_ti'>Puestos</td> 
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "puestos" name = "puestos" value="" /> </td>
</tr>
<tr>
   <td width='140' class='color_ti'>Instalador 1</td> 
<td><input class='formulario_ingreso_servicio' type="text"  id= "ins1" name = "ins1" value="" /> </td>
 <td width='140' class='color_ti'>Instalador 2</td> 
<td ><input class='formulario_ingreso_servicio' type="text"  id= "ins2" name = "ins2" value="" /> </td>
</tr>
<tr>
   <td width='140' class='color_ti'>Instalador 3</td> 
<td><input class='formulario_ingreso_servicio' type="text"  id= "ins3" name = "ins3" value="" /> </td>
 <td width='140' class='color_ti'>Instalador 4</td> 
<td><input class='formulario_ingreso_servicio' type="text"  id= "ins4" name = "ins4" value="" /> </td>
</tr>
<tr>
 <td width='140' class='color_ti'>Proceso</td>
<td>
<select class='formulario_ingreso_servicio' disabled  id = "txt_procesoi" name="txt_procesoi" >
<option value="">Proceso</option>
<option>Instalación</option>
<option>Servicio Técnico</option>
<option>Otros</option>
</select> </td>
<td width='140' class='color_ti'></td>
<td>
</td> 
</tr>
</table>
</div>


<div id="Servicio" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Tipo Servicio</td>
<td width='340'><select class='formulario_ingreso_servicio' onchange="seleccion();" id = "txt_servicio" name="txt_servicio">
<option>Servicio Tecnico </option>
<option>Garantia</option></select> </td>
<td width='140'  class='color_ti'>N° Documento</td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_documento" name = "txt_documento" value="" /> </td>
</tr>
<tr>
<td  class='color_ti'>Tecnico3</td>
<td><input class='formulario_ingreso_servicio' type="text"  id= "tec1" name = "tec1" value="" /> </td>
<td  class='color_ti'>Tecnico2</td>
<td><input class='formulario_ingreso_servicio' type="text"  id= "tec2" name = "tec2" value="" /> </td>
</tr>
</table>
</div>


<div id="Sillas" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Ejecutor</td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_ejecutors" name = "txt_ejecutors" value="" /> </td>
<td width='140' class='color_ti'>OC</td>
<td width='340'><input  class='formulario_ingreso_servicio'  type="text"  id= "txt_proocs" name = "txt_proocs" value="" /> </td>
</tr>
<tr>
  <td width='140' class='color_ti'>Proceso</td>
  <td width='340'><select class='formulario_ingreso_servicio' disabled id = "txt_procesos" name="txt_procesos">
<option></option>
<option>ARMADO SILLA</option>
<option>TAPIZADO</option>
<option>RETAPIZADO</option>
<option>TAPIZADO BALDOSA</option>
<option>TAPIZADO PANTALLA</option>
<option>LIMPIEZA SILLAS</option>
</select> </td>
<td width='140' class='color_ti'>Cantidad</td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_cants" name = "txt_cants" value="" /> </td>
</tr>
</table>
</div>




<div  id="Produccion" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Ejecutor</td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_ejecutor" name = "txt_ejecutor" value="" /> </td>
<td width='140' class='color_ti'>OC</td>
<td width='340'><input class='formulario_ingreso_servicio'  type="text"  id= "txt_prooc" name = "txt_prooc" value="" /> </td>
</tr>
<tr>
<td width='140' class='color_ti'>Proceso</td>
<td>
<select class='formulario_ingreso_servicio' disabled  id = "txt_proceso" name="txt_proceso" >
<option>Armado</option>
<option>Barniz</option>
<option>Centro De Mecanizado</option>
<option>Corte</option>
<option>Enchape Curvo</option>
<option>Enchape Recto</option>
<option>Laminado</option>
<option>Limpieza</option>
<option>Mueble Especiales</option>
<option>Perforador Multiple</option>
<option>Ruteado</option>
</select> </td>
<td width='140' class='color_ti'>Cantidad </td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_cant" name = "txt_cant" value="" /> </td>
</tr>
<tr>
<td width='140' class='color_ti'>Vale</td>
<td width='340'><input readonly  class='formulario_ingreso_servicio' type="text" onblur='botonmas();'  id= "txt_vale" name = "txt_vale" value="" /> </td>
<td width='140' class='color_ti'></td>
<td width='340'></td>
</tr>
</table>

 <?php
$contador = 1;

while($contador < 50)
{
  echo '<div id="con'.$contador.'" style="display:none;">

  <table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
  <tr>
  <td width="140" class="color_ti">Producto</td>
  <td width="340"><input class="formulario_ingreso_servicio" type="text"   id= "txt_producto'.$contador.'" name = "txt_producto'.$contador.'" onclick="completar1(this.id);total();negativo();" onblur="total();negativo()" value="" /> </td>
  <td rowspan="2" width="140" class="color_ti">Cantidad<br>Entregado<br>Solitado</td>
  <td rowspan="2" width="340"><input  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_producto'.$contador.'" name = "txt_cantid_producto'.$contador.'" onblur="total();negativo();" value="0" /> 
  <input readonly  class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productoe'.$contador.'" value="0" />
   <input readonly class="formulario_ingreso_servicio" type="text"   id= "txt_cantid_productos'.$contador.'" value="0" /></td>
  </tr>
  <tr>
    <td width="140" class="color_ti">Codigo</td>
  <td width="340"><input class="formulario_ingreso_servicio" type="text"  id= "txt_codigo'.$contador.'" name = "txt_codigo'.$contador.'" onclick="completar(this.id);total();negativo()" onblur="total();negativo()"  value="" /> </td>
  </tr>
  </table>
  </div>';
    $contador++;
}
?>
 <input style='display:none;' id='mas' type="button" onclick="myFunction()" value="+">

</div>


<div id="Bodega" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
   <td width='140' class='color_ti'>Bodega</td>
<td width='340'><select class='formulario_ingreso_servicio' id = "txt_bodega" name="txt_bodega">
<option></option>
<option>Insumo</option>
<option>Sillas</option>
<option>Despacho</option>
</select> </td>
 <td width='140' class='color_ti'></td>
  <td width='340'></td>
</tr>
</table>
</div>

<div id="factura" style='display:none;'>
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado">
<tr>
<td width='140' class='color_ti'>Factura</td>
<td width='340'><input class='formulario_ingreso_servicio' type="number"  id= "txt_factura" name = "txt_factura" value="" /></td>
<td width='140' class='color_ti'>Monto</td>
<td width='340'><input class='formulario_ingreso_servicio' type="number" step="any"  id= "txt_monto_factura" name = "txt_monto_factura" value="" /></td>
</tr>
</table>
</div>

<div id="desins" style = "display:none;">
<table bordercolor="#ccc"  rules="all" class = "tabla_descripcion_radicado" >
<tr>
<td width='140' class='color_ti'>Direccion</td> 
<td width='340' ><input class='formulario_ingreso_servicio' type="text"  id= "txt_direccions" name = "txt_direccions" value="" /> </td>
<td width='140' class='color_ti'>TP/TM/OS</td>
<td width='340' ><input class='formulario_ingreso_servicio' type="text"  id= "txt_ttf" name = "txt_ttf" value="" /> </td>
</tr>
<tr>
<td width='140' class='color_ti'>Comuna</td>
<td width='340'><input class='formulario_ingreso_servicio' type="text"  id= "txt_comuna" name = "txt_comuna" value="" /> </td>
<td width='140' class='color_ti'>M3</td>
<td width='340'><input class='formulario_ingreso_servicio' step="any" type="number"  id= "txt_m3" name = "txt_m3" value="" /> </td>
</tr>
</table>
</div>
  <div id='button-ingreso-servicio'>
  <input type="submit" value="Ingresar" id='ingreso-servicio'  style=""/>
  </form>
  </div>
      <br />
          <br />  <br />
</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
