<?php require_once('Conexion/Conexion.php');?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);

/* Variable de sesion */
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];



  $query_registro = "select empleado.rut,empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
  $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  {
	 $nombres = $row["nombres"];
	 $apellido = $row["apellido_paterno"];
	 $apellido_m = $row["apellido_materno"];
	 $rut_usuario= $row["rut"];
  }
  mysql_free_result($result1);



  $equipo = array();
  $query_registro = "select equipo.RUT_SUB  from empleado, equipo where empleado.RUT = equipo.RUT_LIDER and equipo.RUT_LIDER = '".$rut_usuario."'";
  $result1 = mysql_query($query_registro, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result1))
  {
  	$RUT_SUB = $row["RUT_SUB"];
  	$query_registro1 = "select * from empleado where rut = '".$RUT_SUB."'";
    $result11 = mysql_query($query_registro1, $conn) or die(mysql_error());
 	  while($row = mysql_fetch_array($result11))
	   {
      $nombres1= $row["NOMBRES"];
	    $apellido1 = $row["APELLIDO_PATERNO"];
	    $apellido_m1 = $row["APELLIDO_MATERNO"];
	    $VENDEDORNOM = $nombres1 ." ".$apellido1." ".$apellido_m1; 
  	  array_push($equipo,$VENDEDORNOM);
     }
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


$CODIGO_CLIENTE ="";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Cliente V2.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/style_informes_new.css" />

  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>


  <!-- Tabla -->
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script>
  <script src='js/encabezado-fixed.js'></script>


  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
  $(function(){
    $('.tabla-cliente').tablesorter(); 
  });
  </script>
</head>

<body>
<div  id='header-radicado-rocha'> 

<div id='bread'><div id="menu1"></div></div>



<!-- Filtro -->
<form  method="GET" action="">
<div id='contenedor-ins' class="formulario-informes">
  <h1>Informe Clientes</h1>
  <table>
    <tr>
      <td><input class="textbox" placeholder="Rut"  type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /></td>
      <td><input class="textbox" placeholder="Nombre"  type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /></td>
      <td><select class="textbox" name="buscar_seccion" id="buscar_seccion">
      <option value="">Departamento</option>
      <option value="LC">Los Conquistadores</option>
      <option value="LD">La Dehesa</option>
      <option value="M&D">Muebles y Diseños </option>
      <option value="S&S">Sillas y Sillas</option>
      </select> </td>
      <td><select name="buscar_director" id="buscar_director" class="textbox" type ="text">
      <option value="">Ejecutivo</option>
      <?php 
      $query_registro = 
      "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
      grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN' order by empleado.nombres";
      $result1 = mysql_query($query_registro, $conn) or die(mysql_error());

      while($row = mysql_fetch_array($result1))
      {
      ?>
        <option value = "<?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?>" > <?php echo ($row['nombres']) . " ".($row['apellido_paterno']) . " ".($row['apellido_materno']); ?> </option>
      <?php 
      } mysql_free_result($result1);
      ?> 
      </select></td>
      <td><input class="boton"  type="submit" name = "buscar" id='buscar' value="Buscar"/></td>
    </tr>

    <tr>
      <td> <input placeholder="Fecha Desde" class="textbox" type="text" autocomplete="off" id="txt_desde" name="txt_desde" /></td>
      <td> <input placeholder="Fecha Hasta"  class="textbox" type="text" autocomplete="off" id="txt_hasta" name="txt_hasta" /></td>
      <td>Deshabilitado &nbsp;<input  type="checkbox"  id="desavilitados" name="desavilitados" value="NO" /></td>
      <td></td>
      <td><a href="IngresoCliente.php" class="ingreso-cliente">Ingresar Cliente</a></td>
    </tr>
  </table>
</div>
</div>
</form>


<table class="tabla-cliente fixed">

<?php
              

$BUSCAR_CODIGO = (empty($_GET['buscar_codigo'])) ?  ""  : $_GET['buscar_codigo'];
$BUSCAR_DESCRIPCION = (empty($_GET['buscar_usuario'])) ?  ""  : $_GET['buscar_usuario'];
$desavilitados = (empty($_GET['desavilitados'])) ?  ""  : $_GET['desavilitados'];
$BUSCAR_SECCION = (empty($_GET['buscar_seccion'])) ?  ""  : $_GET['buscar_seccion'];
$BUSCAR_DIRECTOR = (empty($_GET['buscar_director'])) ?  ""  : $_GET['buscar_director'];
$txt_desde = (empty($_GET['txt_desde'])) ?  "0000-00-00"  : $_GET['txt_desde'];
$txt_hasta = (empty($_GET['txt_hasta'])) ?  "2050-00-00"  : $_GET['txt_hasta'];


if($desavilitados != "")
{
    $query_registro = "SELECT cliente.NOMBRE_CLIENTE, cliente.RUT_CLIENTE, cliente.EJECUTIVO, cliente.COMUNA , cliente.DIRECCION, cliente.TELEFONO1 , cliente.TELEFONO2, cliente.WEB,  cliente.CONTACTO1, cliente.CONTACTO2,  cliente.CELULAR_CONTACTO1,  cliente.CELULAR_CONTACTO2,  cliente.FORMA_PAGO  FROM cliente where  cliente.ACTIVO = 'NO'";  
}
else
{
    $query_registro = "SELECT cliente.NOMBRE_CLIENTE, cliente.CODIGO_CLIENTE, cliente.RUT_CLIENTE, cliente.EJECUTIVO, cliente.COMUNA , cliente.DIRECCION, cliente.TELEFONO1 , cliente.TELEFONO2, cliente.WEB,  cliente.CONTACTO1, cliente.CONTACTO2,  cliente.CELULAR_CONTACTO1,  cliente.CELULAR_CONTACTO2,  cliente.FORMA_PAGO FROM cliente where  cliente.ACTIVO != 'NO'"; 
}

if($BUSCAR_CODIGO  != "")
{
  $query_registro .= " and cliente.RUT_CLIENTE = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION != "")
{
  $query_registro .= " and cliente.NOMBRE_CLIENTE = '".$BUSCAR_DESCRIPCION."' ";
}

if($GRP == "VEN" || $GRP1 == "VEN" || $GRP2 == "VEN" || $GRP3 == "VEN")
{
  $ejutiv="";
foreach ($equipo as $valor)
{
  $ejutiv .= ",'".$valor."'";
}

$query_registro .= " AND cliente.EJECUTIVO in ('".$nombres." ".$apellido." ".$apellido_m."'".$ejutiv.") "; 

}

else if($BUSCAR_DIRECTOR != '')
{ 
$query_registro  .= " and cliente.EJECUTIVO = '".$BUSCAR_DIRECTOR."' ";

}
  echo "<thead><tr class='cheader'>";
  echo "<th>Código</th>";
  echo "<th>Rut</th>";
  echo "<th>Nombre</th>";
  echo "<th>Ejecutivo Ultima Compra</th>";
  echo "<th>Ejecutivo Asignado</th>";
  echo "<th>Rocha</th>";
  echo "<th>Monto</th>";
  echo "<th>Ultimo Ingreso</th>";
  echo "<th>Direccion</th>";
  echo "<th>Comuna</th>";
  echo "<th>Telefono</th>";
  echo "<th>Contacto</th>";
  echo "<th>Mail</th>";
  echo "<th>Forma pago</th>";
  echo "</tr></thead><tbody>"; 

$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
while($row = mysql_fetch_array($result))
{

  $CODIGO_CLIENTE = $row["CODIGO_CLIENTE"];
  $RUT_CLIENTE = $row["RUT_CLIENTE"];
  $NOMBRE_CLIENTE = $row["NOMBRE_CLIENTE"];
  $DIRECCION = $row["DIRECCION"];
  $COMUNA = $row["COMUNA"];
  $WEB = $row["WEB"];
  $CONTACTO1 = $row["CONTACTO1"];
  $CONTACTO2 = $row["CONTACTO2"];
  $CELULAR_CONTACTO1 = $row["CELULAR_CONTACTO1"];
  $CELULAR_CONTACTO2 = $row["CELULAR_CONTACTO2"];
  $FORMA_PAGO = $row["FORMA_PAGO"];
  $EJECUTIVOA = $row["EJECUTIVO"];
  $TELEFONO1 = $row["TELEFONO1"];
  $TELEFONO2 = $row["TELEFONO2"];




  $COD_PRO="";
  $MONTO=0;
  $EJECU="";
  $MAIL ="";
  $FECHA_INGRESO_R = date("Y-m-d");

$query_eje = "SELECT MONTO,EJECUTIVO, CODIGO_PROYECTO,FECHA_INGRESO,MAIL FROM proyecto  WHERE NOMBRE_CLIENTE = '".$NOMBRE_CLIENTE."'  AND  FECHA_INGRESO = (SELECT MAX(FECHA_INGRESO) FROM proyecto WHERE NOMBRE_CLIENTE = '".$NOMBRE_CLIENTE."')";

$resulteje = mysql_query($query_eje, $conn) or die(mysql_error());


 while($row = mysql_fetch_array($resulteje))
{
  $EJECU = $row["EJECUTIVO"];
  $COD_PRO = $row["CODIGO_PROYECTO"];
  $FECHA_INGRESO_R = $row["FECHA_INGRESO"];
  $MAIL = $row["MAIL"];
  $MONTO = $row["MONTO"];
}
mysql_free_result($resulteje);




if($txt_desde <= $FECHA_INGRESO_R && $txt_hasta >= $FECHA_INGRESO_R)
{
    if($BUSCAR_SECCION == "")
    {  
      echo "<tr><td > <a href=DescripcionCliente.php?CODIGO_CLIENTE=" .$CODIGO_CLIENTE. ">" . $CODIGO_CLIENTE . "</a></td>";
      echo "<td>".$RUT_CLIENTE."</td>";
      echo "<td>".$NOMBRE_CLIENTE. "</td>";
      echo "<td>".$EJECU ."</td>";
      echo "<td>".$EJECUTIVOA."</td>";
      echo "<td><a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($COD_PRO). ">" .$COD_PRO. "</a></td>";
      echo "<td align='right' >".number_format($MONTO,0,",",".")."</td>";
      echo "<td>". substr($FECHA_INGRESO_R , 0, 11)."</td>";
      echo "<td>" . $DIRECCION."</td>";
      echo "<td>" . $COMUNA. "</td>"; 
      echo "<td>" . $TELEFONO1."</td>"; 
      echo "<td>" . $CONTACTO1. "</td>"; 
      echo "<td>".$MAIL."</td>";      
      echo "<td>" . $FORMA_PAGO."</td> </tr>";   
      $numero--;
    }
     
    else if($BUSCAR_SECCION != "")
    {
      if(strpos($COD_PRO, $BUSCAR_SECCION) !== false)
      {  
        echo "<tr><td > <a href=DescripcionCliente.php?CODIGO_CLIENTE=" .$CODIGO_CLIENTE. ">" . $CODIGO_CLIENTE . "</a></td>";
        echo "<td>".$RUT_CLIENTE."</td>";
        echo "<td>".$NOMBRE_CLIENTE. "</td>";
        echo "<td>".$EJECU ."</td>";
        echo "<td>".$EJECUTIVOA."</td>";
        echo "<td><a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($COD_PRO). ">" .$COD_PRO. "</a></td>";
        echo "<td align='right' >".number_format($MONTO,0,",",".")."</td>";
        echo "<td>". substr($FECHA_INGRESO_R , 0, 11)."</td>";
        echo "<td>" . $DIRECCION."</td>";
        echo "<td>" . $COMUNA. "</td>"; 
        echo "<td>" . $TELEFONO1."</td>"; 
        echo "<td>" . $CONTACTO1. "</td>"; 
        echo "<td>".$MAIL."</td>";      
        echo "<td>" . $FORMA_PAGO."</td> </tr>";   
        $numero--;
      }
      else if($BUSCAR_SECCION == "LC")
      {
        if(strpos($COD_PRO, "S&S") === false && strpos($COD_PRO, "LD") === false && strpos($COD_PRO, "M&D") === false)
        { 
          echo "<tr><td > <a href=DescripcionCliente.php?CODIGO_CLIENTE=" .$CODIGO_CLIENTE. ">" . $CODIGO_CLIENTE . "</a></td>";
          echo "<td>".$RUT_CLIENTE."</td>";
          echo "<td>".$NOMBRE_CLIENTE. "</td>";
          echo "<td>".$EJECU ."</td>";
          echo "<td>".$EJECUTIVOA."</td>";
          echo "<td><a href=editarProyecto.php?CODIGO_PROYECTO=" .urlencode($COD_PRO). ">" .$COD_PRO. "</a></td>";
          echo "<td align='right' >".number_format($MONTO,0,",",".")."</td>";
          echo "<td>". substr($FECHA_INGRESO_R , 0, 11)."</td>";
          echo "<td>" . $DIRECCION."</td>";
          echo "<td>" . $COMUNA. "</td>"; 
          echo "<td>" . $TELEFONO1."</td>"; 
          echo "<td>" . $CONTACTO1. "</td>"; 
          echo "<td>".$MAIL."</td>";      
          echo "<td>" . $FORMA_PAGO."</td> </tr>";   
          $numero--;
        }
      }
    }
  }


}
?>
</tbody>
</table>
</body>

</html>