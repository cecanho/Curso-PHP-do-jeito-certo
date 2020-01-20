<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 11/01/2020
 * Time: 07:28
 */

//conexão com o banco de dados
require 'rb-mysql.php';
R::setup( 'mysql:host=localhost;dbname=phpdojeitocerto', 'root', '' );

//inserir no banco
$automovel = R::dispense( 'automovel' );

//prpearando o bean
$automovel->marca = 'Citroën';
$automovel->modelo = 'C4';

//grava no bd
$id = R::store( $automovel );

//recuperar informação
$result = R::getAll( 'SELECT * FROM automovel' );

foreach($result as $row){
    echo '<p>' . $row['id'] . ' ' . $row['marca'] . ' ' . $row['modelo'] . '.</p>';
}