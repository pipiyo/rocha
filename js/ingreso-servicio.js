function guia()
{
   if(document.getElementById("valguia").checked == true)
   {
   document.getElementById("txt_guia").disabled = false;
   }
   else
   {
   document.getElementById("txt_guia").disabled = true;
   }
}

$(function(){
                $('#txt_comuna').autocomplete({
                   source : 'ajaxComuna.php',
                   select : 
             function(event, ui)
           {
      
                   }
                 });
            });

function seleccion1()
{
Bodega = document.getElementById('Bodega');
Sillas = document.getElementById('Sillas'); 
Produccion= document.getElementById('Produccion');  
General = document.getElementById('General'); 
Despacho = document.getElementById('Despacho');
Instalacion = document.getElementById('Instalacion');
Servicio = document.getElementById('Servicio');
desins = document.getElementById('desins');
factura = document.getElementById('factura');

p1 = document.getElementById('p1');
p2 = document.getElementById('p2');
p3 = document.getElementById('p3');

var Nombre = document.getElementById('txt_nombre_servicio').selectedIndex;

if(Nombre == '1')
{
  Sillas.style.display = "none";
  Servicio.style.display = "none";
  Produccion.style.display = "";
  Despacho.style.display = "none";
  Instalacion.style.display = "none";
  Bodega.style.display = "none";
  factura.style.display = "none";
  desins.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;

}
 
else if(Nombre == '2')
{
  Sillas.style.display = "none";
  Produccion.style.display = "none";
  Servicio.style.display = "none";
  Instalacion.style.display = "none";
  desins.style.display = "";
  factura.style.display = "none";
  Despacho.style.display = "";
  Bodega.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;


}
else if (Nombre == '3')
{

  Sillas.style.display = "none";
  Produccion.style.display = "none";
  Servicio.style.display = "none";
  Instalacion.style.display = "";
  desins.style.display = "";
  factura.style.display = "none";
  Despacho.style.display = "none";
  Bodega.style.display = "none";

  p1.disabled=false;
  p3.disabled=true;
  p2.disabled=true;
  
}

else if (Nombre == '9')
{
  Sillas.style.display = "none";
  Produccion.style.display = "none";
  Servicio.style.display = "";
  Instalacion.style.display = "none";
  desins.style.display = "none";
  factura.style.display = "none";
  Despacho.style.display = "none";
  Bodega.style.display = "none";
  desins.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
  
}
else if (Nombre == '6')
{
  Sillas.style.display = "";
  Servicio.style.display = "none";
  Produccion.style.display = "none";
  Instalacion.style.display = "none";
  desins.style.display = "none";
  Despacho.style.display = "none";
  Bodega.style.display = "none"; 
  factura.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
}
else if (Nombre == '7')
{
  Bodega.style.display = "";
  Sillas.style.display = "none";
  Servicio.style.display = "none";
  Produccion.style.display = "none";
  Instalacion.style.display = "none";
  desins.style.display = "none";
  factura.style.display = "none";
  Despacho.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
}
else if (Nombre == '12' || Nombre == '13')
{
  factura.style.display = "";
  Bodega.style.display = "none";
  Sillas.style.display = "none";
  Servicio.style.display = "none";
  Produccion.style.display = "none";
  Instalacion.style.display = "none";
  desins.style.display = "none";
  Despacho.style.display = "none";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
}


else if (Nombre == '4' || '5'  || '8' || '9'  || '10')
{
 
  Bodega.style.display = "none";
  Sillas.style.display = "none";
  Servicio.style.display = "none";
  Produccion.style.display = "none";
  Instalacion.style.display = "none";
  desins.style.display = "none";
  factura.style.display = "none";
  Despacho.style.display = "none";
  Desarrollo.style.display = "";
  Mantencion.style.display = "";
  Sistema.style.display = "";
  p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
}

else 

{
   Sillas.style.display = "none"; 
   Produccion.style.display = "none";
   Servicio.style.display = "none";
   factura.style.display = "none";
   Instalacion.style.display = "none";
   Despacho.style.display = "none";
   desins.style.display = "none";
   p1.disabled=false;
  p3.disabled=false;
  p2.disabled=false;
 
}
}

function dias1()
{
var fecha1= document.getElementById('txt_fechai_servicio').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae_servicio').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));

fecha_texto = anyo1+"-"+mes1a+"-"+dia1;
ms = Date.parse(fecha1);
diasem =  new Date(ms).getDay();
dias = dias +1;
final = 0;
inicio=0;

while(inicio < dias)
{
  if(diasem == 6 )
  {
    diasem=-1;
  }
  else if( diasem == 0)
  {
    
  }
  else
  {
    final++;
  }
  inicio++;
  diasem++;
}

document.getElementById('txt_cantidad_dias').value= final; 
}
$(function(){
          $('#txt_fechae_servicio').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
        $('#txt_fechai_servicio').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
   
    });

function habilitarpro()
{
  
   
  if(document.getElementById('txt_Categoria').selectedIndex == '1')
   {
    document.getElementById('txt_proceso').disabled=false;
      document.getElementById('txt_procesoi').disabled=false;
    document.getElementById('txt_vale').readOnly = false;
    
     }
  else
    {
    document.getElementById('txt_proceso').disabled=true;
    document.getElementById('txt_procesoi').disabled=true;
     document.getElementById('txt_vale').readOnly = true;
  }
  
}
function habilitarpros()
{
  
   
  if(document.getElementById('txt_Categoria').selectedIndex == '1')
   {
    document.getElementById('txt_procesos').disabled=false;
     }
  else
    {
    document.getElementById('txt_procesos').disabled=true;
  }
  
}

function myFunction()
{

contador = 1;

while(contador < 50)
{
var con = document.getElementById("con" + contador);  

if(con.style.display == 'none')
{
  con.style.display = '';
  contador = contador + 50;
}
contador++;
}

}

$(function(){
                $('#txt_comuna').autocomplete({
                   source : 'ajaxComuna.php',
                   select : 
             function(event, ui)
           {
      
                   }
                 });
            });

$(function(){
                $('#txt_vale').autocomplete({
                   source : 'ajaxVale.php',
                   select : 
             function(event, ui)
           {
      
                   }
                 });
            });





           function completar(id)
           {
            vale = document.getElementById('txt_vale').value;
                 num = id.substring(10,13);

                $('#txt_codigo' + num).autocomplete({
                   source : 'ajaxVale-Producto.php?test='+vale,
                   select : 
           function(event, ui)
           {
                       $('#txt_cantid_producto' + num).slideUp('slow', function()
             {
                            $('#txt_cantid_producto' + num).val(
                                 ui.item.cod 
                            );
              
                       });
                       $('#txt_cantid_producto' + num).slideDown('slow');

                        $('#txt_producto' + num).slideUp('slow', function()
             {
                            $('#txt_producto' + num).val(
                                 ui.item.codigo 
                            );
              
                       });
                       $('#txt_producto' + num).slideDown('slow');

                       $('#txt_cantid_productoe' + num).slideUp('slow', function()
             {
                            $('#txt_cantid_productoe' + num).val(
                                 ui.item.uti
                            );
              
                       });
                       $('#txt_cantid_productoe' + num).slideDown('slow');

                       $('#txt_cantid_productos' + num).slideUp('slow', function()
             {
                            $('#txt_cantid_productos' + num).val(
                                 ui.item.sol
                            );
              
                       });
                       $('#txt_cantid_productos' + num).slideDown('slow');
             
                   }   

                });
            }       


           function completar1(id)
           {
            vale = document.getElementById('txt_vale').value;
            num = id.substring(12,14);

                $('#txt_producto'+ num).autocomplete({
                   source : 'ajaxVale-Productodes.php?test='+vale,
                   select : 
           function(event, ui)
           {
                       $('#txt_cantid_producto'+ num).slideUp('slow', function()
             {
                            $('#txt_cantid_producto'+ num).val(
                                 ui.item.cod 
                            );
              
                       });
                       $('#txt_cantid_producto'+ num).slideDown('slow');

                       $('#txt_codigo'+ num).slideUp('slow', function()
             {
                            $('#txt_codigo'+ num).val(
                                 ui.item.codigo 
                            );
              
                       });
                       $('#txt_codigo'+ num).slideDown('slow');

                         $('#txt_cantid_productoe' + num).slideUp('slow', function()
             {
                            $('#txt_cantid_productoe' + num).val(
                                 ui.item.uti
                            );
              
                       });
                       $('#txt_cantid_productoe' + num).slideDown('slow');

                       $('#txt_cantid_productos' + num).slideUp('slow', function()
             {
                            $('#txt_cantid_productos' + num).val(
                                 ui.item.sol
                            );
              
                       });
                       $('#txt_cantid_productos' + num).slideDown('slow');
             
                   }     
                });
            }       
function total()
{
total1 = document.getElementById('txt_cantid_producto1').value ;
total2 = document.getElementById('txt_cantid_producto2').value ;
total3 = document.getElementById('txt_cantid_producto3').value ;
total4 = document.getElementById('txt_cantid_producto4').value ;
total5 = document.getElementById('txt_cantid_producto5').value ;
total6 = document.getElementById('txt_cantid_producto6').value ;
total7 = document.getElementById('txt_cantid_producto7').value ;
total8 = document.getElementById('txt_cantid_producto8').value ;
total9 = document.getElementById('txt_cantid_producto9').value ;
total10 = document.getElementById('txt_cantid_producto10').value ;
total11 = document.getElementById('txt_cantid_producto11').value ;
total12 = document.getElementById('txt_cantid_producto12').value ;
total13 = document.getElementById('txt_cantid_producto13').value ;
total14 = document.getElementById('txt_cantid_producto14').value ;
total15 = document.getElementById('txt_cantid_producto15').value ;
total16 = document.getElementById('txt_cantid_producto16').value ;
total17 = document.getElementById('txt_cantid_producto17').value ;
total18 = document.getElementById('txt_cantid_producto18').value ;
total19 = document.getElementById('txt_cantid_producto19').value ;
total20 = document.getElementById('txt_cantid_producto20').value ;
total21 = document.getElementById('txt_cantid_producto21').value ;
total22 = document.getElementById('txt_cantid_producto22').value ;
total23 = document.getElementById('txt_cantid_producto23').value ;
total24 = document.getElementById('txt_cantid_producto24').value ;
total25 = document.getElementById('txt_cantid_producto25').value ;
total26 = document.getElementById('txt_cantid_producto26').value ;
total27 = document.getElementById('txt_cantid_producto27').value ;
total28 = document.getElementById('txt_cantid_producto28').value ;
total29 = document.getElementById('txt_cantid_producto29').value ;
total30 = document.getElementById('txt_cantid_producto30').value ;
total31 = document.getElementById('txt_cantid_producto31').value ;
total32 = document.getElementById('txt_cantid_producto32').value ;
total33 = document.getElementById('txt_cantid_producto33').value ;
total34 = document.getElementById('txt_cantid_producto34').value ;
total35 = document.getElementById('txt_cantid_producto35').value ;
total36 = document.getElementById('txt_cantid_producto36').value ;
total37 = document.getElementById('txt_cantid_producto37').value ;
total38 = document.getElementById('txt_cantid_producto38').value ;
total39 = document.getElementById('txt_cantid_producto39').value ;
total40 = document.getElementById('txt_cantid_producto40').value ;
total41 = document.getElementById('txt_cantid_producto41').value ;
total42 = document.getElementById('txt_cantid_producto42').value ;
total43 = document.getElementById('txt_cantid_producto43').value ;
total44 = document.getElementById('txt_cantid_producto44').value ;
total45 = document.getElementById('txt_cantid_producto45').value ;
total46 = document.getElementById('txt_cantid_producto46').value ;
total47 = document.getElementById('txt_cantid_producto47').value ;
total48 = document.getElementById('txt_cantid_producto48').value ;
total49 = document.getElementById('txt_cantid_producto49').value ;


fin = parseInt(parseInt(total1) + parseInt(total2) + parseInt(total3) + parseInt (total4) + parseInt(total5) + parseInt(total6) + parseInt(total7) + parseInt(total8) + parseInt(total9) + parseInt(total10) +
 parseInt(total11) + parseInt(total12) + parseInt(total13) + parseInt (total14) + parseInt(total15) + parseInt(total16) + parseInt(total17) + parseInt(total18) + parseInt(total19) + 
  parseInt(total20)+parseInt(total21) + parseInt(total22) + parseInt(total23) + parseInt(total24) + parseInt(total25) + parseInt(total26) + parseInt(total27) + parseInt(total28) + parseInt(total29) + 
  parseInt(total30) + parseInt(total31) + parseInt(total32) + parseInt(total33) + parseInt(total34) + parseInt(total35) + parseInt(total36) + parseInt(total37) + parseInt(total38) + parseInt(total39) + 
  parseInt(total40)+ parseInt(total41) + parseInt(total42) + parseInt(total43) + parseInt(total44) + parseInt(total45)+ parseInt(total46) + parseInt(total47) + parseInt(total48) + parseInt(total49 ));

  document.getElementById('txt_cant').value =fin;

}


function botonmas()
{
   
  if(document.getElementById('txt_vale').value == '')
   {
    document.getElementById('mas').style.display='none';
    contador = 1;
    while(contador < 50)
    {
      document.getElementById('txt_producto'+contador).value = '';
      document.getElementById('txt_cantid_producto'+contador).value = 0;
      document.getElementById('txt_codigo'+contador).value = '';
      document.getElementById('con'+contador).style.display='none';
      contador++;
    }
   }
  else
   {
    document.getElementById('mas').style.display='';
   }
  
}


function negativo()
{
    contador = 1;
    while(contador < 50)
    {
  
      cantidad1 = document.getElementById('txt_cantid_producto'+contador).value;
        cantidad2 = document.getElementById('txt_cantid_productoe'+contador).value;
          cantidad3 = document.getElementById('txt_cantid_productos'+contador).value;
            cantidad4 = parseInt(parseInt(cantidad1) + parseInt(cantidad2));

            if(parseInt(cantidad1) > parseInt(cantidad3))
            {
              document.getElementById('ingreso-servicio').disabled = true;
              contador = contador + 100;
            }
            else
            {
              document.getElementById('ingreso-servicio').disabled = false;
            }

      
      
      contador++;
    }
}

function justNumbers(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
 
return /\d/.test(String.fromCharCode(keynum));
}