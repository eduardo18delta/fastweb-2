<?php 

session_start();

require_once '../model/autoload.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fornecedor = $_POST['fornecedor'];
$validade = $_POST['validade'];
$quantidade = $_POST['quantidade'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];


$produtos = new Produtos();

$produtos->nome = $nome;
$produtos->valor = $valor;
$produtos->fornecedor = $fornecedor;
$produtos->validade = $validade;
$produtos->quantidade = $quantidade;
$produtos->marca = $marca;
$produtos->categoria = $categoria;

$produtos->atualizar();
header("Location: ../view/list-produtos.php");



 ?>

