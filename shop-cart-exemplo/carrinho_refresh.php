<?php

session_start();

if(isset($_SESSION['carrinho'])) {


    $lst = (array) $_SESSION['carrinho'];

    if(empty($lst)) {
        $table = "<p class='alert alert-info'> carrinho de compras vazio. </p>";
       } else { 
       
       $table = "<table class='table table-borderless'>";
       
       $table .= "<th>Descrição</th>";
       $table .= "<th>Valor unit</th>";
       $table .= "<th>Quantidade</th>";
       $table .= "<th>Total item</th>";
       
       $total = 0.0;
       
       $lst = array();
       
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
       
    }
} else {

    $lst = [];
    $table = "<p class='alert alert-info'> carrinho de compras vazio. </p>";
    
}

// converte para json a lista de objetos e um componente HTML (Tabela)
echo json_encode([
    "compras" => $lst,
    "html" => $table
]);