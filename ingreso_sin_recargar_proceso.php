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
$IVA=trim($_GET['IVA']);
$TOTAL=trim($_GET['TOTAL']);
	// Si los campos son validos, se procede a actualizar los valores en la DB
	
	// Actualizo el campo recibido por GET con la informacion que tambien hemos recibido
	if($campo == "cliente")
	{
	$update = "UPDATE radicado SET CLIENTE='$valor',RUT_CLIENTE='$RUT' WHERE CODIGO_RADICADO = '".$COD."'";
	}
    else if($campo == "rut")
	{
	$update = "UPDATE radicado SET RUT_CLIENTE='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "obra")
	{
	$update = "UPDATE radicado SET OBRA='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
    else if($campo == "direccion_obra")
	{
	$update = "UPDATE radicado SET DIRECCION='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	 else if($campo == "oc")
	{
	$update = "UPDATE radicado SET OC='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "condicion_pago")
	{
	$update = "UPDATE radicado SET CONDICION_PAGO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
    else if($campo == "departamento_credito")
	{
	$update = "UPDATE radicado SET DEPARTAMENTO_CREDITO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	 else if($campo == "director")
	{
	$update = "UPDATE radicado SET EJECUTIVO='".($valor)."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	 else if($campo == "disenador")
	{
	$update = "UPDATE radicado SET DISENADOR='".($valor)."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "contacto")
	{
	$update = "UPDATE radicado SET CONTACTO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "fono")
	{
	$update = "UPDATE radicado SET FONO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
    else if($campo == "mail")
	{
	$update = "UPDATE radicado SET MAIL='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "validez")
	{
	$update = "UPDATE radicado SET VALIDEZ_COTIZACION='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "puestos")
	{
	$update = "UPDATE radicado SET PUESTOS='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "sub_total")
	{
       $caracteres = Array(".",","); 
       $resultado = str_replace($caracteres,"",$valor); 

	$update = "UPDATE radicado SET SUB_TOTAL='$resultado', NETO='".$NETO."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "descuento")
	{
	$update = "UPDATE radicado SET DESCUENTO='$valor', NETO='".$NETO."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "fecha_ingreso")
	{                  
	$update = "UPDATE radicado SET FECHA_INGRESO='$valor', DIAS_RADICADO='".$DIA."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "fecha_entrega")
	{                  
	$update = "UPDATE radicado SET FECHA_ENTREGA='$valor', DIAS_RADICADO='".$DIA."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "fecha_contacto")
	{                  
	$update = "UPDATE radicado SET FECHA_CONTACTO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
    else if($campo == "fecha_inicior")
	{                  
	$update = "UPDATE radicado SET FECHA_INICIO_ROCHA='$valor' , DIAS_ROCHA='".$DIA1."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "fecha_entregar")
	{                  
	$update = "UPDATE radicado SET FECHA_ENTREGA_ROCHA='$valor' , DIAS_ROCHA='".$DIA1."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "estado")
	{                  
	$update = "UPDATE radicado SET ESTADO='$valor' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	else if($campo == "iva1")
	{             
	$caracteres = Array(".",",");     
	$update = "UPDATE radicado SET TOTAL='".$TOTAL."',IVA='".$IVA ."',TIPO_IVA ='".$valor."' WHERE CODIGO_RADICADO = '".$COD."'";
	}
	$result = mysql_query($update, $conn) or die(mysql_error());

// No retorno ninguna respuesta
?>