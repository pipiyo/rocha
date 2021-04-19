<?php
session_start();




if ($_POST['del']) {

unset($_SESSION['carrito']);
unset($_SESSION['cotizacion']);

$_SESSION['carrito'] = array();
$_SESSION['cotizacion'] = array();

}else{


if ($_POST['borrar']) {


	unset($_SESSION['carrito']["".$_POST['cod'].""]);


}else{

	switch ($_POST['fam']) {
    case 'M':
        $MATERIAL = 'MELAMINA';
        break;
    case 'L':
        $MATERIAL = 'LAMINADO';
        break;
    case 'E':
        $MATERIAL = 'ENCHAPE';
        break;
}

	$_SESSION['carrito']["".$_POST['cod'].""] = array( "COD" => $_POST['cod'] , "DES" => $_POST['des'], "PRES" => $_POST['pres'], "FAM" => $MATERIAL );

}

};

?>

