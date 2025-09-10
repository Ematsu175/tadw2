<?php
class Database{
    private static ?mysqli $instance = null;

    private function _construct(){}

    public static function getInstance(): mysqli {
        if(self::$instance == null){
            self::$instance = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if(self::$instance -> connect_errno){
                die("Error en la conexion" . self::$instance -> connect_error);
            }
            self::$instance -> set_charset("utf8mb4");
        }
        return self::$instance;
    }
}