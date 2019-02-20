<?php require_once '../model/autoload.php'; $produtos = new Produtos(); $lista=$produtos->listar();?>

<?php 

$categorias = new Categoria();

$listacategorias=$categorias->listarCategorias();

session_start();

if(isset($_SESSION['user'])) {

include_once '../parts/head.php'; ?>

<div class="container">

<div class="row mt-4">
	<div class="col-12">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroprodutomodal">
			Cadastrar produto
		</button>

		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categorias">
			Categorias
		</button>
		
	</div>
</div>

<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered mt-4">
		<thead>
			<tr>
				<th>Código:</th>
				<th>Nome:</th>
				<th>Valor:</th>				
				<th>Fornecedor:</th>
				<th>Validade</th>
				<th>Qtd:</th>
				<th>Marca:</th>
				<th>Categoria</th>
				<th>Editar:</th>
				<th>Apagar:</th>
			</tr>
		</thead>
		<tbody>

		<?php foreach($lista as $produtos):?>		
			<tr>
				<td><?= $produtos['id_produto']?></td>	
				<td><?= $produtos['nome']?></td>
				<td><?= "R$ ".$produtos['valor']?></td> 				
				<td><?= $produtos['fornecedor']?></td>
				<td><?= $produtos['validade']?></td>
				<td><?= $produtos['quantidade']?></td>
				<td><?= $produtos['marca']?></td>
				<td><?= $produtos['descricao']?></td>

				<td>
					<form name="deleteuser" method="post" action="../controller/deleteprodutoController.php">
					
					<input type="hidden" name="id" value="<?= $produtos['id_produto']?>">					
					<input class="btn btn-danger" onclick="return confirm('Deseja realmente apagar? Produto:<?=$produtos['nome']?>');" type="submit" value="Apagar">
					</form>
				</td>
				<td>				
					<form name="updateuser" method="post" action="../view/edit-produtos.php">
					<input type="hidden" name="id" value="<?= $produtos['id_produto']?>">						
					<input class="btn btn-info" onclick="return confirm('Deseja realmente editar? Produto: <?= $produtos['nome']?>');" type="submit" value="Editar">
					</form>
				</td>
			</tr>		
		<?php endforeach?>
		</tbody>
	</table>
</div>




<!-- Modal -->
<div class="modal fade" id="cadastroprodutomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span>Cadastrar Produtos</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
        <form id="cadastroproduto" method="post" action="../controller/cadprodutosController.php" autocomplete="off">
<div class="row">  
<div class="col-md-12 col-sm-12 form-group produtos-selecionados">
    <label for='input-foto-produto-01' class="produtos-adicionados add-produto-principal" id="add-foto-produto-01">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%">
    <span>PRINCIPAL</span> 
    </label>
    <label for='input-foto-produto-02' class="produtos-adicionados" id="add-foto-produto-02">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-foto-produto-03' class="produtos-adicionados" id="add-foto-produto-03">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-foto-produto-04' class="produtos-adicionados" id="add-foto-produto-04">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-foto-produto-05' class="produtos-adicionados" id="add-foto-produto-05">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-foto-produto-06' class="produtos-adicionados" id="add-foto-produto-06">
    <img src="../assets/img/foto-produto.png" width="100%" height="100%"> 
    </label>
 

    <input type="file" name="input-foto-produto-01" id='input-foto-produto-01' class="dnone">
    <input type="file" name="input-foto-produto-02" id='input-foto-produto-02' class="dnone">
    <input type="file" name="input-foto-produto-03" id='input-foto-produto-03' class="dnone">
    <input type="file" name="input-foto-produto-04" id='input-foto-produto-04' class="dnone">
    <input type="file" name="input-foto-produto-05" id='input-foto-produto-05' class="dnone">
    <input type="file" name="input-foto-produto-06" id='input-foto-produto-06' class="dnone">

  </div>
 

</div>

<div class="row">  
          <div class="col-md-8 col-sm-12 form-group">
          <label>Nome:</label>
          <input class="form-control" type="text" name="nome" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Valor:</label>
          <input class="form-control"  type="number" step="0.01" name="valor" required>
          </div>
</div>
<div class="row">  
          <div class="col-md-8 col-sm-12 form-group">
          <label>Fornecedor:</label>
          <input class="form-control" type="text" name="fornecedor" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Validade:</label>
          <input class="form-control" type="date" name="validade" required>
          </div>
</div>
<div class="row">  

          <div class="col-md-4 col-sm-12 form-group">
          <label>Quantidade:</label>
          <input class="form-control" type="number" name="quantidade" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Marca:</label>
          <input class="form-control" type="text" name="marca" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Categoria:</label>
          <select name="categoria" class="form-control">
          <?php foreach ($listacategorias as $categorias):?>  
      <option value="<?=$categorias['id_categoria']?>"><?=$categorias['descricao']?></option>
      <?php endforeach?>
          </select>
          </div>
</div>
          <div class="form-group">
            <input class="btn btn-success btn-block" type="submit" name="Cadastrar">
          </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="categorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
      	
      	<table class="table table-striped table-hover table-bordered mt-4">
      		<thead>
      			<th>Código:</th>
      			<th>Descrição</th>
      		</thead>

      		<tbody>
      		<?php foreach ($listacategorias as $categorias):?>	
			<tr>
				<td><?=$categorias['id_categoria']?></td>
				<td><?=$categorias['descricao']?></td>
			</tr>			
			<?php endforeach?>
			</tbody>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>


</div>

<?php } else {header("Location: ../view/login.php?acess_denied");}?>

<?php include_once '../parts/footer.php'; ?>