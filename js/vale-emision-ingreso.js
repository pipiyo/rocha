function enviar()
{
  document.getElementById("formularionulo").submit();
} 
function enviar_vale_cerrado()
{
  document.getElementById("formulariocerrar").submit();
} 
$(document).ready(function(){
  for (var i = 1 ; i < $('#table_vale_entrega tr').length ; i++){
    if( $("#dif"+i+"").val().length == 0 ){
      
      $("#dif"+i+"").val( $("#cans"+i+"").val());  
      
      if( $("#cane"+i+"").val().length == 0 ) {
 	      $("#cane"+i+"").val("0");
      }

      if ( $("#entr"+i+"").val().length == 0 ) {
 	      $("#entr"+i+"").val("0");
      }
    }
  }

	var sum = 0;
	var sums = 0;

	$('.diferencia').each(function(){
    sum += parseFloat(this.value);
    if (this.value < 0){
    	sums++; 
    }
  });

  if(sums == 0){
	 $('#aceptar').removeAttr('disabled','disabled');
  };

  $("#diftot").val(sum);


  $(".entrega").change( function(e){
    var row = $(this).attr("name").substring(4, 6);

    if (this.value.length == 0){
      $(this).val("0");
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );
    }else if ($("#entr"+row+"").val().length == 0){
      $("#entr"+row+"").val("0");
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );
    }else{
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#entr"+row+"").val()) + parseFloat($(this).val())) );
    }


    if( $("#dif"+row+"").val() <  0 ){
      $('#aceptar').attr('disabled','disabled');
      var sum = 0;
      $('.diferencia').each(function(){
        sum += parseFloat(this.value);
      });
      $("#diftot").val(sum);
    }else{
      var sum = 0;
      var sums = 0;
      $('.diferencia').each(function(){
        sum += parseFloat(this.value);
        if (this.value < 0) {
          sums++; 
        }
      });

      if (sums == 0) {
        $('#aceptar').removeAttr('disabled','disabled');
      }
      $("#diftot").val(sum);
    }
  });


  $(".yaentregado").change( function(e){
    var row = $(this).attr("name").substring(4, 6);
    if(this.value.length == 0){
      $(this).val("0");
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );
    }else if ($("#cane"+row+"").val().length == 0) {
      $("#cane"+row+"").val("0");
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );
    }else{
      $("#dif"+row+"").val(   parseFloat($("#cans"+row+"").val()) -  (parseFloat($("#cane"+row+"").val()) + parseFloat($(this).val())) );
    }

    if ( $("#dif"+row+"").val() <  0 ){
      $('#aceptar').attr('disabled','disabled');
      var sum = 0;
      $('.diferencia').each(function(){
        sum += parseFloat(this.value);
      });
      $("#diftot").val(sum);
      }else{
        $('#aceptar').removeAttr('disabled','disabled');
        var sum = 0;
        $('.diferencia').each(function(){
          sum += parseFloat(this.value);
        });
      $("#diftot").val(sum);
    }
  });

  $( "#fecha-vale" ).datepicker({dateFormat: 'yy-mm-dd'});

});