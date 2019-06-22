<?php 

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

$file = $_FILES["foto-perfil"];
$allow = array('jpg', 'png', 'bmp', 'gif', 'jpeg', 'pjpeg');
$ext = substr($file['type'], strrpos($file['type'], '/') + 1);
if (array_search($ext, $allow) === false) {
	// <erro>
} else {	

$foto_perfil = md5(uniqid(time())).".".$ext;
move_uploaded_file($_FILES["foto-perfil"]["tmp_name"],"../assets/img/upload_perfil/".$foto_perfil);

}



$cliente = new Cliente();

$cliente->nome = $nome;
$cliente->email = $email;
$cliente->telefone = $telefone;
$cliente->sexo = $sexo;
$cliente->password = $password_correct;
$cliente->foto_perfil = $foto_perfil;

$cliente->cadastrarCliente();

session_start();
$_SESSION['msg'] = "<div class='alert alert-success mt-4'>Criado com sucesso! Agora faça o seu login!</div>";

header("Location: ../view/loginclienteView.php");


