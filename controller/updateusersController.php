<?php 

session_start();

require_once '../model/autoload.php';


$id = $_POST['id'];
$email = $_POST['email'];
$password01 = $_POST['password1'];
$password02 = $_POST['password2'];

if ($password01 == $password02) {
	$users = new Users();
	$users->id = $id;
	$users->email = $email;
	$users->password = md5($password01);
	$users->atualizar();
	header("Location: ../view/list-users.php");

} 
else
{
	echo "<script> alert('Senhas não coincidem!')</script>;";
	

}






 ?>