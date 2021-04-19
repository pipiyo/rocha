<?php
include_once 'usuarios.classEmpleado.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>