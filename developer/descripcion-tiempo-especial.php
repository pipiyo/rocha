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

$CODIGO_TI= $_GET['CODIGO_TI'];

$sql1 = "SELECT * FROM solicitud_tiempo_especial WHERE ID = '".$CODIGO_TI."' ORDER BY ID DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
        $ID = $row["ID"];					 
		$CODIGO_RADICADO = $row["CODIGO_PROYECTO"];						 	 	
		$CLIENTE = $row["CLIENTE"];						 	 	
		$RUT_CLIENTE = $row["RUT"];						 	 	
		$PROYECTO = $row["PROYECTO"];
		$LICITACION = $row["LICITACION"];
		$TIPO_LICITACION = $row["TIPO_LICITACION"];
		$NUMERO_PUESTO	 = $row["NUMERO_PUESTO"];
		
							 	 						 	 	
		$OBSERVACIONES = $row["OBSERVACION"];								 	 	
		$FECHA_CONFIRMACION = $row["FECHA_INSTALACION"];					 	 	
		$FECHA_INGRESO = $row["FECHA_INGRESO"];						 	 	
		$FECHA_ENTREGA = $row["FECHA_PROBABLE"];						 	 						 	 	
		$COTIZADOR = $row["ADMINISTRATIVO"];						 	 	
		$DIRECTOR_PROYECTO = $row["DIRECTOR_PROYECTO"];						 	 							 	 	
	    $DIAS = $row["DIAS_PRODUCCION"];						 	 	
		$EMPRESA = $row["EMPRESA"];					 	 	
		$ESTADO = $row["ESTADO"]; 
		
	    $FECHA_RECIBO = $row["FECHA_RECIBO"];						 	 	
		$FECHA_SOLICITUD = $row["FECHA_SOLICITUD"];					 	 	
		$DIAS_VALIDEZ = $row["DIAS_VALIDEZ"]; 
  }

  mysql_free_result($result2);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Tiempo Especial Descripcion V1.0.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="Style/formulario.css" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">

  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

  <!--Calendario -->
  <link rel="stylesheet" href="style/calendario.css" />
  <script src="js/calendario.js"></script>

  <!--Autocompletar -->
  <script src="js/autocompletar.js"></script>


  <!-- breadcrumbs -->
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >

  <script language = javascript>
              
  function validar_monto(evt) {
  var keyPressed = (evt.which) ? evt.which : event.keyCode
  return !((keyPressed !=13) && (keyPressed != 46) && (keyPressed < 48 || keyPressed > 57));
  }

  $(function(){

	$('#txt_cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                      $('#txt_rut').slideUp('slow', function()
					   {
                            $('#txt_rut').val(
                                 ui.item.rut);
							
                       });
                       $('#txt_rut').slideDown('slow');
					   
					    $('#txt_contacto').slideUp('slow', function()
					   {
                            $('#txt_contacto').val(
                                 ui.item.contacto);
							
                       });
                       $('#txt_contacto').slideDown('slow');
					   
					    $('#txt_fono').slideUp('slow', function()
					   {
                            $('#txt_fono').val(
                                 ui.item.fono);
							
                       });
                       $('#txt_fono').slideDown('slow');
                   }
                 });
				  });		
	
  
function dias2()
{
  var fecha1= document.getElementById('txt_fecha_inicior').value;
  var dia1= fecha1.substr(8,2);
  var mes1= fecha1.substr(5,2);
  var mes1a= parseInt(mes1) - 1;
  var anyo1= fecha1.substr(0,4);
  var fecha2= document.getElementById('txt_fecha_entregar').value;
  var dia2= fecha2.substr(8,2);
  var mes2= fecha2.substr(5,2);
  var mes2a= parseInt(mes2) - 1;
  var anyo2= fecha2.substr(0,4);
  var fechita = anyo1+","+mes1+","+dia1;
  var nuevafecha1= new Date(anyo1,mes1a,dia1);
  var nuevafecha2= new Date(anyo2,mes2a,dia2);
  var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
  var dias= Math.floor(Dif/(1000*24*60*60));
  fecha_texto = anyo1+"-"+mes1a+"-"+dia1;
  ms = Date.parse(fecha1);

  diasem =  new Date(ms).getDay();
  dias = dias +1;
  final = 0;
  inicio=0;

  while(inicio < dias)
  {
	 if(diasem == 6 )
	 {
		  diasem=-1;
	 }
	 else if( diasem == 0)
	 {
		
	 }
	 else
	 {
		final++;
	 }
	   inicio++;
	   diasem++;
  }

document.getElementById('txt_dias_rocha').value=final; 
}

function myFunction()
{
  contador = 1;
  while(contador < 50)
  {
    var con = document.getElementById("con" + contador);	
    if(con.style.display == 'none')
    {
	   con.style.display = '';
	   contador = contador + 50;
    }
    contador++;
  }
}



function seleccion()
{
  var licita = document.getElementById('txt_tipo').selectedIndex;
  if(licita == '1')
  {
	  document.getElementById('txt_tipol').disabled = false;
	  document.getElementById('txt_tipol').style.background = '#fff';
    document.getElementById('txt_tipol').style.color = '#000';
	  document.getElementById('txt_tipol').style.border = '#fff 1px solid';
	  document.getElementById('tab').style.background = '#fff';

  }
  else
  {
	  document.getElementById('txt_tipol').disabled = true;
	  document.getElementById('txt_tipol').style.background = '#ccc';
	  document.getElementById('txt_tipol').style.color = '#ccc';
	  document.getElementById('txt_tipol').style.border = '#ccc 1px solid';
	  document.getElementById('tab').style.background = '#ccc';
  }

}


   </script>
</head>
<body>


<div id='bread'><div id="menu1"></div></div>
<form enctype="multipart/form-data" action="scriptTiempoEspecialActualizar.php" method="post" name="formulario">
  <input id="txt_id" name="txt_id" type ="hidden" value="<?php echo $ID?>" />
  <input id="txt_ing" name="txt_ing" type ="hidden"  value="<?php echo $FECHA_INGRESO?>">

<div class="formulario">  
  <h1>Descripción Tiempo Especial</h1>

  <table >
    <tr>
      <td class="color">Rocha</td>
      <td><input  id="txt_radicado"  name="txt_radicado" type ="text" value="<?php echo $CODIGO_RADICADO ?>" /></td>
      <td class="color">Proyecto</td>
      <td><input  id="txt_producto"  name="txt_producto" type ="text" value="<?php echo $PROYECTO?>" /></td>
    </tr>
   
    <tr>
      <td class="color">Cliente</td>
      <td><input id="txt_cliente" name="txt_cliente" type ="text" value="<?php echo $CLIENTE ?>"></td>
      <td class="color">Director Proyecto</td>
      <td ><select name="txt_director" id="txt_director" type ="text" >
          <option><?php echo $DIRECTOR_PROYECTO ?> </option>
          <?php 
          $query_registro = 
          "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
          grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'VEN'";
          $result1 = mysql_query($query_registro, $conn) or die(mysql_error());

          while($row = mysql_fetch_array($result1))
          {
          ?>
          <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
          <?php 
          } mysql_free_result($result1);
          ?> 
          </select></td>
    </tr>

    <tr>
      <td class="color">Rut</td>
      <td><input id="txt_rut" name="txt_rut" type ="text" value="<?php echo $RUT_CLIENTE ?>"></td>
      <td class="color">Tiempo producción</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_cantidad" name="txt_cantidad" type ="text" value="<?php echo $DIAS ?>"></td>
    </tr>

    <tr>
      <td class="color">Licitación</td>
      <td><select onchange="seleccion();" id="txt_tipo" name="txt_tipo" type ="text">
          <option><?php echo $LICITACION ?></option>
          <option>Si</option>
          <option>No</option>
          </select></td>
      <td  class="color">Tipo Licitación</td>
      <?php if($LICITACION == 'Si')
	     { ?>
      <td  id='tab' >
          <select  onchange="seleccion();" id="txt_tipol" name="txt_tipol" type ="text" >
          <option><?php echo $TIPO_LICITACION ?></option>
          <option>Publica</option>
          <option>Privada</option>
          </select>
	     <?php }else{?>
      <td style="background:#ccc" id='tab' >
          <select disabled="disabled" onchange="seleccion();" id="txt_tipol" name="txt_tipol" type ="text" >
          <option></option>
          <option>Publica</option>
          <option>Privada</option>
          </select>
      <?php }?>
      </td>
    </tr>

    <tr>
      <td class="color">Fecha Probable</td>
      <td><input id="txt_ent" name="txt_ent" type ="text" value="<?php echo $FECHA_ENTREGA ?>"></td>
      <td class="color">Fecha Instalación</td>
      <td><input id="txt_con" name="txt_con" type ="text" value="<?php echo $FECHA_CONFIRMACION ?>"></td>
    </tr>

    <tr>
      <td class="color">Gestionador</td>
      <td><select name="txt_adm" id="txt_adm" type ="text" >
          <option> <?php echo $COTIZADOR ?> </option>
          <?php     
          $query_registro = 
          "select empleado.nombres, empleado.apellido_paterno, empleado.apellido_materno from empleado, usuario, grupo, grupo_usuario where empleado.RUT = usuario.RUT and usuario.CODIGO_USUARIO = grupo_usuario.CODIGO_USUARIO and
          grupo_usuario.CODIGO_GRUPO =  grupo.ID_GRUPO and grupo.INICIALES_GRUPO = 'ADQ'";  
          $result1 = mysql_query($query_registro, $conn) or die(mysql_error());

          while($row = mysql_fetch_array($result1))
          {
          ?>
          <option value = "<?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?>" > <?php echo $row['nombres'] . " ".$row['apellido_paterno'] . " ".$row['apellido_materno']; ?> </option>
          <?php 
          } mysql_free_result($result1);
          ?> 
          </select></td>
      <td class="color">Empresa</td>
      <td> <select  id="txt_emp" name="txt_emp" type ="text">
            <option><?php echo $EMPRESA ?> </option>
            <option>Los Conquistadores</option>
            <option>La Dehesa</option>
            <option>Beatriz Gonzalez</option>
            <option>Muebles y Diseños </option>
            <option>Sillas y Sillas</option>
            </select></td>
    </tr>

    <tr>
      <td class="color">Puesto trabajo</td>
      <td ><input onkeypress="return validar_monto(event)"  id="txt_cotizador"  name="txt_cotizador" type ="text" value="<?php echo $NUMERO_PUESTO ?>"></td>
      <td class="color">Estado</td>
      <td><select id="txt_estado" name="txt_estado" >
          <option><?php echo $ESTADO ?></option>
          <option>OK</option>
          <option>Nulo</option>
          <option>En Proceso</option>
          </select></td>
    </tr>

    <tr>
      <td class="color">Motivo</td>
      <td  colspan="4"><input id="txt_mot" name="txt_mot" type ="text"  value="<?php echo $OBSERVACIONES ?>"></td>
    </tr>

    <tr>
      <td class="color">Fecha Entrega Solicitud</td>
      <td><input id="txt_ent1" name="txt_ent1" type ="text" value="<?php echo $FECHA_SOLICITUD?>"></td>
      <td colspan="1"class="color"  ><input id="txt_rec" name="txt_rec" type ="text" value="<?php echo $FECHA_RECIBO ?>"></td>
    </tr>

    <tr>
      <td class="color">Tiempo De Producción</td>
      <td><input id="txt_val" name="txt_val" type ="text" value="<?php echo $DIAS_VALIDEZ ?>"></td>
      <td class="color"></td>
      <td></td>
    </tr>
    </table> <!-- Fín tabla uno -->


    <?php	
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";

	  $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Linea Gerencial'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
	  	$CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
    }
    mysql_free_result($result2); 
  ?>
   <table class="table-separador">
    <tr>
      <td class="color-azul"> Producto </td>
      <td class="color-azul" align="center" > Cantidad </td>
      <td class="color-azul" align="center" colspan="2" > Linea </td>
    </tr>

    <tr>
      <td class="color">Linea Gerencial</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto1"  name="txt_producto1" type ="text"  value="<?php echo $CANTIDAD ?> " /></td>
      <td></td>
      <td>
        <select  name="txt_lineaa1" type ="text" id="select-3" >
          <option><?php echo $LINEA1 ?>  </option>
          <option>Jerez</option>
          <option>Andersen</option>
          <option>Falcon</option>
        </select>

        <select name="txt_lineab1" type ="text" id="select-3" >
          <option><?php echo $LINEA2 ?> </option>
          <option>Jerez</option>
          <option>Andersen</option>
          <option>Falcon</option>
        </select>
        
        <select  name="txt_lineac1" type ="text" id="select-3" >
          <option><?php echo $LINEA3 ?> </option>
          <option>Jerez</option>
          <option>Andersen</option>
          <option>Falcon</option>
          </select></td>
    </tr>
    
  <?php
	
	$CANTIDAD = "";
	$LINEA1 = "";
	$LINEA2 = "";
	$LINEA3 = "";
	
	$sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Panel Piso-Cielo'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
	  $CANTIDAD = $row["CANTIDAD"];
		$LINEA1 = $row["LINEA1"];
		$LINEA2 = $row["LINEA2"];
		$LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>
    <tr>
      <td class="color">Panel Piso-Cielo</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto2"  name="txt_producto2" type ="text" value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td> 
        <select  name="txt_lineaa2" type ="text" id="select-3" >
          <option><?php echo $LINEA1 ?> </option>
          <option>Multiple</option>
          <option>Bozz</option>
        </select>

        <select  name="txt_lineab2" type ="text" id="select-3" >
          <option><?php echo $LINEA2 ?></option>
          <option>Multiple</option>
          <option>Bozz</option>
        </select>
  
        <select  name="txt_lineac2" type ="text" id="select-3" >
          <option><?php echo $LINEA3 ?> </option>
          <option>Multiple</option>
          <option>Bozz</option>
          </select>
        </td>
    </tr>
    
    <?php
	
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
	 $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Panel Of Abierta'";
   $result2 = mysql_query($sql1, $conn) or die(mysql_error());
   while($row = mysql_fetch_array($result2))
  {
	  $CANTIDAD = $row["CANTIDAD"];
		$LINEA1 = $row["LINEA1"];
		$LINEA2 = $row["LINEA2"];
		$LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>

  <tr>
      <td class="color">Panel Of Abierta</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto3"  name="txt_producto3" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td> 

      <select  name="txt_lineaa3" type ="text" id="select-3" >
        <option><?php echo $LINEA1 ?> </option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Critterium</option>
      </select>

      <select  name="txt_lineab3" type ="text" id="select-3" >
        <option><?php echo $LINEA2 ?> </option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Critterium</option>
      </select>

      <select  name="txt_lineac3" type ="text" id="select-3" >
        <option> <?php echo $LINEA3 ?></option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Critterium</option>
      </select></td>
  </tr>  
  
  <?php
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	  $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Baldosas'";
    $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
	    $CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
    }
   mysql_free_result($result2); 
  ?>
  <tr>
    <td class="color" >Baldosas</td>
    <td><input onkeypress="return validar_monto(event)" id="txt_producto4"  name="txt_producto4" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
    <td></td>
    <td> 
      <select name="txt_lineaa4" type ="text" id="select-3" >
        <option><?php echo $LINEA1 ?> </option>
        <option>Tela</option>
        <option>Vidrio</option>
        <option>Laminado Perforado</option>
      </select>
      
      <select name="txt_lineab4" type ="text" id="select-3" >
        <option><?php echo $LINEA2 ?> </option>
        <option>Tela</option>
        <option>Vidrio</option>
        <option>Laminado Perforado</option>
      </select>

      <select name="txt_lineac4" type ="text" id="select-3" >
        <option><?php echo $LINEA3 ?> </option>
        <option>Tela</option>
        <option>Vidrio</option>
        <option>Laminado Perforado</option>
        </select></td>
  </tr>   

  <?php
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
	$sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Superficies'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
	  $CANTIDAD = $row["CANTIDAD"];
		$LINEA1 = $row["LINEA1"];
		$LINEA2 = $row["LINEA2"];
		$LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>
  <tr>
    <td class="color">Superficies</td>
    <td><input onkeypress="return validar_monto(event)" id="txt_producto5"  name="txt_producto5" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
    <td></td>
    <td > 
      <select  name="txt_lineaa5" type ="text" id="select-3">
        <option><?php echo $LINEA1 ?> </option>
        <option>Formica</option>
        <option>Melamina</option>
        <option>Madera</option>
      </select>

      <select name="txt_lineab5" type ="text" id="select-3">
        <option><?php echo $LINEA2 ?> </option>
        <option>Formica</option>
        <option>Melamina</option>
        <option>Madera</option>
      </select>

      <select name="txt_lineac5" type ="text" id="select-3">
        <option><?php echo $LINEA3 ?> </option>
        <option>Formica</option>
        <option>Melamina</option>
        <option>Madera</option>
        </select></td>
  </tr>   
      <?php
	
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
  $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Gabinentes'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
	  $CANTIDAD = $row["CANTIDAD"];
		$LINEA1 = $row["LINEA1"];
		$LINEA2 = $row["LINEA2"];
		$LINEA3 = $row["LINEA3"];
  }
   mysql_free_result($result2); 
  ?>
  <tr>
    <td class="color">Gabinentes</td>
    <td><input onkeypress="return validar_monto(event)" id="txt_producto6"  name="txt_producto6" type ="text" value="<?php echo $CANTIDAD ?>" /></td>
    <td></td>
    <td > 
      <select name="txt_lineaa6" type ="text" id="select-3" >
        <option><?php echo $LINEA1 ?> </option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Melamina</option>
      </select>

      <select name="txt_lineab6" type ="text" id="select-3" >
        <option><?php echo $LINEA2 ?> </option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Melamina</option>
      </select>

      <select name="txt_lineac6" type ="text" id="select-3" >
        <option><?php echo $LINEA3 ?> </option>
        <option>Multiple</option>
        <option>Bozz</option>
        <option>Melamina</option>
        </select></td>
    </tr>

    <?php

		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
	 $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Repisas'";
   $result2 = mysql_query($sql1, $conn) or die(mysql_error());
    while($row = mysql_fetch_array($result2))
    {
	   $CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>
    <tr>
      <td class="color">Repisas</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto7"  name="txt_producto7" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td > 
        <select name="txt_lineaa7" type ="text" id="select-3">
          <option><?php echo $LINEA1 ?> </option>
          <option>Multiple</option>
          <option>Bozz</option>
          <option>Melamina</option>
        </select>

        <select  name="txt_lineab7" type ="text" id="select-3" >
          <option> <?php echo $LINEA2 ?></option>
          <option>Multiple</option>
          <option>Bozz</option>
          <option>Melamina</option>
        </select>
 
        <select name="txt_lineac7" type ="text" id="select-3" >
          <option><?php echo $LINEA3 ?> </option>
          <option>Multiple</option>
          <option>Bozz</option>
          <option>Melamina</option>
          </select></td>
    </tr>   

    <?php
	
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
	 $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Pedestales'";
   $result2 = mysql_query($sql1, $conn) or die(mysql_error());
   while($row = mysql_fetch_array($result2))
  {
	  	$CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>
  
  <tr>
    <td class="color">Pedestales</td>
    <td><input onkeypress="return validar_monto(event)" id="txt_producto8"  name="txt_producto8" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
    <td></td>
    <td> 
      <select name="txt_lineaa8" type ="text" id="select-3">
        <option><?php echo $LINEA1 ?> </option>
        <option>Multiple</option>
        <option>Bozz Metal</option>
        <option>Melamina</option>
      </select>

      <select name="txt_lineab8" type ="text" id="select-3" >
        <option><?php echo $LINEA2 ?> </option>
        <option>Multiple</option>
        <option>Bozz Metal</option>
        <option>Melamina</option>
      </select>

      <select  name="txt_lineac8" type ="text" id="select-3" >
        <option><?php echo $LINEA3 ?> </option>
        <option>Multiple</option>
        <option>Bozz Metal</option>
        <option>Melamina</option>
        </select>
      </td>

  </tr>   
    
    <?php
		$CANTIDAD = "";
		$LINEA1 = "";
		$LINEA2 = "";
		$LINEA3 = "";
	
	 $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Kardex'"; 
   $result2 = mysql_query($sql1, $conn) or die(mysql_error());
   while($row = mysql_fetch_array($result2))
  {
	  	$CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 
  ?>
    <tr>
      <td class="color">Kardex</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto9"  name="txt_producto9" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td > 
            <select  name="txt_lineaa9" type ="text" id="select-3">
              <option><?php echo $LINEA1 ?> </option>
              <option>Multiple</option>
              <option>Bozz Metal</option>
              <option>Melamina</option>
            </select>

            <select  name="txt_lineab9" type ="text" id="select-3" >
              <option><?php echo $LINEA2 ?> </option>
              <option>Multiple</option>
              <option>Bozz Metal</option>
              <option>Melamina</option>
            </select>

            <select name="txt_lineac9" type ="text" id="select-3" >
              <option><?php echo $LINEA3 ?> </option>
              <option>Multiple</option>
              <option>Bozz Metal</option>
              <option>Melamina</option>
              </select></td>
    </tr>   
    
  <?php
	$CANTIDAD = "";
	$LINEA1 = "";
	$LINEA2 = "";
	$LINEA3 = "";
	
	$sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'Folderamas'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
	  	$CANTIDAD = $row["CANTIDAD"];
		  $LINEA1 = $row["LINEA1"];
		  $LINEA2 = $row["LINEA2"];
		  $LINEA3 = $row["LINEA3"];
  }
  mysql_free_result($result2); 

  ?>
  <tr>
      <td class="color">Folderamas</td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto10"  name="txt_producto10" type ="text" value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td > 
        <select name="txt_lineaa10" type ="text" id="select-3">
          <option><?php echo $LINEA1 ?> </option>
          <option>Italiano</option>
          <option>Bozz Metal</option>
          <option>Melamina</option>
        </select>
 
        <select name="txt_lineab10" type ="text" id="select-3">
          <option><?php echo $LINEA2 ?> </option>
          <option>Italiano</option>
          <option>Bozz Metal</option>
          <option>Melamina</option>
        </select>

        <select name="txt_lineac10" type ="text" id="select-3" >
          <option><?php echo $LINEA3 ?> </option>
          <option>Italiano</option>
          <option>Bozz Metal</option>
          <option>Melamina</option>
        </select></td>
  </tr>   


<?php

$CANTIDAD = "";
$LINEA1 = "";
$LINEA2 = "";
$LINEA3 = "";
$NOMBRE_PRODUCTO = '';
  
$sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION1'";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
    $CANTIDAD = $row["CANTIDAD"];
    $LINEA1 = $row["LINEA1"];
    $LINEA2 = $row["LINEA2"];
    $LINEA3 = $row["LINEA3"];
    $NOMBRE_PRODUCTO = $row["NOMBRE_PRODUCTO"];

  }
   mysql_free_result($result2); 
  ?>

   <tr>
      <td><input id="input-1" name="txt_produ11" type ="text"  value="<?php echo $NOMBRE_PRODUCTO ?>" ></td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto11"  name="txt_producto11" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td> 
        <input name="txt_lineaa11" type ="text" id="input-3" value='<?php echo $LINEA1 ?>' >
        <input name="txt_lineab11" type ="text" id="input-3" value='<?php echo $LINEA1 ?>' >
        <input name="txt_lineac11" type ="text" id="input-3" value='<?php echo $LINEA1 ?>' >
      </tr>
    
    <tr>
    
  <?php
    $CANTIDAD = "";
    $LINEA1 = "";
    $LINEA2 = "";
    $LINEA3 = "";
    $NOMBRE_PRODUCTO = '';
  
   $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION2'";
   $result2 = mysql_query($sql1, $conn) or die(mysql_error());
   while($row = mysql_fetch_array($result2))
   {
    $CANTIDAD = $row["CANTIDAD"];
    $LINEA1 = $row["LINEA1"];
    $LINEA2 = $row["LINEA2"];
    $LINEA3 = $row["LINEA3"];
    $NOMBRE_PRODUCTO = $row["NOMBRE_PRODUCTO"];
   }
   mysql_free_result($result2); 
  ?>

   <tr>
      <td><input   id="input-1" name="txt_produ12" type ="text" value="<?php echo $NOMBRE_PRODUCTO ?>" ></td>
      <td><input onkeypress="return validar_monto(event)" id="txt_producto12"  name="txt_producto12" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
      <td></td>
      <td> 

      <input id="input-3" name="txt_lineaa12" type ="text" value='<?php echo $LINEA1 ?>' >
      <input id="input-3" name="txt_lineab12" type ="text" value='<?php echo $LINEA1 ?>' >
      <input id="input-3" name="txt_lineac12" type ="text" value='<?php echo $LINEA1 ?>' >
  </tr>
  <tr>
  <?php
    $CANTIDAD = "";
    $LINEA1 = "";
    $LINEA2 = "";
    $LINEA3 = "";
    $NOMBRE_PRODUCTO = '';
  
  $sql1 = "SELECT * FROM descripcion_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."' AND PRODUCTO = 'OBSERVACION3'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
    $CANTIDAD = $row["CANTIDAD"];
    $LINEA1 = $row["LINEA1"];
    $LINEA2 = $row["LINEA2"];
    $LINEA3 = $row["LINEA3"];
    $NOMBRE_PRODUCTO = $row["NOMBRE_PRODUCTO"];

  }
   mysql_free_result($result2); 
  ?>
  <tr>
    <td><input   id="input-1" name="txt_produ13" type ="text" value="<?php echo $NOMBRE_PRODUCTO ?>" ></td>
    <td><input onkeypress="return validar_monto(event)" id="txt_producto13"  name="txt_producto13" type ="text"  value="<?php echo $CANTIDAD ?>" /></td>
    <td></td>
    <td> 
      <input id="input-3" name="txt_lineaa13" type ="text" value='<?php echo $LINEA1 ?>' >
      <input id="input-3" name="txt_lineab13" type ="text" value='<?php echo $LINEA1 ?>' >
      <input id="input-3" name="txt_lineac13" type ="text" value='<?php echo $LINEA1 ?>' >
    </tr>
  <tr>

  </table>
      
       </br >
       
       
  <?php
	
	$PERFILERIA = "";
	$FORMICA = "";
  $MELAMINA = "";
	$MADERA = "";
  $VIDRIO = "";
	$TELA_BALDOSAS = "";
	$TELA_BALDOSAS_C = "";
	$TELA_SILLA = "";
  $TELA_SILLA_C = "";
	$TELA_PANELES = "";
	$TELA_PANELES_C = "";	
	
	$sql1 = "SELECT * FROM acabados_tiempo_especial WHERE ID_TIEMPO_ESPECIAL = '".$ID."'";
  $result2 = mysql_query($sql1, $conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  {
	  $PERFILERIA = $row["PERFILERIA"];
		$FORMICA = $row["FORMICA"];
		$MELAMINA = $row["MELAMINA"];
		$MADERA = $row["MADERA"];
		$VIDRIO = $row["VIDRIO"];
		$TELA_BALDOSAS = $row["TELA_BALDOSAS"];
		$TELA_BALDOSAS_C = $row["TELA_BALDOSAS_C"];
		$TELA_SILLA = $row["TELA_SILLA"];
		$TELA_SILLA_C = $row["TELA_SILLA_C"];
		$TELA_PANELES = $row["TELA_PANELES"];
		$TELA_PANELES_C = $row["TELA_PANELES_C"];
  }
  mysql_free_result($result2); 
  ?>      
       
  <table>
    <tr>
      <td class='color-azul' align="center" colspan="5" > Acabados </td>
    </tr>
    <tr>
      <td class="color" >Perfileria</td>
      <td><input  id="txt_perfileria"  name="txt_perfileria" type ="text" value="<?php echo $PERFILERIA ?>" /></td>
      <td align="center" class="color-azul">Tapiz</td>
      <td align="center" class="color-azul">Referencia</td>
      <td align="center" class="color-azul">Color</td>
    </tr>
      
    <tr>
      <td class="color" >Fórmica</td>
      <td><input  id="txt_formica"  name="txt_formica" type ="text" value="<?php echo $FORMICA ?>" /></td>
      <td align="center" class="color">Tela Baldosas</td>
      <td align="center">
        <select  id="txt_referencia1" name="txt_referencia1" type ="text">
          <option><?php echo $TELA_BALDOSAS ?> </option>
          <option>Glock</option>
          <option>Escoral Plus</option>
          <option>Venezia</option>
          <option>Atlas TNT</option>
          <option>Génova</option>
          <option>Vento</option>
          <option>Retrait</option>
          <option>Renna</option>
          <option>Pegasso</option>
          <option>Venneto</option>
          <option>Silvana</option>
          <option>Chair</option>
          <option>Michigan</option>
          <option>Tilbury</option>
          <option>Coventry</option>
          <option>Tacto Plus</option>
          <option>Lanna VC</option>
          <option>Marroqui</option>
        </select>
      </td>
      <td align="center"><input  id="txt_color1"  name="txt_color1" type ="text" value="<?php echo $TELA_BALDOSAS_C ?>" /></td>
    </tr>

    <tr>
      <td class="color">Melamina</td>
      <td><input  id="txt_melamina"  name="txt_melamina" type ="text"  value="<?php echo $MELAMINA ?>" /></td>
      <td align="center" class="color">Tela Sillas</td>
      <td align="center">
        <select  id="txt_referencia2" name="txt_referencia2" type ="text">
          <option><?php echo $TELA_SILLA ?> </option>
          <option>Glock</option>
          <option>Escoral Plus</option>
          <option>Venezia</option>
          <option>Atlas TNT</option>
          <option>Génova</option>
          <option>Vento</option>
          <option>Retrait</option>
          <option>Renna</option>
          <option>Pegasso</option>
          <option>Venneto</option>
          <option>Silvana</option>
          <option>Chair</option>
          <option>Michigan</option>
          <option>Tilbury</option>
          <option>Coventry</option>
          <option>Tacto Plus</option>
          <option>Lanna VC</option>
          <option>Marroqui</option>
        </select>
      </td>
      <td  align="center"><input  id="txt_color2"  name="txt_color2" type ="text"  value="<?php echo $TELA_SILLA_C ?>" /></td>
    </tr>
      
    <tr>
      <td class="color" >Madera</td>
      <td ><input  id="txt_madera"  name="txt_madera" type ="text"  value="<?php echo $MADERA ?>" /></td>
      <td align="center" class="color">Tela Paneles</td>
      <td align="center">
        <select  id="txt_referencia3" name="txt_referencia3" type ="text" >
          <option> <?php echo $TELA_PANELES ?></option>
          <option>Glock</option>
          <option>Escoral Plus</option>
          <option>Venezia</option>
          <option>Atlas TNT</option>
          <option>Génova</option>
          <option>Vento</option>
          <option>Retrait</option>
          <option>Renna</option>
          <option>Pegasso</option>
          <option>Venneto</option>
          <option>Silvana</option>
          <option>Chair</option>
          <option>Michigan</option>
          <option>Tilbury</option>
          <option>Coventry</option>
          <option>Tacto Plus</option>
          <option>Lanna VC</option>
          <option>Marroqui</option>
        </select>
      </td>
      <td align="center"><input  id="txt_color3"  name="txt_color3" type ="text"  value="<?php echo $TELA_PANELES_C ?>" /></td>
    </tr>
      
    <tr>
      <td class="color">Vidrio</td>
      <td><input  id="txt_vidrio"  name="txt_vidrio" type ="text"  value="<?php echo $VIDRIO?>" /></td>
      <td align="center" class="color"></td>
      <td align="center"></td>
      <td align="center"></td>
      </tr>
      
      
      
      </table>
  

   <input class="boton act" type="submit" value="Actualizar" /> 
  

  </form>

  
          


</body>
</html>
