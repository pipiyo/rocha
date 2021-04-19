$(function(){
    $('#buscar_usuario').autocomplete({
    source : 'ajaxProveedor.php',
    select : function(event, ui){
    }
    });
});


  $(function() 
  {
	$( "#txt_desde" ).datepicker({dateFormat: 'yy-mm-dd'});
	$( "#txt_hasta" ).datepicker({dateFormat: 'yy-mm-dd'});	

  });  