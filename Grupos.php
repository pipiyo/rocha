<?php require_once('Conexion/Conexion.php'); 
session_start();
$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$USUARIO = $_SESSION['NOMBRE_USUARIO'];
$NOMBRE_USUARIO= $_SESSION['NOMBRE_USUARIO'];
date_default_timezone_set("Chile/Continental");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Grupos V1.1.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="Muebles y Diseño" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=11" />
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/grupos.js"></script>
      <script src='js/breadcrumbs.php'></script>
    <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>
<body>
<div id='bread'><div id="menu1"></div></div>
  <div id="titulo-grupo"> <h1>Mantenedor Grupo</h1> </div>

<div id="contenedor_grupos" >  <!-- Grupos Usuario 1 --> 
<input class="botongrupos textboxgrupo" type="button"  id="1" name="grupos" value="INFORMATICA" /> 
<div id="contenedor_objetos" ><!-- Grupos Usuario 2 --> 

<input class="botonobjetos"  type="button" id="" name="ver_objetos" value="OBJETOS" >
<div id="contenedor_selec" ><!-- Grupos Usuario 3 -->

<div class="campo_gruposAB"  ><!-- Grupos Usuario 4 -->
<div class="campo_disponibles"><!-- Grupos Usuario 5 -->
<select  class="grupos_disponibles"  name="grupos_disponibles"  id="grupos_disponibles"   multiple="multiple">
</select>
</div>   <!-- Grupos Usuario 5 --> 
<div class="flechas"> <!-- Grupos Usuario 6 --> 
<div class="botoni" type="button" name="" id="" ></div><!-- Grupos Usuario 7 --> 
<div class="botond" type="button" name="" id="" ></div><!-- Grupos Usuario 7 --> 
</div> <!-- Grupos Usuario 6 -->   
<div class="seleccion" >  <!-- Grupos Usuario 8 -->  
<select class="grupos_seleccionados" name="grupos_seleccionados"    id="grupos_seleccionados"  multiple="multiple">
</select>
<div class="contenedor_boton_ingresar"><!-- Grupos Usuario 9 -->  
<input class="botonin"  type="button" id="" name="ingresar" value="INGRESAR" >
</div><!-- Grupos Usuario 9 -->
</div><!-- Grupos Usuario 8 --> 
</div><!-- Grupos Usuario 4 -->
</div><!-- Grupos Usuario 3 -->
<div id="contenedor_objetos_existentes"></div>

</div><!-- Grupos Usuario 2 --> 


<div id="contenedor_subobjetos" ><!-- Grupos Usuario 11 --> 
<input class="botonsubobjetos"  type="button" id="" name="ver_subobjetos" value="SUBOBJETOS" >

<div id="contenedor_subobjetos_existentes" ></div><!-- Grupos Usuario 12 --> 
</div>




<input class="botongrupos textboxgrupo" type="button"  id="2" name="grupos" value="DAM" />
<input class="botongrupos textboxgrupo" type="button"  id="3" name="grupos" value="SILLA" />
<input class="botongrupos textboxgrupo" type="button"  id="4" name="grupos" value="GERENCIA GENERAL" />
<input class="botongrupos textboxgrupo" type="button"  id="5" name="grupos" value="GERENCIA COMERCIAL" />
<input class="botongrupos textboxgrupo" type="button"  id="6" name="grupos" value="GERENCIA OPERACIONES" />
<input class="botongrupos textboxgrupo" type="button"  id="17" name="grupos" value="GERENCIA PRODUCCION" />
<input class="botongrupos textboxgrupo" type="button"  id="7" name="grupos" value="OPERACIONES" />
<input class="botongrupos textboxgrupo" type="button"  id="8" name="grupos" value="DISEÑO" />
<input class="botongrupos textboxgrupo" type="button"  id="9" name="grupos" value="VENTAS" />
<input class="botongrupos textboxgrupo" type="button"  id="10" name="grupos" value="ADMINISTRACION" />
<input class="botongrupos textboxgrupo" type="button"  id="11" name="grupos" value="TECNICA" />
<input class="botongrupos textboxgrupo" type="button"  id="12" name="grupos" value="INSTALACION" />
<input class="botongrupos textboxgrupo" type="button"  id="13" name="grupos" value="PRODUCCION" />
<input class="botongrupos textboxgrupo" type="button"  id="14" name="grupos" value="DESPACHO" />
<input class="botongrupos textboxgrupo" type="button"  id="15" name="grupos" value="BODEGA" />
<input class="botongrupos textboxgrupo" type="button"  id="16" name="grupos" value="ADQUISICIONES" />


</div><!-- Grupos Usuario 1 -->


</body>

</html>