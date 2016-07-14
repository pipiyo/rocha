<?php require_once('Conexion/Conexion.php');?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Actividades.xls");
header("Pragma: no-cache");
header("Expires: 0");

session_start();
if (!$_SESSION){
echo '<script language = javascript>
alert("usuario no autenticado")
self.location = "index.php"
</script>';
}
?>

<html>
    <head>  
        <title> </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <table>
        <?php
            $fin=0;
            $ESTADOV = $_GET["estado"];
            $CODIGO_PROYECTO = $_GET["codigo"];

            if($ESTADOV == "TODOS")
            {
            $sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND  not NOMBRE_SERVICIO='OC' ORDER BY ORDEN_SERVICIO, FECHA_INICIO asc";
            }
            else
            {
            $sql555 = "select * FROM servicio where CODIGO_PROYECTO = '".$CODIGO_PROYECTO."' AND ESTADO  = '".$ESTADOV."' AND  not NOMBRE_SERVICIO='OC' ORDER BY ORDEN_SERVICIO, FECHA_INICIO asc ";
            }

            $tp_corte = substr($CODIGO_PROYECTO,0,2);

            $result555 = mysql_query($sql555, $conn) or die(mysql_error());
             while($row = mysql_fetch_array($result555))
              {
                $NOMBRE_SERVICIO1 = $row["NOMBRE_SERVICIO"];
                $PROGRESO = $row["PROGRESO"];
                $CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
                $FECHA_I1 = $row["FECHA_INICIO"];
                $FECHA_E1 = $row["FECHA_ENTREGA"];
                $FECHA_PRIMERA_ENTREGA = $row["FECHA_PRIMERA_ENTREGA"];
                $REALIZADOR1 = $row["REALIZADOR"];
                $SUPERVISOR1 = $row["SUPERVISOR"];
                $OBSERVACION1 = $row["OBSERVACIONES"];
                $DESCRIPCION1 = $row["DESCRIPCION"];
                $CODIGO_SERVICIO1 = $row["CODIGO_SERVICIO"];
                $ESTADO1 = $row["ESTADO"];
                $DIAS1 = $row["DIAS"];
                $PREDECESOR1  = $row["PREDECESOR"];
                $RECLAMOS  = $row["RECLAMOS"];
                $CATEGORIA  = $row["CATEGORIA"];
                $VALE = $row["VALE"];
                $FACTURA = $row["FACTURA"];
                $FI  = $row["FI"];

                

                if($NOMBRE_SERVICIO1 == "Produccion")
                {
                echo "<tr><td align='center' style='background:blue;color:#fff;border-bottom:#999' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                    $NOMBRE_SERVICIO1 . " ". $CATEGORIA. "</a></td>";
                echo "<td style='background:blue;color:#fff;'><center>N°</center></td>";    
                echo "<td style='background:blue;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:blue;color:#fff;'><center>Reclamo</center></td>";
                echo "<td  width='70' style='background:blue;color:#fff;'><center>Fecha Inicio</center></td>";  
                echo "<td  width='70' style='background:blue;color:#fff;'><center>Fecha Entrega</center></td>"; 
                echo "<td width='70' style='background:blue;color:#fff;'><center>Confirmacion</center></td>";   
                echo "<td style='background:blue;color:#fff;'><center>Dias</center></td>";  
                echo "<td  width='70'  style='background:blue;color:#fff;'><center>Vale</center></td>"; 
                echo "<td align='center'colspan='2' style='background:blue;color:#fff;'>Observacion</td>";  
                echo "<td align='center' width='70' style='background:blue;color:#fff;'>Estado</td></tr>";  
                }
                else if($NOMBRE_SERVICIO1 == "Instalacion")
                {
                echo "<tr><td align='center' style='background:#B10F0F; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                    $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#B10F0F;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#B10F0F;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#B10F0F;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#B10F0F;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#B10F0F;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#B10F0F;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#B10F0F;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#B10F0F;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#B10F0F;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#B10F0F;color:#fff;'>Estado</td></tr>";       
                }
                 else if($NOMBRE_SERVICIO1 == "Adquisiciones")
                {
                echo "<tr><td align='center' style='background:#36C444; color:#fff;' rowspan='2' colspan='10'> <a style='color:#FFF;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#36C444;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#36C444;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#36C444;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#36C444;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#36C444;color:#fff;'><center>Fecha Entrega</center></td>";   
                echo "<td width='70' style='background:#36C444;color:#fff;'><center>Confirmacion</center></td>";    
                echo "<td style='background:#36C444;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#36C444;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#36C444;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#36C444;color:#fff;'>Estado</td></tr>";   
                }
                else if($NOMBRE_SERVICIO1 == "Despacho")
                {
                echo "<tr><td align='center' style='background:#FFFF00; color:#060;' rowspan='2' colspan='10'> <a style='color:black;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#FFFF00'><center>N°</center></td>"; 
                echo "<td style='background:#FFFF00;'><center>Descripcion</center></td>";
                if($tp_corte == "TP"){
                    echo "<td style='background:#FFFF00;'><center>Servicio</center></td>";
                }else{
                    echo "<td style='background:#FFFF00;'><center>Reclamo</center></td>";
                }
                echo "<td width='70' style='background:#FFFF00;'><center>Fecha Inicio</center></td>";   
                echo "<td width='70' style='background:#FFFF00;'><center>Fecha Entrega</center></td>";  
                echo "<td width='70' style='background:#FFFF00;color:#000;'><center>Confirmacion</center></td>";    
                echo "<td style='background:#FFFF00;'><center>Dias</center></td>";  
                echo "<td  width='70'  style='background:#FFFF00;color:#000;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#FFFF00;color:#000;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#FFFF00;color:#000;'>Estado</td></tr>";           
                }
                else if($NOMBRE_SERVICIO1 == "Desarrollo")
                {
                echo "<tr><td align='center' style='background:#E46F1C; color:#060;' rowspan='2' colspan='10'> <a style='color:black;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#E46F1C;'><center>N°</center></td>";    
                echo "<td style='background:#E46F1C;'><center>Descripcion</center></td>";
                echo "<td style='background:#E46F1C;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#E46F1C;'><center>Fecha Inicio</center></td>";   
                echo "<td width='70' style='background:#E46F1C;'><center>Fecha Entrega</center></td>";  
                echo "<td width='70' style='background:#E46F1C;color:#000;'><center>Confirmacion</center></td>";
                echo "<td style='background:#E46F1C;'><center>Dias</center></td>";  
                echo "<td  width='70'  style='background:#E46F1C;color:#000;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#E46F1C;color:#000;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#E46F1C;color:#000;'>Estado</td></tr>";           
                }
                else if($NOMBRE_SERVICIO1 == "Mantencion")
                {
                echo "<tr><td align='center' style='background:#642EFE; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#642EFE;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#642EFE;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#642EFE;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#642EFE;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#642EFE;color:#fff;'><center>Fecha Entrega</center></td>";   
                echo "<td width='70' style='background:#642EFE;color:#fff;'><center>Confirmacion</center></td>";
                echo "<td style='background:#642EFE;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#642EFE;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#642EFE;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#642EFE;color:#fff;'>Estado</td></tr>";       
                }
                else if($NOMBRE_SERVICIO1 == "Sillas")
                {
                echo "<tr><td align='center' style='background:#0080FF; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                 $NOMBRE_SERVICIO1 . " ". $CATEGORIA. "</a></td>";
                echo "<td style='background:#0080FF;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#0080FF;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#0080FF;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#0080FF;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#0080FF;color:#fff;'><center>Fecha Entrega</center></td>";   
                echo "<td width='70' style='background:#0080FF;color:#fff;'><center>Confirmacion</center></td>";    
                echo "<td style='background:#0080FF;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#0080FF;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#0080FF;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#0080FF;color:#fff;'>Estado</td></tr>";           
                }
                else if($NOMBRE_SERVICIO1 == "Bodega")
                {
                echo "<tr><td align='center' style='background:#DF01D7; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#DF01D7;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#DF01D7;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#DF01D7;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#DF01D7;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#DF01D7;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#DF01D7;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#DF01D7;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#DF01D7;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#DF01D7;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#DF01D7;color:#fff;'>Estado</td></tr>";   
                }
                else if($NOMBRE_SERVICIO1 == "Sistema")
                {
                echo "<tr><td align='center' style='background:black; color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:black;color:#fff;'><center>N°</center></td>";   
                echo "<td style='background:black;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:black;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:black;color:#fff;'><center>Fecha Inicio</center></td>";  
                echo "<td width='70' style='background:black;color:#fff;'><center>Fecha Entrega</center></td>"; 
                    echo "<td width='70' style='background:black;color:#fff;'><center>Confirmacion</center></td>";  
                echo "<td style='background:black;color:#fff;'><center>Dias</center></td>"; 
                echo "<td  width='70'  style='background:black;color:#fff;'><center>FI</center></td>";  
                echo "<td align='center'colspan='2' style='background:black;color:#fff;'>Observacion</td>"; 
                echo "<td align='center' width='70' style='background:black;color:#fff;'>Estado</td></tr>";     
                }
                else if($NOMBRE_SERVICIO1 == "Servicio Tecnico")
                {
                echo "<tr><td align='center' style='background:#886A08;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#886A08;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#886A08;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#886A08;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#886A08;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#886A08;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#886A08;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#886A08;color:#fff;'><center>Dias</center></td>";   
                    echo "<td  width='70'  style='background:#886A08;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#886A08;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#886A08;color:#fff;'>Estado</td></tr>";       
                }
                else if($NOMBRE_SERVICIO1 == "FI")
                {
                echo "<tr><td align='center' style='background:#F7BE81;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#F7BE81;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#F7BE81;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#F7BE81;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#F7BE81;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#F7BE81;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#F7BE81;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#F7BE81;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#F7BE81;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#F7BE81;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#F7BE81;color:#fff;'>Estado</td></tr>";       
                }
                else if($NOMBRE_SERVICIO1 == "Prevención de Riesgos")
                {
                echo "<tr><td align='center' style='background:#BCA9F5;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#BCA9F5;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#BCA9F5;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#BCA9F5;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#BCA9F5;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#BCA9F5;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#BCA9F5;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#BCA9F5;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#BCA9F5;color:#fff;'><center>FI</center></td>";    
                echo "<td align='center'colspan='2' style='background:#BCA9F5;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#BCA9F5;color:#fff;'>Estado</td></tr>";       
                }
                else if($NOMBRE_SERVICIO1 == "Factura")
                {
                echo "<tr><td align='center' style='background:#466C75;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#466C75;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#466C75;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#466C75;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#466C75;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#466C75;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#466C75;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#466C75;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#466C75;color:#fff;'><center>Factura</center></td>";   
                echo "<td align='center'colspan='2' style='background:#466C75;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#466C75;color:#fff;'>Estado</td></tr>";       
                }
                else if($NOMBRE_SERVICIO1 == "Nota de Credito")
                {
                echo "<tr><td align='center' style='background:#24A882;color:#fff;' rowspan='2' colspan='10'> <a style='color:#fff;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                $NOMBRE_SERVICIO1 . "</a></td>";
                echo "<td style='background:#24A882;color:#fff;'><center>N°</center></td>"; 
                echo "<td style='background:#24A882;color:#fff;'><center>Descripcion</center></td>";
                echo "<td style='background:#24A882;color:#fff;'><center>Reclamo</center></td>";
                echo "<td width='70' style='background:#24A882;color:#fff;'><center>Fecha Inicio</center></td>";    
                echo "<td width='70' style='background:#24A882;color:#fff;'><center>Fecha Entrega</center></td>";
                echo "<td width='70' style='background:#24A882;color:#fff;'><center>Confirmacion</center></td>";        
                echo "<td style='background:#24A882;color:#fff;'><center>Dias</center></td>";   
                echo "<td  width='70'  style='background:#24A882;color:#fff;'><center>Factura</center></td>";   
                echo "<td align='center'colspan='2' style='background:#24A882;color:#fff;'>Observacion</td>";   
                echo "<td align='center' width='70' style='background:#24A882;color:#fff;'>Estado</td></tr>";       
                }
                
                
                echo "<tr><td width='50' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center><a style='color:#000;
                text-decoration:none;' href=DescripcionServicio.php?CODIGO_SERVICIO=" .urlencode($CODIGO_SERVICIO1). "&CODIGO_PROYECTO=" . urlencode($CODIGO_PROYECTO). "&editar=editar>" . 
                    $CODIGO_SERVICIO1 . "</a></center></td>";
                echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".($DESCRIPCION1)."</center></td>";
                echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$RECLAMOS ."</center></td>";
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FECHA_I1 ."</center></td>"; 
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FECHA_PRIMERA_ENTREGA ."</center></td>";    
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FECHA_E1."</center></td>";  
                echo "<td width='70'style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$DIAS1."</center></td>";
                if($NOMBRE_SERVICIO1 == "Produccion")
                {   
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$VALE."</center></td>";  
                }
                else if($NOMBRE_SERVICIO1 == "Factura")
                {   
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FACTURA."</center></td>";   
                }
                else
                {
                    echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;'><center>".$FI."</center></td>";    
                }
                echo "<td style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;' colspan='2'><center>".($OBSERVACION1)."</center></td>";   
                    if($NOMBRE_SERVICIO1 == "Produccion")
                {   
                echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;border-right:#E4E4E7 1px solid'><center>".$ESTADO1." <br> %".$PROGRESO."</center></td></tr>";
                }
                else
                {
                    echo "<td width='70' style='border-top:#E4E4E7 1px solid;border-left:#E4E4E7 1px solid;border-bottom:#E4E4E7 1px solid;border-right:#E4E4E7 1px solid'><center>".$ESTADO1."</center></td></tr>";    
                }
                
                
                echo"<tr><td> &nbsp; </td></tr>";
              }
    ?>
        </table>
    </body>
</html>