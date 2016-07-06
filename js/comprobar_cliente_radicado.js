function abrircli()
{
  var rutcopia = document.getElementById('rut').value ;
  var nombrecopia = document.getElementById('cliente').value ;
 	window.open("IngresoCliente.php?rutcopia="+rutcopia+"&nombrecopia="+nombrecopia+"", "",  "width=1000, height=400");
}

function activarcli()
{
  var activar = document.getElementById('activarclicod').value ;
 	window.open("DescripcionCliente.php?CODIGO_CLIENTE="+activar+"", "",  "width=1000, height=400");
}

$(document).ready(function(){
      var consulta;
      //hacemos focus
      //comprobamos si se pulsa una tecla
      $("#rut").keyup(function(e){
      	eleOffset = $(this).offset();
             //obtenemos el texto introducido en el campo
             consulta = $("#rut").val();
             //hace la búsqueda
             $("#resultado2").delay(1000).queue(function(n) { 
                  $("#resultado2").html('<img src="imagenes/loading.gif" />');
                        $.ajax({
                              type: "POST",
                              url: "ajax_nube_rut_cliente.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                           
   								  $("#resultado2").html(data);
   									 n();
										}
            });
            });
             if (consulta != "") {
      	$(this).next().fadeIn("fast").css({
		left: eleOffset.left + $(this).outerWidth(),
		top: eleOffset.top,
		});
      };
		}).mouseover(function(){
		$(this).next().hide();
		});
        });
              
$(document).ready(function(){
$(document).click(function (e){
    var contenedor = $("#resultado");
    if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
        contenedor.empty().hide();
    };
});
});
$(document).ready(function(){
$(document).click(function (e){
    var contenedor = $("#resultado2");
    if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
        contenedor.empty().hide();
    };
});
});

$(document).ready(function(){
      var consulta;
      //hacemos focus
      //comprobamos si se pulsa una tecla
      	$("#cliente").keyup(function(e){
      	eleOffset = $(this).offset();
		consulta = $("#cliente").val();
             //obtenemos el texto introducido en el campo
             //hace la búsqueda
             $("#resultado").delay(1000).queue(function(n) {      
                  $("#resultado").html('<img src="imagenes/loading.gif" />');
                        $.ajax({
                              type: "POST",
                              url: "ajax_nube_nombre_cliente.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
   								  $("#resultado").html(data);
   									 n();
										}
        });
        });
             if (consulta != "") {

      	$(this).next().fadeIn("fast").css({
		left: eleOffset.left + $(this).outerWidth(),
		top: eleOffset.top,
		});
      	};
		}).mouseover(function(){
		$(this).next().hide();
		});
        });
  