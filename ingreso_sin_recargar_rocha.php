<?php
require_once('Conexion/Conexion.php');
 
function validaValor($cadena)
{
	// Funcion utilizada para validar el dato a ingresar recibido por GET	
	if(eregi('^[a-zA-Z0-9._αινσϊρ‘!Ώ? -]{1,40}$', $cadena)) return TRUE;
	else return FALSE;
}

$valor=trim($_GET['dato']); 
$campo=trim($_GET['actualizar']);
$valor1=trim($_GET['dato1']); 
$campo1=trim($_GET['actualizar1']);
$COD=trim($_GET['COD']);
$DIA=trim($_GET['DIA']);
$DIA1=trim($_GET['DIA1']);
$RUT=trim($_GET['RUT']);
$NETO=trim($_GET['NETO']);
$NETO2=trim($_GET['NETO2']);
$IVA=trim($_GET['IVA']);
$TOTAL=trim($_GET['TOTAL']);
	// Si los campos son validos, se procede a actualizar los valores en la DB
	
	// Actualizo el campo recibido por GET con la informacion que tambien hemos recibido
	if($campo == "cliente")
	{
mysql_select_db($database_conn, $conn);	
$query_registro = "SELECT * FROM cliente WHERE RUT_CLIENTE ='".$RUT."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
$CODIGO_CLIENTE = $row["CODIGO_CLIENTE"];
} 
	$update = "UPDATE  proyecto SET NOMBRE_CLIENTE='$valor',RUT_CLIENTE='$RUT',CODIGO_CLIENTE ='".$CODIGO_CLIENTE."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
    else if($campo == "rut")
	{
	$update = "UPDATE proyecto SET RUT_CLIENTE='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "obra")
	{
	$update = "UPDATE proyecto SET OBRA='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
    else if($campo == "direccion_obra")
	{
	$update = "UPDATE proyecto SET DIRECCION_FACTURACION='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	 else if($campo == "oc")
	{
	$update = "UPDATE proyecto SET ORDEN_CC='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "condicion_pago")
	{
	$update = "UPDATE proyecto SET CONDICION_PAGO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
    else if($campo == "departamento_credito")
	{
	$update = "UPDATE proyecto SET DEPARTAMENTO_CREDITO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	 else if($campo == "director")
	{
	$update = "UPDATE proyecto SET EJECUTIVO='".($valor)."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	 else if($campo == "disenador")
	{
	$update = "UPDATE proyecto SET DISENADOR='".($valor)."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "contacto")
	{
	$update = "UPDATE proyecto SET CONTACTO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "fono")
	{
	$update = "UPDATE proyecto SET FONO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
    else if($campo == "mail")
	{
	$update = "UPDATE proyecto SET MAIL='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "validez")
	{
	$update = "UPDATE proyecto SET VALIDEZ_COTIZACION='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "puestos")
	{
	$update = "UPDATE proyecto SET PUESTOS='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "sub_total")
	{
       $caracteres = Array(".",","); 
       $resultado = str_replace($caracteres,"",$valor); 

	$update = "UPDATE proyecto SET TOTAL='".$TOTAL."',SUB_TOTAL='$resultado', MONTO='".$NETO."',IVA='".$IVA ."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "descuento")
	{
	$update = "UPDATE proyecto SET TOTAL='".$TOTAL."', DESCUENTO='$valor', MONTO='".$NETO."',IVA='".$IVA ."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "fecha_ingreso")
	{                  
	$update = "UPDATE proyecto SET FECHA_INGRESO='$valor', DIAS='".$DIA."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "fecha_entrega")
	{                  
	$update = "UPDATE proyecto SET FECHA_ENTREGA='$valor', DIAS='".$DIA."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "fecha_contacto")
	{                  
	$update = "UPDATE proyecto SET FECHA_CONTACTO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "estado")
	{                  
	$update = "UPDATE proyecto SET ESTADO='$valor' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "iva1")
	{             
	$caracteres = Array(".",",");     
	$update = "UPDATE proyecto SET TOTAL='".$TOTAL."',IVA='".$IVA ."',TIPO_IVA ='".$valor."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "fecha_acta")
	{      
	$update = "UPDATE proyecto SET FECHA_ACTA='".$valor."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	else if($campo == "descuento2")
	{
	$update = "UPDATE proyecto SET TOTAL='".$TOTAL."',DESCUENTO2='$valor', MONTO2='".$NETO2."' ,IVA='".$IVA ."' WHERE CODIGO_PROYECTO = '".$COD."'";
	}
	$result = mysql_query($update, $conn) or die(mysql_error());

// No retorno ninguna respuesta
?>