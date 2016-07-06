<?php require_once('Conexion/Conexion.php'); 

?>

<div id="popup"> 
<form method="POST" action="Producto2.php" target="_blank" />
 
  <table>

  <tr>

  <td colspan="2"><h2>FILTRO BODEGA 2</h2></td>

  <tr>

  <tr>

  <td> Producto: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="producto" name="producto" /> </td>
  
  </tr>

  <tr>

  <td> Descripcion: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="descripcion" name="descripcion" /> </td>

  </tr>



  <tr>

  <td> Generico: </td>
  <td> <input class='textbox' type="text" autocomplete="off" id="codgen" name="codgen" /> </td>

  </tr>


  <tr>

  <td> Familia: </td>
<td><select class='textbox' autocomplete="off" id="familia" name="familia" >
<option></option>
<option>GENERICO</option>
<option>M</option>
<option>L</option>
<option>E</option>
  </select></td>

    </tr>
    <tr>

    <td> Categoria: </td>
    <td> <select class="textbox" autocomplete="off" name="categoria" id="categoria"  >
    <option></option>

<option>Superficies Curvas</option>
<option>Superficies Rectas</option>
<option>Almacenamiento</option>
<option>Cajoneras</option>
<option>Mueble De Linea</option>
<option>Partes y Piezas</option>


<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Baldosas Melamina </option>
<option> Baldosas Metalica </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Baldosas Vidrio </option>

<option> Cerraduras </option>
<option> Correderas </option>
<option> Cristales </option>
<option> Cubiertas </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Mantencion </option>
<option> Maquinas y Herramientas </option>

<option> Muebles Metalicos </option>
<option> Paneleria </option>

<option> Producto</option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Quimicos </option> 
<option> Repiceria </option>
<option> Servicios </option>
<option> Seguridad </option>
<option> Sillas </option>
<option> Soportes </option>
<option> Superficies Curvas </option>
<option> Superficies Rectas </option>
<option> Tapacantos </option>
<option> Tela </option>
<option> Tiradores </option>
<option> Tornillos </option>

  </select></td>

</tr>

<tr>
<td></td>
<td><input class="boton" type="submit" onclick="TINY.box.hide();" name = "buscarCOM" id='buscarCOM' value="Buscar"/><input style="display:none;" type="text" name='valor' id='valor' value='0'/></td>

</tr>

  </table>

 </form> 
 
</div>