<?php require_once('Conexion/Conexion.php'); ?>
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
date_default_timezone_set("Chile/Continental");
mysql_select_db($database_conn, $conn);
////////////////////////////////////
/////////////////////////////////////
////////////////////////////////
//////////////////////////////

	$CLIENTE = "";
	$RUT_CLIENTE = "";
	
	$DIRECCION_OBRA = "";
	$OC = "";
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

	$ENCARGADO= "";
	$NOMBRE_PROYECTO= "";




if (isset($_GET["ROCHACOPIA"])) 
{
///////////////////////////////
$ROCHACOPIA = $_GET['ROCHACOPIA'];
///////////////////////////////////

$contador = "select * from proyecto where CODIGO_PROYECTO = '".$ROCHACOPIA."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {

	$CLIENTE = $row["NOMBRE_CLIENTE"];
	$RUT_CLIENTE = $row["RUT_CLIENTE"];
	
	$DIRECCION_OBRA = $row["DIRECCION_FACTURACION"];
	$OC = $row["ORDEN_CC"];
	$CONDICION_PAGO = $row["CONDICION_PAGO"];
	
	$DIRECTOR = $row["EJECUTIVO"];
	
	$CONTACTO = $row["CONTACTO"];
	$FONO = $row["FONO"];
	$MAIL = $row["MAIL"];
	$VALIDEZ = $row["VALIDEZ_COTIZACION"];
	
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$DESCUENTO = $row["DESCUENTO"];
	$DESCUENTO2 = $row["DESCUENTO2"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	//$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$DIAS = $row["DIAS"];
	$ESTADO = $row["ESTADO"];
	$NETO = $row["MONTO"];
	$NETO2 = $row["MONTO2"];
	$IVA = $row["IVA"];
	$TOTAL = $row["TOTAL"];
	$TIPO_IVA = $row["TIPO_IVA"];
	$FECHA_ACTA = $row["FECHA_ACTA"];
	$REPROGRAMACION= $row["REPROGRAMACION"];
	$TIEMPO_ESPECIAL= $row["TIEMPO_ESPECIAL"];
	$CONVENIR= $row["CONVENIR"];

	$ENCARGADO= $row["ENCARGADO"];
	$NOMBRE_PROYECTO= $row["NOMBRE_PROYECTO"];

}

  mysql_free_result($result1);

}

if (isset($_POST["Ingresar"])) 
{
////////////////////////////////////////////////////////////////////////////////////////////
$RUT = $_POST['txt_rut_cliente'];


mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_CLIENTE = $row["CODIGO_CLIENTE"];
  }

mysql_free_result($result1);

////////////////////////////////////////////////////////////////////////////////////////////

$CODIGO = $_POST['txt_codigo_proyecto'];

mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM proyecto WHERE CODIGO_PROYECTO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$numero++;
  }
mysql_free_result($result1);

  
if($numero == 0)
{

$ORDEN = $_POST['txt_OC'];
$DIRECCION_FACTURACION = $_POST['txt_direccion_despacho'];

$CODIGO_PROYECTO = $_POST["txt_codigo_proyecto"];
$NOMBRE_CLIENTE = $_POST['txt_nombre_cliente'];
$RUT_CLIENTE = $_POST['txt_rut_cliente'];
$OBRA = $_POST['txt_obra'];
$EJECUTIVO = $_POST['txt_director'];
$FECHA_INGRESO = $_POST['txt_ingreso'];


$FECHA_ENTREGA = $_POST['txt_entrega'];
$CONTACTO = $_POST['txt_contacto_cliente'];
$TELEFONO = $_POST['txt_telefono_cliente'];
$DIAS = $_POST['dias_radicado'];
$CONDICION_PAGO = $_POST['txt_condicion_pago'];
$DIRECCION_DESPACHO = $_POST['txt_direccion_despacho'];
$PUESTOS = $_POST['txt_puestos'];
$ENPROCESO = 'EN PROCESO';
$DEPARTAMENTO_CREDITO = $_POST['txt_departamento_credito'];
$VALIDEZ = $_POST['validez'];

$OC = $_POST['txt_OC'];
$DISEÑADOR = $_POST['txt_disenador'];
$MAIL = $_POST['mail'];
$FECHA_ACTA = $_POST['fecha_acta'];
$TIEMPO_ESPECIAL = $_POST['txt_especial'];
$CONVENIR = $_POST['txt_convenir'];
$SUB_TOTAL = $_POST['sub_total'];
$DESCUENTO = $_POST['descuento'];
$NETO = $_POST['neto'];
$DESCUENTO2 = $_POST['descuento2'];
$NETO2 = $_POST['neto2'];
$IVA = $_POST['iva'];
$TOTAL = $_POST['total'];

$ENCARGADO = $_POST['txt_encargado'];
$NOMBRE_PROYECTO = $_POST['txt_nombre_proyecto'];
	
//////	

$caracteres = Array(".",","); 
  $SUB_TOTAL = str_replace($caracteres,"",$SUB_TOTAL); 

  $caracteres1 = Array("."); 
  $DESCUENTO = str_replace($caracteres1,"",$DESCUENTO); 

  $caracteres2 = Array(","); 
  $DESCUENTO = str_replace($caracteres2,".",$DESCUENTO); 
  
  
  
   $caracteres3 =  Array("."); 
  $DESCUENTO2 = str_replace($caracteres3,"",$DESCUENTO2); 

  $caracteres4 =  Array(",");  
  $DESCUENTO2 = str_replace($caracteres4,".",$DESCUENTO2); 

  $caracteres5 =  Array(".",",");  
  $NETO = str_replace($caracteres5,"",$NETO); 


    $caracteres6 =  Array(".",",");  
  $NETO2 = str_replace($caracteres6,"",$NETO2); 
  
  
  
   $caracteres7 = Array("."); 
  $TOTAL = str_replace($caracteres7,"",$TOTAL); 

  $caracteres8 = Array(","); 
  $TOTAL = str_replace($caracteres8,".",$TOTAL); 
  
  
     $caracteres9 = Array("."); 
  $IVA = str_replace($caracteres9,"",$IVA); 

  $caracteres10 = Array(","); 
  $IVA = str_replace($caracteres10,".",$IVA); 	
//////
	
	
$sql = "INSERT INTO proyecto (CODIGO_PROYECTO, NOMBRE_CLIENTE,OBRA,MONTO,EJECUTIVO,FECHA_INGRESO, FECHA_ENTREGA,DIAS,CODIGO_USUARIO,CONTACTO,FONO,ORDEN_CC,CONDICION_PAGO,VALIDEZ_COTIZACION,DEPARTAMENTO_CREDITO,DIRECCION_DESPACHO,DIRECCION_FACTURACION,RUT_CLIENTE,ESTADO,PUESTOS,FECHA_CONFIRMACION,SUB_TOTAL,FECHA_REALIZACION,DISENADOR,MAIL,FECHA_ACTA,TIEMPO_ESPECIAL,CONVENIR,DESCUENTO,DESCUENTO2,IVA,TOTAL,	ENCARGADO,NOMBRE_PROYECTO) values ('".($CODIGO_PROYECTO)."','".($NOMBRE_CLIENTE)."','".($OBRA)."','".($NETO)."','".($EJECUTIVO)."','".($FECHA_INGRESO)."','".($FECHA_ENTREGA)."','".($DIAS)."','".($CODIGO_USUARIO)."','".($CONTACTO)."','".($TELEFONO)."','".($ORDEN)."','".($CONDICION_PAGO)."','".($VALIDEZ)."','".($DEPARTAMENTO_CREDITO)."','".($DIRECCION_DESPACHO)."','".($DIRECCION_FACTURACION)."','".($RUT_CLIENTE)."','".($ENPROCESO)."','".($PUESTOS)."','".($FECHA_ENTREGA)."','".($SUB_TOTAL)."','".date('Y/m/d')."','".($DISEÑADOR)."','".($MAIL)."','".($FECHA_ACTA)."','".($TIEMPO_ESPECIAL)."','".($CONVENIR)."','".($DESCUENTO)."','".($DESCUENTO2)."','".($IVA)."','".($TOTAL)."','".($ENCARGADO)."','".($NOMBRE_PROYECTO)."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
/*
$para      = 'cri.maturana@gmail.com';
$titulo    = 'Ingreso';
$mensaje   = 'Rocha '.$CODIGO_PROYECTO.' ha sido Ingresado '.date("Y-m-d").', y su fecha de entrega a quedado programada para el '.substr($FECHA_ENTREGA,0,11).'.';
$cabeceras = 'From: wolf@system.com' . "\r\n" .
    'Reply-To: wolf@system.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);*/


echo '<script language = javascript>
	 window.location.href="editarProyecto.php?CODIGO_PROYECTO='.urlencode($CODIGO_PROYECTO).'";
	</script>';
}
else
{
	echo '<script language = javascript>
	
	alert("El codigo del ROCHA ya existe")

	</script>';
  }
}
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Nuevo Rocha V1.2.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="Muebles y Diseño" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />

<link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script src="js/jquery.Rut.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/comprobar_cliente.js"></script>








  
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>
  
  
//////////////////////
//////////////////////
//////////////////////



$(document).ready(function(){
$('#txt_rut_cliente').Rut({ });
$("#content > ul").tabs();
});


//////////////////////
//////////////////////
//////////////////////



	 		

///////////////////////////////////
///////////////////////////////////
///////////////////////////////////
  
  
  
 function completar()
 {
  
                $('#buscarcli').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
                 });
       

                $('#buscareje').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
				   
                 });
				 
				   $('#buscarcod').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
                       
                   }
				   
				   
                 });
           
  }
 

  
  
  
  
  
  
  
  
  
  
  
  
  $(function(){
        
				$('#txt_entrega').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
			
    });

 $(function(){
                $('#txt_nombre_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select :
				   function(event, ui)
				   {
                       $('#txt_rut_cliente').slideUp('fast', function()
					   {
                            $('#txt_rut_cliente').val(
                                 ui.item.rut
                            );
                       });
                       $('#txt_rut_cliente').slideDown('fast');
					   $('#txt_direccion_facturacion').slideUp('slow', function()
					   {
                            $('#txt_direccion_facturacion').val(
                                 ui.item.direccion 
                            );
                       });
                       $('#txt_direccion_facturacion').slideDown('slow');
                   }
                 });
            });
 $(function(){
                $('#txt_director').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {                      
                   }
                 });
            });						
   	
	function totalw()
{
var descuento = document.getElementById('descuento').value ;	
var sub_total = document.getElementById('sub_total').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto').value = des1;
if(descuento2 > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}
function descuentoa()
{
	 activar=document.getElementById('activara');
	 neto =document.getElementById('neto');
	 descuento = document.getElementById('descuento');
	 if(activar.checked == true)
	 {
        neto.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto.readOnly = true;
		descuento.readOnly = true;
	 }
}
function descuentoas()
{
	 activar=document.getElementById('activars');
	 neto2 =document.getElementById('neto2');
	 descuento = document.getElementById('descuento2');
	 if(activar.checked == true)
	 {
        neto2.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto2.readOnly = true;
		descuento.readOnly = true;
	 }
}
function totalas()
{
var sub_total = document.getElementById('neto').value;
var neto = document.getElementById('neto2').value ;
var descuento = document.getElementById('descuento2').value ;
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var iva1  = document.getElementById('iva1').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto2').value = des1;
if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}

function seleccionas()
{
var sub_total = document.getElementById('neto').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto2').value;
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}
function seleccions()
{
var sub_total = document.getElementById('sub_total').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto').value
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}
function elije()

{
	 descuento = document.getElementById('descuento2').value;
	 
	 if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
	
}

function dias()
{
var fecha1= document.getElementById('txt_ingreso').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_entrega').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);
var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

if(mes1 == '01')
{
	mesito = 'JANUARY';
}
else  if(mes1 == '02')
{
	mesito = 'FEBRUARY';
}
else  if(mes1 == '03')
{
	mesito = 'MARCH';
}
else  if(mes1 == '04')
{
	mesito = 'APRIL';
}
else  if(mes1 == '05')
{
	mesito = 'MAY';
}
else  if(mes1 == '06')
{
	mesito = 'JUNE';
}
else  if(mes1 == '07')
{
	mesito = 'JULY';
}
else  if(mes1 == '08')
{
	mesito = 'AUGUST';
}
else  if(mes1 == '09')
{
	mesito = 'SEPTEMBER';
}
else  if(mes1 == '10')
{
	mesito = 'OCTOBER';
}
else  if(mes1 == '11')
{
	mesito = 'NOVEMBER';
}
else  if(mes1 == '12')
{
	mesito = 'DECEMBER';
}
ms = Date.parse(mesito +" "+ dia1+","+anyo1);
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

document.getElementById('dias_radicado').value=final; 

//document.getElementById('dias_radicado').value= new Date(ms).getDay(); 
}

function especiala()
{
	 txt_especial = document.getElementById('txt_especial');
	 especial =document.getElementById('especial');
	 if(especial.checked == true)
	 {
        txt_especial.readOnly = false;
	 }
	 else
	 {
	    txt_especial.readOnly = true;
	 }
}

</script>

</head>
<body>
<div id='bread'><div id="menu1"></div></div>
<div id="main">	
<div id="contenedor_Ingreso_proyecto">	

<form  name='informe' method="POST"/>

<table id="tabla_ingreso_pro"  rules="all">

<tr>
  <th  rowspan="3" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></th>
  <th  colspan="4" align="center"><h3>REGISTRO</h3></th>
  <th width="150"></th>
  <th width="150"></th>
</tr>
<tr>
  <th   colspan="4" rowspan="2" align="center"><h2>INGRESAR PROYECTO<h2></th>
  <th  ></th>
  <th  ></th>
</tr>
<tr>
  <th >&nbsp;Fecha de Hoy</th>
  <th ><input readonly aling="center" id="txt_ing"  name="txt_ing" type ="text"     value="<?php echo date("Y-m-d")?>"></th>
</tr>

<tr>
<td class="pan"> </td>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
</tr>

<tr>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
<th class="last"></th>
</tr>






    <tr>
      <td class="r"  rowspan="8" aling="center" ><input  placeholder="M&D 1234"  required="required" name = "txt_codigo_proyecto"  type="text" id = "txt_codigo_proyecto" value="" /></td>
      <td>&nbsp;Cliente *</td>
      <td> <input    placeholder="Rocha S.A." required="required" name="txt_nombre_cliente" id="txt_nombre_cliente" type ="text"  value="<?php echo $CLIENTE ?>" ><div id="resultado" class="nube"></div></td>
      <td>&nbsp;Director *</td>

      <td><select  required="required"  name="txt_director" id="txt_director" type ="text"  >
<option><?php echo ($DIRECTOR) ?></option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
      <td   >&nbsp;Fecha de Ingreso</td> 
      <td  ><input onchange="dias();"  name="txt_ingreso"  id="txt_ingreso" type ="text"  value="<?php echo date("Y-m-d H:i:s") ?>"></td>
    </tr>

    <tr>
      <td   >&nbsp;Rut *</td>
      <td><input  required="required" placeholder="1.111.111-1" name="txt_rut_cliente" id="txt_rut_cliente" type ="text"  value="<?php echo $RUT_CLIENTE?>"><div id="resultado2" class="nube"></div></td>
      <td   >&nbsp;Diseñador *</td>
      <td><select    required="required" name="txt_disenador" id="txt_disenador"   >
<option> </option>
<?php 
$query_registro = 
"select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DAM'";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result2))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result2);
 ?> 
 <option>No dise<option>
</select></td>
      <td   >&nbsp;Fecha Entrega Solicitada *</td>
      <td  ><input    onchange="dias()" required="required" placeholder="2014-01-01 00:00:00"  name="txt_entrega" id="txt_entrega" type ="text"  value="<?php echo $FECHA_ENTREGA ?>" /></td>
      </tr>
    <tr>
      <td   >&nbsp;Obra *</td>
      <td><input    placeholder="Santa Rosa 1111" required="required" name="txt_obra" id="txt_obra" type ="text"  value=""/></td>
      <td   >&nbsp;Contacto *</td>
      <td><input    placeholder="Luiz Jara" required="required" name="txt_contacto_cliente" id="txt_contacto_cliente" type ="text"   value="<?php echo $CONTACTO?>"/></td>
      <td   >&nbsp;Fecha de Confirmacion</td>
      <td class="bloq"></td>
    </tr>
    <tr>
      <td   >&nbsp;Direccion Obra *</td>
      <td><input     placeholder="Santa Rosa 1111" required="required" name="txt_direccion_despacho" id="txt_direccion_despacho" type ="text"  value="<?php echo $DIRECCION_OBRA?>"/></td>
      <td   >&nbsp;Fono *</td>
      <td><input    required="required" placeholder="(2) X XXX XXX" name="txt_telefono_cliente" id="txt_telefono_cliente" type ="text"  value="<?php echo $FONO?>"/></td>
      <td   >&nbsp;Fecha Acta </td>
      <td class="bloq"><input class="bloq" readonly="readonly" name="fecha_acta" id="fecha_acta" type ="text"    value="" /></td>
      </tr>
    <tr>
      <td   >&nbsp;OC *</td>
      <td><input    required="required" placeholder="1234 o sin oc" name="txt_OC" id="txt_OC" type ="text"  value="<?php echo $OC?>"/></td>
      <td   >&nbsp;Mail</td>
      <td><input  placeholder="rocha@rocha.cl" name="mail" id="mail" type ="text"  value="<?php echo $MAIL?>"/></td>
      <td   >&nbsp; Dias</td>
      <td class="bloq"><input class="bloq" readonly="readonly" name="dias_radicado" id="dias_radicado"  type ="text" class="td_bloq" value="" /></td>
    </tr>
    <tr>
      <td >&nbsp;Condicion de Pago *</td>
      <td><input    required="required" placeholder="30 ec" name="txt_condicion_pago" id="txt_condicion_pago" type ="text"   value="<?php echo $CONDICION_PAGO?>"/></td>
      <td>&nbsp;Validez Cotizacion</td>
      <td><input  placeholder="10 dias" name="validez" id="validez" type ="text"    value="<?php echo $VALIDEZ?>"/></td>
      <td   >&nbsp;Tiempo Especial &nbsp; <input type="checkbox" value="especial" id="especial" name="especial" onclick="especiala()" /></td>
      <td><input   type="text" id="txt_especial"  name="txt_especial" value="" readonly />  </td>
      </tr> 
    <tr>
      <td   >&nbsp;Linea *</td>
      <td><select  required="required"   name="txt_departamento_credito" id="txt_departamento_credito">
<option></option>
<?php 
$query_registro = 
"select * from linea WHERE INHABILITAR = '0' ORDER BY NOMBRE_LINEA ASC";
$result2 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
{
?>
<option value = "<?php echo ($row['NOMBRE_LINEA']); ?>" > <?php echo ($row['NOMBRE_LINEA']); ?> </option>
<?php 
} mysql_free_result($result2);
?> 
</select>


     </td>
      <td   >&nbsp;Puestos *</td>
      <td><input  required="required"  required="required" name="txt_puestos" id="txt_puestos" type ="text"  value="" /></td>
      <td   >&nbsp;A Convenir &nbsp; <input type="checkbox" value="convenir" id="convenir" name="convenir" onclick="convenira();" /></td>
      <td><input readonly="readonly"  type="text" id="txt_convenir"  name="txt_convenir" value="" /></td>
    </tr>
    <tr>
    <td>&nbsp;Encargado</td>
    <td>
    	<select name="txt_encargado" id="txt_encargado">
    		<option><?php echo $ENCARGADO ?></option>
    		<option>Cesar Gajardo Cardenas</option>
    		<option>Raul Gonzalez Marquez</option>
    	</select>
    </td>
    <td>&nbsp;Nombre Proyecto</td>
    <td><input name="txt_nombre_proyecto" id="txt_nombre_proyecto" type ="text"  value="<?php echo $NOMBRE_PROYECTO ?>" /></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
    
    
      <td rowspan="8" class="ra">
      

      
      </td>

      <td  colspan="4" rowspan="2">&nbsp;Observaciones</td>
      <td   >&nbsp;Sub Total</td>
      <td><input  required="required" name="sub_total" id="sub_total" onchange="totalw();"  type ="text"  value="" />
      </td>
    </tr>
    <tr>
      <td   >&nbsp;Descuento &nbsp; <input id="activara" type="checkbox" name="activara" value="" onclick="descuentoa();"></td>
      <td><input  readonly="readonly" name="descuento" id="descuento" onchange="totalw();" type ="text"   value="" /></td>
      </tr>
      
    <tr>
      <td class="blank" colspan="4" rowspan="6"> </td>
      <td   >&nbsp;Neto</td>
      <td><input   required="required" name="neto" id="neto" type ="text"   onchange="totalw();"  value="" /></td>
    </tr>
    <tr>
      
      <td   >&nbsp;Descuento 2 &nbsp; <input id="activars" name="activars" type="checkbox" value="" onclick="descuentoas();"/></td>
      <td><input  readonly="readonly" name="descuento2" id="descuento2" type ="text"   onchange="totalas();"  value="" /></td>
    </tr>
    <tr>
      <td   >&nbsp;Neto 2</td>
      <td><input  name="neto2" id="neto2" readonly="readonly" type ="text"   onchange="totalas();"  value="" /></td>
    </tr>
    <tr>
      <td   >&nbsp;Iva
       <select class="iva" onchange="elije();" required="required"  id = "iva1" name="iva1">
         <option></option>
          <option>Iva Retenido</option>
          <option>Iva</option>
          <option>Retencion</option>
        </select></td>
      <td><input  name="iva" id="iva" type ="text"    value="" />
       </td>
    </tr>
    <tr>
      <td   >&nbsp;Total</td>
      <td><input  readonly="readonly" name="total" id="total" type ="text"   value="" /></td>
    </tr>
    <tr>
      <td   >&nbsp;Estado</td>
      <td><input  readonly="readonly"   id = "estado" name="estado" value ="EN PROCESO" /></td>
    </tr>

    <tr>
    	<th class="last"></th>
    	<th class="last" colspan="4"></th>
    	<th class="last"></th>
    	<th class="last"><input   id="Ingresar" name="Ingresar" type="submit" value="Ingresar"  /></th>

    </tr>

</table>



</form>
</div>
</div>
</body>
</html>
