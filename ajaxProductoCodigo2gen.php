<?php
include_once 'usuarios.classProductoCodigo2gen.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>