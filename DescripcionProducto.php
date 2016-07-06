<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

/////////////////////////////////////////////////////////
$CODIGO_PRODUCTO = $_GET['CODIGO_PRODUCTO'];
$quiebre = '';
if( isset($_GET['quiebre']))
{	
$quiebre = $_GET['quiebre'];
}
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$CODIGO_PRODUCTO."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
	$DESCRIPCION1 = $row["DESCRIPCION"];
	$STOCK_ACTUAL1 = $row["STOCK_ACTUAL"];
	$PRECIO1 = $row["PRECIO"];
	$UNIDAD_DE_MEDIDA1 = $row["UNIDAD_DE_MEDIDA"];
	$FORMATO1 = $row["FORMATO"];
	$gestion1 = $row["GESTION"];
	$RELACION = $row["RELACION"];
	$CATEGORIA = $row["CATEGORIA"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
  $RUTA = $row["RUTA"];
  $RUTA1 = $row["RUTA1"];
  $RUTA2 = $row["RUTA2"];
  $DESHABILITAR = $row["DESHABILITAR"];
  $FAMILIA = $row["FAMILIA"];

  $ALTO = $row["ALTO"];
  $ANCHO = $row["ANCHO"];
  $LARGO = $row["LARGO"];
  $M3 = $row["M3"];

  $M2 = $row["M2"];
  $PESO = $row["PESO"];
  $PRECIO_VENTA = $row["PRECIO_VENTA"];
  $PRECIO_LISTA_PRECIO = $row["PRECIO_LISTA_PRECIO"];
  $COSTO = $row["COSTO"];
  $ANCHO_CORTE = $row["ANCHO_CORTE"];
  $ALTO_CORTE = $row["ALTO_CORTE"];
  $LARGO_CORTE = $row["LARGO_CORTE"];
 
  }
  mysql_free_result($result);
  mysql_close($conn);

  if($DESHABILITAR == 0 )
  {
    $selected = '';
  }
  else
  {
    $selected = 'checked';
  }

?>

<!doctype html>
<html>
<head>
<title>Modificar Producto V1.1.0</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<link rel="StyleSheet" href="Style/bodega.css" type="text/css" media="screen">
<link rel="shortcut icon" href="Imagenes/rocha.png">
<link rel="styleSheet" href="style/bread.css" type="text/css" >
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src='js/Bloqueo.php'></script> 
<script src='js/breadcrumbs.php'></script>

<script language = javascript>  

$(document).ready(function(){
  $("#txt_largo, #txt_ancho, #txt_alto").live( "keyup", function(e){
    
    $largo = $("#txt_largo").val();
    $ancho = $("#txt_ancho").val();
    $alto  = $("#txt_alto").val();

    if($largo != "" && $ancho !="" && $alto !="" )
    {
      $valor1 = $largo * $ancho * $alto;
      $valor2 = $valor1 / 1000000;
      $valor3 = 1 * $valor2;
      $original=parseFloat($valor3);
      $result=Math.round($original*100)/100 ;
      $alto  = $("#txt_m3").val($result);
    }
    else
    {
      $alto  = $("#txt_m3").val("0");
    }  

  });
});

$(document).ready(function(){
  $("#txt_largo, #txt_ancho").live( "keyup", function(e){
    
    $largo = $("#txt_largo").val();
    $ancho = $("#txt_ancho").val();

    if($largo != "" && $ancho !="")
    {
      $valor1 = $largo * $ancho ;
      $valor2 = $valor1 / 1000000;
      $valor3 = 1 * $valor2;
      $original=parseFloat($valor3);
      $result=Math.round($original*100)/100 ;
      $alto  = $("#txt_m2").val($result);
    }
    else
    {
      $alto  = $("#txt_m2").val("0");
    }  

  });
});

/* 1 */  
function remodificar()
{
  window.close("DescripcionProducto.php");
}
/* 2 */  
function justNumbers(e)
{
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
    return true;
    return /\d/.test(String.fromCharCode(keynum));
}
/* 3 */  
function enviar()
{
  var as= confirm("Realmente deseas Modificar");
  if(as)
  {
    document.getElementById("formulario11").submit();
  }
  else
  {
    return false;
  }
}
</script>
</head>
<body>
<div id='bread'><div id="menu1"></div></div>  

<form enctype="multipart/form-data" id = 'formulario11' method="POST" action="scriptActualizarProductos.php"/>
<div class='descripcion_producto'>

<h1>Descripción Producto</h1>
<table class="table-form">
  <tr>
    <td class='azul_pro'>Descripción:</td>
    <td colspan="3"><input class="grupo_input_descripcion_productos"  type="text" id = 'txta_descripcion' name = "txta_descripcion"  value="<?php echo $DESCRIPCION1; ?>"></td>
    <td colspan="2" rowspan="6" align="center"><img src = '<?php echo $RUTA ?>'  /></td>
  </tr>
  <tr>
    <td class='azul_pro'>Codigo:</td>
    <td colspan="3"><input  class="grupo_input_descripcion_producto" type="text" readonly name = "txta_codigoMateriales" value="<?php echo $CODIGO_PRODUCTO1; ?>"></td>
  </tr>
  <tr>
    <td class='azul_pro'>Nuevo Codigo:</td>
    <td colspan="3"><input class="grupo_input_descripcion_producto" type="text" name = "txta_codigoNuevo" value=""></td>
  </tr>
  <tr>
    <td class='azul_pro'>&nbsp;</td>
    <td>&nbsp;</td>
    <td class='azul_pro'>Categoria:</td>
    <td><select  class="grupo_input_descripcion_producto2" id = "txta_categoria" name = "txta_categoria">
            <option> <?php echo $CATEGORIA; ?> </option>
            <option> Accesorios </option>
            <option> Accesorios Paneleria</option>
            <option> ACTIU </option>
            <option> Articulo Electrico </option>
            <option> Almacenamiento</option>
            <option> Almacenamiento Metalico</option>
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
            <option> Producto </option>
            <option> Producto Especial</option>
            <option> Quincalleria </option>
            <option> Quimicos </option> 
            <option> Repiceria </option>
            <option> Servicios </option>
            <option> Seguridad </option>
            <option> Sillas </option>
            <option> Soportes </option> 
            <option> Soportes Metalicos </option> 
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
    <td><select class="grupo_input_descripcion_producto2" id = "txta_gestion" name = "txta_gestion">
  <option> <?php echo $gestion1; ?> </option>
  <option> IP </option>
  <option> IE </option>
  <option> IG </option>
  </select></td>
    <td class='azul_pro'>Precio Lista Precio:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text"  name = "txt_lista_precio" value="<?php echo $PRECIO_LISTA_PRECIO; ?>"</td>
  </tr>
  <tr>
    <td class='azul_pro'>Formato:</td>
    <td><select class="grupo_input_descripcion_producto2"  id = "txta_formato" name = "txta_formato">
<option> <?php echo $FORMATO1; ?>  </option>
<option> cu </option>
<option> tira </option>
<option> placa </option>
<option> empaque </option>
<option> un </option>
<option> ml </option>
<option> lamina </option>
</select></td>
    <td class='azul_pro'>Precio Venta:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text"  name = "txt_precio_venta" value="<?php echo $PRECIO_VENTA; ?>"></td>
  </tr>
  <tr>
    <td class='azul_pro'>Relación:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text" name = "txta_relacion" value="<?php  echo $RELACION; ?>"></td>
    <td class='azul_pro'>Precio Compra:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);"  type="text"  name = "txta_precio" value="<?php echo $PRECIO1; ?>"></td>
    <td class='azul_pro'>Stock:</td>
    <td><input class="grupo_input_descripcion_producto"  type="text" readonly name = "txta_stockActual" value="<?php echo $STOCK_ACTUAL1; ?>"> </td>
  </tr>
  <tr>
    <td class='azul_pro'>U/M:</td>
    <td><select class="grupo_input_descripcion_producto2"  id = "txta_unidadDeMedidad" name = "txta_unidadDeMedidad" onChange="es_vacio()">
<option><?php echo $UNIDAD_DE_MEDIDA1; ?>  </option>
<option> un  </option>
<option> ml  </option>
<option> m2  </option>
<option> m3  </option>
<option> par </option>
<option> lts </option>
</select></td>
    <td class='azul_pro'>Costo:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text"  name = "txt_costo" value="<?php echo $COSTO; ?>"></td>
    <td class='azul_pro'>Stock Minimo:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text" name = "txta_stock_minimo" value="<?php  echo $STOCK_MINIMO; ?>"> </td>
  </tr>
  <tr>
    <td class='azul_pro'>M2:</td>
    <td><input readonly  class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_m2" id = "txt_m2" value="<?php echo $M2; ?>"></td>
    <td class='azul_pro'>Desabilitar:</td>
    <td class=''><input <?php echo  $selected ?> type ='checkbox' id='habilitado' name='habilitado' value="si"> </td>
    <td class='azul_pro'>Stock Maximo:</td>
    <td><input class="grupo_input_descripcion_producto" onKeyPress="return justNumbers(event);" type="text" name = "txta_stock_maximo" value="<?php  echo $STOCK_MAXIMO; ?>"> </td>
  </tr>
  <tr>
    <td class='azul_pro'>M3:</td>
    <td><input readonly  class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_m3" id = "txt_m3" value="<?php echo $M3; ?>"></td>
    <td class='azul_pro'>&nbsp;</td>
    <td>&nbsp;</td>
    <td class='azul_pro'>Cad 2D</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'>Peso(KG):</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_peso" id = "txt_peso" value="<?php echo $PESO ?>"></td>
    <td class='azul_pro'></td>
    <td>&nbsp;</td>
    <td class='azul_pro'>Cad 3D</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class='azul_pro'>Larga Terminado:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_largo" id = "txt_largo" value="<?php echo $LARGO; ?>"></td>
    <td class='azul_pro'>Largo Corte:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_largo_corte" id = "txt_largo_corte" value="<?php echo $LARGO_CORTE; ?>"></td>
    <td class='azul_pro'>IMG icono<input type="file" name="fleImagen" id="fleImagen"/></td>
    <td><?php if($RUTA != '') { ?>
<P style ='font-size:9px;'> Ya se encuentra cargado el archivo <?php echo $RUTA ?> </p>
  <?php } ?> </td>
  </tr>
  <tr>
    <td class='azul_pro'>Alto Terminado:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_alto" id = "txt_alto" value="<?php echo $ALTO ?>"></td>
    <td class='azul_pro'>Alto Corte:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_alto_corte" id = "txt_alto_corte" value="<?php echo $ALTO_CORTE; ?>"></td>
    <td class='azul_pro'>IMG 400 x 400 <input type="file" name="fleImagen1" id="fleImagen1"/></td>
    <td><?php if($RUTA1 != '') { ?>
<P style ='font-size:9px;'> Ya se encuentra cargado el archivo <?php echo $RUTA1 ?> </p>
  <?php } ?> </td>
  </tr>
  <tr>
    <td class='azul_pro'>Ancho Terminado:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_ancho" id = "txt_ancho" value="<?php echo $ANCHO ?>"></td>
    <td class='azul_pro'>Ancho Corte:</td>
    <td><input class="grupo_input_descripcion_producto"  onKeyPress="return justNumbers(event);" type="text" name = "txt_ancho_corte" id = "txt_ancho_corte" value="<?php echo $ANCHO_CORTE; ?>"></td>
    <td class='azul_pro'>IMG 600 x 600 <input type="file" name="fleImagen2" id="fleImagen2"/></td>
    <td><?php if($RUTA2 != '') { ?>
<P style ='font-size:9px;'> Ya se encuentra cargado el archivo <?php echo $RUTA2 ?> </p>
  <?php } ?> </td>
  </tr>
  <tr>
    <td align ="right" colspan='6'><input type="button" id = 'modificar' name = 'modificar' onClick = "enviar()" class='boton'  value="Modificar"></td>
  </tr> 
</table>


<input type="hidden" name="txt_familia" id="txt_familia" value="<?php echo $FAMILIA;?>">
<input type="hidden" value="<?php echo $quiebre; ?>" name='quiebre' id='quiebre' />
<div>  
</form> 
</body>
</html>
