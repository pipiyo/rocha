<?php 
$CODIGO_PROYECTO = $_GET["CODIGO_PROYECTO"] ;
?>


<form method="GET" action="" />
<div style="" id="popup">
    <div class="content-popup">
    <div class="close"></div>
	<p style="font: normal .90em 'Arial Black', Gadget, sans-serif;
  color: #1D1D1D;"><b>Observacion:</b></p>
    <textarea style="  width:100%; font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" rows="17" cols="74" id="txt_observaciones1" name = "txt_observaciones1"></textarea>
	<input readonly style=" width:100%; margin-bottom:20px; font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; height:25px;border-radius: 10px; border:#fff 1px solid;" type="submit" id="ingresar1" name="ingresar1" value="Ingresar">
	<input style="display:none;" type="text" id = "txt_codigo_proyecto1" name = "txt_codigo_proyecto1" value="<?php echo $CODIGO_PROYECTO?>"/>
    
    </div>
</div>
</form>