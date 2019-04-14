var regExp = /<table><tr>(<td>\(\d{2}\)\s\d{4,5}-?\d{4}<\/td>)+<\/tr><\/table>/
// O parenteses envolve uma expressão juntamente com o caratere '+' que indica que esta expressão pode ser repetida
// '\s' representa define que é obrigatório um caractere de espaço em branco
// '\d' representa o conjunto de [0-9]
var phone = "<table><tr><td>(84) 25445-4569</td><td>(84) 254454569</td><td>(84) 2544-4569</td></tr></table>"

console.log(regExp.exec(phone));
console.log(regExp.test(phone));
