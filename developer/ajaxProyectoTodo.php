<?php
include_once 'usuarios.classProyectoTodos.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>