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
  	
  
?>

<!DOCTYPE html PUBLIC >
<html>
  <head>
    <title>Vale Bodega V1.0.0</title>
    <link rel="shortcut icon" href="Imagenes/rocha.png">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />

    <link type="text/css" rel="stylesheet" href="Style/jquery-ui-1.8.4.custom.css" />
    <link rel="stylesheet" href="style/estilovale.css" type="text/css" media="screen">
    <link rel="styleSheet" href="style/bread.css" type="text/css" >

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>

    <script type="text/javascript" src="js/vale-emision.js"></script>

    <script src='js/Bloqueo.php'></script>
    <script src='js/breadcrumbs.php'></script>

    <script language = javascript>
    $(document).ready(function() {

        $(".btn-sub-actividad").click(function() {
            var num = $(".count-rocha").size();
            $(".td_rocha").append("<input class='textbox proyecto count-rocha' placeholder='Rocha' type='text' id = 'rocha"+num+"' name = 'rocha"+num+"'/>");
        }); 

        $(document).ready(function(){
            $(".proyecto").live("keyup", function(){
                $("#listaproyectos").empty().hide();
                var trayectoria = $(this).offset();
                if (this.value.length != 0) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax_rocha.php',
                        data: { 'consulta': $(this).val(), 'nombre': $(this).attr("name")  },
                        dataType:'json',
                        error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    },
                    success: function(data) {
                        if (data.length != 0) {
                            for(var i=0;i<data.length; i++){
                                $("#listaproyectos").append("<input  class='rochas'  type = 'button' name='"+data[i].NOMBRE+"' value = '"+data[i].COD+"' />  ");
                            }
                        }else{
                            $("#listaproyectos").empty().hide();
                        };
                    }
                    });
                    $("#listaproyectos").fadeIn("fast").css({
                        left: trayectoria.left,
                        top: trayectoria.top  + $(this).outerHeight(),
                    });
                };
            });
        });
        $(document).ready(function(){
            $(".rochas").live( "click",  function(e){
                $("#"+$(this).attr("name")+"").empty();
                console.log($(this).attr("name")+"")
                $("#"+$(this).attr("name")+"").val(this.value);
                var $row = $("#"+$(this).attr("name")+"").attr("name").substring(4, 7);
                
                if ($("#"+$(this).attr("name")+"").val().length != 0) {
                    $.ajax({
                        type: "POST",
                        url: 'ajax_comprovar_rocha.php',
                        data: { 'consulta': $("#"+$(this).attr("name")+"").val() },
                        dataType:'html',
                        error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    },
                    success: function(data) {
                        $("#resultador"+$row+"").empty();
                        $("#resultador"+$row+"").val(data);
                    }
                    });
                };
                $("#listaproyectos").empty().hide();
            });
        });

        $(document).ready(function(){
            $(document).click(function (e){
                var contenedor = $("#listaproyectos");
                if (!contenedor.is(e.target) && contenedor.has(e.target).length === 0){
                    contenedor.empty().hide();
                };
            });
        });
                        
    });   

    </script>

</head>

<body>
  <div id='bread'><div id="menu1"></div></div> 

  <form action = "scriptVale.php" method="post" id='formulario'>
  <div class='form-vale'>
    <h1>Vale de materiales bodega</h1>
    <div id = 'res'></div>
  
    <table class="table-vale-form">
	    <tr>
        <td><input class='textbox proyecto count-rocha' placeholder="Rocha"  type="text" id = "rocha" name = "rocha"/></td>
        <td><select class='textbox'   onchange="" id = "departamento" name="departamento">
            <option value="">Departamento</option>
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
            <option>SILLAS</option>
            <option>GERENCIA</option>
            <option>DAM</option>
            <option>DAM</option>
            <option>MUEBLES ESPECIALES</option>
            <option>SERVICIO TECNICO</option>
            </select></td>
        <td><input placeholder="Empleado" class='textbox'   type='text'  onchange="" id = "empleado" name="empleado"></td>
        </tr>
        <tr>
        <td><input placeholder="Fecha Inicio" class='textbox'  readonly="readonly" type="text"   id= "fecha" name = "fecha" value="<?php echo  date("Y-m-d H:i:s")?>"/></td>
        <td><input placeholder="Fecha Termino" class='textbox'  type="text"   id= "fecha_t" name = "fecha_t" value=""/></td>
        <td><input placeholder="N Vale" class='textbox'  readonly type="text"   id= "n_vale" name = "n_vale" value="<?php echo $NVALE?>"/></td>
        <tr>
        <td>
            <a class="btn-sub-actividad" id="b1">+ Rocha</a>
        </td>
        <td class="td_rocha">
            
        </td>
        </tr>
	   </tr>
		</table>
</div>

<table id="tabla_producto">
	<tr>
	
        <th class='fil1'>CODIGO ARTICULO</th>
        <th class='fil2'>DESCRIPCION</th>
        <th class='fil3'>EXISTE</th>
        <th class='fil4'>STOCK</th>
        <th class='fil5'>CANT SOLICITADA</th>
        <th class='fil6'>U/M</th>
        <th class='fil6'>Precio</th>
        <th class='fil7'>OBSERVACIONES</th>
	</tr>
  <tbody id="editor">
<?php
$contador = 1;
 while($contador < 26)
  {

 	echo "<tr>";
    echo "<td> <input onblur='final();' class='txt_invisible codigoproducto' name =cod".$contador." id =cod".$contador." type = 'text' value = '' /> </td>";			
    echo "<td> <input onblur='final();' class='txt_invisible descripcion' name =des".$contador." id =des".$contador." type = 'text' value = ''/> </td>";	
    echo "<td id =exs".$contador."> </td>";	
    echo "<td> <input  class='txt_invisible'  name =stock".$contador."  id =stock".$contador." type = 'text' value = '' /> </td>";
    echo "<td> <input onblur='resta();' class='txt_invisible'  name =cant".$contador."  id =cant".$contador." type = 'text' value = '' /> </td>";
  	echo "<td> <input class='txt_invisible' onblur='final();' class='form1' name =ud".$contador." id =ud".$contador." type = 'text' value = '' /> </td>";
    echo "<td> <input  class='txt_invisible'  name=prec".$contador."  id=prec".$contador." type = 'text' value = '' /> </td>";	
    echo "<td> <input class='txt_invisible' class='form4' id =obs".$contador." name =obs".$contador." type = 'text' value = '' /> </td>"; 
    echo "</tr>";
	$contador++; 
  }
?>
  </tbody>
</table>

<div align="right">
    <input type="button" id="ingresar" name="ingresar" value="EMITIR" onclick="enviar();">
</div>

<div  id="listaproyectos"></div>
<div  id="listacodigos"></div>
<div  id="listadescripciones"></div>

</form>

</body>

</html>