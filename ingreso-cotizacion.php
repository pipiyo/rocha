<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}


if(isset($_GET["radicado"])){
	$rad = $_GET["radicado"];
}
else{
	$rad = $_POST["radicado"];
}
mysql_select_db($database_conn, $conn);


$contador = "select * from radicado where CODIGO_RADICADO = '".$rad."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
  $CLIENTE = $row["CLIENTE"];
  $RUT_CLIENTE = $row["RUT_CLIENTE"];
  $OBRA = $row["OBRA"];
  $DIRECCION_OBRA = $row["DIRECCION"];
  $OC = $row["OC"];
  $CONDICION_PAGO = $row["CONDICION_PAGO"];
  $DEPARTAMENTO_CREDITO = $row["DEPARTAMENTO_CREDITO"];
  $DIRECTOR = $row["EJECUTIVO"];
  $DISENADOR = $row["DISENADOR"];
  $CONTACTO = $row["CONTACTO"];
  $FONO = $row["FONO"];
  $MAIL = $row["MAIL"];
  $VALIDEZ = $row["VALIDEZ_COTIZACION"];
  $PUESTOS = $row["PUESTOS"];
  $SUB_TOTAL = $row["SUB_TOTAL"];
  $DESCUENTO = $row["DESCUENTO"];
  $FECHA_INGRESO = $row["FECHA_INGRESO"];
  $FECHA_ENTREGA = $row["FECHA_ENTREGA"];
  $FECHA_CONTACTO = $row["FECHA_CONTACTO"];
  $DIAS_RADICADO = $row["DIAS_RADICADO"];
  $FECHA_INICIOR = $row["FECHA_INICIO_ROCHA"];
  $FECHA_ENTREGAR = $row["FECHA_ENTREGA_ROCHA"];
  $DIAS_ROCHA = $row["DIAS_ROCHA"];
  $ESTADO = $row["ESTADO"];
  $NETO = $row["NETO"];
  $IVA = $row["IVA"];
  $TOTAL = $row["TOTAL"];
  $TIPO_IVA = $row["TIPO_IVA"];
  $DISABLED = "";
  $COLOR = "";
  $DESCUENTO2 = $row["DESCUENTO2"];
  $MONTO2 = $row["MONTO2"];
}
mysql_free_result($result1);

?>

<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Ingreso cotizacion V1.0</title>
    <link rel="shortcut icon" href="Imagenes/rocha.png">
    <link rel="styleSheet" href="style/formulario.css" type="text/css" >
    <link rel="stylesheet" href="style/font-awesome.min.css" />
    <link rel="stylesheet" href="style/font-awesome.css" />

	  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
	  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

    <script type="text/javascript" src="js/tinybox.js"></script>
    <script type="text/javascript" src="js/ingreso-cotizador.js"></script>

    <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
  </head>
<body>
  <div id='bread'><div id="menu1"></div></div>
	<h1>Ingreso Cotización </h1>

  <input type="hidden" value=<?php echo $rad; ?> id="codigo-radicado">

	<table class="form-cotizacion">
		<tr>
			<td class="color">Codigo</td>
			<td><?php echo $rad; ?></td>
			<td class="color">Fecha</td>
			<td><?php echo date("Y-m-d"); ?></td>
		</tr>
		<tr>
			<td class="color">Cliente</td>
			<td><?php echo $CLIENTE ?></td>
			<td class="color">Rut</td>
			<td><?php echo $RUT_CLIENTE; ?></td>
		</tr>
		<tr>
			<td class="color">Dirección despacho</td>
			<td><?php echo $DIRECCION_OBRA; ?></td>
			<td class="color">Direccion facturación</td>
			<td><?php echo $DIRECCION_OBRA; ?></td>
		</tr>
		<tr>
			<td class="color">Telefono</td>
			<td><?php echo $FONO; ?></td>
			<td class="color">Fecha instalación</td>
			<td><?php echo $FECHA_ENTREGA; ?></td>
		</tr>
		<tr>
			<td class="color">Orden CC</td>
			<td><?php echo $OC ?></td>
			<td class="color">Directores de proyectos</td>
			<td><?php echo $DIRECTOR ?></td>
		</tr>
		<tr>
			<td class="color">Condiciones de pago</td>
			<td><?php echo $CONDICION_PAGO ?></td>
			<td class="color">Transporte</td>
			<td>Bicicleta</td>
		</tr>
		<tr>
			<td class="color">Validez de la cotizacion</td>
			<td><?php echo $VALIDEZ ?></td>
			<td class="color">Tiempo entrga</td>
			<td><?php echo $DIAS_RADICADO ?></td>
		</tr>
		<tr>
			<td class="color">Departamento credito</td>
			<td><?php echo $DEPARTAMENTO_CREDITO ?></td>
			<td class="color"></td>
			<td></td>
		</tr>
	</table>
	<form method="post" action="ingreso-cotizacion.php" enctype="multipart/form-data" id="testform">
		<?php

if(empty($_POST["fila"]))
{
  $fila = 0;
} 
else
{
  $fila = $_POST["fila"];
}

if(empty($_POST["contenido"]))
{
  $contenido = "";
} 
else
{
  $contenido = $_POST["contenido"];
}
if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {

	$fp = fopen($_FILES['archivo']['tmp_name'], "r");
	$i = 0;
 	while (!feof($fp)){
 	$cantidad = 0;
  		$data  = explode(",", fgets($fp));
  		$e = 0;
      if($i > 0)
      {
  		  $contenido .= "<tr id='fila".$fila."' class='filcount'>";
        $fila++;
      }
  		foreach ($data as $key => $value) {
  			if($i > 0)
  			{
  				if($e < 2)
  				{
  					if($e == 1)
  					{
  						mysql_select_db($database_conn, $conn);
						$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$value."'";
						$result = mysql_query($query_registro, $conn) or die(mysql_error());
						$numero = 0;
			 			while($row = mysql_fetch_array($result))
  						{
							$DESCRIPCION1 = $row["DESCRIPCION"];
							$STOCK_ACTUAL1 = $row["STOCK_ACTUAL"];
							$PRECIO1 = $row["PRECIO"];
							$UNIDAD_DE_MEDIDA1 = $row["UNIDAD_DE_MEDIDA"];
							$FORMATO1 = $row["FORMATO"];
							$gestion1 = $row["GESTION"];
							$RELACION = $row["RELACION"];
							$CATEGORIA = $row["CATEGORIA"];
							$STOCK_MINIMO = $row["STOCK_MINIMO"];
							$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
  						$RUTA = $row["RUTA"];
  						$RUTA1 = $row["RUTA1"];
  						$RUTA2 = $row["RUTA2"];
  						$DESHABILITAR = $row["DESHABILITAR"];
  						$FAMILIA = $row["FAMILIA"];

  						$ALTO = $row["ALTO"];
  						$ANCHO = $row["ANCHO"];
  						$LARGO = $row["LARGO"];
							$M3 = $row["M3"];

  						$M2 = $row["M2"];
  						$PESO = $row["PESO"];
  						//$PRECIO_VENTA = $row["PRECIO_VENTA"];
              $PRECIO_VENTA = $row["PRECIO_LISTA_PRECIO"];
  						$COSTO = $row["COSTO"];
  						$ANCHO_CORTE = $row["ANCHO_CORTE"];
  						$ALTO_CORTE = $row["ALTO_CORTE"];
  					  $LARGO_CORTE = $row["LARGO_CORTE"];
  						}
  						$cantidad =  $cantidad * $PRECIO_VENTA;
  					 	$contenido .= "<td align='center' id='codigo_producto".$fila."'> $value</td>";
  					 	$contenido .= "<td> $DESCRIPCION1 <input type='hidden' value=".$cantidad1." id='valorantiguocantidad".$fila."'>  <input type='hidden' value='".number_format($PRECIO_VENTA,0,",",".")."' id='valorcantidad".$fila."'> <input type='hidden' value='' id='valorantiguo".$fila."'></td>";
              if($CATEGORIA == "Mueble De Linea" || $CATEGORIA == "Superficies Curvas" || $CATEGORIA == "Superficies Rectas" || $CATEGORIA == "Cajoneras" || $CATEGORIA == "Soportes")
              {
                $contenido .= "<td align='center'><select class='seleccion' id='seleccion".$fila."'><option>Seleccione</option><option value='m'>Melamina</option> <option value='l'>Laminado</option> <option value='e'>Enchape</option> </select></td>";
              }
              else
              {
                $contenido .= "<td align='center'></td>";
              }
  					 	$contenido .= "<td align='right' id='unitario".$fila."'>". number_format($PRECIO_VENTA,0,",",".") ."</td>";
              $contenido .= "<td align='center' id='descuento".$fila."' class='descuento'> </td>";
  					 	$contenido .= "<td align='right' id='total-final".$fila."'>". number_format($cantidad,0,",",".") ."</td>";
              $contenido .= "<td align='right' id='costo".$fila."'>". number_format($COSTO,0,",",".") ."</td>";
              $contenido .= "<td align='center'><i id='basura".$fila."' class='fa fa-trash-o fa-2x bas'></i></td>";
  					}
  					else
  					{
  						$cantidad = $value;
              $cantidad1 = $value;
  						$contenido .= "<td align='right' id='cantidaditem".$fila."' class='cantidaditem'>$value</td>";	
  					}
  				}
  			}
  		$e++;
  		}
    if($i > 0)
    {
  	 $contenido .= "</tr>";
    }
  	$i++;
  	}  
} 

if (empty($_POST["contenido"]))
{
	$contenido1 = "";
} 
else
{
	$contenido1 = $_POST["contenido"];
}



?>
		<div class="subir">
 			<input name="boton" type="submit" id="boton" class="boton" value="Subir">
 			<input name="radicado" type="hidden" id="radicado" value="<?php echo $rad; ?>">
      <input name="fila" type="hidden" id="fila" value="<?php echo $fila; ?>">
 			<input name="contenido" type="hidden" id="contenido" value="<?php echo $contenido ?>">
 			<input name="archivo" type="file" id="archivo">
		</div>
	</form>

<table class='new-producto'>
  <tr>
    <td align="center" class="new-producto-color">Código</td>
    <td ><input type="text" value="" class="item_codigo"> <input type="hidden" value="" class="item_categoria"></td>
    <td align="center" class="new-producto-color">Producto</td>
    <td><input type="text" value="" class="item_producto"><input type="hidden" value="" class="item_venta"><input type="hidden" value="" class="item_costo"></td>
  </tr>
</table>

<div class="subir">
  <input name="boton" type="submit" id="ingreso" class="boton" value="Añadir">
</div>

<table id='productos-cotizador'>
  <tr>
    <td class='cabezado-cotiza'>Ingreso Descripción</td>
    <td><input type="text" name = 'piso' id='piso' value=""/> </td>
    <td align="center"><input type="button" class="boton" name = 'agregarpiso' id='agregarpiso' value='+'> </td>
  </tr>
  <tr>
    <td class='cabezado-cotiza'>Cantidad</td>
    <td class='cabezado-cotiza'>Codigo</td>
    <td class='cabezado-cotiza'>Descripcion</td>
    <td class='cabezado-cotiza'>Familia</td>
    <td class='cabezado-cotiza'>Valor Unitario</td>
    <td class='cabezado-cotiza'>Descuento</td>
    <td class='cabezado-cotiza'>Valor Total</td>
    <td class='cabezado-cotiza'>Costo</td>
  </tr>
  <tbody id="editor">
<?php if(isset($_POST["radicado"])){ ?>

	
<?php
if(isset($_POST["fila"]))
{
  $fila = $fila - 2;
}
if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
    echo $contenido1;
	$fp = fopen($_FILES['archivo']['tmp_name'], "r");
	$i = 0;
 	while (!feof($fp)){
 	$cantidad = 0;
  		$data  = explode(",", fgets($fp));
  		$e = 0;
      if($i > 0)
      {
  		  echo "<tr id='fila".$fila."' class='filcount'>";
        $fila++;
      }
  		foreach ($data as $key => $value) {
  			if($i > 0)
  			{
  				if($e < 2)
  				{
  					if($e == 1)
  					{
  						mysql_select_db($database_conn, $conn);
						$query_registro = "SELECT * FROM producto WHERE CODIGO_PRODUCTO ='".$value."'";
						$result = mysql_query($query_registro, $conn) or die(mysql_error());
						$numero = 0;
			 			while($row = mysql_fetch_array($result))
  						{
							$DESCRIPCION1 = $row["DESCRIPCION"];
							$STOCK_ACTUAL1 = $row["STOCK_ACTUAL"];
							$PRECIO1 = $row["PRECIO"];
							$UNIDAD_DE_MEDIDA1 = $row["UNIDAD_DE_MEDIDA"];
							$FORMATO1 = $row["FORMATO"];
							$gestion1 = $row["GESTION"];
							$RELACION = $row["RELACION"];
							$CATEGORIA = $row["CATEGORIA"];
							$STOCK_MINIMO = $row["STOCK_MINIMO"];
							$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
  						$RUTA = $row["RUTA"];
  						$RUTA1 = $row["RUTA1"];
  						$RUTA2 = $row["RUTA2"];
  						$DESHABILITAR = $row["DESHABILITAR"];
  						$FAMILIA = $row["FAMILIA"];

  						$ALTO = $row["ALTO"];
  						$ANCHO = $row["ANCHO"];
  						$LARGO = $row["LARGO"];
							$M3 = $row["M3"];

  						$M2 = $row["M2"];
  						$PESO = $row["PESO"];
  						//$PRECIO_VENTA = $row["PRECIO_VENTA"];
  						$PRECIO_VENTA  = $row["PRECIO_LISTA_PRECIO"];
  						$COSTO = $row["COSTO"];
  						$ANCHO_CORTE = $row["ANCHO_CORTE"];
  						$ALTO_CORTE = $row["ALTO_CORTE"];
  						$LARGO_CORTE = $row["LARGO_CORTE"];
  						}
  						$cantidad =  $cantidad * $PRECIO_VENTA;
  					 	echo "<td align='center' id='codigo_producto".$fila."'> $value</td>";
  					 	echo "<td> $DESCRIPCION1 <input type='hidden' value=".$cantidad1." id='valorantiguocantidad".$fila."'> <input type='hidden' value='".number_format($PRECIO_VENTA,0,",",".")."' id='valorcantidad".$fila."'> <input type='hidden' id='valorantiguo".$fila."'></td>";
              if($CATEGORIA == "Mueble De Linea" || $CATEGORIA == "Superficies Curvas" || $CATEGORIA == "Superficies Rectas" || $CATEGORIA == "Cajoneras" || $CATEGORIA == "Soportes" )
              {
  					 	 echo "<td align='center'><select class='seleccion' id='seleccion".$fila."'><option>Seleccione</option><option value='m'>Melamina</option> <option value='l'>Laminado</option> <option value='e'>Enchape</option> </select></td>";
              }
              else
              {
               echo "<td align='center'></td>";
              }
              echo "<td align='right' id='unitario".$fila."'>". number_format($PRECIO_VENTA,0,",",".") ."</td>";
              echo "<td align='center' id='descuento".$fila."' class='descuento'></td>";
  					 	echo "<td align='right' id='total-final".$fila."'> ".number_format($cantidad,0,",",".") ." </td>";
              echo "<td align='right' id='costo".$fila."'> ".number_format($COSTO,0,",",".") ." </td>";
              echo "<td align='center'><i id='basura".$fila."' class='fa fa-trash-o fa-2x bas'></i></td>";
  					}
  					else
  					{
  						$cantidad = $value;
              $cantidad1 = $value;
  						echo "<td align='right' id='cantidaditem".$fila."' class='cantidaditem'>$value</td>";	
  					}
  				}
  			}
  		$e++;
  		}
      if($i > 0)
      {
  	   echo "</tr>";
      }
  	$i++;
  	}  
} 
else 
{
 	echo "Error de subida";
}
}
?> 

  </tbody>
  <tfoot>
    <tr style="display:none;" class='finala'><td colspan='6' align='right'>Rocha</td><td><?php echo $rad; ?></td></tr>
  </tfoot>
	</table>
  <div class="content-preview">
   <input style=""  type="button" class="boton" name = 'preview' id='preview' value='Ingresar' /> 
  </div>
 <!-- <textarea cols="200" rows="100" id="prueba"> </textare> -->
</body>
</html>