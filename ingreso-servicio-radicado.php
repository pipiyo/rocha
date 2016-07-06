<?php require_once('Conexion/Conexion.php');  

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$CODIGO_PROYECTO = $_GET['CODIGO_RADICADO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Ingreso Servicio Radicado V1.0.0</title>
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
<form  action="script-ingreso-actividad-radicado.php" method="post" name="formulario">

<div id="General">
<table id='encabezado'>

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
      <td width='140' class='color_ti'>Tipo de Servicio</td>
      <td width='340' ><select class='formulario_ingreso_servicio' onchange="seleccion1();" id = "txt_nombre_servicio" name="txt_nombre_servicio">
<option>Visita</option>
<option>Reunion</option>
<option>Planimetria</option>
<option>Cotizacion</option>
<option>Presentacion</option>
<option>TI</option>
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
      <td class='color_ti'>Responsable</td>
      <td >
        <select  type ="text"  id= "txt_supervisor" name = "txt_supervisor" class='formulario_ingreso_servicio'>
        <option value="" selected>Vendedor</option>
<?php 
$query_registro = 
"select DISTINCT empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO IN ('VEN','DAM') ORDER BY empleado.nombres ";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
<option> </option>
</select>





      </td>
      


    </table>
</div>




<input required="required" class='formulario_ingreso_servicio' type="hidden"  id = "txt_Categoria" name="txt_Categoria">





  <div id='button-ingreso-servicio'>
  <input type="submit" value="Ingresar" id='ingreso-servicio'  style=""/>
  </form>
  </div>
      <br />
          <br />  <br />
</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
