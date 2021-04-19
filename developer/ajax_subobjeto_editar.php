<?php
                $GP =  $_POST['grupo'];
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 


if (isset($_POST['subobjeto'])) {

  $SUBOBJETOS = $_POST['subobjeto'];
  $NOSUBOBJETOS = $_POST['nosubobjeto'];

  $sqla = " DELETE FROM grupo_subobjetos WHERE  CODIGO_SUBOBJETO  IN('".implode("','",$NOSUBOBJETOS)."') AND  CODIGO_GRUPO =  '".$_POST['grupo']."' ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());


  $sqlb = " INSERT INTO grupo_subobjetos(CODIGO_GRUPO, CODIGO_SUBOBJETO) VALUES  ";

foreach ($SUBOBJETOS as $key => $value) {
    $sqlb .= " ('".$GP."','".$value."') ,";
}

  $sqlb  = substr($sqlb, 0, -1);
  $sqlrb = mysql_query($sqlb, $conn) or die(mysql_error());

            echo "OK";

}else{

  $NOSUBOBJETOS = $_POST['nosubobjeto'];

    $sqla = " DELETE FROM grupo_subobjetos WHERE  CODIGO_SUBOBJETO  IN('".implode("','",$NOSUBOBJETOS)."') AND  CODIGO_GRUPO =  '".$_POST['grupo']."' ";
            $sqlra = mysql_query($sqla, $conn) or die(mysql_error());

echo "OK";

};

?>

