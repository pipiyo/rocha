<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 
            $query_registro = "SELECT * FROM cliente WHERE NOMBRE_CLIENTE ='".$b."'";
            $result = mysql_query($query_registro, $conn) or die(mysql_error());
            $contar = 0;
            $CODIGO_CLIENTE = "";
            $ACTIVO = "";

            while($row = mysql_fetch_array($result))
            {
            $CODIGO_CLIENTE = $row["CODIGO_CLIENTE"];
            $ACTIVO = $row["ACTIVO"];
            $contar++;
            }

            mysql_free_result($result);



            if($contar == 0){

                  echo "<input onclick='abrircli()' style='float:right;  color: #ffffff; cursor: pointer; border: 0px; background:#6699FF; height:99%;'  id='Ingresar' name='Ingresar' type='button' value='Cliente desconocido ¿Desea crear cliente?'  />";
            
            }else{



                     if($ACTIVO == "NO"){

                  echo "<input onclick='activarcli()' style='float:right;  color: #ffffff; cursor: pointer; border: 0px; background:#6699FF; height:25px;'  id='Ingresar' name='Ingresar' type='button' value='Cliente Desactivado ¿Desea Activar cliente?'  /><input  style='display:none;'  id='activarclicod' name='activarclicod' type='txt' value='".$CODIGO_CLIENTE."'  />";

                  }else{

                        echo "Nombre ya ingresado";

                  }
            }
      }
?>