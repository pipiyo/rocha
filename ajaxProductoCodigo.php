<?php
include_once 'usuarios.classProductoCodigo.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>