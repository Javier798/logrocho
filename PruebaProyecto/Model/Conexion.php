<?php
//Genera la conexion
class Conexion{
    public static function getConexion($host,$dbname,$usuario,$contrasenia){
        try{
            $DB_INFO="mysql:host=localhost;dbname=franciscojaviero_logrocho;charset=utf8mb4;";
        //$DB_INFO = 'mysql:host='.$host.';dbname='.$dbname;
        return new PDO($DB_INFO, $usuario,  $contrasenia);
       // return new \PDO($DB_INFO, $usuario, $contrasenia);
        }catch(\PDOException $e){
            echo "error pdo";
        }
    }
}
