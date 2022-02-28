<?php
//Genera la conexion
class Conexion{
    public static function getConexion($host,$dbname,$usuario,$contraseña){
        try{
        $DB_INFO = 'mysql:host='.$host.';dbname='.$dbname;
        return new \PDO($DB_INFO, $usuario, $contraseña);
        }catch(\PDOException $e){
            echo "error pdo";
        }
    }
}
