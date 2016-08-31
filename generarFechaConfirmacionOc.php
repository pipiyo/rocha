<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
mysql_select_db($database_conn, $conn);



?>

<div style="background: #fff; border:#000 solid 1px;" onMouseMove="fechaConfirmacionOc()" >
  <form action = 'scriptActualizarFechaConfirmacionOc.php' method='POST'> 
  <input type="hidden" name="detalle[codigo_oc]" value="<?php echo $_GET['codigo_oc']; ?>" />
  <input type="hidden" name="detalle[codigo_usuario]" value="<?php echo $_GET['codigo_usuario']; ?>" />
  <input type="hidden" name="detalle[fecha_antigua]" value="<?php echo $_GET['fecha_antigua']; ?>" />

   <table>
  
  <tr>
  <tr><h3><center>Fecha Confirmacion</center></h3></tr>
  <td width="50" style="margin:20px;">Area </td>
  
  <td width="150" style="margin:20px;"> <select style="width:150px" id = "area" name = "detalle[area]">
  <option>Seleccione</option>

<?php

$query = "SELECT `NOMBRE_GRUPO` as nombre, `ID_GRUPO` as id FROM `grupo`";
$result = mysql_query($query, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  {
    echo "<option value='" . $row["id"] . "'> " . $row["nombre"] . " </option>";
  }
mysql_free_result($result);

?>

  </select></td>
  </tr>

  <tr>
  <td width="28" style="margin:20px;">Fecha Confirmacion</td>
  <td width="146" style="margin:20px;"> <input id = 'fechaconfirmacionoc' class = 'fechaconfirmacionoc'  name='detalle[fecha]' type='text' value=''/></td>
  </tr>

  <tr>
  <td width="28" style="margin:20px;">Comentario</td>
  <td width="146" style="margin:20px;"> <input id = 'comentariofc'  name='detalle[comentario]' type='text' value=''/></td>
  </tr>
    
  <tr>
  <td width="28" style="margin:20px;">observaciones</td>
  <td width="146" style="margin:20px;"><center><textarea  id="obsfc" name="detalle[observacion]" cols="15" rows="4"></textarea></center></td>
  </tr>

  <tr>
  <td width="150"  align="left"></td>
  <td width="123" align="right"><center><input style="margin:10px; margin-bottom:30px;" type="submit" value="Aceptar"/></center> </td>
   </tr>
  </tr>
  </table>	
  </div>
 </form> 