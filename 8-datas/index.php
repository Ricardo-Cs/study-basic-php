<?php
//Datas
//Documentação: https://www.php.net/manual/pt_BR/function.date.php
//Parâmetros: https://www.php.net/manual/pt_BR/datetime.format.php

//Timezone padrão
date_default_timezone_set('America/Sao_Paulo');

echo date('d/m/Y H:i:s');
echo "<hr>";

//Inserção no banco de dados
$date = date('Y-m-d'); //Para colunas do tipo DATE
$datetime = date('Y-m-d H:i:s'); //Para colunas do tipo DATE TIME

//MKTIME: para horários futuros
$data_pagamento = mktime(15, 30, 00, 02, 15, 2023); //Ordem dos parâmetros: hora, minutos, segundos, mês, dia, ano.
//Formatando esse valor
echo date('d/m/Y - H:i', $data_pagamento);
echo "<hr>";

//STRTOTIME: formata horários que estejam como strings
$data_string = '2019-04-10 13:30:00';
$data_string = strtotime($data_string);
echo date('d/m/Y', $data_string);
