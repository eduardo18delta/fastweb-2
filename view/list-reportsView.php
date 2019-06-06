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
    				<h6 class="card-title">Versão 1.0 - Em desenvolvimento</h6>
    				<p class="card-text">
    					Relatório com os clientes cadastrados no sistema.
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
    				<h6 class="card-title">Versão 1.0 - Em desenvolvimento</h6>
    				<p class="card-text">
    					Relatório com os produtos cadastrados em estoque.
    				</p>
    			<a href="#" class="btn btn-primary">Gerar Relatório</a>
  				</div>
			</div>		
		</div>
	</div>
</div>


<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>