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

$CLIENTE = $_POST['txt_cliente'];
$RUT_CLIENTE= $_POST['txt_rut'];
$RADICADO = $_POST['txt_radicado'];
$PRODUCTO = $_POST['txt_producto'];
$DIRECTOR = $_POST['txt_director'];
$CANTIDAD = $_POST['txt_cantidad'];
$CANTIDADI = $_POST['txt_cantidadi'];
$TIPO = $_POST['txt_tipo'];
$OBSERVACIONES = $_POST['txt_obs'];
$FECHA_INGRESO = $_POST['txt_ing'];
$VALOR = $_POST['txt_valor'];
$ESTADO = 'En Proceso';
$COSTO = $_POST['txt_costo'];
$FECHA_ENTREGA = $_POST['txt_ent'];
$FECHA_CONFIRMACION = $_POST['txt_con'];
$DIAS = $_POST['txt_dias'];
$EMPRESA = $_POST['txt_emp'];
$COTIZADOR = $_POST['txt_cotizador'];
$DISENADOR = $_POST['txt_disenador'];


// FIN TRASPASO DE FORMULARIO
$caracteres = Array(".",","); 
$COSTO = str_replace($caracteres,"",$COSTO); 

$caracteres = Array(".",","); 
$VALOR = str_replace($caracteres,"",$VALOR); 
// CONSULTA SQL	   



$query_registro = "SELECT * FROM cotizacion_producto_especial WHERE CODIGO_RADICADO ='".$RADICADO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
  $numero++;
  }

   if($numero == 0)
{        
$sql = "INSERT INTO cotizacion_producto_especial(CODIGO_RADICADO,CANTIDAD_ITEM,CLIENTE,RUT_CLIENTE,CODIGO_PRODUCTO,	CANTIDAD_MUEBLES, OBSERVACIONES, VALOR_VENTA,COSTO_PRODUCCION,FECHA_CONFIRMACION,FECHA_INGRESO,FECHA_ENTREGA,TIPO_MUEBLE,COTIZADOR,DIRECTOR_PROYECTO,CODIGO_USUARIO,DIAS,EMPRESA,ESTADO,DISENADOR) 
                                        VALUES ('".$RADICADO."','".$CANTIDADI."','".$CLIENTE."','".$RUT_CLIENTE."','".$PRODUCTO."','".$CANTIDAD."','".$OBSERVACIONES."','".$VALOR."','".$COSTO."','".$FECHA_CONFIRMACION."','".$FECHA_INGRESO."','".$FECHA_ENTREGA."','".$TIPO."','".$COTIZADOR."','".$DIRECTOR."','".$CODIGO_USUARIO."','".  $DIAS."','".  $EMPRESA."','".$ESTADO."','".$DISENADOR."')";
$result = mysql_query($sql, $conn) or die(mysql_error());	


$sql12 = "SELECT * FROM cotizacion_producto_especial ORDER BY ID DESC LIMIT 1";
$result22 = mysql_query($sql12, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result22))
  {
	$CODIGO_TI = $row["ID"];

  }


echo '<script language = javascript>
alert("OK")
self.location = "productoEspecial.php"
</script>';
}
else
{
	  echo '<script language = javascript>
  alert("El codigo del radicado ya existe")
  self.location = "productoEspecial.php"
  </script>';
}

?>