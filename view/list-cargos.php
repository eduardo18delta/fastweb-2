<?php require_once '../model/autoload.php'; $cargos = new Cargos(); $lista = $cargos->listarcargos(); ?>

<?php 

session_start();

if(isset($_SESSION['user']) && $_SESSION['permissao'] == 1 ) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="row mt-4">
	<div class="col-12">
		<a class="btn btn-primary" href="list-users.php">Voltar</a>	
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Criar Cargo
		</button>
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Descrição:</th>
				<th>Apagar:</th>
				<th>Editar:</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($lista as $cargos):?>		
			<tr>
				<td><?= $cargos['id_cargo']?></td>	
				<td><?= $cargos['descricao']?></td>

				<td>
					<form name="deleteuser" method="post" action="../controller/deletecargoController.php">
					<input type="hidden" name="id" value="<?= $cargos['id_cargo']?>">						
					<input class="btn btn-danger" onclick="return confirm('Deseja realmente apagar? Cargo:<?= $cargos['descricao']?>');" type="submit" value="Apagar">
					</form>
				</td>
				<td>				
					<form name="updateuser" method="post" action="../view/edit-cargo.php">
					<input type="hidden" name="id" value="<?= $cargos['id_cargo']?>">						
					<input class="btn btn-info" onclick="return confirm('Deseja realmente editar? Cargo:<?= $cargos['descricao']?>');" type="submit" value="Editar">
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
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
      	<form id="cadastrocargo" method="post" action="../controller/cadcargosController.php" autocomplete="off">
      		
      		<div class="form-group">
      		<label>Cargo:</label>
      		<input class="form-control" type="text" name="cargo" required>
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

<?php } else {header("Location: ../view/menu.php");}?>

<?php include_once '../parts/footer.php'; ?>