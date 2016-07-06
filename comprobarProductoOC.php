
<?php
      $user = $_POST['b'];
       
      if(!empty($user)) {
            comprobar($user);
      }
       
      function comprobar($b) {
		  
		    require_once('Conexion/Conexion.php');
		    mysql_select_db($database_conn, $conn);
			              
	               //$sql = mysql_query("SELECT count(nombre) as nombre FROM usuarios WHERE nombre = '".$b."'",$con);
			
			$sql1 = "SELECT * FROM producto WHERE DESCRIPCION = '".$b."'";
			
            $result2 = mysql_query($sql1,$conn) or die(mysql_error());
			$contar = 0;
			
            while($row = mysql_fetch_array($result2))
            {
	          $DESCRIPCION= $row["DESCRIPCION"];
			  $contar++;
            }
             
            if($contar == 0)
			{
			echo "<span id='NO' style='font-weight:bold;color:red; font-size:10px'>NO EXISTE ".$b."</span>";   
			echo '<script language = javascript>
			function prueba1()
			{                   
			var proveedor = document.getElementById("proveedor") ;
            var despachar = document.getElementById("despachar") ;
            var cal = document.getElementById("cal") ;
            cal.disabled=true;                   
             if (proveedor.value == "" || despachar.value == "" ) 
             {	  
             cal.disabled=true;
             }

			}
		     prueba1();
            </script>';  
            }
			else
			{
             echo "<span id='SI' style='font-weight:bold;color:green;font-size:10px'>SI ".$b.".</span>";
			 echo '<script language = javascript>
			function prueba1()
			{	
			var proveedor = document.getElementById("proveedor") ;
            var despachar = document.getElementById("despachar") ;
            var cal = document.getElementById("cal") ;
            cal.disabled=false;                   
             if (proveedor.value == "" || despachar.value == "") 
             {	  
             cal.disabled=true;
             }	
			}
			prueba1();
            </script>';  
            }
      }     
	  ?>
