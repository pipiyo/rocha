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
$PRECIO_UNITARIOTO2 = 0;
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
$month = date('m');
$year = date("Y");
$txt_hasta = date("Y-m-d",(mktime(0,0,0,$month+1,1,$year)-1));
$txt_desde = date("Y-m-d",(mktime(0,0,0,$month-0,1,$year)+1));
if (isset($_GET["buscar"])) 
{    
$BUSCAR_CODIGO = $_GET["buscar_codigo"];
$BUSCAR_CODIGO1 = $_GET["buscar_codigo1"];
$BUSCAR_CODIGO2 = $_GET["buscar_codigo2"];
$BUSCAR_CODIGO3 = $_GET["buscar_codigo3"];
$BUSCAR_CODIGO4 = $_GET["buscar_codigo4"];
if($BUSCAR_CODIGO != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO1 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO2 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO3 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
else if($BUSCAR_CODIGO4 != "")
{
$txt_desde = '2012-01-01';
$txt_hasta = '2020-01-01';
}
if($_GET["txt_desde"] != "" and $_GET["txt_hasta"] != "" )  
{
$txt_desde = $_GET["txt_desde"];
$txt_hasta = $_GET["txt_hasta"];
}
}

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
  <title> Informe Rocha V2.0.0</title>
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>


  <!-- Tabla -->
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
  <script src='js/encabezado-fixed.js'></script>


  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
      
  $(function(){
     $('#informe_produccion').tablesorter(); 
  });

      $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProyectoTodo.php',
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
<center>
	
<form action="" method="get">
<div  id='header-proyecto-rocha'>
<div id='bread'><div id="menu1"></div></div>
<div id='contenedor-ins' class="formulario-informes">
<h1>Informe Rocha </h1>
<table  id = "formulario">
<tr>
<td><input placeholder="Desde" class="textbox" name="txt_desde" id="txt_desde" type="text" /></td>
<td><input placeholder="Hasta" class="textbox" name="txt_hasta" id="txt_hasta" type="text" /></td>
<td><input placeholder="Rocha" class="textbox" type="text" id="buscar_codigo" name="buscar_codigo" value=""  ></td>
<td><input Placeholder="Cliente" class="textbox"  type="text" id="buscar_codigo1" name="buscar_codigo1" value=""  ></td>
<td><select name="buscar_codigo2" id="buscar_codigo2" type ="text" class="textbox" >
<option value="">Director </option>
<?php 
$query_registro = 
"select DISTINCT empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres ";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
 {
?>
<option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
 <?php 
 } mysql_free_result($result1);
 ?> 
</select></td>
</tr>
<tr>
<td><select  class="textbox" name="buscar_codigo3" id="buscar_codigo3">
      <option value="">Linea</option>
      <option>Actiu - Muebles</option>
      <option>Actiu - Sillas</option>
      <option>Andersen</option>
      <option>All Seating</option>
      <option>Basflex</option>
      <option>Biblioteca Muró</option>
      <option>Butacas Importadas</option>
      <option>Bozz</option>
      <option>Campus</option>
      <option>Cerantola</option>
      <option>Contatto</option>
      <option>Cosmetal</option>
      <option>Dali</option>
      <option>Dauphin</option>
      <option>Desmonte y Reubicación</option>
      <option>Esencial </option>
      <option>Estado</option>
      <option>Falcon </option>
      <option>Fletes y Viaticos</option>
      <option>FlexForm</option>
      <option>Flow</option>
      <option>Full Space</option>
      <option>Grammer</option>
      <option>Indumac </option>
      <option>Interno</option>
      <option>Kadena</option>
      <option>Lloy</option>
      <option>Lockers</option>
      <option>Lovato</option>
      <option>Madera</option>
      <option>Mano de Obra</option>
      <option>Mantenimiento Sillas</option>
      <option>Mantenimiento Oficinas </option>
      <option>Manufacturas Muñoz</option>
      <option>Mmobili</option>
      <option>Multiple</option>
      <option>Muma </option>
      <option>Nowy Styl </option>
      <option>Nueva Imagen </option>
      <option>Producto Especial</option>
      <option>Prototipos</option>
      <option>Reparación Sillas</option>
      <option>Staff</option>
      <option>Servicio Refaccion</option>
      <option>Sillas Scanform</option>
      <option>Sillas Varias </option>
      <option>Tessela </option>
      <option>VC Industrial</option>
      </select></td>
<td><select class="textbox" name="buscar_codigo4" id="buscar_codigo4">
      <option value="">Departamento</option>
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

  <td>

  <select class="textbox"  onchange="" id = "ESTADO" name = "ESTADO">
    <option value="">Estado</option>
    <option <?php echo $TODOS1;?> >TODOS</option>
    <option <?php echo $ACTA1;?>>ACTA</option>
    <option <?php echo $PROCESO1;?>>EN PROCESO</option>
    <option <?php echo $NULO1;?>>NULA</option>
    <option <?php echo $OK1;?>>OK</option>
  </select>
  </td>
<td align='center'><a href="ExcelInformeRocha.php?txt_desde=<?php echo $txt_desde;?>&txt_hasta=<?php echo $txt_hasta;?>&ESTADO=<?php echo urlencode($ESTADOV);?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel"></td>
<td align="center"> <input class="boton" type="submit" id="buscar" name = "buscar" value = "Buscar" /> </td>

</tr>
</table>
</div>
</div>
</form>

<br />

<table class='fixed tabla-rocha' id = "informe_produccion">
<thead>
<tr class='cheader'>
<th>Cliente</th>
<th>Rocha</th>
<th>Obra</th> 
<th>Fecha I</th>
<th>Fecha E</th>
<th>Fecha C</th>
<th>Dias</th>
<th>Subtotal</th>
<th>Descuento</th>
<th>Neto</th>
<th>Linea</th>
<th>Puestos</th>
<th>Director</th>
<th>Contacto</th>
<th>Mail</th>
<th>Estado</th></tr>
</thead><tbody>
<?php
ini_set('max_execution_time', 500);
mysql_select_db($database_conn, $conn);




if($BUSCAR_CODIGO!='')
{
	$query_registro = "select * from PROYECTO where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO1!='')
{ 
	$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO2!='')
{
	$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  EJECUTIVO = '".($BUSCAR_CODIGO2)."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO3 !='')
{
	$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
else
{
$query_registro = "select * from PROYECTO where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' order by proyecto.FECHA_INGRESO desc ";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numero1 = 0;
$FECHA_VARIABLE ="";
$mueble = 0;
$conquistadores = 0;
$conquistadores1 = 0;
$conquistadores2 = 0;
$conquistadoresm1 = 0;
$conquistadoresm2 = 0;
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
$SUB_TOTAL1 = 0;
$MONTO1 = 0;
$DIAS1 = 0;
$PUESTOS1 = 0;
$MONTO2 = 0;

$totalrochagen=0;
 while($row = mysql_fetch_array($result))
  {  
  $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$OBRA = $row["OBRA"];
  $PUESTOS = $row["PUESTOS"];
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
	$NETO2 = $row["MONTO2"];
	
  if($BUSCAR_CODIGO4 == "")
  {
	if($ESTADO != 'NULA')
	{
	if( strpos($CODIGO_PROYECTO, "LD") !== false)
	{
		$ladehesa++;
		$ladehesam+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
	else if( substr($CODIGO_PROYECTO,0,1) == 'M')
	{
		$mueble++;
		$mueblem+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
	else if( substr($CODIGO_PROYECTO,0,1) == 'B')
	{
		$beatris++;
		$beatrism+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
   else if( substr($CODIGO_PROYECTO,0,1) == 'S')
	{
		$sillas++;
	  $sillasm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
	else
	{
	
    if($EJECUTIVO == "Carolina Oyarzo Aravena" || $EJECUTIVO == "Beatriz Gonzalez Garcia" || $EJECUTIVO == "Gabriela Sepúlveda Saavedra" || $EJECUTIVO == "Maritza Rojas Batarce" || $EJECUTIVO == "Monserrat Irribarra Vergara" || $EJECUTIVO == "Nathalie Feijo" || $EJECUTIVO == "Juan José Gomez Gutierrez")
    {
    $conquistadores++;
    $conquistadores1++;
    $conquistadoresm1+=$row['MONTO'];
	  $conquistadoresm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
    }
    else if($EJECUTIVO == "Salomon Samaan Rozeznic" || $EJECUTIVO == "Neida Miranda Gonzalez" || $EJECUTIVO == "Carolina Olivares Echeverria" || $EJECUTIVO == "Maria Moraga Baeza"  )
    {
    $conquistadores++;
    $conquistadores2++; 
    $conquistadoresm2+=$row['MONTO'];
	  $conquistadoresm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
    }
	}
	}
  }
  else if($BUSCAR_CODIGO4 == "La Dehesa")
  {
	  if( strpos($CODIGO_PROYECTO, "LD") !== false)
	{
		$ladehesa++;
		$ladehesam+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
  }
  else if ($BUSCAR_CODIGO4 == "Sillas y Sillas")
  {
	if( substr($CODIGO_PROYECTO,0,1) == 'S')
	{
	  $sillas++;
	  $sillasm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}  
  }
  else if ($BUSCAR_CODIGO4 == "Beatriz Gonzalez")
  {
	if( substr($CODIGO_PROYECTO,0,1) == 'B')
	{
		$beatris++;
		$beatrism+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	} 
  }
    else if ($BUSCAR_CODIGO4 == "Muebles Y Diseños")
  {
	if( substr($CODIGO_PROYECTO,0,1) == 'M')
	{
		$mueble++;
		$mueblem+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
	}
  }
   else if ($BUSCAR_CODIGO4 == "Los Conquistadores")
  {
	  if( substr($CODIGO_PROYECTO,0,1) != 'M' && substr($CODIGO_PROYECTO,0,1) != 'B' && strpos($CODIGO_PROYECTO, "LD") === false && substr($CODIGO_PROYECTO,0,1) != 'S')
	{
		
  if($EJECUTIVO == "Carolina Oyarzo Aravena" || $EJECUTIVO == "Beatriz Gonzalez Garcia" || $EJECUTIVO == "Gabriela Sepúlveda Saavedra" || $EJECUTIVO == "Maritza Rojas Batarce" || $EJECUTIVO == "Monserrat Irribarra Vergara" || $EJECUTIVO == "Nathalie Feijo" || $EJECUTIVO == "Juan José Gomez Gutierrez")
    {
    $conquistadores++;
    $conquistadores1++;
    $conquistadoresm1+=$row['MONTO'];
	  $conquistadoresm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];

    }
    else if($EJECUTIVO == "Salomon Samaan Rozeznic" || $EJECUTIVO == "Neida Miranda Gonzalez" || $EJECUTIVO == "Carolina Olivares Echeverria" || $EJECUTIVO == "Maria Moraga Baeza"  )
    {
    $conquistadores++;
    $conquistadores2++; 
    $conquistadoresm2+=$row['MONTO'];
	  $conquistadoresm+=$row['MONTO'];
    $totalrocha++;
    $MONTO2+=$row['MONTO'];
    }

	}
  }

	
	
	if($BUSCAR_CODIGO4 == "")
  {
	$numero++;
	$numero1++;
  $totalrochagen++;
	
	if($ESTADO != 'NULA')
	{
	$SUB_TOTAL1+=$row['SUB_TOTAL'];
	$MONTO1+=$row['MONTO'];
  $PUESTOS1+=$row['PUESTOS'];
	}


  //////Fin
	  
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center'> <a align = 'center' id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO. "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center'  >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center'  >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center' >".($DESCUENTO)."</td>";
	echo  "<td align='right' >".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td>".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center'  >".$PUESTOS."</td>";
	echo  "<td>".$EJECUTIVO."</td>";
	echo  "<td>".($CONTACTO)."</td>";
	echo  "<td>".($MAIL)."</td>";
	echo  "<td>".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
 }
    else if($BUSCAR_CODIGO4 == "La Dehesa")
    {
		if( strpos($CODIGO_PROYECTO, "LD") !== false)
	  {
	 	$numero++;
	   $numero1++;
    	$totalrocha++;
	     if($ESTADO != 'NULA')
	       {
	        $SUB_TOTAL1+=$row['SUB_TOTAL'];
	        $MONTO1+=$row['MONTO'];
           $PUESTOS1+=$row['PUESTOS'];
	       }



  //////Fin
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center'> <a align='center'  id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center'  >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center'  >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center'  >".($DESCUENTO)."</td>";
	echo  "<td align='right' >".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td >".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center' >".$PUESTOS."</td>";
	echo  "<td >".$EJECUTIVO."</td>";
	echo  "<td >".($CONTACTO)."</td>";
	echo  "<td >".($MAIL)."</td>";
	echo  "<td >".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
	}
    }
	 else if($BUSCAR_CODIGO4 == "Beatriz Gonzalez")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'B')
	{
		$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
     $PUESTOS1+=$row['PUESTOS'];
	}
	
  //////Fin
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center'  > <a align='center' id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center' >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center'>".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center' >".($DESCUENTO)."</td>";
	echo  "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td >".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center' >".$PUESTOS."</td>";
	echo  "<td >".$EJECUTIVO."</td>";
	echo  "<td >".($CONTACTO)."</td>";
	echo  "<td >".($MAIL)."</td>";
	echo  "<td >".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
	}
    }
	 else if($BUSCAR_CODIGO4 == "Sillas y Sillas")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'S')
	{
	$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
     $PUESTOS1+=$row['PUESTOS'];
	}	
	
  //////Fin
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center'  > <a align='center'  id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center' >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center'>".($DESCUENTO)."</td>";
	echo  "<td align='right' >".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td >".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center' >".$PUESTOS."</td>";
	echo  "<td >".$EJECUTIVO."</td>";
	echo  "<td >".($CONTACTO)."</td>";
	echo  "<td >".($MAIL)."</td>";
	echo  "<td >".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
	}
    }
		 else if($BUSCAR_CODIGO4 == "Muebles y Diseños")
    {
		if( substr($CODIGO_PROYECTO,0,1) == 'M')
	{
		$numero++;
	$numero1++;
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	 $MONTO1+=$row['MONTO'];
   $PUESTOS1+=$row['PUESTOS'];
	}
	
  //////Fin
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center' > <a align='center'  id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center' >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center' >".($DESCUENTO)."</td>";
	echo  "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td >".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center' >".$PUESTOS."</td>";
	echo  "<td >".$EJECUTIVO."</td>";
	echo  "<td >".($CONTACTO)."</td>";
	echo  "<td >".($MAIL)."</td>";
	echo  "<td >".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
	}
    }
	else if( substr($CODIGO_PROYECTO,0,1) != 'S' && substr($CODIGO_PROYECTO,0,1) != 'B' && substr($CODIGO_PROYECTO,0,1) != 'M' && strpos($CODIGO_PROYECTO, "LD") === false)
	{
		$numero++;
	$numero1++;	
	$totalrocha++;
	if($ESTADO != 'NULA')
	{
	 $SUB_TOTAL1+=$row['SUB_TOTAL'];
	  $MONTO1+=$row['MONTO'];
     $PUESTOS1+=$row['PUESTOS'];
	}

  //////Fin
	echo  "<tr><td >".($NOMBRE_CLIENTE)."</td>";
  echo  "<td align='center' > <a align='center' id='cod_ser' target='_blank' href=editarProyecto.php?CODIGO_PROYECTO=". urlencode($CODIGO_PROYECTO).">" . $CODIGO_PROYECTO . "</a></td>";	
	echo  "<td height='20' >".($OBRA)."</td>";
	echo  "<td align='center' >".substr($FECHA_INGRESO,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_ENTREGA,0,11)."</td>";
	echo  "<td align='center' >".substr($FECHA_CONFIRMACION,0,11)."</td>";
	echo  "<td align='center' >".($DIAS)."</td>";
	echo  "<td align='right' >".number_format($SUB_TOTAL,0, ",", ".")."</td>";
	echo  "<td align='center' >".($DESCUENTO)."</td>";
	echo  "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
	echo  "<td >".($DEPARTAMENTO_CREDITO)."</td>";
  echo  "<td align='center' >".$PUESTOS."</td>";
	echo  "<td >".$EJECUTIVO."</td>";
	echo  "<td >".($CONTACTO)."</td>";
	echo  "<td >".($MAIL)."</td>";
	echo  "<td >".($ESTADO)."</td></tr>";
	
  $DIAS1+=$DIAS;
	}

	//////Fin
	
	
  }


  if($DIAS1 != 0 && $totalrocha != 0)
  {
    $DIAS1 = ($DIAS1 / $totalrocha);
  }
  mysql_free_result($result);


?>
</tbody>
<tr>
<td align='right'  colspan=""><b>Total</b> </td>
<td align='center'   colspan="4"><b> <?php echo $totalrochagen; ?></b>  </td>
<td  colspan=""><b>Promedio dias</b> </td>
<td align='center'   colspan=""><b> <?php echo number_format($DIAS1,0, ",", "."); ?></b>  </td>
<td align='right'  align="center"><b> <?php echo number_format($SUB_TOTAL1,0, ",", ".") ?></b></td>
<td  colspan=""> </td>
<td align='right' align="center"><b> <?php echo number_format($MONTO1,0, ",", ".") ?></b></td>
<td  colspan=""> </td>
<td  align="center"><b> <?php echo number_format($PUESTOS1,0, ",", ".") ?></b></td
></tr>

</table>

<br />

<table class='tabla-rocha' width="1000" >

<tr>
<td  valign="top">
 <h1>Informe Rocha x Línea de Producto</h1>
<table ID="LINEA" width="450"  >
<tr>
<th>N°</th>
<th>Linea</th>
<th>Proyecto</th>
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
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";
}
}
///
else if($BUSCAR_CODIGO4 == "Los Conquistadores")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."'  and '".$txt_hasta."'    and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'    and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'LD%' and CODIGO_PROYECTO not like 'S%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";
}	
}
else if($BUSCAR_CODIGO4 == "Muebles y Diseños" || $BUSCAR_CODIGO4 == "Beatriz Gonzalez" || $BUSCAR_CODIGO4 == "La Dehesa" || $BUSCAR_CODIGO4 == "Sillas y Sillas")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '".$letra."%'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."'  and '".$txt_hasta."'   and like CODIGO_PROYECTO '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and like CODIGO_PROYECTO '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,DEPARTAMENTO_CREDITO  FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '".$letra."%' GROUP BY DEPARTAMENTO_CREDITO order by sum(MONTO) DESC";
}	
}



$result = mysql_query($query_registro, $conn) or die(mysql_error());
$contador = 1;
$MONTO3 = 0;
$CUENTA3 = 0;
 while($row = mysql_fetch_array($result))
  {  
  $MONTO= $row["MONTO"];
  $DEPARTAMENTO_CREDITO= $row["DEPARTAMENTO_CREDITO"];
  $CUENTA= $row["CUENTA"];
  $POR = 0;
  if($MONTO > 0 && $MONTO1 > 0)
  {
	  $POR = $MONTO / $MONTO1 * 100; 
  }
    echo "<tr><td>   ".$contador."  </td>";
   echo "<td>   ".$DEPARTAMENTO_CREDITO."  </td>";
    echo "<td align='center' >   ".$CUENTA."  </td>";
   echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
    echo "<td  align='center'>".number_format($POR,2, ",", ".")."%</td></tr>";
		$contador++;
	  $MONTO3+=$row['MONTO'];
    $CUENTA3+=$row['CUENTA'];
  }
   mysql_free_result($result);

?>
<tr>
<td colspan="2" align="right"><b>Total</b></td>
<td align="center"><b><?php echo number_format($CUENTA3,0, ",", ".") ?></b></td>
<td align="right"><b><?php echo number_format($MONTO3,0, ",", ".") ?></b></td>
</tr>

</table>
</td>
<td  valign="top">
  <h1>Informe Rocha x Director de Proyecto</h1>
<table class='tabla-rocha'  width="450" ID="EJECUTIVO"  >
<tr>
<th>N°</th>
<th>Vendedor</th>
<th>Proyecto</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<?php

if($BUSCAR_CODIGO4 == '')
{

if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO   order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";
}
}
else if($BUSCAR_CODIGO4 == "Los Conquistadores")
{
if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'  GROUP BY EJECUTIVO   order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like 'B%' and CODIGO_PROYECTO not like 'M%' and CODIGO_PROYECTO not like 'L%' and CODIGO_PROYECTO not like 'S%'   GROUP BY EJECUTIVO  order by sum(MONTO) DESC";
}
}
else if($BUSCAR_CODIGO4 == "Muebles y Diseños" || $BUSCAR_CODIGO4 == "Beatriz Gonzalez" || $BUSCAR_CODIGO4 == "La Dehesa" || $BUSCAR_CODIGO4 == "Sillas y Sillas")
{
	if($BUSCAR_CODIGO!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
elseif($BUSCAR_CODIGO1!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO2!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO  FROM   proyecto where EJECUTIVO  = '".($BUSCAR_CODIGO2)."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO   order by sum(MONTO) DESC";	
}
else if($BUSCAR_CODIGO3!='')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."' AND  not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'   and CODIGO_PROYECTO like '".$letra."%' GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else if($ESTADOV=='TODOS')
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM   proyecto where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";	
}
else
{
$query_registro = "SELECT sum(MONTO) AS MONTO,count(CODIGO_PROYECTO) AS CUENTA,EJECUTIVO   FROM proyecto  where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."'  and CODIGO_PROYECTO like '".$letra."%'  GROUP BY EJECUTIVO  order by sum(MONTO) DESC";
}
}


$result = mysql_query($query_registro, $conn) or die(mysql_error());
$contador = 1;
 $MONTO3=0;
 $CUENTA3 = 0;
 while($row = mysql_fetch_array($result))
  {  
  $MONTO= $row["MONTO"];
  $CUENTA= $row["CUENTA"];
  $DEPARTAMENTO_CREDITO= $row["EJECUTIVO"];
   $POR = 0;
  if($MONTO > 0  && $MONTO1 > 0)
  {
	  $POR = $MONTO / $MONTO1 * 100; 
  }
   echo "<tr><td>   ".$contador."  </td>";
   echo "<td > ".($DEPARTAMENTO_CREDITO)."  </td>";
   echo "<td align='center' >   ". $CUENTA."  </td>";
   echo "<td align='right'>".number_format($MONTO,0, ",", ".")."</td>";
    echo "<td  align='center'>".number_format($POR,2, ",", ".")."%</td></tr>";
	$contador++;
	$MONTO3+=$row['MONTO'];
  $CUENTA3+=$row['CUENTA'];
  }
   mysql_free_result($result);
 
?>

<tr>
<td colspan="2" align="right"><b>Total</b></td>
<td align="center"><b><?php echo number_format($CUENTA3,0, ",", ".") ?></b></td>
<td align="right"><b><?php echo number_format($MONTO3,0, ",", ".") ?></b></td>
</tr>
</table>
</td>
<tr>
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

if($conquistadoresm1 > 0 && $MONTO1 > 0)
{
$conquistadorest1 = $conquistadoresm1 / $MONTO1 * 100;
}
else
{
$conquistadorest1 = 0; 
}
if($conquistadoresm2 > 0 && $MONTO1 > 0)
{
$conquistadorest2 = $conquistadoresm2 / $MONTO1 * 100;
}
else
{
$conquistadorest2 = 0; 
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
<br>
<h1>Informe Rocha x Grupo de Ventas</h1>
<table class='tabla-rocha' width="300" ID="EJECUTIVO"  >
<tr>
<th>Departamento</th>
<th>Proyecto</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<tr>
<td height="21"><a>Los Conquistadores</a></td>
<td align="center"><?php echo $conquistadores ?></td>
<td align="right"><?php echo number_format($conquistadoresm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21"><a>Los Conquistadores 1</a></td>
<td align="center"><?php echo $conquistadores1 ?></td>
<td align="right"><?php echo number_format($conquistadoresm1,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest1,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21"><a>Los Conquistadores 2</a></td>
<td align="center"><?php echo $conquistadores2 ?></td>
<td align="right"><?php echo number_format($conquistadoresm2,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest2,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>La Dehesa</td>
<td align="center"><?php echo $ladehesa ?></td>
<td align="right"><?php echo number_format($ladehesam,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($ladehesat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Muebles y Diseños</td>
<td align="center"><?php echo $mueble ?></td>
<td align="right"><?php echo number_format($mueblem,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($mueblet,0, ",", ".") ?>%</td>
</tr>
<tr>
<?php if($beatris > 0){ ?>
<td>Beatriz Gonzalez</td>
<td align="center"><?php echo $beatris ?></td>
<td align="right"><?php echo number_format($beatrism,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($beatrist,0, ",", ".") ?>%</td>
</tr>
<?php }?>
<tr>
<td>Sillas y Sillas</td>
<td align="center"><?php echo $sillas ?></td>
<td align="right"><?php echo number_format($sillasm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($sillat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td align='right'><b>Total</b></td>
<td align="center"><b><?php echo $totalrocha ?></b></td>
<td align="right"><b><?php echo number_format( $MONTO2,0, ",", ".") ?></b></td>
</tr>
</table>
</td>
<td  valign="top"> <!-- Inicio -->
<?php
if($BUSCAR_CODIGO!='')
{
  $query_registro = "select * from PROYECTO where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO1!='')
{ 
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO2!='')
{
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  EJECUTIVO = '".($BUSCAR_CODIGO2)."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO3 !='')
{
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else
{
$query_registro = "select * from PROYECTO where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());

$conquistadores = 0;
$conquistadoresm = 0;

$conquistadores1 = 0;
$conquistadores2 = 0;

$conquistadoresm1 = 0;
$conquistadoresm2 = 0;

$sillas = 0;
$sillasm = 0;

$ladehesa = 0;
$ladehesam = 0;

$totalrocha = 0;
$totalrocham = 0;

$mueble = 0;
$mueblem = 0;



 while($row = mysql_fetch_array($result))
{  
  $CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
  $EJECUTIVO= $row["EJECUTIVO"];

  if($ESTADO != 'NULA')
  {

    if (strpos($CODIGO_PROYECTO, "LD") !== false)
    {
      $ladehesa++;
      $totalrocha++;
      $ladehesam+=$row['MONTO'];
      $totalrocham+=$row['MONTO'];
    }
    else if (strpos($CODIGO_PROYECTO, "M&D") !== false)
    {
      $mueble++;
       $totalrocha++;
      $mueblem+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
    else if( substr($CODIGO_PROYECTO,0,1) == 'B')
    {
      $beatris++;
       $totalrocha++;
      $beatrism+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
     if (strpos($CODIGO_PROYECTO, "S&S") !== false)
    {
      $sillas++;
      $totalrocha++;
      $sillasm+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
      else if (strpos($CODIGO_PROYECTO, "LC") !== false)
    {
      $totalrocha++;
      $conquistadores++; 
      $conquistadoresm+=$row['MONTO'];
      $totalrocham+=$row['MONTO'];

      if($EJECUTIVO == "Carolina Oyarzo Aravena" || $EJECUTIVO == "Beatriz Gonzalez Garcia" || $EJECUTIVO == "Gabriela Sepúlveda Saavedra" || $EJECUTIVO == "Maritza Rojas Batarce" || $EJECUTIVO == "Monserrat Irribarra Vergara" || $EJECUTIVO == "Nathalie Feijo" || $EJECUTIVO == "Juan José Gomez Gutierrez")
      {
        
        $conquistadores1++;
        $conquistadoresm1+=$row['MONTO'];
       
      }
      else if($EJECUTIVO == "Salomon Samaan Rozeznic" || $EJECUTIVO == "Neida Miranda Gonzalez" || $EJECUTIVO == "Carolina Olivares Echeverria" || $EJECUTIVO == "Maria Moraga Baeza"  )
      {
        $conquistadores2++; 
        $conquistadoresm2+=$row['MONTO'];
      }
    }
  }
}
?>

<?php 
if($conquistadoresm > 0 && $totalrocham > 0)
{
$conquistadorest = $conquistadoresm / $totalrocham * 100;
}
else
{
$conquistadorest = 0; 
}

if($conquistadoresm1 > 0 && $totalrocham > 0)
{
$conquistadorest1 = $conquistadoresm1 / $totalrocham * 100;
}
else
{
$conquistadorest1 = 0; 
}
if($conquistadoresm2 > 0 && $totalrocham > 0)
{
$conquistadorest2 = $conquistadoresm2 / $totalrocham * 100;
}
else
{
$conquistadorest2 = 0; 
}
if($ladehesam > 0 && $totalrocham > 0)
{
$ladehesat = $ladehesam / $totalrocham * 100;
}
else
{
$ladehesat = 0; 
}
if($mueblem > 0 && $totalrocham > 0)
{
$mueblet = $mueblem / $totalrocham * 100;
}
else
{
$mueblet = 0; 
}
if($sillasm > 0 && $totalrocham > 0)
{
$sillat = $sillasm / $totalrocham * 100;
}
else
{
$sillat = 0;  
}
if($beatrism > 0 && $totalrocham > 0)
{
$beatrist = $beatrism / $totalrocham * 100;
}
else
{
$beatrist = 0;  
}
?>

<br>
<h1>Informe Rocha Mercado Publico</h1>
<table class='tabla-rocha' width="300" ID="EJECUTIVO" >
<tr>
<th>Departamento</th>
<th>Proyecto</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<tr>
<td height="21"><a>Los Conquistadores</a></td>
<td align="center"><?php echo $conquistadores ?></td>
<td align="right"><?php echo number_format($conquistadoresm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21" ><a>Los Conquistadores 1</a></td>
<td align="center" ><?php echo $conquistadores1 ?></td>
<td align="right"><?php echo number_format($conquistadoresm1,0, ",", ".") ?></td>
<td align="center" ><?php echo number_format($conquistadorest1,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21" ><a>Los Conquistadores 2</a></td>
<td align="center" ><?php echo $conquistadores2 ?></td>
<td align="right"><?php echo number_format($conquistadoresm2,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest2,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>La Dehesa</td>
<td align="center"><?php echo $ladehesa ?></td>
<td align="right"><?php echo number_format($ladehesam,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($ladehesat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Muebles y Diseños</td>
<td align="center"><?php echo $mueble?> </td>
<td align="right"><?php echo number_format($mueblem,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($mueblet,0, ",", ".") ?>%</td>
</tr>
<tr>
<?php if($beatris > 0){ ?>
<td>Beatriz Gonzalez</td>
<td align="center"><?php echo $beatris ?></td>
<td align="right"><?php echo number_format($beatrism,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($beatrist,0, ",", ".") ?>%</td>
</tr>
<?php }?>
<tr>
<td>Sillas y Sillas</td>
<td align="center"><?php echo $sillas ?></td>
<td align="right"><?php echo number_format($sillasm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($sillat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td align='right'><b>Total</b></td>
<td align="center"><b><?php echo $totalrocha ?></b></td>
<td align="right"><b><?php echo number_format(  $totalrocham,0, ",", ".") ?></b></td>
</tr>
</table>
</td> <!--FIN -->

<td  valign="top"> <!-- Inicio -->
<?php
if($BUSCAR_CODIGO!='')
{
  $query_registro = "select * from PROYECTO where CODIGO_PROYECTO = '".$BUSCAR_CODIGO."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO1!='')
{ 
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  NOMBRE_CLIENTE = '".$BUSCAR_CODIGO1."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO2!='')
{
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  EJECUTIVO = '".($BUSCAR_CODIGO2)."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($BUSCAR_CODIGO3 !='')
{
  $query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and  DEPARTAMENTO_CREDITO = '".$BUSCAR_CODIGO3."'  and proyecto.FECHA_INGRESO between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO  not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else if($ESTADOV=='TODOS')
{
$query_registro = "select * from PROYECTO where not proyecto.ESTADO = 'NULA' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
else
{
$query_registro = "select * from PROYECTO where proyecto.ESTADO = '".$ESTADOV."' and proyecto.FECHA_INGRESO 
between '".$txt_desde."' and '".$txt_hasta."' and CODIGO_PROYECTO not like '%CM%' order by proyecto.FECHA_INGRESO desc ";
}
$result = mysql_query($query_registro, $conn) or die(mysql_error());

$conquistadores = 0;
$conquistadoresm = 0;

$conquistadores1 = 0;
$conquistadores2 = 0;

$conquistadoresm1 = 0;
$conquistadoresm2 = 0;

$sillas = 0;
$sillasm = 0;

$ladehesa = 0;
$ladehesam = 0;

$totalrocha = 0;
$totalrocham = 0;

$mueble = 0;
$mueblem = 0;



 while($row = mysql_fetch_array($result))
{  
  $CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
  $EJECUTIVO= $row["EJECUTIVO"];

  if($ESTADO != 'NULA')
  {

    if (strpos($CODIGO_PROYECTO, "LD") !== false)
    {
      $ladehesa++;
      $totalrocha++;
      $ladehesam+=$row['MONTO'];
      $totalrocham+=$row['MONTO'];
    }
    else if (strpos($CODIGO_PROYECTO, "M&D") !== false)
    {
      $mueble++;
       $totalrocha++;
      $mueblem+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
    else if( substr($CODIGO_PROYECTO,0,1) == 'B')
    {
      $beatris++;
       $totalrocha++;
      $beatrism+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
     if (strpos($CODIGO_PROYECTO, "S&S") !== false)
    {
      $sillas++;
      $totalrocha++;
      $sillasm+=$row['MONTO'];
       $totalrocham+=$row['MONTO'];
    }
      else
    {
    
       if($EJECUTIVO == "Carolina Oyarzo Aravena" || $EJECUTIVO == "Beatriz Gonzalez Garcia" || $EJECUTIVO == "Gabriela Sepúlveda Saavedra" || $EJECUTIVO == "Maritza Rojas Batarce" || $EJECUTIVO == "Monserrat Irribarra Vergara" || $EJECUTIVO == "Nathalie Feijo" || $EJECUTIVO == "Juan José Gomez Gutierrez" )
        {
          $conquistadores++;
          $conquistadores1++;
          $conquistadoresm1+=$row['MONTO'];
          $conquistadoresm+=$row['MONTO'];
          $totalrocha++;
          $totalrocham+=$row['MONTO'];
        }
        else if($EJECUTIVO == "Salomon Samaan Rozeznic" || $EJECUTIVO == "Neida Miranda Gonzalez" || $EJECUTIVO == "Carolina Olivares Echeverria" || $EJECUTIVO == "Maria Moraga Baeza"  )
        {
          $conquistadores++;
          $conquistadores2++; 
          $conquistadoresm2+=$row['MONTO'];
          $conquistadoresm+=$row['MONTO'];
          $totalrocha++;
          $totalrocham+=$row['MONTO'];
        }
    }
  }
}
?>

<?php 
if($conquistadoresm > 0 && $totalrocham > 0)
{
$conquistadorest = $conquistadoresm / $totalrocham * 100;
}
else
{
$conquistadorest = 0; 
}

if($conquistadoresm1 > 0 && $totalrocham > 0)
{
$conquistadorest1 = $conquistadoresm1 / $totalrocham * 100;
}
else
{
$conquistadorest1 = 0; 
}
if($conquistadoresm2 > 0 && $totalrocham > 0)
{
$conquistadorest2 = $conquistadoresm2 / $totalrocham * 100;
}
else
{
$conquistadorest2 = 0; 
}
if($ladehesam > 0 && $totalrocham > 0)
{
$ladehesat = $ladehesam / $totalrocham * 100;
}
else
{
$ladehesat = 0; 
}
if($mueblem > 0 && $totalrocham > 0)
{
$mueblet = $mueblem / $totalrocham * 100;
}
else
{
$mueblet = 0; 
}
if($sillasm > 0 && $totalrocham > 0)
{
$sillat = $sillasm / $totalrocham * 100;
}
else
{
$sillat = 0;  
}
if($beatrism > 0 && $totalrocham > 0)
{
$beatrist = $beatrism / $totalrocham * 100;
}
else
{
$beatrist = 0;  
}
?>

<br>
<h1>Informe Rocha Mercado Privado</h1>
<table class='tabla-rocha'  width="300" ID="EJECUTIVO" >
<tr>
<th>Departamento</th>
<th>Proyecto</th>
<th>Monto</th>
<th>Monto %</th>
</tr>
<tr>
<td height="21">Los Conquistadores</td>
<td align="center"><?php echo $conquistadores ?></td>
<td align="right"><?php echo number_format($conquistadoresm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21">Los Conquistadores 1</td>
<td align="center"><?php echo $conquistadores1 ?></td>
<td align="right"><?php echo number_format($conquistadoresm1,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest1,0, ",", ".") ?>%</td>
</tr>
<tr>
<td height="21">Los Conquistadores 2</td>
<td align="center"><?php echo $conquistadores2 ?></td>
<td align="right"><?php echo number_format($conquistadoresm2,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($conquistadorest2,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>La Dehesa</td>
<td align="center"><?php echo $ladehesa ?></td>
<td align="right"><?php echo number_format($ladehesam,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($ladehesat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td>Muebles y Diseños</td>
<td align="center"><?php echo $mueble?> </td>
<td align="right"><?php echo number_format($mueblem,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($mueblet,0, ",", ".") ?>%</td>
</tr>
<tr>
<?php if($beatris > 0){ ?>
<td>Beatriz Gonzalez</td>
<td align="center"><?php echo $beatris ?></td>
<td align="right"><?php echo number_format($beatrism,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($beatrist,0, ",", ".") ?>%</td>
</tr>
<?php }?>
<tr>
<td>Sillas y Sillas</td>
<td align="center"><?php echo $sillas ?></td>
<td align="right"><?php echo number_format($sillasm,0, ",", ".") ?></td>
<td align="center"><?php echo number_format($sillat,0, ",", ".") ?>%</td>
</tr>
<tr>
<td align='right'><b>Total</b></td>
<td align="center"><b><?php echo $totalrocha ?></b></td>
<td align="right"><b><?php echo number_format(  $totalrocham,0, ",", ".") ?></b></td>
</tr>
</table>
</td> <!--FIN -->
</tr>



</tr>
</table>

</body>
</html>