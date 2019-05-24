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
    <button type="button" class="btn btn-primary cadastroprodutomodal" data-toggle="modal" data-target="#cadastroprodutomodal">
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
        <th><input type="checkbox" name="delete"></th>
        <th>Produto:</th>
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
        <th><input type="checkbox" name="delete"></th>
        <th><img src="../assets/img/upload_produtos/<?= $produtos['img_01']?>" width="70px" height="70px"></th>
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
          <!--       
          <form name="updateuser" method="post" action="../view/edit-produtos.php">
          <input type="hidden" name="id" value="<?= $produtos['id_produto']?>">           
          <input class="btn btn-info" onclick="return confirm('Deseja realmente editar? Produto: <?= $produtos['nome']?>');" type="submit" value="Editar">
          </form>
          -->
          <button type="button" class="btn btn-info updateprodutomodal<?=$produtos['id_produto']?>" data-toggle="modal" data-target="#updateprodutomodal<?=$produtos['id_produto']?>">
            Editar
          </button>
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
        <form id="cadastroproduto" method="post" action="../controller/cadprodutosController.php" autocomplete="off" enctype="multipart/form-data">
<div class="row">  
<div class="col-md-12 col-sm-12 form-group produtos-selecionados">
    <label for='input-img-produto-01' class="produtos-adicionados add-produto-principal" id="add-img-produto-01">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%">
    <span>PRINCIPAL</span> 
    </label>
    <label for='input-img-produto-02' class="produtos-adicionados" id="add-img-produto-02">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%" class="teste"> 
    </label>
    <label for='input-img-produto-03' class="produtos-adicionados" id="add-img-produto-03">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-img-produto-04' class="produtos-adicionados" id="add-img-produto-04">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-img-produto-05' class="produtos-adicionados" id="add-img-produto-05">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%"> 
    </label>
    <label for='input-img-produto-06' class="produtos-adicionados" id="add-img-produto-06">
    <img src="../assets/img/img-add-produto.png" width="100%" height="100%"> 
    </label>
 

    <input type="file" name="img_01" id='input-img-produto-01' class="dnone">
    <input type="file" name="img_02" id='input-img-produto-02' class="dnone">
    <input type="file" name="img_03" id='input-img-produto-03' class="dnone">
    <input type="file" name="img_04" id='input-img-produto-04' class="dnone">
    <input type="file" name="img_05" id='input-img-produto-05' class="dnone">
    <input type="file" name="img_06" id='input-img-produto-06' class="dnone">

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
          <div class="col-md-12 col-sm-12 form-group">
          <label>Descrição</label>
          <input class="form-control" type="text" name="descricao" required>
          </div>
</div>
<div class="row"> 

          <div class="col-md-4 col-sm-12 form-group">
          <label>QTD:</label>
          <input class="form-control" type="number" name="quantidade" required>
          </div>
          <div class="col-md-4 col-sm-12 form-group">
          <label>Peso (Kg):</label>
          <input class="form-control"  type="number" name="peso" required>
          </div>
          
          <div class="col-md-4 col-sm-12 form-group">
            <div>MEDIDAS</div>
            <label class="item-medida rs">R$</label>
            <label class="item-medida kg">Kg</label>
            <label class="item-medida und">Und</label>
          </div>
          <div class="col-md-1 col-sm-12 form-group">
          <input type="hidden" name="medida" value="0" class="medida">
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
          <div class="col-md-10 col-sm-12 form-group">
          <label>Código de Barra:</label>
          <input class="form-control" type="text" name="cod_barra" required>
          </div>

          <div class="col-md-2 col-sm-12 form-group">
          <label>Destaque:</label>
          <input class="form-control" type="checkbox" name="destaque" value="1">
          </div>
</div>
<div class="row">  
          
          <div class="col-md-3 col-sm-12 form-group">
          <label>Desconto</label>
          <input class="form-control"  type="number" name="desconto" required>
          </div>

          <div class="col-md-5 col-sm-12 form-group">
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


<?php foreach($lista as $produtos):?> 
<!-- Modal -->
<div class="modal fade" id="updateprodutomodal<?=$produtos['id_produto']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <span>Atualizar Produtos</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
        <form id="atualizarproduto<?=$produtos['id_produto']?>" method="post" action="../controller/updateprodutosController.php" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" name="id_produto" class="id_produto" value="<?=$produtos['id_produto']?>">
<div class="row">  
<div class="col-md-12 col-sm-12 form-group produtos-selecionados">
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-1' class="produtos-adicionados add-produto-principal upd<?=$produtos['id_produto']?>-img-produto-1">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_01']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%">
    <span>PRINCIPAL</span> 
    </label>
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-2' class="produtos-adicionados upd<?=$produtos['id_produto']?>-img-produto-2">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_02']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%" class="teste"> 
    </label>
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-3' class="produtos-adicionados upd<?=$produtos['id_produto']?>-img-produto-3">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_03']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%"> 
    </label>
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-4' class="produtos-adicionados upd<?=$produtos['id_produto']?>-img-produto-4">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_04']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%"> 
    </label>
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-5' class="produtos-adicionados upd<?=$produtos['id_produto']?>-img-produto-5">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_05']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%"> 
    </label>
    <label for='upd<?=$produtos['id_produto']?>-input-img-produto-6' class="produtos-adicionados upd<?=$produtos['id_produto']?>-img-produto-6">
    <img src="../assets/img/upload_produtos/<?= $produtos['img_06']?>" onerror="this.src='../assets/img/img-add-produto.png'" width="100%" height="100%"> 
    </label>
 

    <input type="file" name="img_01" id='upd<?=$produtos['id_produto']?>-input-img-produto-1' class="dnone">
    <input type="file" name="img_02" id='upd<?=$produtos['id_produto']?>-input-img-produto-2' class="dnone">
    <input type="file" name="img_03" id='upd<?=$produtos['id_produto']?>-input-img-produto-3' class="dnone">
    <input type="file" name="img_04" id='upd<?=$produtos['id_produto']?>-input-img-produto-4' class="dnone">
    <input type="file" name="img_05" id='upd<?=$produtos['id_produto']?>-input-img-produto-5' class="dnone">
    <input type="file" name="img_06" id='upd<?=$produtos['id_produto']?>-input-img-produto-6' class="dnone">

  </div>
 

</div>

<div class="row">  
          <div class="col-md-8 col-sm-12 form-group">
          <label>Nome:</label>
          <input class="form-control" type="text" name="nome" value="<?=$produtos['nome']?>" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Valor:</label>
          <input class="form-control"  type="number" step="0.01" name="valor" value="<?=$produtos['valor']?>" required>
          </div>
</div>
<div class="row">  
          <div class="col-md-12 col-sm-12 form-group">
          <label>Descrição</label>
          <input class="form-control" type="text" name="descricao" value="<?=$produtos['descricao']?>" required>
          </div>
</div>
<div class="row"> 

          <div class="col-md-4 col-sm-12 form-group">
          <label>QTD:</label>
          <input class="form-control" type="number" name="quantidade" value="<?=$produtos['quantidade']?>" required>
          </div>
          <div class="col-md-4 col-sm-12 form-group">
          <label>Peso (Kg):</label>
          <input class="form-control"  type="number" name="peso" value="<?=$produtos['peso']?>" required>
          </div>
          
          <div class="col-md-4 col-sm-12 form-group">
            <div>MEDIDAS</div>
            <label class="item-medida rs rs<?=$produtos['id_produto']?>">R$</label>
            <label class="item-medida kg kg<?=$produtos['id_produto']?>">Kg</label>
            <label class="item-medida und und<?=$produtos['id_produto']?>">Und</label>
          </div>
          <div class="col-md-1 col-sm-12 form-group">
          <input type="hidden" name="medida" value="0" class="medida medida<?=$produtos['id_produto']?>">
          </div>        
</div>
<div class="row">  
          <div class="col-md-8 col-sm-12 form-group">
          <label>Fornecedor:</label>
          <input class="form-control" type="text" name="fornecedor" value="<?=$produtos['fornecedor']?>" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Validade:</label>
          <input class="form-control" type="date" name="validade" value="<?=$produtos['validade']?>" required>
          </div>
</div>
<div class="row">  
          <div class="col-md-10 col-sm-12 form-group">
          <label>Código de Barra:</label>
          <input class="form-control" type="text" name="cod_barra" value="<?=$produtos['cod_barra']?>" required>
          </div>

          <div class="col-md-2 col-sm-12 form-group">
          <label>Destaque:</label>
          <input class="form-control destaque<?=$produtos['id_produto']?>" type="checkbox" name="destaque" value="1">
          </div>
</div>
<div class="row">  
          
          <div class="col-md-3 col-sm-12 form-group">
          <label>Desconto</label>
          <input class="form-control"  type="number" name="desconto" value="<?=$produtos['desconto']?>" required>
          </div>

          <div class="col-md-5 col-sm-12 form-group">
          <label>Marca:</label>
          <input class="form-control" type="text" name="marca" value="<?=$produtos['marca']?>" required>
          </div>

          <div class="col-md-4 col-sm-12 form-group">
          <label>Categoria:</label>
          <select name="categoria" class="form-control">
 
      <option class="categoria<?=$produtos['id_produto']?>" value="<?=$produtos['categoria_fk']?>"><?=$produtos['descricao_categoria']?></option>

      <?php foreach ($listacategorias as $categorias){

         if ($produtos['categoria_fk']!=$categorias['id_categoria']){
      ?>
      <option class="categoria<?=$produtos['id_produto']?>" value="<?=$categorias['id_categoria']?>"><?=$categorias['descricao']?></option>
      <?php 
         
         } // Fim do If
      } // Fim do Foreach
      ?>
          </select>
          </div>
</div>
          <div class="form-group">
            <input class="btn btn-success btn-block" type="submit" name="Atualizar">
          </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).ready( function() {
  $("#upd<?=$produtos['id_produto']?>-input-img-produto-1").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-1");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd<?=$produtos['id_produto']?>-input-img-produto-2").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-2");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd<?=$produtos['id_produto']?>-input-img-produto-3").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-3");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd<?=$produtos['id_produto']?>-input-img-produto-4").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-4");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd<?=$produtos['id_produto']?>-input-img-produto-5").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-5");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd<?=$produtos['id_produto']?>-input-img-produto-6").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd<?=$produtos['id_produto']?>-img-produto-6");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$(".updateprodutomodal<?=$produtos['id_produto']?>").click(function(){
        if (<?=$produtos['medida']?>==1){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".rs<?=$produtos['id_produto']?>").css("color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("color","#000")
        $(".und<?=$produtos['id_produto']?>").css("color","#000")
        $(".rs").addClass("ativo")
        $(".kg").removeClass("ativo")
        $(".und").removeClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }
      if (<?=$produtos['medida']?>==2){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".rs<?=$produtos['id_produto']?>").css("color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("color","#000")
        $(".rs").removeClass("ativo")
        $(".kg").addClass("ativo")
        $(".und").removeClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }
      if (<?=$produtos['medida']?>==3){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".rs<?=$produtos['id_produto']?>").css("color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("color","#000")
        $(".rs").addClass("ativo")
        $(".kg").addClass("ativo")
        $(".und").removeClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }
      if (<?=$produtos['medida']?>==4){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".rs<?=$produtos['id_produto']?>").css("color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("color","#000")
        $(".und<?=$produtos['id_produto']?>").css("color","#fff")
        $(".rs").removeClass("ativo")
        $(".kg").removeClass("ativo")
        $(".und").addClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }    
      if (<?=$produtos['medida']?>==5){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".rs<?=$produtos['id_produto']?>").css("color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("color","#000")
        $(".und<?=$produtos['id_produto']?>").css("color","#fff")
        $(".rs").addClass("ativo")
        $(".kg").removeClass("ativo")
        $(".und").addClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }
      if (<?=$produtos['medida']?>==6){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".rs<?=$produtos['id_produto']?>").css("color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("color","#fff")
        $(".rs").removeClass("ativo")
        $(".kg").addClass("ativo")
        $(".und").addClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }
      if (<?=$produtos['medida']?>==7){
        $(".rs<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".kg<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".und<?=$produtos['id_produto']?>").css("background-color","#000")
        $(".rs<?=$produtos['id_produto']?>").css("color","#fff")
        $(".kg<?=$produtos['id_produto']?>").css("color","#fff")
        $(".und<?=$produtos['id_produto']?>").css("color","#fff")
        $(".rs").addClass("ativo")
        $(".kg").addClass("ativo")
        $(".und").addClass("ativo")
        $(".medida").val(<?=$produtos['medida']?>)
      }

      if (<?=$produtos['destaque']?>==1) {
      $(".destaque<?=$produtos['id_produto']?>").prop("checked", true)
      }
  })


      
}); //fim do jquery
</script>

<?php endforeach?>

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