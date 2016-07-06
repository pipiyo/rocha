<?php 
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

$hd = $_POST["hd"];
$fechai = $_POST["fechai"];
$he = $_POST["he"];
$hd1 = $_POST["hd1"];
$he1 = $_POST["he1"];
$colacion = $_POST["colacion"];
$locomocion = $_POST["locomocion"];
$rut = $_POST["rut"];
$colacion_extra = $_POST["colacion_extra"];
$locomocion_extra = $_POST["locomocion_extra"];
$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_NOMBRE = $_POST['buscar_nombre'];
$BUSCAR_AREA = $_POST['buscar_area'];
$txt_hasta = $_POST["txt_hasta"];
$txt_desde = $_POST["txt_desde"];
$dias_laborales= $_POST["diasl"];
$faltado_c= $_POST["diast"];
$faltado_s= $_POST["falts"];
$licencia= $_POST["licencia"];
$vacaciones= $_POST["vacaciones"];

mysql_select_db($database_conn, $conn);
$sql = "INSERT INTO horas_extras (vacaciones,licencia,faltado_s,faltado_c,dia_laborales,locomocion_extras,colaciones_extras,fecha,hora_extra,hora_descuento,locomocion,colacion,rut) values ('".$vacaciones."','".$licencia."','".$faltado_s."','".$faltado_c."','".$dias_laborales."','".$locomocion_extra."','".$colacion_extra."','".$fechai."','".$he.":".$he1.":00','".$hd.":".$hd1.":00','".$locomocion."','".$colacion."','".$rut."')";

$result = mysql_query($sql, $conn) or die(mysql_error());

echo '<script language = javascript>
self.location = "EmpleadosHorasExtras.php?buscar_codigo='. urlencode($BUSCAR_CODIGO). '&buscar_nombre='. urlencode($BUSCAR_NOMBRE).'&buscar_area=' . urlencode($BUSCAR_AREA). '&buscar=buscar&txt_desde='.urlencode($txt_desde).'&txt_hasta='.urlencode($txt_hasta).'"</script>';
?>