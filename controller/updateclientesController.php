<?php 
session_start();
require_once '../model/autoload.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];

$foto_perfil = md5(uniqid(time()));
move_uploaded_file($_FILES["foto_perfil"]["tmp_name"],"../assets/img/upload_perfil/".$foto_perfil);

$cliente = new Cliente();

$cliente->nome = $nome;
$cliente->email = $email;
$cliente->telefone = $telefone;
$cliente->sexo = $sexo;


$cliente->setId($id);
$cliente->atualizarCliente();

if ($_FILES["foto_perfil"]["tmp_name"]!=""){

$cliente->foto_perfil = $foto_perfil;
$cliente->setId($id);
$cliente->atualizarFotoperfil("foto_perfil='$cliente->foto_perfil'");
$_SESSION['foto_perfil'] = $foto_perfil;
} 

$_SESSION['email'] = $email;
$_SESSION['nome'] = $nome;
$_SESSION['telefone'] = $telefone;
$_SESSION['sexo'] = $sexo;


$_SESSION['msgupdate'] = "<div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Dados atualizados com sucesso!
        </div>";

header("Location: ../view/list-dadosView.php");


