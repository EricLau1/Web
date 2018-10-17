<?php

class Database {


    public static function connect() {

        $host = "localhost";
        $dbname = "test";
        $user = "root";
        $password = "";


        $pdo = new PDO("mysql:host={$host};dbname=$dbname;charset=utf8", $user, $password);

        if(!$pdo) {
            throw new Exception("Connection failed.");
        }

        return $pdo;

    }

    public static function save($name, $imagem) {

        $pdo = self::connect();

        $sql = "insert into imagens (name, imagem) values (?, ?)";

        $rs = $pdo->prepare($sql);
        $rs->bindValue(1, $name);
        $rs->bindValue(2, $imagem);
        
        return $rs->execute();

    }

    public static function findAll() {

        $pdo = self::connect();

        $sql = "select * from imagens";

        $list = $pdo->prepare($sql);
        $list->execute();

        return $list->fetchAll();

    }
}