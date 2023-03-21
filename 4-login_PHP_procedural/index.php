<?php
//Chamando conexão
require_once 'db_connect.php';
//Criando sessão
session_start();
// Verificar se o botão enviar foi clicado (existe na variável global POST)
if (isset($_POST['btn-entrar'])) {
  $erros = array();
  $login = mysqli_escape_string($connect, $_POST['login']);
  $senha = mysqli_escape_string($connect, $_POST['senha']);

  if (empty($login) || empty($senha))
    $erros[] = "<li>Os campos devem ser preenchidos!</li>";
  else {
    $senha = md5($senha);
    $sql = "SELECT login FROM usuarios WHERE login = '$login'";
    $resultado = mysqli_query($connect, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
      $resultado = mysqli_query($connect, $sql);
      if (mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        mysqli_close($connect);
        $_SESSION['logado'] = true;
        $_SESSION['id_usuario'] = $dados['id'];
        header('Location: home.php');
      } else
        $erros[] = "<li>Usuário e senha não conferem</li>";
    } else
      $erros[] = "<li>Usuário inexistente</li>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Apenas algumas estilizações para ver o login melhor -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      padding: 10px;
    }

    input {
      display: block;
      margin-bottom: 14px;
      outline: none;
    }

    h1 {
      margin-bottom: 15px;
    }
  </style>
</head>

<body>
  <main>
    <h1>Login</h1>
    <?php
    if (!empty($erros)) {
      foreach ($erros as $erro) {
        echo $erro;
      }
    }
    ?>
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label for="login">Login: </label>
      <input type="text" name="login">
      <label for="senha">Senha: </label>
      <input type="password" name="senha">
      <button type="submit" name="btn-entrar">Entrar</button>
    </form>
  </main>
</body>

</html>