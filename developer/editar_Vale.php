<?php
require_once('Conexion/Conexion.php');
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_VALE = $_POST['CODIGO_VALE'];
$TIPO_USUARIO= $_SESSION['TIPO_USUARIO'];

mysql_select_db($database_conn, $conn);
$query_registro = "SELECT * FROM vale_emision where COD_VALE = '".$CODIGO_VALE."'";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result))
  {
	$CODIGO_VALE= $row["COD_VALE"];
	$FECHA = $row["FECHA"];
	$FECHA_T = $row["FECHA_TERMINO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$ESTADO = $row["ESTADO"];
	$DIFERENCIA_TOTAL = $row["DIFERENCIA_TOTAL"];
	$EMPLEADO =  $row["EMPLEADO"];
  }
  
  mysql_free_result($result);

  
?>

<!doctype html>
<html>
<head>
    <title>Editar Vale V1.0.0</title>
    <link rel="shortcut icon" href="Imagenes/rocha.png">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />

    <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <link rel="stylesheet" href="style/estilovale.css" type="text/css" media="screen">
    <link rel="styleSheet" href="style/bread.css" type="text/css" >

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>

    <script type="text/javascript" src="js/vale-emision.js"></script>

    <script src='js/Bloqueo.php'></script>
    <script src='js/breadcrumbs.php'></script>
  </head>

<body>

<div id='bread'><div id="menu1"></div></div>
<form action = "scriptValeEditar.php" method="post" id='formulario'>
<div class='form-vale'>
<h1> Editar Vale </h1>
<div id = 'res'></div>
<table class="table-vale-form">
  <tr>
    <td><input class='textbox' placeholder="Rocha" type="text" id = "rocha" name = "rocha" value="<?php echo $CODIGO_PROYECTO?>"/></td>
    <td>
        <select class='textbox'  onChange="" id = "departamento" name="departamento">
        <option><?php echo $DEPARTAMENTO?></option>
        <option>PRODUCCION</option>
        <option>ADQUICICIONES</option>
        <option>ABASTECIMIENTO</option>
        <option>DESPACHO</option>
        <option>INSTALACIONES</option>
        <option>COMERCIAL</option>
        <option>FINANZAS</option>
        <option>RRHH</option>
        <option>SISTEMA</option>
        <option>DAM</option>
        <option>DESARROLLO</option>
        <option>SILLAS</option>
        <option>GERENCIA</option>
        <option>DAM</option>
        <option>DAM</option>
        <option>MUEBLES ESPECIALES</option>
        </select>
    </td>
    <td><input class='textbox'  readonly type="text"   id= "fecha" name = "fecha" value="<?php echo $FECHA?>"/></h3></td> 
    <td><input class='textbox' placeholder="Fecha Termino" type="text"   id= "fecha_t" name = "fecha_t" value="<?php echo $FECHA_T?>"/></h3></td> 
    <td><input class='textbox' type='text' placeholder="Empleado" onChange="" id = "empleado" name="empleado" value="<?php echo $EMPLEADO?>"></td>
    <td><input class='textbox' readonly type="text"   id= "n_vale" name = "n_vale" value="<?php echo $CODIGO_VALE?>"/></td>
	</tr>
</table>
</div> 


<table id="tabla_producto">
<tr>
  <th>COD</th>
  <th>DESCRIPCION</th>
  <th >EXISTE</th>
  <th>CANT SOLI</th>
  <th>U/M</th>
  <th>OBSERVACIONES</th>
</tr>

<?php
$query_registro3 = "select DIFERENCIA,CANTIDAD_ENTREGADA,CODIGO_PRODUCTO, OBSERVACIONES,CANTIDAD_SOLICITADA,ID FROM producto_vale_emision where CODIGO_VALE = '".$CODIGO_VALE."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());
$contador= 1;
 while($row = mysql_fetch_array($result3))
  {
	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$OBSERVACIONES = $row["OBSERVACIONES"]; 
	$CANTIDAD_SOLICITADA = $row["CANTIDAD_SOLICITADA"];
	$CANTIDAD_ENTREGADA = $row["CANTIDAD_ENTREGADA"];
	$DIFERENCIA = $row["DIFERENCIA"];
	$ID = $row["ID"];

$query_registroPRO = "select DESCRIPCION, UNIDAD_DE_MEDIDA,STOCK_ACTUAL FROM producto where CODIGO_PRODUCTO = '".$COD_PRODUCTO."'";
$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultPRO))
  {
	$DESCRIPCIONES= $row["DESCRIPCION"]; 
	$UNIDAD_DE_MEDIDA= $row["UNIDAD_DE_MEDIDA"]; 
	$STOCK= $row["STOCK_ACTUAL"];
  }
  mysql_free_result($resultPRO);

  echo "<tr>";
  echo "<td> <input class='txt_invisible codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '".$COD_PRODUCTO."' /><input  name =idi".$contador." id =idi".$contador." type = 'hidden' value = '".$ID."' /> </td>";	
  echo "<td> <input class='txt_invisible descripcion' name =des".$contador." id =des".$contador." type = 'text' value='".$DESCRIPCIONES."' /></td>";
  echo "<td id =exs".$contador."></td>";	
  echo "<td><input class='txt_invisible' name = cans".$contador." id =cans".$contador." type = 'text' value = '".($CANTIDAD_SOLICITADA)."' /></td>";
  echo "<td><input class='txt_invisible' name =um".$contador." id =um".$contador." type = 'text' value = '".($UNIDAD_DE_MEDIDA)."' /></td>";
  echo "<td><input class='txt_invisible' name =obs".$contador." id =obs".$contador." type = 'text' value = '".($OBSERVACIONES)."' /></td>";
  echo "</tr>"; 
  $contador++; 
  }
  mysql_free_result($result3);
  mysql_close($conn);
  
  while($contador < 26)
  {
    echo "<tr>";
    echo "<td>  <input class='txt_invisible codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></td>";	
    echo "<td><input class='txt_invisible descripcion' name =des".$contador." id =des".$contador." type = 'text' value='' /></td>";
    echo "<td id =exs".$contador.">  </td>";	
    echo "<td><input class='txt_invisible' name = cans".$contador." id =cans".$contador." type = 'text' value = '' /></td>";
    echo "<td><input class='txt_invisible' name =um".$contador." id =um".$contador." type = 'text' value = '' /></td>";
    echo "<td><input class='txt_invisible' name =obs".$contador." id =obs".$contador." type = 'text' value = '' /></td>";
    echo "</tr>"; 
	  $contador++; 
  }
?>
</table>
<div align="right">
    <input type = 'button' id="ingresar" name ="ingresar" value = "EMITIR" onClick="enviar();"  />
</div>
<div  id="listaproyectos"></div>
<div  id="listacodigos"></div>
<div  id="listadescripciones"></div>
</form>

</body>
</html>