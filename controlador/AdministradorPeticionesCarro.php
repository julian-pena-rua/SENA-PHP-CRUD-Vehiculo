<?php

if(!isset($_GET['accion'])){
    $_GET['accion'] = '';
}

require_once 'controlador/ControladorCarro.php';

$carro = new Carro();

// si el elemento insertar no viene nulo llama al modelo e inserta un vehiculo
if (isset($_POST['insertar'])) {

    $carro->setModelo(    $_POST['modelo'] );
    $carro->setMarca(     $_POST['marca']);
    $carro->setFabricante($_POST['fabricante']);
    $carro->setColor(      $_POST['color']);
    
    //echo "<p>Entro a insertar</p>";

    //llama a la función insertar definida en el modelo
    $carro->salvar();
    
    header('Location: index.php');
}

// si el elemento insertar no viene nulo llama al modelo e inserta un vehiculo
if (isset($_POST['buscar'])) {

    //echo "<p>Entro a insertar</p>";

    $carro->setModelo(    $_POST['modelo'] );

    $carro->setMarca(     $_POST['marca']);

    $carro->setFabricante($_POST['fabricante']);

    $carro->setColor(      $_POST['color']);
        
    //llama a la función buscar definida en el modelo
    $carro->salvar();
    header('Location: index.php');
}

// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
if("a" == ($_GET['accion'])){
    //echo "<p>Entro a Actualizar</p>";

    $carro             = new Carro();

    //echo $_GET['id'];

    $mycarro = $carro->buscarID($_GET['id']); 

    if(isset($_POST['actualizar'])){
        echo "<p>cliqueaste actualizar</p>";
        $mycarro->setModelo($_POST['modelo'] );
        $mycarro->setMarca($_POST['marca']);
        $mycarro->setFabricante($_POST['fabricante']);
        $mycarro->setColor($_POST['color']);
        $mycarro->editar($_GET['id']);
    }    
}

// si la variable accion enviada por GET es == 'e' llama al modelo y elimina un vehiculo
if ("e" == ($_GET['accion'])) {
    echo "<p>Entro a eliminar</p>";
    $carro = new Carro();
    $carro->eliminar($_GET['id']);
}

?>