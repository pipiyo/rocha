$(document).ready(function(){
$(".botongrupos").click(function(e){
  $("#contenedor_selec").hide();
  $("#contenedor_objetos_existentes").empty();
  $("#contenedor_subobjetos").hide();
var trayectoria = $(this).offset();
var id = $(this).attr("id");
$(".botonobjetos").attr("id", id );
$(".botonin").attr("id", id );
$.ajax({
    type: "POST",
    url: 'ajax_objeto.php',
    data: { 'ID': id },
    dataType:'json',
    success: function(data) {
  for(var i=0;i<data.length; i++)
  {
$("#contenedor_objetos_existentes").append("<input class='botonobjetosplay' name='"+id+"'  type='button' value='"+data[i]+"' >");
  }
}
});
$("#contenedor_objetos_existentes").show();
$("#contenedor_objetos").fadeIn("fast").css({
    left: trayectoria.left + $(this).outerWidth(),
    top: trayectoria.top,
    });
});
});

$(document).ready(function(){
$(".botonobjetos").click(function(e){
  $("#contenedor_subobjetos").hide();
$("#contenedor_objetos_existentes").empty();
$("#contenedor_objetos_existentes").hide();
$("#grupos_disponibles").empty();
$("#grupos_seleccionados").empty();
var id = $(this).attr("id");
$.ajax({
    type: "POST",
    url: 'ajax_llenar_seleccion.php',
    data: { 'ID': id },
    dataType:'json',
    success: function(data) {
  for(var i=0;i<data.length; i++)
  {
    if ( (data[i].SELEC) == "NO" ) {
  $("#grupos_disponibles").append("<option class='izquierda' value='"+data[i].NOMBRE+"'>"+data[i].NOMBRE+"</option>");        
}else if ( (data[i].SELEC) == "SI" ) {
$("#grupos_seleccionados").append("<option class='derecha' value='"+data[i].NOMBRE+"'>"+data[i].NOMBRE+"</option>"); 
};
  }
}
});
$("#contenedor_selec").show();
});
});

$(document).ready(function(){
$(".botoni").click(function(e){
var nombre = $( ".grupos_disponibles option:selected" ).text();
if(nombre == "")
{       
}else{
$(".grupos_seleccionados").append("<option class='derecha' value='"+nombre+"'>"+nombre+"</option>"); 
$( ".grupos_disponibles option:selected" ).remove();
};
});
});
$(document).ready(function(){
$(".botond").click(function(e){
var nombre = $( ".grupos_seleccionados option:selected" ).text();
if(nombre == "")
{       
}else{
$(".grupos_disponibles").append("<option class='izquierda' value='"+nombre+"'>"+nombre+"</option>"); 
$( ".grupos_seleccionados option:selected" ).remove();
};
});
});

$(document).ready(function(){
$(".botonin").click(function(e){
var id = $(this).attr("id");
var obselec = new Array();
$("#grupos_seleccionados").find('option').each(function() {
    obselec.push($(this).text());
});
$.ajax({
    type: "POST",
    url: 'POST_ingreso_objeto.php',
    data: { objetos: obselec , grupo: id },
    dataType:'json',
     error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
      alert(""+data);
}
});
$("#grupos_disponibles").empty();
$("#grupos_seleccionados").empty();
$("#contenedor_objetos").hide();
});
});

$(document).ready(function(){
$(".botonobjetosplay").live( "click", function(e){
$("#contenedor_subobjetos_existentes").empty();
var trayectoria = $(this).offset();
var id =  $(this).attr("name");
$.ajax({
    type: "POST",
    url: 'ajax_subobjeto.php',
    data: { 'grupo': id, 'objeto': $(this).val() },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
  for(var i=0;i<data.length; i++)
  {
if (data[i].BLOQ == "SI") {
$("#contenedor_subobjetos_existentes").append("<span class='botonsubobjetosplay'  > "+data[i].NOMBRE+" <input class='checksubobjetos' checked type='checkbox' value='"+data[i].ID+"' > </span>");
  }else{
$("#contenedor_subobjetos_existentes").append("<span class='botonsubobjetosplay'  > "+data[i].NOMBRE+" <input class='checksubobjetos'  type='checkbox' value='"+data[i].ID+"' > </span>");
  };
  }
if (data.length != 0) {
  $("#contenedor_subobjetos_existentes").append("<input class='botonsubobjetoseditar' id='' name='"+id+"'  type='button' value='EDITAR' >");
};
}
});
$("#contenedor_subobjetos").fadeIn("fast").css({
    left: trayectoria.left + $(this).outerWidth(),
    top: trayectoria.top,
    });
});
});

$(document).ready(function(){
$(".botonsubobjetoseditar").live( "click", function(e){
var subselec = new Array();
var nosubselec = new Array();
$("#contenedor_subobjetos_existentes :checked").each(function() {
    subselec.push($(this).val());
});
$(".checksubobjetos").each(function() {
    nosubselec.push($(this).val());
});
$.ajax({
    type: "POST",
    url: 'ajax_subobjeto_editar.php',
    data: { 'grupo': $(this).attr("name"), 'subobjeto': subselec, 'nosubobjeto': nosubselec },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
      alert(""+data);
}
});
  $("#contenedor_subobjetos_existentes").empty();
      $("#contenedor_subobjetos").hide();
      $("#contenedor_objetos").hide();
});
});
