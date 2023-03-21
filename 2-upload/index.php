<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>

<body>
    <?php
        if(isset($_POST['enviar-form'])){
            $formatosPermitidos = array("png", "jpeg", "jpg", "gif", "txt");
            $extensao = pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION);

            if(in_array($extensao, $formatosPermitidos)){ // Verifica se o parâmetro 1 está no parâmetro 2 (array)
                $pasta = "files/";
                $temporario = $_FILES['arquivo']['tmp_name']; //Pega o caminho temporário do arquivo enviado (primeiro parametro)
                $newName = uniqid().".$extensao"; //uniqid() gera um id único.

                if(move_uploaded_file($temporario, $pasta.$newName)) //Move o arquivo enviado para o segundo parâmetro, nesse caso a pasta files, junto com o id e sua extensão
                   echo $mensagem = "Upload feito com sucesso";
                else 
                   echo $mensagem = "Upload não realizado";
            } 
                
            else
                echo $mensagem = "Formato Inválido!";
        }
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" é obrigatório ao enviar arquivos -->
    <input type="file" name="arquivo">
    <br><br>
    <input type="submit" value="Enviar" name="enviar-form">
    </form>
</body>
</html>