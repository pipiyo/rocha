<?php require_once('../models/Query_ingreso_metalico.php'); 

	$con = new Conexion\Query_ingreso_metalico;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title>Ingreso metalico</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="X-UA-Compatible" content="IE=9" />



  <script language = javascript>

  </script>  
  
</head>
<body>	
 <div class="container">
 	
 	<div class="row">	
 	<form action="" method="POST" >

 		<select class="textbox" name="categoria" id="categoria"  >
    		<option></option>
		 	<?php

		 		foreach ($n = $con->Query_simple("SELECT * FROM categoria_producto WHERE id_categoria_producto IN('15','16','17','19')") as $key => $value) {
		 			echo "<option value='" . $n[$key]['id_categoria_producto'] . "' >" . $n[$key]['nombre'] . "</option>";
		 		};

		 	?>
  		</select>


  		<input type="submit" name="submit" />

  	</form>
 	</div>

<?php


  if ($_POST['submit']) {

  echo "<form action='' method='POST' >";

    echo "<div class='row'>
           <input type='text' name='categoria' value='".$_POST['categoria']."' />

    <select class='textbox' name='proveedor' id='proveedor'  >
        <option></option>";
      
        foreach ($n = $con->Query_simple("SELECT `NOMBRE_FANTASIA`, `CODIGO_PROVEEDOR` FROM `proveedor` WHERE `proveedor`.`CODIGO_PROVEEDOR` IN( SELECT `CODIGO_PROVEEDOR` FROM `categoria_producto_proveedor` WHERE `categoria_producto_proveedor`.`id_categoria_producto` = '".$_POST['categoria']."' )") as $key => $value) {
          echo "<option value='" . $n[$key]['CODIGO_PROVEEDOR'] . "' >" . $n[$key]['NOMBRE_FANTASIA'] . "</option>";
        };

      echo"</select>
           <input type='text' name='codigo' value='' />
           <input type='text' name='descripcion' value='' />
           <input type='submit' name='prov' />
         </div>
         </form>";
    };




  if ($_POST['prov']) {

  echo "<form action='' method='POST' >";


    echo "<div class='row'>
           <input type='text' name='generico[categoria]' value='".$_POST['categoria']."' />
           <input type='text' name='generico[codigo]' value='". trim($_POST['codigo']) ."' />
           <input type='text' name='generico[descripcion]' value='". str_replace(" @", "", $_POST['descripcion']) ."' />
         </div>";

    echo "<div class='row'>";
      
          echo  "<div> 
                  <input name='productos[0][codigo]' type='text' value='".$_POST['codigo']."'> 
                  <input name='productos[0][descripcion]' type='text' value='".str_replace(" @", "", $_POST['descripcion'])."'>     
                  <input name='productos[0][generico]' type='text' value='1'> 
                  <input name='productos[0][familia]' type='text' value='generico'>  
                  <input name='productos[0][id_color]' type='text' value=''>  
                 </div>"; 


    $i = 1;
    foreach ($n = $con->proveedor_colores($_POST['proveedor'], $_POST['categoria'], trim($_POST['codigo']), trim($_POST['descripcion'])) as $key => $value) {
                  echo  "<div> 
                  <input name='productos[$i][codigo]' type='text' value='$value[cod]'> 
                  <input name='productos[$i][descripcion]' type='text' value='$value[des]'>  
                  <input name='productos[$i][generico]' type='text' value='0'> 
                  <input name='productos[$i][familia]' type='text' value='metalico'>
                  <input name='productos[$i][id_color]' type='text' value='$value[id_color]'>  
                 </div>"; 
    $i++;
    };

      echo"</div>
      <input type='submit' name='ok' value='ok' />
         </form>";
    };


  if (isset($_POST['ok'])) {

    echo "<pre>";
      var_dump($con->Ingreso_productos($_POST['productos'] ,$_POST['generico']));
    echo "</pre>";

  }


/*


	if ($_POST['submit']) {

  echo "<form action='' method='POST' >";

		echo "<div class='row'>
  			   <input type='text' name='generico[categoria]' value='".$_POST['categoria']."' />
  			   <input type='text' name='generico[codigo]' value='". trim($_POST['codigo']) ."' />
  			   <input type='text' name='generico[descripcion]' value='". str_replace(" @", "", $_POST['descripcion']) ."' />
 		     </div>";




          echo  "<div> 
                  <input name='productos[0][codigo]' type='text' value='".$_POST['codigo']."'> 
                  <input name='productos[0][descripcion]' type='text' value='".str_replace(" @", "", $_POST['descripcion'])."'>
                  <input name='productos[0][cuerpo]' type='text' value=''>
                  <input name='productos[0][frente]' type='text' value=''>
                  <input name='productos[0][canto]' type='text' value=''>
                  <input name='productos[0][espesor]' type='text' value=''>
                  <input name='productos[0][trascara]' type='text' value=''>
                  <input name='productos[0][generico]' type='text' value='1'>   
                  <input name='productos[0][familia]' type='text' value='generico'>           
                 </div>"; 


  $i = 1;
 		foreach ($n = $con->Superficies_colores($_POST['categoria'], trim($_POST['codigo']), trim($_POST['descripcion'])) as $key => $value) {
 			foreach ($n[$key] as $llave => $valor) {
 				foreach ($n[$key][$llave] as $k => $v) {
 					echo  "<div> 
                  <input name='productos[$i][codigo]' type='text' value='$v[cod]'> 
                  <input name='productos[$i][descripcion]' type='text' value='$v[des]'>
                  <input name='productos[$i][cuerpo]' type='text' value='$v[cuerpo]'>
                  <input name='productos[$i][frente]' type='text' value='$v[frente]'>
                  <input name='productos[$i][canto]' type='text' value='$v[canto]'>
                  <input name='productos[$i][espesor]' type='text' value='$v[espesor]'>
                  <input name='productos[$i][trascara]' type='text' value='$v[trascara]'>
                  <input name='productos[$i][generico]' type='text' value='0'>   
                  <input name='productos[$i][familia]' type='text' value='$v[familia]'>           
                 </div>";	
          $i++;
        }
 			}
 		};

echo " <input type='submit' name='ok' value='ok' /> </form>";

 		echo "<pre>";
		 var_dump($con->Superficies_colores($_POST['categoria'], $_POST['codigo'] ,$_POST['descripcion']));
		echo "</pre>";
	}

  if (isset($_POST['ok'])) {

    echo "<pre>";
      var_dump($con->Ingreso_productos($_POST['productos'] ,$_POST['generico']));
    echo "</pre>";

  }


*/
?>


 	
 </div>

</body>
</html>