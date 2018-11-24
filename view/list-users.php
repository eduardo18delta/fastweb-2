<?php require_once '../model/autoload.php'; $users = new Users(); $lista = $users->listar(); ?>

<?php 

$listarpermissao = $users->listarpermissao();
$listarcargo = $users->listarcargo();

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="row mt-4">
	<div class="col-12">
		<a class="btn btn-primary" href="list-permissao.php">Permissões</a>
		<a class="btn btn-primary" href="#">Cargos</a>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Criar Usuário
		</button>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped table-hover mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Nome:</th>
				<th>Email:</th>				
				<th>Cargo:</th>
				<th>Permissão</th>
				<th>Deletar:</th>
				<th>Editar:</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<div class="alert alert-info mt-4">Para mudar a senha edite o usuário desejado.</div>
			</tr>
		<?php foreach ($lista as $users):?>		
			<tr>
				<td><?= $users['id']?></td>	
				<td><?= $users['nome']?></td>
				<td><?= $users['email']?></td> 				
				<td><?= $users['cargo']?></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
      	<form method="post" action="../controller/cadusersController.php" autocomplete="off">
      		
      		<div class="form-group">
      		<label>Nome:</label>
      		<input class="form-control" type="text" name="nome">
      		</div>

      		<div class="form-group">
      		<label>Email:</label>
      		<input class="form-control" type="text" name="email" autocomplete="off">
      		</div>

      		<div class="form-group">
      		<label>Password:</label>
      		<input class="form-control" type="password" name="password" autocomplete="off">
      		</div>


      		<div class="form-group">
      		<label>Cargo:</label>
      		<select name="cargo" class="form-control">
      		<?php foreach ($listarcargo as $cargo):?>	
			<option value="<?=$cargo['id_cargo']?>"><?=$cargo['descricao']?></option>
			<?php endforeach?>
      		</select>
      		</div>

      		<div class="form-group">
      		<label>Permissão:</label>
      		<select name="permissao" class="form-control">
			<?php foreach ($listarpermissao as $permissao):?>	
			<option value="<?= $permissao['id_permissao']?>"><?=$permissao['descricao']?></option>
			<?php endforeach?>
      		</select>
      		</div>

      		<div class="form-group">
      			<input class="btn btn-success btn-block" type="submit" name="Cadastrar">
      		</div>


      	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>

</div>

<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>