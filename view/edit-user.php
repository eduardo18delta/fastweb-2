<?php 

require_once '../model/autoload.php'; 

$users = new Users(); 
$users->id = $_GET['id'];
$lista = $users->listaEspecifica(); 

?>

<?php include_once '../parts/head.php'; ?>



<div class="container">

<div class="alert alert-info mt-4">
	Editando usuário id: <?= $lista['id']?>
</div>

	<form method="post" action="../controller/updateusersController.php">		
		<div class="form-group">
		<label>Email:</label>
		<input class="form-control" type="text" name="email" value="<?= $lista['email']?>">
		</div>

		<div class="form-group">
		<label>Nova Senha:</label>
		<input class="form-control" type="text" name="password1">
		</div>

		<div class="form-group">
		<label>Confirmar Senha:</label>
		<input class="form-control" type="text" name="password2">
		</div>

		<input type="hidden" name="id" value="<?= $lista['id']?>">						

		<div class="form-group">
		<button class="btn btn-block" type="submit">Atualizar</button>			
		</div>

	</form>
</div>


<?php include_once '../parts/footer.php' ?>









