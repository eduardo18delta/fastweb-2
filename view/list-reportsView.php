<?php 

session_start();

require_once '../model/autoload.php';

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>


<div class="container-fluid">
	<div class="row mt-4">
		<div class="col-md-6">
			<div class="alert alert-secondary">
				Relatórios Clientes
			</div>
		</div>
		<div class="col-md-6">
			<div class="alert alert-secondary">
				Relatórios Gerenciais
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
  				<div class="card-header">
    			Lista de Clientes
  				</div>
  				<div class="card-body">
    				<p class="card-text">
    					Relatório com os clientes cadastrados no sistema.
    				</p>
    			<a href="list-reportsclientesView.php" target="_blank" class="btn btn-primary">Gerar Relatório</a>
  				</div>
			</div>
			<div class="card mt-2">
  				<div class="card-header">
    			Ultimas 10 Compras realizadas
  				</div>
  				<div class="card-body">
    				<p class="card-text">
    					Relatório das últimas 10 compras realizadas.
    				</p>
    			<a href="#" class="btn btn-primary">Gerar Relatório</a>
  				</div>
			</div>
		</div>		

		<div class="col-md-6">
			<div class="card">
  				<div class="card-header">
    			Lista de Produtos
  				</div>
  				<div class="card-body">
    				<p class="card-text">
    					Relatório com os produtos cadastrados em estoque.
    				</p>
    			<a href="list-reportsprodutosView.php" target="_blank" class="btn btn-primary">Gerar Relatório</a>
  				</div>
			</div>	
			<div class="card mt-2">
  				<div class="card-header">
    			Lista de Usuários
  				</div>
  				<div class="card-body">
    				<p class="card-text">
    					Relatório com os usuários dos sistemas.
    				</p>
    			<a href="list-reportsusuariosView.php" target="_blank" class="btn btn-primary">Gerar Relatório</a>
  				</div>
			</div>	
		</div>
	</div>
</div>


<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>


<?php

$conteudo = "
<p>teste</p>
";


file_put_contents("../assets/file/produto.pdf", $conteudo);
?>