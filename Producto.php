<?php require_once('Conexion/Conexion.php');

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$GRUPOS = $_SESSION['GRUPOS'];

mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_assoc($result1))
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
 while($row = mysql_fetch_assoc($result2))
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
while($row = mysql_fetch_assoc($result2))
  {
	$CODIGO_OC = $row["CODIGO_OC"];
	$numero++;
  }


if(isset($_POST['desha']))
{
$checked = 'checked';
}
else
{
$checked = '';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Bodega V1.2.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <link rel="stylesheet" type="text/css" href="Style/style_materiales.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >

  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src="jquery.bpopup-x.x.x.min.js"></script>

  <script src='js/breadcrumbs.php'></script>
  <script src='js/Bloqueo.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
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


 $(document).ready(function() {
     $(".tablas").click(function(event) {
     $("#datos").val($(this).val());
    $("#FormularioExportacion").submit();
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
               if(checkboxes[i].id != "desha") //solo si es un checkbox entramos
              {
                checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
              }
            }
        }

if(document.getElementById('checka1').checked == true)
  {
   for (i=0;i<document.formulario.elements.length;i++) 
      if(document.formulario.elements[i].type == "checkbox")	

     if(document.formulario.elements[i].id != "desha") 
     { 
     document.formulario.elements[i].checked=1; 
		 }
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

     if(document.formulario.elements[i].id  != "desha") 
     { 
    document.formulario.elements[i].checked=0;
		 }
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

  <div id='bread'><div id="menu1"></div></div>

 <form action="ExcelInformeProducto.php" method="post" target="_blank" id="FormularioExportacion">

<input  type="hidden" id="datos" name="datos" />

</form>

 <form  method="POST" name="formulario" action="producto.php" / >   
<div id='contenedor'>
 
<center>  <h1> Bodega </h1>   
  <table>
  <tr>
  <td> Codigo: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  <td> Descripcion: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>
  <td>Categoria: </td>
  <td ><center><select class='textbox' id = "familias" name = "familias">
<option>  </option>

<?php
$ini = ""; 
 foreach ($GRUPOS as $GI => $GG) {        

switch ($GG) {
    case "9":
        echo"<option> Sillas </option>
	        	<option> Laminados </option>";
		$ini = "comercial";
        break;

    case "3":
        echo"<option> Sillas </option>
        <option> Tornillos </option>
        <option> Embalaje </option>
        <option> Baldosas Tapizadas </option>
        <option> Baldosas Laminadas </option>
        <option> Laminados </option>
        <option> Maderas </option>
        <option> Tapacantos </option>
        <option> Tela </option>";
        $ini = "sillas";
        break;


      case "14":
        

echo"<option> Accesorios </option>
<option> ACTIU </option>
<option> Cajoneras </option>
<option> Cristales </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Mantencion </option>
<option> Mueble De Linea </option>
<option> Paneleria </option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Servicios </option>
<option> Sillas </option>
<option> Soportes </option>
<option> Superficies Curvas </option>
<option> Superficies Rectas </option>";
 $ini = "despacho";
break;
}

}	

if($ini == "")
{



echo"<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Baldosas Melamina </option>
<option> Baldosas Metalica </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Baldosas Vidrio </option>
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
<option> Mepal </option>
<option> Mueble De Linea </option>
<option> Muebles Metalicos </option>
<option> Paneleria </option>
<option> Partes y Piezas </option>
<option> Producto </option>
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
<option> Tornillos </option>";


};


?>





  </select></center></td>
    
  <td width="138"><input style=""  type="submit" name = "buscarR" id='buscar' value="Buscar"/> </td>




 </tr>
 <tr>
 <?php if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) {?>  <td>Categoria Actualizar:  </td>
  <td ><center><select  class='textbox' id = "familias1" name = "familias1">
<option>  </option>
<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Baldosas Melamina </option>
<option> Baldosas Metalica </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Baldosas Vidrio </option>
<option> Cajoneras </option>
<option> Cerraduras </option>
<option> Correderas </option>
<option> Cristales </option>
<option> Cubiertas </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Mepal </option>
<option> Mantencion </option>
<option> Maquinas y Herramientas </option>
<option> Mueble De Linea </option>
<option> Muebles Metalicos </option>
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
    <td width="90" colspan="2" align="center">Seleccionar todo <input  type="checkbox" id='checka1' name='checka1' onclick="marcar(this);"  /> </td>
    <td width="20">  </td> <?php } ?>
      
<td>
<a target='_blank' href="ProductoQuiebre.php">
<div id='qd'><h3 id='hquiebre'> <center> Quiebre </center></h3></div>
</a>
<a target='_blank' href="ProductoQuiebreDisponible.php?valor=0">
<div id='qdd'><h3 id='hdquiebre'><center> Quiebre Disponible </center></h3> </div>
</a>
</td>     
<?php  if($GRP == "GG" || $GRP1 == "GG" || $GRP2 == "GG" || $GRP3 == "GG" || $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" )
{ ?>
<td>
<a target='_blank' href="ProductoValorizado.php?valor=0">
<div id='qd'><h3 id='hdquiebre'><center> Bodega Valorizada </center></h3> </div>
</a>
</td>
<?php }?>
<td>

<form action="Excel_Cuadro_Tablas.php" method="POST" target="_blank" id="FormularioExportacion">
<input  type="hidden" id="datos" name="datos" />
</form>

<button type="button" class='tablas' value='producto'>
<img src="Imagenes/excel.png" alt="Excel">
</button>
</td>
<td algin="center" width="70"><a target='_blank' href="IngresoProducto.php" ><center>
<img src="Imagenes/cabinet.png" title="Ingreso Producto">
</a></center></td>
</tr>
<tr>
<td>Deshabilitados</td>
<td><input type='checkbox' <?php echo $checked ?> id='desha' name='desha' ></td>
</tr> 
</table>	
</center>

 


<table bordercolor="#ccc" id="datagrid" rules="all" cellspacing=0 cellpadding=0 style="font-size: 8pt">
<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Categoria</center></th>
 <?php if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) {?><th><center>Actualizar </center></th><?php } ?>
 <?php if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { ?>
<th><center>OC</center></th>
 <?php } ?>
<th><center>Stock</center></th>
<th><center>Flujo</center></th>
<th><center>OC En Transito</center></th>

<th><center>Vale Emitidos</center></th>
<th><center>Stock Contable</center></th>
<th><center>Stock Disponible</center></th>
<th><center>Formato</center></th>
<th><center>Minimo</center></th>
<th><center>Maximo</center></th>
<?php if($CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126'|| $CODIGO_USUARIO == '143')  { ?>
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




if (isset($_POST["buscar"])) 
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


$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_POST['buscar_usuario']; 
$familias = $_POST['familias'];

mysql_select_db($database_conn, $conn);


if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2' ";
}




if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}


switch ($ini) {
      case "comercial":



if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}
else
{
$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";
}
        
        break;

        case "sillas":   




if($familias != "" )
{


$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";

}

  
        break;

        case "despacho":



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";


}else{

//$query_registro .= "and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
//$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";

}



        
        break;

default:



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}



};



$query_registro .= " order by DESCRIPCION ASC limit 500";

$pagina = 0;


}/////////////FIN DESDE FUERA 
else if (isset($_POST["buscarR"]))
{//////COMIENZO DESDE DENTRO

if(isset($_POST["buscar_codigo"]))
{ 

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



$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_POST['buscar_usuario'];	
$familias = $_POST['familias'];

mysql_select_db($database_conn, $conn);



if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2'";
}



if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}






switch ($ini) {
      case "comercial":



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";



}else{

$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";

}
        
        break;

        case "sillas":   




if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{
$query_registro .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";

}


  
        break;

        case "despacho":



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";


}else{


//$query_registro .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
//$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";

}



        
        break;

default:



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}



};



$query_registro .= " order by DESCRIPCION ASC limit 500";


$pagina = 0;

}////////////FIN DESDE DENTRO
else if (isset($_GET["pagina"]) || isset($_GET["buscar_codigo"]) )
{///////////////COMIENZO POR PAGINA



if (isset($_GET["pagina"]))
{
$pagina = $_GET['pagina'];
$CORTEy = $_GET['pagina'];
}
else
{
$CORTEy = 0;
$pagina = 0;
}
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
if (isset($_GET["BUSCAR_DESCRIPCION"]))
{
$BUSCAR_DESCRIPCION = $_GET['BUSCAR_DESCRIPCION'];  
}
else
{
  $BUSCAR_DESCRIPCION = "";  
}
$familias = $_GET['familias'];


mysql_select_db($database_conn, $conn);

if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '1' and not TEMPORADA = '2'";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE DESHABILITAR = '0' and not TEMPORADA = '2'";
}


if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}

switch ($ini) {
      case "comercial":



if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";



}else{

if($BUSCAR_DESCRIPCION  != "" || $BUSCAR_CODIGO != "")

$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";

}
        
        break;

        case "sillas":   




if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= "and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela','Laminados','Maderas','Tapacantos') ";

}

        break;

        case "despacho":

if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

//$query_registro .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
//$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";

}
        
        break;

default:

if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}

};

$CORTEy = $CORTEy * 500;

$CORTEx =  500; 

$query_registro .= " order by DESCRIPCION ASC limit ".$CORTEy.",".$CORTEx." ";

}////////////FIN POR PAGINA

$contador1 = 0;
$numero = 0;

$resulTODOS = mysql_query($query_TODOS, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($resulTODOS))
  {

$TODOS = $row['TODOS'];

}
mysql_free_result($resulTODOS);


$IN = " IN(";
$LISTACOD = array();
$LISTASTOCK = array();
$LISTASTOCKmin = array();
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($result))
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
	$RUTA = $row['RUTA'];
	
	$MENSAJE = 2;
	$TOTALITI = 0;

	$LISTACOD[] = $row["CODIGO_PRODUCTO"];
  $LISTASTOCK[] = array( 'COD' => $row["CODIGO_PRODUCTO"] ,
                        'STOCK' => $row["STOCK_ACTUAL"] ); 
  $LISTASTOCKmin[] = $row["STOCK_MINIMO"];
$IN .= "'".$row["CODIGO_PRODUCTO"]."',";



	if($contador1 == 15)
	{
	echo"<tr>
<th height='30'><center>Código</center></th>
<th><center>Descripción</center></th>
<th><center>Categoria</center></th>";

 if( $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" ) 
 {
 echo "<th><center>Actualizar </center></th>";
 }
 
if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3') 
 { 
 echo"
<th><center>OC</center></th>
";
}
echo"
<th><center>Stock</center></th>
<th><center>Flujo</center></th>
<th><center>OC En Transito</center></th>
<th><center>Vale Emitidos</center></th>
<th><center>Stock Contable</center></th>
<th><center>Stock Disponible</center></th>
<th><center>Formato</center></th>
<th><center>Minimo</center></th>
<th><center>Maximo</center></th>";
	if($CODIGO_USUARIO == '1' ||$CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126'|| $CODIGO_USUARIO == '143')  {
		echo" 
<th><center>Ingreso</center></th>
<th><center>Egreso</center></th>";
	}
	echo"
</tr>";
		$contador1 = 0;
	}
	
if($GRP == "INF" && $RUTA != "")
{
     echo "<tbody><tr><td style='background-color:#A9E2F3;'><center> <a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $CODIGO_PRODUCTO . "</a> <input style='display:none' onblur='final();' class='form1'  id =cod".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' />
	                            <input style='display:none' disabled='disabled' onblur='final();' class='form1'  id =code".$numero."  name =code".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' /></center></td>";
}
else
{

     echo "<tbody><tr><td><center> <a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
	   $CODIGO_PRODUCTO . "</a> <input style='display:none' onblur='final();' class='form1'  id =cod".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' />
	                            <input style='display:none' disabled='disabled' onblur='final();' class='form1'  id =code".$numero."  name =code".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' /></center></td>";

}

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

		echo "<td id='STOCKK".$numero."' ><center>" . 
	    $STOCK_ACTUAL . "</center></td>";

  echo "<td id=flujo".$numero." ><center></center></td>";
	echo "<td id=trans".$numero." ><center><center><a target='_blank' href=ListadoOCTransito.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "></a></center></td>
	";

		echo "<td id=valee".$numero." height='30'><center><a target='_blank' href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "></a></center></td>";

		echo "<td id=cont".$numero." ><center></center></td>";
		echo "<td id=disp".$numero." ><center></center></td>";
	echo "<td><center>" . 
	    $FORMATO. "<input style='display:none;' class='form8'  id =um".$numero." type = 'text' value = '".$UNIDAD_DE_MEDIDA."' /></center></td>";

    echo "<td><center>" . 
	    $STOCK_MINIMO. "<input style='display:none;' class='form4'  id =prec".$numero." type = 'text' value = '".$PRECIO."' /></center></center></td>"; 
		 echo "<td><center>" . 
	    $STOCK_MAXIMO.   "</center></td>";
	if($CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126'|| $CODIGO_USUARIO == '143')  { 
		 
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


if($IN != " IN("){


$IN = substr( $IN , 0, -1);
$IN .= ")";
$LISTA = array();
$LISTACANT = array();
$query_registro = "SELECT oc_producto.CANTIDAD_RECIBIDA,oc_producto.CANTIDAD,producto.CODIGO_PRODUCTO  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while( $row = mysql_fetch_assoc($result1) )
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANT_RES" =>  $row["CANTIDAD_RECIBIDA"],
                  "CANT" =>  $row["CANTIDAD"] );
  }
mysql_free_result($result1);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANT_RES = "";
$CANT = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $CANT_RES += $LISTA[$llave]["CANT_RES"];
          $CANT += $LISTA[$llave]["CANT"];
      }
    }
$CANT = $CANT - $CANT_RES;
    $LISTACANT[] = array( "COD" =>  $value,
                  "CANT" =>  $CANT );
}

unset($LISTA);
$LISTA = array();
$LISTAEGRESO = array();

$query_registro = "SELECT  actualizaciones.EGRESO,actualizaciones_general.CODIGO_PRODUCTO FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and actualizaciones.FECHA between '2014-01-01' and '".date('Y-m-d')."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result1))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "EGRESO" =>  $row["EGRESO"] );
  }
  mysql_free_result($result1);

$fecha="2014-01-01 00:00:00";
$segundos=strtotime('now')-strtotime($fecha) ;
$diasdif=intval($segundos/60/60/24);

$flujo = "";
$check = "";
foreach ($LISTACOD as $key => $value) {
$EGRESOS = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $EGRESOS += $LISTA[$llave]["EGRESO"];
      }
    }
    if($EGRESOS == 0 || $diasdif == 0)
{
  $flujo = 0;
}
else
{
  $flujo = $EGRESOS / $diasdif;
  $flujo =  number_format($flujo, 2, ",", ".");
}
    $LISTAEGRESO[] = array( "COD" =>  $value,
                  "EGRESO" =>  $EGRESOS,
                  "FLUJO" =>  $flujo  );
}

unset($LISTA);
$LISTA = array();
$LISTAVALE = array();

$query_registro3 = "select producto_vale_emision.CANTIDAD_ENTREGADA,producto_vale_emision.CANTIDAD_SOLICITADA,producto_vale_emision.CODIGO_PRODUCTO  from vale_emision, producto_vale_emision, producto where vale_emision.
COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN."  and vale_emision.ESTADO = 'PENDIENTE'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result3))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANTEN" =>  $row["CANTIDAD_ENTREGADA"],
                  "CANTSO" =>  $row["CANTIDAD_SOLICITADA"] );
  }
  mysql_free_result($result3);
 mysql_close($conn);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANTEN = "";
$CANTSO = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $CANTEN += $LISTA[$llave]["CANTEN"];
         $CANTSO += $LISTA[$llave]["CANTSO"];
      }
    }
$CANTEN = $CANTSO- $CANTEN;
    $LISTAVALE[] = array( "COD" =>  $value,
                  "VALE" =>  $CANTEN );
}
$LISTAFINAL = array();
foreach ($LISTACOD as $key => $value) {

  $CONT = $LISTACANT[$key]['CANT'] + $LISTASTOCK[$key]['STOCK'];
  $DISP = $CONT - $LISTAVALE[$key]['VALE'];

$LISTAFINAL[] = array(  "COD" =>  $value,
                        "CANT" => $LISTACANT[$key]['CANT'],
                        "EGRESO" =>  $LISTAEGRESO[$key]['EGRESO'],
                        "FLUJO" => $LISTAEGRESO[$key]['FLUJO'],
                        "VALE" =>  $LISTAVALE[$key]['VALE'],
                        "CONTABLE" =>  $CONT,
                        "DISPONIBLE" =>  $DISP,
                        "STOCK" => $LISTASTOCK[$key]['STOCK'],
                        "STOCKMIN" => $LISTASTOCKmin[$key] );
}

unset($LISTA);
unset($LISTACANT);
unset($LISTAEGRESO);
unset($LISTAVALE);
unset($LISTASTOCK);

foreach ($LISTAFINAL as $key => $value) {
echo"<script language = javascript>
$(document).ready(function(){
if( parseInt('".$LISTAFINAL[$key]['STOCK']."') < parseInt('".$LISTAFINAL[$key]['STOCKMIN']."') )
{
if( ( parseInt('".$LISTAFINAL[$key]['STOCK']."') + parseInt('".$LISTAFINAL[$key]['CANT']."')) > parseInt('".$LISTAFINAL[$key]['STOCKMIN']."') )
{  
$('#STOCKK".$key."').css('background-color', '#F79646');
}else
{
$('#STOCKK".$key."').css('background-color', '#F72D2D');
}
}
$('#disp".$key."').html('<center>".$LISTAFINAL[$key]['DISPONIBLE']."</center>');
$('#cont".$key."').html('<center>".$LISTAFINAL[$key]['CONTABLE']."</center>');
$('#valee".$key."').html('<center><a target=_blank href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO=" .urlencode($LISTAFINAL[$key]['COD']). ">".$LISTAFINAL[$key]['VALE']."</a></center>');
$('#flujo".$key."').html('<center>".$LISTAFINAL[$key]['FLUJO']."</center>');
$('#trans".$key."').html('<center><a target=_blank href=ListadoOCTransito.php?CODIGO_PRODUCTO=" .urlencode($LISTAFINAL[$key]['COD']). ">".$LISTAFINAL[$key]['CANT']."</a></center>');
});
</script>";
}


}

?>
</table>

<table>
<tr>

<div>
<center>

<?php $RESTO = ceil($TODOS / 500);  ?>
<?php
$contador = 0;
$contador1 = 0;
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
<a  class="noactivo"   onClick="document.formulario.action='Producto.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>

<?php
if( $pagina == $i)
{
?>
<a  class="activo" onClick="document.formulario.action='Producto.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo $i;?></a>
<?php
}
else if($contador1  >  $i && $contador  <  $i )
{
?>
<a  class="noactivo"  onClick="document.formulario.action='Producto.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
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
<a class="noactivo"  onClick="document.formulario.action='Producto.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>

</center>
</div>

</tr>
</table>

</div>
<div id='contenedor1' style="display:none;">

<center>
<input style= ' width:100px;' type="button" onclick="volver();" value="Volver">
<input style="display:none;" type="text" name='valor' id='valor' value='<?php echo $valor ?> '/>

<br />
<br />

<table bordercolor="#ccc" id="tabla" border="0" frame="box" rules="all" width="100%"> 
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
