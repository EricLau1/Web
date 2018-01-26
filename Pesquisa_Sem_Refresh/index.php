<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesquisa sem Refresh</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="jumbotron" style="background: #fff;">
            <h1 style="text-align:center;">Pesquisa sem refresh na página</h1>
        </div>
        
        <form class="form-horizontal">

            <div class="form-group">
                <label for="pesquisa" class="col-sm-2 control-label">Pesquisar</label>
                <div class="col-sm-8">
                    <input type="text" minlength="1" maxlength="35" class="form-control" id="pesquisa" placeholder="Pesquisar por..">
                </div>
           
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <span class="glyphicon btn btn-default" style="float: right;" id="buscar">&#xe003;</span>    
                </div>
            </div>
        
        </form>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                
                <div id="dados">
                
                </div>
            
            </div> <!-- end div class col-md-12 -->
        
        </div> <!-- end div class row -->
    </div> <!-- end div class container -->

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery/jquery.js"></script>
<script src="script.js"></script>    
</body>
</html>