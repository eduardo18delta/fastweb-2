<?php session_start(); ?>
<?php  include '../view/menuView.php';?>

<div class="container">
	


	
</div>







<?php  if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='../controller/logoutfacebookController.php'>Sair</a>";
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita!</div>";
	header("Location: loginclienteView.php");	
}
?>