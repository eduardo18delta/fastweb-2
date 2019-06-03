 

<?php
require_once '../model/autoload.php'; 

 if(isset($_SESSION['id'])) {
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
          var produto_id = $(".form-produto-id").val()
          $("[name=produtos_fk]").val(produto_id)
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


<?php
$qtd_produtos_js=0;
$itemlistadecompras_js = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']); 
?>           
<?php foreach ($itemlistadecompras_js as $itemlista_js):?>

<?=$qtd_produtos_js++?>;
$(".cont-produtos<?=$lista['id']?>").text("<?=$qtd_produtos_js?> Produtos")

if ("<?=$itemlista_js['medida']?>"==1){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(R$)")
      }
      if ("<?=$itemlista_js['medida']?>"==2){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Kg)")
      }
      if ("<?=$itemlista_js['medida']?>"==3){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Kg)")
      }
      if ("<?=$itemlista_js['medida']?>"==4){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Und)")
      }    
      if ("<?=$itemlista_js['medida']?>"==5){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Und)")
      }
      if ("<?=$itemlista_js['medida']?>"==6){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Und)")
      }
      if ("<?=$itemlista_js['medida']?>"==7){
        $(".lista-unidade-produto<?=$itemlista_js['id_produto']?>").text("(Und)")
      }



$('.remove-itemlista-compra<?=$itemlista_js['id_produto']?>').click(function() {
 // var cont_pacientes = $('#consulta_pacientes').serialize();
   var lista_compras = new FormData($('#form_item_lista<?=$itemlista_js['id_produto']?>')[0]);

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
       
          $("#lista-itens-produtos<?=$lista['id']?>").load("../view/list-listadecomprasView.php #lista-itens-produtos<?=$lista['id']?>")

       }

       },
       error: function(response){
          alert ('erro')
       }
  });
  

  return false;
});

<?php endforeach?>  



$('.add-itemlista-compra<?=$lista['id']?>').click(function() {
 // var cont_pacientes = $('#consulta_pacientes').serialize();
   var lista_compras = new FormData($('#form_produtos<?=$lista['id']?>')[0]);

  $.ajax({
      type: 'POST',
      //dataType: 'json',
      url: '../controller/caditemlistadecomprasController.php',
      //async: true,
      contentType: false,
      processData: false,
      data: lista_compras,
      success: function(response) {

         if (response=='null') {
          //alert ('SELECIONE PACIENTES')
          alert(response)
         } else {
       
      $("#lista-itens-produtos<?=$lista['id']?>").load("../view/list-listadecomprasView.php #lista-itens-produtos<?=$lista['id']?>")

       }

       },
       error: function(response){
          alert ('erro')
       }
  });
  

  return false;
});





<?php endforeach?> 
          //============================


          

        }); // FIm do Jquery

    </script>


 <div class="listadecompras d-none">
  <div style="width: 70%; margin: 0 auto; margin-top: 70px; height: 500px; overflow-y: auto;">
    <div class="modal-content">
      <div class="modal-header">
        <!--<h5 class="modal-title" id="exampleModalLabel">Produtos</h5>-->
      <!--  <a data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-11 Cadastrar-lista" href="">Criar lista de compra</a> -->
      
      <div class="text-center text-white col-11">
        <strong><i  class="text-secondary"><i class="fas fa-clipboard-list"></i> ADICIONE ESTE ITEM NA SUA LISTA DE COMPRA</i></strong>
      </div>

        <button type="button" class="close fechar_lista" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">      
      

        <div class="row">
                                <div class="col">
                                <?php foreach ($listadecompras as $lista):?>
                                <form method="GET" id="form_lista_compras" enctype="multipart/form-data">
                                <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">
                                <div class="btn btn-primary btn-sm d-flex justify-content-between border border-white">
                                    <div class="btn btn-primary btn-sm expandir-minimizar<?=$lista['id']?>"></div>
                                    <div class="btn btn-primary btn-sm" style="font-family: optima; text-transform: uppercase;">
                                        <i><?= $lista['nome']?></i>
                                    </div>
                                    <div class="d-flex"> 
                                        <div class="cont-produtos<?=$lista['id']?> btn btn-primary btn-sm">
                                        0 Produtos
                                        </div>
                                        <div class="btn btn-success btn-sm add-itemlista-compra<?=$lista['id']?>">
                                            Adicionar Produto
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                        <!--
                                        <div class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit" data-toggle="modal" data-target="#modal_lista<?= $lista['id']?>"></i>
                                        </div>
                                        <div class="btn btn-primary btn-sm">
                                            <label class="fas fa-trash" for="apagar-lista<?=$lista['id']?>">          
                                            <input class="d-none" id="apagar-lista<?=$lista['id']?>" onclick="return confirm('Deseja realmente apagar a lista <?=$lista['nome']?>?');" type="submit" name="id" value="<?= $lista['id']?>">         
                                            </label>
                                        </div>
                                         -->      
                                    </div>             
                                </div>
                                </form>  
                                  
                                <div class="bg-default tabela-itens<?=$lista['id']?>">
                                    <?php
                                    $itemlistadecompras = new Itemlistadecompras(); 
                                    $itemlistadecompras = $itemlistadecompras->listaItemlistadecompras($idusuario, $lista['id']);
                                    $qtd_produtos=0;
                                    ?>
                                     <form method="POST" id="form_produtos<?=$lista['id']?>">
                                             <input type="hidden" name="cliente_fk" value="<?=$_SESSION['id']?>">
                                             <input type="hidden" name="lista_compras_fk" value="<?=$lista['id']?>">
                                             <input type="hidden" name="produtos_fk" value=""> 
                                             </form> 
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
                                                                              
                                                <form method="POST" action="../controller/deleteitemlistaController.php">
                                                <tr>
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
                                                <td class="lista-unidade-produto<?= $itemlista['id_produto']?>">
                                                    
                                                </td> 
                                                <td>
                                                   <form method="POST" id="form_item_lista<?=$itemlista['id_produto']?>">
                                                                                        
                                                    <div class="btn btn-danger mt-2" id="remove-itemlista-compra<?=$itemlista['id_produto']?>">
                                                    Remover
                                                    </div> 
                                                    <input type="hidden" name="id" value="<?=$itemlista['id_produto']?>">    
                                                    
                                                  </form>
                                                </td>
                                                </tr>  
                                                </form>                                  
                                            
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

                                <?php endforeach?>  
                                
                                              
                            </div>

                        </div>  


      </div>
      <div class="modal-footer">
        <a class="btn btn-success col-11 text-center" href="../view/list-listadecomprasView.php">Gerenciar minha lista de compras   <i class="fas fa-arrow-circle-right icon-plus"></i></a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>     
      </div>
    </div>
  </div>
</div>


<?php
}

//include "../parts/modal_listadecompra.php";
?> 