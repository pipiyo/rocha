<?php require_once('Conexion/Conexion.php');

session_start();

if (!$_SESSION)
{
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$CODIGO_USUARIO = $_SESSION['CODIGO_USUARIO'];
$GRUPOS = $_SESSION['GRUPOS'];

mysql_select_db($database_conn, $conn);

$query_TODOS = "";

$query_registro = "select empleado.nombres, empleado.apellido_paterno from empleado, usuario where empleado.rut = usuario.rut and usuario.codigo_usuario = '".($CODIGO_USUARIO)."'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_assoc($result1))
  {
  $nombres = $row["nombres"];
  $apellido = $row["apellido_paterno"];
  $numero++;
  }
mysql_free_result($result1);

$query = "SELECT * FROM grupo_usuario, usuario, grupo where grupo.ID_GRUPO = grupo_usuario.CODIGO_GRUPO and grupo_usuario.CODIGO_USUARIO = usuario.CODIGO_USUARIO and usuario.CODIGO_USUARIO = '".$CODIGO_USUARIO."'";
  $result2 = mysql_query($query, $conn) or die(mysql_error());
  $numero = 0;
  $GRP = "";
  $GRP1 = "";
  $GRP2 = "";
  $GRP3 = "";
 while($row = mysql_fetch_assoc($result2))
  {
    if($numero == 0)
      {
        $GRP = $row["INICIALES_GRUPO"];
      }
      if($numero == 1)
      {
        $GRP1 = $row["INICIALES_GRUPO"];
      }
      if($numero == 2)
      {
        $GRP2 = $row["INICIALES_GRUPO"];
      }
      if($numero == 3)
      {
        $GRP3 = $row["INICIALES_GRUPO"];
      } 
        $numero++;
  }
mysql_free_result($result2);



if (isset($_POST["valor"]))
{
$valor = $_POST["valor"];
}
else if (isset($_GET["valor"]))
{
$valor = $_GET["valor"];
}

$CODIGO_OC = 0;
$sql1 = "SELECT * FROM orden_de_compra ORDER BY CODIGO_OC DESC LIMIT 1";
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_assoc($result2))
  {
  $CODIGO_OC = $row["CODIGO_OC"];
  $numero++;
  }


if(isset($_POST['desha']))
{
$checked = 'checked';
}
else
{
$checked = '';
}


if(isset($_POST['gengen']))
{
$checked2 = 'checked';
}
else
{
$checked2 = '';
}




?>
<!DOCTYPE html>
<html>

<head>
  <title>Bodega V1.2.0</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />

  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <link rel="stylesheet" type="text/css" href="Style/bodega.css" />
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" >
  <link rel="stylesheet" href="style/estilopopup-new2.css" />
  <link rel="stylesheet" href="style/font-awesome.min.css" />
  <link rel="stylesheet" href="style/font-awesome.css" />

  <script type="text/javascript" src="js/tinybox.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script src='js/breadcrumbs.php'></script>
  <script src='js/Bloqueo.php'></script>
  <script src='js/bodega.js'></script>

  <link rel="styleSheet" href="style/bread.css" type="text/css" >
</head>
<body>

<div id='bread'><div id="menu1"></div></div>
<div class="form-bod clearfix">
<!-- Form Excel -->
<form action="ExcelInformeProducto.php" method="post" target="_blank" id="FormularioExportacion">
 <input  type="hidden" id="datos" name="datos" />
</form>

 <form  method="POST" name="formulario" action="producto2GEN.php" / >   

  <h1> Bodega </h1>   
  <input class="textbox-bodega" placeholder="Codigo" class='textbox' type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" />
  <input class="textbox-bodega" placeholder="Descripción" class='textbox' type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" />
  <select class="textbox-bodega" class='textbox' id = "familias" name = "familias">
  <option value="">Categoria</option>
  <?php
    $ini = ""; 
    foreach ($GRUPOS as $GI => $GG) {        
      switch ($GG) {
        case "9":
          echo"<option> Sillas </option>
            <option> Laminados </option>
            <option>Almacenamiento</option>";
            $ini = "comercial";
        break;
        case "3":
          echo"<option> Sillas </option>
            <option> Tornillos </option>
            <option> Embalaje </option>
            <option> Baldosas Tapizadas </option>
            <option> Baldosas Laminadas </option>
            <option> Tela </option>
            <option>Almacenamiento</option>";
            $ini = "sillas";
        break;
        case "14":
            echo"<option> Accesorios </option>
            <option> ACTIU </option>
            <option>Almacenamiento</option>
            <option> Cajoneras </option>
            <option> Cristales </option>
            <option> Embalaje </option>
            <option> Full Space </option>
            <option> Mantencion </option>
            <option> Mueble De Linea </option>
            <option> Paneleria </option>
            <option> Producto Especial</option>
            <option> Quincalleria </option>
            <option> Servicios </option>
            <option> Sillas </option>
            <option> Soportes </option>
            <option> Superficies Curvas </option>
            <option> Superficies Rectas </option>";
            $ini = "despacho";
        break;
        }
  }
  if($ini == "")
  { 
            echo"<option> Accesorios </option>
            <option> Accesorios Paneleria</option>
            <option> ACTIU </option>
            <option> Articulo Electrico </option>
            <option> Almacenamiento</option>
            <option> Almacenamiento Metalico</option>
            <option> Baldosas Melamina </option>
            <option> Baldosas Metalica </option>
            <option> Baldosas Laminadas </option>
            <option> Baldosas Tapizadas</option>
            <option> Baldosas Vidrio </option>
            <option> Base </option>
            <option> Brazo </option>
            <option> Cajoneras </option>
            <option> Cerraduras </option>
            <option> Correderas </option>
            <option> Cristales </option>
            <option> Cubiertas </option>
            <option> Embalaje </option>
            <option> Full Space </option>
            <option> Laminados </option>
            <option> Maderas </option>
            <option> Mantencion </option>
            <option> Maquinas y Herramientas </option>
            <option> Mepal </option>
            <option> Mueble De Linea </option>
            <option> Muebles Metalicos </option>
            <option> Paneleria </option>
            <option> Partes y Piezas </option>
            <option> Producto </option>
            <option> Producto Especial</option>
            <option> Quincalleria </option>
            <option> Quimicos </option> 
            <option> Repiceria </option>
            <option> Servicios </option>
            <option> Seguridad </option>
            <option> Sillas </option>
            <option> Soportes </option> 
            <option> Soportes Metalicos </option> 
            <option> Superficies Curvas </option>
            <option> Superficies Rectas </option>
            <option> Tapacantos </option>
            <option> Tela </option>
            <option> Tiradores </option>
            <option> Tornillos </option>";
};
?>
</select>
  <input class="textbox-bodega1" type="submit" name = "buscarR" id='buscar' value="Buscar">
  <p><input  type='checkbox' <?php echo $checked2 ?> name='gengen' id='gengen' /> Solo Genericos: </p>
  <p><input type='checkbox' <?php echo $checked ?> id='desha' name='desha' > Deshabilitados</p>
  <a class="a1" class="link-bod" target='_blank' href="IngresoProducto.php" >
    <i class="fa fa-plus"></i> Nuevo Produto
  </a>
  <form action="Excel_Cuadro_Tablas.php" method="POST" target="_blank" id="FormularioExportacion">
    <input  type="hidden" id="datos" name="datos" />
  </form>
  <button type="button" class='tablas link-bod' value='producto'>
    <i class="fa fa-file-excel-o"></i> Exportar a excel
  </button>

  <a class ="caja" target='_blank' href="ProductoQuiebre.php"> Quiebre</a>
  <a class ="caja" target='_blank' href="ProductoQuiebreDisponible.php?valor=0"> Quiebre Disponible</a>
  <?php  if($GRP == "GG" || $GRP1 == "GG" || $GRP2 == "GG" || $GRP3 == "GG" || $GRP == "INF" || $GRP1 == "INF" || $GRP2 == "INF" || $GRP3 == "INF" )
  { ?>
  <a class="caja"  target='_blank' href="ProductoValorizado.php?valor=0">Bodega Valorizada</a>
  
<?php }?>
</div>

<table class="tabla-bodega">
<tr>
  <th class="tam1" >Código</th>
  <th class="tam3" >Herencia</th>
  <th class="tam2" >Descripción</th>
  <th class="tam3" >Categoria</th>
  <?php if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { ?>
  <th class="tam3">OC</th>
  <?php } ?>
  <th class="tam3">Stock</th>
  <th class="tam3">Flujo</th>
  <th class="tam3">OC En Transito</th>
  <th class="tam3">Vale Emitidos</th>
  <th class="tam3">Stock Contable</th>
  <th class="tam3">Stock Disponible</th>
  <th class="tam3">Formato</th>
  <th class="tam3">Minimo</th>
  <th class="tam3">Maximo</th>
  <?php if($CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  { ?>
  <th class="tam3">Ingreso</th>
  <th class="tam3">Egreso</th>
  <?php } ?>
  </tr>
<?php
ini_set('max_execution_time', 500);
$BUSCAR_CODIGO = "";
$BUSCAR_DESCRIPCION = ""; 
$CODIGO_PRODUCTO ="";
$familias="";
/*Listado Materiales*/
if (isset($_POST["buscar"])) 
{
$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_POST['buscar_usuario']; 
$familias = $_POST['familias'];
if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '1'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '1' ";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0' ";
}

if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}

if(isset($_POST['gengen']))
{
$query_registro .= " and FAMILIA = 'GENERICO' ";
$query_TODOS .= " and FAMILIA = 'GENERICO' ";
}

switch ($ini) {
      case "comercial":
if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}
else
{
$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";
}
        break;
        case "sillas":   
if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}else{
$query_registro .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";
}
        break;
        case "despacho":
if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}else{
$query_registro .= "and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
}
        break;
default:
if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}
};





$query_registro .= " order by DESCRIPCION ASC limit 500";

$pagina = 0;

}/*FIN DESDE FUERA */ 




/*COMIENZO DESDE DENTRO*/

else if (isset($_POST["buscarR"]))
{


$BUSCAR_CODIGO = $_POST['buscar_codigo'];
$BUSCAR_DESCRIPCION = $_POST['buscar_usuario']; 
$familias = $_POST['familias'];

mysql_select_db($database_conn, $conn);

if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '1'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '1' ";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0' ";
}

if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}



if(isset($_POST['gengen']))
{
$query_registro .= " and FAMILIA = 'GENERICO' ";
$query_TODOS .= " and FAMILIA = 'GENERICO' ";
}


switch ($ini) {
      case "comercial":

if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";
}
        break;

        case "sillas":   

if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{
$query_registro .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";
}

        break;

        case "despacho":

if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";

}
        break;

default:

if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}

};

$query_registro .= " order by DESCRIPCION ASC limit 500";

$pagina = 0;

}////////////FIN DESDE DENTRO
//////////////////////////
///////////////////////



///////////////COMIENZO POR PAGINA
/////////////////////////////////////
/////////////////////////////////////
else if (isset($_GET["pagina"]) || isset($_GET["buscar_codigo"]) )

{

if (isset($_GET["pagina"]))
{
$pagina = $_GET['pagina'];
$CORTEy = $_GET['pagina'];
}
else
{
$CORTEy = 0;
$pagina = 0;
}
$BUSCAR_CODIGO = $_GET['buscar_codigo'];
if (isset($_GET["BUSCAR_DESCRIPCION"]))
{
$BUSCAR_DESCRIPCION = $_GET['BUSCAR_DESCRIPCION'];  
}
else
{
  $BUSCAR_DESCRIPCION = "";  
}
$familias = $_GET['familias'];

mysql_select_db($database_conn, $conn);

if(isset($_POST['desha']))
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '1'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND  DESHABILITAR = '1' ";
}
else
{
$query_registro = "SELECT * FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0'";
$query_TODOS = "SELECT COUNT(*) AS TODOS FROM PRODUCTO WHERE CODIGO_GENERICO = '' AND DESHABILITAR = '0' ";
}

if($BUSCAR_CODIGO != "")
{
$query_registro .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
$query_TODOS .= " and CODIGO_PRODUCTO = '".$BUSCAR_CODIGO."' ";
}

if($BUSCAR_DESCRIPCION  != "")
{
$query_registro .= " and  DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
$query_TODOS .= " and DESCRIPCION LIKE '%".($BUSCAR_DESCRIPCION)."%' ";
}



if(isset($_POST['gengen']))
{
$query_registro .= " and FAMILIA = 'GENERICO' ";
$query_TODOS .= " and FAMILIA = 'GENERICO' ";
}





switch ($ini) {
      case "comercial":

if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

if($BUSCAR_DESCRIPCION  != "" || $BUSCAR_CODIGO != "")

$query_registro .= " and CATEGORIA IN('Laminados','sillas') ";
$query_TODOS .= " and CATEGORIA IN('Laminados','sillas') ";

}

        break;

        case "sillas":   

if($familias != "" )
{

$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= "and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";
$query_TODOS .= " and CATEGORIA IN('Embalaje','sillas','Tornillos','Baldosas Tapizadas','Baldosas Laminadas','Tela') ";

}

        break;

        case "despacho":

if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";

}else{

$query_registro .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";
$query_TODOS .= " and CATEGORIA IN('Accesorios','ACTIU','Cajoneras','Cristales','Embalaje','Full Space','Mantencion','Mueble De Linea','Paneleria','Producto Especial','Quincalleria','Servicios','Sillas','Soportes','Superficies Curvas','Superficies Rectas') ";

}

        break;

default:

if($familias != "" )
{
$query_registro .= " and CATEGORIA = '".$familias."' ";
$query_TODOS .= " and CATEGORIA = '".$familias."' ";
}

};

$CORTEy = $CORTEy * 500;

$CORTEx =  500; 

$query_registro .= " order by DESCRIPCION ASC limit ".$CORTEy.",".$CORTEx." ";

}////////////FIN POR PAGINA
//////////////////////////////
///////////////////////////

$contador1 = 0;
$contador2 = 0;
$numero = 0;

$resulTODOS = mysql_query($query_TODOS, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($resulTODOS))
  {

$TODOS = $row['TODOS'];

}
mysql_free_result($resulTODOS);

$IN = " IN(";
$LISTACOD = array();
$LISTASTOCK = array();
$LISTASTOCKmin = array();
$result = mysql_query($query_registro, $conn) or die(mysql_error());
 while($row = mysql_fetch_assoc($result))
  {
  $CODIGO_PRODUCTO = $row["CODIGO_PRODUCTO"];
  $DESCRIPCION = $row["DESCRIPCION"];
  $STOCK_ACTUAL = $row["STOCK_ACTUAL"];
  $UNIDAD_DE_MEDIDA = $row["UNIDAD_DE_MEDIDA"];
  $FORMATO = $row["FORMATO"];
  $gestion = $row["GESTION"];
  $Dimension = $row["DIMENSION"];
  $RELACION = $row["RELACION"];
  $STOCK_MINIMO = $row["STOCK_MINIMO"];
  $STOCK_MAXIMO = $row["STOCK_MAXIMO"];
  $PRECIO = $row['PRECIO']; 
  $PRECIO_SIN_DESCUENTO = $row['PRECIO_SIN_DESCUENTO'];
  $CATEGORIA1 = $row['CATEGORIA'];
  $RUTA = $row['RUTA'];
  $MENSAJE = 2;
  $TOTALITI = 0;


  $LISTACOD[] = $row["CODIGO_PRODUCTO"];
  $LISTASTOCK[] = array( 'COD' => $row["CODIGO_PRODUCTO"] ,
  'STOCK' => $row["STOCK_ACTUAL"] ); 
  $LISTASTOCKmin[] = $row["STOCK_MINIMO"];
$IN .= "'".$row["CODIGO_PRODUCTO"]."',";


  if($contador1 == 15)
  {
echo"<tr>
<th>Código</th>
<th>Herencia</th>
<th>Descripción</th>
<th>Categoria</th>";
if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3') 
 { 
 echo"
<th>OC</th>
";
}
echo"<th>Stock</th>
<th>Flujo</th>
<th>OC En Transito</th>
<th>Vale Emitidos</th>
<th>Stock Contable</th>
<th>Stock Disponible</th>
<th>Formato</th>
<th>Minimo</th>
<th>Maximo</th>";
  if($CODIGO_USUARIO == '1' ||$CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  {
    echo" 
<th>Ingreso</th>
<th>Egreso</th>";
  }
  echo"
</tr>";
    $contador1 = 0;
  }

if($GRP == "INF" && $RUTA != "")
{
     echo "<tbody><tr class='".$row['CODIGO_PRODUCTO']."' id='palo".$contador2."' ><td  style='background-color:#A9E2F3;'> <a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
     $CODIGO_PRODUCTO . "</a> <input style='display:none'  class='form1'  id =cod".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' />
                              <input style='display:none' disabled='disabled'  class='form1'  id =code".$numero."  name =code".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' /></td>";

}
else
{

     echo "<tbody><tr class='".$row['CODIGO_PRODUCTO']."' id='palo".$contador2."' ><td> <a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
     $CODIGO_PRODUCTO . "</a> <input style='display:none'  class='form1'  id =cod".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' />
                              <input style='display:none' disabled='disabled'  class='form1'  id =code".$numero."  name =code".$numero."  type = 'text' value = '".$CODIGO_PRODUCTO."' /></td>";

}

if ($row["FAMILIA"] == 'GENERICO') {

echo "<td align='center' class='desplegar' ><i class='fa fa-chevron-circle-down fa-lg'></i></td>";

}else{

echo "<td></td>";

}

    echo "<td id = 'des'> <a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). ">" . 
     $DESCRIPCION . "</a> <input style='display:none;' class='form8' id =des".$numero." type = 'text' value = '".$DESCRIPCION."' /></td>";

    echo "<td align='center' id = 'cat'>".$CATEGORIA1."</td>";

 if($CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32'|| $CODIGO_USUARIO == '2'|| $CODIGO_USUARIO == '3')  { 

if ( array_key_exists($row["CODIGO_PRODUCTO"], $_SESSION['prooc']) ) {

    echo "<td align='center' style='background-color:#FF8A51;' id='tdcir".$row["CODIGO_PRODUCTO"]."' class='circulo' title='".$row["DESCRIPCION"]."' > OC </td>";

}else{

    echo "<td align='center' style='background-color:#FFF;' id='tdcir".$row["CODIGO_PRODUCTO"]."' class='circulo' title='".$row["DESCRIPCION"]."' > OC </td>";

}

 }

    echo "<td align='right' id='STOCKK".$numero."' >" . 
      $STOCK_ACTUAL . "</td>";

  echo "<td align='right' id=flujo".$numero." ></td>";
  echo "<td align='right' id=trans".$numero." ><a target='_blank' href=ListadoOCTransito.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "></a></td>
  ";

  echo "<td align='right' id=valee".$numero."><a target='_blank' href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO=" .urlencode($CODIGO_PRODUCTO). "></a></td>";

  echo "<td align='right' id=cont".$numero." ></td>";
  echo "<td align='right' id=disp".$numero." ></td>";
  echo "<td align='center'>" . 
      $FORMATO. "<input style='display:none;' class='form8'  id =um".$numero." type = 'text' value = '".$UNIDAD_DE_MEDIDA."' /></td>";

    echo "<td align='right'>" . 
      $STOCK_MINIMO. "<input style='display:none;' class='form4'  id =prec".$numero." type = 'text' value = '".$PRECIO."' /></td>"; 
     echo "<td align='right'>" . 
      $STOCK_MAXIMO.   "</td>";
  if($CODIGO_USUARIO == '19' || $CODIGO_USUARIO == '1' || $CODIGO_USUARIO == '20' || $CODIGO_USUARIO == '14'|| $CODIGO_USUARIO == '32' || $CODIGO_USUARIO == '24'|| $CODIGO_USUARIO == '126')  { 
     
  echo "<td align='center'><a class='mas' target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stockpositivo'>
         +      </a><input style='display:none;' class='form6'  id =precl".$numero." type = 'text' value = '".$PRECIO_SIN_DESCUENTO ."' /></td>"; 
    echo "<td align='center'><a class-'menos' target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO=$CODIGO_PRODUCTO&MENSAJE=$MENSAJE' id = 'stocknegativo'>
         -      </td></tr></tbody>";   

  }

      $numero++;  
      $contador1++;
      $contador2++;

  }

  echo "<tr class=\"alt\"><td colspan=\"15\"><font face=\"verdana\"><b>Numero: " . $numero . 
      "</b> <input style='display:none' type='text' value='".$numero ."' id='cuentaprime' name='cuentaprime'/></font></td></tr>";
  mysql_free_result($result);

if($IN != " IN("){

$IN = substr( $IN , 0, -1);
$IN .= ")";
$LISTA = array();
$LISTACANT = array();
$query_registro = "SELECT oc_producto.CANTIDAD_RECIBIDA,oc_producto.CANTIDAD,producto.CODIGO_PRODUCTO  FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while( $row = mysql_fetch_assoc($result1) )
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANT_RES" =>  $row["CANTIDAD_RECIBIDA"],
                  "CANT" =>  $row["CANTIDAD"] );
  }
mysql_free_result($result1);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANT_RES = "";
$CANT = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $CANT_RES += $LISTA[$llave]["CANT_RES"];
          $CANT += $LISTA[$llave]["CANT"];
      }
    }
$CANT = $CANT - $CANT_RES;
    $LISTACANT[] = array( "COD" =>  $value,
                  "CANT" =>  $CANT );
}

unset($LISTA);
$LISTA = array();
$LISTAEGRESO = array();

$query_registro = "SELECT  actualizaciones.EGRESO,actualizaciones_general.CODIGO_PRODUCTO FROM actualizaciones_general, 
actualizaciones,producto where actualizaciones.CODIGO_ACTUALIZACIONES = actualizaciones_general.CODIGO_ACTUALIZACIONES 
and actualizaciones_general.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN." and actualizaciones.FECHA between '2014-01-01' and '".date('Y-m-d')."' ORDER BY ACTUALIZACIONES.CODIGO_ACTUALIZACIONES DESC";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result1))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "EGRESO" =>  $row["EGRESO"] );
  }
  mysql_free_result($result1);

$fecha="2014-01-01 00:00:00";
$segundos=strtotime('now')-strtotime($fecha) ;
$diasdif=intval($segundos/60/60/24);

$flujo = "";
$check = "";
foreach ($LISTACOD as $key => $value) {
$EGRESOS = "";
    foreach ($LISTA as $llave => $valor1) {
      if ($value == $LISTA[$llave]["COD"]) {
         $EGRESOS += $LISTA[$llave]["EGRESO"];
      }
    }
    if($EGRESOS == 0 || $diasdif == 0)
{
  $flujo = 0;
}
else
{
  $flujo = $EGRESOS / $diasdif;
  $flujo =  number_format($flujo, 2, ",", ".");
}
    $LISTAEGRESO[] = array( "COD" =>  $value,
                  "EGRESO" =>  $EGRESOS,
                  "FLUJO" =>  $flujo  );
}

unset($LISTA);
$LISTA = array();
$LISTAVALE = array();

$query_registro3 = "select producto_vale_emision.CANTIDAD_ENTREGADA,producto_vale_emision.CANTIDAD_SOLICITADA,producto_vale_emision.CODIGO_PRODUCTO  from vale_emision, producto_vale_emision, producto where vale_emision.
COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO ".$IN."  and vale_emision.ESTADO = 'PENDIENTE'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

 while($row = mysql_fetch_assoc($result3))
  {
$LISTA[] = array( "COD" =>  $row["CODIGO_PRODUCTO"],
                  "CANTEN" =>  $row["CANTIDAD_ENTREGADA"],
                  "CANTSO" =>  $row["CANTIDAD_SOLICITADA"] );
  }
  mysql_free_result($result3);
 mysql_close($conn);

$check = "";
foreach ($LISTACOD as $key => $value) {
$CANTEN = "";
$CANTSO = "";
  foreach ($LISTA as $llave => $valor1) {
    if ($value == $LISTA[$llave]["COD"]) {
         $CANTEN += $LISTA[$llave]["CANTEN"];
         $CANTSO += $LISTA[$llave]["CANTSO"];
    }
  }
$CANTEN = $CANTSO- $CANTEN;
    $LISTAVALE[] = array( "COD" =>  $value,
                  "VALE" =>  $CANTEN );
}
$LISTAFINAL = array();
foreach ($LISTACOD as $key => $value) {

  $CONT = $LISTACANT[$key]['CANT'] + $LISTASTOCK[$key]['STOCK'];
  $DISP = $CONT - $LISTAVALE[$key]['VALE'];

$LISTAFINAL[] = array(  "COD" =>  $value,
                        "CANT" => $LISTACANT[$key]['CANT'],
                        "EGRESO" =>  $LISTAEGRESO[$key]['EGRESO'],
                        "FLUJO" => $LISTAEGRESO[$key]['FLUJO'],
                        "VALE" =>  $LISTAVALE[$key]['VALE'],
                        "CONTABLE" =>  $CONT,
                        "DISPONIBLE" =>  $DISP,
                        "STOCK" => $LISTASTOCK[$key]['STOCK'],
                        "STOCKMIN" => $LISTASTOCKmin[$key] );
}

unset($LISTA);
unset($LISTACANT);
unset($LISTAEGRESO);
unset($LISTAVALE);
unset($LISTASTOCK);

foreach ($LISTAFINAL as $key => $value) {
echo"<script language = javascript>
$(document).ready(function(){
if( parseInt('".$LISTAFINAL[$key]['STOCK']."') < parseInt('".$LISTAFINAL[$key]['STOCKMIN']."') )
{
if( ( parseInt('".$LISTAFINAL[$key]['STOCK']."') + parseInt('".$LISTAFINAL[$key]['CANT']."')) > parseInt('".$LISTAFINAL[$key]['STOCKMIN']."') )
{  
$('#STOCKK".$key."').css('background-color', '#F79646');
}else
{
$('#STOCKK".$key."').css('background-color', '#F72D2D');
}
}
$('#disp".$key."').html('".$LISTAFINAL[$key]['DISPONIBLE']."');
$('#cont".$key."').html('".$LISTAFINAL[$key]['CONTABLE']."');
$('#valee".$key."').html('<a target=_blank href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO=" .urlencode($LISTAFINAL[$key]['COD']). ">".$LISTAFINAL[$key]['VALE']."</a>');
$('#flujo".$key."').html('".$LISTAFINAL[$key]['FLUJO']."');
$('#trans".$key."').html('<a target=_blank href=ListadoOCTransito.php?CODIGO_PRODUCTO=" .urlencode($LISTAFINAL[$key]['COD']). ">".$LISTAFINAL[$key]['CANT']."</a>');
});
</script>";
}

}

?>
</table>

<div class="pag">
<?php $RESTO = ceil($TODOS / 500);  

$contador = 0;
$contador1 = 0;
for($i=0;$i<$RESTO;$i++){
?>
<?php
if($pagina <= 4)
{
  if($pagina == 0)
  {
    $menos = 9;
  }
  else if($pagina == 1)
  {
    $menos = 8;
  }
  else if($pagina == 2)
  {
    $menos = 7;
  }
  else if($pagina == 3)
  {
    $menos = 6;
  }
  else if($pagina == 4)
  {
    $menos = 5;
  }
$contador1 = $menos + $pagina; 
$contador =  $pagina - 5; 
}
else
{
$contador1 = 5 + $pagina; 
$contador =  $pagina - 5;   
}
?>

<?php
if(0 ==  $i )
{
?>
<a  class="noactivo"   onClick="document.formulario.action='Producto2GEN.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>

<?php
if( $pagina == $i)
{
?>
<a  class="activo" onClick="document.formulario.action='Producto2GEN.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo $i;?></a>
<?php
}
else if($contador1  >  $i && $contador  <  $i )
{
?>
<a  class="noactivo"  onClick="document.formulario.action='Producto2GEN.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo $i;?></a>
<?php
}
?>
<?php
}
?>

<?php
if($RESTO  ==  $i )
{
?>
<a class="noactivo"  onClick="document.formulario.action='Producto2GEN.php?pagina=<?php echo $i;?>&check=<?php echo $checked;?>&buscar_codigo=<?php echo $BUSCAR_CODIGO;?>&BUSCAR_DESCRIPCION=<?php echo $BUSCAR_DESCRIPCION;?>&familias=<?php echo $familias;?>'; document.formulario.submit();"
><?php echo "...";?></a>
<?php
}
?>
</div>


</form>
</body>
</html>
