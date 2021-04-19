function fecha()
  {
	  $('#txt_fechai').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
	  $('#txt_fechae').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
  }
  
function enviar()
{
var as1= confirm("Realmente deseas modificar");

if(as1)                   
{
  document.getElementById("formulario11").submit();
}
else
{
  return false;
  //window.location="Materiales.php";
}
} 
function km()
{
	kmi= document.getElementById('kmi').value;
	kmf= document.getElementById('kmf').value;
	
	total = kmf - kmi;
	
	document.getElementById('kmr').value = total;
}

function litro()
{
	lit= document.getElementById('lit').value;
	mon= document.getElementById('mon').value;
	
	total = mon / lit;
	if( total != 'Infinity')
	{
	document.getElementById('val').value = total;
	}
}


 $(function(){
        	$('#fecha').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
				$('#fecha_t').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});

    });

function selecciona()
{
var despachar = document.getElementById('vehiculo').selectedIndex;

if(despachar == '1')
{
	km = document.getElementById('kmiii1').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '2')
{
	km = document.getElementById('kmiii2').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '3')
{
	km = document.getElementById('kmiii3').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '4')
{
	km = document.getElementById('kmiii4').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '5')
{
	km = document.getElementById('kmiii5').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '6')
{
	km = document.getElementById('kmiii6').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '7')
{
	km = document.getElementById('kmiii7').value ;
	document.getElementById('kmi').value = km;
}
if(despachar == '8')
{
	km = document.getElementById('kmiii8').value ;
	document.getElementById('kmi').value = km;
}


kmi= document.getElementById('kmi').value;
	kmf= document.getElementById('kmf').value;
	
	total = kmf - kmi;
	
	document.getElementById('kmr').value = total;

}

function agregar()
{
document.getElementById('contenedor_ruta_entrega').style.display = "none";
document.getElementById('ruta_despacho').style.display = "block";
}

$(document).ready(function() {
	$("#vehiculo, #estado, #conductor, #peo, #kmf, #emitir").blur( function(e){
		
		 $vehiculo = $("#vehiculo").val();
		 $estado = $("#estado").val();
		 $conductor = $("#conductor").val();
		 $auxiliar = $("#peo").val();
		 $kmf = $("#kmf").val();
		
		 if($vehiculo == "" || $conductor == "" || $auxiliar == "" || $kmf <= 0){
		 	if($estado == "OK"){
		 		$("#emitir").attr("disabled", true);
		 	} else {
		 		$("#emitir").attr("disabled", false);
		 	}
		 }
		 else{
		 	$("#emitir").attr("disabled", false);
		 }
	});
	$("#vehiculo, #estado, #conductor, #peo, #kmf, #emitir").click( function(e){
		
		 $vehiculo = $("#vehiculo").val();
		 $estado = $("#estado").val();
		 $conductor = $("#conductor").val();
		 $auxiliar = $("#peo").val();
		 $kmf = $("#kmf").val();
		
		 if($vehiculo == "" || $conductor == "" || $auxiliar == "" || $kmf <= 0){
		 	if($estado == "OK"){
		 		$("#emitir").attr("disabled", true);
		 	} else {
		 		$("#emitir").attr("disabled", false);
		 	}
		 }
		 else{
		 	$("#emitir").attr("disabled", false);
		 }
	});
});


$(document).ready(function() {
  $("#vehiculo").blur( function(e){
    $ruta = $("#ruta").val(); 
    $m3 = 0;
    $cod = 0;
    $vehiculo = $("#vehiculo").val();
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-ruta-entrega-vehiculo.php',
      data: { 'ruta':  $ruta, 'm3': $m3, 'cod': $cod, 'veh': $vehiculo },
      dataType:'json',
      error: function(xhr, status, error) {
      alert(xhr.responseText);
},
    success: function(data){
        for(var i=0;i<data.length; i++)
        {
          $(".mensaje-m3").text(data[i].mensaje);
          $fin = data[i].finm3;

          if($fin == "no")
          {
            $("#emitir").attr("disabled", true);
          }
          else
          {
            $("#emitir").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/
$(document).ready(function() {
  $("#vehiculo").click( function(e){
    $ruta = $("#ruta").val(); 
    $m3 = 0;
    $cod = 0;
    $vehiculo = $("#vehiculo").val();
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-ruta-entrega-vehiculo.php',
      data: { 'ruta':  $ruta, 'm3': $m3, 'cod': $cod, 'veh': $vehiculo },
      dataType:'json',
      error: function(xhr, status, error) {
      alert(xhr.responseText);
},
    success: function(data){
        for(var i=0;i<data.length; i++)
        {
          $(".mensaje-m3").text(data[i].mensaje);
          $fin = data[i].finm3;

          if($fin == "no")
          {
            $("#emitir").attr("disabled", true);
          }
          else
          {
            $("#emitir").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/


