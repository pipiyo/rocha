<?php require_once('Conexion/Conexion.php'); ?>
<?php 
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
   <link rel="shortcut icon" href="Imagenes/rocha.png">
<LINK REL=StyleSheet HREF="style/960_12_col.css" TYPE="text/css" MEDIA=screen>
<LINK REL=StyleSheet HREF="style/estiloRRHH.css" TYPE="text/css" MEDIA=screen>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rrhh</title>
<script>
function reinforme() 
{
window.open("InformeProyectoRocha.php?ESTADO=TODOS"); 
}
function reback()
{
//location.href= "Productos.php";
//window.open("Producto.php");
window.close("gerencia.php");
}
function reinformeEmpleadoHE() 
{

}
function reinformeEmpleadoInformeHe() 
{

}
function reinformeInstaladores() 
{
window.open("InformeProyectoPrevencion.php?ESTADO=EN PROCESO"); 
}

</script>
</head>

<body>

<div style="margin-top:20px;" class="container_12">

<div  style="height:539px;margin:3px;width:90px;" class='grid_1' >
</div>

<div onClick="" id="INFORME" class='grid_5' ><center><h2>INGRESO HE</h2></center></div>
<div onClick="" id="INFORME1" class='grid_5' ><center><h2>INFORME HE</h2></center></div>
<div onClick="reinformeInstaladores() " id="INFORME2" class='grid_5' ><center><h2>PREVENCIÓN DE RIESGOS</h2></center></div>
<div onClick="" id="INFORME3" class='grid_5' ><center><h2></h2></center></div>
<div style="height:130px;margin:3px;width:10px;" class='grid_5' > </div>
<div onClick="reback();" id="BACK" class='grid_2'></div>

</div>
</div>
</body>
</html>