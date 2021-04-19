<?php

session_start();


if (isset($_POST['clean'])) {

	

	foreach ($_SESSION['prooc'] as $key => $value) {
		unset($_SESSION['prooc'][$key]);
	}



}else{

	unset($_SESSION['prooc']["".$_POST['cod'].""]);

}


?>