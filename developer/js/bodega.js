$(document).ready(function(){
$(".desplegar").toggle(function(){
var $palo =  $(this).parent().attr("id");
var $cortar =  $(this).parent().attr("class");

$.ajax({
    type: "POST",
    url: 'ajax_desplegar_productos2.php',
    data: { 'cod': $(this).parent().attr("class") },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
success: function(data) {
  $("#"+$palo+"").after("<tr class='"+$palo+"x' > <td Style='border:none;' >&nbsp</td> <td Style='border:none;' >&nbsp</td> </tr>");

  for(var i=0;i<data.length; i++)
  {
    $("#"+$palo+"").after("<tr class='"+$palo+"x "+$palo+"xx trgen' ><td><center><a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].COD+"</a></center></td><td colspan='2' ><center><a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].DES+"</a></center></td><td><center>"+data[i].CAT+"</center></td><td style='background-color:"+data[i].COLOROC+";' id='tdcir"+data[i].COD+"' class='circulo' title='"+data[i].DES+"' ><center>OC</center></td><td><center>"+data[i].STOCK+"</center></td><td><center>"+data[i].FLUJO+"</center></td><td><center><a target=_blank href=ListadoOCTransito.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].CANT+"</a></center></td><td><center><a target=_blank href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].VALE+"</a></center></td><td><center>"+data[i].CONTABLE+"</center></td><td><center>"+data[i].DISPONIBLE+"</center></td><td><center>"+data[i].FORMATO+"</center></td><td><center>"+data[i].STOCKMIN+"</center></td><td><center>"+data[i].MAX+"</center></td><td><center><a target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO="+data[i].COD+"&MENSAJE=2' id = 'stockpositivo'><h1> + </h1>      </a></center></td>    <td><center><a target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO="+data[i].COD+"&MENSAJE=2' id = 'stocknegativo'><h1> - </h1>      </center></td></tr>");
  }

  /* Filtros */

  if(data[0].CAT == 'Accesorios' || data[0].CAT == 'Soportes Metalicos' || data[0].CAT == 'Accesorios Paneleria' || data[0].CAT == 'Almacenamiento Metalico' || data[0].CAT == 'Paneleria')
  {
    var metales = "";
    for(var i=0;i<data.length; i++)
     {
      if(data[i].METALES[i] !== undefined)
      {
        metales+="<option>"+data[i].METALES[i]+"</option>";
      }
     }

    $("#"+$palo+"").after("<tr class='"+$palo+"x "+$palo+"xxx'  > <td colspan='5'  Style='border:none;' > <select class='textbox familia' autocomplete='off' id='metales"+$cortar+"' name='"+data[0].CAT+"' ><option value=''>Metales</option>"+ metales +"</select><input type='button' class='filtrar "+$palo+"x' name = 'listaCompleta' id='filtrar"+$cortar+"' value='Filtrar'/>    </td>  </tr>        <tr class='"+$palo+"x "+$palo+"xx' ><th height='30'><center>Código</center></th><th colspan='2' ><center>Descripción</center></th><th><center>Categoria</center></th><th><center>OC</center></th><th><center>Stock</center></th><th><center>Flujo</center></th><th><center>OC En Transito</center></th><th><center>Vale Emitidos</center></th><th><center>Stock Contable</center></th><th><center>Stock Disponible</center></th><th><center>Formato</center></th><th><center>Minimo</center></th><th><center>Maximo</center></th><th><center>Ingreso</center></th><th><center>Egreso</center></th></tr> ");
  }
  else if(data[0].CAT == 'Sillas' || data[0].CAT == 'Base' || data[0].CAT == 'Brazo' )
  {
     var cuerpo = "";
      for(var i=0;i<data.length; i++)
      {
        if(data[i].CUERPO[i] !== undefined)
        {
          cuarpon = data[i].CUERPO[i].substring(1);

          switch (cuarpon) {
          case "T01":
            descripcion = "Tapiz Negro";
          break; 
          case "T02":
            descripcion = "Tapiz Rojo";
          break;   
          case "T03":
            descripcion = "Tapiz Azul";
          break;  
          case "T04":
            descripcion = "Tapiz Cafe";
          break;  
          case "T05":
            descripcion = "Tapiz Gris";
          break;  
          case "01":
            descripcion = "Negro";
          break;
          case "02":
            descripcion = "Azul";
          break;
          case "03":
            descripcion = "Cafe";
          break;
          case "T06":
            descripcion = "Tapiz Maroqui";
          break;  
          case "T07":
            descripcion = "Tapiz Coventry";
          break;
          case "T08":
            descripcion = "Tapiz Serrano";
          break;
          case "T09":
            descripcion = "Tapiz Vinil";
          break;
          case "T10":
            descripcion = "Tapiz Serrano";
          break;
          case "TRN14":
            descripcion = "Tapiz Renna Rojo Sandia 103";
          break;
          case "TRN13":
            descripcion = "Tapiz Renna Rojo 122";
          break;
          case "TRN12":
            descripcion = "Tapiz Renna Pistacho 71";
          break;
          case "TRN11":
            descripcion = "Tapiz Renna Negro 9";
          break;
          case "TRN10":
            descripcion = "Tapiz Renna Morado 82";
          break;
          case "TRN09":
            descripcion = "Tapiz Renna Lila 83";
          break;
          case "TRN08":
            descripcion = "Tapiz Renna Grafito 620";
          break;
          case "TRN07":
            descripcion = "Tapiz Renna Celeste Azul 120";
          break;
          case "TRN06":
            descripcion = "Tapiz Renna Burdeo 7";
          break;
          case "TRN05":
            descripcion = "Tapiz Renna Blanco Invierno 126";
          break;
          case "TRN04":
            descripcion = "Tapiz Renna Beige 730";
          break;
          case "TRN03":
            descripcion = "Tapiz Renna Azul Marino 8";
          break;
          case "TRN02":
            descripcion = "Tapiz Renna Azul 957";
          break;
          case "TRN01":
            descripcion = "Tapiz Renna Amarillo 86";
          break;

          case "TPG01":
            descripcion = "Tapiz Pegaso Negro 562";
          break;
          case "TPG02":
            descripcion = "Tapiz Pegaso Rojo 582";
          break;
          case "TPG03":
            descripcion = "Tapiz Pegaso Naranjo 558";
          break;
          case "TPG04":
            descripcion = "Tapiz Pegaso Pistacho 569";
          break;
          case "TPG05":
            descripcion = "Tapiz Pegaso Café 552";
          break;

          case "TVT01":
            descripcion = "Tapiz Venetto Amarillo";
          break;
          case "TVT02":
            descripcion = "Tapiz Venetto Azul Caribe";
          break;
          case "TVT03":
            descripcion = "Tapiz Venetto Azul Rey";
          break;
          case "TVT04":
            descripcion = "Tapiz Venetto Café";
          break;
          case "TVT05":
            descripcion = "Tapiz Venetto Gris";
          break;
          case "TVT06":
            descripcion = "Tapiz Venetto Naranjo";
          break;
          case "TVT07":
            descripcion = "Tapiz Venetto Negro";
          break;
          case "TVT08":
            descripcion = "Tapiz Venetto Rojo";
          break;
          case "TVT09":
            descripcion = "Tapiz Venetto Verde";
          break;
          case "TVT10":
            descripcion = "Tapiz Venetto Verde Pistacho";
          break;

          case "TGL01":
            descripcion = "Tapiz Glock Azul";
          break;
          case "TGL02":
            descripcion = "Tapiz Glock Azul Caribe";
          break;
          case "TGL03":
            descripcion = "Tapiz Glock Azul Lago";
          break;
          case "TGL04":
            descripcion = "Tapiz Glock Azul Piedra-811";
          break;
          case "TGL05":
            descripcion = "Tapiz Glock Caoba";
          break;
          case "TGL06":
            descripcion = "Tapiz Glock Esmeralda";
          break;
          case "TGL07":
            descripcion = "Tapiz Glock Gris Perla";
          break;
          case "TGL08":
            descripcion = "Tapiz Glock Negro";
          break;
          case "TGL09":
            descripcion = "Tapiz Glock Mango";
          break;
          case "TGL10":
            descripcion = "Tapiz Glock Manzana";
          break;
          case "TGL11":
            descripcion = "Tapiz Glock Plomo";
          break;
          case "TGL12":
            descripcion = "Tapiz Glock Rojo";
          break;
          case "TGL13":
            descripcion = "Tapiz Glock Verde Pino";
          break;

          case "TES01":
            descripcion = "Tapiz Escorial Almendra";
          break;
          case "TES02":
            descripcion = "Tapiz Escorial Arrecife";
          break;
          case "TES03":
            descripcion = "Tapiz Escorial Azafran";
          break;
          case "TES04":
            descripcion = "Tapiz Escorial Azul Caribe";
          break;
          case "TES05":
            descripcion = "Tapiz Escorial Azul Lago";
          break;
          case "TES06":
            descripcion = "Tapiz Escorial azul Rey";
          break;
          case "TES07":
            descripcion = "Tapiz Escorial Blue";
          break;
          case "TES08":
            descripcion = "Tapiz Escorial Burdeo";
          break;
          case "TES09":
            descripcion = "Tapiz Escorial Caoba";
          break;
          case "TES10":
            descripcion = "Tapiz Escorial Esmeralda";
          break;
          case "TES11":
            descripcion = "Tapiz Escorial Gris Acero";
          break;
          case "TES12":
            descripcion = "Tapiz Escorial Gris Mouse";
          break;
          case "TES13":
            descripcion = "Tapiz Escorial Gris Nevado";
          break;
          case "TES14":
            descripcion = "Tapiz Escorial Gris Perla";
          break;
          case "TES15":
            descripcion = "Tapiz Escorial Gris Raton";
          break;
          case "TES16":
            descripcion = "Tapiz Escorial Mango";
          break;
          case "TES17":
            descripcion = "Tapiz Escorial Naranja";
          break;
          case "TES18":
            descripcion = "Tapiz Escorial Navy";
          break;
          case "TES19":
            descripcion = "Tapiz Escorial Negro";
          break;
          case "TES20":
            descripcion = "Tapiz Escorial Pera";
          break;
          case "TES21":
            descripcion = "Tapiz Escorial Rojo";
          break;
          case "TES22":
            descripcion = "Tapiz Escorial Scarlati";
          break;
          case "TES23":
            descripcion = "Tapiz Escorial Tabaco";
          break;
          case "TES24":
            descripcion = "Tapiz Escorial Tilo";
          break;
          case "TES25":
            descripcion = "Tapiz Escorial Tomate";
          break;
          case "TES26":
            descripcion = "Tapiz Escorial Verde";
          break;
          case "TES27":
            descripcion = "Tapiz Escorial Vino";
          break;

          case "TEL01":
            descripcion = "Tapiz Elasticity Azul 21";
          break;
          case "TEL02":
            descripcion = "Tapiz Elasticity Azul 39";
          break;
          case "TEL03":
            descripcion = "Tapiz Elasticity Azul 67";
          break;
          case "TEL04":
            descripcion = "Tapiz Elasticity Gris 14";
          break;
          case "TEL05":
            descripcion = "Tapiz Elasticity Gris 64";
          break;
          case "TEL06":
            descripcion = "Tapiz Elasticity Marron 07";
          break;
          case "TEL07":
            descripcion = "Tapiz Elasticity Naranjo 65";
          break;
          case "TEL08":
            descripcion = "Tapiz Elasticity Negro 60";
          break;
          case "TEL09":
            descripcion = "Tapiz Elasticity Rojo 68";
          break;
          case "TEL10":
            descripcion = "Tapiz Elasticity Verde 66";
          break;

          case "TVZ01":
            descripcion = "Tapiz Venezia Azul -821";
          break;
          case "TVZ02":
            descripcion = "Tapiz Venezia Azul Piedra-811";
          break;
          case "TVZ03":
            descripcion = "Tapiz Venezia Bicolor Amarillo -52";
          break;
          case "TVZ04":
            descripcion = " Tapiz Venezia Bicolor Azul Noche-53";
          break;
          case "TVZ05":
            descripcion = "Tapiz Venezia Bicolor Azul-31";
          break;
          case "TVZ06":
            descripcion = "Tapiz Venezia Gris Oscuro-78";
          break;
          case "TVZ07":
            descripcion = "Tapiz Venezia Gris-72";
          break;

          case "P01":
            descripcion = "Polipropileno negro";
          break;
          case "P02":
            descripcion = "Polipropileno amarillo";
          break;
          case "P03":
            descripcion = "Polipropileno azul";
          break;
          case "P04":
            descripcion = "Polipropileno blanco";
          break;
          case "P05":
            descripcion = "Polipropileno naranjo";
          break;
          case "P06":
            descripcion = "Polipropileno rojo";
          break;
          case "P07":
            descripcion = "Polipropileno verde";
          break;
          case "P08":
            descripcion = "Polipropileno gris";
          break;
          case "P09":
            descripcion = "Polipropileno burdeo";
          break;
          case "P10":
            descripcion = "Polipropileno verde pistacho";
          break;
          case "P11":
            descripcion = "Polipropileno Pistacho";
          break;
          case "P12":
            descripcion = "Polipropileno Marengo";
          break;
          case "P13":
            descripcion = "Polipropileno gris claro";
          break;
          case "P14":
            descripcion = "Polipropileno asiento negro-respaldo negro";
          break;
          case "P15":
            descripcion = "Polipropileno asiento negro-respaldo rojo";
          break;
          case "P16":
            descripcion = "Polipropileno asiento rojo-respaldo rojo";
          break;
          case "P17":
            descripcion = "Polipropileno asiento rojo-respaldo negro";
          break;
          case "P18":
            descripcion = "Polipropileno asiento negro-respaldo blanco";
          break;

          case "D01":
            descripcion = "Diseño Butterfly";
          break;
          case "D02":
            descripcion = "Diseño Liga";
          break;
          case "D03":
            descripcion = "Diseño Pony";
          break;
          case "D04":
            descripcion = "Diseño Suerstart";
          break;
          case "D05":
            descripcion = "Diseño Turbo";
          break;

          case "00":
            descripcion = "Pedestal";
          break;

          default: 
            descripcion = cuarpon;
        }
            
          cuerpo+="<option value="+cuarpon+">"+descripcion+"</option>";
        }
      }

      var frente = "";
      for(var i=0;i<data.length; i++)
      {
        if(data[i].FRENTE[i] !== undefined)
        {
          frenten = data[i].FRENTE[i].substring(1);
          switch (frenten) {
          case "01":
            descripcion = "Negro";
          break; 
          case "02":
            descripcion = "Aluminizada";
          break; 
          case "03":
            descripcion = "Charcole";
          break;  
          case "04":
            descripcion = "Cromada";
          break;     
          case "05":
            descripcion = "Polipropileno";
          break;
          case "06":
            descripcion = "Tapizada";
          break;   
          case "B01":
            descripcion = "Base Negra";
          break; 
          case "B02":
            descripcion = "Base Cromado";
          break;   
          case "B03":
            descripcion = "Base Aluminizada";
          break; 
          case "B04":
            descripcion = "Base Blanca";
          break;  
          case "00":
            descripcion = "Negro";
          break;  
          default: 
            descripcion = frenten;
        }
            
            frente+="<option value="+frenten+">"+descripcion+"</option>";
        }
      }

    $("#"+$palo+"").after("<tr class='"+$palo+"x "+$palo+"xxx'  > <td colspan='5'  Style='border:none;' > <select class='textbox familia' autocomplete='off' id='acabado"+$cortar+"' name='"+data[0].CAT+"' ><option value=''>Acabado</option>"+ cuerpo +"</select> <select  autocomplete='off' id='estructura"+$cortar+"' name='"+data[0].CAT+"' ><option value=''>Estructura</option>"+ frente +"</select><input type='button' class='filtrar "+$palo+"x' name = 'listaCompleta' id='filtrar"+$cortar+"' value='Filtrar'/>    </td>  </tr>        <tr class='"+$palo+"x "+$palo+"xx' ><th height='30'><center>Código</center></th><th colspan='2' ><center>Descripción</center></th><th><center>Categoria</center></th><th><center>OC</center></th><th><center>Stock</center></th><th><center>Flujo</center></th><th><center>OC En Transito</center></th><th><center>Vale Emitidos</center></th><th><center>Stock Contable</center></th><th><center>Stock Disponible</center></th><th><center>Formato</center></th><th><center>Minimo</center></th><th><center>Maximo</center></th><th><center>Ingreso</center></th><th><center>Egreso</center></th></tr> ");
   
  }
  else
  {
     var familia = "";

     for(var i=0;i<data.length; i++)
     {
      if(data[i].FAMILIA[i] !== undefined)
      {
        familia+="<option>"+data[i].FAMILIA[i]+"</option>";
      }
     }
    $("#"+$palo+"").after("<tr class='"+$palo+"x "+$palo+"xxx'  > <td colspan='5'  Style='border:none;' > <select class='textbox familia' autocomplete='off' id='familia"+$cortar+"' name='"+data[0].CAT+"' ><option value=''>Familia</option>"+ familia +"</select><input type='button' class='filtrar "+$palo+"x' name = 'listaCompleta' id='filtrar"+$cortar+"' value='Filtrar'/>    </td>  </tr>        <tr class='"+$palo+"x "+$palo+"xx' ><th height='30'><center>Código</center></th><th colspan='2' ><center>Descripción</center></th><th><center>Categoria</center></th><th><center>OC</center></th><th><center>Stock</center></th><th><center>Flujo</center></th><th><center>OC En Transito</center></th><th><center>Vale Emitidos</center></th><th><center>Stock Contable</center></th><th><center>Stock Disponible</center></th><th><center>Formato</center></th><th><center>Minimo</center></th><th><center>Maximo</center></th><th><center>Ingreso</center></th><th><center>Egreso</center></th></tr> ");
  }
}
});
    $(this).html("<center><i class='fa fa-chevron-circle-up fa-lg'></i></center>");
    },function(){
      var palo2 = $(this).parent().attr("id")+"x"  ;
      $("."+palo2+"").remove();
      $(this).html("<center><i class='fa fa-chevron-circle-down fa-lg'></i></center>");
});
});

/* --- ! --- ! --- ! --- */

$(document).ready(function(){
$(".circulo").live( "click", function(){
var $cod = $(this).attr("id").substring(5, 50);

$(this).css( "background-color", "#FF8A51" );

$.ajax({
    type: "POST",
    url: 'ajax_emitir_oc_productos2.php',
    data: { 'cod': $cod , 'des': this.title },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
TINY.box.show({url:'generarOCproducto2.php'});
}
});
 });
});

$(document).ready(function(){
$(".quitarlista").live( "click", function(){

var cortar = $(this).parent().attr("id").substring(3, 50);

$(".trq").each( function(){
if ($(this).attr("id") == "trq"+cortar) {
  $(this).remove();
};
});

var codid = "tdcir"+this.title+""; 

$(".circulo").each( function(){
  if (this.id == codid ) {
  $(this).css( "background-color", "#FFF" );
};
});

$.ajax({
    type: "POST",
    url: 'ajax_quitar_lista_productos2.php',
    data: {'cod': this.title },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
}
});

 });
});




$(document).ready( function(){
$("#cleanall").live( "click", function(){

$(".circulo").each( function(){
  $(this).css( "background-color", "#FFF" );
});

  $.ajax({
      type: "POST",
      url: 'ajax_quitar_lista_productos2.php',
      data: {'clean': true },
      dataType:'json',
      error: function(xhr, status, error) {
      alert(xhr.responseText);
    },
      success: function(data) {
      TINY.box.hide({url:'generarOCproducto2.php'});
    }
    });
    });
});


$(document).ready(function(){
  $("#emitiroc").live( "click",function(){
    TINY.box.hide({url:'generarOCproducto2.php'});
  $("#formproductosoc").submit();
  });
});





$(document).ready(function(){
$(".filtrar").live( "click", function(){

var $palo = $(this).attr("class").split(' ')[1];

$("."+$palo+"x").remove();

var cortar = this.id.substring(7, 50);

$.ajax({
    type: "POST",
    url: 'ajax_desplegar_productos2_filtro.php',
    data: { 'cod': cortar , 'fam':  $("[id='familia"+cortar+"']").val() , 'cue':  $("[id='cuerpo"+cortar+"']").val(), 'fren':  $("[id='frente"+cortar+"']").val(), 'canto':  $("[id='canto"+cortar+"']").val(), 'pb':  $("[id='pb"+cortar+"']").val(), 'espesor':  $("[id='espesor"+cortar+"']").val(), 'metales':  $("[id='metales"+cortar+"']").val(), 'acabado':  $("[id='acabado"+cortar+"']").val(), 'estructura':  $("[id='estructura"+cortar+"']").val()  },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
},
    success: function(data) {
  for(var i=0;i<data.length; i++)
  {
$("."+$palo+"xx").after(" <tr class='"+$palo+" "+$palo+"x trgen' ><td><center><a target='_blank' href=DescripcionProducto.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].COD+"</a></center></td><td colspan='2' ><center><a target='_blank' href=DescripcionProductoDetalle.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].DES+"</a></center></td><td><center>"+data[i].CAT+"</center></td><td style='background-color:"+data[i].COLOROC+";' id='tdcir"+data[i].COD+"' class='circulo' title='"+data[i].DES+"' ><center>OC</center></td><td><center>"+data[i].STOCK+"</center></td><td><center>"+data[i].FLUJO+"</center></td><td><center><a target=_blank href=ListadoOCTransito.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].CANT+"</a></center></td><td><center><a target=_blank href=ListadoValeEmisionProducto.php?CODIGO_PRODUCTO="+data[i].COD+">"+data[i].VALE+"</a></center></td><td><center>"+data[i].CONTABLE+"</center></td><td><center>"+data[i].DISPONIBLE+"</center></td><td><center>"+data[i].FORMATO+"</center></td><td><center>"+data[i].STOCKMIN+"</center></td><td><center>"+data[i].MAX+"</center></td><td><center><a target='_blank' id = 'ingreso' href = 'FormularioProductosIngreso.php?CODIGO_PRODUCTO="+data[i].COD+"&MENSAJE=2' id = 'stockpositivo'><h1> + </h1>      </a></center></td>    <td><center><a target='_blank' id = 'egreso' href = 'FormularioProductosEgreso.php?CODIGO_PRODUCTO="+data[i].COD+"&MENSAJE=2' id = 'stocknegativo'><h1> - </h1>      </center></td></tr>   ");
  }
$("."+$palo+"xx").after("<tr class='"+$palo+"x "+$palo+"' ><th height='30'><center>Código</center></th><th colspan='2' ><center>Descripción</center></th><th><center>Categoria</center></th><th><center>OC</center></th><th><center>Stock</center></th><th><center>Flujo</center></th><th><center>OC En Transito</center></th><th><center>Vale Emitidos</center></th><th><center>Stock Contable</center></th><th><center>Stock Disponible</center></th><th><center>Formato</center></th><th><center>Minimo</center></th><th><center>Maximo</center></th><th><center>Ingreso</center></th><th><center>Egreso</center></th></tr> ");
}
});
 });
});


$(document).ready(function(){
$(".familia").live( "change", function(){
  var cortar = this.id.substring(7, 50);
  var name = this.name;
  var valor = this.value;

$("[class='selectfil"+cortar+"']").remove();
$.ajax({
    type: "POST",
    url: 'ajax_desplegar_productos2.php',
    data: { 'cod': cortar },
    dataType:'json',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
    },
      success: function(data) 
      {
        var cuerpo = "";
        for(var i=0;i<data.length; i++)
        {
          if(data[i].CUERPO[i] !== undefined)
          {
            cuarpon = data[i].CUERPO[i].substring(1);
            cuarpof = data[i].CUERPO[i].substring(0,1);
            if(cuarpof == valor)
            {
              cuerpo+="<option>"+cuarpon+"</option>";
            }
          }
        }

        var frente = "";
        for(var i=0;i<data.length; i++)
        {
          if(data[i].FRENTE[i] !== undefined)
          {
            frenten = data[i].FRENTE[i].substring(1);
            frentef = data[i].FRENTE[i].substring(0,1);
            if(frentef == valor)
            {
              frente+="<option>"+frenten+"</option>";
            }
          }
        }

        


        if(name == "Partes y Piezas" || name == "Soportes" || name == "Tapacantos" || name == "Maderas")
        {
          $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option value=''>Cuerpo</option>"+cuerpo+"</select>");
        }
        else if(name == "Superficies Curvas" || name == "Superficies Rectas")
        {
          $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option value=''>Cuerpo</option>"+cuerpo+"</select>");
       
              if(valor == "L")
              {
                
                  $("[id='canto"+cortar+"']").remove();
                  $("[id='pb"+cortar+"']").remove();
                  $("[id='espesor"+cortar+"']").remove();
                  $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='pb"+cortar+"' ><option value= ''>Terminado</option><option>Pintura</option><option>Balance</option></select> <select class='selectfil"+cortar+"' id='espesor"+cortar+"' ><option value= ''>Espesor</option><option>24</option><option>25</option><option>30</option></select>");
                  
                  $("[id='cuerpo"+cortar+"']").live( "change", function(){
                    var canto = "";
                    cuerpoelx = $("[id='cuerpo"+cortar+"']").val();

                    for(var i=0;i<data.length; i++)
                    {
                      if(data[i].CANTO[i] !== undefined)
                      {
                        canton = data[i].CANTO[i];  
                        if(cuerpoelx == "Roble Lineal" || cuerpoelx == "Cypress Camel")
                        {
                          if(canton == "Blanco" || canton == "Almendra" || canton == "Gris Humo" || canton == "Grafito" || canton == "Aluminio")
                          {
                            canto+="<option>"+canton+"</option>"; 
                          }
                        } 
                        if(cuerpoelx == "Noce Caffe Late")
                        {
                          if(canton == "Blanco" || canton == "Almendra" || canton == "Gris Humo" || canton == "Grafito" || canton == "Aluminio"|| canton == "Nogal Clasico")
                          {
                            canto+="<option>"+canton+"</option>"; 
                          }
                        } 
                        if(cuerpoelx == "White Oak")
                        {
                          if(canton == "Blanco" || canton == "Almendra" || canton == "White Oak" )
                          {
                            canto+="<option>"+canton+"</option>"; 
                          }
                        } 

                      }
                    }
                    if(cuerpoelx == "Cypress Camel" || cuerpoelx == "Roble Lineal" || cuerpoelx == "Noce Caffe Late" || cuerpoelx == "White Oak")
                    {
                       $("[id='canto"+cortar+"']").remove();
                      $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='canto"+cortar+"' ><option value= ''>Canto</option>"+canto+"</select>");
                    }
                    else
                    {
                      $("[id='canto"+cortar+"']").remove();
                    }
                  });
              }
              else
              {
                $("[id='canto"+cortar+"']").remove();
                $("[id='pb"+cortar+"']").remove();
                $("[id='espesor"+cortar+"']").remove();
              }
       
        }
        else if(name == "Mueble De Linea" || name == "Cajoneras")
        {
          $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option value= ''>Cuerpo</option>"+cuerpo+"</select> <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='frente"+cortar+"' ><option value=''>Frente</option>"+frente+"</select>");
          
          $("[id='frente"+cortar+"'], [id='cuerpo"+cortar+"']").live( "change", function(){
              if($("[id='frente"+cortar+"']").val() == "Cypress Camel")
              {
                  cuerpoelx = $("[id='cuerpo"+cortar+"']").val();
                  var canto = "";
                  for(var i=0;i<data.length; i++)
                  {
                    if(data[i].CANTO[i] !== undefined)
                    {
                      canton = data[i].CANTO[i];
                      if(cuerpoelx == canton )
                      {
                        canto+="<option>"+canton+"</option>";  
                      }
                    }
                  }
                  $("[id='canto"+cortar+"']").remove();
                  $(".familia").after(" <span class='selectfil"+cortar+"'></span> <select class='selectfil"+cortar+"' id='canto"+cortar+"' ><option value= ''>Canto</option>"+canto+"</select>");
              }
              else
              {
                $("[id='canto"+cortar+"']").remove();
              }
          });
          //       
        }
      }
    });
 });
});


   $(function(){
                $('#cod1').autocomplete({
                   source : 'ajaxProveedor.php',
                   select : 
           function(event, ui)
           {
                       $('#proveedor1').slideUp('slow', function()
             {
                            $('#proveedor1').val(
                                 ui.item.value + 
                '\nRut:' + ui.item.rut + 
                '\n' + ui.item.direccion + 
                '\n' + ui.item.comuna+ 
                '\nSantiago - Chile'
                            );
                       });
                       $('#proveedor1').slideDown('slow');
             
             $('#condicion').slideUp('slow', function()
             {
                            $('#condicion').val(
                                 ui.item.forma 
                            );
                       });
                       $('#condicion').slideDown('slow');
                $('#rut_prove').slideUp('slow', function()
             {
                            $('#rut_prove').val(
                                 ui.item.rut 
                            );
                       });
                       $('#rut_prove').slideDown('slow');
                       }
                       });
                   
            });
 
  $(function(){
                $('#buscar_usuario').autocomplete({
                   source : 'ajaxProducto2gen.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(      
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });
    $(function(){
                $('#buscar_codigo').autocomplete({
                   source : 'ajaxProductoCodigo2gen.php',
                   select : function(event, ui){
                       $('#resultados').slideUp('slow', function(){
                            $('#resultados').html(      
                            );
                       });
                       $('#resultados').slideDown('slow');
                   }
                });
            });


 $(document).ready(function() {
     $(".tablas").click(function(event) {
     $("#datos").val($(this).val());
    $("#FormularioExportacion").submit();
});
}); 

function volver()
{
  contenedor.style.display = "";
  contenedor1.style.display = "none";
}

function resta()
{
  document.getElementById('valor').value = contLin; 
}

function  borrar(obj)
{
  /*ultima = document.all.tabla.rows.length - 1;
  if(ultima > -0){
    document.all.tabla.deleteRow(ultima);   
    contLin--;  
       
  }*/
  while (obj.tagName!='TR') 
  obj = obj.parentNode;
  tab = document.getElementById('tabla');
  for (i=0; ele=tab.getElementsByTagName('tr')[i]; i++)
   if (ele==obj) num=i;
  tab.deleteRow(num);
 
  
}

function limpiar()
{
document.getElementById('cod1').value = ""
}


  function  habilitar(id) 
{  

  num = id.substring(8,12);
  if(document.getElementById(id).checked == true)
  {
    
document.getElementById("code" + num).disabled = false;
  }
  else
  {
  document.getElementById("code" + num).disabled = true;
  
  }
 
}


/*Filtro de sillas*/

$(document).ready(function(){
$(".familib").live( "change", function(){
var cortar = this.id.substring(7, 50);

$("[class='selectfil"+cortar+"']").remove();

if (this.value == "TES") {

  $(this).after(" <span class='selectfil"+cortar+"'>Escorial:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"'  ><option></option><option value='TES01'>Almendra</option> <option value='TES02'>Arrecife</option> <option value='TES03'>Azafran</option> <option value='TES04'>Azul Caribe</option> <option value='TES05'>Azul Lago</option> <option value='TES06'>Azul Rey</option> <option value='TES07'>Blue</option> <option value='TES08'>Burdeo</option> <option value='TES09'>Caoba</option> <option value='TES10'>Esmeralda</option> <option value='TES11'>Gris Acero</option> <option value='TES12'>Gris Mouse</option> <option value='TES13'>Gris Nevada</option> <option value='TES14'>Gris Perla</option> <option value='TES15'>Gris Raton</option> <option value='TES16'>Mango</option> <option value='TES17'> Naranja</option> <option value='TES18'>Nawy</option> <option value='TES19'>Negro</option> <option value='TES20'>Pera</option> <option value='TES21'>Rojo</option> <option value='TES22'>Scarlati</option> <option value='TES23'>Tabaco</option> <option value='TES24'>Tilo</option> <option value='TES25'>Tomate</option> <option value='TES26'>Verde</option> <option value='TES27'>Vino</option> </select>");

}else if (this.value == "TGL") {

  $(this).after(" <span class='selectfil"+cortar+"'>Glock:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option><option value='TGL01'>Azul</option> <option value='TGL02'>Azul Caribe</option> <option value='TGL03'>Azul Lago</option> <option value='TGL04'>Azul Piedra-811</option> <option value='TGL05'>Caoba</option> <option value='TGL06'>Esmeralda</option> <option value='TGL07'>Gris Perla</option> <option value='TGL08'>Negro</option> <option value='TGL09'>Mango</option> <option value='TGL10'>Manzana</option> <option value='TGL11'>Plomo</option> <option value='TGL12'>Rojo</option> <option value='TGL13'>Verde Pino</option></select>");

}else if (this.value == "TVT") {

  $(this).after(" <span class='selectfil"+cortar+"'>Venetto:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option><option value='TVT01'>Amarillo</option> <option value='TVT02'>Azul Caribe</option> <option value='TVT03'>Azul Rey</option> <option value='TVT04'>Café</option> <option value='TVT05'>Gris</option> <option value='TVT06'> Naranjo</option> <option value='TVT07'>Negro</option> <option value='TVT08'>Rojo</option> <option value='TVT09'>Verde</option> <option value='TVT10'>Verde Pistacho</option> </select>");
}
else if (this.value == "TVZ") {

  $(this).after(" <span class='selectfil"+cortar+"'>Venezia:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option><option value='TVZ01'>Azul-821</option> <option value='TVZ02'>Azul Piera-811</option> <option value='TVZ03'>Bicolor Amarillo-52</option> <option value='TVZ04'>Bicolor Azul Noche-53</option> <option value='TVZ05'>Bicolor Azul-31</option> <option value='TVZ06'>Gris Oscuro-78</option> <option value='TVZ07'>Gris-72</option> </select>");
}
else if (this.value == "TEL") {

  $(this).after(" <span class='selectfil"+cortar+"'>Elasticity:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option><option value='TEL01'>Azul 21</option> <option value='TEL02'>Azul 39</option> <option value='TEL03'>Azul 67</option> <option value='TEL04'>Gris 14</option> <option value='TEL05'>Gris 64</option> <option value='TEL06'>Marron 07</option> <option value='TEL07'>Naranjo 65</option> <option value='TEL08'>Negro 60</option> <option value='TEL09'>Rojo 68</option> <option value='TEL10'>Verde 66</option> </select>");
}
else if (this.value == "TRN") {

  $(this).after(" <span class='selectfil"+cortar+"'>Renna:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option> <option value='TRN01'>Amarillo 86</option> <option value='TRN02'>Amarillo 957</option> <option value='TRN03'>Azul Marino 8</option> <option value='TRN04'>Beige 730</option> <option value='TRN05'>Blanco Invierno 126</option> <option value='TRN06'>Burdeo 7</option> <option value='TRN07'>Celeste Azul 120</option> <option value='TRN08'>Grafito 620</option> <option value='TRN09'>Lila 83</option> <option value='TRN10'>Morado 82</option> <option value='TRN11'>Negro 9</option> <option value='TRN12'>Pistacho 71</option> <option value='TRN13'>Rojo 122</option> <option value='TRN14'>Rojo Sandia 103</option></select>");
}
else if (this.value == "TPG") {

  $(this).after(" <span class='selectfil"+cortar+"'>Pegaso:</span> <select class='selectfil"+cortar+"' id='cuerpo"+cortar+"' ><option></option> <option value='TPG01'>Negro 562</option> <option value='TPG02'>Rojo 582</option> <option value='TPG03'>Naranjo 558</option> <option value='TPG04'>Pistacho 569</option> <option value='TPG05'>Café 552</option></select>");
};
     
 });
});


