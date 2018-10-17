<?php

  require "Database.php";

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>PHP MySQL Imagens</title>
  </head>
  <body>

    <div class="container">
    
        <form method="POST" enctype="multipart/form-data" >
            <div class="form-group">
            
                <input type="file" name="imagem" id="imagem" >

            </div>
        
            <input type="submit" name="submit" class="btn btn-outline-primary" value="Upload" />
        
        </form>

        <?php

              if(isset($_POST['submit'])) {

                var_dump( getimagesize( $_FILES['imagem']['tmp_name'] ));
                  if ( getimagesize( $_FILES['imagem']['tmp_name'] ) == FALSE ) {

                    echo "Selecione uma imagem.";
  
                  } else {
  
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

                  }


              }

        ?>

         <hr />
        
        <?php
            $imagens = Database::findAll();
            foreach($imagens as $img) {

              echo "<img src='data:image;base64,{$img['imagem']}' />";

            } 
        ?>
      
    </div>

  </body>
</html>