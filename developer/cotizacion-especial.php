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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Cotizacion Ingreso V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
                                 ui.item.fono);
							
                       });
                       $('#txt_fono').slideDown('slow');
                   }
                 });
				  });		
	
	
	$(function() 
  {    
        $( "#txt_ent").datepicker ({dateFormat: 'yy-mm-dd'});
		    $( "#txt_ing").datepicker ({dateFormat: 'yy-mm-dd'});
  });
  
  
  
  function dias2()
  {
    var fecha1= document.getElementById('txt_fecha_inicior').value;
    var dia1= fecha1.substr(8,2);
    var mes1= fecha1.substr(5,2);
    var mes1a= parseInt(mes1) - 1;
    var anyo1= fecha1.substr(0,4);
    var fecha2= document.getElementById('txt_fecha_entregar').value;
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
    dias = dias +1;
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

  document.getElementById('txt_dias_rocha').value=final; 

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

<form enctype="multipart/form-data" action="scriptCotizacionEspecial.php" method="post" name="formulario">

  <input id="txt_ing" name="txt_ing" type ="hidden" value="<?php echo date("Y-m-d")?>">

  <div class="formulario">
  <h1> Ingreso Cotización Especial</h1>

  <table bordercolor='#ccc' width="960" height="133" border="1" rules="all" id= "tabla_descripcion_radicado">
    <tr>
      <td class="color">Radicado</td>
      <td><input  id="txt_radicado"  name="txt_radicado" type ="text"  value="" /></td>
      <td class="color">Producto</td>
      <td class="color-disabled" ><input readonly="readonly"  id="txt_producto"  name="txt_producto" type ="text" value="" /></td>
    </tr>

    <tr>
      <td class="color">Cliente</td>
      <td><input id="txt_cliente" name="txt_cliente" type ="text"    value=""></td>
      <td class="color">Director Proyecto</td>
      <td ><select name="txt_director" id="txt_director" type ="text" >
                      <option> </option>
                      <?php 
                      $query_registro = 
                      "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
                      grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
                      $result1 = mysql_query($query_registro, $conn) or die(mysql_error());

                      while($row = mysql_fetch_array($result1))
                      {
                      ?>
                      <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
                      <?php 
                      } mysql_free_result($result1);
                      ?> 
                      </select></td>
    </tr>

    <tr>
      <td class="color">Rut</td>
      <td><input id="txt_rut" name="txt_rut" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      <td class="color">Cantidad Muebles</td>
      <td><input id="txt_cantidad" name="txt_cantidad" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
    </tr>

    <tr>
      <td class="color">Tipo Mueble</td>
      <td><input id="txt_tipo" name="txt_tipo" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
      <td class="color">Observacion</td>
      <td ><input id="txt_obs" name="txt_obs" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"  value=""></td>
    </tr>

    <tr>
      <td class="color">Valor Venta</td>
      <td class="color-disabled" ><input  readonly="readonly" onkeypress="return validar_monto(event)"  id="txt_valor"  name="txt_valor" type ="text"  value="" /></td>
      <td class="color">Costo Producción</td>
      <td class="color-disabled" ><input readonly="readonly"   id="txt_costo" onkeypress="return validar_monto(event)"  name="txt_costo" type ="text" class="color-disabled" value="" /></td>
    </tr>

    <tr>
      <td class="color">Fecha Entrega</td>
      <td><input id="txt_ent" name="txt_ent" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      <td class="color">Fecha Confirmación</td>
      <td class="color-disabled" ><input readonly="readonly"  name="txt_con" type ="text"   value=""></td>
    </tr>

    <tr>
      <td class="color">Dias</td>
      <td class="color-disabled" ><input readonly="readonly" id="txt_dias" name="txt_dias" type ="text"  value=""></td>
      <td class="color">Empresa</td>
      <td > <select  id="txt_emp" name="txt_emp" type ="text" >
                      <option> </option>
                      <option>Los Conquistadores</option>
                      <option>La Dehesa</option>
                      <option>Beatriz Gonzalez</option>
                      <option>Muebles y Diseños </option>
                      <option>Sillas y Sillas</option>
                      </select></td>
    </tr>

    <tr>
      <td class="color">Cotizador</td>
      <td class="color-disabled" ><input readonly="readonly" id="txt_cotizador"  name="txt_cotizador" type ="text" value=""></td>
      <td class="color">Estado</td>
      <td class="color-disabled" ><input  readonly="readonly" id="txt_estado" name="txt_estado" type ="text" value="En Proceso"></td>
    </tr>

    <tr>
      <td class="color">Diseñador</td>
      <td  ><select name="txt_disenador" id="txt_disenador" type ="text" >
      <option> </option>
      <?php 
      $query_registro = 
      "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
      grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM'";
      $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result1))
      {
      ?>
      <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno']. " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno']. " ".$row['apellido_materno']; ?> </option>
      <?php 
      } mysql_free_result($result1);
      ?> 
      </select></td>
      <td class="color">Cantidad Item</td>
      <td  ><input id="txt_cantidadi" name="txt_cantidadi" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
    </tr>
  
    </table>
  
   <input class="boton act" type="submit" value="Ingresar" /> 
  </div>
  </form>
 
  
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
