<?php  
session_start();
?>


<div id="popup"> 

<form id="formproductosoc" action="OrdenDeCompras.php" method="post" target="_blank"  >

  <table id='pep' >

  <tr  >

  <td colspan="3"  ><h2> Productos para OC </h2></td>

  <tr>

  <tr>

  <th  > Codigo </th><th> Descripcion </th><th> Quitar </th>

    </tr>

<?php

$i = 1;
foreach ($_SESSION['prooc'] as $key => $value) {

  echo  "<tr class='trq' id='trq".$i."' > <td> ".$_SESSION['prooc'][$key]['COD']." </td>  <td> ".$_SESSION['prooc'][$key]['DES']." </td> <td class='quitarlista' title='".$_SESSION['prooc'][$key]['COD']."' > <i class='fa fa-times-circle fa-lg'></i> </td>  </tr>";
  
$i++;
}

?>

<input type="text"  name="proaoc"  value="true"/>

<tr>
<td colspan="3" ><input class="boton" type="button" name = "cleanall" id='cleanall' value="Limpiar todo"/>        <input class="boton" type="button" id="emitiroc"  value="Emitir OC"/></td>

</tr>

  </table>

</form>

</div>