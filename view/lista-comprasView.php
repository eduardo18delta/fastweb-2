 

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

           $(".listadecompras").fadeOut()
           $("#exampleModal").removeClass("modal")



          $(".add-lista-compra").click(function(){
          $(".listadecompras").removeClass("d-none")
          $(".listadecompras").addClass("modal")
          $(".listadecompras").fadeIn()
          $("#modal_produtos").css("filter", "blur(10px)");
           
          })     

          $(".fechar_lista").click(function(){       
          $(".listadecompras").fadeOut()
          $(".listadecompras").addClass("modal")
          $(".listadecompras").addClass("d-none")
          $("#modal_produtos").css("filter", "blur(0px)");
           
          })   

          $(".cadastrar-lista").click(function(){       
          $("#exampleModal").addClass("modal")
           
          })                              
                                                         

          //=============================

          


            <?php foreach ($listadecompras as $lista):?>

$(".tabela-itens<?=$lista['id']?>").hide()
$(".expandir-minimizar<?=$lista['id']?>").addClass("fas fa-plus icon-plus")

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
<?php
$qtd_produtos_js=0;
$itemlistadecompras_js = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']); 
?>           
<?php foreach ($itemlistadecompras_js as $itemlista_js):?>

<?=$qtd_produtos_js++?>;
$(".cont-produtos<?=$lista['id']?>").text("<?=$qtd_produtos_js?> Produtos")

<?php endforeach?>  




<?php endforeach?> 
          //============================

        }); // FIm do Jquery

    </script>


 <div class="listadecompras d-none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Produtos</h5>-->
        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-11 Cadastrar-lista" href="">Cadastrar nova lista de compra</a>
        <button type="button" class="close fechar_lista" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
      

        <div class="row">
                                <div class="col">
                                <form method="POST" id="form_endereco" enctype="multipart/form-data">
                                <?php foreach ($listadecompras as $lista):?>
                                
                                <div class="btn btn-primary btn-sm d-flex justify-content-between border border-white">
                                    <div class="btn btn-primary btn-sm expandir-minimizar<?=$lista['id']?>"></div>
                                    <div class="btn btn-primary btn-sm" style="font-family: optima; text-transform: uppercase;"><i><?= $lista['nome']?></i></div>
                                    <div class="d-flex"> 
                                        <div class="cont-produtos<?=$lista['id']?> btn btn-primary btn-sm">0 Produtos</div>
                                        <div data-toggle="modal" data-target="#modalprodutos<?= $lista['id']?>" class="btn btn-success btn-sm">Adicionar Produto<i class="fa fa-shopping-cart"></i></div>
                                        <div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>
                                        <div class="btn btn-primary btn-sm"><i class="fas fa-trash"></i></div>
                                             
                                    </div>             
                                </div>
                                  
                                <div class="bg-default tabela-itens<?=$lista['id']?>">
                                    <?php

                                    $itemlistadecompras = new Itemlistadecompras(); 
                                    $itemlistadecompras = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']);
                                    $qtd_produtos=0;
                                    ?>
                                    <table class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Descrição</th>
                                                <th>Valor</th>
                                                <th>Quantidade</th>
                                            </tr>
                                            </thead>
                              <?php foreach ($itemlistadecompras as $itemlista):?>
                                    
                                            <tbody>
                                                <td>
                                                    <img src="../assets/img/upload_produtos/<?= $itemlista['img_01']?>" width="70px" height="70px">
                                                </td>  
                                                <td>
                                                    <?= $itemlista['nome']?>
                                                </td> 
                                                <td>
                                                    <?= $itemlista['valor']?>
                                                </td>   
                                                <td>
                                                    <?= $itemlista['quantidade']?>
                                                </td>                                    
                                            </tbody>
                                            <?php
                                                $qtd_produtos++;
                                                ?>                             

                                    <?php endforeach?>  
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

                                <?php endforeach?>  
                                </form> 
                                              
                            </div>

                        </div>  


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>


<?php
//include "../parts/modal_listadecompra.php";
?> 