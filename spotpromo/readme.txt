Segue junto ao código o script.sql para criar a base e as tabelas.

Favor copiar a pasta spotpromo dentro de um servidor apache, fizemos aqui o desenvolvimento com o WAMPSERVER64.

Para a página rodar é necessário alterar as configurações de conexão em \class\db.php dentro da função connection(), 
com o usuário e a senha de sua base local de teste;

Fiz aqui de teste no localhost, com o usuário root e sem senha.

Não fiz uso de composer, nem para o autoload, mas fiz uso do jquery apenas para um efeito melhor, para não haver reload 
por exemplo, fica algo mais realístico, também não fiz todas as validações, nem é a melhor solução, mas foi a mais rápida.

Fiz algumas classes e incluí em um namespace, ahh e uma trait, só pra variar, usei ela para as classes que vão herdar o DB.

Espero que esteja a contento.

Desde já agradeço a oportunidade e espero que trabalhemos juntos.