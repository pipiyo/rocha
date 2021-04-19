<?php
include_once 'usuarios.classProveedor.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario($_GET['term']));

?>