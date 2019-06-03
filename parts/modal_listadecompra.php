  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova listar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../controller/cadlistadecomprasController.php">

          <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">

          <div class="form-group">            
            Nome da lista:
            <input required="" class="form-control" name="nome" type="text" value=""/>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="enviar">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div> 


<?php

require_once '../model/autoload.php'; 

$listadecompras = new Listadecompras(); 
$idusuario = $_SESSION['id'];

$listadecompras = $listadecompras->listaListadecompras($idusuario);

?>

<?php foreach ($listadecompras as $lista):?>
  <!-- Modal -->

<div class="modal fade" id="modal_lista<?= $lista['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova listar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../controller/updatelistadecomprasController.php">

          <input type="hidden" name="id" value="<?= $lista['id']?>">

          <div class="form-group">            
            Nome da lista:
            <input required="" class="form-control" name="nome" type="text" value="<?= $lista['nome']?>"/>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="enviar">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>        
      </div>
    </div>
  </div>
</div> 

<?php endforeach?>  