<?php require_once('../Conexion/Query_ingreso_aglomerado.php'); 

	$con = new Conexion\Query_ingreso_aglomerado;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title>Ingreso Aglomerado</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>

  <script language = javascript>

  	




  </script>  
  
</head>
<body>	
 <div class="container">
 	<div class="row">
 		
 		<select class="textbox" name="categoria" id="categoria"  >
    		<option></option>
		 	<?php

		 		foreach ($n = $con->Query('SELECT * FROM categoria_producto') as $key => $value) {
		 			echo "<option>" . $n[$key]['nombre'] . "</option>";
		 		};

		 	?>
  		</select>

  		<input type="text" name="codigo" />
  		<input type="text" name="descripcion" />

 	</div>



 	<div class="row">
 		<pre>
		 	<?php
		 		var_dump($con->Query('SELECT * FROM categoria_producto'));
		 	?>
 		</pre>
 	</div>
 	
 </div>


</body>
</html>