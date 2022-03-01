<?php
//Genera la conexion
class Conexion{    
    /**
     * getConexion crea la conexion con la bd
     *
     * @param  mixed $host
     * @param  mixed $dbname
     * @param  mixed $usuario
     * @param  mixed $contrase
     * @return void
     */
    public static function getConexion($host,$dbname,$usuario,$contraseña){
        try{
            $DB_INFO="mysql:host=localhost;dbname=franciscojaviero_logrocho;charset=utf8mb4;";
        //$DB_INFO = 'mysql:host='.$host.';dbname='.$dbname;
        return new PDO($DB_INFO, $usuario,  $contraseña);
       // return new \PDO($DB_INFO, $usuario, $contraseña);
        }catch(\PDOException $e){
            echo "error pdo";
        }
    }
}
