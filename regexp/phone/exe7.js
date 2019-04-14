var regExp = /^\([0-9]{2}\) [0-9]{4,5}-?[0-9]{4}$/;
// [0-9] representa que nessa posição será validado qualquer caractere de 0 à 9.
// {2} define que será aceito apenas 2 caracteres de 0 a 9.
// {4,5} define que será aceito apenas 4 ou 5 caracteres de 0 a 9.
//  ? define que o caractere '-' é opcional.
var phone = '(45) 57758-4521';
var phone2 = '(45) 47586593';

/* busca pelo padrão solicitado */
console.log(regExp.exec(phone));
console.log(regExp.test(phone)); // true
console.log(regExp.test(phone2)); // true