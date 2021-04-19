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


$query = "SELECT * FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
$result2 = mysql_query($query, $conn) or die(mysql_error());
$numero = 0;
$GRP = "";
$GRP1 = "";
$GRP2 = "";
$GRP3 = "";
 while($row = mysql_fetch_array($result2))
  {
	if($numero == 0)
	{
	$GRP = $row["INICIALES_GRUPO"];
	}
	if($numero == 1)
	{
	$GRP1 = $row["INICIALES_GRUPO"];
	}
	if($numero == 2)
	{
	$GRP2 = $row["INICIALES_GRUPO"];
	}
	if($numero == 3)
	{
	$GRP3 = $row["INICIALES_GRUPO"];
	}
	$numero++;
  }
mysql_free_result($result2);



if (isset($_POST["valor"]))
{
$valor = $_POST["valor"];
}
else if (isset($_GET["valor"]))
{
$valor = $_GET["valor"];
}

$CODIGO_OC = 0;
$sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$numero++;
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Bodega silla V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <script type="text/javascript" src="js/ordenDeCompra.js"></script>

  <script language = javascript> 
 
   function agregar(id) 
{  
      
		
	    contenedor = document.getElementById('contenedor');
		contenedor1 = document.getElementById('contenedor1');
		
		contenedor.style.display = "none";
		contenedor1.style.display = ""
		
        num = id.substring(3,7);
		
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

function limpiar()
{
document.getElementById('cod1').value = ""
}


  function  habilitar(id) 
{  

  num = id.substring(8,12);
  if(document.getElementById(id).checked == true)
  {
	  
document.getElementById("code" + num).disabled = false;
  }
  else
  {
  document.getElementById("code" + num).disabled = true;
  
  }
 
}


   function marcar(source) 
    {
 
  checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
        for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
        {
            if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
            {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
            }
        }

if(document.getElementById('checka1').checked == true)
  {
   for (i=0;i<document.formulario.elements.length;i++) 
      if(document.formulario.elements[i].type == "checkbox")	
         document.formulario.elements[i].checked=1; 
		 
		 valor = document.getElementById('cuentaprime').value;
		 valor = valor - 1;
		 cuenta = 0;
		 while(valor >= cuenta)
		 {
			 document.getElementById("code" + cuenta).disabled = false;
			 cuenta++;
		 }
  }
  else
  {
	  for (i=0;i<document.formulario.elements.length;i++) 
      if(document.formulario.elements[i].type == "checkbox")	
         document.formulario.elements[i].checked=0;
		 
		 valor = document.getElementById('cuentaprime').value;
		 valor = valor - 1;
		 cuenta = 0;
		 while(valor >= cuenta)
		 {
			 document.getElementById("code" + cuenta).disabled = true;
			 cuenta++;
		 }
  }
} 

 </script>
</head>
<body>
 <form  method="POST" name="formulario" / >   
<div id='contenedor'>
 
<center>  <h1> Bodega </h1>   
  <table>
  <tr>
  <td> Codigo: </td>
  <td> <input style="border:grey 1px solid;border-radius: 8px;width:100px;" type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  <td> Descripcion: </td>
  <td> <input style="border:grey 1px solid;border-radius: 8px;width:100px;" type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>
  <td>Categoria: </td>
  <td ><center><select style="border:grey 1px solid;border-radius: 8px;width:100px;" id = "familias" name = "familias">
<option>  </option>

<option> Embalaje </option>

<option> Sillas </option>

<option> Tela </option>

<option> Tornillos </option>



  </select></center></td>
     <td width="50">&nbsp;</td>
  <td width="138"><input style=""  type="submit" name = "buscar" id='buscar' value="Buscar"/> </td>
  <td width="10">&nbsp;  </td>
 </tr>
 <tr>
 <?php if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) {?>  <td>Categoria Actualizar:  </td>
  <td ><center><select  style="border:grey 1px solid;border-radius: 8px;width:100px;" id = "familias1" name = "familias1">
<option>  </option>
<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Cajoneras </option>
<option> Cerraduras </option>
<option> Correderas </option>
<option> Cristales </option>
<option> Cubiertas </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Mantencion </option>
<option> Maquinas y Herramientas </option>
<option> Mueble De Linea </option>
<option> Paneleria </option>
<option> Partes y Piezas </option>
<option> Producto</option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Quimicos </option>	
<option> Repiceria </option>
<option> Servicios </option>
<option> Seguridad </option>
<option> Sillas </option>
<option> Soportes </option>
<option> Superficies Curvas </option>
<option> Superficies Rectas </option>
<option> Tapacantos </option>
<option> Tela </option>
<option> Tiradores </option>
<option> Tornillos </option>


  </select></center></td>
    <td width="90" colspan="2" align="center">Seleccionar todo </td>
    <td width="20"><input type="checkbox" id='checka1' name='checka1' onclick="marcar(this);"  />   </td> <?php } ?>
      
 <td>
<a target='_blank' href="Producto-quiebre-silla.php">
<div id='qd'><h3 id='hquiebre'> <center> Quiebre </center></h3></div>
</a>
</td>     
      
<td>
<a target='_blank' href="producto-quiebre-disponible-siila.php?valor=0">
<div id='qdd'><h3 id='hdquiebre'><center> Quiebre Disponible </center></h3> </div>
</a>
</td>

  </tr>
  
  </table>	
  </center>

 


<table id="datagrid" rules="all" cellspacing=0 cellpadding=0 style="font-size: 8pt">
<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Categoria</center></th>
 <?php if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) {?><th><center>Actualizar </center></th><?php } ?>
 <?php if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { ?>
<th><center>OC</center></th>
 <?php } ?>
<th><center>Stock</center></th>

<th><center>OC En Transito</center></th>

<th><center>Vale Emitidos</center></th>
<th><center>Stock Contable</center></th>
<th><center>Stock Disponible</center></th>
<th><center>Formato</center></th>
<th><center>Minimo</center></th>
<th><center>Maximo</center></th>
<?php if($CODIGO_USUARIO == '19' ||$CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  { ?>
<th><center>Ingreso</center></th>
<th><center>Egreso</center></th>
 <?php } ?>

</tr>
<?php
ini_set('max_execution_time', 500);
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	
$CODIGO_PRODUCTO ="";
$familias="";
//listado de materiales
////////////////////////////////
if (isset($_POST["buscar"]) || isset($_GET["buscar"])) 
{
if (isset($_POST["buscar_codigo"]))
{	
$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_POST['buscar_usuario'];	
$familias = $_POST['familias'];
if (isset($_POST["familias1"]))
{	
$familias1 = $_POST['familias1'];
}
$cuentaprime = 0;
$CONTADOROF = 0;

if (isset($_POST["cuentaprime"]))
{
$cuentaprime = $_POST["cuentaprime"];
}
while($CONTADOROF <=  $cuentaprime )
{
if (isset($_POST['actucate'.$CONTADOROF]))  
{		  
$sql = "UPDATE producto SET CATEGORIA = '".$familias1."' WHERE CODIGO_PRODUCTO = '".$_POST["code".$CONTADOROF]."'";
$result4 = mysql_query($sql, $conn) or die(mysql_error());
}
$CONTADOROF++;
}
	
}
else if (isset($_GET["buscar_codigo"]))
{	
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
}

mysql_select_db($database_conn, $conn);
if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO where  CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje')  order by DESCRIPCION ASC";	
//$query_registro = "SELECT CODIGO_PRODUCTO,DESCRIPCION,STOCK_ACTUAL,PRECIO,UNIDAD_DE_MEDIDA,FORMATO,GESTION,DIMENSION,RELACION,STOCK_MINIMO FROM PRODUCTO WHERE CODIGO_PRODUCTO = //'".$BUSCAR_CODIGO."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%'  order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  == "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  != "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
//$query_registro = "SELECT CODIGO_PRODUCTO,DESCRIPCION,STOCK_ACTUAL,PRECIO,UNIDAD_DE_MEDIDA,FORMATO,GESTION,DIMENSION,RELACION,STOCK_MINIMO FROM PRODUCTO WHERE CODIGO_PRODUCTO = //'".$BUSCAR_CODIGO."' OR  DESCRIPCION = '".($BUSCAR_DESCRIPCION)."'  order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" && $familias != "" )
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA = '".$familias."' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  != "" && $familias == "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  == "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO != "" && $BUSCAR_DESCRIPCION  != "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC ";
}
else if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  != "" && $familias != "")
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CATEGORIA = '".$familias."' OR  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' and CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje')  order by DESCRIPCION ASC ";
}
}
else
{
	$query_registro = "SELECT * FROM PRODUCTO where CATEGORIA In ('Tela', 'Sillas','Tornillos','Embalaje') order by DESCRIPCION ASC";
}



$contador1 = 0;
$numero = 0;


$result = mysql_query($query_registro, $conn) or die(mysql_error());
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
	$CATEGORIA1 = $row['CATEGORIA'];
	  
	$MENSAJE = 2;
	$TOTALITI = 0;
	
		mysql_select_db($database_conn, $conn);
$query_registro = "SELECT sum(oc_producto.CANTIDAD_RECIBIDA) as trans,sum(oc_producto.CANTIDAD) as trans1  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
  
  	$trans1 = $row["trans1"];
	$trans = $row["trans"];
	$trans = $trans1 -$trans;
    
  }
  
  
  		mysql_select_db($database_conn, $conn);
$query_registro3 = "select sum(producto_vale_emision.CANTIDAD_ENTREGADA) as valor,sum(producto_vale_emision.CANTIDAD_SOLICITADA) as valor1  from vale_emision, producto_vale_emision, producto where vale_emision.
COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO."'  and vale_emision.ESTADO = 'PENDIENTE'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result3))
  {
  	$vale1 = $row["valor"];
	$vale = $row["valor1"];
	$vale = $vale - $vale1;
  }
	
	$contable= $trans + $STOCK_ACTUAL;
		$disponible= $contable - $vale;
	if($contador1 == 15)
	{
	echo"	<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Categoria</center></th>";

 if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) 
 {
 echo "<th><center>Actualizar </center></th>";
 }
 
if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { 
 echo"
<th><center>OC</center></th>
";
}
echo"
<th><center>Stock</center></th>
<th><center>OC En Transito</center></th>
<th><center>Vale Emitidos</center></th>
<th><center>Stock Contable</center></th>
<th><center>Stock Disponible</center></th>
<th><center>Formato</center></th>
<th><center>Minimo</center></th>
<th><center>Maximo</center></th>";
	if($CODIGO_USUARIO == '19' ||$CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  {
		echo" 
<th><center>Ingreso</center></th>
<th><center>Egreso</center></th>";
	}
	echo"
</tr>";
		$contador1 = 0;
	}
	
     echo "<tbody><tr><td><center> <a href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $CODIGO_PRODUCTO . "</a> <input style='display:none' onblur='final();' class='form1'  id =cod".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' />
	                            <input style='display:none' disabled='disabled' onblur='final();' class='form1'  id =code".$numero."  name =code".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' /></center></td>";
    echo "<td id = 'des'><center> <a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $DESCRIPCION . "</a> <input style='display:none;' class='form8' id =des".$numero." type = 'text' value = '".$DESCRIPCION."' /></center></td>";
		
		
		  echo "<td id = 'cat'><center>".$CATEGORIA1."</center></td>";
		  
 if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) 
 {
		  echo "<td id = 'cat'><center><input onClick='habilitar(this.id);' type='checkbox' id ='actucate".$numero."' name ='actucate".$numero."' value=''> </center></td>";
 }
 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { 

		echo "<td id = 'rut".$numero."' onClick='valora();agregar(this.id);'><center> OC </center></td>";
		
 }
		$TOTALITI = $STOCK_ACTUAL + $trans;
		
	if($STOCK_ACTUAL < $STOCK_MINIMO)
	{	
	if($TOTALITI > $STOCK_MINIMO)
	{
		 echo "<td style='background-color:#F79646; color:#fff;'><center>" . 
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
	echo "<td><center><center><a target='_blank' href=ListadoOCTransito.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   number_format($trans, 0, ",", ".") . "</a></center></td>";
	
	
	
		echo "<td height='30'><center><a target='_blank' href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   number_format($vale, 0, ",", ".") . "</a></center></td>";
		
		
		
		
		echo "<td><center>".number_format($contable, 0, ",", ".")."</center></td>";
		echo "<td><center>".number_format($disponible, 0, ",", ".")."</center></td>";
	echo "<td><center>" . 
	    $FORMATO. "<input style='display:none;' class='form8'  id =um".$numero." type = 'text' value = '".$UNIDAD_DE_MEDIDA."' /></center></td>";
	
   
    echo "<td><center>" . 
	    $STOCK_MINIMO. "<input style='display:none;' class='form4'  id =prec".$numero." type = 'text' value = '".$PRECIO."' /></center></center></td>"; 
		 echo "<td><center>" . 
	    $STOCK_MAXIMO.   "</center></td>";
	if($CODIGO_USUARIO == '19' ||$CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  { 
		 
	echo "<td><center><a target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stockpositivo'>
	      <h1> + </h1>      </a><input style='display:none;' class='form6'  id =precl".$numero." type = 'text' value = '".$PRECIO_SIN_DESCUENTO ."' /></center></td>"; 
    echo "<td><center><a target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stocknegativo'>
	      <h1> - </h1>      </center></td></tr></tbody>"; 	
	}
		  
		  
		  
		  $numero++;  
		  $contador1++;
  }
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b> <input style='display:none' type='text' value='".$numero ."' id='cuentaprime' name='cuentaprime'/></font></td></tr>";

  
  mysql_free_result($result);
  mysql_close($conn);
?>
</table>

<table>
<tr>
<td><h4>Ingreso de Producto</h4></td>
<td><a target='_blank' href="IngresoProducto.php" >
<IMG SRC="Imagenes/cabinet.png">
</a></td>
<td>&nbsp;&nbsp;&nbsp;</td>
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
