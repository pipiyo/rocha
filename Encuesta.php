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

$CODIGO_TI= $_POST['codigo_radicado'];

mysql_select_db($database_conn, $conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Encuesta V1.0.0</title>
   <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
 <!--  <script type="text/javascript" src="ingreso_sin_recargar.js"></script> -->
  
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src="js/jquery.ui.datepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="Style/ingreso_sin_recargar.css">
   <script language = javascript>
               

   </script>
</head>
<body>
<div id="main">	
<div id="site_content">
<form  action="scriptEncuesta.php" method="post" name="formulario">

<table  width="960" frame="box" rules="all">
<tr>
  <td width="181" rowspan="2" align="center"><img src="Imagenes/LOGOROCHA.jpg" /></td>
  <td width="637" height="26"  align="center"><h3><b> REGISTRO</b></h3></td>
  <td width="126" colspan="2" rowspan="2"  align="center"><input  id="txt_codigo"  name="txt_codigo" type ="text" style="border:#fff 1px solid;height :99% ; font-size:10px; width:98%; text-align:center; font-size:36px;" value="<?php echo $CODIGO_TI ?>" /></td>
  </tr>
<tr>
  <td align="center"><h3><b>ENCUESTA</b></h3></td>
</tr>
</table>

<br />

<table   height="133"  rules="all"  id="ENCUENSTA" width="960" border="1">
  <tr>
    <th width="113">PESO</th>
    <th colspan="6">OBJETIVO COMERCIAL</th>
    <th width="137">PUNTIACION</th>
    </tr>
  <tr>
    <td id="respuestas" style=" background-color:#FDE9D9; height:25px;">50%</td>
    <td id="preguntas" colspan="6" style=" background-color:#FDE9D9; height:25px;">Transformar nuestra empresa en los próximos dos años en el tercer referente en mobiliario de oficinas y la primera en calidad  de servicios. (Lograr una participación en un 100% de las licitaciones en RM Sobre mm 20 y sobre estas adjudicarnos el 10% a lo menos (dinero).</td>
    <td id="respuestas" style=" background-color:#FDE9D9; height:25px;">1,50</td>
  </tr>
  <tr>
    <td  id="respuestas" style="background-color:#EAF1DD">1</td>
    <td id="preguntas" colspan="6" style="background-color:#EAF1DD;">¿Conocemos al adjudicador?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">A traves de tercero</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="uno" value="unoa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="uno" value="unob" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="uno" value="unoc" /></td>
    <td>&nbsp;</td>
    </tr>
    
    
   
    
  <tr>
    <td id="respuestas" style="background-color:#EAF1DD">2</td>
    <td id="preguntas" colspan="6"  style="background-color:#EAF1DD;"> ¿Fuimos invitados a participar al comienzo del proceso?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
     <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Otro hizo el proyecto</td>
    <td  id="respuestas" colspan="2">Solo nos cotizan</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="dos" value="dosa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dos" value="dosb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dos" value="dosc" /></td>
    <td>&nbsp;</td>
    </tr>
    
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">3</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6"> ¿Mercado objetivo?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
     <tr>
     <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Grande mediana,arquitecto o diseñador</td>
    <td  id="respuestas" colspan="2">Pequeñas</td>
    <td  id="respuestas" colspan="2">Persona neutral</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="tres" value="tresa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="tres" value="tresb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="tres" value="tresc" /></td>
    <td>&nbsp;</td>
    </tr>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">4</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6"> ¿Mejora la Imagen de Rocha?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
    <tr>
     <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Mucho</td>
    <td  id="respuestas" colspan="2">Poco</td>
    <td  id="respuestas" colspan="2">Nada</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="cuatro" value="cuatroa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="cuatro" value="cuatrob" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="cuatro" value="cuatroc" /></td>
    <td>&nbsp;</td>
    </tr>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">5</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6"> ¿Posibilidad de nuevos negocios grandes o solo negocio puntual?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>

     <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Negocio pequeños</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="cinco" value="cincoa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="cinco" value="cincob" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="cinco" value="cincoc" /></td>
    <td>&nbsp;</td>
  
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">6</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6"> ¿Tipo de cliente?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
 <tr>

     <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">A</td>
    <td  id="respuestas" colspan="2">B</td>
    <td  id="respuestas" colspan="2">C</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="seis" value="seisa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="seis" value="seisb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="seis" value="seisc" /></td>
    <td>&nbsp;</td>
  
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">7</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6"> ¿Cliente de región?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Zona Centro</td>
    <td  id="respuestas" colspan="2">Centro Norte, Centro Sur </td>
    <td  id="respuestas" colspan="2">Extremo Norte, Extremo Sur</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="siete" value="sietea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="siete" value="sieteb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="siete" value="sietec" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">8</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6">Conocemos a la competencia</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
 <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Solo algunos</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="ocho" value="ochoa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="ocho" value="ochob" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="ocho" value="ochoc" /></td>
    <td>&nbsp;</td>
    </tr>
    
    
    
    <tr>
    <td id="respuestas" style=" background-color:#FDE9D9; height:25px;">40%</td>
    <td id="preguntas" colspan="6" style=" background-color:#FDE9D9; height:25px;">Lograr una facturación anual de mm 4.800 a lo menos)</td>
    <td id="respuestas" style=" background-color:#FDE9D9; height:25px;">1,20</td>
  </tr>
  </tr>
  <tr>
    <td id="respuestas" style="background-color:#EAF1DD">9</td>
    <td id="preguntas"  style="background-color:#EAF1DD" colspan="6">¿Tipo de proyecto?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Solución integral</td>
    <td  id="respuestas" colspan="2">Muebles y sillas</td>
    <td  id="respuestas" colspan="2">Obras civiles</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="nueve" value="nuevea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="nueve" value="nueveb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="nueve" value="nuevec" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td id="respuestas" style="background-color:#EAF1DD">10</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6"> ¿Puestos de trabajo?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
 <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Más de 50</td>
    <td  id="respuestas" colspan="2">Entre 50 y 20</td>
    <td  id="respuestas" colspan="2">Menos 20</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="diez" value="dieza" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="diez" value="diezb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="diez" value="diezc" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">11</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Proyecto con Mobiliario de Linea? </td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Algunos elementos</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="once" value="oncea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="once" value="onceb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="once" value="oncec" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">12</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Cliente requiere Mobiliario Importado?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Algunos muebles</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="doce" value="docea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="doce" value="doceb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="doce" value="docec" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">13</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Monto de proyecto?</td>
    <td  style="background-color:#EAF1DD" >&nbsp;</td>
    </tr>
   <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">20 > MM</td>
    <td  id="respuestas" colspan="2">20 MM < > 10 MM</td>
    <td  id="respuestas" colspan="2">10 > MM</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="trece" value="trecea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="trece" value="treceb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="trece" value="trecec" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">14</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Plazo de Entrega?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
   <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">Si</td>
    <td  id="respuestas" colspan="2">Algunos muebles</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="catorce" value="catorcea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="catorce" value="catorceb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="catorce" value="catorcec" /></td>
    <td>&nbsp;</td>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">15</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6"> ¿Continuidad de proyecto?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
 <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">CP historica</td>
    <td  id="respuestas" colspan="2">CP Mezcla</td>
    <td  id="respuestas" colspan="2">CP nueva</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="quince" value="quincea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="quince" value="quinceb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="quince" value="quincec" /></td>
    <td>&nbsp;</td>
    </tr>
  
  
 <tr>
    <tr>
    <td  id="respuestas" style=" background-color:#FDE9D9; height:25px;">10%</td>
    <td id="preguntas" colspan="6" style=" background-color:#FDE9D9; height:25px;">Desarrollar las areas de Space planning y Project Management para colaborar con arquitectos, diseñadores y decoradores, ayudándolos a solucionar y especificar con anticipación sus proyectos corporativos)</td>
    <td id="respuestas" style=" background-color:#FDE9D9; height:25px;">0,30</td>
  </tr>
  </tr>
  <tr>
    <td id="respuestas" style="background-color:#EAF1DD">16</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Desarrolla el area de Space Planning?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">SI</td>
    <td  id="respuestas" colspan="2">Solo asesoria</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciseis" value="dieciseisa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciseis" value="dieciseisb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciseis" value="dieciseisc" /></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td id="respuestas" style="background-color:#EAF1DD">17</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6"> ¿Desarrolla el area de Project Management?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
  <tr>
     <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">SI</td>
    <td  id="respuestas" colspan="2">Algunos aspectos</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="diecisiete" value="diecisietea" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="diecisiete" value="diecisieteb" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="diecisiete" value="diecisietec" /></td>
    <td>&nbsp;</td>
    </tr>
    </tr>
      <tr>
    <td id="respuestas" style="background-color:#EAF1DD">18</td>
    <td id="preguntas" style="background-color:#EAF1DD" colspan="6">¿Cliente requiere especificar su proyecto con nosotros?</td>
    <td  style="background-color:#EAF1DD">&nbsp;</td>
    </tr>
   <tr>
   <td>&nbsp;</td>
    <td  id="respuestas" colspan="2">SI</td>
    <td  id="respuestas" colspan="2">Algunos elementos</td>
    <td  id="respuestas" colspan="2">No</td>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciocho" value="dieciochoa" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciocho" value="dieciochob" /></td>
    <td id="respuestas" colspan="2"><input type="radio" name="dieciocho" value="dieciochoc" /></td>
    <td>&nbsp;</td>
    </tr>
  
  
    
</table>
<br />
 

  <div style="width:960px; padding-bot:10px; ">
  <input type="submit" value="Subir"  style="float:right;width: 106px; height: 30px; background: #6699FF; color: #ffffff; cursor: pointer; border: 0px;"/>

  </form>
  </div>
      <br />
          <br />  <br />
          



</div> <!--SITE CONTET --><!-- MAIN -->
</body>
</html>
