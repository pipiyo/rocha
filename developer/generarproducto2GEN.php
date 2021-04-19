<?php require_once('Conexion/Conexion.php');  ?>
<?php
session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}

$GRUPOS = $_SESSION['GRUPOS'];

?>

<div id="popup"> 
<form method="POST" action="Producto2GEN.php"  />
  
  <table  class="producto">
  <tr>
  <td colspan="2"><h3 class="tituloproducto">FILTRO DE PRODUCTO</h3></td>
  <tr>
  <td>Codigo:</td>
  <td><input  type="text" autocomplete="off" id="buscar_codigo" name="buscar_codigo" /></td>
  </tr>
  <tr>
  <td >Descripcion:</td>
  <td><input  onClick="descripcion()" type="text" autocomplete="off" id="buscar_usuario" name="buscar_usuario" /></td>
  </tr>
  <tr>
  <td>Categorias</td>
  <td><select id = "familias" name = "familias">

<option>  </option>

<?php
$ini = ""; 
 foreach ($GRUPOS as $GI => $GG) {        


switch ($GG) {
    case "9":
        echo"<option> Sillas </option>
    <option> Laminados </option>
    <option>Almacenamiento</option>";

    $ini = "comercial";
        break;


    case "3":
        echo"<option> Sillas </option>
        <option> Tornillos </option>
        <option> Baldosas Tapizadas </option>
        <option> Baldosas Laminadas </option>
        <option> Embalaje </option>
        <option> Tela </option>
        <option>Almacenamiento</option>";
        $ini = "sillas";
        break;


      case "14":
        

echo"<option> Accesorios </option>
<option> ACTIU </option>
<option>Almacenamiento</option>
<option> Cajoneras </option>
<option> Cristales </option>
<option> Embalaje </option>
<option> Full Space </option>
<option> Mantencion </option>
<option> Mueble De Linea </option>
<option> Paneleria </option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Servicios </option>
<option> Sillas </option>
<option> Soportes </option>
<option> Superficies Curvas </option>
<option> Superficies Rectas </option>";
 $ini = "despacho";
break;
}

} 

if($ini == "")
{



 echo"<option> Accesorios </option>
            <option> Accesorios Paneleria</option>
            <option> ACTIU </option>
            <option> Articulo Electrico </option>
            <option> Almacenamiento</option>
            <option> Almacenamiento Metalico</option>
            <option> Baldosas Melamina </option>
            <option> Baldosas Metalica </option>
            <option> Baldosas Laminadas </option>
            <option> Baldosas Tapizadas</option>
            <option> Baldosas Vidrio </option>
            <option> Cajoneras </option>
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
            <option> Mepal </option>
            <option> Mueble De Linea </option>
            <option> Muebles Metalicos </option>
            <option> Paneleria </option>
            <option> Partes y Piezas </option>
            <option> Producto </option>
            <option> Producto Especial</option>
            <option> Quincalleria </option>
            <option> Quimicos </option> 
            <option> Repiceria </option>
            <option> Servicios </option>
            <option> Seguridad </option>
            <option> Sillas </option>
            <option> Soportes </option> 
            <option> Soportes Metalicos </option> 
            <option> Superficies Curvas </option>
            <option> Superficies Rectas </option>
            <option> Tapacantos </option>
            <option> Tela </option>
            <option> Tiradores </option>
            <option> Tornillos </option>";


};


?>


  </select></center>
  <select style=" font: normal .90em arial, sans-serif;
  color: #1D1D1D; border-radius: 8px; width:150;display:none"  id = "familias1" name = "familias1">
<option>  </option>
<option> Accesorios </option>
<option> ACTIU </option>
<option> Articulo Electrico </option>
<option> Almacenamiento </option>
<option> Baldosas Laminadas </option>
<option> Baldosas Tapizadas</option>
<option> Cajoneras </option>
<option> Cerraduras </option>
<option> Correderas </option>
<option> Cristales </option>
<option> Cubiertas </option>
<option> Embalaje </option>
<option> Laminados </option>
<option> Maderas </option>
<option> Mantencion </option>
<option> Maquinas y Herramientas </option>
<option> Muebles Especiales </option>
<option> Mueble De Linea </option>
<option> Paneleria </option>
<option> Partes y Piezas </option>
<option> Producto Especial</option>
<option> Quincalleria </option>
<option> Quimicos </option> 
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

  </select></center></td>
  </tr>
  </tr>
  <tr>
  <td height="100" colspan="2" align=""><input class="boton" type="submit" name = "buscar" id='buscar' value="Buscar"/><input style="display:none;" type="text" name='valor' id='valor' value='0'/></td>
   </tr>
  </tr>
  </table>  
 </form> 
</div>