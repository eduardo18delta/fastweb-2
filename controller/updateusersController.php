<?php 

session_start();

require_once '../model/autoload.php';


$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$password01 = $_POST['password1'];
$password02 = $_POST['password2'];
$cargo = $_POST['cargo'];
$permissao = $_POST['permissao'];

$users = new Users();
$users->id = $id;
$lista = $users->recuperandosenha();

if (empty($password01) && empty($password02)) 
{
	$password01 = $lista['password'];
	$password02 = $lista['password'];
} else {
	$password01 = md5($password01);
	$password02 = md5($password02);

}

if ($password01 == $password02) {
	$users->id = $id;
	$users->nome = $nome;
	$users->email = $email;
	$users->password = $password01;
	$users->cargo = $cargo;
	$users->permissao = $permissao;
	$users->atualizar();
	header("Location: ../view/list-users.php");

} 
else
{
	echo "<script> alert('Senhas não coincidem!')</script>";
	echo "<script> window.location.href = '../view/edit-user.php' </script>";
	

}






 ?>