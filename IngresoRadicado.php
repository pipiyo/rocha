<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);

$contador = "select CODIGO_RADICADO from radicado";
$result1 = mysql_query($contador, $conn) or die(mysql_error());

$cuenta = 0;

 while($row = mysql_fetch_array($result1))
  {
	$cuenta++;
  }
  mysql_free_result($result1);

  $CLIENTE = "";
  $RUT_CLIENTE = "";
  $OBRA = "";
  $OC = "";
  $DIRECCION_OBRA = "";
  $CONDICION_PAGO = "";
  $DIRECTOR = "";
  $CONTACTO = "";
  $FONO = "";
  $MAIL = "";
  $VALIDEZ = "";
  $SUB_TOTAL = "";
  $DESCUENTO = "";
  $DESCUENTO2 = "";
  $FECHA_INGRESO = "";
  $FECHA_ENTREGA = "";
  $FECHA_CONFIRMACION = "";
  $DIAS = "";
  $DISENADOR = "";
  $ESTADO = "";
  $NETO = "";
  $NETO2 = "";
  $IVA = "";
  $TOTAL = "";
  $TIPO_IVA = "";
  $FECHA_ACTA = "";
  $REPROGRAMACION= "";
  $TIEMPO_ESPECIAL= "";
  $CONVENIR= "";
  $DEPARTAMENTO_CREDITO = "";
  $COLOR = "#E4E2E2";
  $DISABLED ="disabled";

if (isset($_GET["radicado_copia"])) 
{

$contador = "select * from radicado where CODIGO_RADICADO = '".$_GET["radicado_copia"]."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

$cuenta = 0;

 while($row = mysql_fetch_array($result1))
  {
  $CLIENTE = $row["CLIENTE"];
  $RUT_CLIENTE = $row["RUT_CLIENTE"];
  $OBRA = $row["OBRA"];
  $DIRECCION_OBRA = $row["DIRECCION"];
  $OC = $row["OC"];
  $CONDICION_PAGO = $row["CONDICION_PAGO"];
  $DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
  $DIRECTOR = $row["EJECUTIVO"];
  $DISENADOR = $row["DISENADOR"];
  $CONTACTO = $row["CONTACTO"];
  $FONO = $row["FONO"];
  $MAIL = $row["MAIL"];
  $VALIDEZ = $row["VALIDEZ_COTIZACION"];
  $PUESTOS = $row["PUESTOS"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $DESCUENTO = $row["DESCUENTO"];
  $FECHA_INGRESO = $row["FECHA_INGRESO"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $FECHA_CONTACTO = $row["FECHA_CONTACTO"];
  $DIAS_RADICADO = $row["DIAS_RADICADO"];
  $FECHA_INICIOR = $row["FECHA_INICIO_ROCHA"];
  $FECHA_ENTREGAR = $row["FECHA_ENTREGA_ROCHA"];
  $DIAS_ROCHA = $row["DIAS_ROCHA"];
  $ESTADO = $row["ESTADO"];
  $NETO = $row["NETO"];
  $IVA = $row["IVA"];
  $TOTAL = $row["TOTAL"];
  $TIPO_IVA = $row["TIPO_IVA"];
  $DISABLED = "";
  $COLOR = "";
  $DESCUENTO2 = $row["DESCUENTO2"];
  $MONTO2 = $row["MONTO2"];
  }
  mysql_free_result($result1);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Ingresar Radicado V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/Estilo_descripcion_radicado1.css" />

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/comprobar_cliente_radicado.js"></script>
  <script type="text/javascript" src='js/radicado.js'></script>
  <script src='js/breadcrumbs.php'></script>

  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>

<body>

<div id='bread'><div id="menu1"></div></div>

<div id="main">	
<div id="site_content">
<form id="formulariodeingreso" action="scriptIngresoRadicado.php" method="POST">
  <table id= "tabla_descripcion_radicado" width="935">
    <tr>
      <td width="108" rowspan="7" class="color_radicado_a" align="center"><input style="width:100px;" required="required"  type="number"   id= "txt_codigo_radicado" name = "txt_codigo_radicado" value="" />
        <select style="width:103px;" onchange="seleccion();" id = "txt_empresa_radicado" name="txt_empresa_radicado">
        <option>LC</option>
        <option>LD</option>
        <option>SS</option>
        <option>MD</option>
        </select> 
        <input style="width:100px;" required="required"  type="text" name = "txt_nombre_cliente"  id="txt_nombre_cliente" value=""  maxlength="6">
        <span>Convenio Marcos</span><input style="float:right;" type="checkbox" name = "CM"  id="CM" value=""></td>
      <td width="125" class="color_radicado_a">&nbsp;Cliente *</td>
      <td width="139" ><input   id="cliente"   name="cliente"   type ="text"   style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"  value="<?php echo $CLIENTE; ?>"><div id="resultado"  class="nube"></div></td>
      <td width="117" class="color_radicado_a">&nbsp;Director *</td>
      <td width="137"><select name="director" id="director"  type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" >
                        <option> <?php echo $DIRECTOR; ?></option>
                        <?php 
                        $query_registro = 
                        "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
                        grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' ORDER BY empleado.nombres ASC ";
                        $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
                        while($row = mysql_fetch_array($result1))
                        {
                        ?>
                            <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
                        <?php 
                        } mysql_free_result($result1);
                        ?> 
                        </select></td>
        <td width="147" class="color_radicado_a">&nbsp;Fecha de Ingreso *</td> 
        <td width="116"><input onchange="dias();" id="fecha_ingreso" name="fecha_ingreso" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"  value="<?php echo date("Y-m-d H:i:s") ?>"></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;Rut *</td>
      <td><input id="rut" name="rut" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $RUT_CLIENTE ?>"> <div id="resultado2"  class="nube"></div> </td>
      <td class="color_radicado_a">&nbsp;Diseñador *</td>
      <td style="background-color:<?php echo $COLOR; ?>;" >
        <select name="disenador"  id="disenador" <?php echo $DISABLED ?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;background-color:<?php echo $COLOR; ?>;" >
          <option><?php echo $DISENADOR?></option>
          <?php 
          $query_registro = 
          "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
          grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM' ORDER BY empleado.nombres ASC ";
          $result1 = mysql_query($query_registro, $conn) or die(mysql_error());

          while($row = mysql_fetch_array($result1))
          {
          ?>
            <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
          <?php 
          } mysql_free_result($result1);
          ?> 
        </select>
      </td>
      <td class="color_radicado_a">&nbsp;Fecha de Entrega *</td>
      <td><input onchange="dias();" id="fecha_entrega"  name="fecha_entrega" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"  value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;Obra *</td>
      <td><input id="obra" name="obra" type ="text" <?php echo $DISABLED;?>  style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value="<?php echo $OBRA?>"></td>
      <td class="color_radicado_a">&nbsp;Contacto *</td>
      <td><input id="contacto" name="contacto" <?php echo $DISABLED;?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $CONTACTO ?>"></td>
      <td class="color_radicado_a">&nbsp;Dias Radicado *</td>
      <td><input  onchange="dias();" id="dias_radicado"  name="dias_radicado"  type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;Direccion Obra *</td>
      <td><input id="direccion_obra" name="direccion_obra" <?php echo $DISABLED;?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $DIRECCION_OBRA; ?>"></td>
      <td class="color_radicado_a">&nbsp;Fono</td>
      <td><input id="fono" name="fono"<?php echo $DISABLED;?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $FONO; ?>"></td>
      <td class="color_radicado_a">&nbsp;Fecha Contacto *</td>
      <td><input  id="fecha_contacto"  name="fecha_contacto" disabled type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;OC</td>
      <td><input id="oc" name="oc" <?php echo $DISABLED;?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value="<?php echo $OC; ?>"></td>
      <td class="color_radicado_a">&nbsp;Mail</td>
      <td><input id="mail" name="mail" <?php echo $DISABLED;?> type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $MAIL; ?>"></td>
      <td class="color_radicado_a">&nbsp;Fecha Inicio Rocha *</td>
      <td><input onchange="dias2();" id="fecha_inicior" disabled  name="fecha_inicior" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;Condicion de Pago *</td>
      <td><input id="condicion_pago" <?php echo $DISABLED; ?> name="condicion_pago"  type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value="<?php echo $CONDICION_PAGO ?>"></td>
      <td class="color_radicado_a">&nbsp;Validez Cotizacion</td>
      <td><input id="validez" name="validez" disabled type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"  value=""></td>
      <td class="color_radicado_a"><p>&nbsp;Fecha Entrega Rocha *</p></td>
      <td><input onchange="dias2();" id="fecha_entregar" disabled  name="fecha_entregar" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value="" /></td>
    </tr>
    <tr>
      <td class="color_radicado_a">&nbsp;Linea *</td>
      <td style="background-color:<?php echo $COLOR ?>">
        <select <?php echo $DISABLED; ?>  style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;background-color:<?php echo $COLOR ?>;" name="departamento_credito" id="departamento_credito">
          <option><?php echo  $DEPARTAMENTO_CREDITO; ?></option>
          <?php 
          $query_registro = 
          "select * from linea ORDER BY NOMBRE_LINEA ASC";
          $result2 = mysql_query($query_registro, $conn) or die(mysql_error());
          while($row = mysql_fetch_array($result2))
          {
          ?>
            <option value = "<?php echo ($row['NOMBRE_LINEA']); ?>" > <?php echo ($row['NOMBRE_LINEA']); ?> </option>
          <?php 
          } mysql_free_result($result2);
          ?> 
          </select></td>
      <td class="color_radicado_a">&nbsp;Puestos</td>
      <td><input id="puestos" disabled name="puestos" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value=""></td>
      <td class="color_radicado_a">&nbsp;Dias Rocha</td>
      <td><input onchange="dias2();" disabled id="dias_rocha" name="dias_rocha" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value=""></td>
    </tr>    
    <tr>
      <td rowspan="7" style=" background:#576B9C;">&nbsp;</td>
      <td  colspan="4" class="color_radicado_b">&nbsp;Observaciones</td>
      <td class="color_radicado_b">&nbsp;Sub Total *</td>
      <td><input  onchange="totala();" disabled id="sub_total" name="sub_total"  type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" value=""></td>
    </tr>
    <tr>
      <td colspan="4" rowspan="6"> </td>
      <td class="color_radicado_b">&nbsp;Descuento</td>
      <td><input onchange="totala();"  disabled id="descuento" name="descuento" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"    value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_b">&nbsp;Neto</td>
      <td><input id="neto" name="neto" disabled type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" onchange="totala();"  value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_b">
        &nbsp;Impuesto &nbsp; 
        <select  onchange="seleccion()"  style="background:#DFEECC;border:#DFEECC 1px solid;height:14px; font-size:10px;" id = "iva1" name="iva1">
          <option>Seleccione</option>
          <option >Iva Retenido</option>
          <option >Iva</option>
          <option >Retencion</option>
          </select></td>
      <td><input id="iva" disabled name="iva" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"  value=""></td>
    </tr>
    <tr>
      <td class="color_radicado_b">&nbsp;Total</td>
      <td><input id="total" disabled name="total" type ="text" style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;"   value=""></td>
    </tr>
    <tr>
      <td rowspan="2" class="color_radicado_b">&nbsp;Estado *</td>
      <td><select   style="border:transparent 1px solid;height:14px; font-size:10px;width:98%;" id = "estado" name="estado">
            <option>EN PROCESO</option>
            <option>COTIZADO</option>
            <option>ENVIADO</option>
            <option>RECOTIZADO</option>
            <option>PREAPROBADO</option>
            <option>ACEPTADO</option>
            <option>NULO</option>
            <option>COPIAR</option>
            </select></td>
    </tr>
    </table>
  <div  class="botones">
    <input type="submit" id="ingresar"  value="Ingresar"  class="boton">
  </form>
  </div>
        
</div>
</body>
</html>
