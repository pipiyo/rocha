<?php require_once('Conexion/Conexion.php');?>
<table>
<?php
mysql_select_db($database_conn, $conn);

$contador = "select * from producto where temporada = '2' and familia = 'Generico'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
     
     $CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
     $RUTA = "producto/".$CODIGO_PRODUCTO.".jpg";
     echo "<tr> <td>producto/".$CODIGO_PRODUCTO.".jpg</td> <td>$CODIGO_PRODUCTO</td> </tr>";

     $sql = "UPDATE producto SET RUTA = '".$RUTA."' WHERE CODIGO_PRODUCTO ='".$CODIGO_PRODUCTO."'";
     $result = mysql_query($sql, $conn) or die(mysql_error());  

}

mysql_free_result($result1);
?>
</table>
