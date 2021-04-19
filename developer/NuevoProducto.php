<?php require_once('Conexion/Conexion.php'); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

  <head>
  <title> Informe OT final V1.0</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="shortcut icon" href="Imagenes/rocha.png">
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="Style/ti.css" />
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
  <script language = javascript>

$(document).ready(function(){
$("#categoria").change( function() {

$(".super").hide();
$(".pro").hide();
$(".pos").hide();

if (this.value == 'Superficies Curvas' || this.value == 'Superficies Rectas'|| this.value == 'Soportes') {
$(".super").show();
}else if (this.value == 'Almacenamiento' || this.value == 'Cajoneras' || this.value == 'Mueble De Linea' ){
$(".pro").show();
}else if (this.value == 'Partes y Piezas' ){
$(".pos").show();
};

});
});


$(document).ready( function() {
$("#buscar").live("click", function() {
$("#tabla").empty();

if ($("#categoria").val() == 'Superficies Curvas' || $("#categoria").val() == 'Superficies Rectas' || $("#categoria").val() == 'Partes y Piezas' || $("#categoria").val() == 'Soportes') {
var $m3 = 0;
}else if ($("#categoria").val() == 'Almacenamiento' || $("#categoria").val() == 'Cajoneras' || $("#categoria").val() == 'Mueble De Linea' ){
var $m3 = ( parseInt($("#Largo").val()) * parseInt($("#Ancho").val()) * parseInt($("#Alto").val())   )/1000000 ;
};

if ($("#categoria").val() == 'Partes y Piezas') {
var $pos = $("#Posicion").val();
}else{
var $pos = '';
};

$.ajax({
      type: "POST",
      url: "AJAX_COMPROVAR_CODDES2.PHP",
      data: {'cod': $("#codigo").val(), 'des': $("#descripcion").val(), 'cat': $("#categoria").val(), 'm3' : $m3, 'pos' : $pos },
      dataType:'json',
      error: function(xhr, status, error) {
      $("#tabla").append("<tr> <td> "+xhr.responseText+" </td> </tr>"); 
  alert(xhr.responseText);
},
      success: function(data){ 
for(var i=0;i<data.length; i++)
          {
         $("#tabla").append("<tr><td>"+data[i].COD+"</td><td>"+data[i].DES+"</td><td>"+data[i].CAT+"</td><td>"+data[i].EX+"</td><td>"+data[i].FAM+"</td><td>"+data[i].M3+"</td><td>"+data[i].R+"</td><td>"+data[i].R1+"</td><td>"+data[i].R2+"</td><td>"+data[i].POS+"</td><td>"+data[i].CAD2+"</td><td>"+data[i].CAD3+"</td><td>"+data[i].CUERPO+"</td><td>"+data[i].FRENTE+"</td></tr>");  
         };
        $("#respuesta").show();
      }
    });
});
});


$(document).ready(function(){
$("#back").live("click", function(){

var data = Array();

$("table#tabla tr").each(function(i, v){
    data[i] = Array();
    $(this).children('td').each(function(ii, vv){
        data[i][ii] = $(this).text();
    }); 
})

var dataJSON = JSON.stringify(data);
   $.ajax({
        type: "POST",
        url: "AJAX_NUEVO_PRODUCTO.php",
        data: {'datos' : dataJSON, 'formato' : $("#Formato").val(), 'UM' : $("#UM").val(), 'Largo' : $("#Largo").val(), 'Ancho' : $("#Ancho").val(), 'Alto' : $("#Alto").val(), 'Relacion' : $("#Relacion").val() }, 
        cache: false,
        dataType:'html',
error: function(xhr, status, error) { 
$("#tabla").append("<tr> <td> "+xhr.responseText+" </td> </tr>");       
  alert(xhr.responseText);
},
        success: function(data){
           alert(data); 
           location.reload();
        }
    });
});
});


  </script>  
</head>
<body>	
  <div id='bread'><div id="menu1"></div></div>
<div  class="content_item" id = 'contenedor'><center>
	<h1>Nuevo Producto</h1>

<!--BUSCADOR -->
<div id="buscardor"><center>

	<table>
	<tr>
		
    <td> <p>Categoria</p> <select class="textbox" name="categoria" id="categoria"  >
    <option></option>

<option>Superficies Curvas</option>
<option>Superficies Rectas</option>
<option>Soportes</option>
<option>Almacenamiento</option>
<option>Cajoneras</option>
<option>Mueble De Linea</option>
<option>Partes y Piezas</option>

  </select></td>




  <td> <p class='pro super pos' style="display:none;" >Codigo</p> <input class='textbox pro super pos'  style="display:none;" placeholder="Codigo" name="codigo" id="codigo" type="text" value="" /></td>

	<td> <p class='pro super pos' style="display:none;" >Descripcion</p> <input class='textbox pro super pos'  style="display:none;" placeholder="Descripcion" name="descripcion" id="descripcion" type="text" value="" /></td>




  <td> <p class='pro super pos' style="display:none;" >UM</p> <input class='textbox pro super pos' style="display:none;" placeholder="UM" name="UM" id="UM" type="text" value="" /></td>

</tr>
<tr>


    <td> <p class='pro super pos' style="display:none;" >Largo</p> <input class='textbox pro super pos'  style="display:none;" placeholder="Largo" name="Largo" id="Largo" type="text" value="" /></td>
    <td> <p class='pro super pos' style="display:none;" >Ancho</p> <input class='textbox pro super pos'  style="display:none;" placeholder="Ancho" name="Ancho" id="Ancho" type="text" value="" /></td>
    <td> <p class='pro' style="display:none;" >Alto</p> <input class='textbox pro' style="display:none;" placeholder="Alto" name="Alto" id="Alto" type="text" value="" /></td>




    <td> <p class='pos' style="display:none;" >Posicion</p> <select style="display:none;" class="textbox pos" name="Posicion" id="Posicion"  >
    <option></option>
<option>Frente</option>
<option>Cuerpo</option>
  </select></td>



</tr>
<tr>

  <td> <p class='pro super pos' style="display:none;" >Formato</p> <input class='textbox pro super pos' style="display:none;" placeholder="Formato" name="Formato" id="Formato" type="text" value="" /></td>

  <td> <p class='pro super pos' style="display:none;" >Relacion</p> <input class='textbox pro super pos' style="display:none;" placeholder="Relacion" name="Relacion" id="Relacion" type="text" value="" /></td>

	</tr>

  <tr>

    <td><input class='textbox' name="buscar" id="buscar" type="button" value="Buscar" /></td>

  </tr>


	</table>
	



<div style="display:none;" id="respuesta">
  <input class='textbox' name="back" id="back" type="button" value="INGRESAR" />
  <br>
  
<table class='tabla_receta' id='tabla' border='1'  rules='all'>
  

</table>
</div>






	</center>
</div>
<!-- FIN BUSCADOR  -->


</div>
</center>
</body>
</html>