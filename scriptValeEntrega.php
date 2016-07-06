<?php 
//Proceso de conexión con la base de datos
require_once('Conexion/Conexion.php'); 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);

  $NVALE = $_POST['n_vale'];
  $DIFTOTAL = $_POST['diftot'];
  $NOMBRE_USUARIO = $_SESSION['NOMBRE_USUARIO'];
  $CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];	

  $sql11 = "SELECT * from vale_emision  where COD_VALE = '".$NVALE ."'";
  $result21 = mysql_query($sql11, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result21))
  {
   $COD = $row["CODIGO_PROYECTO"];
  }

  $numero = $_POST['ciclos'];
  $contador = 1;
  while ($contador <= $numero )
  {
    $DESCRIPCION1 = $_POST['des'.$contador];
    $CODIGO_PRODUCTO= $_POST['cod'.$contador];
    $CANTIDAD = $_POST['cans'.$contador]; 
    $OBS = $_POST['obs'.$contador];
    $CANE= $_POST['cane'.$contador];
    $ENTR= $_POST['entr'.$contador];
    $DIF= $_POST['dif'.$contador];
    $ID= $_POST['cor'.$contador];
    $SUMACA = $CANE + $ENTR;

    if($CODIGO_PRODUCTO != "")
    {
      $sql1 = "SELECT * from producto  where CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
      $result2 = mysql_query($sql1, $conn) or die(mysql_error());
      while($row = mysql_fetch_array($result2))
      {
          $STOCK = $row["STOCK_ACTUAL"];
      }

      $FINAL = $STOCK - $CANE;

      if($FINAL >= 0 )
      {
        $sql01="UPDATE  producto_vale_emision SET OBSERVACIONES = '".$OBS."',CANTIDAD_ENTREGADA = '".$SUMACA."' ,DIFERENCIA = '".($DIF)."' WHERE ID = '".$ID."'";
        $result01 = mysql_query($sql01, $conn) or die(mysql_error());

       
  
        $sql01="UPDATE PRODUCTO SET STOCK_ACTUAL = '".$FINAL."' WHERE CODIGO_PRODUCTO = '".$CODIGO_PRODUCTO ."'";
        $result01 = mysql_query($sql01, $conn) or die(mysql_error());

        mysql_select_db($database_conn, $conn);
        $FECHA = date('Y/m/d');

        $sql1 = "INSERT INTO actualizaciones (VALOR_ANTIGUO,ROCHA,EGRESO,FECHA,USUARIO,NOMBRE_USUARIO,VALE) values ('".($STOCK)."','".($COD)."','".($CANE)."','".($FECHA)."','".($CODIGO_USUARIO)."','".($NOMBRE_USUARIO)."','".($NVALE)."')";
        $result1 = mysql_query($sql1, $conn) or die(mysql_error());

        $sql8 = "SELECT * FROM actualizaciones ORDER BY CODIGO_ACTUALIZACIONES DESC LIMIT 1";
        $result8 = mysql_query($sql8, $conn) or die(mysql_error());
        while($row = mysql_fetch_array($result8))
        {
	        $CODIGO_A = $row["CODIGO_ACTUALIZACIONES"];
        }
        mysql_free_result($result8);

        $sqla = "INSERT INTO actualizaciones_general (CODIGO_ACTUALIZACIONES,CODIGO_PRODUCTO) values ('".($CODIGO_A)."','".$CODIGO_PRODUCTO."')";
        $resulta = mysql_query($sqla, $conn) or die(mysql_error());
      }
      else
      {
        echo '<script language = javascript>
        alert("Verifica ya que el '.$CODIGO_PRODUCTO.' no puede tener stock negativo al ser rebajado")
        self.location = "ListadoValeEmision.php"
        </script>';
      }
    }
    $contador++;
  }



  if($DIFTOTAL == 0)
  {
    $sql9="UPDATE vale_emision SET ESTADO = 'ENTREGADO',DIFERENCIA_TOTAL ='".$DIFTOTAL."' WHERE COD_VALE = '".$NVALE."'";
    $result9 = mysql_query($sql9, $conn) or die(mysql_error());
  }
  else
  {
    $sql9="UPDATE vale_emision SET ESTADO = 'PENDIENTE',DIFERENCIA_TOTAL ='".$DIFTOTAL."'  WHERE COD_VALE = '".$NVALE."'";
    $result9 = mysql_query($sql9, $conn) or die(mysql_error());
  }

  $sql1 = "SELECT * from producto_vale_emision  where CODIGO_VALE = '".$NVALE ."'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
   $CODIGO_OCU = $row["CODIGO_VALE"];
  }
  mysql_free_result($result2);



echo '<script language = javascript>
alert("Vale enviado")
self.location = "ListadoValeEmision.php"
</script>';
?>