<?php
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

            
            $SUBOBJETOS = array();
            $SELECCIONADOS = array();
            $IMPRIMIR = array();

  $sql = " SELECT * FROM subobjeto WHERE subobjeto.ID_OBJETO = ( SELECT objetos.ID_OBJETO FROM objetos WHERE objetos.OBJETO = '".$_POST['objeto']."' ) ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $SUBOBJETOS[] = $row["ID_SUBOBJETO"] ;
            }
            mysql_free_result($sqlr);

  $sqla = " SELECT CODIGO_SUBOBJETO FROM grupo_subobjetos WHERE CODIGO_GRUPO = '".$_POST['grupo']."'  AND CODIGO_SUBOBJETO IN('".implode("','",$SUBOBJETOS)."') ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlra))
            {
            $SELECCIONADOS[] =  $row["CODIGO_SUBOBJETO"]  ;
            }
            mysql_free_result($sqlra);



  $sqlb = " SELECT * FROM subobjeto WHERE ID_SUBOBJETO IN('".implode("','",$SUBOBJETOS)."')  ";
            $sqlrb = mysql_query($sqlb, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlrb))
            {
            $IMPRIMIR[] =  in_array($row["ID_SUBOBJETO"], $SELECCIONADOS) ?  array( "ID" => $row["ID_SUBOBJETO"], "NOMBRE" => $row["NOMBRE"], "BLOQ" => "SI" )  :   array( "ID" => $row["ID_SUBOBJETO"], "NOMBRE" => $row["NOMBRE"], "BLOQ" => "NO" ) ;
            }
            mysql_free_result($sqlrb);

            echo json_encode($IMPRIMIR);

?>



