<?php 

session_start();

require_once '../model/autoload.php';


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$genero = $_POST['genero'];
$senha = md5($_POST['senha']);
$senha2 = $_POST['senha2'];
$ofertas = $_POST['ofertas'];

$clientes = new Cliente();

$clientes->nome = $nome;
$clientes->email = $email;
$clientes->telefone = $telefone;
$clientes->genero = $genero;
$clientes->senha = $senha;
$clientes->ofertas = $ofertas;


$clientes->cadastrarCliente();
header("Location: ../view/login-site.php");



 ?>

