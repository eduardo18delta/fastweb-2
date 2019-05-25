<?php 

session_start();

require_once '../model/autoload.php';

$cliente_fk = $_GET['cliente_fk'];
$nome = $_GET['nome'];

$endereco = new Listadecompras();

$endereco->cliente_fk = $cliente_fk;
$endereco->nome = $nome;


$endereco->cadastrarListadecompras();
header("Location: ../view/list-listadecomprasView.php");



