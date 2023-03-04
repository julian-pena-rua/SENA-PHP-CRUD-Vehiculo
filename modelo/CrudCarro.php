<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';

class CrudCarro
{
    //Variables o atributos    
    
    function __construct(){
        
    }
    
    public function salvar($carro){
        try {
            $sql = "INSERT INTO carro (marca, modelo, color, fabricante)
            VALUES ('{$carro->marca} ', '{$carro->modelo}', '{$carro->color}', '{$carro->fabricante}')";
            // usa exec() porque no retorna resultados
            //require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "Nuevo registro creado satisfactoriamente";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
        $conexion->Cerrar();
    }
    
    public function getTodo(){
        $carros = [];
        try {
            // prepara la consulta
            //require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $stmt                  = $conexion->conn->prepare("SELECT id, marca, modelo, color, fabricante FROM carro");
            // ejecuta la consulta
            $stmt->execute();
            
            // configura el arreglo resultante en asociativo
            $result                = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($fila = $stmt->fetchAll()) {
                //print_r($row). "<br>";
                array_push($carros, $fila);
                //print_r($pila);
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conexion->Cerrar();
        return $carros;

    }

    public function buscarID($id){
        try {
            // prepara la consulta
            //require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
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
            echo "Error: " . $e->getMessage();
        }
        $conexion->Cerrar();

    }

    
    public function eliminar($id){
        try {
            $sql = "DELETE FROM carro WHERE id = {$id} ";
            
            //require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "Registro eliminado satisfactoriamente";

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
        $conexion->Cerrar();
    }
    
    public function editar($id){
        try {
            $sql = "UPDATE carro set marca = '{$this->marca} ', modelo = '{$this->modelo}', color = '{$this->color}', fabricante = '{$this->fabricante}' where id = '{$id}' ";
            
            //require_once $_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/controlador/Conexion.php';
            $conexion              = new conexion();
            $conexion->conn->exec($sql);
            echo "Registro editado satisfactoriamente";

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        
        $conexion->Cerrar();
    }
}

$carro                 = new carro();
// $carro->marca          = "Julian";
// $carro->modelo         = "JAP1991";
// $carro->color          = "castaño";
// $carro->fabricante     = "Adriana";
// $carro->salvar();
// $carro->getTodo();
// var_dump($carro->buscarID(30));
//var_dump($carro);
//echo ($carro->editar(30));
//$carro->eliminar(30);

?>
