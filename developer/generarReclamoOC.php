<?php 
$CODIGO_PROYECTO = $_GET["OC"] ;
?>

<div style="" id="popup">
    <div class="close"></div>
	  <h2> Reclamo</h2>
    <textarea rows="10" cols="74" id="txt_radicado1" name = "txt_radicado1"></textarea>
	<input readonly type="button" id="ingresar2" name="ingresar2" value="Ingresar">
	<input style="display:none;" type="text" id = "txt_codigo_proyecto16" name = "txt_codigo_proyecto16" value="<?php echo $CODIGO_PROYECTO?>"/>
</div>
