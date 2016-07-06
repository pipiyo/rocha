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

$txt_cliente = "";
$txt_director = "";
$txt_desde = '2001-01-01';
$txt_hasta = '2020-01-01';
if (isset($_POST["boton"])) 
{    
$txt_cliente = $_POST["txt_cliente"];
$txt_director = $_POST["txt_director"];

if($_POST["txt_desde"] != "" and $_POST["txt_hasta"] != "" )  
{
$txt_desde = $_POST["txt_desde"];
$txt_hasta = $_POST["txt_hasta"];
}
}

?>
<!DOCTYPE html>
<html>

<head>
  <title> OC Especial V1.0.0</title>
  <meta http-equiv="content-type" charset="utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <link type="text/css" rel="stylesheet" href="Style/style_informes_new.css" />

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <script src='js/encabezado-fixed.js'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
    $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });  
      $(function(){
                $('#txt_cliente').autocomplete({
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

<body >


<div id='DivInformeUnidadesProduccion'>
<form method="post" action="">
<div id='info_oc_especial'>
<div id='bread'><div id="menu1"></div></div>
<div class="contenedor_especial">

<h1> Productos especiales</h1>

<table>
<tr>
<td><input placeholder="Desde" type="text" class="textbox" id="txt_desde" value="" name="txt_desde" /> </td>
<td><input placeholder="Hasta"type="text" class="textbox" id="txt_hasta" value="" name="txt_hasta" /> </td>
<td><input placeholder="Cliente" type="text" class="textbox" id="txt_cliente" value="" name="txt_cliente" /> </td>
<td><select class="textbox" name="txt_director" id="txt_director" type ="text" >
<option value="">Director</option>
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
</select> </td>

<td><select class="textbox" name="departamento" id="departamento" type ="text" >
  <option value="">Departamento</option>
  <option value="E.R">Los conquistadores</option>
  <option value="E.MD">Muebles y diseños</option>
  <option value="E.S">Sillas y sillas</option>
  <option value="E.LD">La dehesa</option>
</select>
<td>
<td><input class="boton" type="submit" id="boton" value="Aceptar" name="boton" /> </td>
<tr>
</table>
</div>
</div>
</form>


<table bordercolor="#ccc"  class="oc_especial fixed" rules="all" frame="box">
<thead>
<tr class='cheader'>
<th>Radicado</th>
<th>Cliente</th>
<th>Codigo</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Precio Total</th>
<th>Valor Venta</th>
<th>Costo Producción</th>
<th>Cotizacion</th>
<th>Director</th>
<th>Empresa</th>
<th>Realizado</th>
<th>OC</th>

</tr>
  </thead>
<?php 
mysql_select_db($database_conn, $conn);

$cantidadQ=0;
$cantidadT=0;
$cantidad1=0;
$precfin=0;

$VALORV1 = 0;
$COSTO1 = 0;

$depa= (empty($_POST["departamento"]) ? '' : $_POST["departamento"]);

if($depa == ""){
  $contador = 0;
  $cuen = 4;
}else if($depa == "E.R"){
  $contador = 0;
  $cuen = 1;
}else if($depa == "E.MD"){
  $contador = 1;
  $cuen = 2;
}else if($depa == "E.S"){
  $contador = 2;
  $cuen = 3;
}else if($depa == "E.LD"){
  $contador = 3;
  $cuen = 4;
}

while($contador < $cuen)
{
if($contador == 0)
{
$variable = 'E.R';
}
else if($contador == 1)
{
$variable = 'E.MD';
}
else if($contador == 2)
{
$variable = 'E.S';
}
else if($contador == 3)
{
$variable = 'E.LD';
}

$sql666 = "SELECT DISTINCT proyecto.EJECUTIVO,proyecto.NOMBRE_CLIENTE,oc_producto.ROCHA,oc_producto.CANTIDAD,oc_producto.CODIGO_OC,producto.PRECIO,oc_producto.CODIGO_PRODUCTO,producto.DESCRIPCION
FROM orden_de_compra, proyecto, oc_producto , producto
WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC
AND oc_producto.ROCHA = proyecto.CODIGO_PROYECTO
AND orden_de_compra.ESTADO =  'OK' and oc_producto.CODIGO_PRODUCTO  = PRODUCTO.CODIGO_PRODUCTO
AND oc_producto.CODIGO_PRODUCTO  LIKE '".$variable."%'
AND orden_de_compra.FECHA_ENTREGA 
between '".$txt_desde."' and '".$txt_hasta."'";

if($txt_director != "")
{
  $sql666 .= " and proyecto.EJECUTIVO = '".$txt_director."'";
}
if($txt_cliente != "")
{
  $sql666 .= " and proyecto.NOMBRE_CLIENTE = '".$txt_cliente."'";
}

$prec1=0;
$result666 = mysql_query($sql666, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result666))
  {
	$cant = $row["CODIGO_PRODUCTO"];
	$prec = $row["PRECIO"];
	$cant1 = $row["DESCRIPCION"];
  $codigo_oc = $row["CODIGO_OC"];
  $eje = $row["EJECUTIVO"];
  $cantidad = $row["CANTIDAD"];
  $rocha = $row["ROCHA"];
  $cliente = $row["NOMBRE_CLIENTE"];


  

  $cantidad1 +=  $cantidad;
  $precfin +=   $prec;
$cant2 = explode("-", $cant);
$UNO =(empty($cant2[0])) ? "" : $cant2[0] ;
$DOS =(empty($cant2[1])) ? "" : $cant2[1] ;

if($DOS != "")
{
$constr = $UNO."-".$DOS;
}
else
{
$constr = $UNO;  
}
$cant2 = explode("_", $constr);
$UNO =(empty($cant2[0])) ? "" : $cant2[0] ;
$DOS =(empty($cant2[1])) ? "" : $cant2[1] ;

$constr=$UNO;


$fechac = "";
$DIRECTOR_PROYECTO = "";
$EMPRESA = "";
$COTIZADOR = "";
$VALORV = 0;
$COSTO = 0;
$COTIZADOR = "";

$query_registro2 = "select * FROM cotizacion_producto_especial WHERE CODIGO_PRODUCTO LIKE '%".$constr."%'";
$result = mysql_query($query_registro2 , $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
    $fechac = $row["FECHA_CONFIRMACION"];
    $DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];
    $EMPRESA = $row["EMPRESA"];
    $COTIZADOR = $row["COTIZADOR"];
    $VALORV = $row["VALOR_VENTA"];
    $COSTO = $row["COSTO_PRODUCCION"];
  }
  echo "<tr><td>".$constr."</td>";
  echo "<td>".$cliente." </td>";
	echo "<td>".$cant."</td>";	
	echo "<td> ".$cant1."</td>";
  echo "<td align='right'>". number_format($cantidad, 0, ",", ".")."</td>";  
  echo "<td align='right'> ".number_format($prec, 0, ",", ".")."</td>";
  echo "<td align='right'> ".number_format($VALORV, 0, ",", ".")."</td>";
  echo "<td align='right'> ".number_format($COSTO, 0, ",", ".")."</td>";
  echo "<td align='center'> ".$fechac."</td>";
  echo "<td>".  $eje."</td>"; 
  echo "<td>". $EMPRESA."</td>"; 
  echo "<td>".$COTIZADOR."</td>"; 
	echo "<td align='left'>". $codigo_oc ."</td></tr>";
	$prec1+=$row['PRECIO'];
  $VALORV1 += $VALORV;
  $COSTO1 += $COSTO;
	$cantidadQ++;
	$cantidadT++;
  }
  $contador++;
  }

	echo "<tr>";	
	echo "<th>TOTAL</th>";
	echo "<th> ".$cantidadT."</th>";
  echo "<th> </th>";
  echo "<th>  </th>";
	echo "<th  align='right'> ".number_format($cantidad1 , 0, ",", ".")."</th>";
  echo "<th> ".number_format($precfin , 0, ",", ".") ." </th>";
  echo "<th> ".number_format($VALORV1 , 0, ",", ".") ." </th>";
  echo "<th> ".number_format($COSTO1 , 0, ",", ".") ." </th>";
  echo "<th> </th>";
  echo "<th>  </th>";
  echo "<th> </th>";
  echo "<th> </th>";
  echo "<th>  </th></tr>";
?>
</table>

</div>

</body>
</html>
