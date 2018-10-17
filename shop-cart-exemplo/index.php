<?php


    require('custom.php');
    require('database.php');

    $produtos = getAll('produtos');

    session_start();
    
    if(isset($_SESSION['carrinho'])) {

        //echo toJson($_SESSION['carrinho']);

        //die();
    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>ShopCart | Bootstrap | Ajax</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>

    <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>

                <span class="navbar-text">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-light" data-toggle="modal" 
                        data-target=".bd-example-modal-lg" onclick="ajaxCarrinhoRefresh();">
                        <i class="fas fa-shopping-cart"> </i>
                        Compras 
                        <span class="badge badge-danger badge-pill" id="num-compras">
                            <!-- Quantidade de itens no carrinho -->
                            0
                        </span>
                    </button>

                </span>

            </div> <!-- end div collapse -->
        </nav> <!-- end navbar -->


        <hr />

        <div class="row">

            <?php foreach($produtos as $produto): ?>

            <div class="col-md-4">


                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/<?= $produto['imagem'] ?>" alt="Card image cap">
                    
                    <form action="" method="POST" class="card-body">

                        <h5 class="card-title"><?= $produto['descricao'] ?></h5>
                        <p class="card-text">
                            $ <?= $produto['preco'] ?>
                        </p>

                        <input type="hidden" name="id" value="<?= $produto['id'] ?>" />
                        <input type="hidden" name="descricao" value="<?= $produto['descricao'] ?>" /> 
                        <input type="hidden" name="preco" value="<?= $produto['preco'] ?>" />

                        <div class="form-group">

                            <input type="number" name="quantidade" class='form-control'
                                min="1"
                                value="1"  
                            />
        
                        </div>

                        <button type="button" class="btn btn-success block add-cart"
                            onclick="onSubmit(this.form);" >
                            Add to Cart
                        </button>

                    </form>

                </div>
            </div>

            <?php endforeach; ?>

        </div> <!-- end row -->


        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Carrinho de Compras</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> <!-- end modal header -->

                    <div class="modal-body" id="carrinho-compras">

    
                    </div> <!-- end modal body -->
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                        <a href="carrinho_remove_all.php" class="btn btn-warning"> Limpar</a>
                    </div> <!-- end modal footer -->

                </div><!-- end modal content -->
            </div> <!-- end modal dialog -->
        </div> <!-- end modal -->

    </div> <!-- end container -->



    <!-- Optional JavaScript -->
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.js"></script>
    <script>


        function onSubmit(form) {

            var item = {
                "id"        : form.elements['id'].value,
                "descricao" : form.elements['descricao'].value,
                "preco"     : form.elements['preco'].value,
                "quantidade": form.elements['quantidade'].value
            };

            ajaxRequest(item);

        }

        function ajaxRequest(item) {

            var page = 'carrinho.php';

            $.ajax({

                type: 'POST',
                dataType: 'html',
                url: page,
                beforeSend: function () {
                    
                    // modal-body
                    $('#carrinho-compras').html('carregando...');

                    //$('#num-compras').html('.');

                },
                data: {
                    id        : item.id,
                    descricao : item.descricao,
                    preco     : item.preco,
                    quantidade: item.quantidade
                },
                success: function (resposta) {

                    //$('#carrinho-compras').html(resposta);

                    // convertendo para json
                    var json = JSON.parse(resposta);

                    console.log(json);

                    // mostrando a penas a lista de objetos
                    //console.log(json.compras);
                    
                    // mostrando o parametro que guarda o componente html gerado
                    // console.log(json.html);

                    // array de objetos
                    var compras = json.compras;
                    var count = compras.length;
                    var duplicado = json.duplicate;
                    
                    //console.log("Qtde. Itens: ", count);
                    //acessando os atributos da lista de objetos
                    //compras.forEach( compras => console.log(compras.descricao) );

                    if(duplicado) {
                        
                        alert('Produto ja foi adicionado.');

                    } else {

                        alert('Produto adicionado ao carrinho de compras!');

                    }


                    $('#num-compras').html(count);
                    $('#carrinho-compras').html(json.html);

                }


            });

        }

        function ajaxLoad() {

        }

        function ajaxRemoveItem(id) {

            const page = "carrinho_remove_item.php";

            $.ajax({
                type:'POST',
                dataType: 'html',
                url: page,
                data: {id : id},
                success: function (resposta) {

                    // convertendo para json
                    var json = JSON.parse(resposta);

                    console.log(json);

                    // mostrando a penas a lista de objetos
                    //console.log(json.compras);

                    // mostrando o parametro que guarda o componente html gerado
                    // console.log(json.html);

                    // array de objetos
                    var compras = json.compras;
                    var count = compras.length;
                    //console.log("Qtde. Itens: ", count);
                    //acessando os atributos da lista de objetos
                    //compras.forEach( compras => console.log(compras.descricao) );


                    $('#num-compras').html(count);
                    $('#carrinho-compras').html(json.html);

                }

            });
        }

        function ajaxCarrinhoRefresh() {
            
            const page = "carrinho_refresh.php";

            $.ajax({
                type:'POST',
                dataType: 'html',
                url: page,
                data: { refresh : "carregando-compras" },
                success: function (resposta) {

                    // convertendo para json
                    var json = JSON.parse(resposta);

                    console.log(json);

                    // mostrando a penas a lista de objetos
                    //console.log(json.compras);

                    // mostrando o parametro que guarda o componente html gerado
                    // console.log(json.html);

                    // array de objetos
                    var compras = json.compras;
                    var count = compras.length;
                    //console.log("Qtde. Itens: ", count);
                    //acessando os atributos da lista de objetos
                    //compras.forEach( compras => console.log(compras.descricao) );


                    $('#num-compras').html(count);
                    $('#carrinho-compras').html(json.html);

                }

            });        
        }

        window.onload = function() {
            ajaxCarrinhoRefresh();
        }

    </script>   
    
</body>
</html>






