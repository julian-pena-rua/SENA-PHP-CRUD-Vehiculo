<?php

class Carro
{
    //Variables o atributos
    var $marca;
    var $modelo;
    var $color;
    var $fabricante;
    
    
    function __construct(){
        
    }

    //Funciones o métodos
    function setMarca($miMarca){
        
        $this->marca           = $miMarca;
        
    }
    
    function getMarca(){
        
        return $this->marca;
        
    }
    
    function setModelo($miModelo){
        
        $this->modelo          = $miModelo;
        
    }
    
    function getModelo(){
        
        return $this->modelo;
        
    }
    
    function setColor($miColor){
        
        $this->color           = $miColor;
        
    }
    
    function getColor(){
        
        return $this->color;
        
    }
    
    function setFabricante($elfabricante){
        
        $this->fabricante      = $elfabricante;
        
    }
    
    function getPropietario(){
        
        return $this->fabricante;
        
    }
    
    public function salvar(){
        try {
            $sql = "INSERT INTO carro (marca, modelo, color, fabricante)
            VALUES ('{$this->marca} ', '{$this->modelo}', '{$this->color}', '{$this->fabricante}')";
            // usa exec() porque no retorna resultados
            require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "<p>Nuevo registro creado satisfactoriamente</p>";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
        $conexion->Cerrar();
    }
    
    public function getTodo(){
        $data = [];
        try {
            // prepara la consulta
            require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $stmt                  = $conexion->conn->prepare("SELECT id, marca, modelo, color, fabricante FROM carro");
            // ejecuta la consulta
            $stmt->execute();
            
            // configura el arreglo resultante en asociativo
            $result                = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row = $stmt->fetchAll()) {
                //print_r($row). "<br>";
                array_push($data, $row);
                //print_r($pila);
            }
        } catch(PDOException $e) {
            echo "<p>Error: " . $e->getMessage()."</p>";
        }
        $conexion->Cerrar();
        return $data;

    }

    public function buscarID($id){
        try {
            // prepara la consulta
            require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $stmt                  = $conexion->conn->prepare("SELECT id, marca, modelo, color, fabricante FROM carro where id = '{$id}' ");
            // ejecuta la consulta
            $stmt->execute();
            
            // configura el arreglo resultante en asociativo
            $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $carro=$stmt->fetch();
			$myCarro= new Carro();
			$myCarro->setModelo($carro['modelo']);
			$myCarro->setMarca($carro['marca']);
			$myCarro->setFabricante($carro['fabricante']);
			$myCarro->setColor($carro['color']);
			
            return $myCarro;

        } catch(PDOException $e) {
            echo "<p>Error: " . $e->getMessage()."</p>";
        }
        $conexion->Cerrar();

    }

    
    public function eliminar($id){
        try {
            $sql = "DELETE FROM carro WHERE id = {$id} ";
            
            require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "<p>Registro eliminado satisfactoriamente</p>";

        } catch(PDOException $e) {
            echo "<p>".$sql . "<br>" . $e->getMessage()."</p>";
        }
        
        $conexion->Cerrar();
    }
    
    public function editar($id){
        try {
            $sql = "UPDATE carro set marca = '{$this->marca} ', modelo = '{$this->modelo}', color = '{$this->color}', fabricante = '{$this->fabricante}' where id = '{$id}' ";
            
            require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "<p>Registro editado satisfactoriamente</p>";

        } catch(PDOException $e) {
            echo "<p>".$sql . "<br>" . $e->getMessage()."</p>";
        }
        
        $conexion->Cerrar();
    }
}

// Creamos un objeto de tipo carro
// $carro                 = new carro();
// $carro->marca          = "Julian";
// $carro->modelo         = "JAP1991";
// $carro->color          = "castaño";
// $carro->fabricante     = "SENA";
// lo guardamos en la base de datos
// $carro->salvar();               

// $carro->getTodo();              
// var_dump($carro->buscarID(30));
// var_dump($carro);
// echo ($carro->editar(30));
// $carro->eliminar(30);

?>


<script>
/*
class vehiculo{
    
    constructor(fabricante, color, pasajerosMax, velocidadMax, tanqueGasMax){
        
        // atributos generales
        this.encendido         = false;
        this.tanqueGas         = 0;
        this.pasajerosActuales = 0;
        this.posicionActual    = 0;
        
        // atributos según fabricante y modelo
        this.fabricante        = fabricante;
        this.color             = color;
        this.pasajerosMax      = pasajerosMax;
        this.velocidadMax      = velocidadMax;
        this.tanqueGasMax      = tanqueGasMax;
        
    }
    
    cambiarColor(colorNuevo){
        this.color             = colorNuevo;
    }
    
    encenderMotor(){ // método vacío porque no devuelve valor
        this.encendido         = true;
    }
    
    tanqueLleno(){ // método que retorna true o false
        return this.tanqueGas  = this.tanqueGasMax;
    }
    
    ponerGasolina(galones){ // método que recibe parámetros
        this.tanqueGas         = this.tanqueGas + galones;
    }
    
    conducir(velocidad, tiempo){ // método que recibe parámetros y retorna resultado
        distanciaConducida     = this.posicionActual + (velocidad * tiempo);
        return distanciaConducida; 
    }
    
    conducir2(distancia, velocidad){ // método que recibe parámetros y retorna resultado
        distanciaConducida     = this.posicionActual + (velocidad * (distancia/velocidad));
        return distanciaConducida; 
    }
    tanqueLleno(){
        if (this.tanqueGas == this.tanqueGasMax){
            return true;
        }     
    }
}

// clases hijas
class carro extends vehiculo{
    constructor(fabricante, color, velocidadMax, tanqueGasMax, tipo){
        super();
        this.fabricante        = fabricante;
        this.color             = color;
        this.velocidadMax      = velocidadMax;
        this.tanqueGasMax      = tanqueGasMax;
        this.tipo              = tipo;
        this.estadoManillar    = "Bueno";
        super.pasajerosMax     = 5;
    }
}

//ferrari              = new carro("Ferrari", "Verde", 360, 22.7, "convertible");
//document.writeln("<p>" + ferrari.fabricante + " " + ferrari.color + " " + ferrari.tanqueGasMax + " " + ferrari.tipo + "</p>");

class moto extends vehiculo{
    constructor(fabricante, color, velocidadMax, tanqueGasMax, estadoManillar){
        super();
        this.fabricante        = fabricante;
        this.color             = color;
        this.velocidadMax      = velocidadMax;
        this.tanqueGasMax      = tanqueGasMax;
        this.estadoManillar    = estadoManillar;
        this.pasajerosMax      = 2;
    }
}

//ducati               = new moto("Ducati", "Amarilla", 260, 3.7, "Malo");
//document.writeln("<p>" + ducati.fabricante + " " + ducati.color + " " + ducati.tanqueGasMax + " " + ducati.estadoManillar + "</p>");

*/
</script>


