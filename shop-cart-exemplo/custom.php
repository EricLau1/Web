<?php


function dd($dump) {

    var_dump($dump);
    die();

}

function toJson($data) {
    header('Content-type: application/json');
    return json_encode($data);
}

function unique($shopping_cart, $post) {

    foreach($shopping_cart as $cart) {

        if($cart['id'] == $post['id']) {
            return false;
        }

    }

    return true;
}
