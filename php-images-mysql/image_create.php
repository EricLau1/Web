<?php

var_dump($_POST);

if(isEmpty($_POST) or empty($_POST)) {
    //header("location: /");
}

require "";

$imagem = addslashes($_FILES['imagem']['tmp_name']);
$name = addslashes($_FILES['imagem']['name']);
$imagem = file_get_contents($imagem);
$imagem = base64_encode($imagem);


$gravado = Database::save($name, $imagem);

if($gravado) {
    
    echo "<small> upload success!</small>";

} else {
    echo "<small> upload failed!</small>";
}

function isEmpty($arr) {

    foreach($arr as $field => $value) {

        if(empty($value)) {
            return true;
        }

    }
    return false;
}
