<?php
namespace App\Models;
require "../core/Model.php";
use Core\Model;
use PDO;

class Beer extends Model{
    
    // return todos los rqguistros de la tabla 
    public static function all(){
        $dbh = Beer::db();
        $sql = "SELECT * FROM cervezas";
        $statement = $dbh->query($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS,Beer::class);
        $cervezas = $statement->fetchAll(PDO::FETCH_CLASS);
        return $cervezas;
    }

    //devolver un usuario en particular por id
    public static function find($id){
        $dbh = self::db();
        $sql = "SELECT * FROM cervezas WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,BEER::class);
        $beer = $statement->fetch(PDO::FETCH_CLASS);
        return $beer;
    }
    //insertar
    public function insert(){ // id nombre, tipo, graduacion_alcoholica, pais, precio, ruta_imagen
        $dbh = self::db();
        $sql = "INSERT INTO cervezas(nombre,tipo,graduacion_alcoholica,pais,precio,ruta_imagen) VALUES (:nombre,:tipo,:graduacion_alcoholica,:pais,:precio,:ruta_imagen)";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":nombre",$this->nombre);
        $statement->bindValue(":tipo",$this->tipo);
        $statement->bindValue(":graduacion_alcoholica",$this->graduacion_alcoholica);
        $statement->bindValue(":pais",$this->pais);
        $statement->bindValue(":precio",$this->precio);
        $statement->bindValue(":ruta_imagen",$this->ruta_imagen);
        return $statement->execute();
    }
    //guardar
    public function save(){
        $dbh = self::db();
        $sql = "UPDATE cervezas 
        SET nombre = :nombre,tipo = :tipo,graduacion_alcoholica = :graduacion_alcoholica,pais = :pais, precio = :precio,ruta_imagen = :ruta_imagen
        WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id",$this->id);
        $statement->bindValue(":nombre",$this->nombre);
        $statement->bindValue(":tipo",$this->tipo);
        $statement->bindValue(":graduacion_alcoholica",$this->graduacion_alcoholica);
        $statement->bindValue(":pais",$this->pais);
        $statement->bindValue(":precio",$this->precio);
        $statement->bindValue(":ruta_imagen",$this->ruta_imagen);
        return $statement->execute();
    }
    //borrar
    public function delete() {
        $dbh = self::db();
        $sql = "DELETE FROM cervezas WHERE id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindValue(":id", $this->id);
        return $statement->execute();
    }

}