<?php
//Criando um cookie
//Primeiro parâmetro: Nome do cookie / Segundo parâmetro: valor do cookie / Terceiro parâmetro: Validade do cookie(tempo em segundos)
setcookie('user', 'Ricardo', time() + 3600);
setcookie('email', 'ricardo@gmail.com', time() + 3600);
setcookie('ultima_pesquisa', 'tenis adidas', time() + 3600); //Para apagar o cookie, trocar o sinal de + por -

// Para acessar o valor dos cookies, usar variável global $_COOKIE[];