<?php

$message = "";

if(getimagesize($_FILES['image']['tmp_name'])) {

    $image = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $image = file_get_contents($image);
    $image = base64_encode($image);

    require "database.php";

    if( create($name, $image) ) {
        $message = "Saved successfully!";
    } else {
        $message = "Failed save.";
    }
} else {
    $message = "Choose image";
}

session_start();

$_SESSION['message'] = $message;

header("location: /");