<?php
class Config
{
    public $tipo;
    public $host;
    public $dbname;
    public $user;
    public $pw;
    public $opciones;

    //NOTA: la funcion rowCount() no funciona en servidores SQLSERVER

    public function __construct()
    {
        $this->tipo = "mysql";
        $this->host = "localhost";
//        $this->dbname = "saporitiweb";
//        $this->user = "root";
//        $this->pw = "";
        
//        $this->host = "database.000webhost.com";
        $this->dbname = "id10739155_saporitiweb";
        $this->user = "id10739155_admin";
        $this->pw = "deamon";
        $this->opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    }
}
?>