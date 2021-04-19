<?php 
$CODIGO_PROYECTO = $_GET["OC"] ;
?>

<div style="" id="popup">
 
    <div class="close"></div>
	  <h2> Comentario</h2>
    <textarea rows="10" cols="74" id="txt_observaciones1" name = "txt_observaciones1"></textarea>
	<input readonly type="button" id="ingresar1" name="ingresar1" value="Ingresar">
	<input style="display:none;" type="text" id = "txt_codigo_proyecto15" name = "txt_codigo_proyecto1" value="<?php echo $CODIGO_PROYECTO?>"/>
    

</div>
