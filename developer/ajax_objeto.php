<?php

             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

            $OBJETOS = array();

  $sql = " SELECT OBJETO FROM objetos WHERE ID_OBJETO IN( SELECT CODIGO_OBJETO FROM grupo_objeto WHERE CODIGO_GRUPO = '".$_POST['ID']."' ) ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $OBJETOS[] =  $row["OBJETO"]  ;
            }
            mysql_free_result($sqlr);

            echo json_encode($OBJETOS);

?>



