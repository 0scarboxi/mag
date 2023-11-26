<?php
namespace Core;

require "../config/db.php";
use PDO;
use PDOException;

use const DSN;
use const USUARIO;
use const PASSWORD;

#[\AllowDynamicProperties]
class Model {
    static function db(){

        try{
            $dbh = new PDO(DSN, USUARIO, PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "<br>Conexion correcta!!<br>";
        }catch (PDOException $ex) {
            echo "Fallo en la conexion: " . $ex->getMenssage();
        }
        return $dbh;//devuelvo la conexion a la base de datos


    }// fin db
}//fin clase