<?php 
session_start();
require_once '../model/autoload.php';

$id = $_POST['id'];
$newpassword = md5($_POST['newpassword']);
$password_again = md5($_POST['password_again']);

$cliente = new Cliente();

if ($newpassword == $password_again) {
$password_correct = $newpassword;
} else {
 	echo "Password são diferentes";	
}

$cliente->password = $password_correct;

$cliente->setId($id);
$cliente->atualizarSenha("senha='$cliente->password'");

$_SESSION['msgupdate'] = "<div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Senha alterada com sucesso!
        </div>";

header("Location: ../view/list-dadosView.php");


