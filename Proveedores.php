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
$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numeroo = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$numero++;
  }
mysql_free_result($result1);
$CODIGO_PROVEEDOR = "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Proveedores V1.0.1</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link rel="shortcut icon" href="Imagenes/rochag.png">




  <link rel="stylesheet" type="text/css" href="Style/ti.css" />

  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
   <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  
   <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript> 
  
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(
                                
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
 </script>
 
</head>

<body>
<div id='bread'><div id="menu1"></div></div>	
<div id="main">	
<div id="site_contentlist">	
<center>





            
<table id="BANNER_R"  rules="all">
<tr>
  <td class="td_banner" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td  class="td_banner_chicos"   align="center">REGISTRO</td>
  <td class="td_banner_chicos2" align="center"></td>
  <td class="td_banner_chicos3"  align="center"></td>
</tr>
<tr>
  <td  class="td_banner2" rowspan="2" align="center">PROVEEDOR</td>
  <td class="td_banner_chicos2" align="center"></td>
  <td class="td_banner_chicos3" align="center"></td>
</tr>
<tr>
  <td class="tdES" align="center">Fecha</td>
  <td class="tdES"><input class="txtEspecial" id="txt_ing" name="txt_ing" type ="text"     value="<?php echo date("Y-m-d")?>"></td>
</tr>

</table>
            
            
            
            
            <table  class="tdPAN">

<td ></td>

</table>


<br />
<br />












  <form  method="GET"/>      
  <table  width="100%"   rules="all" id= "tabla_cliente">
  <tr>
  <td class="td_clienteES">&nbsp;Rut:</td>
  <td><input placeholder="1.111.111-1" type="text" class="txt" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /> </td>
  
  <td class="td_cliente">&nbsp;Razon social:</td>
  <td><input placeholder="Ducasse Industrial" type="text" class="txt" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /> </td>





  </tr>
  </table>
  
  
  
  <div class="div_boton">
    
    <a href="#" onclick='javascript:window.location.replace("IngresoProovedor.php")'  ><input class="BotonGris"  type="button" name = "nuevo" id='nuevo' value="Nuevo Proveedor"/>
</a>
    
    <input class="BotonSeleste"  type="submit" name = "buscar" id='buscar' value="Buscar"/>
    
</div>
  
  
      <table align="right" class="td_trans"  >
    <tr>
    <td></td>
       <td ></td>
    
    </tr>
    
    
    
     <tr>
    <td></td>
       <td ></td>
    
    </tr>
     <tr>
    <td></td>
       <td ></td>
    
    </tr>
    

    <tr>
    <td>Mostrar Desavilitados</td>
       <td  class="td_trans" ><input  type="checkbox"  id="desavilitados" name="desavilitados" value="NO" /></td>
    
    </tr>
    
</table>
  
  
  
 <form>



    <br />
<br />



<br />

  <table   rules="all" id= "tabla_cliente">




<?php
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = "";	

$desavilitados ="";



//listado de materiales
////////////////////////////////
if (isset($_GET["buscar"])) 
{
	
	$desavilitados ="SI";
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_GET['buscar_usuario'];
$desavilitados = (isset($_GET['desavilitados']));


	

if($BUSCAR_CODIGO != "" || $BUSCAR_DESCRIPCION  != "" )
{
	
	
	
	if($desavilitados == "NO"){
	
	
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR = '".$BUSCAR_CODIGO."' OR NOMBRE_FANTASIA = '".$BUSCAR_DESCRIPCION."' AND ACTIVO = 'NO'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numeroo = 0;


	}else{
		
		
		
		
		mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM proveedor WHERE RUT_PROVEEDOR = '".$BUSCAR_CODIGO."' OR NOMBRE_FANTASIA = '".$BUSCAR_DESCRIPCION."' AND ACTIVO != 'NO'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numeroo = 0;
		
		
		
		
		
	}






 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PROVEEDOR = $row["CODIGO_PROVEEDOR"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RAZON_SOCIAL = $row["RAZON_SOCIAL"];
	$GIRO = $row["GIRO"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
	$TELEFONO1 = $row["TELEFONO1"];
	$TELEFONO2 = $row["TELEFONO2"];
	$WEB = $row["WEB"];
	$CONTACTO1 = $row["CONTACTO1"];
	$CONTACTO2 = $row["CONTACTO2"];
	$CELULAR_CONTACTO1 = $row["CELULAR_CONTACTO1"];
	$CELULAR_CONTACTO2 = $row["CELULAR_CONTACTO2"];
	$FORMA_PAGO = $row["FORMA_PAGO"];
	$CATEGORIA = $row["CATEGORIA"];
	$ENTREGA = $row["ENTREGA"];
	$FAMILIA = $row["FAMILIA"];
	$MENSAJE = 2;
	
if($numeroo == 0)
	{		
	
echo "<tr>";
echo "<th class='td_cliente'><center>Rut</center></th>";
echo "<th class='td_cliente'><center>Razon social</center></th>";
echo "<th class='td_cliente'><center>Direccion</center></th>";
echo "<th class='td_cliente'><center>Comuna</center></th>";
echo "<th class='td_cliente'><center>Familia</center></th>";
echo "<th class='td_cliente'><center>Telefono</center></th>";
echo "<th class='td_cliente'><center>contacto</center></th>";
echo "<th class='td_cliente'><center>Forma pago</center></th>";

echo "</tr>";
	
		
	$numeroo = 20;
       
    }

	
	
	
	if(($numeroo % 2) == 0){
	
	
    echo "<tr><td class='td_blanco'><center> <a href=DescripcionProveedor.php?CODIGO_PROVEEDOR=" .$CODIGO_PROVEEDOR. ">" . 
	    $RUT_PROVEEDOR . "</a></center></td>";
     echo "<td class='td_blanco'><center>" . 
	    ($RAZON_SOCIAL) . "</center></td>";
    echo "<td class='td_blanco'><center>" . 
	    ($DIRECCION). "</center></td>";
    echo "<td class='td_blanco'><center>" . 
	    ($COMUNA).   "</center></td>"; 
    echo "<td class='td_blanco'><center>" . 
	    ($FAMILIA).   "</center></td>"; 
    echo "<td class='td_blanco'><center>" . 
	    ($TELEFONO1). "</center></td>"; 
	 echo "<td class='td_blanco'><center>" . 
	    ($CONTACTO1).   "</center></td>"; 
	 echo "<td class='td_blanco'><center>" . 
	    ($FORMA_PAGO).   "</center></td> </tr>"; 	 
		
		
		
	}else{
		
		
		
		
		
    echo "<tr><td class='td_gris'><center> <a href=DescripcionProveedor.php?CODIGO_PROVEEDOR=" .$CODIGO_PROVEEDOR. ">" . 
	    $RUT_PROVEEDOR . "</a></center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($RAZON_SOCIAL) . "</center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($DIRECCION). "</center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($COMUNA).   "</center></td>"; 
	echo "<td class='td_gris'><center>" . 
	    ($FAMILIA).   "</center></td>";     
    echo "<td class='td_gris'><center>" . 
	    ($TELEFONO1). "</center></td>"; 
	 echo "<td class='td_gris'><center>" . 
	    ($CONTACTO1).   "</center></td>"; 
	 echo "<td class='td_gris'><center>" . 
	    ($FORMA_PAGO).   "</center></td> </tr>"; 	
		
		
		
		
	}
		
		
		
		
    $numero++;
	$numeroo--;
  }
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  mysql_close($conn);
}
}
if($BUSCAR_CODIGO == "" && $BUSCAR_DESCRIPCION  == "" )
{
	
	if($desavilitados == "NO"){
	
mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM proveedor where ACTIVO = 'NO'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numeroo = 0;



	}else{
		
		
		
		mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM proveedor where ACTIVO != 'NO'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$numeroo = 0;
		
		
		
	}






 while($row = mysql_fetch_array($result))
  {
	$CODIGO_PROVEEDOR = $row["CODIGO_PROVEEDOR"];
	$RUT_PROVEEDOR = $row["RUT_PROVEEDOR"];
	$NOMBRE_FANTASIA = $row["NOMBRE_FANTASIA"];
	$RAZON_SOCIAL = $row["RAZON_SOCIAL"];
	$GIRO = $row["GIRO"];
	$DIRECCION = $row["DIRECCION"];
	$COMUNA = $row["COMUNA"];
	$TELEFONO1 = $row["TELEFONO1"];
	$TELEFONO2 = $row["TELEFONO2"];
	$WEB = $row["WEB"];
	$CONTACTO1 = $row["CONTACTO1"];
	$CONTACTO2 = $row["CONTACTO2"];
	$CELULAR_CONTACTO1 = $row["CELULAR_CONTACTO1"];
	$CELULAR_CONTACTO2 = $row["CELULAR_CONTACTO2"];
	$FORMA_PAGO = $row["FORMA_PAGO"];
	$CATEGORIA = $row["CATEGORIA"];
	$FAMILIA = $row["FAMILIA"];
	$ENTREGA = $row["ENTREGA"];
	$MENSAJE = 2;
	
	if($numeroo == 0)
	{			
	
echo "<tr>";
echo "<th class='td_cliente'><center>Rut</center></th>";
echo "<th class='td_cliente'><center>Razon social</center></th>";
echo "<th class='td_cliente'><center>Direccion</center></th>";
echo "<th class='td_cliente'><center>Comuna</center></th>";
echo "<th class='td_cliente'><center>Familia</center></th>";
echo "<th class='td_cliente'><center>Telefono</center></th>";
echo "<th class='td_cliente'><center>contacto</center></th>";
echo "<th class='td_cliente'><center>Forma pago</center></th>";

echo "</tr>";
			
	$numeroo = 20;
       
    }
	
	
	
	if(($numeroo % 2) == 0){
	
     echo "<tr><td class='td_blanco'><center> <a href=DescripcionProveedor.php?CODIGO_PROVEEDOR=" .$CODIGO_PROVEEDOR. ">" . 
	    $RUT_PROVEEDOR . "</a></center></td>"; 
     echo "<td class='td_blanco'><center>" . 
	    ($RAZON_SOCIAL) . "</center></td>";
     echo "<td class='td_blanco'><center>" . 
	    ($DIRECCION). "</center></td>";
     echo "<td class='td_blanco'><center>" . 
	    ($COMUNA).   "</center></td>"; 
	 echo "<td class='td_blanco'><center>" . 
	    ($FAMILIA).   "</center></td>";      
     echo "<td class='td_blanco'><center>" . 
	    ($TELEFONO1). "</center></td> "; 
	 echo "<td class='td_blanco'><center>" . 
	    ($CONTACTO1).   "</center></td>"; 
	 echo "<td class='td_blanco'><center>" . 
	    ($FORMA_PAGO).   "</center></td> </tr>"; 		
		
		
		
		
		}else{
		
		
		
		
		
    echo "<tr><td class='td_gris'><center> <a href=DescripcionProveedor.php?CODIGO_PROVEEDOR=" .$CODIGO_PROVEEDOR. ">" . 
	    $RUT_PROVEEDOR . "</a></center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($RAZON_SOCIAL) . "</center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($DIRECCION). "</center></td>";
    echo "<td class='td_gris'><center>" . 
	    ($COMUNA).   "</center></td>"; 
	echo "<td class='td_gris'><center>" . 
	    ($FAMILIA).   "</center></td>";       
    echo "<td class='td_gris'><center>" . 
	    ($TELEFONO1). "</center></td>"; 
	echo "<td class='td_gris'><center>" . 
	    ($CONTACTO1).   "</center></td>"; 
	echo "<td class='td_gris'><center>" . 
	    ($FORMA_PAGO).   "</center></td> </tr>"; 	
		
		
		
		
	}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
    $numero++;
	$numeroo--;
  }
  
  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b></font></td></tr>";
  
  mysql_free_result($result);
  mysql_close($conn);
}
?>
</table>

</center>
</div>
</div>
</body>
</html>
