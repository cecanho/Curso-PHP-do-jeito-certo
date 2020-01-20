<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 18/01/2020
 * Time: 14:58
 */

require 'header.php';
require 'footer.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Projeto: PHP do Jeito Certo!</title>
</head>
<body class="text-center">

<?php
echo $header;
?>

<div class="container">
    <h1><?php
        echo 'Email ou senha inválido';
    ?></h1>
    <form action="../">
        <input type="submit" class="btn btn-warning" value="Voltar">
    </form>
</div>

<?php
echo $footer;
?>

</body>
</html>
