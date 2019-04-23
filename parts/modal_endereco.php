  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar novo endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="get" action="../controller/cadenderecoController.php">

          <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">

          <div class="form-group">            
            Cep:
            <input class="form-control" name="cep" type="text" id="cep" value=""/>
          </div>

          <div class="form-group">
            Rua:
            <input class="form-control" name="rua" type="text" id="rua">
          </div>

          <div class="form-group">      
           Número:
            <input class="form-control" name="numero" type="text" id="numero"/>
          </div>

          <div class="form-group">      
           Bairro:
            <input class="form-control" name="bairro" type="text" id="bairro"/>
          </div>

          <div class="form-group">
            Cidade:
            <input class="form-control" name="cidade" type="text" id="cidade"/>
          </div>

          <div class="form-group">
           Estado:
            <input class="form-control" name="uf" type="text" id="uf"/>
          </div>

          <div class="form-group">
            IBGE:
            <input class="form-control" name="ibge" type="text" id="ibge"/>
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