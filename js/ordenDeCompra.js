$(document).ready(function(){
$("#rochapri").keyup( function(e){
$("#listaproyectos").empty().hide();
var trayectoria = $(this).offset();
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_rocha.php',
    data: { 'consulta': $(this).val(), 'nombre': $(this).attr("name")  },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
if (data.length != 0) {
  for(var i=0;i<data.length; i++)
  {
    $("#listaproyectos").append("<input  class='rochasprimeros'  type = 'button'  value = '"+data[i].COD+"' />  ");
  }
}else{
$("#listaproyectos").empty().hide();
};
}
});
$("#listaproyectos").fadeIn("fast").css({
    left: trayectoria.left,
    top: trayectoria.top  + $(this).outerHeight(),
    });
};
});
});

$(document).ready(function(){
$(".rochasprimeros").live( "click", function(e){
$("#rochapri").val(this.value);
$("#listaproyectos").empty().hide();
});
});










//////////////////////////////////////////
//////////////////////////////COMPROBAR ROCHA
///////////////////////////////////////////////
$(document).ready(function(){
$(".proyecto").keyup( function(e){
$("#listaproyectos").empty().hide();
var trayectoria = $(this).offset();
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_rocha.php',
    data: { 'consulta': $(this).val(), 'nombre': $(this).attr("name")  },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
if (data.length != 0) {
  for(var i=0;i<data.length; i++)
  {
    $("#listaproyectos").append("<input  class='rochas'  type = 'button' name='"+data[i].NOMBRE+"' value = '"+data[i].COD+"' />  ");
  }
}else{
$("#listaproyectos").empty().hide();
};
}
});
$("#listaproyectos").fadeIn("fast").css({
    left: trayectoria.left,
    top: trayectoria.top  + $(this).outerHeight(),
    });
};
});
});
$(document).ready(function(){
$(".rochas").live( "click",  function(e){
  $("#"+$(this).attr("name")+"").empty();
$("#"+$(this).attr("name")+"").val(this.value);
var $row = $("#"+$(this).attr("name")+"").attr("name").substring(4, 7);
if ($("#"+$(this).attr("name")+"").val().length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_rocha.php',
    data: { 'consulta': $("#"+$(this).attr("name")+"").val() },
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
       $("#resultador"+$row+"").empty();
    $("#resultador"+$row+"").val(data);
}
});
};
$("#listaproyectos").empty().hide();
});
});
$(document).ready(function(){
$(document).click(function (e){
    var contenedor = $("#listaproyectos");
    if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
        contenedor.empty().hide();
    };
});
});
$(document).ready(function(){
$(".proyecto").change( function(e){
var $row = $(this).attr("name").substring(4, 7);
if (this.value.length != 0) {
$.ajax({
    type: "POST",
    url: 'ajax_comprovar_rocha.php',
    data: { 'consulta': this.value },
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
       $("#resultador"+$row+"").empty();
    $("#resultador"+$row+"").val(data);
}
});
};
});
});
//////////////////////////////////////////
//////////////////////////////////FIN COMPROVAR ROCHA
///////////////////////////////////////////////





//////////////////////////////////////////
/////////////////////////////////////COMPROVAR CODIGO PRODUCTO
///////////////////////////////////////////////
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
    $("#exs"+$row+"").val(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#um"+$row+"").val(data[i].UM);
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
    $("#exs"+$row+"").val(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#um"+$row+"").val(data[i].UM);
};


}
});
};
});
});
//////////////////////////////////////////
////////////////////////////////////FIN COMPROVAR CODIGO PRODUCTO
///////////////////////////////////////////////



//////////////////////////////////////////
////////////////////////////////////COMPROVAR DESCRPCION PRODUCTO
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
    $("#exs"+$row+"").val(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#um"+$row+"").val(data[i].UM);
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
    $("#exs"+$row+"").val(data[i].EX);
    $("#prec"+$row+"").val(data[i].PRECIO);
    $("#cant"+$row+"").val(data[i].CANT);
    $("#tot"+$row+"").val(data[i].PSD);
    $("#desc"+$row+"").val(data[i].DESCUENTO);
    $("#stock"+$row+"").val(data[i].STOCK);
    $("#precl"+$row+"").val(data[i].PSD);
    $("#iva"+$row+"").val(data[i].PRECIO);
    $("#um"+$row+"").val(data[i].UM);
};
}
});
};
});
});


//////////////////////////////////////////
////////////////////////////////////FIN COMPROVAR DESCRPCION PRODUCTO
///////////////////////////////////////////////




      
      //////////////////////////////////////////////////////////////////////////////////
 $(function(){
                $('#proveedor').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : 
           function(event, ui)
           {
                       $('#proveedor1').slideUp('fast', function()
             {
                            $('#proveedor1').val(
                                 ui.item.value + 
                '\nRut:' + ui.item.rut + 
                '\n' + ui.item.direccion + 
                '\n' + ui.item.comuna+ 
                '\nSantiago - Chile'
                            );
                       });
                       $('#proveedor1').slideDown('fast');
             
             $('#condicion').slideUp('fast', function()
             {
                            $('#condicion').val(
                                 ui.item.forma 
                            );
                       });
                       $('#condicion').slideDown('fast');
                $('#rut_prove').slideUp('fast', function()
             {
                            $('#rut_prove').val(
                                 ui.item.rut 
                            );
                       });
                       $('#rut_prove').slideDown('fast');
                       }
                       });
            });




  $(function() 
  {
    $( "#fechaE" ).datepicker({dateFormat: 'y/mm/dd'});
    $( "#fecha").datepicker  ({dateFormat: 'y/mm/dd'});
  });






function mostrar()
{
  popup = document.getElementById('popup'); 
  popup.style.display = "";
}

function cerrar()
{
  popup = document.getElementById('popup'); 
  popup.style.display = "none";
}

function dialog_submit(val)
{
document.getElementById('txt_descripciong').value = val;
}











function volver()
{
  contenedor.style.display = "";
  contenedor1.style.display = "none";
}
 $(window).bind('beforeunload', function(){
 return 'Usted esta saliendo de la pag confirma la acción';
 });
 
function vagregar(id) 
{
    num = id.substring(3,5);
    roch = document.getElementById("roch"+num).value;
    cod = document.getElementById("cod"+num).value;
    des = document.getElementById("des"+num).value;
    if(des == "" || cod == "")
    {
      $("#roch"+num).removeAttr("required");
     // document.getElementById("roch"+num).value = 'si';
    }
    else if(roch == "")
    {
      $("#roch"+num).attr("required", "true");
     // document.getElementById("roch"+num).value = 'si';
    }
    else
    {
      $("#roch"+num).attr("required", "true");
      // document.getElementById("roch"+num).value = 'no';
    }
    
   
}
function vagregar1(id) 
{
    num = id.substring(4,6);
    roch = document.getElementById("roch"+num).value;
    cod = document.getElementById("cod"+num).value;
    des = document.getElementById("des"+num).value;
  
if(des == "" || cod == "")
    {
      $("#roch"+num).removeAttr("required");
     // document.getElementById("roch"+num).value = 'si';
    }
    else if(roch == "")
    {
      $("#roch"+num).attr("required", "true");
     // document.getElementById("roch"+num).value = 'si';
    }
    else
    {
      $("#roch"+num).attr("required", "true");
      // document.getElementById("roch"+num).value = 'no';
    }
     
}






















//////////////////////////////////////////
///////////////////////////////////////////ORIGINALES
///////////////////////////////////////////


$(document).ready(function(){
$(".form00").change(function(e){


var a = $(this).attr("id");
var i = a.substring(9);


if ($(this).val() == "") {
  $("#cuerpo"+i).empty();
  $("#frente"+i).empty();
}else{

var cat = $("[id='"+($(this).val())+"']").attr("name");

 $.ajax({
      type: "POST",
      url: "AJAX_SUBCAT.PHP",
      data: {'codcat': cat},
      dataType:'json',
      error: function(){
          alert("error petición ajax");
          },
      success: function(data){ 
  var select = $("#cuerpo"+i);
  var selectb = $("#frente"+i);

  select.empty();
  selectb.empty(); 

  select.append(data["cuerpo"]);
  selectb.append(data["frente"]);

                    }
            });
};
});
});

//////////////////////////////////////////
///////////////////////////////////////////FIN ORIGINALES
///////////////////////////////////////////










///////////////////////////////////////////////
///////////////////////////////////////////////////
/////////////////////////////////////////////////////////



function seleccion()
{
var despachar = document.getElementById('despachar').selectedIndex;

if(despachar == '1')
{

	document.getElementById('despachar1').value = "77.003.680-1";
	document.getElementById('despachar_nombre').value = 'Muebles y Disenos S.A.';
	document.getElementById('despachar_direccion').value = 'Av. Santa Rosa 5721';
	document.getElementById('despachar_comuna').value = 'San Miguel';
	document.getElementById('despachar_telefono').value = '920 71 75';
	document.getElementById('despachar1').readOnly = 'readonly';
	
}
if(despachar == '2')
{
  document.getElementById('despachar1').value = '77.003.680-1';
	document.getElementById('despachar_nombre').value = 'Rocha S.A. Multioficina';
	document.getElementById('despachar_direccion').value = 'Av. Los Conquistadores 2635';
	document.getElementById('despachar_comuna').value = 'Providencia ';
	document.getElementById('despachar_telefono').value = '2586 21 96, 2586 21 97';
	document.getElementById('despachar1').readOnly = 'readonly';
}
if(despachar == '3')
{
	document.getElementById('despachar1').value = '77.003.680-1';
	document.getElementById('despachar_nombre').value = 'Rocha S.A. Multioficina';
	document.getElementById('despachar_direccion').value = 'Av. La Dehesa 181, Oficina 409 ';
	document.getElementById('despachar_comuna').value = 'Lo Barnechea';
	document.getElementById('despachar_telefono').value = '321 2095';
	document.getElementById('despachar1').readOnly = 'readonly';
}
if(despachar == '4')
{
	document.getElementById('despachar1').value = 'Otro';
	document.getElementById('despachar_nombre').value = '';
	document.getElementById('despachar_direccion').value = '';
	document.getElementById('despachar_comuna').value = '';
	document.getElementById('despachar1').readOnly = '';
}
}

function total()
{
precio = document.getElementById('precl1');
cantidad = document.getElementById('cant1');
des = document.getElementById('desc1');
iva = document.getElementById('iva1');
val = precio.value * des.value / 100;
val1=parseFloat(val).toFixed(2);
val2 = precio.value - val1;
total1 = val2 * cantidad.value;

if(total1 != 0 || des.value == 100)
{
document.getElementById('tot1').value = parseFloat(total1).toFixed(2);
if(des == 0)
{ document.getElementById('iva1').value = precio.value}
else
{document.getElementById('iva1').value = parseFloat(val2).toFixed(2);}
}
precio1 = document.getElementById('precl2');
cantidad1 = document.getElementById('cant2');
des1 = document.getElementById('desc2');
iva2 = document.getElementById('iva2');
val1 = precio1.value * des1.value / 100;
val11=parseFloat(val1).toFixed(2);
val21 = precio1.value - val11;
total11 = val21 * cantidad1.value;
if(total11 != 0 || des1.value == 100)
{
document.getElementById('tot2').value = parseFloat(total11).toFixed(2);
if(des1==0)
{document.getElementById('iva2').value = precio1.value;}
else
{document.getElementById('iva2').value = parseFloat(val21).toFixed(2);}
}
precio3 = document.getElementById('precl3');
cantidad3 = document.getElementById('cant3');
des3 = document.getElementById('desc3');
iva3 = document.getElementById('iva3');
val3 = precio3.value * des3.value / 100;
val3a=parseFloat(val3).toFixed(2);
val3b = precio3.value - val3a;
total3 = val3b * cantidad3.value;
if(total3 != 0 || des3.value == 100)
{
document.getElementById('tot3').value = parseFloat(total3).toFixed(2);
if(des3==0)
{document.getElementById('iva3').value = precio3.value;}
else
{document.getElementById('iva3').value = parseFloat(val3b).toFixed(2);}
}
precio4 = document.getElementById('precl4');
cantidad4 = document.getElementById('cant4');
des4 = document.getElementById('desc4');
iva4 = document.getElementById('iva4');
val4 = precio4.value * des4.value / 100;
val4a=parseFloat(val4).toFixed(2);
val4b = precio4.value - val4a;
total4 = val4b * cantidad4.value;
if(total4 != 0 || des4.value == 100)
{
document.getElementById('tot4').value = parseFloat(total4).toFixed(2);
if(des4==0)
{document.getElementById('iva4').value = precio4.value;}
else
{document.getElementById('iva4').value = parseFloat(val4b).toFixed(2);}
}
precio5 = document.getElementById('precl5');
cantidad5 = document.getElementById('cant5');
des5 = document.getElementById('desc5');
iva5 = document.getElementById('iva5');
val5 = precio5.value * des5.value / 100;
val5a=parseFloat(val5).toFixed(2);
val5b = precio5.value - val5a;
total5 = val5b * cantidad5.value;
if(total5 != 0 || des5.value == 100)
{
document.getElementById('tot5').value = parseFloat(total5).toFixed(2);
if(des5==0)
{document.getElementById('iva5').value = precio5.value;}
else
{document.getElementById('iva5').value = parseFloat(val5b).toFixed(2);}
}
precio6 = document.getElementById('precl6');
cantidad6 = document.getElementById('cant6');
des6 = document.getElementById('desc6');
iva6 = document.getElementById('iva6');
val6 = precio6.value * des6.value / 100;
val6a=parseFloat(val6).toFixed(2);
val6b = precio6.value - val6a;
total6 = val6b * cantidad6.value;
if(total6 != 0 || des6.value == 100)
{
document.getElementById('tot6').value = parseFloat(total6).toFixed(2);
if(des6==0)
{document.getElementById('iva6').value = precio6.value;}
else
{document.getElementById('iva6').value = parseFloat(val6b).toFixed(2);}
}
precio7 = document.getElementById('precl7');
cantidad7 = document.getElementById('cant7');
des7 = document.getElementById('desc7');
iva7 = document.getElementById('iva7');
val7 = precio7.value * des7.value / 100;
val7a=parseFloat(val7).toFixed(2);
val7b = precio7.value - val7a;
total7 = val7b * cantidad7.value;
if(total7 != 0 || des7.value == 100)
{
document.getElementById('tot7').value = parseFloat(total7).toFixed(2);
if(des7==0)
{document.getElementById('iva7').value = precio7.value;}
else
{document.getElementById('iva7').value = parseFloat(val7b).toFixed(2);}
}
precio8 = document.getElementById('precl8');
cantidad8 = document.getElementById('cant8');
des8 = document.getElementById('desc8');
iva8 = document.getElementById('iva8');
val8 = precio8.value * des8.value / 100;
val8a=parseFloat(val8).toFixed(2);
val8b = precio8.value - val8a;
total8 = val8b * cantidad8.value;
if(total8 != 0 || des8.value == 100)
{
document.getElementById('tot8').value = parseFloat(total8).toFixed(2);
if(des8==0)
{document.getElementById('iva8').value = precio8.value;}
else
{document.getElementById('iva8').value = parseFloat(val8b).toFixed(2);}
}
precio9 = document.getElementById('precl9');
cantidad9 = document.getElementById('cant9');
des9 = document.getElementById('desc9');
iva9 = document.getElementById('iva9');
val9 = precio9.value * des9.value / 100;
val9a=parseFloat(val9).toFixed(2);
val9b = precio9.value - val9a;
total9 = val9b * cantidad9.value;
if(total9 != 0 || des9.value == 100)
{
document.getElementById('tot9').value = parseFloat(total9).toFixed(2);
if(des9==0)
{document.getElementById('iva9').value = precio9.value;}
else
{document.getElementById('iva9').value = parseFloat(val9b).toFixed(2);}
}
precio10 = document.getElementById('precl10');
cantidad10 = document.getElementById('cant10');
des10 = document.getElementById('desc10');
iva10 = document.getElementById('iva10');
val10 = precio10.value * des10.value / 100;
val10a=parseFloat(val10).toFixed(2);
val10b = precio10.value - val10a;
total10 = val10b * cantidad10.value;
if(total10 != 0 || des10.value == 100)
{
document.getElementById('tot10').value = parseFloat(total10).toFixed(2);
if(des10==0)
{document.getElementById('iva10').value = precio10.value;}
else
{document.getElementById('iva10').value = parseFloat(val10b).toFixed(2);}
}
precio11 = document.getElementById('precl11');
cantidad11 = document.getElementById('cant11');
des11 = document.getElementById('desc11');
iva11 = document.getElementById('iva11');
val11 = precio11.value * des11.value / 100;
val11a=parseFloat(val11).toFixed(2);
val11b = precio11.value - val11a;
total11 = val11b * cantidad11.value;
if(total11 != 0 || des11.value == 100)
{
document.getElementById('tot11').value = parseFloat(total11).toFixed(2);
if(des11==0)
{document.getElementById('iva11').value = precio11.value;}
else
{document.getElementById('iva11').value = parseFloat(val11b).toFixed(2);}
}
precio12 = document.getElementById('precl12');
cantidad12 = document.getElementById('cant12');
des12 = document.getElementById('desc12');
iva12 = document.getElementById('iva12');
val12 = precio12.value * des12.value / 100;
val12a=parseFloat(val12).toFixed(2);
val12b = precio12.value - val12a;
total12 = val12b * cantidad12.value;
if(total12 != 0 || des12.value == 100)
{
document.getElementById('tot12').value = parseFloat(total12).toFixed(2);
if(des12==0)
{document.getElementById('iva12').value = precio12.value;}
else
{document.getElementById('iva12').value = parseFloat(val12b).toFixed(2);}
}
precio13 = document.getElementById('precl13');
cantidad13 = document.getElementById('cant13');
des13 = document.getElementById('desc13');
iva13 = document.getElementById('iva13');
val13 = precio13.value * des13.value / 100;
val13a=parseFloat(val13).toFixed(2);
val13b = precio13.value - val13a;
total13 = val13b * cantidad13.value;
if(total13 != 0 || des13.value == 100)
{
document.getElementById('tot13').value = parseFloat(total13).toFixed(2);
if(des13==0)
{document.getElementById('iva13').value = precio13.value;}
else
{document.getElementById('iva13').value = parseFloat(val13b).toFixed(2);}
}
precio14 = document.getElementById('precl14');
cantidad14 = document.getElementById('cant14');
des14 = document.getElementById('desc14');
iva14 = document.getElementById('iva14');
val14 = precio14.value * des14.value / 100;
val14a=parseFloat(val14).toFixed(2);
val14b = precio14.value - val14a;
total14 = val14b * cantidad14.value;
if(total14 != 0 || des14.value == 100)
{
document.getElementById('tot14').value = parseFloat(total14).toFixed(2);
if(des14==0)
{document.getElementById('iva14').value = precio14.value;}
else
{document.getElementById('iva14').value = parseFloat(val14b).toFixed(2);}
}
precio15 = document.getElementById('precl15');
cantidad15 = document.getElementById('cant15');
des15 = document.getElementById('desc15');
iva15 = document.getElementById('iva15');
val15 = precio15.value * des15.value / 100;
val15a=parseFloat(val15).toFixed(2);
val15b = precio15.value - val15a;
total15 = val15b * cantidad15.value;
if(total15 != 0 || des15.value == 100)
{
document.getElementById('tot15').value = parseFloat(total15).toFixed(2);
if(des15==0)
{document.getElementById('iva15').value = precio15.value;}
else
{document.getElementById('iva15').value = parseFloat(val15b).toFixed(2);}
}
precio16 = document.getElementById('precl16');
cantidad16 = document.getElementById('cant16');
des16 = document.getElementById('desc16');
iva16 = document.getElementById('iva16');
val16 = precio16.value * des16.value / 100;
val16a=parseFloat(val16).toFixed(2);
val16b = precio16.value - val16a;
total16 = val16b * cantidad16.value;
if(total16 != 0 || des16.value == 100)
{
document.getElementById('tot16').value = parseFloat(total16).toFixed(2);
if(des16==0)
{document.getElementById('iva16').value = precio16.value;}
else
{document.getElementById('iva16').value = parseFloat(val16b).toFixed(2);}
}
precio17 = document.getElementById('precl17');
cantidad17 = document.getElementById('cant17');
des17 = document.getElementById('desc17');
iva17 = document.getElementById('iva17');
val17 = precio17.value * des17.value / 100;
val17a=parseFloat(val17).toFixed(2);
val17b = precio17.value - val17a;
total17 = val17b * cantidad17.value;
if(total17 != 0 || des17.value == 100)
{
document.getElementById('tot17').value = parseFloat(total17).toFixed(2);
if(des17==0)
{document.getElementById('iva17').value = precio17.value;}
else
{document.getElementById('iva17').value = parseFloat(val17b).toFixed(2);}
}
precio18 = document.getElementById('precl18');
cantidad18 = document.getElementById('cant18');
des18 = document.getElementById('desc18');
iva18 = document.getElementById('iva18');
val18 = precio18.value * des18.value / 100;
val18a=parseFloat(val18).toFixed(2);
val18b = precio18.value - val18a;
total18 = val18b * cantidad18.value;
if(total18 != 0 || des18.value == 100)
{
document.getElementById('tot18').value = parseFloat(total18).toFixed(2);
if(des18==0)
{document.getElementById('iva18').value = precio18.value;}
else
{document.getElementById('iva18').value = parseFloat(val18b).toFixed(2);}
}
precio19 = document.getElementById('precl19');
cantidad19 = document.getElementById('cant19');
des19 = document.getElementById('desc19');
iva19 = document.getElementById('iva19');
val19 = precio19.value * des19.value / 100;
val19a=parseFloat(val19).toFixed(2);
val19b = precio19.value - val19a;
total19 = val19b * cantidad19.value;
if(total19 != 0 || des19.value == 100)
{
document.getElementById('tot19').value = parseFloat(total19).toFixed(2);
if(des19==0)
{document.getElementById('iva19').value = precio19.value;}
else
{document.getElementById('iva19').value = parseFloat(val19b).toFixed(2);}
}
precio20 = document.getElementById('precl20');
cantidad20 = document.getElementById('cant20');
des20 = document.getElementById('desc20');
iva20 = document.getElementById('iva20');
val20 = precio20.value * des20.value / 100;
val20a=parseFloat(val20).toFixed(2);
val20b = precio20.value - val20a;
total20 = val20b * cantidad20.value;
if(total20 != 0 || des20.value == 100)
{
document.getElementById('tot20').value = parseFloat(total20).toFixed(2);
if(des20==0)
{document.getElementById('iva20').value = precio20.value;}
else
{document.getElementById('iva20').value = parseFloat(val20b).toFixed(2);}
}
precio21 = document.getElementById('precl21');
cantidad21 = document.getElementById('cant21');
des21 = document.getElementById('desc21');
iva21 = document.getElementById('iva21');
val21 = precio21.value * des21.value / 100;
val21a=parseFloat(val21).toFixed(2);
val21b = precio21.value - val21a;
total21 = val21b * cantidad21.value;
if(total21 != 0 || des21.value == 100)
{
document.getElementById('tot21').value = parseFloat(total21).toFixed(2);
if(des21==0)
{document.getElementById('iva21').value = precio21.value;}
else
{document.getElementById('iva21').value = parseFloat(val21b).toFixed(2);}
}
precio22 = document.getElementById('precl22');
cantidad22 = document.getElementById('cant22');
des22 = document.getElementById('desc22');
iva22 = document.getElementById('iva22');
val22 = precio22.value * des22.value / 100;
val22a=parseFloat(val22).toFixed(2);
val22b = precio22.value - val22a;
total22 = val22b * cantidad22.value;
if(total22 != 0 || des22.value == 100)
{
document.getElementById('tot22').value = parseFloat(total22).toFixed(2);
if(des22==0)
{document.getElementById('iva22').value = precio22.value;}
else
{document.getElementById('iva22').value = parseFloat(val22b).toFixed(2);}
}
precio23 = document.getElementById('precl23');
cantidad23 = document.getElementById('cant23');
des23 = document.getElementById('desc23');
iva23 = document.getElementById('iva23');
val23 = precio23.value * des23.value / 100;
val23a=parseFloat(val23).toFixed(2);
val23b = precio23.value - val23a;
total23 = val23b * cantidad23.value;
if(total23 != 0 || des23.value == 100)
{
document.getElementById('tot23').value = parseFloat(total23).toFixed(2);
if(des23==0)
{document.getElementById('iva23').value = precio23.value;}
else
{document.getElementById('iva23').value = parseFloat(val23b).toFixed(2);}
}
precio24 = document.getElementById('precl24');
cantidad24 = document.getElementById('cant24');
des24 = document.getElementById('desc24');
iva24 = document.getElementById('iva24');
val24 = precio24.value * des24.value / 100;
val24a=parseFloat(val24).toFixed(2);
val24b = precio24.value - val24a;
total24 = val24b * cantidad24.value;
if(total24 != 0 || des24.value == 100)
{
document.getElementById('tot24').value = parseFloat(total24).toFixed(2);
if(des24==0)
{document.getElementById('iva24').value = precio24.value;}
else
{document.getElementById('iva24').value = parseFloat(val24b).toFixed(2);}
}
precio25 = document.getElementById('precl25');
cantidad25 = document.getElementById('cant25');
des25 = document.getElementById('desc25');
iva25 = document.getElementById('iva2');
val25 = precio25.value * des25.value / 100;
val25a=parseFloat(val25).toFixed(2);
val25b = precio25.value - val25a;
total25 = val25b * cantidad25.value;
if(total25 != 0 || des25.value == 100)
{
document.getElementById('tot25').value = parseFloat(total25).toFixed(2);
if(des25==0)
{document.getElementById('iva25').value = precio25.value;}
else
{document.getElementById('iva25').value = parseFloat(val25b).toFixed(2);}
}
precio26 = document.getElementById('precl26');
cantidad26 = document.getElementById('cant26');
des26 = document.getElementById('desc26');
iva26 = document.getElementById('iva26');
val26 = precio26.value * des26.value / 100;
val26a=parseFloat(val26).toFixed(2);
val26b = precio26.value - val26a;
total26 = val26b * cantidad26.value;
if(total26 != 0 || des26.value == 100)
{
document.getElementById('tot26').value = parseFloat(total26).toFixed(2);
if(des26==0)
{document.getElementById('iva26').value = precio26.value;}
else
{document.getElementById('iva26').value = parseFloat(val26b).toFixed(2);}
}
precio27 = document.getElementById('precl27');
cantidad27 = document.getElementById('cant27');
des27 = document.getElementById('desc27');
iva27 = document.getElementById('iva27');
val27 = precio27.value * des27.value / 100;
val27a=parseFloat(val27).toFixed(2);
val27b = precio27.value - val27a;
total27 = val27b * cantidad27.value;
if(total27 != 0 || des27.value == 100)
{
document.getElementById('tot27').value = parseFloat(total27).toFixed(2);
if(des27==0)
{document.getElementById('iva27').value = precio27.value;}
else
{document.getElementById('iva27').value = parseFloat(val27b).toFixed(2);}
}
precio28 = document.getElementById('precl28');
cantidad28 = document.getElementById('cant28');
des28 = document.getElementById('desc28');
iva28 = document.getElementById('iva28');
val28 = precio28.value * des28.value / 100;
val28a=parseFloat(val28).toFixed(2);
val28b = precio28.value - val28a;
total28 = val28b * cantidad28.value;
if(total28 != 0 || des28.value == 100)
{
document.getElementById('tot28').value = parseFloat(total28).toFixed(2);
if(des28==0)
{document.getElementById('iva28').value = precio28.value;}
else
{document.getElementById('iva28').value = parseFloat(val28b).toFixed(2);}
}
precio29 = document.getElementById('precl29');
cantidad29 = document.getElementById('cant29');
des29 = document.getElementById('desc29');
iva29 = document.getElementById('iva29');
val29 = precio29.value * des29.value / 100;
val29a=parseFloat(val29).toFixed(2);
val29b = precio29.value - val29a;
total29 = val29b * cantidad29.value;
if(total29 != 0 || des29.value == 100)
{
document.getElementById('tot29').value = parseFloat(total29).toFixed(2);
if(des29==0)
{document.getElementById('iva29').value = precio29.value;}
else
{document.getElementById('iva29').value = parseFloat(val29b).toFixed(2);}
}
precio30 = document.getElementById('precl30');
cantidad30 = document.getElementById('cant30');
des30 = document.getElementById('desc30');
iva30 = document.getElementById('iva30');
val30 = precio30.value * des30.value / 100;
val30a=parseFloat(val30).toFixed(2);
val30b = precio30.value - val30a;
total30 = val30b * cantidad30.value;
if(total30 != 0 || des30.value == 100)
{
document.getElementById('tot30').value = parseFloat(total30).toFixed(2);
if(des30==0)
{document.getElementById('iva30').value = precio30.value;}
else
{document.getElementById('iva30').value = parseFloat(val30b).toFixed(2);}
}
precio31 = document.getElementById('precl31');
cantidad31 = document.getElementById('cant31');
des31 = document.getElementById('desc31');
iva31 = document.getElementById('iva31');
val31 = precio31.value * des31.value / 100;
val31a=parseFloat(val31).toFixed(2);
val31b = precio31.value - val31a;
total31 = val31b * cantidad31.value;
if(total31 != 0 || des31.value == 100)
{
document.getElementById('tot31').value = parseFloat(total31).toFixed(2);
if(des31==0)
{document.getElementById('iva31').value = precio31.value;}
else
{document.getElementById('iva31').value = parseFloat(val31b).toFixed(2);}
}
precio32 = document.getElementById('precl32');
cantidad32 = document.getElementById('cant32');
des32 = document.getElementById('desc32');
iva32 = document.getElementById('iva32');
val32 = precio32.value * des32.value / 100;
val32a=parseFloat(val32).toFixed(2);
val32b = precio32.value - val32a;
total32 = val32b * cantidad32.value;
if(total32 != 0 || des32.value == 100)
{
document.getElementById('tot32').value = parseFloat(total32).toFixed(2);
if(des32==0)
{document.getElementById('iva32').value = precio32.value;}
else
{document.getElementById('iva32').value = parseFloat(val32b).toFixed(2);}
}
precio33 = document.getElementById('precl33');
cantidad33 = document.getElementById('cant33');
des33 = document.getElementById('desc33');
iva33 = document.getElementById('iva33');
val33 = precio33.value * des33.value / 100;
val33a=parseFloat(val33).toFixed(2);
val33b = precio33.value - val33a;
total33 = val33b * cantidad33.value;
if(total33 != 0 || des33.value == 100)
{
document.getElementById('tot33').value = parseFloat(total33).toFixed(2);
if(des33==0)
{document.getElementById('iva33').value = precio33.value;}
else
{document.getElementById('iva33').value = parseFloat(val33b).toFixed(2);}
}
precio34 = document.getElementById('precl34');
cantidad34 = document.getElementById('cant34');
des34 = document.getElementById('desc34');
iva34 = document.getElementById('iva34');
val34 = precio34.value * des34.value / 100;
val34a=parseFloat(val34).toFixed(2);
val34b = precio34.value - val34a;
total34 = val34b * cantidad34.value;
if(total34 != 0 || des34.value == 100)
{
document.getElementById('tot34').value = parseFloat(total34).toFixed(2);
if(des34==0)
{document.getElementById('iva34').value = precio34.value;}
else
{document.getElementById('iva34').value = parseFloat(val34b).toFixed(2);}
}
precio35 = document.getElementById('precl35');
cantidad35 = document.getElementById('cant35');
des35 = document.getElementById('desc35');
iva35 = document.getElementById('iva35');
val35 = precio35.value * des35.value / 100;
val35a=parseFloat(val35).toFixed(2);
val35b = precio35.value - val35a;
total35 = val35b * cantidad35.value;
if(total35 != 0 || des35.value == 100)
{
document.getElementById('tot35').value = parseFloat(total35).toFixed(2);
if(des35==0)
{document.getElementById('iva35').value = precio35.value;}
else
{document.getElementById('iva35').value = parseFloat(val35b).toFixed(2);}
}
precio36 = document.getElementById('precl36');
cantidad36 = document.getElementById('cant36');
des36 = document.getElementById('desc36');
iva36 = document.getElementById('iva36');
val36 = precio36.value * des36.value / 100;
val36a=parseFloat(val36).toFixed(2);
val36b = precio36.value - val36a;
total36 = val36b * cantidad36.value;
if(total36 != 0 || des36.value == 100)
{
document.getElementById('tot36').value = parseFloat(total36).toFixed(2);
if(des36==0)
{document.getElementById('iva36').value = precio36.value;}
else
{document.getElementById('iva36').value = parseFloat(val36b).toFixed(2);}
}
precio37 = document.getElementById('precl37');
cantidad37 = document.getElementById('cant37');
des37 = document.getElementById('desc37');
iva37 = document.getElementById('iva37');
val37 = precio37.value * des37.value / 100;
val37a=parseFloat(val37).toFixed(2);
val37b = precio37.value - val37a;
total37 = val37b * cantidad37.value;
if(total37 != 0 || des37.value == 100)
{
document.getElementById('tot37').value = parseFloat(total37).toFixed(2);
if(des37==0)
{document.getElementById('iva37').value = precio37.value;}
else
{document.getElementById('iva37').value = parseFloat(val37b).toFixed(2);}
}
precio38 = document.getElementById('precl38');
cantidad38 = document.getElementById('cant38');
des38 = document.getElementById('desc38');
iva38 = document.getElementById('iva38');
val38 = precio38.value * des38.value / 100;
val38a=parseFloat(val38).toFixed(2);
val38b = precio38.value - val38a;
total38 = val38b * cantidad38.value;
if(total38 != 0 || des38.value == 100)
{
document.getElementById('tot38').value = parseFloat(total38).toFixed(2);
if(des38==0)
{document.getElementById('iva38').value = precio38.value;}
else
{document.getElementById('iva38').value = parseFloat(val38b).toFixed(2);}
}
precio39 = document.getElementById('precl39');
cantidad39 = document.getElementById('cant39');
des39 = document.getElementById('desc39');
iva39 = document.getElementById('iva39');
val39 = precio39.value * des39.value / 100;
val39a=parseFloat(val39).toFixed(2);
val39b = precio39.value - val39a;
total39 = val39b * cantidad39.value;
if(total39 != 0 || des39.value == 100)
{
document.getElementById('tot39').value = parseFloat(total39).toFixed(2);
if(des39==0)
{document.getElementById('iva39').value = precio39.value;}
else
{document.getElementById('iva39').value = parseFloat(val39b).toFixed(2);}
}
precio40 = document.getElementById('precl40');
cantidad40 = document.getElementById('cant40');
des40 = document.getElementById('desc40');
iva40 = document.getElementById('iva40');
val40 = precio40.value * des40.value / 100;
val40a=parseFloat(val40).toFixed(2);
val40b = precio40.value - val40a;
total40 = val40b * cantidad40.value;
if(total40 != 0 || des40.value == 100)
{
document.getElementById('tot40').value = parseFloat(total40).toFixed(2);
if(des40==0)
{document.getElementById('iva40').value = precio40.value;}
else
{document.getElementById('iva40').value = parseFloat(val40b).toFixed(2);}
}
precio41 = document.getElementById('precl41');
cantidad41 = document.getElementById('cant41');
des41 = document.getElementById('desc41');
iva41 = document.getElementById('iva41');
val41 = precio41.value * des41.value / 100;
val41a=parseFloat(val41).toFixed(2);
val41b = precio41.value - val41a;
total41 = val41b * cantidad41.value;
if(total41 != 0 || des41.value == 100)
{
document.getElementById('tot41').value = parseFloat(total41).toFixed(2);
if(des41==0)
{document.getElementById('iva41').value = precio41.value;}
else
{document.getElementById('iva41').value = parseFloat(val41b).toFixed(2);}
}
precio42 = document.getElementById('precl42');
cantidad42 = document.getElementById('cant42');
des42 = document.getElementById('desc42');
iva42 = document.getElementById('iva42');
val42 = precio42.value * des42.value / 100;
val42a=parseFloat(val42).toFixed(2);
val42b = precio42.value - val42a;
total42 = val42b * cantidad42.value;
if(total42 != 0 || des42.value == 100)
{
document.getElementById('tot42').value = parseFloat(total42).toFixed(2);
if(des42==0)
{document.getElementById('iva42').value = precio42.value;}
else
{document.getElementById('iva42').value = parseFloat(val42b).toFixed(2);}
}
precio43 = document.getElementById('precl43');
cantidad43 = document.getElementById('cant43');
des43 = document.getElementById('desc43');
iva43 = document.getElementById('iva43');
val43 = precio43.value * des43.value / 100;
val43a=parseFloat(val43).toFixed(2);
val43b = precio43.value - val43a;
total43 = val43b * cantidad43.value;
if(total43 != 0 || des43.value == 100)
{
document.getElementById('tot43').value = parseFloat(total43).toFixed(2);
if(des43==0)
{document.getElementById('iva43').value = precio43.value;}
else
{document.getElementById('iva43').value = parseFloat(val43b).toFixed(2);}
}
precio44 = document.getElementById('precl44');
cantidad44 = document.getElementById('cant44');
des44 = document.getElementById('desc44');
iva44 = document.getElementById('iva44');
val44 = precio44.value * des44.value / 100;
val44a=parseFloat(val44).toFixed(2);
val44b = precio44.value - val44a;
total44 = val44b * cantidad44.value;
if(total44 != 0 || des44.value == 100)
{
document.getElementById('tot44').value = parseFloat(total44).toFixed(2);
if(des44==0)
{document.getElementById('iva44').value = precio44.value;}
else
{document.getElementById('iva44').value = parseFloat(val44b).toFixed(2);}
}
precio45 = document.getElementById('precl45');
cantidad45 = document.getElementById('cant45');
des45 = document.getElementById('desc45');
iva45 = document.getElementById('iva45');
val45 = precio45.value * des45.value / 100;
val45a=parseFloat(val45).toFixed(2);
val45b = precio45.value - val45a;
total45 = val45b * cantidad45.value;
if(total45 != 0 || des45.value == 100)
{
document.getElementById('tot45').value = parseFloat(total45).toFixed(2);
if(des45==0)
{document.getElementById('iva45').value = precio45.value;}
else
{document.getElementById('iva45').value = parseFloat(val45b).toFixed(2);}
}
precio46 = document.getElementById('precl46');
cantidad46 = document.getElementById('cant46');
des46 = document.getElementById('desc46');
iva46 = document.getElementById('iva46');
val46 = precio46.value * des46.value / 100;
val46a=parseFloat(val46).toFixed(2);
val46b = precio46.value - val46a;
total46 = val46b * cantidad46.value;
if(total46 != 0 || des46.value == 100)
{
document.getElementById('tot46').value = parseFloat(total46).toFixed(2);
if(des46==0)
{document.getElementById('iva46').value = precio46.value;}
else
{document.getElementById('iva46').value = parseFloat(val46b).toFixed(2);}
}
precio47 = document.getElementById('precl47');
cantidad47 = document.getElementById('cant47');
des47 = document.getElementById('desc47');
iva47 = document.getElementById('iva47');
val47 = precio47.value * des47.value / 100;
val47a=parseFloat(val47).toFixed(2);
val47b = precio47.value - val47a;
total47 = val47b * cantidad47.value;
if(total47 != 0 || des47.value == 100)
{
document.getElementById('tot47').value = parseFloat(total47).toFixed(2);
if(des47==0)
{document.getElementById('iva47').value = precio47.value;}
else
{document.getElementById('iva47').value = parseFloat(val47b).toFixed(2);}
}
precio48 = document.getElementById('precl48');
cantidad48 = document.getElementById('cant48');
des48 = document.getElementById('desc48');
iva48 = document.getElementById('iva48');
val48 = precio48.value * des48.value / 100;
val48a=parseFloat(val48).toFixed(2);
val48b = precio48.value - val48a;
total48 = val48b * cantidad48.value;
if(total48 != 0 || des48.value == 100)
{
document.getElementById('tot48').value = parseFloat(total48).toFixed(2);
if(des48==0)
{document.getElementById('iva48').value = precio48.value;}
else
{document.getElementById('iva48').value = parseFloat(val48b).toFixed(2);}
}
precio49 = document.getElementById('precl49');
cantidad49 = document.getElementById('cant49');
des49 = document.getElementById('desc49');
iva49 = document.getElementById('iva49');
val49 = precio49.value * des49.value / 100;
val49a=parseFloat(val49).toFixed(2);
val49b = precio49.value - val49a;
total49 = val49b * cantidad49.value;
if(total49 != 0 || des49.value == 100)
{
document.getElementById('tot49').value = parseFloat(total49).toFixed(2);
if(des49==0)
{document.getElementById('iva49').value = precio49.value;}
else
{document.getElementById('iva49').value = parseFloat(val49b).toFixed(2);}
}

precio50 = document.getElementById('precl50');
cantidad50 = document.getElementById('cant50');
des50 = document.getElementById('desc50');
iva50 = document.getElementById('iva50');
val50 = precio50.value * des50.value / 100;
val50a=parseFloat(val50).toFixed(2);
val50b = precio50.value - val50a;
total50 = val50b * cantidad50.value;
if(total50 != 0 || des50.value == 100)
{
document.getElementById('tot50').value = parseFloat(total50).toFixed(2);
if(des50==0)
{document.getElementById('iva50').value = precio50.value;}
else
{document.getElementById('iva50').value = parseFloat(val50b).toFixed(2);}
}

precio51 = document.getElementById('precl51');
cantidad51 = document.getElementById('cant51');
des51 = document.getElementById('desc51');
iva51 = document.getElementById('iva51');
val51 = precio51.value * des51.value / 100;
val51a=parseFloat(val51).toFixed(2);
val51b = precio51.value - val51a;
total51 = val51b * cantidad51.value;
if(total51 != 0 || des51.value == 100)
{
document.getElementById('tot51').value = parseFloat(total51).toFixed(2);
if(des51==0)
{document.getElementById('iva51').value = precio51.value;}
else
{document.getElementById('iva51').value = parseFloat(val51b).toFixed(2);}
}

precio52 = document.getElementById('precl52');
cantidad52 = document.getElementById('cant52');
des52 = document.getElementById('desc52');
iva52 = document.getElementById('iva52');
val52 = precio52.value * des52.value / 100;
val52a=parseFloat(val52).toFixed(2);
val52b = precio52.value - val52a;
total52 = val52b * cantidad52.value;
if(total52 != 0 || des52.value == 100)
{
document.getElementById('tot52').value = parseFloat(total52).toFixed(2);
if(des52==0)
{document.getElementById('iva52').value = precio52.value;}
else
{document.getElementById('iva52').value = parseFloat(val52b).toFixed(2);}
}

precio53 = document.getElementById('precl53');
cantidad53 = document.getElementById('cant53');
des53 = document.getElementById('desc53');
iva53 = document.getElementById('iva53');
val53 = precio53.value * des53.value / 100;
val53a=parseFloat(val53).toFixed(2);
val53b = precio53.value - val53a;
total53 = val53b * cantidad53.value;
if(total53 != 0 || des53.value == 100)
{
document.getElementById('tot53').value = parseFloat(total53).toFixed(2);
if(des53==0)
{document.getElementById('iva53').value = precio53.value;}
else
{document.getElementById('iva53').value = parseFloat(val53b).toFixed(2);}
}

precio54 = document.getElementById('precl54');
cantidad54 = document.getElementById('cant54');
des54 = document.getElementById('desc54');
iva54 = document.getElementById('iva54');
val54 = precio54.value * des54.value / 100;
val54a=parseFloat(val54).toFixed(2);
val54b = precio54.value - val54a;
total54 = val54b * cantidad54.value;
if(total54 != 0 || des54.value == 100)
{
document.getElementById('tot54').value = parseFloat(total54).toFixed(2);
if(des54==0)
{document.getElementById('iva54').value = precio54.value;}
else
{document.getElementById('iva54').value = parseFloat(val54b).toFixed(2);}
}

precio55 = document.getElementById('precl55');
cantidad55 = document.getElementById('cant55');
des55 = document.getElementById('desc55');
iva55 = document.getElementById('iva55');
val55 = precio55.value * des55.value / 100;
val55a=parseFloat(val55).toFixed(2);
val55b = precio55.value - val55a;
total55 = val55b * cantidad55.value;
if(total55 != 0 || des55.value == 100)
{
document.getElementById('tot55').value = parseFloat(total55).toFixed(2);
if(des55==0)
{document.getElementById('iva55').value = precio55.value;}
else
{document.getElementById('iva55').value = parseFloat(val55b).toFixed(2);}
}

precio56 = document.getElementById('precl56');
cantidad56 = document.getElementById('cant56');
des56 = document.getElementById('desc56');
iva56 = document.getElementById('iva56');
val56 = precio56.value * des56.value / 100;
val56a=parseFloat(val56).toFixed(2);
val56b = precio56.value - val56a;
total56 = val56b * cantidad56.value;
if(total56 != 0 || des56.value == 100)
{
document.getElementById('tot56').value = parseFloat(total56).toFixed(2);
if(des56==0)
{document.getElementById('iva56').value = precio56.value;}
else
{document.getElementById('iva56').value = parseFloat(val56b).toFixed(2);}
}

precio57 = document.getElementById('precl57');
cantidad57 = document.getElementById('cant57');
des57 = document.getElementById('desc57');
iva57 = document.getElementById('iva57');
val57 = precio57.value * des57.value / 100;
val57a=parseFloat(val57).toFixed(2);
val57b = precio57.value - val57a;
total57 = val57b * cantidad57.value;
if(total57 != 0 || des57.value == 100)
{
document.getElementById('tot57').value = parseFloat(total57).toFixed(2);
if(des57==0)
{document.getElementById('iva57').value = precio57.value;}
else
{document.getElementById('iva57').value = parseFloat(val57b).toFixed(2);}
}

precio58 = document.getElementById('precl58');
cantidad58 = document.getElementById('cant58');
des58 = document.getElementById('desc58');
iva58 = document.getElementById('iva58');
val58 = precio58.value * des58.value / 100;
val58a=parseFloat(val58).toFixed(2);
val58b = precio58.value - val58a;
total58 = val58b * cantidad58.value;
if(total58 != 0 || des58.value == 100)
{
document.getElementById('tot58').value = parseFloat(total58).toFixed(2);
if(des58==0)
{document.getElementById('iva58').value = precio58.value;}
else
{document.getElementById('iva58').value = parseFloat(val58b).toFixed(2);}
}

precio59 = document.getElementById('precl59');
cantidad59 = document.getElementById('cant59');
des59 = document.getElementById('desc59');
iva59 = document.getElementById('iva59');
val59 = precio59.value * des59.value / 100;
val59a=parseFloat(val59).toFixed(2);
val59b = precio59.value - val59a;
total59 = val59b * cantidad59.value;
if(total59 != 0 || des59.value == 100)
{
document.getElementById('tot59').value = parseFloat(total59).toFixed(2);
if(des59==0)
{document.getElementById('iva59').value = precio59.value;}
else
{document.getElementById('iva59').value = parseFloat(val59b).toFixed(2);}
}

precio60 = document.getElementById('precl60');
cantidad60 = document.getElementById('cant60');
des60 = document.getElementById('desc60');
iva60 = document.getElementById('iva60');
val60 = precio60.value * des60.value / 100;
val60a=parseFloat(val60).toFixed(2);
val60b = precio60.value - val60a;
total60 = val60b * cantidad60.value;
if(total60 != 0 || des60.value == 100)
{
document.getElementById('tot60').value = parseFloat(total60).toFixed(2);
if(des60==0)
{document.getElementById('iva60').value = precio60.value;}
else
{document.getElementById('iva60').value = parseFloat(val60b).toFixed(2);}
}

precio61 = document.getElementById('precl61');
cantidad61 = document.getElementById('cant61');
des61 = document.getElementById('desc61');
iva61 = document.getElementById('iva61');
val61 = precio61.value * des61.value / 100;
val61a=parseFloat(val61).toFixed(2);
val61b = precio61.value - val61a;
total61 = val61b * cantidad61.value;
if(total61 != 0 || des61.value == 100)
{
document.getElementById('tot61').value = parseFloat(total61).toFixed(2);
if(des61==0)
{document.getElementById('iva61').value = precio61.value;}
else
{document.getElementById('iva61').value = parseFloat(val61b).toFixed(2);}
}

precio62 = document.getElementById('precl62');
cantidad62 = document.getElementById('cant62');
des62 = document.getElementById('desc62');
iva62 = document.getElementById('iva62');
val62 = precio62.value * des62.value / 100;
val62a=parseFloat(val62).toFixed(2);
val62b = precio62.value - val62a;
total62 = val62b * cantidad62.value;
if(total62 != 0 || des62.value == 100)
{
document.getElementById('tot62').value = parseFloat(total62).toFixed(2);
if(des62==0)
{document.getElementById('iva62').value = precio62.value;}
else
{document.getElementById('iva62').value = parseFloat(val62b).toFixed(2);}
}

precio63 = document.getElementById('precl63');
cantidad63 = document.getElementById('cant63');
des63 = document.getElementById('desc63');
iva63 = document.getElementById('iva63');
val63 = precio63.value * des63.value / 100;
val63a=parseFloat(val63).toFixed(2);
val63b = precio63.value - val63a;
total63 = val63b * cantidad63.value;
if(total63 != 0 || des63.value == 100)
{
document.getElementById('tot63').value = parseFloat(total63).toFixed(2);
if(des63==0)
{document.getElementById('iva63').value = precio60.value;}
else
{document.getElementById('iva63').value = parseFloat(val60b).toFixed(2);}
}

precio64 = document.getElementById('precl64');
cantidad64 = document.getElementById('cant64');
des64 = document.getElementById('desc64');
iva64 = document.getElementById('iva64');
val64 = precio64.value * des64.value / 100;
val64a=parseFloat(val64).toFixed(2);
val64b = precio64.value - val64a;
total64 = val64b * cantidad64.value;
if(total64 != 0 || des64.value == 100)
{
document.getElementById('tot64').value = parseFloat(total64).toFixed(2);
if(des64==0)
{document.getElementById('iva64').value = precio64.value;}
else
{document.getElementById('iva64').value = parseFloat(val64b).toFixed(2);}
}

precio65 = document.getElementById('precl65');
cantidad65 = document.getElementById('cant65');
des65 = document.getElementById('desc65');
iva65 = document.getElementById('iva65');
val65 = precio65.value * des65.value / 100;
val65a=parseFloat(val65).toFixed(2);
val65b = precio65.value - val65a;
total65 = val65b * cantidad65.value;
if(total65 != 0 || des65.value == 100)
{
document.getElementById('tot65').value = parseFloat(total65).toFixed(2);
if(des65==0)
{document.getElementById('iva65').value = precio65.value;}
else
{document.getElementById('iva65').value = parseFloat(val65b).toFixed(2);}
}

precio66 = document.getElementById('precl66');
cantidad66 = document.getElementById('cant66');
des66 = document.getElementById('desc66');
iva66 = document.getElementById('iva66');
val66 = precio66.value * des66.value / 100;
val66a=parseFloat(val66).toFixed(2);
val66b = precio66.value - val66a;
total66 = val66b * cantidad66.value;
if(total66 != 0 || des66.value == 100)
{
document.getElementById('tot66').value = parseFloat(total66).toFixed(2);
if(des66==0)
{document.getElementById('iva66').value = precio66.value;}
else
{document.getElementById('iva66').value = parseFloat(val66b).toFixed(2);}
}

precio67 = document.getElementById('precl67');
cantidad67 = document.getElementById('cant67');
des67 = document.getElementById('desc67');
iva67 = document.getElementById('iva67');
val67 = precio67.value * des67.value / 100;
val67a=parseFloat(val67).toFixed(2);
val67b = precio67.value - val67a;
total67 = val67b * cantidad67.value;
if(total67 != 0 || des67.value == 100)
{
document.getElementById('tot67').value = parseFloat(total67).toFixed(2);
if(des67==0)
{document.getElementById('iva67').value = precio67.value;}
else
{document.getElementById('iva67').value = parseFloat(val67b).toFixed(2);}
}

precio68 = document.getElementById('precl68');
cantidad68 = document.getElementById('cant68');
des68 = document.getElementById('desc68');
iva68 = document.getElementById('iva68');
val68 = precio68.value * des68.value / 100;
val68a=parseFloat(val68).toFixed(2);
val68b = precio68.value - val68a;
total68 = val68b * cantidad68.value;
if(total68 != 0 || des68.value == 100)
{
document.getElementById('tot68').value = parseFloat(total68).toFixed(2);
if(des68==0)
{document.getElementById('iva68').value = precio68.value;}
else
{document.getElementById('iva68').value = parseFloat(val68b).toFixed(2);}
}

precio69 = document.getElementById('precl69');
cantidad69 = document.getElementById('cant69');
des69 = document.getElementById('desc69');
iva69 = document.getElementById('iva69');
val69 = precio69.value * des69.value / 100;
val69a=parseFloat(val69).toFixed(2);
val69b = precio69.value - val69a;
total69 = val69b * cantidad69.value;
if(total69 != 0 || des69.value == 100)
{
document.getElementById('tot69').value = parseFloat(total69).toFixed(2);
if(des69==0)
{document.getElementById('iva69').value = precio69.value;}
else
{document.getElementById('iva69').value = parseFloat(val69b).toFixed(2);}
}

precio70 = document.getElementById('precl70');
cantidad70 = document.getElementById('cant70');
des70 = document.getElementById('desc70');
iva70 = document.getElementById('iva70');
val70 = precio70.value * des70.value / 100;
val70a=parseFloat(val70).toFixed(2);
val70b = precio70.value - val70a;
total70 = val70b * cantidad70.value;
if(total70 != 0 || des70.value == 100)
{
document.getElementById('tot70').value = parseFloat(total70).toFixed(2);
if(des70==0)
{document.getElementById('iva70').value = precio70.value;}
else
{document.getElementById('iva70').value = parseFloat(val70b).toFixed(2);}
}

precio71 = document.getElementById('precl71');
cantidad71 = document.getElementById('cant71');
des71 = document.getElementById('desc71');
iva71 = document.getElementById('iva71');
val71 = precio71.value * des71.value / 100;
val71a=parseFloat(val71).toFixed(2);
val71b = precio71.value - val71a;
total71 = val71b * cantidad71.value;
if(total71 != 0 || des71.value == 100)
{
document.getElementById('tot71').value = parseFloat(total71).toFixed(2);
if(des71==0)
{document.getElementById('iva71').value = precio70.value;}
else
{document.getElementById('iva71').value = parseFloat(val70b).toFixed(2);}
}

precio72 = document.getElementById('precl72');
cantidad72 = document.getElementById('cant72');
des72 = document.getElementById('desc72');
iva72 = document.getElementById('iva72');
val72 = precio72.value * des72.value / 100;
val72a=parseFloat(val72).toFixed(2);
val72b = precio72.value - val72a;
total72 = val72b * cantidad72.value;
if(total72 != 0 || des72.value == 100)
{
document.getElementById('tot72').value = parseFloat(total72).toFixed(2);
if(des72==0)
{document.getElementById('iva72').value = precio72.value;}
else
{document.getElementById('iva72').value = parseFloat(val72b).toFixed(2);}
}

precio73 = document.getElementById('precl73');
cantidad73 = document.getElementById('cant73');
des73 = document.getElementById('desc73');
iva73 = document.getElementById('iva73');
val73 = precio73.value * des73.value / 100;
val73a=parseFloat(val73).toFixed(2);
val73b = precio73.value - val73a;
total73 = val73b * cantidad73.value;
if(total73 != 0 || des73.value == 100)
{
document.getElementById('tot73').value = parseFloat(total73).toFixed(2);
if(des73==0)
{document.getElementById('iva73').value = precio73.value;}
else
{document.getElementById('iva73').value = parseFloat(val73b).toFixed(2);}
}

precio74 = document.getElementById('precl74');
cantidad74 = document.getElementById('cant74');
des74 = document.getElementById('desc74');
iva74 = document.getElementById('iva74');
val74 = precio74.value * des74.value / 100;
val74a=parseFloat(val74).toFixed(2);
val74b = precio74.value - val74a;
total74 = val74b * cantidad74.value;
if(total74 != 0 || des74.value == 100)
{
document.getElementById('tot74').value = parseFloat(total74).toFixed(2);
if(des74==0)
{document.getElementById('iva74').value = precio74.value;}
else
{document.getElementById('iva74').value = parseFloat(val74b).toFixed(2);}
}

precio75 = document.getElementById('precl75');
cantidad75 = document.getElementById('cant75');
des75 = document.getElementById('desc75');
iva75 = document.getElementById('iva75');
val75 = precio75.value * des75.value / 100;
val75a=parseFloat(val75).toFixed(2);
val75b = precio75.value - val75a;
total75 = val75b * cantidad75.value;
if(total75 != 0 || des75.value == 100)
{
document.getElementById('tot75').value = parseFloat(total75).toFixed(2);
if(des75==0)
{document.getElementById('iva75').value = precio75.value;}
else
{document.getElementById('iva75').value = parseFloat(val75b).toFixed(2);}
}

despachar = document.getElementById('despachar').value;
if(despachar == 'Fabrica')
{
	document.getElementById('despachar1').value = 'Fabrica';
	document.getElementById('despachar1').readOnly = 'readonly';
}
if(despachar == 'Los Conquistadores')
{
  document.getElementById('despachar1').value = '77.003.680-1';
	document.getElementById('despachar_nombre').value = 'Multioficina';
	document.getElementById('despachar_direccion').value = 'Av. Los Conquistadores 2635';
	document.getElementById('despachar_comuna').value = 'San Miguel ';
	document.getElementById('despachar1').readOnly = 'readonly';
}
if(despachar == 'La Dehesa')
{
	document.getElementById('despachar1').value = 'La Dehesa';
	document.getElementById('despachar1').readOnly = 'readonly';
}
if(despachar == 'Otro')
{
	document.getElementById('despachar1').value = 'Otro';
	document.getElementById('despachar1').readOnly = '';
}

final();
}
//////////////////////////////


function seleccion1()
{
cond = document.getElementById('cond').selectedIndex;
if(cond == '1')
{
	document.getElementById('condicion').value = 'A Definir';
}
}
/////////////////
function final()
{	
  descuento1 = document.getElementById('descuento1');
  descuento2 = document.getElementById('descuento2');
  
	ivaf = document.getElementById('ivaf');
	total1 = document.getElementById('tot1');
	total2 = document.getElementById('tot2');
	total3 = document.getElementById('tot3');
	total4 = document.getElementById('tot4');
	total5 = document.getElementById('tot5');
	total6 = document.getElementById('tot6');
	total7 = document.getElementById('tot7');
	total8 = document.getElementById('tot8');
	total9 = document.getElementById('tot9');
	total10 = document.getElementById('tot10');
	total11 = document.getElementById('tot11');
	total12 = document.getElementById('tot12');
	total13 = document.getElementById('tot13');
	total14 = document.getElementById('tot14');
	total15 = document.getElementById('tot15');
	total16 = document.getElementById('tot16');
	total17 = document.getElementById('tot17');
	total18 = document.getElementById('tot18');
	total19 = document.getElementById('tot19');
	total20 = document.getElementById('tot20');
	total21 = document.getElementById('tot21');
	total22 = document.getElementById('tot22');
	total23 = document.getElementById('tot23');
	total24 = document.getElementById('tot24');
	total25 = document.getElementById('tot25');
	total26 = document.getElementById('tot26');
	total27 = document.getElementById('tot27');
	total28 = document.getElementById('tot28');
	total29 = document.getElementById('tot29');
	total30 = document.getElementById('tot30');
  total31 = document.getElementById('tot31');
	total32 = document.getElementById('tot32');
	total33 = document.getElementById('tot33');
	total34 = document.getElementById('tot34');
	total35 = document.getElementById('tot35');
	total36 = document.getElementById('tot36');
	total37 = document.getElementById('tot37');
	total38 = document.getElementById('tot38');
	total39 = document.getElementById('tot39');
	total40 = document.getElementById('tot40');
  total41 = document.getElementById('tot41');
	total42 = document.getElementById('tot42');
	total43 = document.getElementById('tot43');
	total44 = document.getElementById('tot44');
	total45 = document.getElementById('tot45');
	total46 = document.getElementById('tot46');
	total47 = document.getElementById('tot47');
	total48 = document.getElementById('tot48');
	total49 = document.getElementById('tot49');
	total50 = document.getElementById('tot50');
	
	total51 = document.getElementById('tot51');
	total52 = document.getElementById('tot52');
	total53 = document.getElementById('tot53');
	total54 = document.getElementById('tot54');
	total55 = document.getElementById('tot55');
	total56 = document.getElementById('tot56');
	total57 = document.getElementById('tot57');
	total58 = document.getElementById('tot58');
	total59 = document.getElementById('tot59');
	total60 = document.getElementById('tot60');
	total61 = document.getElementById('tot61');
	total62 = document.getElementById('tot62');
	total63 = document.getElementById('tot63');
	total64 = document.getElementById('tot64');
	total65 = document.getElementById('tot65');
	total66 = document.getElementById('tot66');
	total67 = document.getElementById('tot67');
	total68 = document.getElementById('tot68');
	total69 = document.getElementById('tot69');
	total70 = document.getElementById('tot70');
	total71 = document.getElementById('tot71');
	total72 = document.getElementById('tot72');
	total73 = document.getElementById('tot73');
	total74 = document.getElementById('tot74');
	total75 = document.getElementById('tot75');
  if(total1.value == ""){ total1 = 0;} else { total1 = document.getElementById('tot1').value; }
  if(total2.value == ""){ total2 = 0;} else { total2 = document.getElementById('tot2').value; }
	if(total3.value == ""){ total3 = 0;} else { total3 = document.getElementById('tot3').value; }
	if(total4.value == ""){ total4 = 0;} else { total4 = document.getElementById('tot4').value; }
	if(total5.value == ""){ total5 = 0;} else { total5 = document.getElementById('tot5').value; }
	if(total6.value == ""){ total6 = 0;} else { total6 = document.getElementById('tot6').value; }
	if(total7.value == ""){ total7 = 0;} else { total7 = document.getElementById('tot7').value; }
	if(total8.value == ""){ total8 = 0;} else { total8 = document.getElementById('tot8').value; }
	if(total9.value == ""){ total9 = 0;} else { total9 = document.getElementById('tot9').value; }
	if(total10.value == ""){ total10 = 0;} else { total10 = document.getElementById('tot10').value; }
	if(total11.value == ""){ total11 = 0;} else { total11 = document.getElementById('tot11').value; }
  if(total12.value == ""){ total12 = 0;} else { total12 = document.getElementById('tot12').value; }
	if(total13.value == ""){ total13 = 0;} else { total13 = document.getElementById('tot13').value; }
	if(total14.value == ""){ total14 = 0;} else { total14 = document.getElementById('tot14').value; }
	if(total15.value == ""){ total15 = 0;} else { total15 = document.getElementById('tot15').value; }
	if(total16.value == ""){ total16 = 0;} else { total16 = document.getElementById('tot16').value; }
	if(total17.value == ""){ total17 = 0;} else { total17 = document.getElementById('tot17').value; }
	if(total18.value == ""){ total18 = 0;} else { total18 = document.getElementById('tot18').value; }
	if(total19.value == ""){ total19 = 0;} else { total19 = document.getElementById('tot19').value; }
	if(total20.value == ""){ total20 = 0;} else { total20 = document.getElementById('tot20').value; }
  if(total21.value == ""){ total21 = 0;} else { total21 = document.getElementById('tot21').value; }
  if(total22.value == ""){ total22 = 0;} else { total22 = document.getElementById('tot22').value; }
	if(total23.value == ""){ total23 = 0;} else { total23 = document.getElementById('tot23').value; }
	if(total24.value == ""){ total24 = 0;} else { total24 = document.getElementById('tot24').value; }
	if(total25.value == ""){ total25 = 0;} else { total25 = document.getElementById('tot25').value; }
	if(total26.value == ""){ total26 = 0;} else { total26 = document.getElementById('tot26').value; }
	if(total27.value == ""){ total27 = 0;} else { total27 = document.getElementById('tot27').value; }
	if(total28.value == ""){ total28 = 0;} else { total28 = document.getElementById('tot28').value; }
	if(total29.value == ""){ total29 = 0;} else { total29 = document.getElementById('tot29').value; }
	if(total30.value == ""){ total30 = 0;} else { total30 = document.getElementById('tot30').value; }
	if(total31.value == ""){ total31 = 0;} else { total31 = document.getElementById('tot31').value; }
  if(total32.value == ""){ total32 = 0;} else { total32 = document.getElementById('tot32').value; }
	if(total33.value == ""){ total33 = 0;} else { total33 = document.getElementById('tot33').value; }
	if(total34.value == ""){ total34 = 0;} else { total34 = document.getElementById('tot34').value; }
	if(total35.value == ""){ total35 = 0;} else { total35 = document.getElementById('tot35').value; }
	if(total36.value == ""){ total36 = 0;} else { total36 = document.getElementById('tot36').value; }
	if(total37.value == ""){ total37 = 0;} else { total37 = document.getElementById('tot37').value; }
	if(total38.value == ""){ total38 = 0;} else { total38 = document.getElementById('tot38').value; }
	if(total39.value == ""){ total39 = 0;} else { total39 = document.getElementById('tot39').value; }
	if(total40.value == ""){ total40 = 0;} else { total40 = document.getElementById('tot40').value; }
  if(total41.value == ""){ total41 = 0;} else { total41 = document.getElementById('tot41').value; }
  if(total42.value == ""){ total42 = 0;} else { total42 = document.getElementById('tot42').value; }
	if(total43.value == ""){ total43 = 0;} else { total43 = document.getElementById('tot43').value; }
	if(total44.value == ""){ total44 = 0;} else { total44 = document.getElementById('tot44').value; }
	if(total45.value == ""){ total45 = 0;} else { total45 = document.getElementById('tot45').value; }
	if(total46.value == ""){ total46 = 0;} else { total46 = document.getElementById('tot46').value; }
	if(total47.value == ""){ total47 = 0;} else { total47 = document.getElementById('tot47').value; }
	if(total48.value == ""){ total48 = 0;} else { total48 = document.getElementById('tot48').value; }
	if(total49.value == ""){ total49 = 0;} else { total49 = document.getElementById('tot49').value; }
	if(total50.value == ""){ total50 = 0;} else { total50 = document.getElementById('tot50').value; }
	
	if(total51.value == ""){ total51 = 0;} else { total51 = document.getElementById('tot51').value; }
  if(total52.value == ""){ total52 = 0;} else { total52 = document.getElementById('tot52').value; }
	if(total53.value == ""){ total53 = 0;} else { total53 = document.getElementById('tot53').value; }
	if(total54.value == ""){ total54 = 0;} else { total54 = document.getElementById('tot54').value; }
	if(total55.value == ""){ total55 = 0;} else { total55 = document.getElementById('tot55').value; }
	if(total56.value == ""){ total56 = 0;} else { total56 = document.getElementById('tot56').value; }
	if(total57.value == ""){ total57 = 0;} else { total57 = document.getElementById('tot57').value; }
	if(total58.value == ""){ total58 = 0;} else { total58 = document.getElementById('tot58').value; }
	if(total59.value == ""){ total59 = 0;} else { total59 = document.getElementById('tot59').value; }
	if(total60.value == ""){ total60 = 0;} else { total60 = document.getElementById('tot60').value; }
	if(total61.value == ""){ total61 = 0;} else { total61 = document.getElementById('tot61').value; }
  if(total62.value == ""){ total62 = 0;} else { total62 = document.getElementById('tot62').value; }
	if(total63.value == ""){ total63 = 0;} else { total63 = document.getElementById('tot63').value; }
	if(total64.value == ""){ total64 = 0;} else { total64 = document.getElementById('tot64').value; }
	if(total65.value == ""){ total65 = 0;} else { total65 = document.getElementById('tot65').value; }
	if(total66.value == ""){ total66 = 0;} else { total66 = document.getElementById('tot66').value; }
	if(total67.value == ""){ total67 = 0;} else { total67 = document.getElementById('tot67').value; }
	if(total68.value == ""){ total68 = 0;} else { total68 = document.getElementById('tot68').value; }
	if(total69.value == ""){ total69 = 0;} else { total69 = document.getElementById('tot69').value; }
	if(total70.value == ""){ total70 = 0;} else { total70 = document.getElementById('tot70').value; }
  if(total71.value == ""){ total71 = 0;} else { total71 = document.getElementById('tot71').value; }
  if(total72.value == ""){ total72 = 0;} else { total72 = document.getElementById('tot72').value; }
	if(total73.value == ""){ total73 = 0;} else { total73 = document.getElementById('tot73').value; }
	if(total74.value == ""){ total74 = 0;} else { total74 = document.getElementById('tot74').value; }
	if(total75.value == ""){ total75 = 0;} else { total75 = document.getElementById('tot75').value; }
	

fin = parseFloat(parseFloat(total1) + parseFloat(total2) + parseFloat(total3) + parseFloat (total4) + parseFloat(total5) + parseFloat(total6) + parseFloat(total7) + parseFloat(total8) + parseFloat(total9) + parseFloat(total10) + parseFloat(total11) + parseFloat(total12) + parseFloat(total13) + parseFloat (total14) + parseFloat(total15) + parseFloat(total16) + parseFloat(total17) + parseFloat(total18) + parseFloat(total19) + parseFloat(total20)+parseFloat(total21) + parseFloat(total22) + parseFloat(total23) + parseFloat(total24) + parseFloat(total25) + parseFloat(total26) + parseFloat(total27) + parseFloat(total28) + parseFloat(total29) + parseFloat(total30) + parseFloat(total31) + parseFloat(total32) + parseFloat(total33) + parseFloat(total34) + parseFloat(total35) + parseFloat(total36) + parseFloat(total37) + parseFloat(total38) + parseFloat(total39) + parseFloat(total40)+ parseFloat(total41) + parseFloat(total42) + parseFloat(total43) + parseFloat(total44) + parseFloat(total45)+ parseFloat(total46) + parseFloat(total47) + parseFloat(total48) + parseFloat(total49 )+ parseFloat(total50) + parseFloat(total51) + parseFloat(total52) + parseFloat(total53) + parseFloat (total54) + parseFloat(total55) + parseFloat(total56) + parseFloat(total57) + parseFloat(total58) + parseFloat(total59) + parseFloat(total60) + parseFloat(total61) + parseFloat(total62) + parseFloat(total63) + parseFloat (total64) + parseFloat(total65) + parseFloat(total66) + parseFloat(total67) + parseFloat(total68) + parseFloat(total69) + parseFloat(total70)+parseFloat(total71) + parseFloat(total72) + parseFloat(total73) + parseFloat(total74) + parseFloat(total75)).toFixed(2);



if(descuento1.value == "" && ivaf.selectedIndex == "0")
{
		
if(descuento2.value == "")
{
document.getElementById('sub1').value = fin;
document.getElementById('tota').value = fin;
document.getElementById('neto').value = fin;
}
else
{
document.getElementById('sub1').value = fin;
document.getElementById('tota').value = fin - descuento2.value;
document.getElementById('neto').value = fin - descuento2.value;
}

}
if(descuento1.value != "" && ivaf.selectedIndex == "0")
{
if(descuento2.value == "")
{	
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2);
document.getElementById('neto').value = parseFloat(final123).toFixed(2);
document.getElementById('sub1').value = fin;
}
else
{
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('sub1').value = fin;
}
}
if(descuento1.value == "" && ivaf.selectedIndex == "1")
{
	if(descuento2.value == "")
{
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2);
document.getElementById('neto').value = parseFloat(final123).toFixed(2);
document.getElementById('valoriva').value = 0;
document.getElementById('sub1').value = fin;
}
else
{
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('valoriva').value = 0;
document.getElementById('sub1').value = fin;	
}
}
if(descuento1.value != "" && ivaf.selectedIndex == "1")
{
	if(descuento2.value == "")
{	
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2);
document.getElementById('neto').value = parseFloat(final123).toFixed(2);
document.getElementById('valoriva').value = 0;
document.getElementById('sub1').value = fin;
}
else
{
	porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1;
document.getElementById('tota').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2) - descuento2.value;
document.getElementById('valoriva').value = 0;
document.getElementById('sub1').value = fin;
}
}

if(descuento1.value == "" && ivaf.selectedIndex == "2")
{
if(descuento2.value == "")
{
	descuento2.value = '0';
}
	
neto = document.getElementById('neto').value;
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1  - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2); 	
aporcentaje = parseFloat(parseFloat(final123) * 19 / 100).toFixed(2);
aporcentaje1=parseFloat(aporcentaje).toFixed(2);
afinal123 = parseFloat(parseFloat(fin)  + parseFloat(aporcentaje1) -  parseFloat(descuento2.value)).toFixed(2);
afinal1234 = parseFloat(afinal123).toFixed(2);
document.getElementById('tota').value = parseFloat(afinal123).toFixed(2);
document.getElementById('valoriva').value = aporcentaje1;
document.getElementById('sub1').value = fin;
}

if(descuento1.value != "" && ivaf.selectedIndex == "2")
{
	
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1 - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2); 
neto = document.getElementById('neto').value;	
aporcentaje = ((19 * final123) / 100);
aporcentaje1=parseFloat(aporcentaje).toFixed(2);
afinal123 = parseFloat(parseFloat(final123) + parseFloat(aporcentaje1)).toFixed(2);
afinal1234 = parseFloat(afinal123).toFixed(2);
document.getElementById('tota').value = parseFloat(afinal123).toFixed(2);
document.getElementById('valoriva').value = aporcentaje1;
document.getElementById('sub1').value = fin;
}
if(descuento1.value == "" && ivaf.selectedIndex == "3")
{
	if(descuento2.value == "")
{
	descuento2.value = '0';
}
neto = document.getElementById('neto').value;
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1 - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2); 	
aporcentaje = parseFloat(parseFloat(final123) * 10 / 100).toFixed(2);
aporcentaje1=parseFloat(aporcentaje).toFixed(2);
afinal123 = parseFloat(parseFloat(fin) - parseFloat(aporcentaje1) -  parseFloat(descuento2.value)).toFixed(2);
afinal1234 = parseFloat(afinal123).toFixed(2);
document.getElementById('tota').value = parseFloat(afinal123).toFixed(2);
document.getElementById('valoriva').value = aporcentaje1;
document.getElementById('sub1').value = fin;
}

if(descuento1.value != "" && ivaf.selectedIndex == "3")
{
porcentaje = fin * descuento1.value / 100;
porcentaje1=parseFloat(porcentaje).toFixed(2);
final123 = fin - porcentaje1 - descuento2.value;
document.getElementById('neto').value = parseFloat(final123).toFixed(2); 
neto = document.getElementById('neto').value;	
aporcentaje = ((10 *final123) / 100);
aporcentaje1=parseFloat(aporcentaje).toFixed(2);
afinal123 = parseFloat(parseFloat(final123) - parseFloat(aporcentaje1)).toFixed(2);
afinal1234 = parseFloat(afinal123).toFixed(2);
document.getElementById('tota').value = parseFloat(afinal123).toFixed(2);
document.getElementById('valoriva').value = aporcentaje1;
document.getElementById('sub1').value = fin;
}
}




function enviar()
{

  document.getElementById("formulario").submit();

}

/* Valida campos completados*/
$(document).ready(function(){
  $("#proveedor, #despachar,.form1,.form8,.form2").blur(function() {
    $proveedor = $("#proveedor").val();
    $despachar = $("#despachar1").val();


    if($proveedor == "" || $despachar == "")
    { 
      $("#cal").attr("disabled", true);
    }
    else
    {
      $("#cal").attr("disabled", false);  
    }

    for(i=1;i<76;i++)
    {
      $rochaex = $("#resultador"+i).val();
      if($rochaex == "ROCHA NO EXISTE")
      {
        $("#cal").attr("disabled", true);
      }
    }

    for(i=1;i<76;i++)
    {
      $ex = $("#exs"+i).val();
      if($ex == "CODIGO NO EXISTE")
      {
        $("#cal").attr("disabled", true);
      }
    }

    for(i=1;i<76;i++)
    {
      $pl = $("#precl"+i).val();
      if($pl != "")
      {
        if($pl <= 0)
        {
          $("#cal").attr("disabled", true);
        }
      }
    }

  }); 
});


$(document).ready(function(){
  $("#OC").mouseover(function() {
    $proveedor = $("#proveedor").val();
    $despachar = $("#despachar1").val();


    if($proveedor == "" || $despachar == "")
    { 
      $("#cal").attr("disabled", true);
    }
    else
    {
      $("#cal").attr("disabled", false);  
    }

    for(i=1;i<76;i++)
    {
      /*Requerido input rocha*/
      $cod = $("#cod"+i).val();
      $des = $("#des"+i).val();
      $rochaex = $("#resultador"+i).val();


     if($des == "" || $cod == "")
      {
        $("#roch"+i).removeAttr("required");
      
      }
      else if(roch == "")
      {
        $("#roch"+i).attr("required", "true");
    
      }
      else
      {
        $("#roch"+i).attr("required", "true");
      }


      if($rochaex == "ROCHA NO EXISTE")
      {
        $("#cal").attr("disabled", true);
      }
    }

    for(i=1;i<76;i++)
    {
      $ex = $("#exs"+i).val();
      if($ex == "CODIGO NO EXISTE")
      {
        $("#cal").attr("disabled", true);
      }
    }

    for(i=1;i<76;i++)
    {
      $pl = $("#precl"+i).val();
      if($pl != "")
      {
        if($pl <= 0)
        {
          $("#cal").attr("disabled", true);
        }
      }
    }

  }); 
});

/*
function es_vacio2()
{
  
var proveedor = document.getElementById('proveedor') ;
var despachar = document.getElementById('despachar') ;
var cal = document.getElementById('cal') ;
                                      

   if (proveedor.value != "" & despachar.value != "") 
    {	  
       cal.disabled=false;
    }
	else
	  {
	     cal.disabled=true;
	  }
}
*/
function limpiar(id)
{
  num = id.substring(3,5);

	var codigo = document.getElementById('cod'+num) ;
	var rocha = document.getElementById('roch'+num) ;
	var descripcion = document.getElementById('des'+num) ;
	var observaciones = document.getElementById('obs'+num) ;
	var stock = document.getElementById('stock'+num) ;
  var cantidad = document.getElementById('cant'+num) ;
	var precio_bodega = document.getElementById('prec'+num) ;
	var precio_unitario = document.getElementById('iva'+num) ;
	var precio_lista = document.getElementById('precl'+num) ;
	var descuento = document.getElementById('desc'+num) ;
	var total = document.getElementById('tot'+num) ;
  var exs = document.getElementById('exs'+num);
	var resultador = document.getElementById('resultador'+num);
  var um = document.getElementById('um'+num);
	codigo.value = ""
	rocha.value = "";
	descripcion.value = "";
	observaciones.value = "";
	stock.value = "";
	cantidad.value = "";	
	precio_bodega.value = "";
	precio_unitario.value = ""; 
	precio_lista.value = "";
	descuento.value = "";
	total.value = "";
  resultador.value = "";
  exs.value = "";
  um.value = "";
}
