<?php
include_once 'usuarios.classTP.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>