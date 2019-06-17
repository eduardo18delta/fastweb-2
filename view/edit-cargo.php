<?php 

require_once '../model/autoload.php'; 

$cargo = new Cargos(); 
$cargo->id = $_POST['id'];

$lista = $cargo->listaEspecificaCargo(); 

?>

<?php 

session_start();

if(isset($_SESSION['user']) && $_SESSION['permissao'] == 1 ) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="alert alert-info mt-4">
	Editando : <?= $lista['descricao']?>
</div>

	<form method="post" action="../controller/updatecargosController.php">		
		<div class="form-group">
		<label>Nome:</label>
		<input class="form-control" type="text" name="cargos" value="<?= $lista['descricao']?>">
		</div>		
	
		<input type="hidden" name="id" value="<?= $lista['id_cargo']?>">						

		<div class="form-group">
		<button class="btn btn-block" type="submit">Atualizar</button>			
		</div>
	</form>
</div>

<?php } else {header("Location: ../view/menu.php");}?>

<?php include_once '../parts/footer.php'; ?>











