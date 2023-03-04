<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/modelo/Carro.php';

class ControladorCarro
{
    
    var $carros;
    
    function __construct()
    {

        /*
        $this->carros = [
            1 => new Carro("Wolkswagen","Polo","negro","Rebeca"),
            2 => new Carro("Toyota","Corolla","verde","Marcos"),
            3 => new Carro("Skoda","Octavia","gris","Mario"),
            4 => new Carro("Kia","Niro","azul","Jairo")
        ];
        */
        $this->carros = new Carro();
        
    }
    
    public function listar(){
        
        //Asigno los coches a una variable que estará esperando la vista
        $rowset = $this->carros->getTodo();

        return $rowset;
        
    }
    
}

?>