<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];

///// Declaracion de variables Toma de Información
$ID = $_POST['txt_id'];

$CLIENTE = $_POST['txt_cliente'];
$RUT_CLIENTE= $_POST['txt_rut'];
$RADICADO = $_POST['txt_radicado'];
$PRODUCTO = $_POST['txt_producto'];
$DIRECTOR = $_POST['txt_director'];
$CANTIDAD = $_POST['txt_cantidad'];
$CANTIDADI = $_POST['txt_cantidadi'];
$TIPO = $_POST['txt_tipo'];
$OBSERVACIONES = $_POST['txt_obs'];

$VALOR = $_POST['txt_valor'];
$ESTADO = $_POST['txt_estado'];
$COSTO = $_POST['txt_costo'];
$FECHA_ENTREGA = $_POST['txt_ent'];
$FECHA_INGRESO = $_POST['txt_ing'];
$FECHA_CONFIRMACION = $_POST['txt_con'];
$DIAS = $_POST['txt_dias'];
$EMPRESA = $_POST['txt_emp'];
$COTIZADOR = $_POST['txt_cotizador'];
$DISENADOR = $_POST['txt_disenador'];
$TIEMPOD = $_POST['txt_tiempod'];



$caracteres = Array(".",","); 
$COSTO = str_replace($caracteres,"",$COSTO); 

$caracteres = Array(".",","); 
$VALOR = str_replace($caracteres,"",$VALOR); 
// FIN TRASPASO DE FORMULARIO

// CONSULTA SQL	              
$sql = "UPDATE cotizacion_producto_especial SET  TIEMPO_DESARROLLO = '".$TIEMPOD."', CODIGO_RADICADO = '".$RADICADO."', CLIENTE = '".$CLIENTE."',RUT_CLIENTE = '".$RUT_CLIENTE."',CODIGO_PRODUCTO ='".$PRODUCTO."',CANTIDAD_MUEBLES = '".$CANTIDAD."',CANTIDAD_ITEM = '".$CANTIDADI."',OBSERVACIONES = '".$OBSERVACIONES."', VALOR_VENTA = '".$VALOR."',COSTO_PRODUCCION = '".$COSTO."',FECHA_CONFIRMACION = '".$FECHA_CONFIRMACION."',FECHA_INGRESO = '".$FECHA_INGRESO."',FECHA_ENTREGA = '".$FECHA_ENTREGA."',TIPO_MUEBLE = '".$TIPO."' , COTIZADOR = '".$COTIZADOR."', DIRECTOR_PROYECTO = '".$DIRECTOR."',CODIGO_USUARIO = '".$CODIGO_USUARIO."',  DIAS = '".  $DIAS."' ,EMPRESA = '".  $EMPRESA."' ,ESTADO = '".$ESTADO."',DISENADOR = '".$DISENADOR."' WHERE ID = '".$ID."'  "; 
                                      
$result = mysql_query($sql, $conn) or die(mysql_error());	






echo '<script language = javascript>
alert("OK")
self.location = "productoEspecial.php"
</script>';

?>