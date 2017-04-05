<?php 
require_once('Conexion/Conexion.php'); 
mysql_select_db($database_conn, $conn);

$query_registro = "SELECT * FROM madre";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result1))
  {
     

      $query_registro_pr = "SELECT count(*) as total FROM proyecto WHERE NOMBRE_PROYECTO = '".$row["NOMBRE"]."' and ESTADO = 'EN PROCESO'";
      $total_pro ="";
      $result1_pro = mysql_query($query_registro_pr, $conn) or die(mysql_error());
       while($row1 = mysql_fetch_array($result1_pro))
        {
        $total_pro = $row1["total"];
        }
      if($total_pro == 0){
        $sql_pro = "UPDATE madre SET ESTADO = 'OK' WHERE NOMBRE = '".$row["NOMBRE"]."'";
        $result = mysql_query($sql_pro, $conn) or die(mysql_error());
      }else{
        $sql_pro = "UPDATE madre SET ESTADO = 'EN PROCESO' WHERE NOMBRE = '".$row["NOMBRE"]."'";
        $result = mysql_query($sql_pro, $conn) or die(mysql_error());
      }
  }
mysql_free_result($result1);


?>