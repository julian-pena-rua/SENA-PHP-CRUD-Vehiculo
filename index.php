<link rel="stylesheet" href="style.css">
<?php

// Manejo de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


error_log("Error message\n", 3, "/php.log");



// Incluyo los archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/AdministradorPeticionesCarro.php';

// Instancio el controlador
$controlador = new ControladorCarro();

$_SERVER['listaCarros'] = $controlador->listar();

// Le paso los datos a la vista
require $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/vista/index.php';
?>
