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
				Relatórios Estoque	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card" style="width: 18rem;">
  				<img class="card-img-top" src="..." alt="Reports Clientes">
  					<div class="card-body">
    					<p class="card-text">
    					Relatório de clientes do sistema
    					</p>
    					<a class="btn btn-success" href="">Gerar</a>
  					</div>
			</div>
		</div>		

		<div class="col-md-6">
			<div class="card" style="width: 18rem;">
  				<img class="card-img-top" src="..." alt="Reports Admin">
  					<div class="card-body">
    					<p class="card-text">
    						Relatórios de estoque
    					</p>
    					<a class="btn btn-success" href="">Gerar</a>
  					</div>
			</div>		
		</div>
	</div>
</div>


<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>