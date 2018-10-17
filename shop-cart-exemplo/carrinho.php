<?php

require("custom.php");

session_start();

if(isset($_SESSION['carrinho'])) {

    $count = count($_SESSION['carrinho']);

    // verifica se o produto está adicionado

    $lst = (array) $_SESSION['carrinho'];

    // se um item com um mesmo id for encontrado na lista retorna false, senão retorna true
    $duplicate = !unique($lst, $_POST);

    if(!$duplicate) {

        $_SESSION['carrinho'][$count] = $_POST;

    }

} else {

    $_SESSION['carrinho'][0] = $_POST;

    $duplicate = false;

}

$lst = array();

$table = "<table class='table table-borderless'>";

$table .= "<th>Descrição</th>";
$table .= "<th>Valor unit</th>";
$table .= "<th>Quantidade</th>";
$table .= "<th>Total item</th>";

$total = 0.0;

foreach($_SESSION['carrinho'] as $carrinho) {

    array_push($lst, $carrinho);

    $table .= "<tr>";

    $table .= "<td>". $carrinho['descricao'] . "</td>";
    $table .= "<td>$ ". $carrinho['preco'] . "</td>";
    $table .= "<td>". $carrinho['quantidade'] . "</td>";
    $table .= "<td>$ ". number_format($carrinho['quantidade'] * $carrinho['preco'], 2, ',', '.') . "</td>";

    $id = $carrinho['id'];
    $table .= "<td><button onclick='ajaxRemoveItem($id);' class='btn btn-danger'> remover </button></td>";

    $table .= "</tr>";

    $total += ($carrinho['preco'] * $carrinho['quantidade']);

}

$table .= "<tr>";
$table .= "<td class='text-right'> Total </td>";
$table .= "<td>$ ". number_format($total, 2, ',', '.') ." </td>";
$table .= "</tr>";

$table .= "</table>"; 

// converte para json a lista de objetos e um componente HTML (Tabela)
echo json_encode([
    "compras" => $lst,
    "html" => $table,
    "duplicate" => $duplicate
]);




