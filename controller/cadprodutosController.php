<?php 

session_start();

require_once '../model/autoload.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$fornecedor = $_POST['fornecedor'];
$validade = $_POST['validade'];
$quantidade = $_POST['quantidade'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];
$descricao = $_POST['descricao'];
$peso = $_POST['peso'];
$medida = $_POST['medida'];
$desconto = $_POST['desconto'];
$cod_barra = $_POST['cod_barra'];
$destaque = $_POST['destaque'];
$img_01 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_01"]["tmp_name"],"../assets/img/upload_produtos/".$img_01);
$img_02 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_02"]["tmp_name"],"../assets/img/upload_produtos/".$img_02);
$img_03 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_03"]["tmp_name"],"../assets/img/upload_produtos/".$img_03);
$img_04 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_04"]["tmp_name"],"../assets/img/upload_produtos/".$img_04);
$img_05 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_05"]["tmp_name"],"../assets/img/upload_produtos/".$img_05);
$img_06 = md5(uniqid(time()));
  move_uploaded_file($_FILES["img_06"]["tmp_name"],"../assets/img/upload_produtos/".$img_06);

$produtos = new Produtos();

$produtos->nome = $nome;
$produtos->valor = $valor;
$produtos->fornecedor = $fornecedor;
$produtos->validade = $validade;
$produtos->quantidade = $quantidade;
$produtos->marca = $marca;
$produtos->categoria = $categoria;
$produtos->descricao = $descricao;
$produtos->peso = $peso;
$produtos->medida = $medida;
$produtos->desconto = $desconto;
$produtos->cod_barra = $cod_barra;
$produtos->destaque = $destaque;
$produtos->img_01 = $img_01;
$produtos->img_02 = $img_02;
$produtos->img_03 = $img_03;
$produtos->img_04 = $img_04;
$produtos->img_05 = $img_05;
$produtos->img_06 = $img_06;



$produtos->cadastrarProduto();
header("Location: ../view/list-produtos.php");



 ?>

