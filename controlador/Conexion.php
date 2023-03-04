<?php

class conexion{
    # Datos de conexión
    public $conn       = null;
    
    # proceso de conexión
    function __construct()
    {
        try {
            # Incluyo los datos necesarios
            $ini = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/php-vehiculo/config/Config.ini');

            $servername = $ini['db_server'];
            $username   = $ini['db_user'];
            $password   = $ini['db_password'];
            $dbname     = $ini['db_name'];

            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // configura el manejo de errores a excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Echo "<p>Conexión exitosa.</p>";
            return $this->conn;
        } 
        catch(PDOException $e) {
            echo "<p>Conexión fallida: " . $e->getMessage()."</p>";
        }
    }
    
    function Cerrar(){
        $this->conn = null;
        //echo "<p>Conexion cerrada</p>";
    }
    
}

//$con = new conexion();
//$con->Cerrar();

?>