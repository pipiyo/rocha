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
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="ingreso_sin_recargar.js"></script> -->
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
   <script language = javascript>
               

////////////////////////////////////////////////////////////////////////////

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
		  $( "#txt_con").datepicker ({dateFormat: 'yy-mm-dd'});
		   $( "#txt_ent1").datepicker ({dateFormat: 'yy-mm-dd'});
	
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

function seleccion()
{
var licita = document.getElementById('txt_tipo').selectedIndex;



if(licita == '1')
{
	document.getElementById('txt_tipol').disabled = false;
		document.getElementById('txt_tipol').style.background = '#fff';
	document.getElementById('txt_tipol').style.color = '#000';
	document.getElementById('txt_tipol').style.border = '#fff 1px solid';
	document.getElementById('tab').style.background = '#fff';

}
else
{
	document.getElementById('txt_tipol').disabled = true;
		document.getElementById('txt_tipol').style.background = '#ccc';
	document.getElementById('txt_tipol').style.color = '#ccc';
	document.getElementById('txt_tipol').style.border = '#ccc 1px solid';
	document.getElementById('tab').style.background = '#ccc';
}

}


   </script>
</head>
<body>
<div id="main">	
<div id="site_content">
<form enctype="multipart/form-data" action="scriptTiempoEspecial.php" method="post" name="formulario">

<table width="960" frame="box" rules="all">
<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> REGISTRO</b></h3></td>
  <td width="86"  align="center"></td>
  <td width="106"  align="center"></td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b> Tiempo Especial</b></h3></td>
  <td height="25" align="center"></td>
  <td align="center"></td>
</tr>
<tr>
  <td height="29" align="center">Fecha</td>
  <td align="center"><input id="txt_ing" name="txt_ing" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value="<?php echo date("Y-m-d")?>"></td>
</tr>
<tr>
  <td align="center"></td>
  <td align="center"></td>
</tr>
</table>
<br />



  <table width="960" height="133" border="1" rules="all" id= "tabla_descripcion_radicado">
      <tr>
      <td style=" background-color:#FDE9D9;height:25px;">Rocha</td>
      <td ><input  id="txt_radicado"  name="txt_radicado" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td colspan="1" style=" background-color:#FDE9D9">&nbsp;Proyecto</td>
      <td  colspan="3"><input  id="txt_producto"  name="txt_producto" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;" value="" /></td>
      </tr>
   
    <tr>
      <td width="98" style=" background-color:#FDE9D9; height:25px;">&nbsp;Cliente</td>
      <td width='350'><input id="txt_cliente" name="txt_cliente" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"   value=""></td>

      <td width="98" colspan="-1" style=" background-color:#FDE9D9">&nbsp;Director Proyecto</td>
      <td colspan="3"><select name="txt_director" id="txt_director" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:99%;" >
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
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Rut</td>
      <td><input id="txt_rut" name="txt_rut" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      <td colspan="-1" style=" background-color:#FDE9D9">&nbsp;Tiempo producción</td>
      <td colspan="3" ><input onkeypress="return validar_monto(event)" id="txt_cantidad" name="txt_cantidad" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
      </tr>
    <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Licitación</td>
      <td><select onchange="seleccion();" id="txt_tipo" name="txt_tipo" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%">
      <option></option>
      <option>Si</option>
      <option>No</option>
      </select></td>
      <td  colspan="1" style=" background-color:#FDE9D9">&nbsp;Tipo Licitación</td>
      <td style="background:#ccc" id='tab' colspan="3"><select disabled="disabled" onchange="seleccion();" id="txt_tipol" name="txt_tipol" type ="text" style="border:#ccc 1px solid;height:14px; font-size:10px; width:99%; background:#ccc;" >
      <option></option>
      <option>Publica</option>
      <option>Privada</option>
      </select></td>
    </tr>

        <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Fecha Probable</td>
      <td><input id="txt_ent" name="txt_ent" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      <td colspan="1" style=" background-color:#FDE9D9">&nbsp;Fecha Instalación</td>
      <td  colspan="3" ><input id="txt_con" name="txt_con" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value=""></td>
      </tr>
    <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Gestionador</td>
      <td><select name="txt_adm" id="txt_adm" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:99%;" >
<option> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'ADQ'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
      <td colspan="-1" style=" background-color:#FDE9D9">&nbsp;Empresa</td>
      <td colspan="3"> <select  id="txt_emp" name="txt_emp" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%" >
<option> </option>
  <option>Los Conquistadores</option>
      <option>La Dehesa</option>
      <option>Beatriz Gonzalez</option>
      <option>Muebles y Diseños </option>
      <option>Sillas y Sillas</option>
</select></td>
    </tr>
      <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Puesto trabajo</td>
      <td ><input onkeypress="return validar_monto(event)"  id="txt_cotizador"  name="txt_cotizador" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value=""></td>
      <td colspan="-1" style=" background-color:#FDE9D9">&nbsp;Estado</td>
      <td style=" background-color:#ccc;" colspan="3"><input  readonly="readonly" id="txt_estado" name="txt_estado" type ="text" style="border:#ccc 1px solid;height:14px; font-size:10px; width:99%;background-color:#ccc;"  value="En Proceso"></td>
    </tr>
    <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Motivo</td>
      <td  colspan="4"><input id="txt_mot" name="txt_mot" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value=""></td>
 
    </tr>
  <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Fecha Entrega <br /> &nbsp;Solicitud</td>
      <td><input id="txt_ent1" name="txt_ent1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      <td colspan="1" style=" background-color:#FDE9D9"></td>
      <td  colspan="3" ></td>
      
      </tr>
   
    </table>
    </br >
 
    <table width="960"  border="1" rules="all" id= "tabla_descripcion_radicado">
      <tr>
      <td style=" background-color:#066;color:#fff;height:25px;" align="center" > Producto </td>
      <td style=" background-color:#066;color:#fff;height:25px;" align="center" > Cantidad </td>
      <td style=" background-color:#066;color:#fff;height:25px;" align="center" colspan="2" > Linea </td>
      </tr>
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Linea Gerencial</td>
      <td width="350" ><input  id="txt_producto1"  name="txt_producto1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa1" name="txt_lineaa1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Jerez</option>
      <option>Andersen</option>
      <option>Falcon</option>
</select>
<select  id="txt_lineaa1" name="txt_lineab1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Jerez</option>
      <option>Andersen</option>
      <option>Falcon</option>
</select>
<select  id="txt_lineaa1" name="txt_lineac1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Jerez</option>
      <option>Andersen</option>
      <option>Falcon</option>
</select></td>
      </tr>
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Panel Piso-Cielo</td>
      <td width="350" ><input  id="txt_producto2"  name="txt_producto2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa2" name="txt_lineaa2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>

</select>
 <select  id="txt_lineab2" name="txt_lineab2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>

</select>
 <select  id="txt_lineac2" name="txt_lineac2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>

</select></td>
      </tr>
      
    <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Panel Of Abierta</td>
      <td width="350" ><input  id="txt_producto3"  name="txt_producto3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa3" name="txt_lineaa3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
        <option>Critterium</option>

</select>
 <select  id="txt_lineab3" name="txt_lineab3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
        <option>Critterium</option>

</select>
 <select  id="txt_lineac3" name="txt_lineac3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
      <option>Critterium</option>

</select></td>
      </tr>  
      
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Baldosas</td>
      <td width="350" ><input  id="txt_producto4"  name="txt_producto4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa4" name="txt_lineaa4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Tela</option>
      <option>Vidrio</option>
      <option>Laminado Perforado</option>

</select>
 <select  id="txt_lineab4" name="txt_lineab4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Tela</option>
      <option>Vidrio</option>
      <option>Laminado Perforado</option>

</select>
 <select  id="txt_lineac4" name="txt_lineac4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Tela</option>
      <option>Vidrio</option>
      <option>Laminado Perforado</option>

</select></td>
      </tr>   
      
          <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Superficies</td>
      <td width="350" ><input  id="txt_producto5"  name="txt_producto5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa5" name="txt_lineaa5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Formica</option>
      <option>Melamina</option>
      <option>Madera</option>

</select>
 <select  id="txt_lineab5" name="txt_lineab5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Formica</option>
      <option>Melamina</option>
      <option>Madera</option>
      </select>
 <select  id="txt_lineac5" name="txt_lineac5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
 <option>Formica</option>
      <option>Melamina</option>
      <option>Madera</option>
      </select></td>
      </tr>   
      
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Gabinentes</td>
      <td width="350" ><input  id="txt_producto6"  name="txt_producto6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa6" name="txt_lineaa6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>

</select>
 <select  id="txt_lineab6" name="txt_lineab6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
   <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>
      </select>
 <select  id="txt_lineac6" name="txt_lineac6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>
      </select></td>
      </tr> 
      
         <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Repisas</td>
      <td width="350" ><input  id="txt_producto7"  name="txt_producto7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa7" name="txt_lineaa7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>

</select>
 <select  id="txt_lineab7" name="txt_lineab7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
   <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>
      </select>
 <select  id="txt_lineac7" name="txt_lineac7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
  <option>Multiple</option>
      <option>Bozz</option>
      <option>Melamina</option>
      </select></td>
      </tr>   
        
             <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Pedestales</td>
      <td width="350" ><input  id="txt_producto8"  name="txt_producto8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa8" name="txt_lineaa8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>

</select>
 <select  id="txt_lineab8" name="txt_lineab8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
   <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select>
 <select  id="txt_lineac8" name="txt_lineac8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
  <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select></td>
      </tr>   
      
         <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Kardex</td>
      <td width="350" ><input  id="txt_producto9"  name="txt_producto9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa9" name="txt_lineaa9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>

</select>
 <select  id="txt_lineab9" name="txt_lineab9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
   <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select>
 <select  id="txt_lineac9" name="txt_lineac9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
  <option>Multiple</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select></td>
      </tr>   
        
             <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Folderamas</td>
      <td width="350" ><input  id="txt_producto9"  name="txt_producto9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" style=" background-color:#FDE9D9">&nbsp;</td>
      <td colspan="3"> <select  id="txt_lineaa9" name="txt_lineaa9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Italiano</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>

</select>
 <select  id="txt_lineab9" name="txt_lineab9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" >
<option> </option>
  <option>Italiano</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select>
 <select  id="txt_lineac9" name="txt_lineac9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:31%" ><option> </option>
   <option>Italiano</option>
      <option>Bozz Metal</option>
      <option>Melamina</option>
      </select></td>
      </tr>   
      </table>
      
       </br >
      <table width="960"  border="1" rules="all" id= "tabla_descripcion_radicado">
      <tr>
      <td style=" background-color:#066;color:#fff;height:25px;" align="center" colspan="5" > Acabados </td>
      </tr>
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Perfileria</td>
      <td width="350" ><input  id="txt_perfileria"  name="txt_perfileria" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" align="center" style=" background-color:#066;color:#fff;">&nbsp;Tapiz</td>
      <td  width="203" colspan="1" align="center" style=" background-color:#066;color:#fff;">&nbsp;Referencia</td>
      <td  width="203" colspan="1" align="center" style=" background-color:#066;color:#fff;">&nbsp;Color</td>
      </tr>
      
      <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Fórmica</td>
      <td width="350" ><input  id="txt_formica"  name="txt_formica" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" align="center" style=" background-color:#FDE9D9;">&nbsp;Tela Baldosas</td>
      <td  width="203" colspan="1" align="center">&nbsp;<select  id="txt_referencia1" name="txt_referencia1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:95%" ><option> </option>
   <option>Glock</option>
      <option>Escoral Plus</option>
      <option>Venezia</option>
      <option>Atlas TNT</option>
      <option>Génova</option>
      <option>Vento</option>
      <option>Retrait</option>
      <option>Renna</option>
      <option>Pegasso</option>
      <option>Venneto</option>
       <option>Silvana</option>
      <option>Chair</option>
      <option>Michigan</option>
      <option>Tilbury</option>
       <option>Coventry</option>
      <option>Tacto Plus</option>
      <option>Lanna VC</option>
      <option>Marroqui</option>
      </select></td>
      <td  width="203" colspan="1" align="center"><input  id="txt_color1"  name="txt_color1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      </tr>
      
      
       <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Melamina</td>
      <td width="350" ><input  id="txt_melamina"  name="txt_melamina" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" align="center" style=" background-color:#FDE9D9;">&nbsp;Tela Sillas</td>
      <td  width="203" colspan="1" align="center">&nbsp;<select  id="txt_referencia2" name="txt_referencia2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:95%" ><option> </option>
   <option>Glock</option>
      <option>Escoral Plus</option>
      <option>Venezia</option>
      <option>Atlas TNT</option>
      <option>Génova</option>
      <option>Vento</option>
      <option>Retrait</option>
      <option>Renna</option>
      <option>Pegasso</option>
      <option>Venneto</option>
       <option>Silvana</option>
      <option>Chair</option>
      <option>Michigan</option>
      <option>Tilbury</option>
       <option>Coventry</option>
      <option>Tacto Plus</option>
      <option>Lanna VC</option>
      <option>Marroqui</option>
      </select></td>
      <td  width="203" colspan="1" align="center"><input  id="txt_color2"  name="txt_color2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      </tr>
      
         <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Madera</td>
      <td width="350" ><input  id="txt_madera"  name="txt_madera" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" align="center" style=" background-color:#FDE9D9;">&nbsp;Tela Paneles</td>
      <td  width="203" colspan="1" align="center">&nbsp;<select  id="txt_referencia3" name="txt_referencia3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:95%" ><option> </option>
   <option>Glock</option>
      <option>Escoral Plus</option>
      <option>Venezia</option>
      <option>Atlas TNT</option>
      <option>Génova</option>
      <option>Vento</option>
      <option>Retrait</option>
      <option>Renna</option>
      <option>Pegasso</option>
      <option>Venneto</option>
       <option>Silvana</option>
      <option>Chair</option>
      <option>Michigan</option>
      <option>Tilbury</option>
       <option>Coventry</option>
      <option>Tacto Plus</option>
      <option>Lanna VC</option>
      <option>Marroqui</option>
      </select></td>
      <td  width="203" colspan="1" align="center"><input  id="txt_color3"  name="txt_color3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      </tr>
      
         <tr>
      <td width="98" style=" background-color:#FDE9D9;height:25px;">Vidrio</td>
      <td width="350" ><input  id="txt_vidrio"  name="txt_vidrio" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      <td width="98" colspan="1" align="center" style=" background-color:#FDE9D9;"></td>
      <td  width="203" colspan="1" align="center"></td>
      <td  width="203" colspan="1" align="center"></td>
      </tr>
      
      
      
      </table>
      
  <div style="width:960px; padding-bot:10px; ">
   <input  style="float:right;width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" type="button" value="Ingresar" /> 
  
  </form>
  </div>
  
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
