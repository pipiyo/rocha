<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];


$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
mysql_select_db($database_conn, $conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Ingreso Control V1.0.0</title>
  <meta name="description" content="free website template" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="ingreso_sin_recargar.js"></script> -->
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>

  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
   <script language = javascript>
               

////////////////////////////////////////////////////////////////////////////

 function validar_monto(evt) {
var keyPressed = (evt.which) ? evt.which : event.keyCode
return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));
}


   $(function() 
  {
		$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
		$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});
		
  });     
  
  


   </script>
</head>
<body>
  <?php
  $ID = $_GET["ID"];
  mysql_select_db($database_conn, $conn);
  $sql779 = "SELECT oc_producto.ID,oc_producto.CORTE,oc_producto.FORMAS,oc_producto.LAMINADO,oc_producto.ENCHAPE,oc_producto.ENCHAPE_CURVO,oc_producto.PERFORADO,oc_producto.ARMADO,oc_producto.LIMPIEZA,oc_producto.RECLAMO from oc_producto where  oc_producto.ID = '".$ID."' "; 
$result779= mysql_query($sql779, $conn) or die(mysql_error());

 while($row = mysql_fetch_array($result779))
  {
     $CORTE = $row["CORTE"];
       $FORMAS = $row["FORMAS"];
         $LAMINADO = $row["LAMINADO"];
           $ENCHAPE = $row["ENCHAPE"];
            $ENCHAPE_CURVO = $row["ENCHAPE_CURVO"];
              $PERFORADO = $row["PERFORADO"];
                $ARMADO = $row["ARMADO"];
                  $LIMPIEZA = $row["LIMPIEZA"];
                    $RECLAMO = $row["RECLAMO"];
                      $ID = $row["ID"];
  }
     mysql_free_result($result779);
  ?>
<div id="main">	
<div id="site_content">
<form enctype="multipart/form-data" action="scriptProduccionOC.php" method="post" name="formulario">

<table width="960" frame="box" rules="all">
<tr>
  <td width="185" rowspan="4" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="" height="26"  align="center"><h3><b> REGISTRO</b></h3></td>
  <td width="86"  align="center"></td>
  <td width="106"  align="center"></td>
</tr>
<tr>
  <td rowspan="3" align="center"><h3><b>  Producción oc</b></h3></td>
  <td height="25" align="center"></td>
  <td align="center"></td>
</tr>
<tr>
  <td height="29" align="center">Fecha</td>
  <td align="center"><input readonly="readonly" id="fecha" name="fecha" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"    value="<?php date('Y-m-d')?>"></td>
</tr>
<tr>
  <td align="center"></td>
  <td align="center"></td>
</tr>
</table>
<br />



  <table  border="1" bordercolor="#ccc" width="960" height="265" rules="all" id= "tabla_descripcion_radicado">

      <tr>
        <th style=" background-color:#fff;height:25px;">Tipo</th>
        <th colspan="3" style=" background-color:#069;color:#fff;" ></th>
        
      </tr>
      
      
      <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">CORTE</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am1"  name="am1" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo number_format($CORTE, 0, ",", ".") ?>" />
        <input   onkeypress="return validar_monto(event)" id="id"  name="id" type ="text" style="display:none;border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo $ID ?>" /></td>
      
      </tr>
      
      
      <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">FORMAS</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am2"  name="am2" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo number_format($FORMAS, 0, ",", ".") ?>" /></td>
      
      </tr>
      
      <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">LAMINADO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am3"  name="am3" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo number_format($LAMINADO, 0, ",", ".") ?>" /></td>
      
      </tr>
      
      <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">ENCHAPE CANTO</td>
      <td width="395" colspan="3" ><input   onkeypress="return validar_monto(event)" id="am4"  name="am4" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%" value="<?php echo number_format($ENCHAPE, 0, ",", ".") ?>" /></td>
      
      </tr>
   
    <tr>
      <td width="133" style=" background-color:#996; height:25px;color:#fff;">ENCHAPE CURVO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am5"  name="am5" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%"   value="<?php echo number_format($ENCHAPE_CURVO, 0, ",", ".") ?>"></td>

     
    </tr>
    <tr>
      <td style=" background-color:#996; height:25px;color:#fff;">PERFORADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am6"  name="am6" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"    value="<?php echo number_format($PERFORADO, 0, ",", ".") ?>"></td>
     
      </tr>
    <tr>
      <td style=" background-color:#996; height:25px;color:#fff;">ARMADO</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am7"  name="am7" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo number_format($ARMADO, 0, ",", ".") ?>"></td>
     
    </tr>
     <tr>
      <td style=" background-color:#996; height:25px;color:#fff;">LIMPIEZA</td>
      <td colspan="3"><input  onkeypress="return validar_monto(event)" id="am8"  name="am8" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:99%"   value="<?php echo number_format($LIMPIEZA, 0, ",", ".") ?>"></td>
     
    </tr>
    <tr>
      <td style=" background-color:#996;height:25px;color:#fff;">RECLAMO</td>
      <td colspan="3" ><input  onkeypress="return validar_monto(event)"  id="am9"  name="am9" type ="text" style="border:#fff 1px solid;height:14px; font-size:10px; width:98%;background-color:#fff;" value="<?php echo number_format($RECLAMO, 0, ",", ".") ?>" /></td>
     
       </td>
     
    
   
   
    </table>
    </br >
 
  <div style="width:960px; padding-bot:10px; ">
   <input  style="float:right;width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;" type="submit" value="Ingresar" /> 
  
  </form>
  </div>
  
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
