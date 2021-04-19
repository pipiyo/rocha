<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);

$CODIGO_SERVICIO = $_GET['CODIGO_SERVICIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM servicio WHERE CODIGO_SERVICIO ='".$CODIGO_SERVICIO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
	$FECHA_I1 = $row["FECHA_INICIO"];
	$FECHA_E1 = $row["FECHA_ENTREGA"];
	$REALIZADOR1 = $row["REALIZADOR"];
	$SUPERVISOR1 = $row["SUPERVISOR"];
	$OBSERVACION1 = $row["OBSERVACIONES"];
	$DESCRIPCION1 = $row["DESCRIPCION"];
	$CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
	$ESTADO1 = $row["ESTADO"];
	$PREDECESOR1 = $row["PREDECESOR"];
	$DIAS1 = $row["DIAS"];
	$DIRECCION= $row["DIRECCION"];
	$TPTMFI= $row["TPTMFI"];
    $GUIA= $row["GUIA_DESPACHO"];
	$INS1= $row["INSTALADOR_1"];
	$INS2= $row["INSTALADOR_2"];
	$INS3= $row["INSTALADOR_3"];
	$INS4= $row["INSTALADOR_4"];
	$LIDER= $row["LIDER"];
	$PUESTOS = $row["PUESTOS"];
	$PROCESO = $row["PROCESO"];
	$EJECUTOR = $row["EJECUTOR"];
	$SERVICIO = $row['TIPO_SERVICIO'];
    $DOCUMENTO = $row['DOCUMENTO_SERVICIO_TECNICO'];
    $TECNICO1= $row['TECNICO_1'];
    $TECNICO2 =$row['TECNICO_2'];
  }
  mysql_free_result($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Despacho</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_informes.css" />
 <script type="text/javascript" src="js/jquery.min.js"></script>
  

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
   <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
   
   
   <link rel="stylesheet" href="style/estilopopup.css" />
<script type="text/javascript" src="js/tinybox.js"></script>
  
  <script language = javascript>
  var contLin = 3;
  function agregar() {
   var tr, td, tabla;

	tabla = document.getElementById('tabla');
	tr = tabla.insertRow(tabla.rows.length);
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input style= 'width:60px;' type='text' id='a" + contLin + "1' value='a" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='t" + contLin + "1' value='t" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='t" + contLin + "2' value='t" + contLin + "2'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input style= 'width:60px;' type='text' id='b" + contLin + "1' value='b" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input style= 'width:60px;' type='text' id='c" + contLin + "1' value='c" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='d" + contLin + "1' value='d" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='e" + contLin + "1' value='e" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='f" + contLin + "1' value='f" + contLin + "1'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input type='text' id='g" + contLin + "1' value='g" + contLin + "1'>";
	contLin++;
}
function borrarUltima() {
	ultima = document.all.tabla.rows.length - 1;
	if(ultima > -1){
		document.all.tabla.deleteRow(ultima);
		contLin--;
	}
}
 
  </script>

</head>

<body>

  <div id="main">	
    
	<div id="site_content">				   
  	  
	  <div id="content">   
   
<div  class="content_item">	

   	<form>
<table id="tabla" border="1">
      <tr>
		<th>N°</th>
		<th>Descripcion</th>
		<th>Direccion</th>
        <th>Guia</th>
        <th>TP/TM/FI</th>
        <th>Observaciones</th>
        <th>Emisor</th>
        <th>Supervisor</th>
        <th>Estado</th>
	</tr>
	<tr>
		<td><input style=" width:60px;"type='text' id='a11' value='<?php echo $CODIGO_SERVICIO; ?>'></td>
		<td><input type="text" id="t11" value="<?php echo $DESCRIPCION1 ?>"></td>
		<td><input type="text" id="t12" value="<?php echo $DIRECCION; ?>"></td>
        <td><input style= 'width:60px;' type="text" id="b11" value="<?php echo $GUIA; ?>"></td>
        <td><input style= 'width:60px;' type="text" id="c11" value="<?php echo $TPTMFI; ?>"></td>
        <td><input type="text" id="d11" value="<?php echo $OBSERVACION1 ?>"></td>
        <td><input type="text" id="e11" value="<?php echo $REALIZADOR1; ?>"></td>
        <td><input type="text" id="f11" value="<?php echo $SUPERVISOR1; ?>"></td>
          <td><input type="text" id="g11" value="<?php echo $ESTADO1; ?>"></td>
	</tr>
	<tr>
		<td><input style=" width:60px;" type='text' id='a21' value=''></td>
		<td><input type="text" id="t21" value=""></td>
		<td><input type="text" id="t22" value=""></td>
        <td><input style= 'width:60px;' type='text' id='b21' value=''></td>
        <td><input style= 'width:60px;' type='text' id='c21' value=''></td>
        <td><input type='text' id='d21' value=''></td>
        <td><input type='text' id='e21' value=''></td>
        <td><input type='text' id='f21' value=''></td>
          <td><input type="text" id="g11" value=""></td>
	</tr>
</table>
<br>
<input type="button" value="Agregar" onclick="agregar()">
<input type="button" value="Borrar ultima" onclick="borrarUltima()">
</form>
</div><!--close content_item--></div><!--close content-->	 	  
      </div><!--close site_content-->	
 
  </div><!--close main-->	
</body>
</html>
