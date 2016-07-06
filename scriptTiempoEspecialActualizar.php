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
$OBSERVACIONES = $_POST['txt_mot'];
$FECHA_INGRESO = $_POST['txt_ing'];
$ESTADO =  $_POST['txt_estado'];
$FECHA_ENTREGA = $_POST['txt_ent'];
$FECHA_CONFIRMACION = $_POST['txt_con'];
$DIAS = $_POST['txt_cantidad'];
$EMPRESA = $_POST['txt_emp'];
$COTIZADOR = $_POST['txt_adm'];
$PUESTOS = $_POST['txt_cotizador'];
$LICITACION = $_POST['txt_tipo'];
$LICITACION_TIPO='';

$FECHA_SOLICITUD = $_POST['txt_ent1'];
$FECHA_RECIBO= $_POST['txt_rec'];

$DIAS_VALIDEZ = $_POST['txt_val'];


if (isset($_POST['txt_tipol']))  
{
	$LICITACION_TIPO = $_POST['txt_tipol'];
}


// FIN TRASPASO DE FORMULARIO

// CONSULTA SQL	              
$sql = "UPDATE solicitud_tiempo_especial SET CODIGO_PROYECTO = '".$RADICADO."', CLIENTE = '".$CLIENTE."',RUT = '".$RUT_CLIENTE."',PROYECTO ='".$PRODUCTO."',OBSERVACION = '".$OBSERVACIONES."',FECHA_INSTALACION = '".$FECHA_CONFIRMACION."',FECHA_INGRESO = '".$FECHA_INGRESO."', FECHA_PROBABLE = '".$FECHA_ENTREGA."',TIPO_LICITACION = '".$LICITACION_TIPO."' , ADMINISTRATIVO = '".$COTIZADOR."', DIRECTOR_PROYECTO = '".$DIRECTOR."',  DIAS_PRODUCCION = '".  $DIAS."' ,EMPRESA = '".  $EMPRESA."' ,ESTADO = '".$ESTADO."',NUMERO_PUESTO = '".$PUESTOS."',LICITACION = '".$LICITACION."',FECHA_SOLICITUD = '".$FECHA_SOLICITUD."',FECHA_RECIBO = '".$FECHA_RECIBO."',DIAS_VALIDEZ = '".$DIAS_VALIDEZ."' WHERE ID = '".$ID."'  "; 
                                      
$result = mysql_query($sql, $conn) or die(mysql_error());	

///////////////////////


$contador = 1;
while($contador < 14)
{
$CANTIDAD= $_POST['txt_producto'.$contador];
$LINEA1= $_POST['txt_lineaa'.$contador];
$LINEA2= $_POST['txt_lineab'.$contador];
$LINEA3= $_POST['txt_lineac'.$contador];
	
switch ($contador)
		 {
    case "1":
        $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Linea Gerencial'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "2":
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Panel Piso-Cielo'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "3":
         $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Panel Of Abierta'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "4":
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Baldosas'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "5":
          $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Superficies'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "6":
          $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Gabinentes'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "7":
          $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Repisas'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "8":
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Pedestales'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "9":
            $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Kardex'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "10":
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Folderamas'";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
   case "11":
    $produ= $_POST['txt_produ'.$contador];
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."',NOMBRE_PRODUCTO = '".$produ."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION1'";
    $result = mysql_query($sql, $conn) or die(mysql_error()); 
        break;
    case "12":
     $produ= $_POST['txt_produ'.$contador];
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."',NOMBRE_PRODUCTO = '".$produ."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION2'";
    $result = mysql_query($sql, $conn) or die(mysql_error()); 
        break;
    case "13":
     $produ= $_POST['txt_produ'.$contador];
           $sql = "UPDATE descripcion_tiempo_especial SET CANTIDAD = '".$CANTIDAD."',LINEA1 = '".$LINEA1."',LINEA2 = '".$LINEA2."',LINEA3 = '".$LINEA3."',NOMBRE_PRODUCTO = '".$produ."' WHERE  ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION3'";
    $result = mysql_query($sql, $conn) or die(mysql_error()); 
        break;
		 }
		 $contador++;
}

//////////////////////////////////

$PERFILERIA = $_POST['txt_perfileria'];
$FORMICA= $_POST['txt_formica'];
$MELAMINA = $_POST['txt_melamina'];
$MADERA = $_POST['txt_madera'];
$VIDRIO = $_POST['txt_vidrio'];
$TELA_BALDOSAS = $_POST['txt_referencia1'];
$TELA_BALDOSAS_C = $_POST['txt_color1'];
$TELA_SILLA = $_POST['txt_referencia2'];
$TELA_SILLA_C = $_POST['txt_color2'];
$TELA_PANELES = $_POST['txt_referencia3'];
$TELA_PANELES_C = $_POST['txt_color3'];
$sql = "UPDATE acabados_tiempo_especial 
SET 
PERFILERIA = '".$PERFILERIA."',
FORMICA = '".$FORMICA."',
MELAMINA = '".$MELAMINA."', 
MADERA = '".$MADERA."', 
VIDRIO = '".$VIDRIO."', 
TELA_BALDOSAS = '".$TELA_BALDOSAS."',
TELA_BALDOSAS_C = '".$TELA_BALDOSAS_C."',
TELA_SILLA = '".$TELA_SILLA."',
TELA_SILLA_C = '".$TELA_SILLA_C."', 
TELA_PANELES = '".$TELA_PANELES."', 
TELA_PANELES_C = '".$TELA_PANELES_C."' 
 WHERE  ID_TIEMPO_ESPECIAL = '".$ID."'";

 
$result = mysql_query($sql, $conn) or die(mysql_error());	





echo '<script language = javascript>
alert("OK")
self.location = "tiempo-especial.php"
</script>';

?>