
// função que inicia ao carregar a página
window.onload = function () {

	
    var btn_click = document.querySelector('#btn-click');

    var xhttp = new XMLHttpRequest();

    btn_click.onclick = function() {


        xhttp.onreadystatechange = function() {

            if(xhttp.readyState == 4 && xhttp.status == 200) {

                console.log(xhttp.responseText);

                var message = document.querySelector('#message');

                message.innerHTML = xhttp.responseText;

            }
        }



        xhttp.open('GET', 'message.php', true);
    
        xhttp.send();

    }

}