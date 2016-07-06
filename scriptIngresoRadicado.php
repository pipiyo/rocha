<?php 
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn);

$CODIGO_RADICADO = $_POST["txt_codigo_radicado"];
$EMPRESA_RADICADO = $_POST["txt_empresa_radicado"];
$NOMBRE_CLIENTE = $_POST["txt_nombre_cliente"];

$cliente = (empty($_POST['cliente'])) ? "" : $_POST['cliente'] ;
$rut = (empty($_POST['rut'])) ? "" : $_POST['rut'] ;
$obra = (empty($_POST['obra'])) ? "" : $_POST['obra'] ;
$direccion_obra = (empty($_POST['direccion_obra'])) ? "" : $_POST['direccion_obra'] ;
$oc = (empty($_POST['oc'])) ? "" : $_POST['oc'] ;
$condicion_pago = (empty($_POST['condicion_pago'])) ? "" : $_POST['condicion_pago'] ;
$validez = (empty($_POST['validez'])) ? "" : $_POST['validez'] ;
$puestos = (empty($_POST['puestos'])) ? "" : $_POST['puestos'] ;
$condicion_pago = (empty($_POST['condicion_pago'])) ? "" : $_POST['condicion_pago'] ;
$departamento_credito = (empty($_POST['departamento_credito'])) ? "" : $_POST['departamento_credito'] ;
$director = (empty($_POST['director'])) ? "" : $_POST['director'] ;
$disenador = (empty($_POST['disenador'])) ? "" : $_POST['disenador'] ;
$contacto = (empty($_POST['contacto'])) ? "" : $_POST['contacto'] ;
$fono = (empty($_POST['fono'])) ? "" : $_POST['fono'] ;
$mail = (empty($_POST['mail'])) ? "" : $_POST['mail'] ;
$validez = (empty($_POST['validez'])) ? "" : $_POST['validez'] ;
$fecha_ingreso = (empty($_POST['fecha_ingreso'])) ? "" : $_POST['fecha_ingreso'] ;
$fecha_entrega = (empty($_POST['fecha_entrega'])) ? "" : $_POST['fecha_entrega'] ;
$dias_radicado = (empty($_POST['dias_radicado'])) ? "" : $_POST['dias_radicado'] ;
$fecha_contacto = (empty($_POST['fecha_contacto'])) ? "" : $_POST['fecha_contacto'] ;
$fecha_inicior = (empty($_POST['fecha_inicior'])) ? "" : $_POST['fecha_inicior'] ;
$fecha_entregar = (empty($_POST['fecha_entregar'])) ? "" : $_POST['fecha_entregar'] ;
$dias_rocha = (empty($_POST['dias_rocha'])) ? "" : $_POST['dias_rocha'] ;
$sub_total = (empty($_POST['sub_total'])) ? "" : $_POST['sub_total'] ;
$descuento = (empty($_POST['descuento'])) ? "" : $_POST['descuento'] ;
$neto = (empty($_POST['neto'])) ? "" : $_POST['neto'] ;
$iva = (empty($_POST['iva'])) ? "" : $_POST['iva'] ;
$iva1 = (empty($_POST['iva1'])) ? "" : $_POST['iva1'] ;
$total = (empty($_POST['total'])) ? "" : $_POST['total'] ;
$fecha_contacto = (empty($_POST['fecha_contacto'])) ? "" : $_POST['fecha_contacto'] ;
$fecha_ingreso = (empty($_POST['fecha_ingreso'])) ? "" : $_POST['fecha_ingreso'] ;
$fecha_entrega = (empty($_POST['fecha_entrega'])) ? "" : $_POST['fecha_entrega'] ;
$dias_radicado = (empty($_POST['dias_radicado'])) ? "" : $_POST['dias_radicado'] ;
$estado = (empty($_POST['estado'])) ? "" : $_POST['estado'] ;;

 $arreglo = Array("."); 
 $descuento  = str_replace($arreglo,"",$descuento ); 

 $arreglo = Array(","); 
 $descuento  = str_replace($arreglo,".",$descuento ); 

 $arreglo = Array(","); 
 $descuento  = str_replace($arreglo,".",$descuento ); 

 $arreglo = Array(".",","); 
 $neto = str_replace($arreglo,"",$neto); 

 $arreglo = Array(","); 
 $neto = str_replace($arreglo,".",$neto); 

 $arreglo = Array(".",","); 
 $iva = str_replace($arreglo,"",$iva); 

 $arreglo = Array(","); 
 $iva = str_replace($arreglo,".",$iva);

   $arreglo = Array(".",","); 
 $total = str_replace($arreglo,"",$total); 

 $arreglo = Array(","); 
 $total = str_replace($arreglo,".",$total); 

$SUPER_CODIGO =  (isset($_POST['CM'])) ? "".$CODIGO_RADICADO."-".$EMPRESA_RADICADO."-".$NOMBRE_CLIENTE."-CM"  :  "".$CODIGO_RADICADO."-".$EMPRESA_RADICADO."-".$NOMBRE_CLIENTE."" ;

mysql_select_db($database_conn, $conn);
$sql = "INSERT INTO radicado (CODIGO_RADICADO,ESTADO,RUT_CLIENTE,CLIENTE,OBRA,EJECUTIVO,OC,DIRECCION,DISENADOR,CONTACTO,FONO,MAIL,VALIDEZ_COTIZACION,PUESTOS,FECHA_INGRESO,FECHA_ENTREGA,DIAS_RADICADO,FECHA_CONTACTO,FECHA_INICIO_ROCHA,FECHA_ENTREGA_ROCHA,DIAS_ROCHA,SUB_TOTAL,DESCUENTO,NETO,IVA,TIPO_IVA,TOTAL,CONDICION_PAGO,DEPARTAMENTO_CREDITO) values ('R-".$SUPER_CODIGO."','EN PROCESO','".$rut."','".$cliente."','".$obra."','".$director."','".$oc."','".$direccion_obra."','".$disenador."','".$contacto."','".$fono."','".$mail ."','".$validez."','".$puestos."','".$fecha_ingreso."','".$fecha_entrega."','".$dias_radicado."','".$fecha_contacto."','".$fecha_inicior."','".$fecha_entregar."','".$dias_rocha."','".$sub_total."','".$descuento."','".$neto."','".$iva ."','".$iva1."','".$total."','".$condicion_pago."','".$departamento_credito."')";

$result = mysql_query($sql, $conn) or die(mysql_error());

echo "<script language = javascript>
self.location = 'DescripcionRadicado.php?txt_codigo_proyecto2=R-".$SUPER_CODIGO." '
</script>";

?>
