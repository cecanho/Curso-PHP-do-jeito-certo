<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 19/01/2020
 * Time: 06:44
 */
session_start();
require '../model/Usuario.php';

$usuario = new Usuario();
$usuario->conn();

$usuario->getOneUser($_SESSION['login']);

$usuario->updateUser($usuario);

session_destroy();
header('location:../');