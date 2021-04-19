<?php require_once('Conexion/Conexion.php'); ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

mysql_select_db($database_conn, $conn);
$CODIGO_USUARIO= $_SESSION['CODIGO_USUARIO'];

date_default_timezone_set("Chile/Continental");

$sql1 = "SELECT * FROM vale_emision ";
$NVALE = 1;
$result2 = mysql_query($sql1, $conn) or die(mysql_error());
while($row = mysql_fetch_array($result2))
  {
	$NVALE = $row["COD_VALE"];
	$NVALE++;
  }
  	
  
  
  
  $CODIGO_VALE = $_GET ["CODIGO_VALE"];
  $COD_PRODUCTO = $_GET ["COD_PRODUCTO"];
  
  
  
  
  
  
  
  
  
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vale Bodega</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  <script type="text/javascript" src="js/ordenDeCompra.js"></script>
  <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
  <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
  <LINK REL=StyleSheet HREF="style/estilovale.css" TYPE="text/css" MEDIA=screen>
  <script src='js/Bloqueo.php'></script>
  <script src='js/breadcrumbs.php'></script>
  <link rel="styleSheet" href="style/bread.css" type="text/css" >
 <script language = javascript>  
  
  $(function(){
        	$('#fecha_t').datetimepicker({
				    dateFormat: 'yy-mm-dd',
					showSecond: true,
					timeFormat: 'hh:mm:ss',
					stepHour: 1,
					stepMinute: 1,
					stepSecond: 10
				});
		});

  
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des1").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des1").val();
                                      
             //hace la búsqueda
             $("#resultado1").delay(1000).queue(function(n) {      
                                           
                  $("#resultado1").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado1").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des2").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des2").val();
                                      
             //hace la búsqueda
             $("#resultado2").delay(1000).queue(function(n) {      
                                           
                  $("#resultado2").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
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
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des3").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des3").val();
                                      
             //hace la búsqueda
             $("#resultado3").delay(1000).queue(function(n) {      
                                           
                  $("#resultado3").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado3").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                       
      //comprobamos si se pulsa una tecla
      $("#des4").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des4").val();
                                      
             //hace la búsqueda
             $("#resultado4").delay(1000).queue(function(n) {      
                                           
                  $("#resultado4").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado4").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
$(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des5").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des5").val();
                                      
             //hace la búsqueda
             $("#resultado5").delay(1000).queue(function(n) {      
                                           
                  $("#resultado5").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado5").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des6").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des6").val();
                                      
             //hace la búsqueda
             $("#resultado6").delay(1000).queue(function(n) {      
                                           
                  $("#resultado6").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado6").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                          
      //comprobamos si se pulsa una tecla
      $("#des7").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des7").val();
                                      
             //hace la búsqueda
             $("#resultado7").delay(1000).queue(function(n) {      
                                           
                  $("#resultado7").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado7").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                          
      //comprobamos si se pulsa una tecla
      $("#des8").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des8").val();
                                      
             //hace la búsqueda
             $("#resultado8").delay(1000).queue(function(n) {      
                                           
                  $("#resultado8").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado8").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des9").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des9").val();
                                      
             //hace la búsqueda
             $("#resultado5").delay(1000).queue(function(n) {      
                                           
                  $("#resultado9").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado9").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des10").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des10").val();
                                      
             //hace la búsqueda
             $("#resultado10").delay(1000).queue(function(n) {      
                                           
                  $("#resultado10").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado10").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des11").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des11").val();
                                      
             //hace la búsqueda
             $("#resultado11").delay(1000).queue(function(n) {      
                                           
                  $("#resultado11").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado11").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des12").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des12").val();
                                      
             //hace la búsqueda
             $("#resultado12").delay(1000).queue(function(n) {      
                                           
                  $("#resultado12").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado12").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
	  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus

                                                 
      //comprobamos si se pulsa una tecla
      $("#des13").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des13").val();
                                      
             //hace la búsqueda
             $("#resultado13").delay(1000).queue(function(n) {      
                                           
                  $("#resultado13").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado13").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
      
                                                 
      //comprobamos si se pulsa una tecla
      $("#des14").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des14").val();
                                      
             //hace la búsqueda
             $("#resultado14").delay(1000).queue(function(n) {      
                                           
                  $("#resultado14").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado14").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });            
	           
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des15").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des15").val();
                                      
             //hace la búsqueda
             $("#resultado15").delay(1000).queue(function(n) {      
                                           
                  $("#resultado15").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado15").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 
$(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des16").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des16").val();
                                      
             //hace la búsqueda
             $("#resultado16").delay(1000).queue(function(n) {      
                                           
                  $("#resultado16").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado16").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                         
});  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des17").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des17").val();
                                      
             //hace la búsqueda
             $("#resultado17").delay(1000).queue(function(n) {      
                                           
                  $("#resultado17").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado17").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
                          
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des18").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des18").val();
                                      
             //hace la búsqueda
             $("#resultado18").delay(1000).queue(function(n) {      
                                           
                  $("#resultado18").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado18").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });  
	                            
});    
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                       
      //comprobamos si se pulsa una tecla
      $("#des19").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des19").val();
                                      
             //hace la búsqueda
             $("#resultado19").delay(1000).queue(function(n) {      
                                           
                  $("#resultado19").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado19").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });
	                     
});      

  /////////////////////////////////////////////////
$(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
   
                                                 
      //comprobamos si se pulsa una tecla
      $("#des20").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des20").val();
                                      
             //hace la búsqueda
             $("#resultado20").delay(1000).queue(function(n) {      
                                           
                  $("#resultado20").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado20").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});  
  
  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#des21").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des21").val();
                                      
             //hace la búsqueda
             $("#resultado21").delay(1000).queue(function(n) {      
                                           
                  $("#resultado21").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado21").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                      
});   

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                          
      //comprobamos si se pulsa una tecla
      $("#des22").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des22").val();
                                      
             //hace la búsqueda
             $("#resultado22").delay(1000).queue(function(n) {      
                                           
                  $("#resultado22").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado22").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 



  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
                          
      //comprobamos si se pulsa una tecla
      $("#des23").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des23").val();
                                      
             //hace la búsqueda
             $("#resultado23").delay(1000).queue(function(n) {      
                                           
                  $("#resultado23").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado23").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                   
}); 

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
     
                                                 
      //comprobamos si se pulsa una tecla
      $("#des24").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des24").val();
                                      
             //hace la búsqueda
             $("#resultado24").delay(1000).queue(function(n) {      
                                           
                  $("#resultado24").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado24").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                     
}); 


  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
    
                                                 
      //comprobamos si se pulsa una tecla
      $("#des25").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#des25").val();
                                      
             //hace la búsqueda
             $("#resultado25").delay(1000).queue(function(n) {      
                                           
                  $("#resultado25").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProducto.php",
                              data: "b="+consulta,
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#resultado25").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });    
	                  
}); 

  /////////////////////////////////////////////////





  function reback()
{
//location.href= "Productos.php";
//window.open("Producto.php");
window.close("valeemision.php");
}
  
  
  //////////////////////////////////////////////////////////////////////////////////
 $(function(){
                $('#rocha').autocomplete({
                   source : 'ajaxProyecto.php',
                   select : 
				   function(event, ui)
				   {
                       
                       }
                       });
				           
            });
//////////////////////////////////////////////////////////////////////////////////////////		  
  $(function(){
                $('#descripcion').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
				   function(event, ui)
				   {
                       $('#cod1').slideUp('slow', function()
					   {
                            $('#cod1').val(
                                 ui.item.cod 
                            );
							
                       });
                       $('#cod1').slideDown('slow');
					   					   
					   $('#prec1').slideUp('slow', function()
					   {
                            $('#prec1').val(
                                 ui.item.precio 
                            );
							
                       });
                       $('#prec1').slideDown('slow');
					   
					   $('#cant1').slideUp('slow', function()
					   {
                            $('#cant1').val(
                                '1' 
                            );
							
                       });
                       $('#cant1').slideDown('slow');
					   
                       
                   }     
                 });
				 
            });	
			
//////////////////////////////////////////////////////////////////////////////////////////
	
$(function(){
                $('#cod1').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ 
$('#des1').slideUp('slow', function() { $('#des1').val( ui.item.cod ); });
$('#des1').slideDown('slow');

$('#ud1').slideUp('slow', function(){$('#ud1').val(ui.item.ud);});
$('#ud1').slideDown('slow');

$('#stock1').slideUp('slow', function(){$('#stock1').val(ui.item.stock);});
$('#stock1').slideDown('slow');

}});
});

			
$(function(){
                $('#cod2').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des2').slideUp('slow', function() { $('#des2').val( ui.item.cod ); });
$('#des2').slideDown('slow');

$('#ud2').slideUp('slow', function(){$('#ud2').val(ui.item.ud);});
$('#ud2').slideDown('slow')

;
$('#stock2').slideUp('slow', function(){$('#stock2').val(ui.item.stock);});
$('#stock2').slideDown('slow');}});});
						
$(function(){
                $('#cod3').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des3').slideUp('slow', function() { $('#des3').val( ui.item.cod ); });
$('#des3').slideDown('slow');

$('#ud3').slideUp('slow', function(){$('#ud3').val(ui.item.ud);});
$('#ud3').slideDown('slow')

;
$('#stock3').slideUp('slow', function(){$('#stock3').val(ui.item.stock);});
$('#stock3').slideDown('slow');}});});

$(function(){
                $('#cod4').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des4').slideUp('slow', function() { $('#des4').val( ui.item.cod ); });
$('#des4').slideDown('slow');

$('#ud4').slideUp('slow', function(){$('#ud4').val(ui.item.ud);});
$('#ud4').slideDown('slow')

;
$('#stock4').slideUp('slow', function(){$('#stock4').val(ui.item.stock);});
$('#stock4').slideDown('slow');}});});
			
$(function(){
                $('#cod5').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des5').slideUp('slow', function() { $('#des5').val( ui.item.cod ); });
$('#des5').slideDown('slow');

$('#ud5').slideUp('slow', function(){$('#ud5').val(ui.item.ud);});
$('#ud5').slideDown('slow')

;
$('#stock5').slideUp('slow', function(){$('#stock5').val(ui.item.stock);});
$('#stock5').slideDown('slow');}});});

$(function(){
                $('#cod6').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des6').slideUp('slow', function() { $('#des6').val( ui.item.cod ); });
$('#des6').slideDown('slow');

$('#ud6').slideUp('slow', function(){$('#ud6').val(ui.item.ud);});
$('#ud6').slideDown('slow')

;
$('#stock6').slideUp('slow', function(){$('#stock6').val(ui.item.stock);});
$('#stock6').slideDown('slow');}});});
			

$(function(){
                $('#cod7').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des7').slideUp('slow', function() { $('#des7').val( ui.item.cod ); });
$('#des7').slideDown('slow');

$('#ud7').slideUp('slow', function(){$('#ud7').val(ui.item.ud);});
$('#ud7').slideDown('slow')

;
$('#stock7').slideUp('slow', function(){$('#stock7').val(ui.item.stock);});
$('#stock7').slideDown('slow');}});});
			
				
$(function(){
                $('#cod8').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des8').slideUp('slow', function() { $('#des8').val( ui.item.cod ); });
$('#des8').slideDown('slow');

$('#ud8').slideUp('slow', function(){$('#ud8').val(ui.item.ud);});
$('#ud8').slideDown('slow')

;
$('#stock8').slideUp('slow', function(){$('#stock8').val(ui.item.stock);});
$('#stock8').slideDown('slow');}});});

$(function(){
                $('#cod9').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des9').slideUp('slow', function() { $('#des9').val( ui.item.cod ); });
$('#des9').slideDown('slow');

$('#ud9').slideUp('slow', function(){$('#ud9').val(ui.item.ud);});
$('#ud9').slideDown('slow')

;
$('#stock9').slideUp('slow', function(){$('#stock9').val(ui.item.stock);});
$('#stock9').slideDown('slow');}});});
		
$(function(){
                $('#cod10').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des10').slideUp('slow', function() { $('#des10').val( ui.item.cod ); });
$('#des10').slideDown('slow');

$('#ud10').slideUp('slow', function(){$('#ud10').val(ui.item.ud);});
$('#ud10').slideDown('slow')

;
$('#stock10').slideUp('slow', function(){$('#stock10').val(ui.item.stock);});
$('#stock10').slideDown('slow');}});});

$(function(){
                $('#cod11').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des11').slideUp('slow', function() { $('#des11').val( ui.item.cod ); });
$('#des11').slideDown('slow');

$('#ud11').slideUp('slow', function(){$('#ud11').val(ui.item.ud);});
$('#ud11').slideDown('slow')

;
$('#stock11').slideUp('slow', function(){$('#stock11').val(ui.item.stock);});
$('#stock11').slideDown('slow');}});});
$(function(){
                $('#cod12').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des12').slideUp('slow', function() { $('#des12').val( ui.item.cod ); });
$('#des12').slideDown('slow');

$('#ud12').slideUp('slow', function(){$('#ud12').val(ui.item.ud);});
$('#ud12').slideDown('slow')

;
$('#stock12').slideUp('slow', function(){$('#stock12').val(ui.item.stock);});
$('#stock12').slideDown('slow');}});});
$(function(){
                $('#cod13').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des13').slideUp('slow', function() { $('#des13').val( ui.item.cod ); });
$('#des13').slideDown('slow');

$('#ud13').slideUp('slow', function(){$('#ud13').val(ui.item.ud);});
$('#ud13').slideDown('slow')

;
$('#stock13').slideUp('slow', function(){$('#stock13').val(ui.item.stock);});
$('#stock13').slideDown('slow');}});});

$(function(){
                $('#cod14').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des14').slideUp('slow', function() { $('#des14').val( ui.item.cod ); });
$('#des14').slideDown('slow');

$('#ud14').slideUp('slow', function(){$('#ud14').val(ui.item.ud);});
$('#ud14').slideDown('slow')

;
$('#stock14').slideUp('slow', function(){$('#stock14').val(ui.item.stock);});
$('#stock14').slideDown('slow');}});});

$(function(){
                $('#cod15').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des15').slideUp('slow', function() { $('#des15').val( ui.item.cod ); });
$('#des15').slideDown('slow');

$('#ud15').slideUp('slow', function(){$('#ud15').val(ui.item.ud);});
$('#ud15').slideDown('slow')

;
$('#stock15').slideUp('slow', function(){$('#stock15').val(ui.item.stock);});
$('#stock15').slideDown('slow');}});});


$(function(){
                $('#cod16').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ 
$('#des16').slideUp('slow', function() { $('#des16').val( ui.item.cod ); });
$('#des16').slideDown('slow');

$('#ud16').slideUp('slow', function(){$('#ud16').val(ui.item.ud);});
$('#ud16').slideDown('slow');

$('#stock16').slideUp('slow', function(){$('#stock16').val(ui.item.stock);});
$('#stock16').slideDown('slow');

}});
});

			
$(function(){
                $('#cod18').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des18').slideUp('slow', function() { $('#des18').val( ui.item.cod ); });
$('#des18').slideDown('slow');

$('#ud18').slideUp('slow', function(){$('#ud18').val(ui.item.ud);});
$('#ud18').slideDown('slow')

;
$('#stock18').slideUp('slow', function(){$('#stock18').val(ui.item.stock);});
$('#stock18').slideDown('slow');}});});
						
$(function(){
                $('#cod19').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des19').slideUp('slow', function() { $('#des19').val( ui.item.cod ); });
$('#des19').slideDown('slow');

$('#ud19').slideUp('slow', function(){$('#ud19').val(ui.item.ud);});
$('#ud19').slideDown('slow')

;
$('#stock19').slideUp('slow', function(){$('#stock19').val(ui.item.stock);});
$('#stock19').slideDown('slow');}});});

$(function(){
                $('#cod20').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des20').slideUp('slow', function() { $('#des20').val( ui.item.cod ); });
$('#des20').slideDown('slow');

$('#ud20').slideUp('slow', function(){$('#ud20').val(ui.item.ud);});
$('#ud20').slideDown('slow')

;
$('#stock20').slideUp('slow', function(){$('#stock20').val(ui.item.stock);});
$('#stock20').slideDown('slow');}});});
			
$(function(){
                $('#cod21').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des21').slideUp('slow', function() { $('#des21').val( ui.item.cod ); });
$('#des21').slideDown('slow');

$('#ud21').slideUp('slow', function(){$('#ud21').val(ui.item.ud);});
$('#ud21').slideDown('slow')

;
$('#stock21').slideUp('slow', function(){$('#stock21').val(ui.item.stock);});
$('#stock21').slideDown('slow');}});});

$(function(){
                $('#cod22').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des22').slideUp('slow', function() { $('#des22').val( ui.item.cod ); });
$('#des22').slideDown('slow');

$('#ud22').slideUp('slow', function(){$('#ud22').val(ui.item.ud);});
$('#ud22').slideDown('slow')

;
$('#stock22').slideUp('slow', function(){$('#stock22').val(ui.item.stock);});
$('#stock22').slideDown('slow');}});});
			
$(function(){
                $('#cod23').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des23').slideUp('slow', function() { $('#des23').val( ui.item.stock ); });
$('#des23').slideDown('slow');

$('#ud23').slideUp('slow', function(){$('#ud23').val(ui.item.ud);});
$('#ud23').slideDown('slow')

;
$('#stock23').slideUp('slow', function(){$('#stock23').val(ui.item.stock);});
$('#stock23').slideDown('slow');}});});
				
$(function(){
                $('#cod24').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des24').slideUp('slow', function() { $('#des24').val( ui.item.cod ); });
$('#des24').slideDown('slow');

$('#ud24').slideUp('slow', function(){$('#ud24').val(ui.item.ud);});
$('#ud24').slideDown('slow')

;
$('#stock24').slideUp('slow', function(){$('#stock24').val(ui.item.stock);});
$('#stock24').slideDown('slow');}});});

$(function(){
                $('#cod17').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des17').slideUp('slow', function() { $('#des17').val( ui.item.cod ); });
$('#des17').slideDown('slow');

$('#ud17').slideUp('slow', function(){$('#ud17').val(ui.item.ud);});
$('#ud17').slideDown('slow')

;
$('#stock17').slideUp('slow', function(){$('#stock17').val(ui.item.stock);});
$('#stock17').slideDown('slow');}});});
		
$(function(){
                $('#cod25').autocomplete({
                   source : 'ajaxProductoCodigo.php',
                   select : 
function(event, ui)
{ $('#des25').slideUp('slow', function() { $('#des25').val( ui.item.cod ); });
$('#des25').slideDown('slow');

$('#ud25').slideUp('slow', function(){$('#ud25').val(ui.item.ud);});
$('#ud25').slideDown('slow')

;
$('#stock25').slideUp('slow', function(){$('#stock25').val(ui.item.stock);});
$('#stock25').slideDown('slow');}});});




$(function(){
                $('#des1').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod1').slideUp('slow', function() { $('#cod1').val( ui.item.cod ); });
$('#cod1').slideDown('slow');
$('#ud1').slideUp('slow', function(){ $('#ud1').val(ui.item.ud );});
$('#ud1').slideDown('slow');
$('#stock1').slideUp('slow', function(){$('#stock1').val(ui.item.stock);});
$('#stock1').slideDown('slow');}});});	
	
$(function(){
                $('#des2').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod2').slideUp('slow', function() { $('#cod2').val( ui.item.cod ); });
$('#cod2').slideDown('slow');
$('#ud2').slideUp('slow', function(){ $('#ud2').val(ui.item.ud );});
$('#ud2').slideDown('slow');
$('#stock2').slideUp('slow', function(){$('#stock2').val(ui.item.stock);});
$('#stock2').slideDown('slow');}});});	

$(function(){
                $('#des3').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod3').slideUp('slow', function() { $('#cod3').val( ui.item.cod ); });
$('#cod3').slideDown('slow');
$('#ud3').slideUp('slow', function(){ $('#ud3').val(ui.item.ud );});
$('#ud3').slideDown('slow');
$('#stock3').slideUp('slow', function(){$('#stock3').val(ui.item.stock);});
$('#stock3').slideDown('slow');}});});	

$(function(){
                $('#des4').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod4').slideUp('slow', function() { $('#cod4').val( ui.item.cod ); });
$('#cod4').slideDown('slow');
$('#ud4').slideUp('slow', function(){ $('#ud4').val(ui.item.ud );});
$('#ud4').slideDown('slow');
$('#stock4').slideUp('slow', function(){$('#stock4').val(ui.item.stock);});
$('#stock4').slideDown('slow');}});});

$(function(){
                $('#des5').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod5').slideUp('slow', function() { $('#cod5').val( ui.item.cod ); });
$('#cod5').slideDown('slow');
$('#ud5').slideUp('slow', function(){ $('#ud5').val(ui.item.ud );});
$('#ud5').slideDown('slow');
$('#stock5').slideUp('slow', function(){$('#stock5').val(ui.item.stock);});
$('#stock5').slideDown('slow');}});});
$(function(){
                $('#des6').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod6').slideUp('slow', function() { $('#cod6').val( ui.item.cod ); });
$('#cod6').slideDown('slow');
$('#ud6').slideUp('slow', function(){ $('#ud6').val(ui.item.ud );});
$('#ud6').slideDown('slow');
$('#stock6').slideUp('slow', function(){$('#stock6').val(ui.item.stock);});
$('#stock6').slideDown('slow');}});});

$(function(){
                $('#des7').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod7').slideUp('slow', function() { $('#cod7').val( ui.item.cod ); });
$('#cod7').slideDown('slow');
$('#ud7').slideUp('slow', function(){ $('#ud7').val(ui.item.ud );});
$('#ud7').slideDown('slow');
$('#stock7').slideUp('slow', function(){$('#stock7').val(ui.item.stock);});
$('#stock7').slideDown('slow');}});});

$(function(){
                $('#des8').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod8').slideUp('slow', function() { $('#cod8').val( ui.item.cod ); });
$('#cod8').slideDown('slow');
$('#ud8').slideUp('slow', function(){ $('#ud8').val(ui.item.ud );});
$('#ud8').slideDown('slow');
$('#stock8').slideUp('slow', function(){$('#stock8').val(ui.item.stock);});
$('#stock8').slideDown('slow');}});});

$(function(){
                $('#des9').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod9').slideUp('slow', function() { $('#cod9').val( ui.item.cod ); });
$('#cod9').slideDown('slow');
$('#ud9').slideUp('slow', function(){ $('#ud9').val(ui.item.ud );});
$('#ud9').slideDown('slow');
$('#stock9').slideUp('slow', function(){$('#stock9').val(ui.item.stock);});
$('#stock9').slideDown('slow');}});});																					

$(function(){
                $('#des10').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod10').slideUp('slow', function() { $('#cod10').val( ui.item.cod ); });
$('#cod10').slideDown('slow');
$('#ud10').slideUp('slow', function(){ $('#ud10').val(ui.item.ud );});
$('#ud10').slideDown('slow');
$('#stock10').slideUp('slow', function(){$('#stock10').val(ui.item.stock);});
$('#stock10').slideDown('slow');}});});	


$(function(){
                $('#des11').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod11').slideUp('slow', function() { $('#cod11').val( ui.item.cod ); });
$('#cod11').slideDown('slow');
$('#ud11').slideUp('slow', function(){ $('#ud11').val(ui.item.ud );});
$('#ud11').slideDown('slow');
$('#stock11').slideUp('slow', function(){$('#stock11').val(ui.item.stock);});
$('#stock11').slideDown('slow');}});});
$(function(){
                $('#des12').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod12').slideUp('slow', function() { $('#cod12').val( ui.item.cod ); });
$('#cod12').slideDown('slow');
$('#ud12').slideUp('slow', function(){ $('#ud12').val(ui.item.ud );});
$('#ud12').slideDown('slow');
$('#stock12').slideUp('slow', function(){$('#stock12').val(ui.item.stock);});
$('#stock12').slideDown('slow');}});});

$(function(){
                $('#des13').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod13').slideUp('slow', function() { $('#cod13').val( ui.item.cod ); });
$('#cod13').slideDown('slow');
$('#ud13').slideUp('slow', function(){ $('#ud13').val(ui.item.ud );});
$('#ud13').slideDown('slow');
$('#stock13').slideUp('slow', function(){$('#stock13').val(ui.item.stock);});
$('#stock13').slideDown('slow');}});});

$(function(){
                $('#des14').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod14').slideUp('slow', function() { $('#cod14').val( ui.item.cod ); });
$('#cod14').slideDown('slow');
$('#ud14').slideUp('slow', function(){ $('#ud14').val(ui.item.ud );});
$('#ud14').slideDown('slow');
$('#stock14').slideUp('slow', function(){$('#stock14').val(ui.item.stock);});
$('#stock14').slideDown('slow');}});});

$(function(){
                $('#des15').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod15').slideUp('slow', function() { $('#cod15').val( ui.item.cod ); });
$('#cod15').slideDown('slow');
$('#ud15').slideUp('slow', function(){ $('#ud15').val(ui.item.ud );});
$('#ud15').slideDown('slow');
$('#stock15').slideUp('slow', function(){$('#stock15').val(ui.item.stock);});
$('#stock15').slideDown('slow');}});});		

$(function(){
                $('#des16').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod16').slideUp('slow', function() { $('#cod16').val( ui.item.cod ); });
$('#cod16').slideDown('slow');
$('#ud16').slideUp('slow', function(){ $('#ud16').val(ui.item.ud );});
$('#ud16').slideDown('slow');
$('#stock16').slideUp('slow', function(){$('#stock16').val(ui.item.stock);});
$('#stock16').slideDown('slow');}});});	
	
$(function(){
                $('#des17').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod17').slideUp('slow', function() { $('#cod17').val( ui.item.cod ); });
$('#cod17').slideDown('slow');
$('#ud17').slideUp('slow', function(){ $('#ud17').val(ui.item.ud );});
$('#ud17').slideDown('slow');
$('#stock17').slideUp('slow', function(){$('#stock17').val(ui.item.stock);});
$('#stock17').slideDown('slow');}});});	

$(function(){
                $('#des18').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod18').slideUp('slow', function() { $('#cod18').val( ui.item.cod ); });
$('#cod18').slideDown('slow');
$('#ud18').slideUp('slow', function(){ $('#ud18').val(ui.item.ud );});
$('#ud18').slideDown('slow');
$('#stock18').slideUp('slow', function(){$('#stock18').val(ui.item.stock);});
$('#stock18').slideDown('slow');}});});	

$(function(){
                $('#des19').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod19').slideUp('slow', function() { $('#cod19').val( ui.item.cod ); });
$('#cod19').slideDown('slow');
$('#ud19').slideUp('slow', function(){ $('#ud19').val(ui.item.ud );});
$('#ud19').slideDown('slow');
$('#stock19').slideUp('slow', function(){$('#stock19').val(ui.item.stock);});
$('#stock19').slideDown('slow');}});});

$(function(){
                $('#des20').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod20').slideUp('slow', function() { $('#cod20').val( ui.item.cod ); });
$('#cod20').slideDown('slow');
$('#ud20').slideUp('slow', function(){ $('#ud20').val(ui.item.ud );});
$('#ud20').slideDown('slow');
$('#stock20').slideUp('slow', function(){$('#stock20').val(ui.item.stock);});
$('#stock20').slideDown('slow');}});});
$(function(){
                $('#des21').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod21').slideUp('slow', function() { $('#cod21').val( ui.item.cod ); });
$('#cod21').slideDown('slow');
$('#ud21').slideUp('slow', function(){ $('#ud21').val(ui.item.ud );});
$('#ud21').slideDown('slow');
$('#stock21').slideUp('slow', function(){$('#stock21').val(ui.item.stock);});
$('#stock21').slideDown('slow');}});});

$(function(){
                $('#des22').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod22').slideUp('slow', function() { $('#cod22').val( ui.item.cod ); });
$('#cod22').slideDown('slow');
$('#ud22').slideUp('slow', function(){ $('#ud22').val(ui.item.ud );});
$('#ud22').slideDown('slow');
$('#stock22').slideUp('slow', function(){$('#stock22').val(ui.item.stock);});
$('#stock22').slideDown('slow');}});});

$(function(){
                $('#des23').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod23').slideUp('slow', function() { $('#cod23').val( ui.item.cod ); });
$('#cod23').slideDown('slow');
$('#ud23').slideUp('slow', function(){ $('#ud23').val(ui.item.ud );});
$('#ud23').slideDown('slow');
$('#stock23').slideUp('slow', function(){$('#stock23').val(ui.item.stock);});
$('#stock23').slideDown('slow');}});});

$(function(){
                $('#des24').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod24').slideUp('slow', function() { $('#cod24').val( ui.item.cod ); });
$('#cod24').slideDown('slow');
$('#ud24').slideUp('slow', function(){ $('#ud24').val(ui.item.ud );});
$('#ud24').slideDown('slow');
$('#stock24').slideUp('slow', function(){$('#stock24').val(ui.item.stock);});
$('#stock24').slideDown('slow');}});});																					

$(function(){
                $('#des25').autocomplete({
                   source : 'ajaxProducto.php',
                   select : 
function(event, ui)
{ $('#cod25').slideUp('slow', function() { $('#cod25').val( ui.item.cod ); });
$('#cod25').slideDown('slow');
$('#ud25').slideUp('slow', function(){ $('#ud25').val(ui.item.ud );});
$('#ud25').slideDown('slow');
$('#stock25').slideUp('slow', function(){$('#stock25').val(ui.item.stock);});
$('#stock25').slideDown('slow');}});});	
																			

function es_vacio()
{
  
var rocha = document.getElementById('rocha') ;
var ingresar = document.getElementById('ingresar') ;
                             

   if (rocha.value != "") 
    {	  
       ingresar.disabled=false;
    }
	else
	{
	   ingresar.disabled=true;
	}
}		

function enviar()
{
  document.getElementById("formulario").submit();
} 	
/////
/*function resta()
{
	var ingresar = document.getElementById('ingresar') ;
	
	cans1 = document.getElementById('stock1').value
	cane1 = document.getElementById('cant1').value
	total = cans1 - cane1;
	if(total < 0)
	{
	ingresar.disabled=true;
	}
	else
	{
	ingresar.disabled=false;
	}
	cans2 = document.getElementById('stock2').value
	cane2 = document.getElementById('cant2').value
	total2 = cans2 - cane2;
    if(total < 0 || total2 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
    cans3 = document.getElementById('stock3').value
	cane3 = document.getElementById('cant3').value
	total3 = cans3 - cane3;
	if(total < 0 || total2 < 0 || total3 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans4 = document.getElementById('stock4').value
	cane4 = document.getElementById('cant4').value
	total4 = cans4 - cane4;
	if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans5 = document.getElementById('stock5').value
	cane5 = document.getElementById('cant5').value
	total5 = cans5 - cane5;
	if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	
	cans6 = document.getElementById('stock6').value
	cane6 = document.getElementById('cant6').value
	total6 = cans6 - cane6;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
    cans7 = document.getElementById('stock7').value
	cane7 = document.getElementById('cant7').value
	tota7 = cans7 - cane7;
	if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans8 = document.getElementById('stock8').value
	cane8 = document.getElementById('cant8').value
	total8 = cans8 - cane8;
	if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans9 = document.getElementById('stock9').value
	cane9 = document.getElementById('cant9').value
	tota9 = cans9 - cane9;
	if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans10 = document.getElementById('stock10').value
	cane10 = document.getElementById('cant10').value
	total10 = cans10 - cane10;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans11 = document.getElementById('stock11').value
	cane11 = document.getElementById('cant11').value
	total11 = cans11 - cane11;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0 ||total11 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans12 = document.getElementById('stock12').value
	cane12 = document.getElementById('cant12').value
	total12 = cans12 - cane12;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0 ||total11 < 0 ||total12 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans13 = document.getElementById('stock13').value
	cane13 = document.getElementById('cant13').value
	total13 = cans13 - cane13;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0 ||total11 < 0 ||total12 < 0 || total13 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
    cans14 = document.getElementById('stock14').value
	cane14 = document.getElementById('cant14').value
	total14 = cans14 - cane14;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0 ||total11 < 0 ||total12 < 0 ||total13 < 0 ||total14 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
	cans15 = document.getElementById('stock15').value
	cane15 = document.getElementById('cant15').value
	total15 = cans15 - cane15;
    if(total < 0 || total2 < 0 || total3 < 0 ||total4 < 0||total5 < 0||total6 < 0||total7 < 0||total8 < 0||total9 < 0||total10 < 0 ||total11 < 0 ||total12 < 0 ||total13 < 0 ||total14 < 0 ||total15 < 0)
	{
		ingresar.disabled=true;
	}
	else
	{
		ingresar.disabled=false;
	}
}
*/

  /////////////////////////////////////////////////
 $(document).ready(function(){
                         
      var consulta;
             
      //hacemos focus
 
                                                 
      //comprobamos si se pulsa una tecla
      $("#rocha").blur(function(e){
             //obtenemos el texto introducido en el campo
             consulta = $("#rocha").val();
                                      
             //hace la búsqueda
             $("#res").delay(1000).queue(function(n) {      
                                           
                  $("#res").html('<img src="Imagenes/ajax-loader.gif" />');
                                           
                        $.ajax({
                              type: "POST",
                              url: "comprobarProductoValeRocha.php",
                              data: "b="+escape(consulta),
                              dataType: "html",
                              error: function(){
                                    alert("error petición ajax");
                              },
                              success: function(data){                                                      
                                    $("#res").html(data);
                                    n();
                              }
                  });
                                           
             });
                                
      });                    
}); 

</script>
</head>
<body id = 'cuerpo'>
 <div id='bread'><div id="menu1"></div></div> 
<form action = "ScriptVale.php" method="post" id='formulario'>
<center>
<div style="background:#fff;">
<div  align="center" id="" ><h1>Copiar Vale Entrega</h1></div>
<br>
<div id = 'res'></div>
<table>

<?php
$query_registro00 = "SELECT * FROM vale_emision WHERE COD_VALE   = '".$CODIGO_VALE."'";
$result00 = mysql_query($query_registro00, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result00))
  {
	$CODIGO_PROYECTO = $row["CODIGO_PROYECTO"];
	$DEPARTAMENTO = $row["DEPARTAMENTO"];
	$FECHA_T = $row["FECHA_TERMINO"];
	$EMPLEADO = $row["EMPLEADO"];
  }
  mysql_free_result($result00);

?>

	<tr>
		<td>Rocha</td>
        <td><input class='textbox' style="width:200px;"   onblur="es_vacio()" onkeyup="" type="text" id = "rocha" name = "rocha" value="<?php echo $CODIGO_PROYECTO?>"/></td>
        <td>Departamento</td>
        <td><select class='textboxs' style="width:200px;"  onchange="" id = "departamento" name="departamento">
     <option><?php echo $DEPARTAMENTO?></option>
<option>PRODUCCION</option>
<option>ADQUICICIONES</option>
<option>ABASTECIMIENTO</option>
<option>DESPACHO</option>
<option>INSTALACIONES</option>
<option>COMERCIAL</option>
<option>FINANZAS</option>
<option>RRHH</option>
<option>SISTEMA</option>
<option>DAM</option>
<option>DESARROLLO</option>
<option>dfSILLAS</option>
<option>GERENCIA</option>
<option>DAM</option>
<option>DAM</option>
<option>MUEBLES ESPECIALES</option>
<option>SERVICIO TECNICO</option>
</select></td>
          <td>Empleado</td>
        <td><input class='textbox' style="width:200px;"  type='text'  onchange="" id = "empleado" name="empleado" value="<?php echo $EMPLEADO?>"></td>
        </tr>
        <tr>
        <td>Fecha Inicio</td>
        <td><input class='textbox' style="width:200px;" readonly="readonly" type="text"   id= "fecha" name = "fecha" value="<?php echo  date("Y-m-d H:i:s")?>"/></td>
        <td>Fecha Termino</td>
        <td><center><input class='textbox' style="width:200px;" type="text"   id= "fecha_t" name = "fecha_t" value="<?php echo $FECHA_T?>"/></center></td>
        <td><center>N° VALE</center></td>
        <td><input class='textbox' style="width:200px;" readonly type="text"   id= "n_vale" name = "n_vale" value="<?php echo $NVALE?>"/></td>
	</tr>
		</table>
</center>
<center>
</div>
<br />     
<table rules="all" frame="box" id = "tabla_producto" cellspacing=0 cellpadding=0  bordercolor="#c5c5c5"  style="font-size: 9pt; width:100%;">
	<tr>
	
        <th width="150" height="3">CODIGO ARTICULO</th>
        <th width="308" height="3">DESCRIPCION</th>
        <th width="308" height="3">EXISTE</th>
        <th width="50" height="3">STOCK</th>
        <th width="150" height="3">CANT SOLICITADA</th>
        <th width="50" height="3">U/M</th>
        <th width="250" height="3">OBSERVACIONES</th>
	</tr>
<?php









$query_registro3 = "select DIFERENCIA,CANTIDAD_ENTREGADA,CODIGO_PRODUCTO, OBSERVACIONES,CANTIDAD_SOLICITADA FROM producto_vale_emision where CODIGO_VALE = '".$CODIGO_VALE."'";
$result3 = mysql_query($query_registro3, $conn) or die(mysql_error());

$contador = 1;

 while($row = mysql_fetch_array($result3))
  {
	$COD_PRODUCTO = $row["CODIGO_PRODUCTO"]; 
	$OBSERVACIONES = $row["OBSERVACIONES"]; 
	$CANTIDAD_SOLICITADA = $row["CANTIDAD_SOLICITADA"];
	$CANTIDAD_ENTREGADA = $row["CANTIDAD_ENTREGADA"];
	$DIFERENCIA = $row["DIFERENCIA"];

$query_registroPRO = "select DESCRIPCION, UNIDAD_DE_MEDIDA,STOCK_ACTUAL FROM producto where CODIGO_PRODUCTO = '".$COD_PRODUCTO."'";
$resultPRO = mysql_query($query_registroPRO, $conn) or die(mysql_error());
 while($row = mysql_fetch_array($resultPRO))
  {
	$DESCRIPCIONES= $row["DESCRIPCION"]; 
	$UNIDAD_DE_MEDIDA= $row["UNIDAD_DE_MEDIDA"]; 
	$STOCK= $row["STOCK_ACTUAL"];
  }
  mysql_free_result($resultPRO);

$query_registro = "SELECT sum(oc_producto.CANTIDAD) as trans FROM oc_producto, producto, orden_de_compra WHERE orden_de_compra.CODIGO_OC = oc_producto.CODIGO_OC and oc_producto.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO and producto.CODIGO_PRODUCTO = '".$COD_PRODUCTO."' and orden_de_compra.ESTADO = 'EN PROCESO'";
$result1 = mysql_query($query_registro, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result1))
  {
	$trans = $row["trans"];

  }
  mysql_free_result($result1);
  
  
  $query_registro4 = "SELECT count(producto_vale_emision.CODIGO_VALE) AS CUENT FROM vale_emision, producto ,producto_vale_emision WHERE vale_emision.COD_VALE = producto_vale_emision.CODIGO_VALE and producto_vale_emision.CODIGO_PRODUCTO = producto.CODIGO_PRODUCTO AND  producto.CODIGO_PRODUCTO  = '".$COD_PRODUCTO."' AND  vale_emision.ESTADO = 'ENTREGADO'";
$result4 = mysql_query($query_registro4, $conn) or die(mysql_error());
$numero = 0;
 while($row = mysql_fetch_array($result4))
  {
	$CUENT = $row["CUENT"];

  }
  mysql_free_result($result4);

















  	
	echo "<tr><td style=''><center> <input style='border:#FFF 1px solid;text-align:right;width:98%;' onblur='final();' class='form1' name =cod".$contador." id =cod".$contador." type = 'text' value = '".$COD_PRODUCTO."' /></center></td>";	
		
echo "<td width='400' style=''><center> <input  style='border:#FFF 1px solid;width:400px;font-size:9px;' onblur='final();' class='form1' name =des".$contador." id =des".$contador." type = 'text' value = '".$DESCRIPCIONES."' /></center></td>";	

 echo "<td style='background:#FFFFFF;' ><center> <div id=resultado".$contador."></div> </center></td>";	
   echo "<td style='background:#CCC;' ><input style='border:#CCC 1px solid;background:#CCC;text-align:right;width:97%;' class='form9'  name =stock".$contador."  id =stock".$contador." type = 'text' value = '".($STOCK)."' /></td>";
  echo "<td ><input onblur='resta();' style='border:#fff 1px solid;text-align:right;width:98%;' class='form9'  name =cant".$contador."  id =cant".$contador." type = 'text' value = '".($CANTIDAD_SOLICITADA)."' /></td>";
  
	echo "<td style='background:#CCC;' ><center> <input style='border:#ccc 1px solid; background:#CCC;text-align:center;' onblur='final();' class='form1' name =ud".$contador." id =ud".$contador." type = 'text' value = '".($UNIDAD_DE_MEDIDA)."' /></center></td>";	

  echo "<td '  width='300' ><center><input style='border:#fff 1px solid;width:300px;font-size:9px;' class='form4' id =obs".$contador." name =obs".$contador." type = 'text' value = '".($OBSERVACIONES)."' /></center></td> </tr>"; 

     $contador++;
 
  }

while($contador <= 25){


  
  echo "<tr><td style=''><center> <input style='border:#FFF 1px solid;text-align:right;width:98%;' onblur='final();' class='form1' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /></center></td>"; 
    
echo "<td width='400' style=''><center> <input  style='border:#FFF 1px solid;width:400px;font-size:9px;' onblur='final();' class='form1' name =des".$contador." id =des".$contador." type = 'text' value = '' /></center></td>";  

 echo "<td style='background:#FFFFFF;' ><center> <div id=resultado".$contador."></div> </center></td>"; 
   echo "<td style='background:#CCC;' ><input style='border:#CCC 1px solid;background:#CCC;text-align:right;width:97%;' class='form9'  name =stock".$contador."  id =stock".$contador." type = 'text' value = '' /></td>";
  echo "<td ><input onblur='resta();' style='border:#fff 1px solid;text-align:right;width:98%;' class='form9'  name =cant".$contador."  id =cant".$contador." type = 'text' value = '' /></td>";
  
  echo "<td style='background:#CCC;' ><center> <input style='border:#ccc 1px solid; background:#CCC;text-align:center;' onblur='final();' class='form1' name =ud".$contador." id =ud".$contador." type = 'text' value = '' /></center></td>"; 

  echo "<td '  width='300' ><center><input style='border:#fff 1px solid;width:300px;font-size:9px;' class='form4' id =obs".$contador." name =obs".$contador." type = 'text' value = '' /></center></td> </tr>"; 
 
     $contador++;



}











  

?>
</table>

<div align="right">
    <input style="width:245px; margin:10px;" disabled="disabled" type = 'button' id="ingresar" name ="ingresar" value = "EMITIR"  onclick="enviar();" />
   
</div>

</form>

</body>

</html>