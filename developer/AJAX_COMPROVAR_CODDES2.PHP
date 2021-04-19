<?php
             require_once('Conexion/Conexion.php');
            mysql_select_db($database_conn, $conn);
                $COD = trim($_POST['cod']);
                $DES = trim($_POST['des']);
                $LISTAM = array(); 
                $LISTAL = array();
                $LISTAE = array();
                $PRO = array();
                $COM = array();
                $COM2 = array();
                $FINAL = array();

$COLORESMsuper = array(  1 =>  "Blanco",
8 => "Peral" );

$COLORESMsoportes = array(  1 =>  "Blanco",
3 => "Grafito" );

$COLORESM = array(  1 =>  "Blanco",
2 => "Gris Humo",
3 => "Grafito",
4 => "Negro",
5 => "Aluminio",
6 => "Vison",
7 => "Coigüe Chocolate" );

$COLORESL = array(  1 =>  "Vainilla",
2   => "White Oak",
3   => "Cypress Camel",
4   => "Roble Lineal",
5   => "Noce Caffe Late",
6   => "Wengue",
7   => "Perillo",
8   => "Maple Fusion",
9   => "Haya 1750" );

$COLORESE = array( 1 => "Wengue-Tinta Wengue-1",
2 => "Wengue-Tinta Wengue-2",
3 => "Cedro-Tinta Miel-1",
4 => "Cedro-Tinta Miel-2",
5 => "Haya Rorado-Tinta Natural-1" );

$PUNTOS = array(  1 => array( 'cod' => '.24' , 'des' => 'A24' ),
2   =>  array( 'cod' => '.25' , 'des' => 'MDF25' ),
3   =>  array( 'cod' => '.30' , 'des' => 'MDF30' ) );

        $PRO[] = (array( "COD" => $COD,
        "DES" => str_replace("@", " " , $DES),
        "FAM" => 'GENERICO',
        "CUERPO" => '',
        "FRENTE" => '' ));
        $COM[] = $COD ;

if ( $_POST['cat'] == 'Soportes' ) {

foreach ($COLORESMsoportes as $key => $value) {
            $LISTAM[] = array( "COD" => $COD.".M.".$key,
         "DES" => str_replace("@", "Melamina ".$value , $DES),
         "CUERPO" => "$value",
        "FRENTE" => '' );
}

$l=1; 
while($l <= count($COLORESL) ) { 
    $p=1; 
   while($p <= count($PUNTOS) ) { 

       $LISTAL[] = array( "COD" => $COD.".L.".$l.$PUNTOS[$p]['cod']."",
       "DES" => str_replace("@", "Laminado ".$COLORESL[$l]." ".$PUNTOS[$p]['des'] , $DES),
         "CUERPO" => "$COLORESL[$l]",
        "FRENTE" => '' );

   $p++; 
   }
$l++; 
}
$e=1; 
while($e <= count($COLORESE)) { 
    $p=1; 
   while($p <= count($PUNTOS)) { 
         $LISTAE[] = array( "COD" => $COD.".E.".$e.$PUNTOS[$p]['cod'],
         "DES" => str_replace("@", "Enchape ".$COLORESE[$e]." ".$PUNTOS[$p]['des'] , $DES),
         "CUERPO" => "$COLORESE[$e]",
        "FRENTE" => '' );
    $p++; 
   }
$e++;
}
/////////////////////////////////////////////////////////////////////////////////////
} else if ($_POST['cat'] == 'Superficies Curvas' || $_POST['cat'] == 'Superficies Rectas') {
/////////////////////////////////////////////////////////////////////////////////////////




foreach ($COLORESMsuper as $key => $value) {
            $LISTAM[] = array( "COD" => $COD.".M.".$key,
         "DES" => str_replace("@", "Melamina ".$value , $DES),
         "CUERPO" => "$value",
        "FRENTE" => '' );
}

$l=1; 
while($l <= count($COLORESL) ) { 
    $p=1; 
   while($p <= count($PUNTOS) ) { 
       $LISTAL[] = array( "COD" => $COD.".L.".$l.$PUNTOS[$p]['cod'].".B",
       "DES" => str_replace("@", "Laminado ".$COLORESL[$l]." Balance ".$PUNTOS[$p]['des'] , $DES),
         "CUERPO" => "$COLORESL[$l]",
        "FRENTE" => '' );
       $LISTAL[] = array( "COD" => $COD.".L.".$l.$PUNTOS[$p]['cod'].".P",
       "DES" => str_replace("@", "Laminado ".$COLORESL[$l]." Pintura ".$PUNTOS[$p]['des'] , $DES),
         "CUERPO" => "$COLORESL[$l]",
        "FRENTE" => '' );
   $p++; 
   }
$l++; 
}
$e=1; 
while($e <= count($COLORESE)) { 
    $p=1; 
   while($p <= count($PUNTOS)) { 
         $LISTAE[] = array( "COD" => $COD.".E.".$e.$PUNTOS[$p]['cod'],
         "DES" => str_replace("@", "Enchape ".$COLORESE[$e]." ".$PUNTOS[$p]['des'] , $DES),
         "CUERPO" => "$COLORESE[$e]",
        "FRENTE" => '' );
    $p++; 
   }
$e++;
}
} else if ( $_POST['cat'] == 'Almacenamiento' || $_POST['cat'] == 'Cajoneras' || $_POST['cat'] == 'Mueble De Linea' ){
$m=1;
while($m <= count($COLORESM)) { 
    $mm=1;
    while($mm <= count($COLORESM)) { 
         $LISTAM[] = array( "COD" => $COD.".M.".$m.".".$mm,
         "DES" => str_replace("@", "Melamina ".$COLORESM[$m].", Frente ".$COLORESM[$mm] , $DES),
         "CUERPO" => $COLORESM[$m],
        "FRENTE" => $COLORESM[$mm] );
    $mm++;
    }
        $l=1;
        while ($l <= count($COLORESL)) {
        $LISTAL[] = array( "COD" => $COD.".L.".$m.".".$l,
         "DES" => str_replace("@", "Laminado ".$COLORESM[$m].", Frente ".$COLORESL[$l] , $DES),
         "CUERPO" => $COLORESM[$m],
        "FRENTE" => $COLORESL[$l] );
        $l++;
        }
$m++;
}
        $e=1;
         while($e <= count($COLORESE)) { 
            $ee=1;
            while($ee <= count($COLORESE)) { 
         $LISTAE[] = array( "COD" => $COD.".E.".$e.".".$ee,
         "DES" => str_replace("@", "Enchape ".$COLORESE[$e].", Frente ".$COLORESE[$ee] , $DES),
         "CUERPO" => $COLORESE[$e],
        "FRENTE" => $COLORESE[$ee] );  
            $ee++;
            }
        $e++;
        }
} else if ( $_POST['cat'] == 'Partes y Piezas' ){
$m=1; 
while($m <= count($COLORESM)) { 
        $LISTAM[] = array( "COD" => $COD.".M.".$m,
         "DES" => str_replace("@", "Melamina ".$COLORESM[$m] , $DES),
         "CUERPO" => "$COLORESM[$m]",
        "FRENTE" => '' );
$m++;
}
$l=1; 
while($l <= count($COLORESL) ) { 
       $LISTAL[] = array( "COD" => $COD.".L.".$l,
       "DES" => str_replace("@", "Laminado ".$COLORESL[$l] , $DES),
         "CUERPO" => "$COLORESL[$l]",
        "FRENTE" => '' );
$l++; 
}
$e=1; 
while($e <= count($COLORESE)) { 
         $LISTAE[] = array( "COD" => $COD.".E.".$e,
         "DES" => str_replace("@", "Enchape ".$COLORESE[$e] , $DES),
         "CUERPO" => "$COLORESE[$e]",
        "FRENTE" => '' );
$e++;
}
}

foreach ($LISTAM as $key => $value) {
    $PRO[] = array( "COD" => $LISTAM[$key]["COD"], "DES" => $LISTAM[$key]["DES"], "FAM" => 'M',
    "CUERPO" => $LISTAM[$key]["CUERPO"],
    "FRENTE" => $LISTAM[$key]["FRENTE"] );
    $COM[] = $LISTAM[$key]["COD"] ;
}

foreach ($LISTAL as $key => $value) {
    $PRO[] = array( "COD" => $LISTAL[$key]["COD"], "DES" => $LISTAL[$key]["DES"], "FAM" => 'L',
    "CUERPO" => $LISTAL[$key]["CUERPO"],
    "FRENTE" => $LISTAL[$key]["FRENTE"] );
    $COM[] = $LISTAL[$key]["COD"] ;
}

foreach ($LISTAE as $key => $value) {
    $PRO[] = array( "COD" => $LISTAE[$key]["COD"], "DES" => $LISTAE[$key]["DES"], "FAM" => 'E',
    "CUERPO" => $LISTAE[$key]["CUERPO"],
    "FRENTE" => $LISTAE[$key]["FRENTE"] );
    $COM[] = $LISTAE[$key]["COD"];
}

$sql = "SELECT CODIGO_PRODUCTO FROM producto WHERE CODIGO_PRODUCTO IN('".implode("','",$COM)."') ";
            $sqlr = mysql_query($sql, $conn) or die(mysql_error());
            while($row = mysql_fetch_array($sqlr))
            {
            $COM2[] = $row["CODIGO_PRODUCTO"];
            }
            mysql_free_result($sqlr);
foreach ($PRO as $key => $value) {
        $FINAL[] = ( (in_array($PRO[$key]["COD"], $COM2)) ) ?  array( "COD" => $PRO[$key]["COD"],
         "DES" => $PRO[$key]["DES"],
         "CAT" => $_POST['cat'],
         "FAM" => $PRO[$key]["FAM"],
         "M3" => $_POST['m3'],
         "POS" => $_POST['pos'],
         "R" => $PRO[$key]["COD"].'_img_0.jpg',
         "R1" => $PRO[$key]["COD"].'_img_1.jpg',
         "R2" => $PRO[$key]["COD"].'_img_2.jpg',
         "CAD2" => $PRO[$key]["COD"].'_cad_2D.dwg',
         "CAD3" => $PRO[$key]["COD"].'_cad_3D.dwg',
         "EX" => "EXISTE",
        "CUERPO" => $PRO[$key]["CUERPO"],
        "FRENTE" => $PRO[$key]["FRENTE"] ) : array( "COD" => $PRO[$key]["COD"],
         "DES" => $PRO[$key]["DES"],
         "CAT" => $_POST['cat'],
         "FAM" => $PRO[$key]["FAM"],
         "M3" => $_POST['m3'],
         "POS" => $_POST['pos'],
         "R" => $PRO[$key]["COD"].'_img_0.jpg',
         "R1" => $PRO[$key]["COD"].'_img_1.jpg',
         "R2" => $PRO[$key]["COD"].'_img_2.jpg',
         "CAD2" => $PRO[$key]["COD"].'_cad_2D.dwg',
         "CAD3" => $PRO[$key]["COD"].'_cad_3D.dwg',
         "EX" => "NO EXISTE",
        "CUERPO" => $PRO[$key]["CUERPO"],
        "FRENTE" => $PRO[$key]["FRENTE"] );
}
            echo json_encode($FINAL);
?>
