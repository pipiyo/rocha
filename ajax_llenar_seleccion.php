<?php

             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 

            $OBJETOS = array();
            $SELECCIONADOS = array();
            $IMPRIMIR = array();

  $sql = " SELECT OBJETO FROM objetos WHERE ID_OBJETO ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $OBJETOS[] =  $row["OBJETO"]  ;
            }
            mysql_free_result($sqlr);



  $sqla = " SELECT OBJETO FROM objetos WHERE ID_OBJETO IN( SELECT CODIGO_OBJETO FROM grupo_objeto WHERE CODIGO_GRUPO = '".$_POST['ID']."' ) ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlra))
            {
            $SELECCIONADOS[] =  $row["OBJETO"]  ;
            }
            mysql_free_result($sqlra);

foreach ($OBJETOS as $key => $value) {
    $IMPRIMIR[] =  (in_array($value, $SELECCIONADOS)) ?  array( "NOMBRE"  =>  $value,
    "SELEC" => "SI" )  :  array( "NOMBRE"  =>  $value,
    "SELEC" => "NO" )  ;
}





            echo json_encode($IMPRIMIR);

?>



