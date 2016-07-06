<?php
            session_start();
            if (!$_SESSION){
            echo '<script language = javascript>
            alert("usuario no autenticado")
            self.location = "index.php"
            </script>';
            }
            $GRUPOS = $_SESSION['GRUPOS'];
            require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn); 
$DIRCUADROR = "href='proyectos.php?rangonegativo=1&rangopositivo=1&buscarcod=&buscarcli=&buscareje=&estado=EN+PROCESO&buscar=Buscar'";   
$DIRCUADRORAD = "href='radicados.php'";  
$DIRCUADROP = "href='CuadroProduccion.php?rangonegativo=1&rangopositivo=1&buscarcod=&buscarcli=&buscareje=&estado=EN+PROCESO&buscar=Buscar'";  
$DIRCUADROD = "href='CuadroDespacho.php?rangonegativo=1&rangopositivo=1&buscarcod=&buscarcli=&buscareje=&estado=EN+PROCESO&buscar=Buscar'";           
$DIRBODEG = "href='Producto.php?buscar_codigo=&buscar_usuario=&familias=&buscar=Buscar&valor=0'";

  $sqlr = " SELECT * FROM objetos WHERE HOJA_PHP LIKE '%".$_POST['pagina']."%' ORDER BY ORDEN desc LIMIT 1";
            $sqlr = mysql_query($sqlr, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $HOJA =  $row["HOJA_PHP"];     
            $OBJETO =  $row["OBJETO"];
            $HERENCIA =  $row["HERENCIA"];

                  if($OBJETO == "PRODUCTO" || $OBJETO == "BODEGA DESPACHO" || $OBJETO == "BODEGA SILLAS")
                  {
                  $BREAD = "<ul><li><a href='#'>BODEGA</a></li>";
                  }
                  else if($OBJETO == "CUADRO ROCHA")
                  {
                  $BREAD = "<ul><li><a href='#'>CUADRO ROCHA</a></li>";
                  }
                  else if($OBJETO == "CUADRO PRODUCCION")
                  {
                  $BREAD = "<ul><li><a href='#'>CUADRO PRODUCCION</a></li>";
                  }
                  else if($OBJETO == "CUADRO DESPACHO")
                  {
                  $BREAD = "<ul><li><a href='#'>CUADRO DESPACHO</a></li>";
                  }
                  else
                  {
                  $BREAD = "<ul><li><a href=''>".$OBJETO."</a></li>"; 
                  }
            while( $HERENCIA != "" )  
            { 
            
           /*se abre la sentencia si viene de bodega*/
            if($HERENCIA == 'ADQ-DES-SIL')
            {
            $ABS ="<li><a id='MODULO ABASTECIMIENTO'>ABASTECIMIENTO</a></li>";
            $PRO ="<li><a id='MODULO PRODUCCION'>PRODUCCION</a></li>";
            $DES ="<li><a id='MODULO DESPACHO'>DESPACHO</a></li>";     
            $BREAD .= "<li>MODULO<ul>".$ABS.$PRO.$DES."</ul></li>";
            $HERENCIA =  "HOME";
            }
            /*se abre la sentencia si viene de vale*/
            else if($HERENCIA == 'ADQ-PRO')
            {
            $ABS ="<li><a id='MODULO ABASTECIMIENTO'>ABASTECIMIENTO</a></li>";
            $PRO ="<li><a id='MODULO PRODUCCION'>PRODUCCION</a></li>";    
            $BREAD .= "<li>MODULO<ul>".$ABS.$PRO."</ul></li>";
            $HERENCIA =  "HOME";
            }
            else if($HERENCIA == 'DESCRIPCION OC')
            {
            $BREAD .= "<li><a  href='javascript:history.go(-1);'>DESCRIPCION OC</a></li>";
            $HERENCIA = "LISTADO DE COMPRAS";
            }
            else if($HERENCIA == 'COM-INS')
            {
            $COM ="<li><a id='MODULO COMERCIAL'>COMERCIAL</a></li>";
            $INS ="<li><a id='MODULO INSTALACION'>INSTALACION</a></li>";    
            $BREAD .= "<li>MODULO<ul>".$COM.$INS."</ul></li>";$HERENCIA = "HOME";
            }
            else if($HERENCIA == 'VALE ENTREGA')
            {
            $BREAD .= "<li><a  href='javascript:history.go(-1);'>DESCRIPCION VALE</a></li>";
            $HERENCIA = "LISTADO VALE EMISION";
            }
            else if($HERENCIA == 'PRODUCTO')
            {
            $BREAD .= "<li><a ".$DIRBODEG .">BODEGA</a></li>";
            $HERENCIA = "ADQ-DES-SIL";
            }
            else  if($HERENCIA == 'CUADRO RADICADO')
            {
            $BREAD .= "<li><a ".$DIRCUADRORAD .">CUADRO RADICADO</a></li>";
            $HERENCIA = "HOME";
            }
            else  if($HERENCIA == 'CUADRO ROCHA')
            {
            $BREAD .= "<li><a ".$DIRCUADROR .">CUADRO ROCHA</a></li>";
            $HERENCIA = "HOME";
            }
            else if($HERENCIA == 'EDITAR PROYECTO')
            {
            $BREAD .= "<li><a  href='javascript:history.go(-1);'>EDITAR PROYECTO</a></li>";
            $HERENCIA = "CUADRO ROCHA";
            }
            else if($HERENCIA == 'DESCRIPCION RADICADO')
            {
            $BREAD .= "<li><a  href='javascript:history.go(-1);'>DESCRIPCION RADICADO</a></li>";
            $HERENCIA = "CUADRO RADICADO";
            }
            else if($HERENCIA == 'HOME')
            {
            $HERENCIA = "";
            }
           /*Por defecto*/
            else
            {
            $sqlr1 = "SELECT * FROM objetos WHERE OBJETO LIKE '".$HERENCIA."'";
            $sqlr1 = mysql_query($sqlr1, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr1))
            {
            $HOJA =  $row["HOJA_PHP"];     
            $OBJETO =  $row["OBJETO"];
            $HERENCIA =  $row["HERENCIA"];
            $BREAD .= "<li><a href='".$HOJA."'>".$OBJETO."</a></li>";
            }
            mysql_free_result($sqlr1);
            }

            }
           

            }
            mysql_free_result($sqlr);
            $BREAD .= "</ul>";
            echo $BREAD;
?>



