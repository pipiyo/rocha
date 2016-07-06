<?php 
header("Content-type: application/javascript"); 
require_once('../Conexion/Conexion.php');

?>
$(document).ready(function(){
   var pathname = window.location.pathname;
   var dirArray = pathname.split('/');
   for(var i=0;i<dirArray.length;i++)
   {
   var pagina = dirArray[i];
   }
   $.ajax({
   type: "POST",
   url: 'ajax_breadcrumbs.php',
   data: { 'pagina': pagina },
   dataType:'html',
   success: function(data) {
   $("#menu1").append(""+data+"");
   }
 });
});