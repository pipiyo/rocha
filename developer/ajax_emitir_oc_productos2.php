<?php

session_start();

	unset($_SESSION['prooc']["".$_POST['cod'].""]);

$_SESSION['prooc']["".$_POST['cod'].""] = array("COD" =>  $_POST['cod'] ,  "DES"  => $_POST['des'] );



?>