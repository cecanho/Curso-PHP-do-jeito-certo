<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 18/01/2020
 * Time: 14:55
 */
require_once '../model/Usuario.php';
session_start();

if (  $_POST['opt'] == 1 ) {

//tratamento dos dados via formulário
    $login = addslashes($_POST['email']);
    $password = md5(addslashes($_POST['password']));

//validar usuário
    $usuario = new Usuario();
    $usuario->conn();

    $usuario->getOneUser($login);
    $nome = $usuario->getNome();
    $last_access = $usuario->getLastAccess();

    if (isset($usuario)) {
        if (strcmp($usuario->getPassword(), $password) == 0) {
            $_SESSION["login"] = $usuario->getLogin();
            $_SESSION["nome"] = $usuario->getNome();
            $_SESSION["last_access"] = $usuario->getLastAccess();
            header('location:../view/profile.php');
        } else {
            header('location:../view/error.php');
        }
    }
}

if (  $_POST['opt'] == 2 ) {
    //prepara o objeto para atualizar
    $usuario = new Usuario();
    $usuario->conn();
    $usuario->setLogin($_SESSION["login"]);
    $usuario->setPassword($_POST['password']);
    $usuario->setNome(addslashes($_POST['nome']));

    //atualiza banco
    $usuario->updateUser($usuario);

    //atualiza session
    $_SESSION["login"] = $usuario->getLogin();
    $_SESSION["nome"] = $usuario->getNome();
    $_SESSION["last_access"] = $usuario->getLastAccess();

    header('location:../view/profile.php');
}




