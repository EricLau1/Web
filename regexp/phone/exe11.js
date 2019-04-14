var regExp = /\(\d{2}\)\s\d{4,5}-?\d{4}/g;
// O parenteses envolve uma expressão juntamente com o caratere '+' que indica que esta expressão pode ser repetida
// '\s' representa define que é obrigatório um caractere de espaço em branco
// '\d' representa o conjunto de [0-9]

var phone = "<table><tr><td>(84) 25445-4569</td><td>(84) 254454569</td><td>(84) 2544-4569</td></tr></table>"

// por causa do caractere 'g' no Regexp, o método [replace] irá substituir todas as strings que 
// atendem ao formato da expressão regular.
console.log(phone.replace(regExp, 'phone'));

