<?php 

require_once '../model/autoload.php'; 
$permissao = new Permissao(); 
$lista = $permissao->listapermissoes();

?>

<?php 

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="row mt-4">
	<div class="col-12">
		<a class="btn btn-primary" href="list-users.php">Voltar</a>
	</div>
</div>

<div class="row">


<div class="col-6">

<div class="table-responsive">
	<table class="table table-striped table-hover mt-4 table-sm table-bordered">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Descrição:</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lista as $users):?>		
			<tr>
				<td><?= $users['id_permissao']?></td>	
				<td><?= $users['descricao']?></td>		
			</tr>		
		<?php endforeach?>
		</tbody>
	</table>
</div>

</div>

<div class="col">
	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
    		<h1 class="display-5">Permissões do Sistema</h1>
    		<p class="lead">
    		Na gestão adminstrativa da @FastWeb temos três tipos de acesso:
    		<ol>
    			<li class="mt-3">Admin&nbsp&nbsp&nbsp&nbsp- 
    				<a class="btn btn-success btn-s" href="#">Acessar info</a></li>
    			<li class="mt-3">Gerente  - 
    				<a class="btn btn-success btn-s" href="#">Acessar info</a></li>    		
    		</ol>
	    	</p>
  		</div>
</div>
</div>

</div>

</div>

<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>