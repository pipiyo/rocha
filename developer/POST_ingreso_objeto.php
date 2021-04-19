<?php
                $GP =  $_POST['grupo'];
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 
if (isset($_POST['objetos'])) {
$OBJETOS = $_POST['objetos'];
  $OBJETOSS = array();
  $sql = " SELECT ID_OBJETO FROM objetos WHERE OBJETO IN('".implode("','",$OBJETOS)."') ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $OBJETOSS[] =  $row["ID_OBJETO"]  ;
            }
            mysql_free_result($sqlr);
  $sqla = " DELETE FROM grupo_objeto WHERE CODIGO_GRUPO =  '".$GP."' ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());
  $sqlb = " INSERT INTO grupo_objeto(CODIGO_GRUPO, CODIGO_OBJETO) VALUES  ";
foreach ($OBJETOSS as $key => $value) {
    $sqlb .= " ('".$GP."','".$value."') ,";
}
  $sqlb  = substr($sqlb, 0, -1);
  $sqlrb = mysql_query($sqlb, $conn) or die(mysql_error());
  echo "OK";
}else{
  $sqla = " DELETE FROM grupo_objeto WHERE CODIGO_GRUPO =  '".$GP."' ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());
            echo "OK";
};

?>


