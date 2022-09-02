<?php
//conectar la base de datos con pdo

class Conexion{
    public static function conectar(){
        $pdo = new PDO('mysql:host=localhost;dbname=zapato; charset=utf8','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    


}   


?>


