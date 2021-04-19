<?php require_once('Conexion/Conexion.php');  

session_start();

mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];

$CODIGO_SERVICIO= $_GET['cod'];

$sql111 = "SELECT * from servicio where CODIGO_SERVICIO = '".$CODIGO_SERVICIO."'";

$result111 = mysql_query($sql111, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result111))
  {
	  $FECHA_E1 = $row["FECHA_ENTREGA"];
	  $FECHA_I1 = $row["FECHA_INICIO"];
	  $DIAS1 = $row["DIAS"];
  }
  mysql_free_result($result111);

?>
<div onMouseMove="fechaconread();dias5();">


   <table>


  <tr>
  <tr><h3><center>Fecha Confirmacion</center></h3></tr>
  

<input  style="display:none;" id='diascon'   name='diascon' type='text' value=''/>

  <tr>
  <td width="28" style="margin:20px;">Confirmacion</td>
  <td width="146" style="margin:20px;"> <input id='fechaeconfirmar'   name='fechaeconfirmar' type='text' value='<?php echo  $FECHA_E1; ?>'/></td>
  </tr>




  <td width="50" style="margin:20px;">Area </td>
  <td width="150" style="margin:20px;"> <select class="abrirboton" style="width:150px" id = "areacon" name = "areacon">
  <option></option>
  <option>CLIENTE</option>
  <option>COMERCIAL</option>
  <option>DAM</option>
  <option>PROVEEDOR</option>
  <option>IMPORTACION</option>
  <option>ADQUISICIONES</option>
  <option>DESPACHO</option>
  <option>INSTALACION</option>
  <option>PRODUCCION</option>
  <option>SILLAS</option>
  <option>PLANIFICACION</option>
  </select></td>
  </tr>

  <tr>
  <td width="28" style="margin:20px;">observaciones</td>
  <td width="146" style="margin:20px;"><center><textarea  class="abrirboton" id="obscon" name="obscon" cols="15" rows="4"></textarea></center></td>
  </tr>




  <tr>
  <td width="150"  align="left"></td>
  <td width="123" align="right"><center><input disabled="disabled" style="margin:10px; margin-bottom:30px;" type="button"  name = "buscar44" id='buscar44' value="Aceptar"/></center> </td>
   </tr>
  </tr>
  </table>	
  </div>
