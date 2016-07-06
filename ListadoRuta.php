<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
 <title>Rutas V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_ListadoHojaRuta.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script src='js/breadcrumbs.php'></script>

  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript> 
  $(function() 
   {
     $( "#fechai" ).datepicker({dateFormat: 'yy-mm-dd'});
     $( "#fechae" ).datepicker({dateFormat: 'yy-mm-dd'});  
   });
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : function(event, ui){
                   }
            });
  });		
	 $(function() 
    {
		  $( ".textf" ).datepicker({dateFormat: 'yy-mm-dd'});
    });  
  function enviar()
  {
    var as1= confirm("Realmente deseas modificar");
    if(as1)                   
    {
      document.getElementById("formulario1").submit();
    }
    else
    {
    return false;
  //window.location="Materiales.php";
    }
    } 
    /*$(function(){
$('#rocha').autocomplete({
source : 'ajaxProyecto.php',
select : 
function(event, ui)
{
}
});
});*/
  
 </script>
</head>
<body>
 	<div id='bread'><div id="menu1"></div></div>		   
  	   
<form  method="GET"/>  
<div class="contenedor-listado-ruta">
  <h1 id='lhl'> Listado de ruta </h1>
  <table class="listado-ruta">
  <tr>
  <td>
    <input placeholder="Numero" type="text" autocomplete="off" class='textbox' id="buscar_codigo" name="buscar_codigo" > 
  </td>
  <td>
    <select class='textbox' id = "conductor" name = "conductor">
      <option value="">Conductor</option>
      <?php 
      $query_registro = 
      "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
      grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'DES'";  
      $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result1))
      {
      ?>
      <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?></option>
      <?php 
      }mysql_free_result($result1);
      ?>
      </select>
    </td> 
  <td> 
    <select class='textbox' onchange="selecciona();" id = "vehiculo" name = "vehiculo">
    <option value="">Vehiculo</option>
    <?php 
    $query_registro = "select * from VEHICULO order by PATENTE ASC";
    $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result1))
    {
    ?>
      <option value = "<?php echo ($row['PATENTE']) ?>" > <?php echo ($row['PATENTE']) ?></option>
      <?php 
    } mysql_free_result($result1);
    ?>
    <option></option>
    </select></td>
    <td><select  id = "estado1" class='textboxs'  name = "estado1">
    <option value="">Estado</option>
    <option>EN RUTA</option>
    <option>EN PROCESO</option>
    <option>NULO </option>
    <option>OK</option>
    <option>TODOS</option>
    </select>
  </td> 
  </tr>
  <tr>
  </td>
    <td><input placeholder="Fecha Inicio" type="text" autocomplete="off" class='textbox' id="fechai" name="fechai" > </td>
    <td><input placeholder="Fecha Entrega" type="text" autocomplete="off" class='textbox' id="fechae" name="fechae" > </td>
    <td><select class='textbox' id="zona" name="zona"> <option value="">Zona</option> <option value='Centro'>Centro</option> <option value='Norte'>Norte</option> <option value='Sur'>Sur</option> </select> </td>
    <td><input type="submit" name = "buscar" id='buscar' value="Buscar"/></td>
  </tr>
  </table>	
</div>
</form>  

<table  id="tabla_hoja" width="100%">
<tr>
<th>Codigo Ruta</th>
<th>Conductor</th>
<th>Vehiculo</th>
<th>M3</th>
<th>ZONA</th>
<th>KI</th>
<th>KF</th>
<th>KR</th>
<th>Fecha</th>
<th>Estado</th>
</tr>

<?php
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	
$ES = "";
$zona1 = "";
//listado de materiales
////////////////////////////////
if (isset($_GET["buscar"])) 
{
$BUSCAR_CODIGO = $_GET['buscar_codigo'];	
$ES = $_GET['estado1'];
$VEHICULO = $_GET['vehiculo'];
$CONDUCTOR = $_GET['conductor'];
$FECHAI = $_GET['fechai'];
$FECHAE = $_GET['fechae'];
$zona1 = $_GET['zona'];


 if($ES == ""){
  $query_registro = "SELECT * FROM ruta  WHERE CODIGO_RUTA > 230 and estado IN ('EN PROCESO','EN RUTA')";

 }else if($ES == "TODOS"){
  $query_registro = "SELECT * FROM ruta  WHERE CODIGO_RUTA > 230";
 }else{
  $query_registro = "SELECT * FROM ruta  WHERE CODIGO_RUTA > 230 and ESTADO = '".$ES."'";
 }
 if($VEHICULO != ""){
  $query_registro.= " and PATENTE = '".$VEHICULO."'";
 }
 if($CONDUCTOR != ""){
  $query_registro.= " and CONDUCTOR = '".$CONDUCTOR."'";
 }
 if($FECHAI != "" && $FECHAE != ""){
  $query_registro.= " and FECHA between '".$FECHAI."' AND '".$FECHAE."' ";
 }
 if($BUSCAR_CODIGO != ""){
  $query_registro.= " and CODIGO_RUTA = '".$BUSCAR_CODIGO."'";
 }

 $query_registro.= "  ORDER BY CODIGO_RUTA desc";

}
else
{
 $query_registro = "SELECT * FROM ruta  WHERE CODIGO_RUTA > 230 and estado IN ('EN PROCESO','EN RUTA') ORDER BY CODIGO_RUTA desc";
}

$numero = 0;
$numero1 = 0;
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
  $CODIGO_RUTA= $row["CODIGO_RUTA"];
  $ESTADO = $row["ESTADO"];
  $FECHA = $row["FECHA"];
  $PATENTE = $row["PATENTE"];
  $KI = $row["KM_INICIO"];
  $KF = $row["KM_FIN"];
  $KR = $row["KM_RECORRIDOS"];
  $CONDUCTOR = $row["CONDUCTOR"];

  $total_m3 ="";
  $sqla =  "SELECT distinct sum(servicio.M3) as total FROM servicio, ruta, servicio_ruta WHERE servicio.CODIGO_SERVICIO = servicio_ruta.CODIGO_SERVICIO and servicio_ruta.CODIGO_RUTA = ruta.CODIGO_RUTA   AND ruta.CODIGO_RUTA = ".$CODIGO_RUTA."";
  $resulta = mysql_query($sqla, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($resulta))
  {
    $total_m3 = $row["total"];
  }
  mysql_free_result($resulta);
  $vehiculo_m3 = "";
  $sqla = "SELECT M3 FROM VEHICULO WHERE  PATENTE = '".$PATENTE."' ";
  $resulta = mysql_query($sqla, $conn) or die(mysql_error());

  while($row = mysql_fetch_array($resulta))
  {
    $vehiculo_m3 = $row["M3"];
  }
  mysql_free_result($resulta);



  /*ZONA*/

  $sqla =  "SELECT * FROM servicio, ruta, servicio_ruta WHERE servicio.CODIGO_SERVICIO = servicio_ruta.CODIGO_SERVICIO and servicio_ruta.CODIGO_RUTA = ruta.CODIGO_RUTA   AND ruta.CODIGO_RUTA = ".$CODIGO_RUTA."";
  $resulta = mysql_query($sqla, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($resulta))
  {
    $CODIGO_COMUNA = $row["CODIGO_COMUNA"];
  }
  mysql_free_result($resulta);
  $ZONA_A = "";
  $query_registro1 = "SELECT comunas.NOMBRE_COMUNA,region_1.NOMBRE,region_1.ZONA  FROM comunas,region_1 WHERE region_1.CODIGO = comunas.CODIGO_REGION1 and comunas.CODIGO_COMUNA  ='".$CODIGO_COMUNA."'";
  $result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result1))
    {

      $ZONA_A= $row["ZONA"];
    }

if($numero1 == 20)
{
	echo "<tr>
<th>Codigo Ruta</th>
<th>Conductor</th>
<th>Vehiculo</th>
<th>M3</th>
<th>ZONA</th>
<th>KI</th>
<th>KF</th>
<th>KR</th>
<th>Fecha</th>
<th>Estado</th>
</tr>";
$numero1 = 0;
}
	if($zona1 == "")
  {
    echo "<tbody><tr><td align='center'> <a href=Ruta_entrega.php?CODIGO_RUTA=" .$CODIGO_RUTA. ">" . 
	    $CODIGO_RUTA . "</a><input style='display:none;' onchange='enviar();' id = 'codoc".$numero."' name='codoc".$numero."' type='text' value='".$CODIGO_RUTA."' class='textf'/></td>";
		echo "<td>" . 
	    ($CONDUCTOR) . "</td>";
    echo "<td align = 'left'>" . 
      ($PATENTE) ." (".$vehiculo_m3." M3)" . "</td>"; 
    echo "<td align = 'right'>" . 
      ($total_m3) . "</td>"; 
    echo "<td align = 'center'>" . 
      ($ZONA_A) . "</td>"; 
    echo "<td align='right'>" . 
      number_format($KI,0,",",".") . "</td>"; 		
    echo "<td align='right'>" . 
      number_format($KF,0,",",".") . "</td>"; 
    echo "<td align='right'>" . 
      number_format($KR,0,",",".")  . "</td>"; 
	  echo "<td align = 'center'>" . 
	    ($FECHA) . "</td>";	
    echo "<td align = 'center'>" . 
	    $ESTADO. "</td></tr></tbody>"; 
      $numero++;
      $numero1++;
  }
  else if($zona1 == $ZONA_A)
  {
    echo "<tbody><tr><td align='center'> <a href=Ruta_entrega.php?CODIGO_RUTA=" .$CODIGO_RUTA. ">" . 
      $CODIGO_RUTA . "</a><input style='display:none;' onchange='enviar();' id = 'codoc".$numero."' name='codoc".$numero."' type='text' value='".$CODIGO_RUTA."' class='textf'/></td>";
    echo "<td>" . 
      ($CONDUCTOR) . "</td>";
    echo "<td align = 'left'>" . 
      ($PATENTE) ." (".$vehiculo_m3." M3)" . "</td>"; 
    echo "<td align = 'right'>" . 
      ($total_m3) . "</td>"; 
    echo "<td align = 'center'>" . 
      ($ZONA_A) . "</td>"; 
    echo "<td align='right'>" . 
      number_format($KI,0,",",".") . "</td>";     
    echo "<td align='right'>" . 
      number_format($KF,0,",",".") . "</td>"; 
    echo "<td align='right'>" . 
      number_format($KR,0,",",".")  . "</td>"; 
    echo "<td align = 'center'>" . 
      ($FECHA) . "</td>"; 
    echo "<td align = 'center'>" . 
      $ESTADO. "</td></tr></tbody>"; 
      $numero++;
      $numero1++;
  }
     
  }

	  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
    mysql_free_result($result);
    mysql_close($conn);



?>
</table>
</body>
</html>
