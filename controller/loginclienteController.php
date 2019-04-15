<?php 

session_start();

require_once '../model/autoload.php';

$cliente = new Cliente();

$cliente->email = $_POST['email'];
$cliente->password = md5($_POST['password']);

if (empty($_POST['email']) && empty($_POST['password'])) {
	$_SESSION['msg'] = "<div class='alert alert-danger'>Preencha os campos!</div>";
	header("Location: ../view/loginclienteView.php");
}

if (empty($_POST['email'])) {
	$_SESSION['msg'] = "<div class='alert alert-danger'>Preencha o email!</div>";
	header("Location: ../view/loginclienteView.php");
}

if (empty($_POST['password'])) {
	$_SESSION['msg'] = "<div class='alert alert-danger'>Preencha a senha!</div>";
	header("Location: ../view/loginclienteView.php");
}



if (isset($_POST['email'])  && !empty($_POST['email']))
{
	$cliente->loginCliente();
} 




