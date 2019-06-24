<?php  session_start(); if(isset($_SESSION['id'])) { include '../view/modalprodutosView.php'; include '../view/menuView.php';  ?>

<?php 

require_once '../model/autoload.php'; 

$listadecompras = new Listadecompras(); 
$idusuario = $_SESSION['id'];

$listadecompras = $listadecompras->listaListadecompras($idusuario);

$produtos = new Produtos(); $lista_produtos=$produtos->listar();

$itemlistadecompras = new Itemlistadecompras(); 

?>
   <!-- Adicionando JQuery -->
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {
            <?php foreach ($listadecompras as $lista):?>

$(".tabela-itens<?=$lista['id']?>").hide()
$(".mais-detalhes").removeClass("d-none")
$(".remove-itemlista-compra").removeClass("d-none")
$(".expandir-minimizar<?=$lista['id']?>").addClass("fas fa-plus icon-plus")
$(".tabela-itens<?=$lista['id']?>").removeClass("d-none")
$(".expandir-minimizar<?=$lista['id']?>").click(function() {

    if ($(".expandir-minimizar<?=$lista['id']?>").hasClass('ativo')) {
        $(".expandir-minimizar<?=$lista['id']?>").removeClass('ativo')
        $(".expandir-minimizar<?=$lista['id']?>").addClass("fas fa-plus icon-plus")
        $(".expandir-minimizar<?=$lista['id']?>").removeClass("fa fa-window-minimize")
        $(".tabela-itens<?=$lista['id']?>").hide()

    }
    else {
        $(".expandir-minimizar<?=$lista['id']?>").addClass('ativo')
        $(".expandir-minimizar<?=$lista['id']?>").addClass("fa fa-window-minimize")
        $(".expandir-minimizar<?=$lista['id']?>").removeClass("fas fa-plus icon-plus")
        $(".tabela-itens<?=$lista['id']?>").show()
    }

});

$('#filtro-nome<?=$lista['id']?>').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    console.log(nomeFiltro);
    $('.listar-compras<?=$lista['id']?>').find('tr').each(function() {
        var conteudoCelula = $(this).find('td').text();
        console.log(conteudoCelula);
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

$('#filtro-nome').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    console.log(nomeFiltro);
    $('.listar-compras').find('tr').each(function() {
        var conteudoCelula = $(this).find('td').text();
        console.log(conteudoCelula);
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});

<?php
$qtd_produtos_js=0;
$itemlistadecompras_js = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']); 
?>           
<?php foreach ($itemlistadecompras_js as $itemlista_js):?>

<?=$qtd_produtos_js++?>;
$(".cont-produtos<?=$lista['id']?>").text("<?=$qtd_produtos_js?> Produtos")

$('.remove-itemlista-compra<?=$itemlista_js['id']?>').click(function() {
 // var cont_pacientes = $('#consulta_pacientes').serialize();
   var lista_compras = new FormData($('#form_item_lista<?=$itemlista_js['id']?>')[0]);

  $.ajax({
      type: 'POST',
      //dataType: 'json',
      url: '../controller/deleteitemlistaController.php',
      //async: true,
      contentType: false,
      processData: false,
      data: lista_compras,
      success: function(response) {

         if (response=='null') {
          //alert ('SELECIONE PACIENTES')
          alert(response)
         } else {
   
          $(".item<?=$itemlista_js['id']?>").hide()

       }

       },
       error: function(response){
          alert ('erro')
       }
  });
  

  return false;
});

<?php endforeach?>  




<?php endforeach?>                                                          

/*
$('[name=cad-lista-compras]').click(function() {
 // var cont_pacientes = $('#consulta_pacientes').serialize();
   var lista_compras = new FormData($('#form_lista_produtos')[0]);

  $.ajax({
      type: 'POST',
      //dataType: 'json',
      url: '../controller/cadlistadecomprasController.php',
      //async: true,
      contentType: false,
      processData: false,
      data: lista_compras,
      success: function(response) {

         if (response=='null') {
          //alert ('SELECIONE PACIENTES')
          alert(response)
         } else {
       
      $("#form_endereco").load("../view/list-listadecomprasView.php #form_endereco")

       }

       },
       error: function(response){
          alert ('erro')
       }
  });
  

  return false;
});

*/

//consulta_medida()


function consulta_medida(){

    $.post("../controller/consultalistadecomprasController.php",function(dados) {
//alert (dados)
      id=0

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){


      id+=2

    }  

    }


//alert (id+1)
// $(".dependente-registro-atual").val(id+1)
        

    }, "JSON");


}



        }); // FIm do Jquery

    </script>


<div class="container-fluid desfocar">

  <div class="row mt-4">
    <div class="col">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="perfilclienteView.php">Perfil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Endereços</li>
          </ol>
      </nav>
    </div>  
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="sidenavcliente">       
            <div class="row">
                <div class="col">                               
                  <a id="nome-cliente" href="perfilclienteView.php">              
                  <i class="fas fa-bars"></i>
                  Minha conta - Olá  <?=$_SESSION['nome'] ?>  
                  </a>  
                </div>          
            </div>

            <div class="row">
                <div class="col">                                  
                  <a class=""href="list-enderecoclienteView.php">  
                  <i class="fas fa fa-home"></i>
                  Endereços    
                  <i class="fas fa-arrow-circle-right icon-plus"></i>      
                  </a>  
                </div>          
            </div>    

            <div class="row">
                <div class="col">                                  
                    <a class=""href="list-dadosView.php">  
                    <i class="fa fa-users"></i>
                    Dados 
                    <i class="fas fa-arrow-circle-right icon-plus"></i>
                    </a>  
                </div>          
            </div>  

                <div class="row">
                    <div class="col">                                  
                      <a class=""href="list-historicocomprasView.php">  
                      <i class="fas fa-shopping-cart"></i>
                      Histórico de Compras
                      <i class="fas fa-arrow-circle-right icon-plus"></i>
                      </a>  
                    </div>          
                </div>

                <div class="row">
                    <div class="col">                                  
                      <a class="menu-marcado"href="list-listadecomprasView.php">  
                      <i class="fas fa-clipboard-list"></i>
                      Lista de Compras
                      <i class="fas fa-arrow-circle-right icon-plus"></i>
                      </a>  
                    </div>          
                </div>

            <div class="row">
                <div class="col">                                  
                  <a class=""href="../controller/logoutfacebookController.php">  
                  <i class="fas fa-sign-out-alt"></i>
                  Sair
                  <i class="fas fa-arrow-circle-right icon-plus"></i>
                  </a>  
                </div>          
            </div>       
          </div>
    </div>

    <div class="col-md-8">
      <div class="row">
        <div class="col">
          <div class="alert alert-primary resumo">
            <b>Listas de compras cadastradas</b>  
          </div>
                        <?php
                            if(isset($_SESSION['msgcadastro']))
                            {
                                echo $_SESSION['msgcadastro'];
                                unset($_SESSION['msgcadastro']);
                            }
                        ?>

                            <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-12" href="">Criar lista de compra</a>

                    <div class="col mt-4">
                  <!--      <div class="row">
                            <div class="col">
                                    Nome da lista
                                                
                           </div> -->
                        </div>
                           <div class="row">
                                <div class="col">
                                
                                <?php foreach ($listadecompras as $lista):?>
                                
                                <div class="bg-primary btn-sm d-flex justify-content-between border border-white">
                                    <label class="btn btn-primary btn-sm expandir-minimizar<?=$lista['id']?>"></label>
                                    <label class="btn btn-primary btn-sm">
                                        <?= $lista['nome']?>
                                    </label>
                                    <div class="d-flex"> 
                                        <label class="cont-produtos<?=$lista['id']?> btn btn-primary btn-sm">
                                        0 Produtos
                                        </label>
                                        <label data-toggle="modal" data-target="#modalprodutos<?= $lista['id']?>" class="btn btn-success btn-sm">
                                            Adicionar Produto
                                            <i class="fa fa-shopping-basket"></i>
                                        </label>
                                        
                                        <label class="btn btn-danger btn-sm ml-2" for="addlistacarrinho<?=$lista['id']?>">
                                          Adicionar ao carrinho    
                                          <i class="fa fa-shopping-cart"></i>  
                                        </label>  
                                        
                                        <label class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#modal_lista<?= $lista['id']?>"></i>
                                        </label>
                                        
                                        <label class="btn btn-primary btn-sm fas fa-trash" for="apagar-lista<?=$lista['id']?>"> 
                                        </label>                                          
                                           
                                    </div>             
                                </div>

                                <!--========ADICIONAR LISTA AO CARRINHO========-->  
                                <form method="POST" enctype="multipart/form-data" action="../controller/addcarrinholistaController.php">         
                                <input class="d-none" id="addlistacarrinho<?=$lista['id']?>" type="submit" name="id" value="<?= $lista['id']?>">  
                                </form> 

                                <!--========DELETA LISTA DE COMPRAS========-->  
                                <form method="POST" id="form_endereco" enctype="multipart/form-data" action="../controller/deletelistaController.php">         
                                <input class="d-none" id="apagar-lista<?=$lista['id']?>" onclick="return confirm('Deseja realmente apagar a lista <?=$lista['nome']?>?');" type="submit" name="id" value="<?= $lista['id']?>">    
                                </form> 

                                <div class="bg-default tabela-itens<?=$lista['id']?> d-none">
                                    <?php
                                    $itemlistadecompras = new Itemlistadecompras(); 
                                    $itemlistadecompras = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']);
                                    $qtd_produtos=0;
                                    ?>
                                    <table class="table table-striped table-hover" id="lista-itens-produtos<?=$lista['id']?>">
                                            <thead>
                                              <tr><input style="width: 50%; margin: 0px auto" class="form-control" id="filtro-nome<?=$lista['id']?>" placeholder="Pesquisar..." /></tr>
                                            <tr>
                                                <th></th>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Medida</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody class="listar-compras<?=$lista['id']?>">
                              <?php foreach ($itemlistadecompras as $itemlista):?>
                                                       
                                                
                                                <tr class="item<?=$itemlista['id']?>">
                                                <td>


      <div class="desconto-site">
           <div class="desconto-texto-site"><?=$itemlista['desconto']?>%</div>
           <i class="fas fa-bookmark"></i>
      </div>
      <div class="item-carrinho">
      <img width="70" height="70px" src="../assets/img/upload_produtos/<?= $itemlista['img_01']?>">
      </div>         
      <div class="estrelas">
          <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
          <label for="cm_star-1"><i class="fa"></i></label>
          <input type="radio" id="cm_star-1" name="fb" value="1"/>
          <label for="cm_star-2"><i class="fa"></i></label>
          <input type="radio" id="cm_star-2" name="fb" value="2"/>
          <label for="cm_star-3"><i class="fa"></i></label>
          <input type="radio" id="cm_star-3" name="fb" value="3"/>
          <label for="cm_star-4"><i class="fa"></i></label>
          <input type="radio" id="cm_star-4" name="fb" value="4"/>
          <label for="cm_star-5"><i class="fa"></i></label>
          <input type="radio" id="cm_star-5" name="fb" value="5"/>
        </div>

                                                </td>  
                                                <td>
                                                    <?= $itemlista['nome']?>
                                                </td> 
                                                <td>
                                                     <span class="text-danger">
                                                      <strike>
                                                      R$ <?=number_format($itemlista['valor'],2,",",".")?>
                                                        
                                                      </strike>
                                                    </span>
                                                    <h4>
                                                      R$ <?= number_format(($itemlista['valor']*(100-$itemlista['desconto']))/100,2,",",".")?>
                                                    </h4>
                                                </td>   
                                                <!--<td class="lista-unidade-produto<?=$itemlista['id_produto']?>">-->
                                                <td>
                                                  <?php
                                                  if ($itemlista['medida']==1){
                                                    echo "R$";
                                                  }
                                                  if ($itemlista['medida']==2){
                                                    echo "Kg";
                                                  }
                                                  if ($itemlista['medida']==3){
                                                    echo "Kg";
                                                  }
                                                  if ($itemlista['medida']==4){
                                                    echo "Und";
                                                  }    
                                                  if ($itemlista['medida']==5){
                                                    echo "Und";
                                                  }
                                                  if ($itemlista['medida']==6){
                                                    echo "Und";
                                                  }
                                                  if ($itemlista['medida']==7){
                                                    echo "Und";
                                                  }
                                                  ?>  
                                                </td> 
                                                <td>
                                                  <td>
                                                   <a class="item btn btn-info mais-detalhes produto<?=$itemlista['id_produto']?> d-none">Mais de detalhes...</a>
                                                  </td>
                                                  <td>
                                                    <form method="POST" id="form_item_lista<?=$itemlista['id']?>">
                                                                                        
                                                    <div class="btn btn-danger mt-2 remove-itemlista-compra remove-itemlista-compra<?=$itemlista['id']?> d-none">
                                                    Remover
                                                    </div> 
                                                    <input type="hidden" name="id" value="<?=$itemlista['id']?>">    
                                                    
                                                  </form>    
                                                  </td>   
                                                    
                                                </td> 
                                                </tr> 
                                                                               
                                            
                                            <?php
                                                $qtd_produtos++;
                                                ?>                             

                                    <?php endforeach?> 
                                    </tbody> 
                                    </table>
                                <?php
                                if ($qtd_produtos) {
                                } else {
                                    echo "<div class='text-secondary d-flex justify-content-center'>Adicione produtos na lista de compras</div>";
                                }
                                ?>
                                </div>
                                
                                <!--==================================-->
                                                        <!-- Modal -->
<div class="modal fade" id="modalprodutos<?= $lista['id']?>" tabindex="-1" role="dialog" aria-labelledby="modalprodutos" aria-hidden="true">
  <div class="modal-dialog mx-auto" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produtos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
        
        <table class="table table-striped table-hover table-bordered mt-4">
          <thead>
            <tr><input style="width: 50%; margin: 0px auto" class="form-control" id="filtro-nome" placeholder="Pesquisar..." /></tr>
            <tr>
                <th></th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Medida</th>
                <th></th>
            </tr>
          </thead>

          <tbody class="listar-compras">
          <?php foreach ($lista_produtos as $produtos):?>  
       <form action="../controller/caditemlistadecomprasController.php" method="POST" id="lista_produtos">   
       <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">
       <input type="hidden" name="lista_compras_fk" value="<?=$lista['id']?>">
       <input type="hidden" name="produtos_fk" value="<?=$produtos['id_produto']?>">  
      <tr>
        <td><img src="../assets/img/upload_produtos/<?=$produtos['img_01']?>" whidth="50px" height="50px"></td>
        <td><?=$produtos['nome']?></td>
        <td><?=$produtos['desconto']?>%</td>
        <td><?=$produtos['valor']?></td>
        <td><input type="submit" class="btn btn-success" name="enviar" value="Adicionar"></td>
      </tr>  
      </form>   
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


                                <?php endforeach?>  
                                
                                              
                            </div>

                        </div>            
                    

        </div>   
      </div>
    </div>
  </div>

<?php
include "../parts/modal_listadecompra.php";
//include '../view/modalprodutosView.php';
?> 

</div>


<?php  
} 
else 
{ 
  $_SESSION['msg'] = "<div class='alert alert-danger'>Área restrita! Faça login ou <a href='cadastroclienteView.php'>Cadastre-se</a></div>";
  header("Location: ../view/loginclienteView.php"); 
} 


include_once '../view/footerView.php';

?>

