<?php
$PRO = json_decode($_POST['datos']);
require_once('Conexion/Conexion.php');
mysql_select_db($database_conn, $conn); 

$sql = "INSERT INTO producto2 (CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, FORMATO, LARGO, ANCHO, ALTO, M3, UNIDAD_DE_MEDIDA, RELACION, RUTA, RUTA1, RUTA2, CODIGO_GENERICO, FAMILIA, POSICION, CAD_2D, CAD_3D, CUERPO, FRENTE) values ";

foreach ($PRO as $key => $value) {
    if ($PRO[$key][3] == "NO EXISTE") {
        
    $sql .=  ( $PRO[$key][0] == $PRO[0][0]  )   ?    " ('".$PRO[$key][0]."','".$PRO[$key][1]."','".$PRO[$key][2]."','".$_POST['formato']."','".$_POST['Largo']."','".$_POST['Ancho']."','".$_POST['Alto']."','".$PRO[$key][5]."','".$_POST['UM']."','".$_POST['Relacion']."','".$PRO[$key][6]."','','".$PRO[$key][8]."','".$PRO[0][0]."','".$PRO[$key][4]."','".$PRO[$key][9]."','".$PRO[$key][10]."','".$PRO[$key][11]."','".$PRO[$key][12]."','".$PRO[$key][13]."'),"   :     " ('".$PRO[$key][0]."','".$PRO[$key][1]."','".$PRO[$key][2]."','".$_POST['formato']."','".$_POST['Largo']."','".$_POST['Ancho']."','".$_POST['Alto']."','".$PRO[$key][5]."','".$_POST['UM']."','".$_POST['Relacion']."','".$PRO[$key][6]."','".$PRO[$key][7]."','".$PRO[$key][8]."','".$PRO[0][0]."','".$PRO[$key][4]."','".$PRO[$key][9]."','".$PRO[$key][10]."','".$PRO[$key][11]."','".$PRO[$key][12]."','".$PRO[$key][13]."')," ;

    }
}

$sql = substr($sql , 0, -1);

if ($sql == "INSERT INTO producto2 (CODIGO_PRODUCTO, DESCRIPCION, CATEGORIA, FORMATO, LARGO, ANCHO, ALTO, M3, UNIDAD_DE_MEDIDA, RELACION, RUTA, RUTA1, RUTA2, CODIGO_GENERICO, FAMILIA, POSICION, CAD_2D, CAD_3D, CUERPO, FRENTE) values") {

    echo "NO SE REMPLAZO NADA";

}else{

mysql_query($sql, $conn) or die(mysql_error());

echo "OKIDOKI";

}

?>