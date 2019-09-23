<?php
    class Conexion
    {
        //private static $conn = NULL;
        private function __construct()
        {
        }

        public static function conectar(){
            /*
            if(!self::$conn)
            {
                $conexion = new Config();
                self::$conn = new PDO("$conexion->tipo:host=$conexion->host;dbname=$conexion->dbname",$conexion->user,$conexion->pw,$conexion->opciones);
            }
            return self::$conn;
            */

            try{
                $conexion = new Config();
                $pdo = new PDO("$conexion->tipo:host=$conexion->host;dbname=$conexion->dbname",$conexion->user,$conexion->pw,$conexion->opciones);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }catch(PDOException $e)
            {
                //Se podria hacer, en vez de esto, un loG informando: usuario, fecha, hora y archivo disparador del error (con el error) ponele...
                $e->getMessage();
            }
        }
    }
?>

