<?php

    function connect_database(){
        $URL = "mysql:localhost;dbname=test";
        $USER = "root";
        $PASS = "";
        try {
            $pdo = new PDO($URL, $USER, $PASS);
            $pdo->query("set names utf8");
           // echo "Banco conectado com sucesso!";
        } catch (PDOException $e) {
            echo "erro na conexão => ". $e->getMessage();
        }
        return $pdo;
    }

    //$pdo = connect_database();

?>