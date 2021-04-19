<?php
include_once 'usuarios.classValeProductodes.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term']),($_GET['test'])));

?>