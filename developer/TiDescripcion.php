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

mysql_select_db($database_conn, $conn);

$CODIGO_TI= $_GET['CODIGO_TI'];

$sql1 = "SELECT * FROM ti WHERE CODIGO_TI = '".$CODIGO_TI."' ORDER BY CODIGO_TI DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_TI = $row["CODIGO_TI"];
    $RUT_CLIENTE= $row['RUT_CLIENTE'];
    $OBRA = $row['OBRA'];
    $DIRECCION = $row['DIRECCION_OBRA'];
    $TXT_DIRECTOR = $row['DIRECTOR_PROYECTO'];
    $CONTACTO = $row['CONTACTO'];
    $FONO = $row['FONO'];
    $MAIL = $row['MAIL'];
    $FECHA_INGRESO = $row['FECHA_INGRESO'];
    $FECHA_INICIO = $row['FECHA_INICIO'];
    $FECHA_ENTREGA = $row['FECHA_ENTREGA'];;
    $DIAS = $row['DIAS'];
    $PUESTOS = $row['PUESTOS'];
	$PUNTOS = $row['PUNTOS'];
    $ESTADO = $row['ESTADO']; 
	
	if ($row['ISOMETRICA'] == 1)  
{
	$ISOMETRICA = 'checked';
}
else
{
	$ISOMETRICA = '';
}
//2
if ($row['FICHA_PUESTO'] == 1)  
{
	$FICHAS_PUESTOS = 'checked';
}
else
{
	$FICHAS_PUESTOS = '';
}
//3
if ($row['DESC_MUEBLES'] == 1)  
{
	$DESC_MUEBLES = 'checked';
}
else
{
	$DESC_MUEBLES  = '';
}
//4
if ($row['SIN_DESCUENTO'] == 1)  
{
	$SIN_DESC = 'checked';
}
else
{
	$SIN_DESC  = '';
}
//5
if ($row['FOTORREALISMO'] == 1)  
{
	$FOTORREALISMO = 'checked';
}
else
{
	$FOTORREALISMO  = '';
}
//6
if ($row['FICHA_SILLA'] == 1)  
{
	$FICHA_SILLA = 'checked';
}
else
{
	$FICHA_SILLA  = '';
}
//7
if ($row['DESC_SILLA'] == 1)  
{
	$DESC_SILLA = 'checked';
}
else
{
	$DESC_SILLA  = '';
}
//8
if ($row['GARANTIA'] == 1)  
{
	$GARANTIA = 'checked';
}
else
{
	$GARANTIA  = '';
}
  }

$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE = '".$RUT_CLIENTE."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result))
  {
	$RUT_CLIENTE = $row["RUT_CLIENTE"];
	$NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
  }




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>TI Descripcion V1.0.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
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
  {     $( "#txt_fecha_inicior").datepicker ({dateFormat: 'yy-mm-dd'});
        $( "#txt_fecha_entregar").datepicker ({dateFormat: 'yy-mm-dd'});
	
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
<div id="main">	
<div id="site_content">
<form enctype="multipart/form-data" action="scriptti.php" method="post" name="formulario">

<table width="960" frame="box" rules="all">
<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> REGISTRO</b></h3></td>
  <td width="86"  align="center">Codigo</td>
  <td width="106"  align="center">REG-13</td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b> TOMA DE INFORMACIÓN</b></h3></td>
  <td height="25" align="center">Revision</td>
  <td align="center">01</td>
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
  <table width="960" height="133" border="1" rules="all" id= "tabla_descripcion_radicado">
    <tr>
      <td width="96" rowspan="4" style=" background-color:#FDE9D9" align="center"><input style="border:#FDE9D9 1px solid;background:#FDE9D9;width:90px; height:99%; text-align:center; font-size:20px;" type="text" id = "codigo_radicado" name= "codigo_radicado" value="<?php echo $CODIGO_TI ?>" /></td>
      <td width="96" style=" background-color:#FDE9D9; height:25px;">&nbsp;Cliente</td>
      <td colspan="3"><input value="<?php echo $NOMBRE_CLIENTE ?>" id="txt_cliente" name="txt_cliente" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" ></td>
      <td width="96" style=" background-color:#FDE9D9">&nbsp;Director Proyecto</td>
      <td colspan="3"><select name="txt_director" id="txt_director" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px;width:95%;" >
<option><?php echo $TXT_DIRECTOR ?>  </option>
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
      <td width="96" rowspan="2" style=" background-color:#FDE9D9">&nbsp;Estado</td>
      <td width="96" rowspan="2"><input value="<?php echo $ESTADO ?>" readonly="readonly"  id="txt_fingreso"  name="txt_fingreso"  type ="text" style="border:#fff 1px solid;height :99% ; font-size:12px; width:98%; text-align:center;" /></td>
    </tr>
    <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Rut</td>
      <td colspan="3"><input value="<?php echo $RUT_CLIENTE ?>" id="txt_rut" name="txt_rut" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   ></td>
      <td style=" background-color:#FDE9D9">&nbsp;Contacto</td>
      <td colspan="3" ><input value="<?php echo  $CONTACTO ?>" id="txt_contacto" name="txt_contacto" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%" /></td>
      </tr>
    <tr>
      <td style=" background-color:#FDE9D9; height:25px;">&nbsp;Obra</td>
      <td colspan="3"><input value="<?php echo $OBRA ?>" id="txt_obra" name="txt_obra" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   ></td>
      <td style=" background-color:#FDE9D9">&nbsp;Fono</td>
      <td colspan="3"><input value="<?php echo $CODIGO_TI ?>" id="txt_fono" name="txt_fono" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"  ></td>
      
      <td rowspan="2" style=" background-color:#FDE9D9">&nbsp;Puntos</td>
      <td rowspan="2">
      
      <?php  if($PUNTOS > 2.01) { ?>
      <input  value="<?php echo $PUNTOS ?>" readonly="readonly"  id="txt_fingreso"  name="txt_fingreso"  type ="text" style="border:#fff 1px solid;height :100% ; font-size:36px; width:98%; text-align:center; background:#090;" />
      <?php } else 
	   if($PUNTOS >1.01) { ?>
      <input  value="<?php echo $PUNTOS ?>" readonly="readonly"  id="txt_fingreso"  name="txt_fingreso"  type ="text" style="border:#fff 1px solid;height :100% ; font-size:36px; width:98%; text-align:center;background:#CF3;" />
      <?php } else {?> 
      <input  value="<?php echo $PUNTOS ?>" readonly="readonly"  id="txt_fingreso"  name="txt_fingreso"  type ="text" style="border:#fff 1px solid;height :100% ; font-size:36px; width:98%; text-align:center;background:#900;" />
      <?php }?> 
      
      
      </td>
    </tr>
    <tr>
      <td style=" background-color:#FDE9D9;height:25px;">&nbsp;Direccion Obra</td>
      <td colspan="3" ><input  id="txt_direccion"  name="txt_direccion" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $DIRECCION ?>" /></td>
      <td style=" background-color:#FDE9D9">&nbsp;Mail</td>
      <td colspan="3"><input   id="txt_mail"  name="txt_mail" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $MAIL ?>" /></td>
      </tr>
    <tr>
      <td width="96" rowspan="3" align="center" style=" background-color:#EAF1DD"></td>
      <td align="center" colspan="4" style=" background-color:#FCD5B4">&nbsp;<b>Presentacion</b></td>
      <td align="center" colspan="4" style=" background-color:#FCD5B4">&nbsp;<b>Descuento</b></td>
      <td rowspan="3" style="background:#FCD5B4;">N° PUESTOS</td>
      <td rowspan="3"><input  id="txt_puestos"  name="txt_puestos" type ="text" style="border:#fff 1px solid;height :99% ; font-size:10px; width:98%; text-align:center; font-size:36px;" value="<?php echo $PUESTOS ?>" /></td>
    </tr>
    <tr>
      <td style=" background-color:#FCD5B4; height:25px;">Isometrica</td>
      <td width="96" align="center"><input <?php echo $ISOMETRICA ?>  name="txt_isometrica" id="txt_isometrica"  type="checkbox" value='1' /></td>
      <td width="96" style=" background-color:#FCD5B4">Fichas Puestos</td>
           <td width="96" align="center"><input <?php echo $FICHAS_PUESTOS ?> name="txt_fichas_puestos" id="txt_fichas_puestos" type="checkbox" value='1' /></td>
      <td style=" background-color:#FCD5B4">% Desc Muebles</td>
           <td width="96" align="center"><input <?php echo $DESC_MUEBLES ?> name="txt_desc_mueble" id="txt_desc_mueble" type="checkbox" value='1' /></td>
      <td width="96" style=" background-color:#FCD5B4">Sin Descuento</td>
          <td width="96" align="center"><input <?php echo $SIN_DESC ?> name="txt_sin_desc" id="txt_sin_desc" type="checkbox" value='1' /></td>
      </tr>
    <tr>
      <td style=" background-color:#FCD5B4; height:25px;">Fotorrealismo</td>
          <td width="96" align="center"><input <?php echo $FOTORREALISMO ?> name="txt_fotorrealismo" id="txt_fotorrealismo" type="checkbox" value='1' /></td>
      <td style=" background-color:#FCD5B4">Fichas Sillas</td>
         <td width="96" align="center"><input <?php echo $FICHA_SILLA ?> value='1' name="txt_fichas_sillas" id="txt_fichas_sillas" type="checkbox" /></td>
      <td style=" background-color:#FCD5B4">% Desc Sillas</td>
          <td width="96" align="center"><input <?php echo $DESC_SILLA ?> value='1' name="txt_desc_sillas" id="txt_desc_sillas" type="checkbox" /></td>
      <td style=" background-color:#FCD5B4;">Garantía</td>
          <td width="96" align="center"><input <?php echo $GARANTIA ?> value='1' name="txt_garantia" id="txt_garantia" type="checkbox" /></td>
      </tr>
    </table>
    </br >

  <?php
$contador = 1;

while($contador < 50)
{
	
	if($contador == 1)
	{

$query_registro = "SELECT * FROM ti_descripciones WHERE CODIGO_TI = '".$CODIGO_TI."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result))
  {
	$PUESTO_TIPO = $row["PUESTO_TIPO"];
	$ESQUEMA = $row["ESQUEMA"];
	$LINEA = $row["LINEA"];
	
	
	echo '<div id="con'.$contador.'" style="display:;"> <table id="myTable" width="960" border="1" rules="all">
  <tr>
   <td width="96"  align="center" style="background:#DBE5F1;"><b>Puesto Tipo</b></td>
    <td width="88" align="center" style="background:#DBE5F1;"><b>Linea</b></td>
    <td width="500" align="center" style="background:#DBE5F1;"><b>Esquema</b></td>
    <td colspan="3" align="center" style="background:#DBE5F1;"><b>Especificacion</b></td>
    </tr>
  <tr>
  <td rowspan="22" align="center"> <select  style="width:80px;" id="txt_puesto_tipo'.$contador.'" name="txt_puesto_tipo'.$contador.'"> 
  <option>'.$PUESTO_TIPO.'</option>
     <option>Presidencia</option>
  <option>Gerencia</option>
  <option>Jefatura</option>
  <option>Analista</option>
  <option>Recepcion</option>
  <option>Call Center</option>
  <option>Reuniones</option>
  </select> </td>
  <td rowspan="22" align="center"> <select  style="width:80px;" id="txt_linea'.$contador.'" name="txt_linea'.$contador.'"> 
  <option>'.$LINEA.'</option>
  <option>Dali</option>
   <option>Omega</option>
   <option>Flow</option>
   <option>Bozz</option>
	 <option>Escencial</option>
	 <option>Especial</option>
	 <option>Arkitek(Actiu)</option>
   <option>Vital(Actiu)</option>
   <option>Cool(Actiu)</option>
   <option>Ofimat(Actiu)</option>
	 <option>E Range(BN)</option>
	 <option>Management(BN)</option>
  </select></td>
  <td rowspan="22" align="center"><img style="width:490px;height:300px;" src = '.$ESQUEMA.' /></td>
  <td width="78" style="background:#DBE5F1;" align="center">Superficie</td>
  <td width="85">&nbsp;</td>
  <td>&nbsp;</td>    
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table> </div>';
  
   $contador++;
	
  }

		
		
		
	}
	else
	{
	echo '<div id="con'.$contador.'" style="display:none;"> <table id="myTable" width="960" border="1" rules="all">
  <tr>
    <td width="96"  align="center" style="background:#DBE5F1;"><b>Puesto Tipo</b></td>
    <td width="88" align="center" style="background:#DBE5F1;"><b>Linea</b></td>
    <td width="500" align="center" style="background:#DBE5F1;"><b>Esquema</b></td>
    <td colspan="3" align="center" style="background:#DBE5F1;"><b>Especificacion</b></td>
    </tr>
  <tr>
  <td rowspan="22" align="center"> <select  style="width:80px;" id="txt_puesto_tipo'.$contador.'" name="txt_puesto_tipo'.$contador.'"> 
  <option></option>
  <option>Presidencia</option>
  <option>Gerencia</option>
  <option>Jefatura</option>
  <option>Analista</option>
  <option>Recepcion</option>
  <option>Call Center</option>
  <option>Reuniones</option>
  </select> </td>
  <td rowspan="22" align="center"> <select  style="width:80px;" id="txt_linea'.$contador.'" name="txt_linea'.$contador.'"> 
  <option></option>
   <option>Dali</option>
   <option>Omega</option>
   <option>Flow</option>
   <option>Bozz</option>
	 <option>Escencial</option>
	 <option>Especial</option>
	 <option>Arkitek(Actiu)</option>
   <option>Vital(Actiu)</option>
   <option>Cool(Actiu)</option>
   <option>Ofimat(Actiu)</option>
	 <option>E Range(BN)</option>
	 <option>Management(BN)</option>
  </select></td>
  <td rowspan="22" align="center"><input type="file" name="fleImagen'.$contador.'" id="fleImagen'.$contador.'" /></td>
   <td width="78" style="background:#DBE5F1;" align="center">Superficie</td>
  <td width="85">&nbsp;</td>
  <td>&nbsp;</td>    
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="background:#DBE5F1;">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table> </div>';
   $contador++;
	}
 
}
  
  ?>
  <input type="button" onclick="myFunction()" value="+">
    <br /> <br />
  <div style="width:960px; padding-bot:10px; ">
     <input style="float:right;width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" type="button"  value="Continuar" onClick="document.formulario.action='Encuesta.php'; document.formulario.submit();" /> 
  
  <input disabled="disabled" type="submit" value="Editar"  style="width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>
  </form>
  </div>
<br />
          <br />  <br />
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
