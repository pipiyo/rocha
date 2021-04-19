<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
ini_set('max_execution_time', 500);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];
mysql_select_db($database_conn, $conn);
$query_registro = "select empleado.rut,empleado.nombres, empleado.apellido_paterno , empleado.apellido_materno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".$CODIGO_USUARIO."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;

 while($row = mysql_fetch_array($result1))
  {
	$nombres = $row["nombres"];
	$apellido = $row["apellido_paterno"];
	$apellido_m = $row["apellido_materno"];
	$rut_usuario= $row["rut"];
	$numero++;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title> Mantenedor Recetas V1.0.0</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />

<link rel="shortcut icon" href="Imagenes/rocha.png">
<link rel="stylesheet" type="text/css" href="Style/style_mantenedores.css" />
<link rel="stylesheet" type="text/css" href="Style/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="Style/font-awesome.css" />
<link rel="styleSheet" href="style/bread.css" type="text/css" >

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/tinybox.js"></script>
<script src='js/breadcrumbs.php'></script>
<script src='js/encabezado-fixed1.js'></script>

<script>

$(document).ready(function(){
  $(".act").dblclick(function(){
      $("#actualizar").parent().text($("#actualizar").val());

      $valor_antiguo = $(this).text();
      $(this).text("");
      $(this).append ("<i class='fa fa-times-circle cerrar-r'></i><br><input type='checkbox' id='masivo' name='masivo'><p id='text-todo'>Todos</p> <textarea class='actualizar' id='actualizar' name='actualizar'>"+$valor_antiguo+"</textarea><input class='enviar-r' value='Up' type='button' id='enviar' name='enviar'>");

      $("#actualizar").css( "width", "96%" );
      $("#actualizar").css( "height", "130px" );
      $("#enviar").css( "width", "100%" );
      $("i").css( "float", "right" );
      $("#masivo").css( "float", "left" );
      $("#text-todo").css( "float", "left" );

      $("#actualizar").focus(); 

      $("i").click(function(){
          $("#actualizar").parent().text($valor_antiguo);
      });

      $(this).keydown(function(e){
          if(e.keyCode == 27)
          {
          $("#actualizar").parent().text($valor_antiguo);
          }
      });

      $("#enviar").click(function(){

        $.ajax({
        type: "POST",
        url: 'ajax-recepta-producto-up.php',
        data: { cod: $('#txt_codigo_proyecto15').val() ,  des : $('#txt_observaciones1').val()  },
        dataType:'html',
          error: function(xhr, status, error) {
          alert(xhr.responseText);
          },
          success: function(data) {
          $('#comentariosOC').val(""+data+"");
      
        }
        });


        $("#actualizar").parent().text($("#actualizar").val());
      });

  });
});



</script>

</head>

<body>


<div class='contenedor1'>
<div id='bread'><div id="menu1"></div></div>	
<h1 class='h-linea'> Descripción Recetas</h1>
</div>

</form>	


<!-- TABLA LINEA -->

<table id="descriscionreceta" class='tabla-receta fixed' rules='all' border='1'>
<?php
$CODIGO_G = $_GET["CODIGO_G"];
$GROSOR = $_GET["GROSOR"];

$fila_sub=0;
$query_registro = "SELECT count(CODIGO_GENERICO_PRODUCTO) as fila FROM `sub_receta` where CODIGO_GENERICO_PRODUCTO = '".$CODIGO_G."' and GROSOR = '".$GROSOR."' group by CODIGO_GENERICO_PIEZA order by count(CODIGO_GENERICO_PRODUCTO) desc  limit 1";	
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result))
  { 
  	$fila_sub = $row["fila"];
  }
mysql_free_result($result);
$colmunas="";
for($i=0;$i<$fila_sub;$i++)
{
	$colmunas.= "<th>Codigo Material </th><th>Descripción Material</th><th>indicador Fijo</th><th>Tipo</th>";
}


$query_registro = "SELECT * FROM `receta` where CODIGO_GENERICO_PRODUCTO = '".$CODIGO_G."' and GROSOR = '".$GROSOR."' ";	
$query_registro .= "ORDER BY CODIGO_GENERICO_PRODUCTO";
$result = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
$fila = 1;
$correlativo=1;

 while($row = mysql_fetch_array($result))
  {  
  	$ID = $row["ID"];
  	$CODIGO_GENERICO_PRODUCTO = $row["CODIGO_GENERICO_PRODUCTO"];
  	$DESCRIPCION_GENERICO_PRODUCTO = $row["DESCRIPCION_GENERICO_PRODUCTO"];
  	$CLASIFICACION= $row["CLASIFICACION"];
  	$CODIGO_GENERICO_PIEZA = $row["CODIGO_GENERICO_PIEZA"];
  	$DESCRIPCION_GENERICA = $row["DESCRIPCION_GENERICA"];
  	$FORMATO = $row["FORMATO"];
  	$RELACION = $row["RELACION"];
  	$CATEGORIA= $row["CATEGORIA"];
  	$LARGO1 = $row["LARGO1"];
  	$ANCHO1= $row["ANCHO1"];
  	$LARGO2 = $row["LARGO2"];
  	$ANCHO2 = $row["ANCHO2"];
  	$LARGO3 = $row["LARGO3"];
  	$ANCHO3 = $row["ANCHO3"];
  	$ALTO = $row["ALTO"];
  	$L = $row["L"];
  	$A = $row["A"];
  	$M2_1 = $row["M2_1"];
  	$M2_2 = $row["M2_2"];
  	$M2_3 = $row["M2_3"];
  	$ML= $row["ML"];
  	$M3 = $row["M3"];
  	$INDICADOR_FRENTE = $row["INDICADOR_FRENTE"];
  	$INDICADOR_TRASCARA= $row["INDICADOR_TRASCARA"];

	if($numero == 0)
	{	
	echo"<thead><tr class='cheader'>
	   <th>Codigo produto</th> 
		 <th>Descripción producto</th>
		 <th>Clasificación</th>
		 <th>Codigo pie</th>
		 <th>Descripción pieza</th>
		 <th>Formato</th>
		 <th>Relacion</th>
		 <th>Categoria</th>
		 <th>Largo1</th>
		 <th>Ancho1</th>
		 <th>Largo2</th>
		 <th>Ancho2</th>
		 <th>Largo3</th>
		 <th>Ancho3</th>
		 <th>Alto</th>
		 <th>L</th>
		 <th>A</th>
		 <th>M2-1</th>
		 <th>M2-2</th>
		 <th>M2-3</th>
		 <th>ML</th>
		 <th>M3</th>
		 <th>Indicador frente</th>
		 <th>Indicador trascara</th>".
		 $colmunas."
	     </tr></thead>
		 ";
    }
$color_fila = "";
if($CLASIFICACION == "PyP")
{
  $color_fila = 'FILA-A';
}
else if($CLASIFICACION == "H")
{
  $color_fila = 'FILA-B';
}
else if($CLASIFICACION == "I")
{
  $color_fila = 'FILA-C';
}
else if($CLASIFICACION == "R")
{
  $color_fila = 'FILA-D';
}

if($GROSOR != "")
{
echo  "<tr class=".$color_fila."><td id='a".$correlativo."' align='center'>".$CODIGO_GENERICO_PRODUCTO." (".$GROSOR.")</td>";
}
else
{
echo  "<tr class=".$color_fila."><td id='a".$correlativo."' align='center'>".$CODIGO_GENERICO_PRODUCTO."</td>";
}
echo  "<td style='display:none' align='left'><input type='text' id='z".$correlativo."' name='z".$correlativo."' value='".$ID."'></td>";
echo  "<td align='left'>".$DESCRIPCION_GENERICO_PRODUCTO."</td>";
echo  "<td align='center'>".$CLASIFICACION."</td>";
echo  "<td  class='act' id='".$DESCRIPCION_GENERICA.$correlativo."' align='center'>".$CODIGO_GENERICO_PIEZA."</td>";
echo  "<td align='left'>".$DESCRIPCION_GENERICA."</td>";
echo  "<td align='center'>".$FORMATO."</td>";
echo  "<td align='center'>".$RELACION."</td>";
echo  "<td align='center'>".$CATEGORIA."</td>";
echo  "<td align='right'>".$LARGO1."</td>";
echo  "<td align='right'>".$ANCHO1."</td>";
echo  "<td align='right'>".$LARGO2."</td>";
echo  "<td align='right'>".$ANCHO2."</td>";
echo  "<td align='right'>".$LARGO3."</td>";
echo  "<td align='right'>".$ANCHO3."</td>";
echo  "<td align='right'>".$ALTO."</td>";
echo  "<td align='right'>".$L."</td>";
echo  "<td align='right'>".$A."</td>";
echo  "<td align='right'>".$M2_1."</td>";
echo  "<td align='right'>".$M2_2."</td>";
echo  "<td align='right'>".$M2_3."</td>";
echo  "<td align='right'>".$ML."</td>";
echo  "<td align='right'>".$M3."</td>";
echo  "<td align='right'>".$INDICADOR_FRENTE."</td>";
echo  "<td align='right'>".$INDICADOR_TRASCARA."</td>";
if($GROSOR == "")
{
$query_registro1 = "SELECT * FROM `sub_receta` where CODIGO_GENERICO_PRODUCTO = '".$CODIGO_G."' and CODIGO_GENERICO_PIEZA = '".$CODIGO_GENERICO_PIEZA."'";	
}
else
{
$query_registro1 = "SELECT * FROM `sub_receta` where CODIGO_GENERICO_PRODUCTO = '".$CODIGO_G."' and GROSOR = '".$GROSOR."' and CODIGO_GENERICO_PIEZA = '".$CODIGO_GENERICO_PIEZA."'";  
}
$result1 = mysql_query($query_registro1, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($result1))
  { 
  	$CODIGO_GENERICO_MATERIAL = $row["CODIGO_GENERICO_MATERIAL"];
  	$DESCRIPCION_GENERICO_MATERIAL = $row["DESCRIPCION_GENERICO_MATERIAL"];
  	$INDICADOR_FIJO = $row["INDICADOR_FIJO"];
  	$CATEGORIA_SUB_RECETA = $row["CATEGORIA_SUB_RECETA"];
  	echo  "<td class='columna-sub' align='left'>".$CODIGO_GENERICO_MATERIAL."</td>";
  	echo  "<td class='columna-sub' align='left'>".$DESCRIPCION_GENERICO_MATERIAL ."</td>";
  	echo  "<td class='columna-sub' align='left'>".$INDICADOR_FIJO ."</td>";
  	echo  "<td class='columna-sub' align='left'>".$CATEGORIA_SUB_RECETA ."</td>";
  }
mysql_free_result($result1);
echo "</tr>";
$numero--;
$fila++;
$correlativo++;
}
mysql_free_result($result);
?>
</table>

</body>
</html>
