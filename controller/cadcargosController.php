<?php 

session_start();

require_once '../model/autoload.php';

$nome = $_POST['cargo'];

$cargo = new Cargos();

$cargo->descricao = $nome;

$cargo->cadastrarCargo();
header("Location: ../view/list-cargos.php");



 ?>