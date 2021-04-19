<?php
include_once 'usuarios.classValeProducto.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term']),($_GET['test'])));

?>