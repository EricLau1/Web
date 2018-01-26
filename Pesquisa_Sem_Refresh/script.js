function Pesquisar(pesquisa){
    var page = "pesquisa.php";

    $.ajax
         ({
             type: 'POST',
             dataType: 'html',
             url: page,
             beforeSend: function () {
                 $("#dados").html("Carregando...");
             },
             data: { pesquisa: pesquisa }, 
             success: function (msg) {
                 $("#dados").html(msg);
             }
         });
}

// realiza a pesquisa ao clicar no botão
$('#buscar').click( function() {
    Pesquisar($("#pesquisa").val());
});

// realiza a pesquisa  ao digitar no campo de pesquisa
$('#pesquisa').keyup( function() {
    if($("#pesquisa").val() != ""){
        Pesquisar($("#pesquisa").val());
    }else {
        document.getElementById("dados").innerHTML = "";
    }
});