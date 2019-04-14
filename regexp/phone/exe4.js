// é necessário a contra-barra para caracteres especiais como parenteses
var regExp = /^\(48\) 9999-9999$/;
// o caractere '^' sinaliza que a string deve começar com o parenteses. Ou o primeiro caractere do regex que foi definido. 
// o caractere '$' sinaliza que a string deve terminar com o 9. Ou o último caractere do regex que foi definido. 
var phone = 'Telefone: (48) 9999-9999';
var phone2 = '(48) 9999-9999 ~ Jane Doe';

console.log(regExp.exec(phone)); // null
console.log(regExp.test(phone)); // false
console.log(regExp.test(phone2)); // false