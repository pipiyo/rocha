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
  <title>Ingreso Control V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
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


   $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  
  


   </script>
</head>
<body>
<div id="main">	
<div id="site_content">
<form enctype="multipart/form-data" action="scriptControlProduccionProyectados.php" method="post" name="formulario">

<table width="960" frame="box" rules="all">
<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> REGISTRO</b></h3></td>
  <td width="86"  align="center"></td>
  <td width="106"  align="center"></td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b> Control Producción</b></h3></td>
  <td height="25" align="center"></td>
  <td align="center"></td>
</tr>
<tr>
  <td height="29" align="center">Fecha</td>
  <td align="center"><input readonly="readonly" id="fecha" name="fecha" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"    value="<?php date('Y-m-d')?>"></td>
</tr>
<tr>
  <td align="center"></td>
  <td align="center"></td>
</tr>
</table>
<br />



  <table  border="1" bordercolor="#ccc" width="960" height="265" rules="all" id= "tabla_descripcion_radicado">
  <tr>
        <th style=" background-color:#fff;height:25px;">Fecha</th>
        <th colspan="3" style=" background-color:#069;color:#fff;" > desde &nbsp;<input style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" name="txt_desde" id="txt_desde" type="text" />&nbsp;Hasta &nbsp;<input style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" name="txt_hasta" id="txt_hasta" type="text" /></th>
        
      </tr>
      <tr>
        <th style=" background-color:#fff;height:25px;">Tipo</th>
        <th colspan="3" style=" background-color:#069;color:#fff;" >AM</th>
        
      </tr>
      
      
      <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">CORTE</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am1"  name="am1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      
      </tr>
      
      
      <tr>
      <td style=" background-color:#F9C;height:25px;color:#fff;">ENCHAPE RECTO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am2"  name="am2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      
      </tr>
      
      <tr>
      <td style=" background-color:#F60;height:25px;color:#fff;">ENCHAPE CURVO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am3"  name="am3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      
      </tr>
      
      
      
      
      <tr>
      <td style=" background-color:#5882FA;height:25px;color:#fff;">PERFORADOR MULTIPLE</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am4"  name="am4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="" /></td>
      
      </tr>
   
    <tr>
      <td width="133" style=" background-color:#5882FA; height:25px;color:#fff;">CENTRO DE MECANIZADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am5"  name="am5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"   value=""></td>

     
    </tr>
    <tr>
      <td style=" background-color:#099; height:25px;color:#fff;">LAMINADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am6"  name="am6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
     
      </tr>
    <tr>
      <td style=" background-color:#09C; height:25px;color:#fff;">RUTEADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am7"  name="am7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
     
    </tr>
     <tr>
      <td style=" background-color:#B18904; height:25px;color:#fff;">BARNIZ</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am11"  name="am11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value=""></td>
     
    </tr>
    <tr>
      <td style=" background-color:#060;height:25px;color:#fff;">ARMADO</td>
      <td colspan="3" ><input  onkeypress="return validar_monto(event)"  id="am8"  name="am8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="" /></td>
     
       </td>
      </tr>
          <tr>
      <td style=" background-color:#C8C8C8; height:25px;color:#fff;">MUEBLES ESPECIALES</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am9"  name="am9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value=""></td>
      
    </td>
      </tr>
    <tr>
      <td style=" background-color:#969; height:25px;color:#fff;">&nbsp;LIMPIEZA</td>
      <td  colspan="3"><input  onkeypress="return validar_monto(event)" id="am10"  name="am10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value=""></td>
      
    </tr>
    
   
   
    </table>
    </br >
 
  <div style="width:960px; padding-bot:10px; ">
   <input  style="float:right;width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" type="submit" value="Ingresar" /> 
  
  </form>
  </div>
  
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
