<?php require_once('Conexion/Conexion.php');?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}


$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
$GRUPOS = $_SESSION['GRUPOS'];


mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);

$valor = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Bodega Quiebre V1.3.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />

  
  <script language = javascript> 
  
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProducto.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
			
			
   function agregar(id) 
{  
      
		
	    contenedor = document.getElementById('contenedor');
		contenedor1 = document.getElementById('contenedor1');
		
		contenedor.style.display = "none";
		contenedor1.style.display = ""
		
        num = id.substring(3,5);
		
		cod = document.getElementById('cod' + num).value;
		cod = document.getElementById('cod' + num).value;
		
		des = document.getElementById('des' + num).value;
		des = document.getElementById('des' + num).value;
		
		
		um = document.getElementById('um' + num).value;
		um = document.getElementById('um' + num).value;
		
		prec = document.getElementById('prec' + num).value;
		prec = document.getElementById('prec' + num).value;
		
		precl = document.getElementById('precl' + num).value;
		precl = document.getElementById('precl' + num).value;
		
		//rea = document.getElementById('rea' + num).value;
		//rea = document.getElementById('rea' + num).value;
		
		//supo = document.getElementById('sup' + num).value;
		//supo = document.getElementById('sup' + num).value;
		
	    // est = document.getElementById('est' + num).value;
		//est = document.getElementById('est' + num).value;
		
		
		
		////
		 var tr, td, tabla;
	

	tabla = document.getElementById('tabla');
	tr = tabla.insertRow(tabla.rows.length);
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input  id='cod" + contLin +"' style= 'width:95%; border:#fff 1px solid;' type='text'  name='cod" + contLin + "' value='"+cod+ "' ><input  style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='roch" + contLin +  "' name='roch" + contLin + "' value=''><input  style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='obs" + contLin + "' name='obs" + contLin + "' value=''><input  style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='cant" + contLin + "' name='cant" + contLin + "' value=''><input  onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='um" + contLin + "' name='um" + contLin + "' value='" +um + "'><input  style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='prec" + contLin + "' name='prec" + contLin + "' value='" +prec + "'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='iva" + contLin + "' name='iva" + contLin + "' value='" +prec+ "'><input   style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='precl" + contLin + "' name='precl" + contLin + "' value='" +precl+ "'><input onblur='total();final();'  style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='desc" + contLin + "' name='desc" + contLin + "' value=''><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;display:none;' type='text' id='tot" + contLin + "' name='tot" + contLin + "' value='" +precl+ "'>";
	
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<input  onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='des" + contLin + "' name='des" + contLin + "' value='" + des + "'>";
	td = tr.insertCell(tr.cells.length);
	td.innerHTML = "<center><IMG onclick= 'borrar(this);' id='img" + contLin + "' name='img" + contLin + "' SRC='Imagenes/cerrar1.png'></center>";
	//document.getElementById('contador').value = contLin;
	document.getElementById('valor').value = contLin;

   }
   
   $(function(){
                $('#cod1').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : 
				   function(event, ui)
				   {
                       $('#proveedor1').slideUp('slow', function()
					   {
                            $('#proveedor1').val(
                                 ui.item.value + 
								'\nRut:' + ui.item.rut + 
								'\n' + ui.item.direccion + 
								'\n' + ui.item.comuna+ 
								'\nSantiago - Chile'
                            );
                       });
                       $('#proveedor1').slideDown('slow');
					   
					   $('#condicion').slideUp('slow', function()
					   {
                            $('#condicion').val(
                                 ui.item.forma 
                            );
                       });
                       $('#condicion').slideDown('slow');
					      $('#rut_prove').slideUp('slow', function()
					   {
                            $('#rut_prove').val(
                                 ui.item.rut 
                            );
                       });
                       $('#rut_prove').slideDown('slow');
                       }
                       });
				           
            });
 
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProducto.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(      
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });

function valora()
{	
contLin = document.getElementById('valor').value;
contLin++;
}

function volver()
{
	contenedor.style.display = "";
	contenedor1.style.display = "none";
}
function resta()
{
	document.getElementById('valor').value = contLin;	
}
function  borrar(obj)
{
	/*ultima = document.all.tabla.rows.length - 1;
	if(ultima > -0){
		document.all.tabla.deleteRow(ultima);		
		contLin--;	
			 
	}*/
  while (obj.tagName!='TR') 
  obj = obj.parentNode;
  tab = document.getElementById('tabla');
  for (i=0; ele=tab.getElementsByTagName('tr')[i]; i++)
   if (ele==obj) num=i;
  tab.deleteRow(num);
 
	
}
 </script>
 
</head>

<body>
	  	
    <form  method="post" name="formulario"/>      
 <div id='contenedor'>
 
  
  <center>
   <h1>Consulta Quiebre Stock</h1>    
 	
</center>
 

<table bordercolor="#ccc" id="datagrid" rules="all" style="font-size: 8pt">
<thead>
<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>

<?php if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { ?>
<th><center>OC</center></th>
 <?php } ?>
<th><center>Stock</center></th>
<th><center>OC En Transito</center></th>
<th><center>Formato</center></th>

<th><center>Minimo</center></th>
<th><center>Maximo</center></th>
<?php if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32')  { ?>
<th><center>Ingreso</center></th>
<th><center>Egreso</center></th>
<?php } ?>
</thead>
</tr>
<?php
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	
$CODIGO_PRODUCTO = "";
//listado de materiales
////////////////////////////////







mysql_select_db($database_conn, $conn);













switch ($GRUPOS) {


    case (in_array("9", $GRUPOS)):

    		$query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA IN('Laminados','sillas') and not TEMPORADA = '2' order by DESCRIPCION ASC";



        break;


    case (in_array("3", $GRUPOS)):

    $query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA IN('Embalaje','sillas','Tornillos') and not TEMPORADA = '2' order by DESCRIPCION ASC";

        break;

      case (in_array("14", $GRUPOS)):

      $query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') and not TEMPORADA = '2' order by DESCRIPCION ASC";
        
break;

default:

$query_registro = "SELECT * FROM PRODUCTO WHERE not TEMPORADA = '2' order by DESCRIPCION ASC";



};




















$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$QUEBRADOS = array();
$i=0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$STOCK_ACTUAL = $row["STOCK_ACTUAL"];
    $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$FORMATO = $row["FORMATO"];
	$gestion = $row["GESTION"];
	$Dimension = $row["DIMENSION"];
	$RELACION = $row["RELACION"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
	$PRECIO = $row['PRECIO'];	
	$PRECIO_SIN_DESCUENTO = $row['PRECIO_SIN_DESCUENTO'];
	$MENSAJE = 2;
	
	

	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{



		    $QUEBRADOS[$i] = $CODIGO_PRODUCTO;
		    $i++;



  }
  }

  
  mysql_free_result($result);










if (isset($_GET["pagina"]))
{


$CORTEy = $_GET['pagina'];




$CORTEy = $CORTEy * 500;

$CORTEx =  500; 




$queryX = "SELECT * FROM PRODUCTO where CODIGO_PRODUCTO  IN('".implode("','",$QUEBRADOS)."') and not TEMPORADA = '2' order by DESCRIPCION ASC limit ".$CORTEy.",".$CORTEx."";
$resultX = mysql_query($queryX, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($resultX))
  {
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$STOCK_ACTUAL = $row["STOCK_ACTUAL"];
    $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$FORMATO = $row["FORMATO"];
	$gestion = $row["GESTION"];
	$Dimension = $row["DIMENSION"];
	$RELACION = $row["RELACION"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
	$PRECIO = $row['PRECIO'];	
	$PRECIO_SIN_DESCUENTO = $row['PRECIO_SIN_DESCUENTO'];
	$MENSAJE = 2;


$query_registro = "SELECT sum(oc_producto.CANTIDAD) as trans FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
	$trans = $row["trans"];
  }
	
	$TOTALITI = $STOCK_ACTUAL + $trans;




    echo "<tbody><tr><td height='30'><center> <a href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "&quiebre=quiebre>" . 
	   $CODIGO_PRODUCTO . "</a> <input style='display:none;' onblur='final();' class='form1'  id =cod".$numero." type = 'text' value = '".$CODIGO_PRODUCTO."' /></center></td>";
    echo "<td id = 'des'><center> <a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $DESCRIPCION . "</a> <input style='display:none;' class='form8' id =des".$numero." type = 'text' value = '".$DESCRIPCION."' /></center></td>";
		
		 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { 
		echo "<td id = 'rut".$numero."' onClick='valora();agregar(this.id);'><center> OC </center></td>";
		 }
		
	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{	
	if($TOTALITI > $STOCK_MINIMO)
	{
		 echo "<td  style='background-color:#F79646; color:#fff;'><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	else
	{
     echo "<td style='background-color:#F72D2D; color:#fff;'><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	}
	else
	{
		echo "<td><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
		echo "<td><center>".number_format($trans, 0, ",", ".")."</center></td>";
	echo "<td><center>" . 
	    $FORMATO. "<input style='display:none;' class='form8'  id =um".$numero." type = 'text' value = '".$UNIDAD_DE_MEDIDA."' /></center></td>";
	
   
    echo "<td><center>" . 
	    $STOCK_MINIMO. "<input style='display:none;' class='form4'  id =prec".$numero." type = 'text' value = '".$PRECIO."' /></center></center></td>"; 
		 echo "<td><center>" . 
	    $STOCK_MAXIMO.   "</center></td>"; 
			 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32')  { 
	echo "<td><center><a target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stockpositivo'>
	      <h1> + </h1>      </a><input style='display:none;' class='form6'  id =precl".$numero." type = 'text' value = '".$PRECIO_SIN_DESCUENTO ."' /></center></td>"; 
    echo "<td><center><a target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stocknegativo'>
			
	      <h1> - </h1>      </center></td></tr></tbody>";  }
		   $numero++;

}

  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  mysql_free_result($resultX);











///////////////////////////////////////////////////////
}else{
//////////////////////////////////////////////////////////











$queryX = "SELECT * FROM PRODUCTO where CODIGO_PRODUCTO  IN('".implode("','",$QUEBRADOS)."') and not TEMPORADA = '2' order by DESCRIPCION ASC LIMIT 500";
$resultX = mysql_query($queryX, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($resultX))
  {
	$CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
	$DESCRIPCION = $row["DESCRIPCION"];
	$STOCK_ACTUAL = $row["STOCK_ACTUAL"];
    $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
	$FORMATO = $row["FORMATO"];
	$gestion = $row["GESTION"];
	$Dimension = $row["DIMENSION"];
	$RELACION = $row["RELACION"];
	$STOCK_MINIMO = $row["STOCK_MINIMO"];
	$STOCK_MAXIMO = $row["STOCK_MAXIMO"];
	$PRECIO = $row['PRECIO'];	
	$PRECIO_SIN_DESCUENTO = $row['PRECIO_SIN_DESCUENTO'];
	$MENSAJE = 2;


$query_registro = "SELECT sum(oc_producto.CANTIDAD) as trans FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
	$trans = $row["trans"];
  }
	
	$TOTALITI = $STOCK_ACTUAL + $trans;




    echo "<tbody><tr><td height='30'><center> <a href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "&quiebre=quiebre>" . 
	   $CODIGO_PRODUCTO . "</a> <input style='display:none;' onblur='final();' class='form1'  id =cod".$numero." type = 'text' value = '".$CODIGO_PRODUCTO."' /></center></td>";
    echo "<td id = 'des'><center> <a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $DESCRIPCION . "</a> <input style='display:none;' class='form8' id =des".$numero." type = 'text' value = '".$DESCRIPCION."' /></center></td>";
		
		 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { 
		echo "<td id = 'rut".$numero."' onClick='valora();agregar(this.id);'><center> OC </center></td>";
		 }
		
	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{	
	if($TOTALITI > $STOCK_MINIMO)
	{
		 echo "<td  style='background-color:#F79646; color:#fff;'><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	else
	{
     echo "<td style='background-color:#F72D2D; color:#fff;'><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
	}
	else
	{
		echo "<td><center>" . 
	    $STOCK_ACTUAL . "</center></td>";
	}
		echo "<td><center>".number_format($trans, 0, ",", ".")."</center></td>";
	echo "<td><center>" . 
	    $FORMATO. "<input style='display:none;' class='form8'  id =um".$numero." type = 'text' value = '".$UNIDAD_DE_MEDIDA."' /></center></td>";
	
   
    echo "<td><center>" . 
	    $STOCK_MINIMO. "<input style='display:none;' class='form4'  id =prec".$numero." type = 'text' value = '".$PRECIO."' /></center></center></td>"; 
		 echo "<td><center>" . 
	    $STOCK_MAXIMO.   "</center></td>"; 
			 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32')  { 
	echo "<td><center><a target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stockpositivo'>
	      <h1> + </h1>      </a><input style='display:none;' class='form6'  id =precl".$numero." type = 'text' value = '".$PRECIO_SIN_DESCUENTO ."' /></center></td>"; 
    echo "<td><center><a target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stocknegativo'>
			
	      <h1> - </h1>      </center></td></tr></tbody>";  }
		   $numero++;

}

  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  mysql_free_result($resultX);




}







  mysql_close($conn);

?>
</table>
<table>
<tr>






<div>
<center>
	
<?php



if (isset($_GET["pagina"]))
{
$pagina = $_GET['pagina'];
}
else
{
$pagina = 0;
}
$TODOS = (max(array_keys($QUEBRADOS)));
$TODOS++;


 $RESTO = ceil($TODOS / 500);  

for($i=0;$i<$RESTO;$i++){

?>

<?php
if($pagina <= 4)
{
	if($pagina == 0)
	{
		$menos = 9;
	}
	else if($pagina == 1)
	{
		$menos = 8;
	}
	else if($pagina == 2)
	{
		$menos = 7;
	}
	else if($pagina == 3)
	{
		$menos = 6;
	}
	else if($pagina == 4)
	{
		$menos = 5;
	}
$contador1 = $menos + $pagina; 
$contador =  $pagina - 5; 
}
else
{
$contador1 = 5 + $pagina; 
$contador =  $pagina - 5; 	
}
?>

<?php
if(0 ==  $i )
{
?>
<a  class="noactivo"   onClick="document.formulario.action='ProductoQuiebre.php?pagina=<?php echo $i;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>



<?php
if( $pagina == $i)
{
?>
<a  class="activo" onClick="document.formulario.action='ProductoQuiebre.php?pagina=<?php echo $i;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>'; document.formulario.submit();"
><?php echo $i;?></a>
<?php
}
else if($contador1  >  $i && $contador  <  $i )
{
?>
<a  class="noactivo"  onClick="document.formulario.action='ProductoQuiebre.php?pagina=<?php echo $i;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>'; document.formulario.submit();"
><?php echo $i;?></a>
<?php
}
?>
<?php
}
?>
<?php
if($RESTO  ==  $i )
{
?>
<a class="noactivo"  onClick="document.formulario.action='ProductoQuiebre.php?pagina=<?php echo $i;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>


</center>
</div>








</tr>
<tr>



<td><h4>Inventario de Bodega</h4></td>
<td><a href="ExcelInformeProductoQuiebre.php?CODIGO_PRODUCTO=<?php echo $CODIGO_PRODUCTO;?>" target="_blank">
<img src="Imagenes/Excel.png" style = "border:0px;" alt="Exportar a Excel" class="right">
</a></td>
</tr>
</table>
</div>
<div id='contenedor1' style="display:none;">

<center>
<input style= ' width:100px;' type="button" onclick="volver();" value="Volver">
<input style="display:none;" type="text" name='valor' id='valor' value='<?php echo $valor ?> '/>

<br />
<br />


 
<table id="tabla" border="0" frame="box" rules="all" width="100%"> 
      <tr>
		<th>Codigo</th>
		<th>Descripcion</th>
        <th>Eliminar</th>
	</tr>
  
<?php 
$cont = 1;
while($cont <= 75) 
{
	if(isset($_POST["cod".$cont]))
	{
		echo"<tr><td><input  style= 'width:95%; border:#fff 1px solid;' type='text' id='cod".$cont."' name='cod".$cont."'  value='".$_POST["cod".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='roch".$cont."' name='roch".$cont."' value='".$_POST["roch".$cont]."'></td>";
		echo"<td><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='des".$cont."' name='des".$cont."' value='".$_POST["des".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='obs".$cont."' name='obs".$cont."' value='".$_POST["obs".$cont]."'></td>";
	    echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='cant".$cont."' name='cant".$cont."' value='".$_POST["cant".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='um".$cont."' name='um".$cont."' value='".$_POST["um".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='prec".$cont."' name='prec".$cont."' value='".$_POST["prec".$cont]."'></td>";
		 echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='iva".$cont."' name='iva".$cont."' value='".$_POST["iva".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='precl".$cont."' name='precl".$cont."' value='".$_POST["precl".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='desc".$cont."' name='desc".$cont."' value='".$_POST["desc".$cont]."'></td>";
		echo"<td style='display:none;'><input onblur='total();final();' onkeydown='total();final();' style= 'width:95%;border:#fff 1px solid;' type='text' id='tot".$cont."' name='tot".$cont."' value='".$_POST["tot".$cont]."'></td>";
		
echo"<td><center><IMG onclick= 'borrar(this);' SRC='Imagenes/cerrar1.png'></center></td></tr>";		
	}
	$cont++;
}

?>
</table>
<input type="button"  value="OC" onClick="document.formulario.action='OrdenDeCompras.php'; document.formulario.submit();" /> 

 <center>
</div>
 </form>
</body>
</html>
