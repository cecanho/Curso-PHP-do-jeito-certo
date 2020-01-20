<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 18/01/2020
 * Time: 14:58
 */
require 'header.php';
require 'footer.php';
require '../model/Usuario.php';
session_start();

$usuario = new Usuario();
$usuario->conn();
$usuario->getOneUser($_SESSION['login']);
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

<div class="container" style="margin-top: 25px; margin-bottom: 25px">
    <div class="row">
        <img src="../logo.PNG" alt="PHP do Jeito Certo!" class="rounded mx-auto d-block">
    </div>
</div>

<div class="container col-sm-4" style="margin-top: 25px; margin-bottom: 25px">
    <form method="post" action="../controller/loggout.php">
        <h1 class="h3 mb-3 font-weight-normal">Olá, <?php echo $_SESSION["nome"]; ?>.</h1>
        <button class="btn btn-sm btn-primary btn-block" type="submit" style="width: 50px;">Sair</button>
    </form>

    <form class="form-signin" method="post" action="../controller/usuarioController.php">

        <label>Endereço de Email</label>
        <input type="email" id="inputEmail" class="form-control" value='<?php echo $_SESSION["login"]; ?>' required autofocus><br />
        <label>Nome Completo</label>
        <input type="nome" id="nome" name="nome" class="form-control" value='<?php echo $_SESSION["nome"]; ?>' required><br />
        <label>Último acesso: </label> <?php echo $_SESSION["last_access"]; ?><br />
        <label>Senha</label>
        <input type="password" id="password" name="password" class="form-control" value='<?php echo $usuario->getPassword(); ?>' required><br />
        <input type="hidden" name="opt" value="2">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Atualizar Dados</button><br />
    </form>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
echo $footer;
?>

</body>
</html>

