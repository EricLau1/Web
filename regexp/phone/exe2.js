// é necessário a contra-barra para caracteres especiais como parenteses
var regExp = /\(48\) 9999-9999/; 
var phone = 'Telefone: (48) 9999-9999';


/* busca pelo padrão solicitado dentro da string independente se houver caracteres a mais */
console.log(regExp.exec(phone));
console.log(regExp.test(phone));