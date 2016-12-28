/////////////////////////////////////COMPROBAR CODIGO PRODUCTO

$(document).ready(function(){
$(".codigoproducto").keyup( function(e){
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
var trayectoria = $(this).offset();
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_codigo_producto.php',
    data: { 'consulta': $(this).val(), 'nombre': $(this).attr("name")  },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
if (data.length != 0) {
  for(var i=0;i<data.length; i++)
  {
    $("#listacodigos").append("<input  class='codigopro'  type = 'button' id='"+data[i].DES+"' name='"+data[i].NOMBRE+"' value = '"+data[i].COD+"' />  ");
  }
}else{
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
};
}
});
$("#listacodigos").fadeIn("fast").css({
    left: trayectoria.left,
    top: trayectoria.top  + $(this).outerHeight(),
    });
};
});
});
$(document).ready(function(){
$(".codigopro").live( "click",  function(e){
  $("#"+$(this).attr("name")+"").empty();
$("#"+$(this).attr("name")+"").val(this.value);
var $row = $("#"+$(this).attr("name")+"").attr("name").substring(3, 6);
$("#des"+$row+"").val($(this).attr("id"));
if ($("#"+$(this).attr("name")+"").val().length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_codigo_producto.php',
    data: { 'consulta':  $("#"+$(this).attr("name")+"").val() },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
  for(var i=0;i<data.length; i++)
  {
    $("#exs"+$row+"").text(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#ud"+$row+"").val(data[i].UM);
};
}
});
};
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
});
});
$(document).ready(function(){
$(document).click(function (e){
    var contenedor = $("#listacodigos");
    if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
        contenedor.empty().hide();
    };
});
});
$(document).ready(function(){
$(".codigoproducto").change( function(e){
var $row = $(this).attr("name").substring(3, 6);
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_codigo_producto.php',
    data: { 'consulta':  this.value },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {

  for(var i=0;i<data.length; i++)
  {
    $("#exs"+$row+"").text(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#ud"+$row+"").val(data[i].UM);
};


}
});
};
});
});


//////////////////////////////////////////
////////////////////////////////////COMPROBAR DESCRPCION PRODUCTO
///////////////////////////////////////////////


$(document).ready(function(){
$(".descripcion").keyup( function(e){
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
var trayectoria = $(this).offset();
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_descripcion_producto.php',
    data: { 'consulta': $(this).val(), 'nombre': $(this).attr("name")  },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
if (data.length != 0) {
  for(var i=0;i<data.length; i++)
  {
    $("#listadescripciones").append("<input  class='descripcionpro'  type = 'button' id='"+data[i].COD+"' name='"+data[i].NOMBRE+"' name='"+data[i].NOMBRE+"' value = '"+data[i].DES+"' />  ");
  }
}else{
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
};
}
});
$("#listadescripciones").fadeIn("fast").css({
    left: trayectoria.left,
    top: trayectoria.top  + $(this).outerHeight(),
    });
};
});
});


$(document).ready(function(){
$(".descripcionpro").live( "click",  function(e){
  $("#"+$(this).attr("name")+"").empty();
$("#"+$(this).attr("name")+"").val(this.value);
var $row = $("#"+$(this).attr("name")+"").attr("name").substring(3, 6);
$("#cod"+$row+"").val($(this).attr("id"));
if ($("#"+$(this).attr("name")+"").val().length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_codigo_producto.php',
    data: { 'des':  $("#"+$(this).attr("name")+"").val() },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {


        for(var i=0;i<data.length; i++)
  {
    $("#exs"+$row+"").text(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#ud"+$row+"").val(data[i].UM);
};

}
});
};
$("#listaproyectos").empty().hide();
$("#listacodigos").empty().hide();
$("#listadescripciones").empty().hide();
});
});


$(document).ready(function(){
$(document).click(function (e){
    var contenedor = $("#listadescripciones");
    if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
        contenedor.empty().hide();
    };
});
});


$(document).ready(function() {
$(".descripcion").change( function(e){
var $row = $(this).attr("name").substring(3, 6);
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_codigo_producto.php',
    data: { 'consulta':  this.value },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
        for(var i=0;i<data.length; i++)
  {
    $("#exs"+$row+"").text(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#ud"+$row+"").val(data[i].UM);
};
}
});
};
});
});


// $(function(){
//                 $('#rocha').autocomplete({
//                    source : 'ajaxProyecto.php',
//                    select : 
//                    function(event, ui)
//                    {
                       
//                     }
//                     });
                           
// });

function es_vacio()
{
  
var rocha = document.getElementById('rocha') ;
var ingresar = document.getElementById('ingresar') ;
                             

   if (rocha.value != "") 
    {     
       ingresar.disabled=false;
    }
    else
    {
       ingresar.disabled=true;
    }
}       

function enviar()
{
  document.getElementById("formulario").submit();
}   


//   /////////////////////////////////////////////////
//  $(document).ready(function(){
                         
//       var consulta;
             
//       //hacemos focus
 
                                                 
//       //comprobamos si se pulsa una tecla
//       $("#rocha").blur(function(e){
//              //obtenemos el texto introducido en el campo
//              consulta = $("#rocha").val();
                                      
//              //hace la búsqueda
//              $("#res").delay(1000).queue(function(n) {      
                                           
//                   $("#res").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
//                         $.ajax({
//                               type: "POST",
//                               url: "comprobarProductoValeRocha.php",
//                               data: "b="+escape(consulta),
//                               dataType: "html",
//                               error: function(){
//                                     alert("error petición ajax");
//                               },
//                               success: function(data){                                                      
//                                     $("#res").html(data);
//                                     n();
//                               }
//                   });
                                           
//              });
                                
//       });                    
// }); 


 $(function(){
               $('#fecha_t').datetimepicker({
                     dateFormat: 'yy-mm-dd',
                       showSecond: true,
                       timeFormat: 'hh:mm:ss',
                       stepHour: 1,
                       stepMinute: 1,
                       stepSecond: 10
            });
});

 /* JS valida existe */

 $(document).ready(function(){
  $('#tabla_producto').live( "mouseout", function(){
    
    var bloquearr = [];
    var ingresar = document.getElementById('ingresar') ;

    $('#tabla_producto #editor tr').each(function () {
    
        var valor = $(this).find("td").eq(2).html();
        bloquearr.push(valor);
        
    });
  
    for (index = 0; index < bloquearr.length; index++) {

        general = bloquearr[index];
        if(general == "CODIGO NO EXISTE")
        {
             ingresar.disabled=true;
             index = 30;
        }
        else
        {
            ingresar.disabled=false;
        }
    }

  });
}); 