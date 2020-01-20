<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 05/01/2020
 * Time: 12:56
 */

$usuario = 'root';
$senha = '';

// Diz para o PHP que estamos usando strings UTF-8 até o final do script
mb_internal_encoding('UTF-8');

// Diz para o PHP que nós vamos enviar uma saída UTF-8 para o navegador
mb_http_output('UTF-8');

$link = new PDO(
    'mysql:host=localhost;dbname=phpdojeitocerto;charset=utf8mb4',
    $usuario,
    $senha,
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false
    )
);


// Armazena a nossa string transformada como UTF-8 em nosso banco de dados
// Seu DB e tabelas estão com character set e collation utf8mb4, certo?
$handle = $link->prepare('INSERT INTO automovel (marca, modelo) VALUES (?, ?)');
$handle->bindValue(1, 'FIAT');
$handle->bindValue(2, 'UNO');
$handle->execute();

// Recuperar a string que armazenamos apenas para provar se foi armazenada corretamente
$handle = $link->prepare('SELECT * FROM automovel');
//$handle->bindValue(1, 1, PDO::PARAM_INT);
$handle->execute();

// Armazena o resultado em um objeto que vamos saída mais tarde em nossa HTML
$result = $handle->fetchAll(PDO::FETCH_OBJ);

header('Content-Type: text/html; charset=UTF-8');
?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Página de teste de UTF-8</title>
</head>
<body>
<?php
foreach($result as $row){
    echo $row->marca . "\t" . $row->modelo . "\t";
}
?>
</body>
</html>