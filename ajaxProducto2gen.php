<?php
include_once 'usuarios.classProducto2gen.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>