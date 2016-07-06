<?php
include_once 'usuarios.classComuna.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>