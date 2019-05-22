<?php 

session_start();

require_once '../model/autoload.php';

$cliente_fk = $_GET['cliente_fk'];
$cep = $_GET['cep'];
$rua = $_GET['rua'];
$numero = $_GET['numero'];
$bairro = $_GET['bairro'];
$cidade = $_GET['cidade'];
$estado = $_GET['uf'];
$ibge = $_GET['ibge'];
$principal = $_GET['principal'];

$endereco = new Endereco();

$endereco->cliente_fk = $cliente_fk;
$endereco->cep = $cep;
$endereco->rua = $rua;
$endereco->numero = $numero;
$endereco->bairro = $bairro;
$endereco->cidade = $cidade;
$endereco->estado = $estado;
$endereco->ibge = $ibge;
$endereco->principal = $principal;


$endereco->cadastrarEndereco();
header("Location: ../view/list-enderecoclienteView.php");



