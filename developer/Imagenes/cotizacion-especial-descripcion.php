<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];

mysql_select_db($database_conn, $conn);

$CODIGO_TI= $_GET['CODIGO_TI'];


$query_registro = "select empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$numero++;
  }
mysql_free_result($result1);

$sql1 = "SELECT * FROM cotizacion_producto_especial WHERE ID = '".$CODIGO_TI."' ORDER BY ID DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
    $ID = $row["ID"];
    $CODIGO_RADICADO= $row['CODIGO_RADICADO'];
    $CLIENTE= $row['CLIENTE'];
    $RUT_CLIENTE = $row['RUT_CLIENTE'];
    $CODIGO_PRODUCTO = $row['CODIGO_PRODUCTO'];
    $CANTIDAD_MUEBLES = $row['CANTIDAD_MUEBLES'];
    $OBSERVACIONES = $row['OBSERVACIONES'];
    $VALOR_VENTA = $row['VALOR_VENTA'];
    $COSTO_PRODUCCION = $row['COSTO_PRODUCCION'];
    $FECHA_CONFIRMACION = $row['FECHA_CONFIRMACION'];
    $FECHA_INGRESO = $row['FECHA_INGRESO'];;
    $FECHA_ENTREGA = $row['FECHA_ENTREGA'];
    $TIPO_MUEBLE = $row['TIPO_MUEBLE'];
    $COTIZADOR = $row['COTIZADOR'];
    $DIRECTOR_PROYECTO = $row['DIRECTOR_PROYECTO'];
    $DIAS = $row['DIAS'];
    $EMPRESA = $row['EMPRESA'];
    $ESTADO = $row['ESTADO']; 
    $DISENADOR = $row['DISENADOR']; 
    $CANTIDAD_ITEM = $row['CANTIDAD_ITEM']; 
  }

  mysql_free_result($result2);


$query = "SELECT * FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
$result2 = mysql_query($query, $conn) or die(mysql_error());
$numero = 0;
$GRP = "";
$GRP1 = "";
$GRP2 = "";
$GRP3 = "";
 while($row = mysql_fetch_array($result2))
  {
	if($numero == 0)
	{
	$GRP = $row["INICIALES_GRUPO"];
	}
	if($numero == 1)
	{
	$GRP1 = $row["INICIALES_GRUPO"];
	}
	if($numero == 2)
	{
	$GRP2 = $row["INICIALES_GRUPO"];
	}
	if($numero == 3)
	{
	$GRP3 = $row["INICIALES_GRUPO"];
	}
	$numero++;
  }
 mysql_free_result($result2);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Cotizacion Descripcion V1.0.0</title>

  <link rel="stylesheet" type="text/css" href="Style/formulario.css" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>


  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
  function validar_monto(evt) {
  var keyPressed = (evt.which) ? evt.which : event.keyCode
  return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));
  }

  $(function(){
	$('#txt_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
  function(event, ui)
  {
    $('#txt_rut').slideUp('slow', function()
		{
      $('#txt_rut').val(
      ui.item.rut);
		});
    $('#txt_rut').slideDown('slow');
		
    $('#txt_contacto').slideUp('slow', function()
	  {
        $('#txt_contacto').val(
        ui.item.contacto);
		});
    $('#txt_contacto').slideDown('slow');
	   
    $('#txt_fono').slideUp('slow', function()
		{
    $('#txt_fono').val(
    ui.item.fono);});
                       
    $('#txt_fono').slideDown('slow');
    }
    });
		});		
	
	

  
  
  function dias2()
  {
    var fecha1= document.getElementById('txt_ent').value;
    var dia1= fecha1.substr(8,2);
    var mes1= fecha1.substr(5,2);
    var mes1a= parseInt(mes1) - 1;
    var anyo1= fecha1.substr(0,4);
    var fecha2= document.getElementById('txt_con').value;
    var dia2= fecha2.substr(8,2);
    var mes2= fecha2.substr(5,2);
    var mes2a= parseInt(mes2) - 1;
    var anyo2= fecha2.substr(0,4);
    var fechita = anyo1+","+mes1+","+dia1;
    var nuevafecha1= new Date(anyo1,mes1a,dia1);
    var nuevafecha2= new Date(anyo2,mes2a,dia2);
    var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
    var dias= Math.floor(Dif/(1000*24*60*60));
    fecha_texto = anyo1+"-"+mes1a+"-"+dia1;
    ms = Date.parse(fecha1);  
    diasem =  new Date(ms).getDay();
    dias = dias ;
    final = 0;
    inicio=0;

  while(inicio < dias)
  {
	 if(diasem == 6 )
	 {
		  diasem=-1;
	 }
	 else if( diasem == 0)
	 {
		
	 }
	 else
	 {
		final++;
	 }
	   inicio++;
	   diasem++;
  }
  document.getElementById('txt_dias').value=final; 
  }

  function myFunction()
  {
    contador = 1;
    while(contador < 50)
    {
      var con = document.getElementById("con" + contador);	

      if(con.style.display == 'none') 
    {
	     con.style.display = '';
	     contador = contador + 50;
    }
      contador++;
    }
  }
   </script>
</head>
<body>

<div id='bread'><div id="menu1"></div></div>

<form enctype="multipart/form-data" action="scriptCotizacionEspecialActualizar.php" method="post" name="formulario">



<input id="txt_ing" name="txt_ing" type ="hidden" value="<?php echo $FECHA_INGRESO?>">
<input id="txt_id"  name="txt_id" type ="hidden" value="<?php echo $ID?>" />

<div class="formulario">
  <h1> Descripción Cotización</h1>
<table>
<tr>
  <td class="color" >Radicado</td>
  <td  ><input  id="txt_radicado"  name="txt_radicado" type ="text" value="<?php echo $CODIGO_RADICADO;?>" /></td>
  <td class="color" >Producto</td>
  <td ><input   id="txt_producto"  name="txt_producto" type ="text" value="<?php echo $CODIGO_PRODUCTO?>" /></td>
</tr>
   
<tr>
  <td class="color">Cliente</td>
  <td ><input id="txt_cliente" name="txt_cliente" type ="text"   value="<?php echo $CLIENTE?>"></td>
  <td class="color">Director Proyecto</td>
  <td ><select name="txt_director" id="txt_director" type ="text"  >
  <option><?php echo $DIRECTOR_PROYECTO ?> </option>
  <?php 
  $query_registro = 
  "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
  grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
  $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result1))
  {
  ?>
  <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres']. " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
  <?php 
  } mysql_free_result($result1);
  ?> 
  </select></td>
  </tr>
  
<tr>
  <td class="color">Rut</td>
  <td ><input id="txt_rut" name="txt_rut" type ="text"     value="<?php echo $RUT_CLIENTE ?>"></td>
  <td class="color">Cantidad Muebles</td>
  <td  ><input id="txt_cantidad" name="txt_cantidad" type ="text"    value="<?php echo $CANTIDAD_MUEBLES ?>"></td>
</tr>
  
<tr>
  <td class="color">Tipo Mueble</td>
  <td ><input id="txt_tipo" name="txt_tipo" type ="text"    value="<?php echo $TIPO_MUEBLE ?>"></td>
  <td class="color">Observacion</td>
  <td ><input id="txt_obs" name="txt_obs" type ="text"   value="<?php echo $OBSERVACIONES ?>"></td>
</tr>
    
<tr>
  <td class="color">Valor Venta</td>
  <td  ><input onkeypress="return validar_monto(event)"  id="txt_valor"  name="txt_valor" type ="text" value="<?php echo number_format($VALOR_VENTA, 0, ",", ".") ?>" /></td>
  <td class="color">Costo Producción</td>  
  <?php if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
  {?>
  <td class="color"><input readonly="readonly"   id="txt_costo" onkeypress="return validar_monto(event)"  name="txt_costo" type ="text" value="<?php echo number_format($COSTO_PRODUCCION, 0, ",", ".") ?>" /></td>
  <?php }else { ?>
  <td ><input   id="txt_costo" onkeypress="return validar_monto(event)"  name="txt_costo" type ="text" value="<?php echo number_format($COSTO_PRODUCCION, 0, ",", ".") ?>" /></td>
  <?php }?>
</tr>

<tr>
  <td class="color">Fecha Entrega</td>
  <td ><input id="txt_ent" onblur='dias2();' onchange='dias2();' name="txt_ent" type ="text"     value="<?php echo $FECHA_ENTREGA ?>"></td>
  <td class="color">Fecha Confirmación</td>
  <td  ><input id="txt_con" onblur='dias2();' onchange='dias2();' name="txt_con" type ="text"    value="<?php echo $FECHA_CONFIRMACION ?>"></td>
</tr>

<tr>
  <td class="color">Dias</td>
  <td ><input id="txt_dias" name="txt_dias" type ="text"    value="<?php echo $DIAS ?>"></td>
  <td class="color">Empresa</td>
  <td >
    <select  id="txt_emp" name="txt_emp" type ="text"  >
      <option> <?php echo $EMPRESA  ?> </option>
      <option>Los Conquistadores</option>
      <option>La Dehesa</option>
      <option>Beatriz Gonzalez</option>
      <option>Muebles y Diseños </option>
      <option>Sillas y Sillas</option>
    </select>
  </td>
</tr>

<tr>
  <td class="color">Cotizador</td>
  <td >
    <select id="txt_cotizador"  name="txt_cotizador" type ="text"  >
    <option> <?php echo  $COTIZADOR ?></option>
    <?php 
    $query_registro = 
    "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
    grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'TEC'";
    $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result1))
    {
    ?>
    <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno']. " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
    <?php 
    } mysql_free_result($result1);
   ?> 
    </select>
  </td>
  <td class="color">Estado</td>
    <td >
      <select id="txt_estado" name="txt_estado" >
        <option><?php echo $ESTADO ?></option>
        <option>OK</option>
        <option>Nulo</option>
        <option>En Proceso</option>
        <option>Cotizando</option>
      </select>
    </td>
  </tr>

  <tr>
    <td class="color">Diseñador</td>
    <td  >
        <select name="txt_disenador" id="txt_disenador" type ="text"  >
        <option> <?php echo  $DISENADOR ?></option>
        <?php 
        $query_registro = 
        "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
        grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM'";
        $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
        while($row = mysql_fetch_array($result1))
        {
        ?>
        <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
        <?php 
       } mysql_free_result($result1);
       ?> 
      </select>
      </td>
    <td class="color">Cantidad Item</td>
    <td  ><input id="txt_cantidadi" name="txt_cantidadi" type ="text"    value="<?php echo $CANTIDAD_ITEM; ?>"></td>
  </tr>
   
  </table>


  <input class="boton act" type="submit" value="Actualizar" /> 
  </div>
  </form>

</body>
</html>
