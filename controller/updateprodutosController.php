<?php 

session_start();

require_once '../model/autoload.php';

$id = $_POST['id_produto'];
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
if ($destaque==1){
$destaque=1;
} else {
$destaque=0;
}

$file = $_FILES["img_01"];
$allow = array('jpg', 'png', 'bmp', 'gif', 'jpeg', 'pjpeg');
$ext = substr($file['type'], strrpos($file['type'], '/') + 1);
if (array_search($ext, $allow) === false) {
	// <erro>
} else {	


  $img_01 = md5(uniqid(time())).".".$ext;
  move_uploaded_file($_FILES["img_01"]["tmp_name"],"../assets/img/upload_produtos/".$img_01);
}

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
$produtos->setId($id);
$produtos->atualizar();

if ($_FILES["img_01"]["tmp_name"]!=""){

$produtos->img_01 = $img_01;
$produtos->setId($id);
$produtos->atualizarImg("img_01='$produtos->img_01'");

} 

if ($_FILES["img_02"]["tmp_name"]!=""){

$produtos->img_02 = $img_02;
$produtos->setId($id);
$produtos->atualizarImg("img_02='$produtos->img_02'");

} 

if ($_FILES["img_03"]["tmp_name"]!=""){

$produtos->img_03 = $img_03;
$produtos->setId($id);
$produtos->atualizarImg("img_03='$produtos->img_03'");

} 

if ($_FILES["img_04"]["tmp_name"]!=""){

$produtos->img_04 = $img_04;
$produtos->setId($id);
$produtos->atualizarImg("img_04='$produtos->img_04'");

} 

if ($_FILES["img_05"]["tmp_name"]!=""){

$produtos->img_05 = $img_05;
$produtos->setId($id);
$produtos->atualizarImg("img_05='$produtos->img_05'");

} 

if ($_FILES["img_06"]["tmp_name"]!=""){

$produtos->img_06 = $img_06;
$produtos->setId($id);
$produtos->atualizarImg("img_06='$produtos->img_06'");

}  



header("Location: ../view/list-produtos.php");

 ?>

