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
$OBSERVACIONES = $_POST['txt_mot'];
$FECHA_INGRESO = $_POST['txt_ing'];
$ESTADO = 'En Proceso';
$FECHA_ENTREGA = $_POST['txt_ent'];
$FECHA_CONFIRMACION = $_POST['txt_con'];
$DIAS = $_POST['txt_cantidad'];
$EMPRESA = $_POST['txt_emp'];
$COTIZADOR = $_POST['txt_adm'];
$PUESTOS = $_POST['txt_cotizador'];
$LICITACION = $_POST['txt_tipo'];
$LICITACION_TIPO='';
$FECHA_SOLICITUD = $_POST['txt_ent1'];
$DIAS_VALIDEZ = $_POST['txt_val'];

if (isset($_POST['txt_tipol']))  
{
	$LICITACION_TIPO = $_POST['txt_tipol'];
}
// FIN TRASPASO DE FORMULARIO

// CONSULTA SQL	              
$sql = "INSERT INTO solicitud_tiempo_especial(DIAS_VALIDEZ,CODIGO_PROYECTO ,CLIENTE, RUT, PROYECTO, OBSERVACION,       FECHA_INSTALACION,       FECHA_INGRESO,     FECHA_PROBABLE,  ADMINISTRATIVO,           DIRECTOR_PROYECTO,       CODIGO_USUARIO,  DIAS_PRODUCCION,EMPRESA,ESTADO,NUMERO_PUESTO,LICITACION,TIPO_LICITACION,FECHA_SOLICITUD) 
                                        VALUES ('".$DIAS_VALIDEZ."','".$RADICADO."','".$CLIENTE."','".$RUT_CLIENTE."','".$PRODUCTO."','".$OBSERVACIONES."','".$FECHA_CONFIRMACION."','".$FECHA_INGRESO."','".$FECHA_ENTREGA."','".$COTIZADOR."','".$DIRECTOR."','".$CODIGO_USUARIO."','".  $DIAS."','".  $EMPRESA."','".$ESTADO."','".$PUESTOS."','".$LICITACION."','".$LICITACION_TIPO."','".$FECHA_SOLICITUD."')";
$result = mysql_query($sql, $conn) or die(mysql_error());	


/////////////////////////////////////

$sqlA = "SELECT * FROM solicitud_tiempo_especial ORDER BY ID DESC LIMIT 1";
$resultA = mysql_query($sqlA, $conn) or die(mysql_error());
while($row = mysql_fetch_array($resultA))
  {
	$ID_FIN = $row["ID"];
  }
mysql_free_result($resultA);




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
        $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Linea Gerencial','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "2":
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Panel Piso-Cielo','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "3":
         $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Panel Of Abierta','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "4":
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Baldosas','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "5":
         $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Superficies','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "6":
           $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Gabinentes','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "7":
           $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Repisas','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "8":
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Pedestales','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
    case "9":
           $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Kardex','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
	case "10":
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL) VALUES('".$CANTIDAD."','Folderamas','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."')";
		$result = mysql_query($sql, $conn) or die(mysql_error());	
        break;
  case "11":
  $produ= $_POST['txt_produ'.$contador];
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL,NOMBRE_PRODUCTO) VALUES('".$CANTIDAD."','OBSERVACION1','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."','".$produ."')";
    $result = mysql_query($sql, $conn) or die(mysql_error()); 
        break;
    case "12":
      $produ= $_POST['txt_produ'.$contador];
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL,NOMBRE_PRODUCTO) VALUES('".$CANTIDAD."','OBSERVACION2','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."','".$produ."')";
    $result = mysql_query($sql, $conn) or die(mysql_error()); 
        break;
         case "13":
           $produ= $_POST['txt_produ'.$contador];
          $sql = "INSERT INTO descripcion_tiempo_especial(CANTIDAD,PRODUCTO,LINEA1,LINEA2,LINEA3,ID_TIEMPO_ESPECIAL,NOMBRE_PRODUCTO) VALUES('".$CANTIDAD."','OBSERVACION3','".$LINEA1."','".$LINEA2."','".$LINEA3."','".$ID_FIN."','".$produ."')";
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
$sql = "INSERT INTO acabados_tiempo_especial(PERFILERIA,FORMICA, MELAMINA, MADERA, VIDRIO, TELA_BALDOSAS,TELA_BALDOSAS_C,TELA_SILLA,TELA_SILLA_C, TELA_PANELES, TELA_PANELES_C,ID_TIEMPO_ESPECIAL) 
 VALUES ('".$PERFILERIA."','".$FORMICA."','".$MELAMINA."','".$MADERA."','".$VIDRIO."','".$TELA_BALDOSAS."','".$TELA_BALDOSAS_C."','".$TELA_SILLA ."','".$TELA_SILLA_C."','".$TELA_PANELES."','".$TELA_PANELES_C."','".$ID_FIN."')";
 
$result = mysql_query($sql, $conn) or die(mysql_error());	


echo '<script language = javascript>
alert("OK")
self.location = "tiempo-especial.php"
</script>';

?>