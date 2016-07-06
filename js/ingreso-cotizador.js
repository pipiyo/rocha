separadorDecimalesInicial="."; //Modifique este dato para poder obtener la nomenclatura que utilizamos en mi pais
separadorDecimales=","; //Modifique este dato para poder obtener la nomenclatura que utilizamos en mi pais
separadorMiles="."; //Modifique este dato para poder obtener la nomenclatura que utilizamos en mi pais

function arreglar(numero)
{ 
var numeroo=""; 
numero=""+numero; 
partes=numero.split(separadorDecimalesInicial);
entero=partes[0];
if(partes.length>1)
{ 
decimal=partes[1]; 
} 
cifras=entero.length; 
cifras2=cifras 
for(a=0;a<cifras;a++)
{
cifras2-=1;
numeroo+=entero.charAt(a);
if(cifras2%3==0 &&cifras2!=0)
{
numeroo+=separadorMiles;
}
} 
if(partes.length>1)
{
numeroo+=separadorDecimales+decimal;
}
return numeroo 
}


$(function(){
    $( "#editor" ).sortable({
        cursor: 'pointer',
        connectWith: ".editor"
    });
    $( "#editor" ).disableSelection();
  });


$(document).ready(function(){
$("#agregarpiso").click(function(e){
  if($("#piso").val().length != 0)
  {
    cantidad = $(".producto-general").size();
    $("#editor").append("<tr id='producto-general"+cantidad+"' class='producto-general'><th colspan='7' >"+$("#piso").val()+"</th><th><a id='eliminar-cot"+cantidad+"' class='eliminar-cot'><i class='fa fa-trash-o fa-2x'></i></a></th></tr>");
  }
});
});

$(document).ready(function(){
  $('.eliminar-cot').live( "click", function(){
    $(this).parent().parent().remove();
    $('#fila-total'+this.id.substr(12)).remove();
  });
}); 

$(document).ready(function(){
$(".cantidad").keyup(function(e){
var sum = 0;
$(".cantidad").each(function() {
  if ($(this).val().length != 0) {
    sum = parseInt(sum) + parseInt($(this).val());
    };
});
$("#totalpaneles").text("TOTAL PANELES "+sum);
});
});


$(document).ready(function(){
  $('#preview').live( "click", function(){
  var lista = Array();
  var lista1 = Array();
  var radicado = $("#codigo-radicado").val();
  $("#editor").find('tr').each(function(i, v) {
    lista[i] = Array();
    
    var sumador = 0;
    var test = this.id.substr(4);
    var test = parseInt(test) + 1;

    $(this).children().each(function(ii, vv){
        if(sumador == 3)
        {
          lista[i][ii] = $("#seleccion"+test).val();
        }
        else
        {
          lista[i][ii] = $(this).text();
        }
        sumador++;
    }); 

  });

  $("tfoot").find('tr').each(function(ind, val) {
    lista1[ind] = Array();

    $(this).children().each(function(iind, vval){
        lista1[ind][iind] = $(this).text();
    }); 
  });

  var indexTH = "";
  var single = false;
  var listaindex = Array();
  
  for (var i = 0 ; i < lista.length ;  i++) 
  {

    single = false;
    if(lista[i].length < 3)
    {
      indexTH = lista[i][0];
      listaindex[i] = indexTH;
      single = true;
      delete lista[i][0];
    }
    for(var e = 0 ; e < lista[i].length ;  e++)
    {
      if (e == 0 && single === false) 
      {
        delete lista[i][8];
        lista[i][8] = indexTH; 
      }
    };
  };
  lista = JSON.stringify(lista);
  lista1 = JSON.stringify(lista1);
  listaindex = JSON.stringify(listaindex);
  $.ajax({
    type: "POST",
    url: 'ajax_preview_cotizacion.php',
    data: { lista: lista, index: listaindex,lista1: lista1},
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
  },
    success: function(data){
   // $("#prueba").val(lista.toString());
     location.href='DescripcionRadicado.php?txt_codigo_proyecto2='+radicado;
  }

    });
  });
});


$(document).ready(function(){
  $('.producto-general, #editor').live( "mouseout", function(){

    var total = 0;
    var totalcosto = 0;

    var grantotal = 0;
    var bloque = "";
    var bloquefin = "";
    var bloquefin1 = "";

    var valorarr = [];
    var valorarr1 = [];
    var bloquearr = [];
    var filaarr = [];

    $('#productos-cotizador #editor tr').each(function () {
        if(this.id.substring(0,16) == "producto-general")
        {
          bloquefin = this.id;
          bloquefin1 = bloquefin;
          var valor = $(this).find("td").eq(6).html();
          if(valor != null)
          {
            if(this.id.substring(0,10) != 'fila-total')
            {
               bloquearr.push(bloquefin);
             }
           }
        }
        else
        {
          var valor = $(this).find("td").eq(6).html();
        
            if(this.id.substring(0,10) != 'fila-total')
            {
               bloquearr.push(bloquefin1);
            }
           
        }
        var valorcosto = $(this).find("td").eq(7).html();
        var valor = $(this).find("td").eq(6).html();
        if(valor != null)
        {
          if(this.id.substring(0,10) != 'fila-total')
          {

            valor = valor.replace(".","");
            valor = valor.replace(".","");
            valor = valor.replace(".","");
            valor = valor.replace(",",".");

            valorcosto = valorcosto.replace(".","");
            valorcosto = valorcosto.replace(",",".");

            total += parseFloat(valor);
            totalcosto += parseFloat(valorcosto);
            bloque = this.id;
            valorarr.push(valor);
            valorarr1.push(valorcosto);
            filaarr.push(this.id);
            grantotal += parseFloat(valor);

          }
        }
    });
  

    total = 0;
    totalc = 0;

    for (index = 0; index < bloquearr.length; index++) {
          general = bloquearr[index];

          if(general.substring(0,16) == "producto-general")
          {
            /* 1 */
    
            if(index == 0)
            {
              index1 = index;
            }
            else
            {
              index1 = parseFloat(index) - 1;
            }
            /* 2 */
            if(bloquearr[index1] == "")
            {
              finbloque = bloquearr[index];
            }
            else if(bloquearr[index1] != bloquearr[index])
            {
              total = 0;
              totalc = 0;
              finbloque = bloquearr[index];
            }
            else
            {
              finbloque = bloquearr[index1];
            }

            /* 1 */
            if(bloquearr[index] == finbloque)
            {
              total += parseFloat(valorarr[index]);
              totalc += parseFloat(valorarr1[index]);
            }
            else
            {
              total = 0;
              totalc = 0;
            }
          }
          else
          {
            total = 0;
            totalc = 0;
          }

          var num = arreglar(total);
          var numc = arreglar(totalc);
          /*num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
          num = num.split('').reverse().join('').replace(/^[\.]/,''); */

          $("#fila-total"+general.substr(16)).remove();
          $("#fila-total").remove();
          $("#"+filaarr[index]).after("<tr id='fila-total"+general.substr(16)+"' class='fila-total'><td></td><td></td><td></td><td></td><td></td><td align='right' ><strong>Total</strong></td><td align='right'>"+num+"</td><td align='right'>"+numc+"</td></tr>");
          $("#fila-total").remove();
    }
    $('#productos-cotizador #editor tr').each(function () {
        if(this.id.substring(0,16) == "producto-general")
        {
            cuenta = 0;
            for (index = 0; index < bloquearr.length; index++)
            {
              general = bloquearr[index];
              if(general == this.id)
              {
                cuenta++;
              } 
            }
            if(cuenta == 0)
            {
              $("#fila-total"+this.id.substr(16)).remove();
            }
        }
     });

   $(".final").remove();
   $(".finala").after("<tr class='final'><td colspan='6' align='right'>Neto</td><td id='subtotal1' align='right'>"+arreglar(grantotal)+"</td><td align='right'>"+arreglar(totalcosto)+"</td></tr>");

    totaldefila1 = $(".final1").size();
    if(totaldefila1 <= 0)
    {
      $(".final").after("<tr class='final1'><td colspan='6' align='right'>Descuento</td><td align='center' id='neto1'></td></tr>");
      $(".final1").after("<tr class='final2'><td colspan='6' align='right'>Sub Total</td><td align='right' id='sbtotal1'>"+arreglar(grantotal)+"</td></tr>");
      $(".final2").after("<tr class='final3'><td colspan='6' align='right'>Descuento 2</td><td align='center' id='neto2'></td></tr>");
      $(".final3").after("<tr class='final4'><td colspan='6' align='right'>Sub Total 2</td><td align='right' id='sbtotal2'>"+arreglar(grantotal)+"</td></tr>");
      $(".final4").after("<tr class='final5'><td colspan='6' align='right'>IVA</td><td align='right' id='iva'></td></tr>");
      $(".final5").after("<tr class='final6'><td colspan='6' align='right'>Total</td><td align='right' id='totaltotal'>"+arreglar(grantotal)+"</td></tr>");
    }
  });
}); 

/* Descuento Item */

$(document).ready(function(){
  $('.descuento').live( "dblclick", function(){
    $numero = this.id.substr(9);
    $valor_antiguo = $("#descuento"+$numero).text();
   
    $(this).text("");
    $(this).append("<i id='cerrar"+$numero+"' class='fa fa-times-circle cerrar-r'></i> </br> <input type='number' step='any' id='txt_descuento"+this.id.substr(9)+"' class='txt_descuento' value=''> <input class='btn_descuento' value='Aceptar' type='button' id='btn_descuento"+this.id.substr(9)+"'>");
    $(".txt_descuento").css( "width", "50%");
    $(".btn_descuento").css( "width", "50%");
    $(".txt_descuento").css( "border", "solid #ccc 1px");

    $("#txt_descuento"+this.id.substr(9)).focus(); 


    $(this).keydown(function(e){
          if(e.keyCode == 27)
          {
          $(this).text($valor_antiguo);
          }
    });
  });
});

$(document).ready(function(){
  $('.btn_descuento').live( "click", function(){
    $numero = this.id.substr(13);

    valornew = $("#txt_descuento"+$numero).val();
    total_final = $("#valorcantidad"+$numero).val();
    cantidad_final = $("#cantidaditem"+$numero).text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    total_final = total_final * cantidad_final;

    if(valornew.length == 0 || valornew == 0)
    {
      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }

      $("#descuento"+$numero).text(num);
      $("#total-final"+$numero).text(num1);
      $("#valorantiguo"+$numero).val(num);
    
  });
}); 

$(document).ready(function(){
  $('.cerrar-r').live( "click", function(){
    $numero = this.id.substr(6);
    valorant = $("#valorantiguo"+$numero).val();
    $("#descuento"+$numero).text(valorant);
    
  });
}); 

/* Descuento 1 */

$(document).ready(function(){
  $('#neto1').live( "dblclick", function(){

    $valor_antiguo = $("#neto1").text();
    $(this).text("");
    $(this).append("<i id='cerrar-neto' class='fa fa-times-circle cerrar-r1'></i> </br> <input type='number' step='any' id='txt_neto' class='txt_neto' value=''> <input class='btn_neto' value='Aceptar' type='button' id='btn_neto'>");
    $(".txt_neto").css( "width", "50%");
    $(".btn_neto").css( "width", "50%");
    $(".txt_neto").css( "border", "solid #ccc 1px");
    $(".txt_neto").css( "background", "#ffffff");

    $("#txt_neto").focus(); 

      $("#neto1").keydown(function(e){
      if(e.keyCode == 27)
      {
        $("#neto1").text($valor_antiguo);
      }
    });

  });
});

$(document).ready(function(){
  $('.cerrar-r1').live( "click", function(){
    $("#neto1").text($valor_antiguo);
  });
}); 

$(document).ready(function(){
  $('.btn_neto').live( "click", function(){
   
    valornew = $("#txt_neto").val();
    total_final = $("#subtotal1").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {
      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }

      $("#neto1").text(num);
      $("#sbtotal1").text(num1);

    /* -- */

    valornew = $("#neto2").text();
    total_final = $("#sbtotal1").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {
      total_final = total_final.replace(".",","); 

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,'');

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }

      $("#neto2").text(num);
      $("#sbtotal2").text(num1);
      
  });
}); 

/* Descuento 2 */

$(document).ready(function(){
  $('#neto2').live( "dblclick", function(){

    $valor_antiguo = $("#neto2").text();
    $(this).text("");
    $(this).append("<i id='cerrar-neto2' class='fa fa-times-circle cerrar-r2'></i> </br> <input type='number' step='any' id='txt_neto2' class='txt_neto2' value=''> <input class='btn_neto2' value='Aceptar' type='button' id='btn_neto2'>");
    $(".txt_neto2").css( "width", "50%");
    $(".btn_neto2").css( "width", "50%");
    $(".txt_neto2").css( "border", "solid #ccc 1px");
    $(".txt_neto2").css( "background", "#ffffff");

    $("#txt_neto2").focus(); 

      $("#neto2").keydown(function(e){
      if(e.keyCode == 27)
      {
        $("#neto2").text($valor_antiguo);
      }
    });

  });
});

$(document).ready(function(){
  $('.cerrar-r2').live( "click", function(){
    $("#neto2").text($valor_antiguo);
  });
}); 

$(document).ready(function(){
  $('.btn_neto2').live( "click", function(){
   
    valornew = $("#txt_neto2").val();
    total_final = $("#sbtotal1").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {
      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }

      $("#neto2").text(num);
      $("#sbtotal2").text(num1);
      
  });
}); 


/*Final Regulador*/

$(document).ready(function(){
  $('.producto-general, #editor,tfoot,thead').live( "mouseout", function(){

    valornew = $("#neto1").text();
    total_final = $("#subtotal1").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }
      $("#sbtotal1").text(num1);

     /* -- */

    valornew = $("#neto2").text();
    total_final = $("#sbtotal1").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {
      total_final = total_final.replace(".",","); 

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final = total_final.replace(".",",");

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }
      $("#sbtotal2").text(num1);

      /* -- */

    valornew = "0.19";
    total_final = $("#sbtotal2").text();

    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    if(valornew.length == 0 || valornew == 0)
    {
      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {
      total_final3 = total_final;
      total_final = total_final * valornew;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      total_final4 = parseFloat(total_final) + parseFloat(total_final3);
      total_final4 = total_final4.toFixed(2);
      total_final4 = total_final4.toString();

      total_final = total_final.replace(".",",");
      total_final4 = total_final4.replace(".",",");

      var num = total_final4;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }
      $("#iva").text(num1);
      $("#totaltotal").text(num);
  });
}); 

/* Cantidad */

$(document).ready(function(){
  $('.cantidaditem').live( "dblclick", function(){
   
    $numero = this.id.substr(12);
    $valor_antiguo = $("#cantidaditem"+$numero).text();
   
    $(this).text("");
    $(this).append("<i id='cerrarcan"+$numero+"' class='fa fa-times-circle cerrar-r3'></i> </br> <input type='number' step='any' id='txt_cantidad"+this.id.substr(12)+"' class='txt_cantidad' value=''> <input class='btn_cantidad' value='Aceptar' type='button' id='btn_cantidad"+this.id.substr(12)+"'>");
    $(".txt_cantidad").css( "width", "100%");
    $(".btn_cantidad").css( "width", "100%");
    $(".txt_cantidad").css( "border", "solid #ccc 1px");

    $("#txt_cantidad"+this.id.substr(12)).focus(); 


    $(this).keydown(function(e){
          if(e.keyCode == 27)
          {
          $(this).text($valor_antiguo);
          }
    });
  });
});


$(document).ready(function(){
  $('.cerrar-r3').live( "click", function(){
   $numero = this.id.substr(9);
    valorant = $("#valorantiguocantidad"+$numero).val();
    $("#cantidaditem"+$numero).text(valorant);
  });
}); 

$(document).ready(function(){
  $('.btn_cantidad').live( "click", function(){
    $numero = this.id.substr(12);

    valornew = $("#descuento"+$numero).text();
    valorcantidad = $("#txt_cantidad"+$numero).val();
    total_final = $("#valorcantidad"+$numero).val();

    if (valorcantidad.length == 0 || valorcantidad  == 0) 
    {
      valorcantidad = 1;
    }

    total_final = total_final.replace(".","");
    total_final = total_final.replace(",",".");

    total_final2 = total_final * valorcantidad;
    total_final = total_final * valorcantidad;
   

    if(valornew.length == 0 || valornew == 0)
    {
      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 

    }
    else
    {

      total_final1 = (total_final * valornew) / 100;
      total_final = total_final - total_final1;
      total_final = total_final.toFixed(2);
      total_final = total_final.toString();

      valornew = valornew.replace(".",",");
      valornew = valornew.replace(",",",");

      total_final2 = total_final2.toFixed(2);
      total_final2 = total_final2.toString();

      var num = valornew;
      num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num = num.split('').reverse().join('').replace(/^[\.]/,''); 

      var num1 = total_final;
      num1 = num1.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num1 = num1.split('').reverse().join('').replace(/^[\.]/,''); 
    }

      var num2 = total_final2;
      num2 = num2.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
      num2 = num2.split('').reverse().join('').replace(/^[\.]/,'');


      $("#cantidaditem"+$numero).text(valorcantidad);
      $("#total-final"+$numero).text(num1);
      $("#valorantiguocantidad"+$numero).val(valorcantidad);
      
  });
}); 


/* Eliminar */

$(document).ready(function(){
  $('.bas').live( "click", function(){
     numero = this.id.substr(6);
     numero = this.id.substr(6) - 1;
     $("#fila"+numero).remove();
  });
}); 


/* Auto completar*/

$(function(){
                $('.item_producto').autocomplete({
                   source : 'ajax-agregar-producto.php',
                   select : 
function(event, ui){

      $('.item_codigo').slideUp('slow', function(){ $('.item_codigo').val( ui.item.cod ); });
      $('.item_codigo').slideDown('slow');

      $('.item_venta').slideUp('slow', function(){ $('.item_venta').val( ui.item.psd ); });
      $('.item_venta').slideDown('slow');

      $('.item_costo').slideUp('slow', function(){ $('.item_costo').val( ui.item.ud ); });
      $('.item_costo').slideDown('slow');

      $('.item_categoria').slideUp('slow', function(){ $('.item_categoria').val( ui.item.stock ); });
      $('.item_categoria').slideDown('slow');
    }
  });
});


$(function(){
                $('.item_codigo').autocomplete({
                   source : 'ajax-agregar-producto-codigo.php',
                   select : 
function(event, ui){

      $('.item_producto').slideUp('slow', function(){ $('.item_producto').val( ui.item.cod ); });
      $('.item_producto').slideDown('slow');

      $('.item_venta').slideUp('slow', function(){ $('.item_venta').val( ui.item.psd ); });
      $('.item_venta').slideDown('slow');

      $('.item_costo').slideUp('slow', function(){ $('.item_costo').val( ui.item.ud ); });
      $('.item_costo').slideDown('slow');

      $('.item_categoria').slideUp('slow', function(){ $('.item_categoria').val( ui.item.stock ); });
      $('.item_categoria').slideDown('slow');
    }
  });
});

/* Añadir */

$(document).ready(function(){
  $('#ingreso').live( "click", function(){
        icodigo = $(".item_codigo").val();
        iproducto= $(".item_producto").val();
        iventa = $(".item_venta").val();
        icosto = $(".item_costo").val();
        icategoria = $(".item_categoria").val();

        var numeritos = [];

        $('#productos-cotizador #editor tr').each(function () {   
          if(this.id.substr(0,4) == "fila" && this.id.substr(0,10) != "fila-total") 
          {
           numeritos.push(this.id.substr(4));
          }
        });   
        var max=Math.max.apply(null, numeritos);
        if(max == -Infinity)
        {
          max = 0;
        }
  
        cuenta = max + 1;
        cuentapos = cuenta + 1;
        cuentaneg = cuenta - 1;

        cantidad = $(".filcount").size();

        seleccion="";
        if(icategoria == "Mueble De Linea" || icategoria == "Superficies Curvas" || icategoria == "Superficies Rectas" || icategoria == "Cajoneras" || icategoria == "Soportes" )
        {
          seleccion = "<select class='seleccion' id='seleccion"+cuentapos+"'><option>Seleccione</option><option value='m'>Melamina</option> <option value='l'>Laminado</option> <option value='e'>Enchape</option> </select>";
        }
        if(cantidad == 0)
        {
          $("#editor").append("<tr  id='fila"+cuenta+"' class='filcount'><td align='right' id='cantidaditem"+cuentapos+"' class='cantidaditem'>1</td><td id='codigo_producto"+cuentapos+"'  align='center'>"+icodigo+"</td> <td> "+iproducto+" <input type='hidden' value='1' id='valorantiguocantidad"+cuentapos+"'>  <input type='hidden' value='"+arreglar(iventa)+"' id='valorcantidad"+cuentapos+"'> <input type='hidden' value='' id='valorantiguo"+cuentapos+"'></td><td align='center'>"+seleccion+"</td> <td align='right' id='unitario"+cuentapos+"'>"+arreglar(iventa)+"</td> <td align='center' id='descuento"+cuentapos+"' class='descuento'></td> <td align='right' id='total-final"+cuentapos+"'> "+arreglar(iventa)+" </td><td align='right' id='costo"+cuentapos+"'> "+arreglar(icosto)+" </td><td align='center'><i id='basura"+cuentapos+"' class='fa fa-trash-o fa-2x bas'></i></td></tr>");
        }
        else
        {
          $("#fila"+cuentaneg).after("<tr  id='fila"+cuenta+"' class='filcount'><td align='right' id='cantidaditem"+cuentapos+"' class='cantidaditem'>1</td><td id='codigo_producto"+cuentapos+"' align='center'>"+icodigo+"</td> <td> "+iproducto+" <input type='hidden' value='1' id='valorantiguocantidad"+cuentapos+"'>  <input type='hidden' value='"+arreglar(iventa)+"' id='valorcantidad"+cuentapos+"'> <input type='hidden' value='' id='valorantiguo"+cuentapos+"'></td><td align='center'>"+seleccion+"</td> <td align='right' id='unitario"+cuentapos+"'>"+arreglar(iventa)+"</td> <td align='center' id='descuento"+cuentapos+"' class='descuento'></td> <td align='right' id='total-final"+cuentapos+"'> "+arreglar(iventa)+" </td><td align='right' id='costo"+cuentapos+"'> "+arreglar(icosto)+" </td><td align='center'><i id='basura"+cuentapos+"' class='fa fa-trash-o fa-2x bas'></i></td></tr>");
        }
   });
});


/* Selección*/

/*
$(document).ready(function(){
  $('#preview').live( "click", function(){


  $.ajax({
    type: "POST",
    url: 'ajax_preview_cotizacion.php',
    data: { lista: lista, index: listaindex,lista1: lista1},
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
  },
    success: function(data){
   // $("#prueba").val(lista.toString());
    window.open('DescripcionRadicado.php?txt_codigo_proyecto2='+radicado, '_blank');
  }

    });
  });
});
*/

$(document).ready(function(){
 $('.seleccion').live( "change", function(){

  var numero = this.id.substr(9);
  var valor = $(this).val();
  var producto = $("#codigo_producto"+numero).text();
  var cantidad = $("#cantidaditem"+numero).text();
  var descuento = $("#descuento"+numero).text();


 $.ajax({
      type: "POST",
      url: 'respuesta-seleccion-familia.php',
      data: { 'valor': valor, 'codigo': producto, 'cantidad': cantidad, 'descuento': descuento},
      dataType:'json',

      error: function(xhr, status, error) {
        alert(xhr.responseText);
      },

      success: function(data) {
        for(var i=0;i<data.length; i++)
        {
          $("#total-final"+numero).text(arreglar(data[i].VALORTOTAL));
          $("#costo"+numero).text(arreglar(data[i].COSTO));
          $("#unitario"+numero).text(arreglar(data[i].VALORUNITARIO));
          $("#valorcantidad"+numero).val(arreglar(data[i].VALORUNITARIO));
        }
      }

    });
  });
});

/*Editar*/

$(document).ready(function(){
  $('#preview1').live( "click", function(){
  var lista = Array();
  var lista1 = Array();
  var radicado = $("#codigo-radicado").val();
  $("#editor").find('tr').each(function(i, v) {
    lista[i] = Array();
    var sumador = 0;
    var test = this.id.substr(4);
    var test = parseInt(test) + 1;

    $(this).children().each(function(ii, vv){
        if(sumador == 3)
        {
          lista[i][ii] = $("#seleccion"+test).val();
        }
        else
        {
          lista[i][ii] = $(this).text();
        }
        sumador++;
    });  
  });

  $("tfoot").find('tr').each(function(ind, val) {
    lista1[ind] = Array();

    $(this).children().each(function(iind, vval){
        lista1[ind][iind] = $(this).text();
    }); 
  });

  var indexTH = "";
  var single = false;
  var listaindex = Array();
  
  for (var i = 0 ; i < lista.length ;  i++) 
  {

    single = false;
    if(lista[i].length < 3)
    {
      indexTH = lista[i][0];
      listaindex[i] = indexTH;
      single = true;
      delete lista[i][0];
    }
    for(var e = 0 ; e < lista[i].length ;  e++)
    {
      if (e == 0 && single === false) 
      {
        delete lista[i][8];
        lista[i][8] = indexTH; 
      }
    };
  };
  lista = JSON.stringify(lista);
  lista1 = JSON.stringify(lista1);
  listaindex = JSON.stringify(listaindex);
  $.ajax({
    type: "POST",
    url: 'ajax_preview_cotizacion_editar.php',
    data: { lista: lista, index: listaindex,lista1: lista1},
    dataType:'html',
    error: function(xhr, status, error) {
    alert(xhr.responseText);
  },
    success: function(data){
   // $("#prueba").val(lista.toString());
    location.href='DescripcionRadicado.php?txt_codigo_proyecto2='+radicado;
  }

    });
  });
});
