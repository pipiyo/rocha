<?php
include_once 'respuesta-agregar-producto-codigo.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario(($_GET['term'])));

?>