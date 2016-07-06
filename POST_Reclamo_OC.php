<?php
            require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

  $sql = "  UPDATE orden_de_compra SET RECLAMO = '".$_POST['coment1']."' WHERE CODIGO_OC = '".$_POST['oc1']."'  ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());

echo "".$_POST['coment1']."";

?>


