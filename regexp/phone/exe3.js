// é necessário a contra-barra para caracteres especiais como parenteses
var regExp = /^\(48\) 9999-9999/;
// o caractere '^' sinaliza que a string deve começar com o parenteses. Ou o primeiro caractere do regex que foi definido. 
var phone = 'Telefone: (48) 9999-9999';
var phone2 = '(48) 9999-9999 ~ Jane Doe';


/* busca pelo padrão solicitado dentro da string independente se houver caracteres a mais */
console.log(regExp.exec(phone)); // null
console.log(regExp.test(phone)); // false

// ignora os caracteres após o formato definido no regex.
console.log(regExp.test(phone2)); // true