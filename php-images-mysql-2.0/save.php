<?php


session_start();

$message = "";

if ( getimagesize( $_FILES['imagem']['tmp_name'] ) == FALSE  ) {

	$message = "Selecione uma imagem";

} else {


    $imagem = addslashes($_FILES['imagem']['tmp_name']);
    $name = addslashes($_FILES['imagem']['name']);
    $imagem = file_get_contents($imagem);
    $imagem = base64_encode($imagem);


    require_once "database.php";

    if ( create($name, $imagem) ) {

    	$message = "imagem foi salva com sucesso!";
    
    } else {

    	$message = "Erro ao salvar imagem.";

    }

}

$_SESSION['message'] = $message;

header("location: index.php");