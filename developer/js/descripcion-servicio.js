  function valiasa()
{
  txt_proceso = document.getElementById('txt_proceso');
    txt_categoria = document.getElementById('txt_categoria').selectedIndex;
   if ( txt_categoria == '1') 
    {   
       txt_proceso.disabled=false;
    }
  else
  {
    txt_proceso.disabled=true;
  }
}
  $(function() 
  {   
        $('#txt_fechai').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
  });


  $(function() 
  {   
        $('#txt_fechae').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
  });




function calend()
{
  $('#txt_fechape').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
}










function diasx()
{
var fecha1= document.getElementById('txt_fechai').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('txt_fechae').value;
var dia2= fecha2.substr(8,2);
var mes2= fecha2.substr(5,2);
var mes2a= parseInt(mes2) - 1;
var anyo2= fecha2.substr(0,4);
var fechita = anyo1+","+mes1+","+dia1;
var nuevafecha1= new Date(anyo1,mes1a,dia1);
var nuevafecha2= new Date(anyo2,mes2a,dia2);

var Dif= nuevafecha2.getTime() - nuevafecha1.getTime();
var dias= Math.floor(Dif/(1000*24*60*60));
        
        document.getElementById('txt_dias').value= parseInt(dias)+1 ; 

}

   function fechaconread()
  {
    $('#fechaeconfirmar').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
}



    function fecha13()
  {
    $('#culq').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });
  $('#fechaini').datetimepicker({
            dateFormat: 'yy-mm-dd',
          showSecond: true,
          timeFormat: 'hh:mm:ss',
          stepHour: 1,
          stepMinute: 1,
          stepSecond: 10
        });   
  }




function dias5()
{
var fecha1= document.getElementById('fechaini').value;
var dia1= fecha1.substr(8,2);
var mes1= fecha1.substr(5,2);
var mes1a= parseInt(mes1) - 1;
var anyo1= fecha1.substr(0,4);
var fecha2= document.getElementById('culq').value;
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

document.getElementById('diasini').value= final; 
}




function valia()
{
  
  desbloquear = document.getElementById('desbloquearini');
  
  obs = document.getElementById('obs');
    buscar = document.getElementById('buscar4') ;
   despachar = document.getElementById('area').selectedIndex;
   if (obs.value != "" && despachar != '0') 
    {   
       buscar.disabled=false;
    }
  else
  {
     buscar.disabled=true;
  }
  
}

       function printValue(sliderID, textbox)
        {
            var x = document.getElementById(textbox);
            var y = document.getElementById(sliderID);
            x.value = y.value;
        }
            function printValue1(sliderID, textbox)
        {
            var y = document.getElementById(textbox);
            var x = document.getElementById(sliderID);
            x.value = y.value;
        }

  /*.keyup*/
 $(document).ready(function() {
  $("#m3").keyup( function(e){
    $ruta = $("#ruta-cod").val(); 
    $m3 = $("#m3").val();
    $cod = $("#txt_codigo").val()
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-ruta-entrega.php',
      data: { 'ruta':  $ruta, 'm3': $m3, 'cod': $cod },
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
            $("#ingreso-servicio").attr("disabled", true);
          }
          else
          {
            $("#ingreso-servicio").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/

 $(document).ready(function() {

  $(document).ready(function() {
  $("#m3").blur( function(e){
    $m3 = $("#m3").val();
    if($m3 == "")
    {
      $("#m3").val("0"); 
    }
  });/*CLICK*/
});/*READY*/
  
  $("#m3").blur( function(e){
    $ruta = $("#ruta-cod").val(); 
    $m3 = $("#m3").val();
    $cod = $("#txt_codigo").val()
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-ruta-entrega.php',
      data: { 'ruta':  $ruta, 'm3': $m3, 'cod': $cod },
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
            $("#ingreso-servicio").attr("disabled", true);
          }
          else
          {
            $("#ingreso-servicio").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/



 $(document).ready(function() {
    $(".txti, #txt_estado").blur( function(e){
      $estado = $("#txt_estado").val();
       if($estado == "OK")
       {
          $(".txti").attr("required", "true");
       }
       else
       {
          $(".txti").removeAttr("required");
       }
    });
 });

  $(document).ready(function() {
    $(".txti, #txt_estado,#txt_comuna,#lider,#puestos").click( function(e){
      $estado = $("#txt_estado").val();
       if($estado == "OK")
       {
          $(".txti").attr("required", "true");
          $("#txt_comuna").attr("required", "true");
          $("#lider").attr("required", "true");
          $("#puestos").attr("required", "true");
       }
       else
       {
          $(".txti").removeAttr("required");
          $("#txt_comuna").removeAttr("required");
          $("#lider").removeAttr("required");
          $("#puestos").removeAttr("required");
       }
    });
 });



    /*.keyup*/
 $(document).ready(function() {
  $("#factura").keyup( function(e){
    $factura = $("#factura").val();
    $servicio = $("#txt_codigo").val();
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-factura.php',
      data: { 'factura':  $factura, 'servicio' : $servicio },
      dataType:'json',
      error: function(xhr, status, error) {
      alert(xhr.responseText);
},
    success: function(data){
        for(var i=0;i<data.length; i++)
        {
          $(".mensaje-factura").text(data[i].mensaje);
          $fin = data[i].finm3;

          if($fin == "no")
          {
            $("#ingreso-servicio").attr("disabled", true);
          }
          else
          {
            $("#ingreso-servicio").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/

 $(document).ready(function() {
  $("#factura").blur( function(e){
    $factura = $("#factura").val();
    $servicio = $("#txt_codigo").val();
    if (this.value.length != 0) {
    $.ajax({
      type: "POST",
      url: 'ajax-factura.php',
      data: { 'factura':  $factura, 'servicio' : $servicio },
      dataType:'json',
      error: function(xhr, status, error) {
      alert(xhr.responseText);
},
    success: function(data){
        for(var i=0;i<data.length; i++)
        {
          $(".mensaje-factura").text(data[i].mensaje);
          $fin = data[i].finm3;

          if($fin == "no")
          {
            $("#ingreso-servicio").attr("disabled", true);
          }
          else
          {
            $("#ingreso-servicio").attr("disabled", false);
          }
        };
      } /*FUNCTION DATA*/
      });/*AJAX*/
    };/*IF*/
  });/*CLICK*/
});/*READY*/