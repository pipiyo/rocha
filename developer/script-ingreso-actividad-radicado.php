<?php 
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$NOMBRE_SERVICIO = $_POST['txt_nombre_servicio'];
$CANTIDAD_DIAS = $_POST['txt_cantidad_dias'];
$FECHAES= $_POST['txt_fechae_servicio'];
$FECHAIS= $_POST['txt_fechai_servicio'];
$REALIZADOR= $_POST['txt_realizador'];
$SUPERVISOR= $_POST['txt_supervisor'];
$OBSERVACIONESS= $_POST['txt_observaciones_s'];
$DIRECCION2 = $_POST['txt_direccions'];
$CODIGO_PROYECTO = $_POST['CODIGO_PROYECTO'];
$DESCRIPCIONS = $_POST['txt_descripcion_s'];
switch ($NOMBRE_SERVICIO)
		 {
	  case "Cotizacion":
        $NUMERA = 13;
        break;
    case "Planimetria":
         $NUMERA = 14;	
        break;
    case "Presentacion":
         $NUMERA = 15;	
        break;
    case "Reunion":
         $NUMERA = 16;
        break;
    case "Visita":
         $NUMERA = 17;	
        break;

		 }

$sql = "INSERT INTO servicio (DESCRIPCION,DIAS,NOMBRE_SERVICIO,FECHA_INICIO,FECHA_ENTREGA,REALIZADOR,SUPERVISOR,OBSERVACIONES,ESTADO,CODIGO_USUARIO,CODIGO_RADICADO) values ('".($DESCRIPCIONS)."','".($CANTIDAD_DIAS)."','".($NOMBRE_SERVICIO)."','".($FECHAIS)."','".($FECHAES)."','".($REALIZADOR)."','".($SUPERVISOR)."','".($OBSERVACIONESS)."','EN PROCESO','".($CODIGO_USUARIO)."','".($CODIGO_PROYECTO)."')";
$result = mysql_query($sql, $conn) or die(mysql_error());

header("Location: DescripcionRadicado.php?txt_codigo_proyecto2=".urlencode($CODIGO_PROYECTO) ."");

echo '<script language = javascript>
javascript:history.go(-2)
</script>';



?>