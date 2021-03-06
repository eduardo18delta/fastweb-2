<?php 

require_once '../model/autoload.php'; 

$users = new Users(); 
$users->id = $_POST['id'];

$lista = $users->listaEspecifica(); 

$listarpermissao = $users->listarpermissao();
$listarcargo = $users->listarcargo();

?>


<?php 

session_start();

if(isset($_SESSION['user']) && $_SESSION['permissao'] == 1 ) {

include_once '../parts/head.php'; ?>


<div class="container">

<div class="alert alert-info mt-4">
	Editando : <?= $lista['nome']?>
</div>

	<form id="editarusuario" method="post" action="../controller/updateusersController.php">		
		<div class="form-group">
		<label>Nome:</label>
		<input class="form-control" type="text" name="nome" value="<?= $lista['nome']?>">
		</div>		

		<div class="form-group">
		<label>Email:</label>
		<input class="form-control" type="text" name="email" value="<?= $lista['email']?>">
		</div>

		<div class="form-group">
		<label>Nova Senha:</label>
		<input class="form-control" type="password" name="password1" id="password1">
		</div>

		<div class="form-group">
		<label>Confirmar Senha:</label>
		<input class="form-control" type="password" name="password2">
		</div>


		<div class="form-group">
		<label>Permissão atual:</label>
		<input class="form-control bg-warning" type="text" name="permissaoatual" value="<?=$lista['permissao']?>" disabled>
		</div>

		<div class="form-group">
		<label>Nova Permissão:</label>
		<select class="form-control" name="permissao">
		<option selected disabled="">Escolha uma permissão</option>
		<?php foreach ($listarpermissao as $permissao):?>	
		<option value="<?= $permissao['id_permissao']?>"><?=$permissao['descricao']?></option>
		<?php endforeach?>
		</select>
		</div>

		<div class="form-group">
		<label>Cargo atual:</label>
		<input class="form-control bg-warning" type="text" name="cargoatual" value="<?=($lista['cargo'])?>" disabled>
		</div>

		<div class="form-group">
		<label>Novo Cargo:</label>
		<select class="form-control" name="cargo">
		<option selected disabled="">Escolha um cargo</option>
		<?php foreach ($listarcargo as $cargo):?>	
		<option value="<?=$cargo['id_cargo']?>"><?=$cargo['descricao']?></option>
		<?php endforeach?>
		</select>
		</div>


		<input type="hidden" name="id" value="<?= $lista['id']?>">						

		<div class="form-group">
		<button class="btn btn-block" type="submit">Atualizar</button>			
		</div>

	</form>
</div>


<?php } else {header("Location: ../view/menu.php");}?>

<?php include_once '../parts/footer.php'; ?>







