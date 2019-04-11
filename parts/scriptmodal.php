<!-- Ultimos produtos adicionados-->
<?php 

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

      $(".background_modal").fadeIn();
      $(".produto'.$modal['id_produto'].'").addClass("addproduto'.$modal['id_produto'].'")
      $(".nome").text("'.$modal['nome'].'")
      $(".valor").text("R$ '.$modal['valor'].',00")
      $(".descricao").text("'.$modal['descricao'].'")

    
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
        $(".desfocar").css("filter", "blur(0px)");
      })
      

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













