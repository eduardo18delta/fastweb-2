<?php require_once '../model/autoload.php'; $produtos = new Produtos(); $lista=$produtos->listar();?>

<?php 

$categorias = new Categoria();

$listacategorias=$categorias->listarCategorias();

session_start();

if(isset($_SESSION['user'])) {

?>

<div class="container">

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
  window.print();
  window.location.href = "list-reportsView.php"

return false;
})
</script>

<div class="table-responsive">
  <table class="table table-striped table-bordered mt-4">
    <thead>
      <tr class="d-flex ustify-content-around">
                      
        <img src="../assets/img/logo.png" width="100px" height="100px">
    
                          
         <span>RELATÓRIO DE PRODUTOS CADASTRADOS</span>
     
     
      </tr>
</div>
      </tr>
      <tr>
        <div class="msg-produto"></div>
      </tr>
      <tr>
        <th>Produto:</th>
        <th>Código:</th>
        <th>Nome:</th>
        <th>Valor:</th>       
        <th>Fornecedor:</th>
        <th>Validade</th>
        <th>Qtd:</th>
        <th>Marca:</th>
        <th>Categoria</th>
      </tr>
    </thead>
    <tbody class="lista-produtos">

    <?php foreach($lista as $produtos):?>   
      <tr>
        <th><img src="../assets/img/upload_produtos/<?= $produtos['img_01']?>" width="70px" height="70px"></th>
        <td><?= $produtos['id_produto']?></td>  
        <th><?= $produtos['nome']?></th>
        <td><?= "R$ ".$produtos['valor']?></td>         
        <td><?= $produtos['fornecedor']?></td>
        <td><?= $produtos['validade']?></td>
        <td><?= $produtos['quantidade']?></td>
        <td><?= $produtos['marca']?></td>
        <td><?= $produtos['descricao']?></td>
      </tr>   
    <?php endforeach?>
    </tbody>
  </table>
</div>


<?php } ?>