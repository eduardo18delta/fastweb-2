<?php 

session_start();

require_once '../model/autoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$password = md5($_POST['password']);
$password_again = md5($_POST['password_again']);

if ($password == $password_again) {
	$password_correct = $password;
} else {
 	echo "Password são diferentes";	
}

$cliente = new Cliente();

$cliente->nome = $nome;
$cliente->email = $email;
$cliente->telefone = $telefone;
$cliente->sexo = $sexo;
$cliente->password = $password_correct;


$cliente->cadastrarCliente();

$_SESSION['email'] = $email;
$_SESSION['nome'] = $nome;

header("Location: ../view/perfilclienteView.php");


