<?php require_once '../model/autoload.php'; $users = new Users(); $lista = $users->listar(); ?>

<?php 

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="row mt-4">
	<div class="col-12">
		<a class="btn btn-primary" href="#">Permissões</a>
		<a class="btn btn-primary" href="#">Cargos</a>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped table-hover mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Nome:</th>
				<th>Email:</th>
				<th>Password:</th>
				<th>Cargo:</th>
				<th>Permissão</th>
				<th>Deletar:</th>
				<th>Editar:</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lista as $users):?>		
			<tr>
				<td><?= $users['id']?></td>	
				<td><?= $users['nome']?></td>
				<td><?= $users['email']?></td> 
				<td><strike><?= $users['password']?></strike></td> 
				
				<td><?= $users['cargo_fk']?></td>
				<td><?= $users['permissao']?></td>

				<td>
					<form name="deleteuser" method="post" action="../controller/deleteusersController.php">
					<input type="hidden" name="id" value="<?= $users['id']?>">						
					<input class="btn btn-danger" onclick="return confirm('Deseja realmente apagar? Cod:<?= $users['id']?>');" type="submit" value="Apagar">
					</form>
				</td>
				<td>				
					<form name="updateuser" method="post" action="../view/edit-user.php">
					<input type="hidden" name="id" value="<?= $users['id']?>">						
					<input class="btn btn-info" onclick="return confirm('Deseja realmente editar? Cod:<?= $users['id']?>');" type="submit" value="Editar">
					</form>
				</td>
			</tr>		
		<?php endforeach?>
		</tbody>
	</table>
</div>

</div>

<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>