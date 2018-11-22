<?php require_once '../model/autoload.php'; $users = new Users(); $lista = $users->listar(); ?>
<?php include_once '../parts/head.php'; ?>

<div class="container">

<div class="table-responsive">
	<table class="table table-striped table-hover mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Email:</th>
				<th>Password:</th>
				<th>Ações:</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lista as $users):?>		
			<tr>
				<td><?= $users['id']?></td>	
				<td><?= $users['email']?></td> 
				<td><strike><?= $users['password']?></strike></td> 
				<td>
					<form name="deleteuser" method="post" action="../controller/deleteusersController.php">
					<input type="hidden" name="id" value="<?= $users['id']?>">						
					<input class="btn btn-danger" onclick="return confirm('Deseja realmente apagar? Cod:<?= $users['id']?>');" type="submit" value="Apagar">
					</form>
				</td>
			</tr>		
		<?php endforeach?>
		</tbody>
	</table>
</div>

</div>

<?php include_once '../parts/footer.php'; ?>