<?php


function connect() {

	return new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");

}

function create($name, $imagem) {

	$pdo = connect();

	$sql = "insert into imagens (name, imagem) values (?, ?)";

	$saved = $pdo->prepare($sql);

	$saved->bindValue(1, $name);
	$saved->bindValue(2, $imagem);

	return $saved->execute();

}

function getAll() {

	$pdo = connect();

	$sql = "select * from imagens";

	$results = $pdo->prepare($sql);

	$results->execute();

	return $results->fetchAll();

}