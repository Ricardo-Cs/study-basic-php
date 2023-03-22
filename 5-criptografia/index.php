<?php
// base64: Criptografia de mão dupla.
$senha = "123456";
$novasenha = base64_encode($senha);
echo "Sua senha é: " . base64_decode($novasenha) . "<br>";
echo "base64: " . $novasenha;
echo "<hr>";
//md5: Criptografia de mão única.
echo "Md5: " . md5($senha);
echo "<hr>";
//sha1: Criptografia de mão única.
echo "Sha1: " . sha1($senha);
echo "<hr>";
//Todas essas criptografias podem ser quebradas, por banco de dados que guardam várias senhas desse tipo e podem as comparar.

//Método mais seguro possível:
$senhasegura = password_hash($senha, PASSWORD_DEFAULT);
echo "password_hash(): " . $senhasegura;
//Para verificar o password hash:
$senha_db = '$2y$10$JJe0drZaJa3OzehDqS3uNO8xRe.Gk0fwL7tffJ1JwIHT6VIy2nb.u';
password_verify($senha, $senha_db); //$senha_db será a senha criptografada que pegaremos do banco de dados, assim basta fazer um if com esse password_verify.
