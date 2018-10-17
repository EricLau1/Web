<?php

function connect() {
    return new PDO('mysql:host=localhost;dbname=shopcart;charset=utf8', "root", "@root");
}


function getAll($table) {

    $sql = "select * from {$table}";

    $pdo = connect();

    $lst = $pdo->prepare($sql);

    $lst->execute();

    return $lst->fetchAll();

}