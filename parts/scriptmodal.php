<!-- Ultimos produtos adicionados-->
<?php 
//============SESSÃO CARRINHO==============
if (!isset($_SESSION)) {
  session_start();
} 
     
if(!isset($_SESSION['carrinho'])){
   $_SESSION['carrinho'] = array();
}

//REMOVER PRODUTO DO CARRINHO

if(isset($_POST['rm-produto'])){
  $id_produto = intval($_POST['form-produto-id']);
  if(isset($_SESSION['carrinho'][$id_produto])){
     unset($_SESSION['carrinho'][$id_produto]);
  }
}   

//<!--++++++++++++++++++++++++++++++++ESTANCIAMENTO+++++++++++++++++++++++++++++++++++++-->
require_once '../model/autoload.php'; $produtos_modal = new Produtos(); 
$listar_produtos=$produtos_modal->listarDestaque();


         //<!--+++++++++++++++++++++++++++++BEM VINDO SCRIPT MODAL+++++++++++++++++++++++++++++++++-->

 foreach($listar_produtos as $modal): //O foreach irá repetir esse script conforme a QTD de produtos


 $w="'"; //Variável que armazena uma aspa simples para ser usado no script abaixo


 //=============Abaixo, a variável "$conteudo" recebe todo o script do funcionamento do modal=============>
 $conteudo = '
      $(document).ready(function(){
     
      $(".produto'.$modal['id_produto'].'").click(function(){ 

      $(".form-produto-id").val('.$modal['id_produto'].');
      $(".modal-qtd-produto").attr("name","qtd-produto['.$modal['id_produto'].']")
      $(".background_modal").fadeIn();
      $(".produto'.$modal['id_produto'].'").addClass("addproduto'.$modal['id_produto'].'")
      $(".nome").text("'.$modal['nome'].'")
      $(".valor").text("R$ '.$modal['valor'].',00")
      $(".descricao").text("'.$modal['descricao'].'")
      $(".desconto-icon").text("'.$modal['desconto'].'%")
      $(".qtd-produto'.$modal['id_produto'].'").val()
      $(".valor").addClass("valor'.$modal['id_produto'].'")
      $(".remover-produto").addClass("remover-produto'.$modal['id_produto'].'")
      $(".add-carrinho").addClass("add-carrinho'.$modal['id_produto'].'")
      $(".remover-produto'.$modal['id_produto'].'").hide()
      $(".add-carrinho'.$modal['id_produto'].'").show()
      

      if ("'.$modal['medida'].'"==1){
        $(".rs").show()
        $(".kg").hide()
        $(".und").hide()
      }
      if ("'.$modal['medida'].'"==2){
        $(".rs").hide()
        $(".kg").show()
        $(".und").hide()
      }
      if ("'.$modal['medida'].'"==3){
        $(".rs").show()
        $(".kg").show()
        $(".und").hide()
      }
      if ("'.$modal['medida'].'"==4){
        $(".rs").hide()
        $(".kg").hide()
        $(".und").show()
      }    
      if ("'.$modal['medida'].'"==5){
        $(".rs").show()
        $(".kg").hide()
        $(".und").show()
      }
      if ("'.$modal['medida'].'"==6){
        $(".rs").hide()
        $(".kg").show()
        $(".und").show()
      }
      if ("'.$modal['medida'].'"==7){
        $(".rs").show()
        $(".kg").show()
        $(".und").show()
      }
      
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/'.$modal['img_01'].'")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/'.$modal['img_02'].'")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/'.$modal['img_03'].'")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/'.$modal['img_04'].'")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/'.$modal['img_05'].'")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/'.$modal['img_06'].'")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/'.$modal['img_01'].'")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/'.$modal['img_02'].'")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/'.$modal['img_03'].'")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/'.$modal['img_04'].'")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/'.$modal['img_05'].'")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/'.$modal['img_06'].'")

      $(".produto_img_01").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")
      $(".produto_img_02").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")
      $(".produto_img_03").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")
      $(".produto_img_04").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")
      $(".produto_img_05").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")
      $(".produto_img_06").attr("onerror","this.src='.$w.'../assets/img/upload_produtos/'.$modal['img_01'].$w.'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto'.$modal['id_produto'].'").removeClass("addproduto'.$modal['id_produto'].'")
        $(".remover-produto").removeClass("remover-produto'.$modal['id_produto'].'")
         $(".add-carrinho").removeClass("add-carrinho'.$modal['id_produto'].'")
        $(".desfocar").css("filter", "blur(0px)");
      })
      
      $(".comprar-produto").click(function(){
        $(".background_modal").fadeOut();
        $(".desfocar").css("filter", "blur(0px)");
        window.location.href = "../view/carrinhoView.php";
      })

      $(".add-carrinho").click(function(){
        $(".background_modal").fadeOut();
        $(".produto'.$modal['id_produto'].'").removeClass("addproduto'.$modal['id_produto'].'")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

      $(".qtd-produto'.$modal['id_produto'].'").keyup(function() {

             var add_carrinho = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_carrinho,
                success: function(dados) {

                 },
                 error: function(response){
                    alert ("erro")
                 }
            });
            
        
            return false;
        });



});

';

//Abaixo, este método irá gerar os scripts no servidor e armazenar as informações recebida da variável "$conteudo"

file_put_contents("../assets/js/produtos/produto".$modal['id_produto'].".js", $conteudo);
?>


<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>

<!--=========Os scripts gerados são carregados aqui================-->
<script type="text/javascript" src="../assets/js/produtos/produto<?= $modal['id_produto']?>.js"></script>


<?php endforeach?>













