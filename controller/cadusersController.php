<?php 

session_start();

require_once '../model/autoload.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$password = md5($_POST['password_again']);
$cargo = $_POST['cargo'];
$permissao = $_POST['permissao'];


$users = new Users();

$users->nome = $nome;
$users->email = $email;
$users->password = $password;
$users->cargo = $cargo;
$users->permissao = $permissao;
$users->cadastrarUser();
header("Location: ../view/list-users.php");



 ?>