REGEXP

Grupo de Caracteres:

    [abc]  => Aceita qualquer caractere dentro de um grupo, nesse caso a, b e c.
    
    [^abc] => Não aceita qualquer caractere dentro do grupo, nesse caso a, b ou c.

    [0-9]  => Aceita qualquer caractere entre 0 e 9.

    [^0-9] => Não aceita qualquer caractere entre 0 e 9.


Quantificadores:

    Os quantificadores podem ser aplicados a caracteres, grupos, conjuntos ou metacaracteres.

    {n}   => Quantifica um número específico.

    {n,}  => Quantifica um número mínimo.

    {n,m} => Quantifica um número mínimo e um número máximo.

    ?     => Podem haver caracteres na expressão ou não.

    *     => Repetição da expressão pode ser nenhuma ou varias.

    +     => Repetição da expressão deve ser uma ou varias.


Metacaracteres

    .   =>  Representa qualquer caractere

    \w  =>  Representa o conjunto [a-zA-Z0-9_]

    \W  =>  Representa o conjunto [^a-zA-Z0-9_]

    \d  =>  Representa o conjunto [0-9]

    \D  =>  Representa o conjunto [^0-9]

    \s  =>  Representa um espaço em branco

    \S  =>  Representa um não espaço em branco

    \n  =>  Representa uma quebra de linha

    \t  =>  Representa um tab


Javascript String Api com Regex:

    match       =>  Executa uma busca na String e retorna um array contendo os dados encontrados, ou null.

    split       =>  Divide a String com base em uma outra String fixa ou expressão regular.

    replace     =>  Substitui partes da String com base em uma String fixa ou expressão regular.

    
    Modificadores:

    i - Case-insensitive matching

    g - Global matching

    m - Multiline matching 


Referências: 

Video:

    https://www.youtube.com/watch?v=9r48XuOB4DA&list=PLQCmSnNFVYnT1-oeDOSBnt164802rkegc&index=10

Sites:

    https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide/Regular_Expressions

    https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Reference/Global_Objects/RegExp