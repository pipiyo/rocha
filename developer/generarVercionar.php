<?php 

$CODIGO_PROYECTO = $_GET["CODIGO_PROYECTO"];

 ?>

<form  id = 'veri2' name="veri2" method="POST" action="scriptGenerarVercionar.php" />


<table>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D;">Rocha:</td>
<td align="left"><input type="text" style="  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px; " value="<?php echo $CODIGO_PROYECTO;?>" id="ESTADIO" name ="ESTADIO" /></td>
</tr>
<tr>
<td style="font: normal .90em arial, sans-serif;
  color: #1D1D1D; width:100px">Rocha Nuevo:</td>
<td><input type="text" style="  font: normal .90em arial, sans-serif;
  color: #1D1D1D; border:grey 1px solid;border-radius: 8px;" value="" id="ESTADIO1" name ="ESTADIO1" /></td>
</tr>
<tr>
  <td colspan=""><input style=" width:100%; font: normal .90em arial, sans-serif;
  color: #1D1D1D; cursor:pointer; color:#000;background-color: #CFCFCF; height:25px;border-radius: 10px; border:#fff 1px solid;" type="submit" value="Ingresar" id="ingresars" name ="ingresars" /> </td>
</tr>
</table>

</form>