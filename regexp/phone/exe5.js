var regExp = /^\([0-9][0-9]\) [0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/;
// [0-9] representa que nessa posição será validado qualquer caractere de 0 à 9.
var phone = '(45) 7758-4521';

/* busca pelo padrão solicitado */
console.log(regExp.exec(phone));
console.log(regExp.test(phone)); // true