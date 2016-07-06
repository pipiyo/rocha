<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);
$CODIGO = $_POST['txta_codigoMateriales'];	
$query_registro = "SELECT * FROM producto WHERE CODIGO_producto ='".$CODIGO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$CODIGO_PRODUCTO1 = $row["CODIGO_PRODUCTO"];
	$numero++;
  }
mysql_free_result($result1);
  
if($numero != 0)
{
	
$DESCRIPCION = $_POST["txta_descripcion"];
$CODIGO = $_POST['txta_codigoMateriales'];
$PRECIO = $_POST['txta_precio'];
$UNIDAD = $_POST['txta_unidadDeMedidad'];
$FORMATO = $_POST['txta_formato'];
$GESTION = $_POST['txta_gestion'];
$RELACION = $_POST['txta_relacion'];
$STOCK_MINIMO = $_POST['txta_stock_minimo'];
$STOCK_MAXIMO = $_POST['txta_stock_maximo'];
$CATEGORIA = $_POST['txta_categoria'];
$NUEVO = $_POST['txta_codigoNuevo'];
$quiebre = $_POST['quiebre'];

$LARGO = $_POST['txt_largo'];
$ANCHO = $_POST['txt_ancho'];
$ALTO = $_POST['txt_alto'];
$M3 = $_POST['txt_m3'];

$M2 = $_POST["txt_m2"];
$PESO = $_POST["txt_peso"];
$PRECIO_VENTA = $_POST["txt_precio_venta"];
$PRECIO_LISTA_PRECIO = $_POST["txt_lista_precio"];
$COSTO = $_POST["txt_costo"];
$ANCHO_CORTE = $_POST["txt_ancho_corte"];
$ALTO_CORTE = $_POST["txt_alto_corte"];
$LARGO_CORTE = $_POST["txt_largo_corte"];
$FAMILIA = $_POST["txt_familia"];

if(isset($_POST['habilitado']))
{
  $VAR=1;
}
else
{
  $VAR=0;	
}
if($NUEVO == "")
{
$NUEVO = $CODIGO;
}
$fecha = date("y-m-y G:i:s");
mysql_select_db($database_conn, $conn);

$sql = "UPDATE producto SET DESCRIPCION = '".$DESCRIPCION."',FORMATO = '" .$FORMATO. "', RELACION = '".$RELACION."', UNIDAD_DE_MEDIDA = '".$UNIDAD."', PRECIO = '".$PRECIO. "', GESTION = '".$GESTION."', STOCK_MINIMO = '".$STOCK_MINIMO."', STOCK_MAXIMO = '".$STOCK_MAXIMO."',CATEGORIA = '".($CATEGORIA)."',CODIGO_PRODUCTO = '".$NUEVO."',DESHABILITAR = '".$VAR."',ALTO = '".$ALTO."',ANCHO = '".$ANCHO."',LARGO = '".$LARGO."',M3 = '".$M3."', M2 = '".$M2."', PESO = '".$PESO."', PRECIO_VENTA = '".$PRECIO_VENTA."',PRECIO_LISTA_PRECIO = '".$PRECIO_LISTA_PRECIO."' ,COSTO = '".$COSTO."',ANCHO_CORTE = '".$ANCHO_CORTE."',ALTO_CORTE = '".$ALTO_CORTE."',LARGO_CORTE = '".$LARGO_CORTE."' WHERE CODIGO_PRODUCTO = '".$CODIGO."'";
$result = mysql_query($sql, $conn) or die(mysql_error());

if($FAMILIA == 'GENERICO'){
$sql2 = "UPDATE producto SET FORMATO = '" .$FORMATO. "', RELACION = '".$RELACION."', UNIDAD_DE_MEDIDA = '".$UNIDAD."', PRECIO = '".$PRECIO. "', GESTION = '".$GESTION."', STOCK_MINIMO = '".$STOCK_MINIMO."', STOCK_MAXIMO = '".$STOCK_MAXIMO."',CATEGORIA = '".($CATEGORIA)."',DESHABILITAR = '".$VAR."',ALTO = '".$ALTO."',ANCHO = '".$ANCHO."',LARGO = '".$LARGO."',M3 = '".$M3."', M2 = '".$M2."', PESO = '".$PESO."', PRECIO_VENTA = '".$PRECIO_VENTA."',PRECIO_LISTA_PRECIO = '".$PRECIO_LISTA_PRECIO."' ,COSTO = '".$COSTO."',ANCHO_CORTE = '".$ANCHO_CORTE."',ALTO_CORTE = '".$ALTO_CORTE."',LARGO_CORTE = '".$LARGO_CORTE."' WHERE CODIGO_GENERICO = '".$CODIGO."'";
$result1 = mysql_query($sql2, $conn) or die(mysql_error());
}

$sql1 = "UPDATE OC_PRODUCTO SET CODIGO_PRODUCTO  = '".$NUEVO."' WHERE CODIGO_PRODUCTO = '".$CODIGO."'";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());

$sql1 = "UPDATE producto_vale_emision SET CODIGO_PRODUCTO  = '".$NUEVO."' WHERE CODIGO_PRODUCTO = '".$CODIGO."'";
$result1 = mysql_query($sql1, $conn) or die(mysql_error());



if(is_uploaded_file($_FILES['fleImagen']['tmp_name'])) /* verifica haya sido cargado el archivo*/
 { 
$archivo = $_FILES['fleImagen']['name']; /*Tomo el nombre archivo*/
$trozos = explode(".", $archivo); /* separo el nombre y la extension*/
$extension = end($trozos); /* Extension */
$NOMBRE_FILE = $CODIGO."_img_0.".$extension; /*nombre y codigo de extension*/
//
$ruta= "producto/".$NOMBRE_FILE; /*Ruta donde quiero mover imagen*/
move_uploaded_file($_FILES['fleImagen']['tmp_name'], ($ruta)); /*Mueve el archivo*/

$sql01="UPDATE producto set ruta = '".$ruta."' where CODIGO_PRODUCTO = '".$CODIGO."'"; /*guardo en el producto la ruta para poder llamarlo*/
$result01 = mysql_query($sql01, $conn) or die(mysql_error()); /*ejecuto la query*/

}

if(is_uploaded_file($_FILES['fleImagen1']['tmp_name']))
 { // verifica haya sido cargado el archivo
//



$archivo = $_FILES['fleImagen1']['name']; 
$trozos = explode(".", $archivo); 
$extension = end($trozos);
$NOMBRE_FILE = $CODIGO."_img_1.".$extension;
//
$ruta= "producto/".$NOMBRE_FILE;
move_uploaded_file($_FILES['fleImagen1']['tmp_name'], ($ruta));

$sql01="UPDATE producto set ruta1 = '".$ruta."' where CODIGO_PRODUCTO = '".$CODIGO."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());

}

if(is_uploaded_file($_FILES['fleImagen2']['tmp_name']))
 { // verifica haya sido cargado el archivo
//



$archivo = $_FILES['fleImagen2']['name']; 
$trozos = explode(".", $archivo); 
$extension = end($trozos);
$NOMBRE_FILE = $CODIGO."_img_2.".$extension;
//
$ruta= "producto/".$NOMBRE_FILE;
move_uploaded_file($_FILES['fleImagen2']['tmp_name'], ($ruta));

$sql01="UPDATE producto set ruta2 = '".$ruta."' where CODIGO_PRODUCTO = '".$CODIGO."'";
$result01 = mysql_query($sql01, $conn) or die(mysql_error());

}





if($quiebre == 'quiebre')
{
echo '<script language = javascript>
alert("Listo")
self.location = "ProductoQuiebre.php?buscar_codigo=&buscar_usuario=&familias='.($CATEGORIA).'&buscar=Buscar"
</script>';
}
else
{
echo '<script language = javascript>
window.close("DescripcionProductoDetalle.php");
</script>';	
}

}
else
{
echo '<script language = javascript>
window.close("DescripcionProductoDetalle.php");
</script>';
}
?>