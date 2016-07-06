$(function(){

	 $('#cliente').autocomplete({
                   source : 'ajaxCliente.php',
                   select : 
				   function(event, ui)
				   {
                      $('#rut').slideUp('slow', function()
					   {
                            $('#rut').val(
                                 ui.item.rut);
							
                       });
                       $('#rut').slideDown('slow');
                   }
                 });
	});	




function elije()

{
	 descuento = document.getElementById('descuento2').value;
	 
	 if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
	
}



$(document).ready(function(){
	$('#ACEPTADO').click(  function(e) {

	if (  $('#estado').val() == "ACEPTADO" || $('#estado').val() == "OK"     ) {

if ( $('#rut').val().length == 0 ) {

alert("Ingrese Rut Cliente");

}else{

$('#MODRAD').submit();

};

}else{

	 		$('#MODRAD').submit();

	 	};

});
});	



$(document).ready(function(){
$('#descuento2').keyup( function(e) {
$('#descuento2').val( this.value. replace(/\./g, ',') );
});	
});	



$(document).ready(function(){
$('#descuento').keyup( function(e) {
$('#descuento').val( this.value. replace(/\./g, ',') );
});	
});	

////////////////////////////////////////////
/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////



$(document).ready(function(){
  $('#menos').click(function(){
        $('#servicios').fadeOut('slow');
		$('#mas').fadeIn('slow');
		$('#menos').fadeOut('slow');
    });

    $('#mas').click(function(){
        $('#servicios').fadeIn('slow');
		$('#menos').fadeIn('slow');
		$('#mas').fadeOut('slow');
    });
});
//////////////////////////////////////////////////////////////////////////
$(function() 
  {     $( "#txt_fechai_servicio").datepicker ({dateFormat: 'yy-mm-dd'});
        $( "#txt_fechae_servicio").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_ingreso").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_entrega").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_contacto").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_inicior").datepicker ({dateFormat: 'yy-mm-dd'});
		$( "#fecha_entregar").datepicker ({dateFormat: 'yy-mm-dd'});
  });
//////////////////////////////////////////////////////////////////////////
function enviar()
{
  document.getElementById("formulario").submit();
} 
/////////////////////////////////////////////////////////////////////////

function dias1()
{
var fecha1= document.getElementById('txt_fechai_servicio').value;
var dia1= fecha1.substr(8);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae_servicio').value;
var dia2= fecha2.substr(8);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));


document.getElementById('txt_cantidad_dias').value= parseInt(dias) + 1; 
}


function dias()
{

var fecha1= document.getElementById('fecha_ingreso').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('fecha_entrega').value;
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

document.getElementById('dias_radicado').value=final; 

 
}

function dias2()
{
var fecha1= document.getElementById('fecha_inicior').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('fecha_entregar').value;
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
document.getElementById('dias_rocha').value=final; 
}




function totalw()
{
var descuento = document.getElementById('descuento').value ;	
var sub_total = document.getElementById('sub_total').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto').value = des1;
if(descuento2 > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}

function seleccions()
{
var sub_total = document.getElementById('sub_total').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto').value
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}
/** */
function totalas()
{
var sub_total = document.getElementById('neto').value;
var neto = document.getElementById('neto2').value ;
var descuento = document.getElementById('descuento2').value ;
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var iva1  = document.getElementById('iva1').value;
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
descuento = descuento.replace(/\./g ,"");
descuento = descuento.replace(/\,/g ,".");
des1 = sub_total * descuento / 100;
des1 = Math.round(sub_total - des1);
document.getElementById('neto2').value = des1;
if(descuento > 0)
{
ejecutar=seleccionas();
}
else
{
ejecutar=seleccions();	
}
}

function seleccionas()
{
var sub_total = document.getElementById('neto').value;	
var total = document.getElementById('total').value;
var iva = document.getElementById('iva').value;
var neto =document.getElementById('neto2').value;
var iva1  = document.getElementById('iva1');
sub_total = sub_total.replace(/\./g ,"");
sub_total = sub_total.replace(/\,/g ,".");
neto = neto.replace(/\./g ,"");
neto = neto.replace(/\,/g ,".");
if(iva1.selectedIndex == "1")
{
	des1 =  Math.round(neto * 10 / 100);
	des2 =  Math.round(parseInt(neto) - parseInt(des1));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "2")
{
	des1 =  Math.round(neto * 19 / 100);
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
if(iva1.selectedIndex == "3")
{
	des1 =  0;
	des2 =  Math.round(parseInt(des1) + parseInt(neto));
	document.getElementById('iva').value = des1;
	document.getElementById('total').value = des2;
}
}

function descuentoas()
{
	 activar=document.getElementById('activars');
	 neto2 =document.getElementById('neto2');
	 descuento = document.getElementById('descuento2');
	 if(activar.checked == true)
	 {
        neto2.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto2.readOnly = true;
		descuento.readOnly = true;
	 }
}

function descuentoa()
{
	 activar=document.getElementById('activara');
	 neto =document.getElementById('neto');
	 descuento = document.getElementById('descuento');
	 if(activar.checked == true)
	 {
        neto.readOnly = false;
		descuento.readOnly = false;
	 }
	 else
	 {
		  neto.readOnly = true;
		descuento.readOnly = true;
	 }
}


 $(function(){
                $('#disenador').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {

                   }
                 });
            });
			$(function(){
                $('#director').autocomplete({
                   source : 'ajaxEmpleado.php',
                   select : 
				   function(event, ui)
				   {

                   }
                 });
            });
			

