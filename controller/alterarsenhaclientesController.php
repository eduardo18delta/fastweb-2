<?php 
session_start();
require_once '../model/autoload.php';

$id = $_POST['id'];
$password = md5($_POST['password']);
$newpassword = md5($_POST['password']);
$password_again = md5($_POST['password_again']);

$cliente = new Cliente();
$senhaverificada = $cliente->consultarSenha($password);

if ($password==$senhaverificada) {
	if ($password == $password_again) {
	$password_correct = $password;
	} else {
	 	echo "Password são diferentes";	
	}
} else {
	echo "Password incorreto";	
}


$cliente->password = $password_correct;

$cliente->setId($id);
$cliente->atualizarCliente();

$_SESSION['msgupdate'] = "<div class='alert alert-success mt-4'>Dados atualizado com sucesso!</div>";

header("Location: ../view/list-dadosView.php");


