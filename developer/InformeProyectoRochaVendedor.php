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
$query_registro = "select empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellidom = $row["apellido_materno"];

  }
mysql_free_result($result1);

$ESTADOV = $_GET["ESTADO"];
$PROCESO='';
$OK='';
$NULO='';
$PROGRAMADOS='';
$TODOS='';
$BUSCAR_CODIGO = '';
$BUSCAR_CODIGO1 = '';
$BUSCAR_CODIGO2 = '';
$BUSCAR_CODIGO3 = '';
$BUSCAR_CODIGO4 = '';
$txt_desde = '2000-05-27';
$txt_hasta = '2050-11-29';
if (isset($_GET["buscar"])) 
{    
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$BUSCAR_CODIGO1 = $_GET["buscar_codigo1"];
$BUSCAR_CODIGO3 = $_GET["buscar_codigo3"];
$BUSCAR_CODIGO4 = $_GET["buscar_codigo4"];
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title> Informe Rocha V1.0.0</title>
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
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>
  $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  
      $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
      
                   }
                 });
				    });
					
					  $(function(){
                $('#buscar_codigo1').autocomplete({
                   source : 'ajaxCliente.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
			
				
 
  </script>

</head>

<body>
<div id='bread'><div id="menu1"></div></div>
	
<form action="" method="get">
<center>
<h1>Informe Rocha </h1>
<table  id = "formulario">
<tr>
<td width="96"><center>Desde</center></td>
<td width="98"><input style="border:grey 1px solid;border-radius: 8px;width:100px;" name="txt_desde" id="txt_desde" type="text" /></td>
<td width="96"><center>Hasta</center></td>
<td width="98"><input style="border:grey 1px solid;border-radius: 8px;width:100px;;" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td width="74"><center>Rocha </center> </td>
<td width="98"><input style="border:grey 1px solid;border-radius: 8px;width:100px;"  type="text" id="buscar_codigo" name="buscar_codigo" value=""  ></td>
<td width="74"><center>Cliente</center> </td>
<td width="98"><input style="border:grey 1px solid;border-radius: 8px;width:100px;"  type="text" id="buscar_codigo1" name="buscar_codigo1" value=""  ></td>
<td width="74"><center>Linea </center> </td>
<td width="98"><select style="border:grey 1px solid;border-radius: 8px;width:100px;" name="buscar_codigo3" id="buscar_codigo3">
      <option></option>
      <option>Andersen</option>
      <option>Biblioteca Muró</option>
      <option>Campus</option>
      <option>Falcon </option>
      <option>Kadena</option>
      <option>Actiu - Muebles</option>
      <option>Multiple</option>
      <option>Bozz</option>
      <option>Dali</option>
      <option>Flow</option>
       
      <option>Tessela </option>
      <option>Staff</option>
      <option>Estado</option>
      <option>Madera</option>
      <option>Prototipos</option>
      <option>Full Space</option>
      <option>Cosmetal</option>
      <option>Lockers</option>
      <option>Producto Especial</option>
      
      <option>Mantenimiento Oficinas </option>
      <option>Fletes y Viaticos</option>
      <option>Desmonte y Reubicación</option>
      <option>Mano de Obra</option>
      <option>Mantenimiento Sillas</option>
      <option>Reparación Sillas</option>
      <option>Butacas Importadas</option>
      <option>Manufacturas Muñoz</option>
      <option>Actiu - Sillas</option>
      
      <option>Nowy Styl </option>
      <option>Dauphin</option>
      <option>Contatto</option>
      <option>Basflex</option>
      <option>Lovato</option>
      <option>FlexForm</option>
      <option>Grammer</option>
      <option>Sillas Scanform</option>
      <option>Sillas Varias </option>
       <option>VC Industrial</option>
      <option>Indumac </option>
      </select></td>
      <td width="74"><center>Departamento</center> </td>
<td width="98"><select style="border:grey 1px solid;border-radius: 8px;width:100px;" name="buscar_codigo4" id="buscar_codigo4">
      <option></option>
      <option>Los Conquistadores</option>
      <option>La Dehesa</option>
      <option>Beatriz Gonzalez</option>
      <option>Muebles y Diseños </option>
      <option>Sillas y Sillas</option>
      </select></td>

<?php 
$TODOS1 = "";
$ACTA1 = "";
$PROCESO1 = "";
$NULO1 = "";
$OK1 = "";
if($ESTADOV == "TODOS")
{
	$TODOS1 = 'selected';
}
else if($ESTADOV == "ACTA")
{
	$ACTA1 = 'selected';
}
else if($ESTADOV == "EN PROCESO")
{
	$PROCESO1 = 'selected';
}
else if($ESTADOV == "NULO")
{
	$NULO1 = 'selected';
}
else if($ESTADOV == "OK")
{
	$OK1 = 'selected';
}
?>

  
 <td width="96"><center> Estado </center></td>
  <td width="200">

  <select style="border:grey 1px solid;border-radius: 8px;width:100px;"  onchange="" id = "ESTADO" name = "ESTADO">
    <option></option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $ACTA1;?>>ACTA</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULA</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
  </td>



























<td width="98"> <input style=" color:#FFF;background-color: blue; height:25px;border-radius: 10px; width:70px; border:#fff 1px solid;" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>
<td width="66" align="right"></td>
</tr>
</table>
</center>
</form>
<br />
<center>
<table  width="100%" id = "informe_produccion" cellpadding="0" cellspacing="0"  style="font-size:9px;">
<tr>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>

	     <th width="80" height="20" style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Rocha</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Obra</center></th> 
		 <th width="80" style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha I</center></th>
		 <th width="80" style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha E</center></th>
         <th width="80" style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha C</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>US$</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Subtotal</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descuento</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Neto</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Linea</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Director</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Contacto</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Mail</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Estado</center></th></tr>
<?php
mysql_select_db($database_conn, $conn);




$SUB_TOTAL1 = 0;
$MONTO1 = 0;

if($BUSCAR_CODIGO!='')
{
	$query_registro = "select * from PROYECTO where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
else if($BUSCAR_CODIGO1!='')
{ 
	$query_registro = "select * from PROYECTO where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and  NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
else if($BUSCAR_CODIGO2!='')
{
	$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  EJECUTIVO = '".($BUSCAR_CODIGO2)."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
else if($BUSCAR_CODIGO3 !='')
{
	$query_registro = "select * from PROYECTO where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select * from PROYECTO where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
else
{
$query_registro = "select * from PROYECTO where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 0;
$FECHA_VARIABLE ="";


$mueble = 0;
$conquistadores = 0;
$beatris = 0;
$sillas = 0;
$ladehesa = 0;
$totalrocha = 0;
$mueblem = 0;
$conquistadoresm = 0;
$beatrism = 0;
$sillasm = 0;
$ladehesam = 0;
$totalrocham = 0;
 while($row = mysql_fetch_array($result))
  {  
  
 
    $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$OBRA = $row["OBRA"];
	$FECHA_INGRESO = $row["FECHA_INGRESO"];
	$FECHA_ENTREGA = $row["FECHA_ENTREGA"];
	$FECHA_CONFIRMACION = $row["FECHA_CONFIRMACION"];
	$ESTADO = $row["ESTADO"];
	$DIAS = $row["DIAS"];
	$SUB_TOTAL = $row["SUB_TOTAL"];
	$DESCUENTO = $row["DESCUENTO"];
	$MONTO= $row["MONTO"];
	$DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
	$EJECUTIVO= $row["EJECUTIVO"];
	$CONTACTO= $row["CONTACTO"];
	$ESTADO= $row["ESTADO"];
    $MAIL= $row["MAIL"];

  
	if($ESTADO != 'NULA')
	{
	if( substr($CODIGO_PROYECTO,0,1) == 'L')
	{
		$ladehesa++;
		$ladehesam+=$row['MONTO'];
	}
	else if( substr($CODIGO_PROYECTO,0,1) == 'M')
	{
		$mueble++;
		$mueblem+=$row['MONTO'];
	}
	else if( substr($CODIGO_PROYECTO,0,1) == 'B')
	{
		$beatris++;
		$beatrism+=$row['MONTO'];
	}
   else if( substr($CODIGO_PROYECTO,0,1) == 'S')
	{
		$sillas++;
	    $sillasm+=$row['MONTO'];
	}
	else
	{
		$conquistadores++;
	    $conquistadoresm+=$row['MONTO'];
	}
	}
	
	
	if($numero1 == 20)
	{
		echo "<tr>
<th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Cliente</center></th>

	     <th height='20' style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Rocha</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Obra</center></th> 
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha I</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha E</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Fecha C</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Dias</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>US$</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Subtotal</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Descuento</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Neto</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Linea</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Director</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Contacto</center></th>
		 <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Mail</center></th>
         <th style='border-top: #E4E4E7 1px solid;border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>Estado</center></th></tr>";
	$numero1 = 0;
	}
	
	
	 if($BUSCAR_CODIGO4 == "")
  {
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
 }
    else if($BUSCAR_CODIGO4 == "La Dehesa")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'L')
	{
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
	}
    }
	 else if($BUSCAR_CODIGO4 == "Beatriz Gonzalez")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'B')
	{
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
	}
    }
	 else if($BUSCAR_CODIGO4 == "Sillas y Sillas")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'S')
	{
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
	}
    }
		 else if($BUSCAR_CODIGO4 == "Muebles y Diseños")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'M')
	{
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
	}
    }
	else if( substr($CODIGO_PROYECTO,0,1) != 'S' && substr($CODIGO_PROYECTO,0,1) != 'B' && substr($CODIGO_PROYECTO,0,1) != 'M' && substr($CODIGO_PROYECTO,0,1) != 'L')
	{
	echo  "<tr><td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($NOMBRE_CLIENTE)."</td>";
    echo  "<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center> <a id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($OBRA)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_INGRESO,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_ENTREGA,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".substr($FECHA_CONFIRMACION,0,11)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DIAS)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($SUB_TOTAL,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".($DESCUENTO)."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'><center>".number_format($MONTO,0, ",", ".")."<center></td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($DEPARTAMENTO_CREDITO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".$EJECUTIVO."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($CONTACTO)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;'>".($MAIL)."</td>";
	echo  "<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;border-right: #E4E4E7 1px solid'>".($ESTADO)."</td></tr>";
	$numero++;
	$numero1++;	
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
	}
	}
	
	
  }
  mysql_free_result($result);


?>
<tr>
<td style='border-left: #E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' colspan=""><b>total</b> </td>
<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' colspan=""><b> <?php echo $totalrocha; ?></b>  </td>

<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' align="right" colspan="6"><b> total</b>  </td>
<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' align="center"><b> <?php echo number_format($SUB_TOTAL1,0, ",", ".") ?></b></td>
<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid;' colspan=""> <b> total </b></td>
<td style='border-left:#E4E4E7 1px solid;border-bottom: #E4E4E7 1px solid; border-right:#E4E4E7 1px solid;' align="center"><b> <?php echo number_format($MONTO1,0, ",", ".") ?></b></td>
</tr>
</table>
</center>
<br />
<center>
<table width="1000" border="0">
<tr>
<td  valign="top">

<table style="font-size:10px;" ID="LINEA"   width="450" rules="all" frame="box" >
<tr>
<th>N°</th>
<th>Linea</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<?php
if($BUSCAR_CODIGO4 == "Muebles y Diseños")
{
	$letra = 'M';
}
else if($BUSCAR_CODIGO4 == "Beatriz Gonzalez")
{
	$letra = 'B';
}
else if($BUSCAR_CODIGO4 == "La Dehesa")
{
	$letra = 'L';
}
else if($BUSCAR_CODIGO4 == "Sillas y Sillas")
{
	$letra = 'S';
}




if($BUSCAR_CODIGO4 == '')
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by proyecto.MONTO DESC";
}
}
///
else if($BUSCAR_CODIGO4 == "Los Conquistadores")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."'  and '".$txt_hasta."'    and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'    and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by proyecto.MONTO DESC";
}	
}
else if($BUSCAR_CODIGO4 == "Muebles y Diseños" || $BUSCAR_CODIGO4 == "Beatriz Gonzalez" || $BUSCAR_CODIGO4 == "La Dehesa" || $BUSCAR_CODIGO4 == "Sillas y Sillas")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '".$letra."%'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."'  and '".$txt_hasta."'   and like CODIGO_PROYECTO '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and like CODIGO_PROYECTO '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,DEPARTAMENTO_CREDITO  FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by proyecto.MONTO DESC";
}	
}



$result = mysql_query($query_registro, $conn) or die(mysql_error());
$contador = 1;
 $MONTO3 = 0;
 while($row = mysql_fetch_array($result))
  {  
  $MONTO= $row["MONTO"];
  $DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
  $POR = 0;
  if($MONTO > 0 && $MONTO1 > 0)
  {
	  $POR = $MONTO / $MONTO1 * 100; 
  }
    echo "<tr><td>   ".$contador."  </td>";
   echo "<td>   ".$DEPARTAMENTO_CREDITO."  </td>";
   echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
    echo "<td  align='right'>".number_format($POR,2, ",", ".")."%</td></tr>";
		$contador++;
	  $MONTO3+=$row['MONTO'];
  }
   mysql_free_result($result);

?>
<tr>
<td colspan="2" align="right"></td>
<td align="right"><?php echo number_format($MONTO3,0, ",", ".") ?></td>
</tr>

</table>
</td>
<td  valign="top">
<table style="font-size:10px;" width="450" ID="EJECUTIVO"  rules="all" frame="box" >
<tr>
<th>N°</th>
<th>Linea</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<?php

if($BUSCAR_CODIGO4 == '')
{

if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO   order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by proyecto.MONTO DESC";
}
}
else if($BUSCAR_CODIGO4 == "Los Conquistadores")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO  FROM   proyecto where  EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'  GROUP BY EJECUTIVO   order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by proyecto.MONTO DESC";
}
}
else if($BUSCAR_CODIGO4 == "Muebles y Diseños" || $BUSCAR_CODIGO4 == "Beatriz Gonzalez" || $BUSCAR_CODIGO4 == "La Dehesa" || $BUSCAR_CODIGO4 == "Sillas y Sillas")
{
	if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO  FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO   order by MONTO DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO like '".$letra."%' GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM   proyecto where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by MONTO DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,EJECUTIVO   FROM proyecto  where EJECUTIVO  = '".$nombres." ".$apellido ." ".$apellidom."' AND proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by proyecto.MONTO DESC";
}
}


$result = mysql_query($query_registro, $conn) or die(mysql_error());
$contador = 1;
 $MONTO3=0;
 while($row = mysql_fetch_array($result))
  {  
  $MONTO= $row["MONTO"];
  $DEPARTAMENTO_CREDITO= $row["EJECUTIVO"];
   $POR = 0;
  if($MONTO > 0  && $MONTO1 > 0)
  {
	  $POR = $MONTO / $MONTO1 * 100; 
  }
   echo "<tr><td>   ".$contador."  </td>";
   echo "<td>   ".($DEPARTAMENTO_CREDITO)."  </td>";
   echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
    echo "<td  align='right'>".number_format($POR,2, ",", ".")."%</td></tr>";
	$contador++;
	$MONTO3+=$row['MONTO'];
  }
   mysql_free_result($result);
    mysql_close($conn);
?>

<tr>
<td colspan="2" align="right"></td>
<td align="right"><?php echo number_format($MONTO3,0, ",", ".") ?></td>
</tr>
</table>
</td>
<td valign="top">
<?php 
if($conquistadoresm > 0 && $MONTO1 > 0)
{
$conquistadorest = $conquistadoresm / $MONTO1 * 100;
}
else
{
$conquistadorest = 0;	
}
if($ladehesam > 0 && $MONTO1 > 0)
{
$ladehesat = $ladehesam / $MONTO1 * 100;
}
else
{
$ladehesat = 0;	
}
if($mueblem > 0 && $MONTO1 > 0)
{
$mueblet = $mueblem / $MONTO1 * 100;
}
else
{
$mueblet = 0;	
}
if($sillasm > 0 && $MONTO1 > 0)
{
$sillat = $sillasm / $MONTO1 * 100;
}
else
{
$sillat = 0;	
}
if($beatrism > 0 && $MONTO1 > 0)
{
$beatrist = $beatrism / $MONTO1 * 100;
}
else
{
$beatrist = 0;	
}
?>
<table style="font-size:10px;" width="300" ID="EJECUTIVO"  rules="all" frame="box">
<tr>
<th>Departamento</th>
<th>Proyecto</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<tr>
<td><a>Los Conquistadores</a></td>
<td align="right"><?php echo $conquistadores ?></td>
<td align="right"><?php echo number_format($conquistadoresm,0, ",", ".") ?></td>
<td align="right"><?php echo number_format($conquistadorest,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>La Dehesa</td>
<td align="right"><?php echo $ladehesa ?></td>
<td align="right"><?php echo number_format($ladehesam,0, ",", ".") ?></td>
<td align="right"><?php echo number_format($ladehesat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Muebles y Diseños</td>
<td align="right"><?php echo $mueble ?></td>
<td align="right"><?php echo number_format($mueblem,0, ",", ".") ?></td>
<td align="right"><?php echo number_format($mueblet,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Beatriz Gonzalez</td>
<td align="right"><?php echo $beatris ?></td>
<td align="right"><?php echo number_format($beatrism,0, ",", ".") ?></td>
<td align="right"><?php echo number_format($beatrist,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Sillas y Sillas</td>
<td align="right"><?php echo $sillas ?></td>
<td align="right"><?php echo number_format($sillasm,0, ",", ".") ?></td>
<td align="right"><?php echo number_format($sillat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td><b>Total</b></td>
<td align="right"><?php echo $totalrocha ?></td>
<td align="right"><?php echo number_format( $MONTO1,0, ",", ".") ?></td>
</tr>
</table>
</td>
</tr>
</table>

</center>	
</body>
</html>