<!-- Validate Filters -->
<!-- Documentação dos filtros de validação: https://www.php.net/manual/pt_BR/filter.filters.validate.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar formulário</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="idade">Idade: </label>
        <input type="text" name="idade">
        <br><br>
        <label for="email">E-mail: </label>
        <input type="email" name="email">
        <br><br>
        <label for="peso">Peso: </label>
        <input type="text" name="peso">
        <br><br>
        <label for="ip">IP: </label>
        <input type="text" name="ip">
        <br><br>
        <label for="url">URL: </label>
        <input type="text" name="url">
        <br><br>

        <button type="submit" name="enviar-form">Enviar</button>
        <br><br>

            <!-- Validação do Formulário -->
    <?php
    if(isset($_POST['enviar-form'])) {
        $erros = array();

        if(!$idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT)) // Validação se idade é um número inteiro
            $erros[] = "Idade inválida!";

        if(!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) // Validação de email
            $erros[] = "E-mail inválido!";

        if(!$peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT)) // Validação se peso é um número float
            $erros[] = "Peso inválido!";

        if(!$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP)) // Validação de IP (IPv4 ou IPv6)
            $erros[] = "IP inválido!";

        if(!$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL)) // Validação de URL
            $erros[] = "URL inválida!";

        if(!empty($erros)){
            foreach($erros as $erro)
                echo "<li> $erro </li>";
        }else
            echo "Dados corretos!";
    }
    ?>
    </form>
</body>
</html>