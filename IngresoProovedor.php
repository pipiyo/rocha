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

//////////////////////////////////////////////////////////////

if (isset($_GET["ingresar"])) 
{
$CODIGO = $_GET['txt_rut'];
mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$RUT = $row["RUT_PROVEEDOR"];
	$numero++;
  }
mysql_free_result($result1);

  
if($numero == 0)
{
$RUT = $_GET['txt_rut'];
$NOMBRE = $_GET['txt_nombre'];
$RAZON = $_GET['txt_razon'];
$GIRO = $_GET['txt_giro'];
$DIRECCION = $_GET['txt_direccion'];
$COMUNA = $_GET['txt_comuna'];
$TELEFONO1 = $_GET['txt_telefono1'];
$TELEFONO2 = $_GET['txt_telefono2'];
$WEB = $_GET['txt_web'];
$CONTACTO1 = $_GET['txt_contacto1'];
$CONTACTO2 = $_GET['txt_contacto2'];
$CELULAR1 = $_GET['txt_celular1'];
$CELULAR2 = $_GET['txt_celular2'];
$FORMA = $_GET['txt_forma'];
$CATEGORIA = $_GET['txt_categoria'];
$FAMILIA = $_GET['txt_familia'];
$ENTREGA = $_GET['txt_entrega'];
	
$sql = "INSERT INTO proveedor (CODIGO_PROVEEDOR, RUT_PROVEEDOR, NOMBRE_FANTASIA, RAZON_SOCIAL, GIRO, DIRECCION, COMUNA,TELEFONO1,TELEFONO2,WEB, CONTACTO1, CONTACTO2, CELULAR_CONTACTO1, CELULAR_CONTACTO2, FORMA_PAGO, CATEGORIA,FAMILIA, ENTREGA) values ('".$RUT."','".$RUT."','".($NOMBRE)."','".($RAZON)."','".($GIRO)."','".($DIRECCION)."','".($COMUNA)."','".($TELEFONO1)."','".$TELEFONO2."','".$WEB."','".($CONTACTO1)."','".($CONTACTO2)."','".$CELULAR1."','".$CELULAR2."','".$FORMA."','".$CATEGORIA."','".$FAMILIA."','".$ENTREGA."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);

header("Location: Proveedores.php");
}
else
{
	echo '<script language = javascript>
	alert("El codigo del producto ya existe")
	self.location = "Producto.php"
	</script>';
  }
}
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html>

<head>
  <title>IngresoProveedor V1.1.0</title>

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <link rel="stylesheet" type="text/css" href="Style/mantenedores.css" />
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>

function justNumbers(e)
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}

function es_vacio()
{
  var codigoMateriales = document.getElementById('txt_codigoMateriales') ;
  var descripcion = document.getElementById('txt_descripcion') ;
  var precio = document.getElementById('txt_precio') ;
  var unidad = document.getElementById('txt_unidadDeMedidad') ;
  var ingresar = document.getElementById('ingresar') ;
  if (codigoMateriales.value != "" & descripcion.value != ""  & unidad.value != "" & precio.value != "") 
  {	  
      ingresar.disabled=false;
  }
	else
	{
	   ingresar.disabled=true;
	}
}	
   	
function es_vacio1(){
  var codigoMateriales = document.getElementById('txt_EliminarCodigoMateriales') ;
  var eliminar = document.getElementById('eliminar') ;
  if (codigoMateriales.value != "") 
    {	  
       eliminar.disabled=false;
    }
	else
	{
	   eliminar.disabled=true;
	}
}		

function es_vacio2(){
  var codigoMateriales = document.getElementById('txta_codigoMateriales') ;
  var descripcion = document.getElementById('txta_descripcion') ;
  var precio = document.getElementById('txta_precio') ;
  var unidad = document.getElementById('txta_unidadDeMedidad') ;
  var modificar = document.getElementById('modificar') ;
  
  if (codigoMateriales.value != "" & descripcion.value != ""  & unidad.value != "" & precio.value != "") 
  {	  
    modificar.disabled=false;
  }
	else
	{
	  modificar.disabled=true;
	}
}	

function enviar()
{
  var as= confirm("Realmente deseas Borrar");
  if(as)
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  //window.location="Materiales.php";
  }
}

function enviar1()
{
  var as1= confirm("Realmente deseas modificar");
  if(as1)                   
  {
  // window.location="Materiales.php";	
  document.getElementById("formulario22").submit();
  }
  else
  {
  return false;
  //window.location="Materiales.php";
  }
}
</script>

</head>

<body>
<div id='bread'><div id="menu1"></div></div>

<form  name = 'formulario' method="GET"/>
<h1>Ingreso Proveedor</h1>
<table id= "tabla_ingreso_cli">
<tr>
<td class="td_rosa">Rut:</td>
<td><input class="txt" required="required" placeholder="1.111.111-1" type="text"  id= "txt_rut" name = "txt_rut" value=""> </td>

<td class="td_rosa">Nombre:</td>
<td><input required="required" placeholder="Ducasse Industrial" class="txt" type="text"  id= "txt_nombre" name = "txt_nombre" value=""> </td>
</tr>
<tr>
<td class="td_rosa">Razon social:</td>
<td><input required="required" placeholder="Ducasse Industrial" class="txt" type="text" name = "txt_razon" value=""> </td>

<td class="td_rosa">Giro:</td>
<td><input class="txt" placeholder="Import. y export. y comercializacion de muebles"   type="text" name = "txt_giro" value=""> </td>
<tr>
<td class="td_rosa">Direccion:</td>
<td><input placeholder="Santa Rosa 1111" class="txt" type="text" id = "txt_direccion" name = "txt_direccion" value=""> </td>

<td class="td_rosa">comuna:</td>
<td><input placeholder="San Miguel" class="txt" type="text" id = "txt_comuna" name = "txt_comuna" value=""> </td>
</tr>
<tr>
<td class="td_rosa">telefono 1:</td>
<td><input placeholder="(2) X XXX XXX" class="txt" type="text" id = "txt_telefono1" name = "txt_telefono1" value=""> </td>

<td class="td_rosa">telefono 2:</td>
<td><input placeholder="(2) X XXX XXX" class="txt" type="text" id = "txt_telefono2" name = "txt_telefono2" value=""> </td>
</tr>
<tr>
<td class="td_rosa">Web:</td>
<td><input placeholder="www.MueblesyDiseño.cl" class="txt"  type="text" name = "txt_web" value=""> </td>

<td class="td_rosa">Contacto 1:</td>
<td><input placeholder="Luiz Jara" class="txt"  type="text" name = "txt_contacto1" value=""> </td>
<tr>
<td class="td_rosa">Contacto 2:</td>
<td><input placeholder="Luiz Jara" class="txt" type="text" id = "txt_contacto2" name = "txt_contacto2" value=""> </td>

<td class="td_rosa">Celular 1:</td>
<td><input placeholder="(8) XX XXX XXX" class="txt" type="text" id = "txt_celular1" name = "txt_celular1" value=""> </td>
</tr>
<tr>
<td class="td_rosa">Celular 2:</td>
<td><input placeholder="(8) XX XXX XXX" class="txt" type="text" id = "txt_celular2" name = "txt_celular2" value=""> </td>

<td class="td_rosa">Forma de pago:</td>
<td><input required="required" placeholder="50%CO 40%CE 10%30" class="txt" type="text" id = "txt_forma" name = "txt_forma" value=""> </td>
</tr>
<tr>
<td class="td_rosa">Categoria:</td>
<td><input placeholder="Insumos" class="txt" type="text" id = "txt_categoria" name = "txt_categoria" value=""> </td>

<td class="td_rosa">Familia:</td>
<td><input placeholder="Tableros" class="txt" type="text" id = "txt_familia" name = "txt_familia" value=""> </td>
</tr>
<tr>
<td class="td_rosa">Entrega:</td>
<td><input placeholder="48" horas class="txt" type="text" id = "txt_entrega" name = "txt_entrega" value=""> </td>
<td class="td_rosa"></td>
<td> </td>
</tr>
</table>
<input id="txt_ing" name="txt_ing" type ="hidden" value="<?php echo date("Y-m-d")?>">
<input class="BotonSeleste der" type="submit" id="ingresar" name="ingresar" value="Ingresar">

</form>
</body>
</html>
