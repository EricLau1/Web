var regExp = /9999-9999/;
var phone = '9999-9999';

/* busca pelo padrão solicitado */
console.log(regExp.exec(phone));
console.log(regExp.test(phone)); // true