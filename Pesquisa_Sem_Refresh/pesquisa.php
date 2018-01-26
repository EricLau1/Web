<?php

    $pesquisa = $_POST['pesquisa'];

    require_once "conexao.php";

    $con = connect_database();
    $sql = "SELECT * FROM test.idiomas WHERE pais LIKE ? OR descricao LIKE ?";
    $rs = $con->prepare($sql);
    $rs->bindValue(1, "%". $pesquisa ."%");
    $rs->bindValue(2, "%". $pesquisa ."%");
    $rs->execute();

    if($rs->rowCount() != 0) {

        echo "<table class='table'>";
        echo "<th> ID </th>";
        echo "<th> País </th>";
        echo "<th> Idioma </th>";
        while($row = $rs->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>". $row['id'] ."</td>";
            echo "<td>". $row['pais'] ."</td>";
            echo "<td>". $row['descricao'] ."</td>";
            echo "</tr>";
        }
        echo "</table>";

    }
    else {
        echo "<span> nada encontrado... </span>";
    }

?>