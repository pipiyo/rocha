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

if (isset($_GET["ingresar"])) 
{
$CODIGO = $_GET['txt_codigoMateriales'];
mysql_select_db($database_conn, $conn); 
$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
  $CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
  $numero++;
  }
mysql_free_result($result1);

  
if($numero == 0)
{
$DESCRIPCION = $_GET["txt_descripcion"];
$STOCK_ACTUAL = 0;
$CODIGO = $_GET['txt_codigoMateriales'];
$PRECIO = $_GET['txt_precio'];
$UNIDAD = $_GET['txt_unidadDeMedidad'];
$FORMATO = $_GET['txt_formato'];
$GESTION = $_GET['txt_gestion'];
$RELACION = $_GET['txt_relacion'];
$STOCK_MINIMO = $_GET['txta_stock_minimo'];
$STOCK_MAXIMO = $_GET['txta_stock_maximo'];
$CATEGORIA = $_GET['txta_categoria'];
$CATEGORIA = $_GET['txta_categoria'];

$fecha = date("y-m-y G:i:s");
  
$sql = "INSERT INTO producto (CODIGO_PRODUCTO, DESCRIPCION, STOCK_ACTUAL,PRECIO,UNIDAD_DE_MEDIDA, FORMATO, GESTION,RELACION,FECHA_INGRESO,STOCK_MINIMO,STOCK_MAXIMO,CATEGORIA) values ('".$CODIGO."','".$DESCRIPCION."',".$STOCK_ACTUAL.",".$PRECIO.",'".$UNIDAD."','".$FORMATO."','".$GESTION."','".$RELACION."','".$fecha."','".$STOCK_MINIMO."','".$STOCK_MAXIMO."','".$CATEGORIA."')";

$result = mysql_query($sql, $conn) or die(mysql_error());
mysql_select_db($database_conn, $conn);

header("Location: ingresoProducto.php");
}
else
{
  echo '<script language = javascript>
  alert("El codigo del producto ya existe")
  self.location = "Producto.php"
  </script>';
  }
}
?>


<!doctype html>
<html>
<head>
  <title>Mantenedor Producto</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" href="Style/bodega.css" type="text/css">
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src='js/Bloqueo.php'></script> 
  <script src='js/breadcrumbs.php'></script>
  <script language = javascript>
/*1*/
function reback()
{
  window.close("FormularioProductosIngreso.php");
}
/*2*/
function justNumbers(e)
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true; 
  return /\w/.test(String.fromCharCode(keynum));
}
/*3*/
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
/*4*/   	
function es_vacio1()
{
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
/*5*/
function es_vacio2()
{
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
 
/*6*/  
function mostrardiv1() 
{
  formulario = document.getElementById('formulario');
  formulario3 = document.getElementById('formulario3');
  formulario3.style.display = "none";
  formulario.style.display = "";
} 
/*7*/    
function mostrardiv3() 
{
  formulario = document.getElementById('formulario');
  formulario3 = document.getElementById('formulario3');
  formulario.style.display = "none";
  formulario3.style.display = "";
}   
/*10*/ 
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
  }
}
/*11*/ 
function enviar1()
{
  var as1= confirm("Realmente deseas modificar");
  if(as1)                   
  {
	  document.getElementById("formulario22").submit();
  }
  else
  {
    return false;

  }
}
/*12*/ 
function enviar3()
{
  var as1= confirm("Realmente deseas modificar");
  if(as1)                   
  {
    document.getElementById("formulario33").submit();
  }
  else
  {
    return false;
  }
}
/*13*/ 
function isNumber(e) 
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))  
  return true; 
  return /\w/.test(String.fromCharCode(keynum));
}
/*14*/ 
function soloLetras(e)
{
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = "abcdefghijklmnopqrstuvwxyz-_1234567890";
  especiales = [8,37,39,46];
  tecla_especial = false
  for(var i in especiales)
  {
    if(key == especiales[i])
    {
      tecla_especial = true;
      break;
    }
  }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
    {
      return false;
    }
}

</script>

</head>

<body>
<div id='bread'><div id="menu1"></div></div>  
    		
<div class="menu-ingreso-producto">
	<div  onClick="mostrardiv1()" id="IINGRESAR" class="grid_2"><a onClick="mostrardiv1()" title="home" >Ingresar</a></div>
  <div  onClick="mostrardiv3()" id="BBYR" class="grid_2"><a onClick="mostrardiv3()" title="blog">B Y R</a></div>
</div>



<form  name = 'formulario' method="GET"/>
<div id = 'formulario' class='descripcion_producto'> <!--- Star Div 1 -->
<h1>Ingreso Producto</h1>
<table class="table-form">
  <tr>
    <td class='azul_pro'>Descripción:</td>
    <td colspan="3"><input type="text"  onkeyup="es_vacio()" id= "txt_descripcion" name = "txt_descripcion" value=""></td>
    <td colspan="2" rowspan="6" align="center"></td>
  </tr>
  <tr>
    <td class='azul_pro'>Codigo:</td>
    <td colspan="3"><input onpaste="return false" type="text" onKeyUp="es_vacio();"  onkeypress="return soloLetras(event);" id = "txt_codigoMateriales" name = "txt_codigoMateriales" value=""></td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'>&nbsp;</td>
    <td>&nbsp;</td>
    <td class='azul_pro'>Categoria:</td>
    <td><select  id = "txta_categoria" name = "txta_categoria">
  <option> </option>
  <option> Accesorios </option>
  <option> ACTIU </option>
  <option> Articulo Electrico </option>
  <option> Baldosas Melamina </option>
  <option> Baldosas Metalica </option>
  <option> Baldosas Laminadas </option>
  <option> Baldosas Tapizadas</option>
  <option> Baldosas Vidrio </option>
  <option> Cajoneras </option>
  <option> Cerraduras </option>
  <option> Correderas </option>
  <option> Cristales </option>
  <option> Cubiertas </option>
  <option> Embalaje </option>
  <option> Full Space </option>
  <option> Laminados </option>
  <option> Maderas </option>
  <option> Mantencion </option>
  <option> Maquinas y Herramientas </option>
  <option> Mepal </option>
  <option> Mueble De Linea </option>
  <option> Muebles Metalicos </option>
  <option> Paneleria </option>
  <option> Partes y Piezas </option>
  <option> Producto</option>
  <option> Producto Especial</option>
  <option> Quincalleria </option>
  <option> Quimicos </option> 
  <option> Repiceria </option>
  <option> Servicios </option>
  <option> Seguridad </option>
  <option> Sillas </option>
  <option> Soportes </option>
  <option> Superficies Curvas </option>
  <option> Superficies Rectas </option>
  <option> Tapacantos </option>
  <option> Tela </option>
  <option> Tiradores </option>
  <option> Tornillos </option>
  </select></td>
  </tr>
  <tr>
    <td class='azul_pro'>Gestión</td>
    <td><select id = "txt_gestion" name = "txt_gestion">
  <option>  </option>
  <option> IP </option>
  <option> IE </option>
  <option> IG </option>
  </select></td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'>Formato:</td>
    <td><select  id = "txt_formato" name = "txt_formato">
<option>  </option>
<option> cu </option>
<option> tira </option>
<option> placa </option>
<option> empaque </option>
<option> un </option>
<option> ml </option>
<option> lamina </option>
</select></td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'>Relación:</td>
    <td><input  onKeyPress="return justNumbers(event);" type="text" name = "txt_relacion" value=""></td>
    <td class='azul_pro'>Precio Compra:</td>
    <td><input  type="number" onKeyUp="es_vacio()" id = "txt_precio" name = "txt_precio" value=""></td>
    <td class='azul_pro'></td>
    <td> </td>
  </tr>
  <tr>
    <td class='azul_pro'>U/M:</td>
    <td><select  id = "txt_unidadDeMedidad" name = "txt_unidadDeMedidad" onChange="es_vacio()">
<option>  </option>
<option> un  </option>
<option> ml  </option>
<option> m2  </option>
<option> m3  </option>
<option> par </option>
<option> lts </option>
</select></td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'>Stock Minimo:</td>
    <td><input  onKeyPress="return justNumbers(event);" type="text" name = "txta_stock_minimo" value=""> </td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td class=''></td>
    <td class='azul_pro'>Stock Maximo:</td>
    <td><input onKeyPress="return justNumbers(event);" type="text" name = "txta_stock_maximo" value=""> </td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td></td>
    <td class='azul_pro'>&nbsp;</td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'>&nbsp;</td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td></td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td></td>
  </tr>
  <tr>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'></td>
    <td> </td>
  </tr>
  <tr>
    <td align ="right" colspan='6'><input type="submit" disabled id="ingresar" name="ingresar" class='boton'  value="Ingresar"></td>
  </tr> 
</table>
</div> 
</form> <!--- End Div 1 -->


<form  id = 'formulario33' method="GET" action="scriptBuscarReemplazarProductos.php"/>
<div id = 'formulario3' style = 'display:none;'>
  <!--
<table>
<tr>
<td>Valor Antiguo</td>
<td><input style="width: 250px;ALIGN=RIGHT;" type="text" onKeyUp="es_vacio1()" id = "txt_antiguo" name = "txt_antiguo" value=""> <br></td>
</tr>
<tr>
<td>Valor Nuevo</td>
<td><input style="width: 250px;ALIGN=RIGHT;" type="text" onKeyUp="es_vacio1()" id = "txt_nuevo" name = "txt_nuevo" value=""> <br></td>
</tr>
<tr>
<td colspan="2"><center><input style="width: 250px;ALIGN=RIGHT;" type="button"  onClick = "enviar3();" id='eliminar' value="Reemplazar"/> <br></center></td>
</tr>
</table>
-->
</div>
</form>
</body>
</html>
