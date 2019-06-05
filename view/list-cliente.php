<?php require_once '../model/autoload.php'; $cliente = new Cliente(); $lista = $cliente->listar(); ?>

<?php 

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Nome:</th>
				<th>Email:</th>				
				<th>Telefone:</th>
				<th>Genero</th>
				<!--<th>Oferta:</th>-->
				<!--<th>Apagar:</th>-->
			</tr>
		</thead>
		<tbody>
		<?php foreach($lista as $clientes):?>		
			<tr>
				<td><?= $clientes['id']?></td>	
				<td><?= $clientes['nome']?></td>
				<td><?= $clientes['email']?></td> 				
				<td><?= $clientes['telefone']?></td>
				<td><?= $clientes['sexo']?></td>
				<!--<td><?#=$clientes['ofertas']?></td>-->
				<!--<td>
					<form name="deleteuser" method="post" action="../controller/deleteclienteController.php">
					<input type="hidden" name="id" value="<?#=$clientes['id']?>">						
					<input class="btn btn-danger" onclick="return confirm('Deseja realmente apagar? Cliente:<?#=$clientes['nome']?>');" type="submit" value="Apagar">
					</form>
				</td>-->
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
      	<form id="cadastro" method="post" action="../controller/cadusersController.php" autocomplete="off">
      		
      		<div class="form-group">
      		<label>Nome:</label>
      		<input class="form-control" type="text" name="nome" required>
      		</div>

      		<div class="form-group">
      		<label>Email:</label>
      		<input class="form-control" type="text" name="email" required>
      		</div>

      		<div class="form-group">
      		<label>Senha:</label>
      		<input class="form-control" id="password" type="password" name="password" required>
      		</div>

      		<div class="form-group">
      		<label>Confirme a senha:</label>
      		<input class="form-control" id="password_again" type="password" name="password_again" required>
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