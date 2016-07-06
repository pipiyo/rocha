<?php 
require_once('Conexion/Conexion.php');
$rad = $_GET['radicado'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<title>Editar Proyecto V1.1.0</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<link rel="shortcut icon" href="Imagenes/rocha.png">

	<link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
	<link rel="stylesheet" href="style/acabado.css" />
	<link rel="styleSheet" href="style/bread.css" type="text/css" >

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
	<script type="text/javascript" src="js/acabado.js"></script>
	<script src='js/breadcrumbs.php'></script>
</head>

<body>
<div id='bread'><div id="menu1"></div></div>
<h1> Acabados </h1>
<?php
mysql_select_db($database_conn, $conn);

$contador = "select * from cotizacion where CODIGO_RADICADO = '".$rad."'";
$result1 = mysql_query($contador,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result1))
{
	 $CODIGO_COTIZACION = $row["CODIGO_COTIZACION"];
}
mysql_free_result($result1);

$fila = 0;
echo "<table class='contenido'><tr class='encabezado'> <td align='center' class='uno'>Codigo</td> <td class='dos' align='center'>Descripción</td><td class='tres' align='center'>Familia</td> <td class='cuatro' align='center'>Cant</td> <td class='cinco' align='center'>Opc 1</td> <td class='seis' align='center'> Opc 2</td> <td class='siete' align='center'>Opc 3</td> <td class='ocho' align='center'>Opc 4</td><td class='nueve' align='center'>Opc 5</td></tr>";

$contador = "select UBICACION from cotizacion_producto where CODIGO_COTIZACION = '".$CODIGO_COTIZACION."' group by ubicacion";
$result1 = mysql_query($contador,$conn) or die(mysql_error());
while($row = mysql_fetch_array($result1))
{
echo "<tr><td class='productito' align='center' colspan='9'>".$row["UBICACION"]."</td></tr>";
$contador1 = "select * from cotizacion_producto where CODIGO_COTIZACION = '".$CODIGO_COTIZACION."' AND UBICACION = '".$row["UBICACION"]."'";
$result11 = mysql_query($contador1,$conn) or die(mysql_error());
$suma = 0;
	while($row = mysql_fetch_array($result11))
	{
			$LISTACUERPO = array();
			$LISTAFRENTE = array();
      $LISTATRASCARA = array();
      $LISTAESPESOR = array();
      $LISTAMETALES = array();


			$option = "";
  		$sec = "";

  		$option1 = "";
  		$sec1 = "";

      $option2 = "";
      $sec2 = "";

      $option3 = "";
      $sec3 = "";

      $option4 = "";
      $sec4 = "";

  		$LISTACUERPO1 = array();
  		$LISTAFRENTE1 = array();
      $LISTATRASCARA1 = array();
      $LISTAESPESOR1 = array();
      $LISTAMETALES1 = array();

      /* Descripción Producto */

        $sqlb =  "SELECT * FROM producto WHERE CODIGO_PRODUCTO = '".$row["CODIGO_PRODUCTO"]."'";
        $resultb = mysql_query($sqlb, $conn) or die(mysql_error());
        while($row2 = mysql_fetch_array($resultb))
        {
          $CATEGORIA = $row2["CATEGORIA"];
        }
        mysql_free_result($resultb);


      /* Cuerpo Y Frente */
			
      if($row["POM"] != "")
			{
       
        $sqla =  "SELECT * FROM producto WHERE CODIGO_PRODUCTO like '%".$row["CODIGO_PRODUCTO"].".".$row["POM"]."%' AND NOT DESHABILITAR = 1";
      
				$resulta = mysql_query($sqla, $conn) or die(mysql_error());
				while($row1 = mysql_fetch_array($resulta))
  				{
  					$LISTACUERPO[] = $row1["CUERPO"];
            $LISTAFRENTE[] = $row1["FRENTE"];
            $LISTATRASCARA[] = $row1["TRASCARA"];
            $LISTAESPESOR[] = $row1["ESPESOR"];
  				}
  				mysql_free_result($resulta);
  				$LISTACUERPO1 = array_unique($LISTACUERPO);
  				$LISTAFRENTE1 = array_unique($LISTAFRENTE);
          $LISTATRASCARA1 = array_unique($LISTATRASCARA);
          $LISTAESPESOR1 = array_unique($LISTAESPESOR);
  			}

      if($CATEGORIA == "Paneleria" || $CATEGORIA == "Soportes Metalicos" || $CATEGORIA == "Accesorios" || $CATEGORIA == "Almacenamiento Metalico" || $CATEGORIA == "Accesorios Paneleria")
      {
        $sqla =  "SELECT * FROM producto WHERE CODIGO_PRODUCTO like '%".$row["CODIGO_PRODUCTO"]."%' AND NOT DESHABILITAR = 1";

        $resulta = mysql_query($sqla, $conn) or die(mysql_error());
        while($row1 = mysql_fetch_array($resulta))
        {
          if($row1["CUERPO"] != "")
          { 
            $LISTAMETALES[] = $row1["CUERPO"];
          }
        }
        mysql_free_result($resulta);
        $LISTAMETALES1 = array_unique($LISTAMETALES);
      }


  		foreach ($LISTACUERPO1 as $key => $value) {
  			$option .= "<option>$value</option>";
  		}
  		
      if($CATEGORIA == "Mueble De Linea" || $CATEGORIA == "Cajoneras"){
  		  foreach ($LISTAFRENTE1 as $key => $value) {
  			   $option1 .= "<option>$value</option>";
  	 	 }
      }

      if($CATEGORIA == "Superficies Rectas" || $CATEGORIA == "Superficies Curvas"){
        foreach ($LISTATRASCARA1 as $key => $value) {
           $option2 .= "<option>$value</option>";
       }
      }

      if($CATEGORIA == "Superficies Rectas" || $CATEGORIA == "Superficies Curvas"){
        foreach ($LISTAESPESOR1 as $key => $value) {
           $option3 .= "<option>$value</option>";
       }
      }

      foreach ($LISTAMETALES1 as $key => $value) {
        $option4 .= "<option>$value</option>";
      }
  		
  		if($option != "")
  		{
  			$sec .= "<select id='cuerpo".$fila."' class='cuerpo form'><option>Cuerpo</option>".$option."</select>";
  		}

  		if($option1 != "")
  		{
  			$sec1 .= "<select  id='frente".$fila."' class='frente form'><option>Frente</option>".$option1."</select>";
  		}

      if($option2 != "" && $row["POM"] == "l")
      {
        $sec2 .= "<select  id='trascara".$fila."' class='trascara form'><option>Trascara</option>".$option2."</select>";
      }
 
      if($option3 != "" && $row["POM"] == "l")
      {
        $sec3 .= "<select  id='espesor".$fila."' class='espesor form'><option>Espesor</option>".$option3."</select>";
      }
      if($option4 != "")
      {
        $sec4 .= "<select  id='metales".$fila."' class='metales form'><option>Metales</option>".$option4."</select>";
      }

		echo "<tr><td> <input type='hidden' id='idp".$fila."' class='idp form' value='".$row["ID"]."'> <input readonly type='text' id='codigo".$fila."' class='codigo form' value='".$row["CODIGO_PRODUCTO"]."'> </td> <td>".$row["DESCRIPCION"]."</td> <td align='center'> <input readonly type='text' id='pom".$fila."' class='pom form' value='".$row["POM"]."'> </td><td align='center'>".$row["CANTIDAD"]."</td> <td>".$sec.$sec4."</td> <td>".$sec1."</td> <td>".$sec2."</td> <td>".$sec3."</td> <td class='tbl-canto".$fila."'></td></tr>";
		$suma += $row["VALOR_TOTAL"];
    $fila++;


	}
echo "<tr><td align='right' colspan='9'></td></tr>";
}
mysql_free_result($result1);

echo "</table>";
?>

<input type="button" class="btn-ingreso" value="Ingresar">
<input type="hidden" class="txt-filas" value="<?php echo $fila?>">
<input type="hidden" class="txt-radicado" value="<?php echo $rad?>">
</body>
</html>