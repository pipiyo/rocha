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
$fecha= $_GET['fecha'];

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


  
  
  


   </script>
</head>
<body>
<div id="main">	
<div id="site_content">
<form enctype="multipart/form-data" action="scriptControlProduccion.php" method="post" name="formulario">

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
  <td align="center"><input readonly="readonly" id="fecha" name="fecha" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"    value="<?php echo $fecha;?>"></td>
</tr>
<tr>
  <td align="center"></td>
  <td align="center"></td>
</tr>
</table>
<br />

<?php
$ID1 = "";
$AM1 = "";
$PM1 = "";
$OB1 = "";
$NO1 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'CORTE' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID1 = $row["ID"];
	$AM1 = $row["AM"];
	$PM1 = $row["PM"];
  $NO1 = $row["NOCHE"];
	$OB1 = $row["OBSERVACION"];
  }
mysql_free_result($result2); 
$ID2 = "";
$AM2 = "";
$PM2 = "";
$OB2 = "";
$NO2 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'ENCHAPE RECTO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID2 = $row["ID"];
	$AM2 = $row["AM"];
	$PM2 = $row["PM"];
  $NO2 = $row["NOCHE"];
	$OB2 = $row["OBSERVACION"];
  }
mysql_free_result($result2); 
$ID3 = "";
$AM3 = "";
$PM3 = "";
$OB3 = "";
$NO3 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'ENCHAPE CURVO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID3 = $row["ID"];
	$AM3 = $row["AM"];
	$PM3 = $row["PM"];
  $NO3 = $row["NOCHE"];
	$OB3 = $row["OBSERVACION"];
  }
mysql_free_result($result2);
$ID4 = "";
$AM4 = "";
$PM4 = "";
$OB4 = "";
$NO4 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'PERFORADOR MULTIPLE' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID4 = $row["ID"];
	$AM4 = $row["AM"];
	$PM4 = $row["PM"];
  $NO4 = $row["NOCHE"];
	$OB4 = $row["OBSERVACION"];
  }
mysql_free_result($result2);  
$ID5 = "";
$AM5 = "";
$PM5 = "";
$OB5 = "";
$NO5 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'CENTRO DE MECANIZADO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID5 = $row["ID"];
	$AM5 = $row["AM"];
	$PM5 = $row["PM"];
  $NO5 = $row["NOCHE"];
	$OB5 = $row["OBSERVACION"];
  } 
mysql_free_result($result2);


$ID6 = "";
$AM6 = "";
$PM6 = "";
$OB6 = "";
$NO6 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'LAMINADO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID6 = $row["ID"];
	$AM6 = $row["AM"];
	$PM6 = $row["PM"];
  $NO6 = $row["NOCHE"];
	$OB6 = $row["OBSERVACION"];
  } 
mysql_free_result($result2);

$ID7 = "";
$AM7 = "";
$PM7 = "";
$OB7 = "";
$NO7 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'RUTEADO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID7 = $row["ID"];
	$AM7 = $row["AM"];
	$PM7 = $row["PM"];
  $NO7 = $row["NOCHE"];
	$OB7 = $row["OBSERVACION"];
  } 
   
mysql_free_result($result2);
$ID8 = "";
$AM8 = "";
$PM8 = "";
$OB8 = "";
$NO8 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'ARMADO' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID8 = $row["ID"];
	$AM8 = $row["AM"];
  $NO8 = $row["NOCHE"];
	$PM8 = $row["PM"];
	$OB8 = $row["OBSERVACION"];
  } 
   
mysql_free_result($result2);

$ID9 = "";
$AM9 = "";
$PM9 = "";
$OB9 = "";
$NO9 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'MUEBLES ESPECIALES' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID9 = $row["ID"];
	$AM9 = $row["AM"];
	$PM9 = $row["PM"];
  $NO9 = $row["NOCHE"];
	$OB9 = $row["OBSERVACION"];
  } 
   

mysql_free_result($result2);
$ID10 = "";
$AM10 = "";
$PM10 = "";
$OB10 = "";
$NO10 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'LIMPIEZA' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$ID10 = $row["ID"];
	$AM10 = $row["AM"];
	$PM10 = $row["PM"];
  $NO10 = $row["NOCHE"];
	$OB10 = $row["OBSERVACION"];
  } 
   
mysql_free_result($result2);


$ID11 = "";
$AM11 = "";
$PM11 = "";
$OB11 = "";
$NO11 = "";
$sql1 = "SELECT * FROM control_produccion where FECHA = '".$fecha."' AND TIPO = 'BARNIZ' ";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
  $ID11 = $row["ID"];
  $AM11 = $row["AM"];
  $PM11 = $row["PM"];
  $NO11 = $row["NOCHE"];
  $OB11 = $row["OBSERVACION"];
  } 
   
mysql_free_result($result2);
?>

  <table  border="1" bordercolor="#ccc" width="960" height="265" rules="all" id= "tabla_descripcion_radicado">
      <tr>
        <th style=" background-color:#fff;height:25px;">Tipo</th>
        <th colspan="3" style=" background-color:#069;color:#fff;" >AM</th>
        <th colspan="3" style=" background-color:#069;color:#fff;">PM</th>
        <th colspan="3" style=" background-color:#069;color:#fff;">Noche</th>
          <th colspan="3" style=" background-color:#069;color:#fff;">OBSERVACIONES</th>
           <th colspan="3" style=" background-color:#069;color:#fff;">ELIMINAR</th>
      </tr>
      
       <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">CORTE</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am1"  name="am1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $AM1 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="pm1"  name="pm1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $PM1 ?>" />
      <input   id="id1"  name="id1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID1 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no1"  name="no1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO1 ?>" />
       <td width="395" colspan="3" ><input   id="ob1"  name="ob1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB1 ?>" /></td>
        <td width="395" colspan="3" ><input  id="el1"  name="el1" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
      
      
        <tr>
      <td style=" background-color:#F9C;height:25px;color:#fff;">ENCHAPE RECTO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am2"  name="am2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $AM2 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="pm2"  name="pm2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $PM2 ?>" />
      <input   id="id2"  name="id2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID2 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no2"  name="no2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO2 ?>" />
      <td width="395" colspan="3" ><input   id="ob2"  name="ob2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB2 ?>" /></td>
      <td width="395" colspan="3" ><input  id="el2"  name="el2" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
      
      
      
       
        <tr>
      <td style=" background-color:#F60;height:25px;color:#fff;">ENCHAPE CURVO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am3"  name="am3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $AM3 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="pm3"  name="pm3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $PM3 ?>" />
      <input   id="id3"  name="id3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID3 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no3"  name="no3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO3 ?>" />
      <td width="395" colspan="3" ><input  id="ob3"  name="ob3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB3 ?>" /></td>
      <td width="395" colspan="3" ><input  id="el3"  name="el3" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
      
      
      
  
      
      <tr>
      <td style=" background-color:#5882FA;height:25px;color:#fff;">PERFORADOR MULTIPLE</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am4"  name="am4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $AM4 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="pm4"  name="pm4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $PM4 ?>" />
      <input   id="id4"  name="id4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID4 ?>" /></td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no4"  name="no4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO4 ?>" />
      <td width="395" colspan="3" ><input id="ob4"  name="ob4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB4 ?>" /></td>
      <td width="395" colspan="3" ><input  id="el4"  name="el4" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
   
   
    <tr>
      <td width="133" style=" background-color:#5882FA; height:25px;color:#fff;">CENTRO DE MECANIZADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am5"  name="am5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"   value="<?php echo $AM5 ?>"></td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="pm5"  name="pm5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo $PM5 ?>">
       <input   id="id5"  name="id5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID5 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no5"  name="no5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO5 ?>" />
       <td width="395" colspan="3" ><input   id="ob5"  name="ob5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB5 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el5"  name="el5" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
    </tr>
    
    
    
    <tr>
      <td style=" background-color:#099; height:25px;color:#fff;">LAMINADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am6"  name="am6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value="<?php echo $AM6 ?>"></td>
      <td colspan="3" ><input  onkeypress="return validar_monto(event)" id="pm6"  name="pm6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo $PM6 ?>">
       <input   id="id6"  name="id6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID6 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no6"  name="no6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO6 ?>" />
       <td width="395" colspan="3" ><input   id="ob6"  name="ob6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB6 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el6"  name="el6" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>

      
      
      
      
    <tr>
      <td style=" background-color:#09C; height:25px;color:#fff;">RUTEADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am7"  name="am7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo $AM7 ?>"></td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="pm7"  name="pm7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"  value="<?php echo $PM7 ?>">
       <input   id="id7"  name="id7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID7 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no7"  name="no7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO7 ?>" />
       <td width="395" colspan="3" ><input  id="ob7"  name="ob7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB7 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el7"  name="el7" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
    </tr>


    <tr>
      <td style=" background-color:#B18904; height:25px;color:#fff;">BARNIZ</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am11"  name="am11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo $AM11 ?>"></td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="pm11"  name="pm11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"  value="<?php echo $PM11 ?>">
       <input   id="id11"  name="id11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID11 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no11"  name="no11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO11 ?>" />
       <td width="395" colspan="3" ><input  id="ob11"  name="ob11" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB11 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el11"  name="el11" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
    </tr>
    
    
    
    
    <tr>
      <td style=" background-color:#060;height:25px;color:#fff;">ARMADO</td>
      <td colspan="3" ><input  onkeypress="return validar_monto(event)"  id="am8"  name="am8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $AM8 ?>" /></td>
      <td  colspan="3"><input     onkeypress="return validar_monto(event)"  id="pm8"  name="pm8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $PM8 ?>" />
       <input   id="id8"  name="id8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID8 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no8"  name="no8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO8 ?>" />
       <td width="395" colspan="3" ><input   id="ob8"  name="ob8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB8 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el8"  name="el8" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
      
      
      
      
          <tr>
      <td style=" background-color:#C8C8C8; height:25px;color:#fff;">MUEBLES ESPECIALES</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am9"  name="am9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value="<?php echo $AM9 ?>"></td>
      <td  colspan="3" ><input   onkeypress="return validar_monto(event)" id="pm9"  name="pm9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value="<?php echo $PM9 ?>">
       <input   id="id9"  name="id9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID9 ?>" />
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no9"  name="no9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO9 ?>" />
       <td width="395" colspan="3" ><input    id="ob9"  name="ob9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB9 ?>" /></td></td>
       <td width="395" colspan="3" ><input  id="el9"  name="el9" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
      </tr>
      
      
      
    <tr>
      <td style=" background-color:#969; height:25px;color:#fff;">&nbsp;LIMPIEZA</td>
      <td  colspan="3"><input  onkeypress="return validar_monto(event)" id="am10"  name="am10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%;background-color:#fff;"   value="<?php echo $AM10 ?>"></td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="pm10"  name="pm10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo $PM10 ?>">
       <input   id="id10"  name="id10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;display:none;" value="<?php echo $ID10 ?>" /></td>
       <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="no10"  name="no10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo $NO10 ?>" />
       <td width="395" colspan="3" ><input  id="ob10"  name="ob10" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $OB10 ?>" /></td>
       <td width="395" colspan="3" ><input  id="el10"  name="el10" type="checkbox" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value=""  /></td>
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
