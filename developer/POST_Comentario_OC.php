<?php
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 



  $sql = "  UPDATE orden_de_compra SET COMENTARIO = '".$_POST['coment']."' WHERE CODIGO_OC = '".$_POST['oc']."'  ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());

  
echo "".$_POST['coment']."";

?>


