<!-- Ultimos produtos adicionados-->
<?php 
//============SESSÃO CARRINHO==============
if (!isset($_SESSION)) {
  session_start();
} 
     
if(!isset($_SESSION['carrinho'])){
   $_SESSION['carrinho'] = array();
}

if(!isset($_SESSION['teste2'])){
   $_SESSION['teste2'] = array();
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

$peso = $modal['peso'];
$valor = number_format($peso,2,".",".");
 //=============Abaixo, a variável "$conteudo" recebe todo o script do funcionamento do modal=============>
 $conteudo = '
      $(document).ready(function(){
     
      $(".produto'.$modal['id_produto'].'").click(function(){ 
      $(".remover-produto").addClass("remover-produto'.$modal['id_produto'].'")
      $(".add-carrinho").addClass("add-carrinho'.$modal['id_produto'].'")
      $(".item-medida").addClass("item-medida'.$modal['id_produto'].'")
      $(".remover-produto'.$modal['id_produto'].'").hide()
      $(".add-carrinho'.$modal['id_produto'].'").show()

      $(".form-produto-id").val('.$modal['id_produto'].');
      $(".modal-qtd-produto").attr("name","qtd-produto['.$modal['id_produto'].']")
      $(".modal-qtd-produto").addClass("modal-qtd-produto'.$modal['id_produto'].'")
      $(".modal-qtd-produto").val('.$modal['quantidade'].')
      $(".background_modal").fadeIn();
      $(".produto'.$modal['id_produto'].'").addClass("addproduto'.$modal['id_produto'].'")
      $(".nome").text("'.$modal['nome'].'")
      $(".valor").text("R$ '.$valor.'")
      $(".descricao").text("'.$modal['descricao'].'")
      $(".desconto-icon").text("'.$modal['desconto'].'%")
      $(".valor").addClass("valor'.$modal['id_produto'].'")
      
      $(".rs").addClass("rs'.$modal['id_produto'].'")
      $(".kg").addClass("kg'.$modal['id_produto'].'")
      $(".und").addClass("und'.$modal['id_produto'].'")

     if ("'.$modal['medida'].'"==1){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").hide()
        $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
        $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
        $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
        $(".rs'.$modal['id_produto'].'").css("background-color","#000")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#fff")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("rs")
      }
      if ("'.$modal['medida'].'"==2){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").hide()
        $(".carrinho-add-valor'.$modal['id_produto'].'").text("Peso (Kg)")
        $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
        $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal em (Kg)")
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#000")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#fff")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("kg")
      }
      if ("'.$modal['medida'].'"==3){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").hide()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#000")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#fff")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("kg")
      }
      if ("'.$modal['medida'].'"==4){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }    
      if ("'.$modal['medida'].'"==5){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }
      if ("'.$modal['medida'].'"==6){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }
      if ("'.$modal['medida'].'"==7){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }

      //Lista as medidas de forma atualizada
      listar_medida()

      

consulta_medida()

$(".rs'.$modal['id_produto'].'").click(function() {
    $("[name=opcao-medida]").val("rs")
    $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
    $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
    $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
    $(".rs'.$modal['id_produto'].'").css("background-color","#000")
    $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
    $(".und'.$modal['id_produto'].'").css("background-color","#fff")
    $(".rs'.$modal['id_produto'].'").css("color","#fff")
    $(".kg'.$modal['id_produto'].'").css("color","#000")
    $(".und'.$modal['id_produto'].'").css("color","#000")
    $(".rs'.$modal['id_produto'].'").addClass("medida_ativo")
    $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
    $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
    consulta_medida()

          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });  

$(".kg'.$modal['id_produto'].'").click(function() {
  $("[name=opcao-medida]").val("kg")
  $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
  $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
  $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
  $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
  $(".kg'.$modal['id_produto'].'").css("background-color","#000")
  $(".und'.$modal['id_produto'].'").css("background-color","#fff")
  $(".rs'.$modal['id_produto'].'").css("color","#000")
  $(".kg'.$modal['id_produto'].'").css("color","#fff")
  $(".und'.$modal['id_produto'].'").css("color","#000")
  $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
  $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
  consulta_medida()

          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });  
  
$(".und'.$modal['id_produto'].'").click(function() {
  $("[name=opcao-medida]").val("und")
  $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
  $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
  $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
  $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
  $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
  $(".und'.$modal['id_produto'].'").css("background-color","#000")
  $(".rs'.$modal['id_produto'].'").css("color","#000")
  $(".kg'.$modal['id_produto'].'").css("color","#000")
  $(".und'.$modal['id_produto'].'").css("color","#fff")
  $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
  consulta_medida()

          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });

$(".modal-qtd-produto").keyup(function() {
consulta_medida()
})

function consulta_medida(){

    $.post("../parts/medida.php",function(dados) {
//alert (dados)
      id=0

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){

if ($(".rs").hasClass("medida_ativo")) {
// R$
var rs = $(".modal-qtd-produto").val()  
$(".valor").text("R$ "+rs+".00")
}
if ($(".kg").hasClass("medida_ativo")) {               
// Kg
var kg = $(".modal-qtd-produto").val() 
total = (kg*dados[id+1])/dados[id+2]

total = Math.round(total*100)/100
$(".valor"+dados[id]).text("R$ "+total) 
}   
if ($(".und").hasClass("medida_ativo")) { 
//UND
var und = $(".modal-qtd-produto").val()  
total = und*dados[id+1]
$(".valor"+dados[id]).text("R$ "+total+".00")  
}
      id+=3

    }  

    }


//alert (id+1)
// $(".dependente-registro-atual").val(id+1)
        

    }, "JSON");


}
//setInterval(consulta_medida, 100)
      

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
        $(".modal-qtd-produto").removeClass("modal-qtd-produto'.$modal['id_produto'].'")
        $(".valor").removeClass("valor'.$modal['id_produto'].'")
        $(".item-medida").removeClass("item-medida'.$modal['id_produto'].'")
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
        $(".remover-produto").removeClass("remover-produto'.$modal['id_produto'].'")
        $(".add-carrinho").removeClass("add-carrinho'.$modal['id_produto'].'")
        $(".modal-qtd-produto").removeClass("modal-qtd-produto'.$modal['id_produto'].'")
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


if ("'.$modal['medida'].'"==1){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").hide()
        $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
        $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
        $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
        $(".rs'.$modal['id_produto'].'").css("background-color","#000")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#fff")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("rs")
      }
      if ("'.$modal['medida'].'"==2){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").hide()
        $(".carrinho-add-valor'.$modal['id_produto'].'").text("Peso (Kg)")
        $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
        $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal em (Kg)")
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#000")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#fff")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("kg")
      }
      if ("'.$modal['medida'].'"==3){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").hide()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#000")
        $(".und'.$modal['id_produto'].'").css("background-color","#fff")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#fff")
        $(".und'.$modal['id_produto'].'").css("color","#000")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".opcao-medida").val("kg")
      }
      if ("'.$modal['medida'].'"==4){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }    
      if ("'.$modal['medida'].'"==5){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").hide()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }
      if ("'.$modal['medida'].'"==6){
        $(".rs'.$modal['id_produto'].'").hide()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }
      if ("'.$modal['medida'].'"==7){
        $(".rs'.$modal['id_produto'].'").show()
        $(".kg'.$modal['id_produto'].'").show()
        $(".und'.$modal['id_produto'].'").show()
        $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
        $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
        $(".und'.$modal['id_produto'].'").css("background-color","#000")
        $(".rs'.$modal['id_produto'].'").css("color","#000")
        $(".kg'.$modal['id_produto'].'").css("color","#000")
        $(".und'.$modal['id_produto'].'").css("color","#fff")
        $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
        $(".und'.$modal['id_produto'].'").addClass("medida_ativo")
        $(".opcao-medida").val("und")
      }

      
$(".rs'.$modal['id_produto'].'").click(function() {
    $("[name=opcao-medida]").val("rs")
    $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
    $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
    $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
    $(".rs'.$modal['id_produto'].'").css("background-color","#000")
    $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
    $(".und'.$modal['id_produto'].'").css("background-color","#fff")
    $(".rs'.$modal['id_produto'].'").css("color","#fff")
    $(".kg'.$modal['id_produto'].'").css("color","#000")
    $(".und'.$modal['id_produto'].'").css("color","#000")
    $(".rs'.$modal['id_produto'].'").addClass("medida_ativo")
    $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
    $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")


          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });  

$(".kg'.$modal['id_produto'].'").click(function() {
  $("[name=opcao-medida]").val("kg")
  $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
  $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
  $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
  $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
  $(".kg'.$modal['id_produto'].'").css("background-color","#000")
  $(".und'.$modal['id_produto'].'").css("background-color","#fff")
  $(".rs'.$modal['id_produto'].'").css("color","#000")
  $(".kg'.$modal['id_produto'].'").css("color","#fff")
  $(".und'.$modal['id_produto'].'").css("color","#000")
  $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".kg'.$modal['id_produto'].'").addClass("medida_ativo")
  $(".und'.$modal['id_produto'].'").removeClass("medida_ativo")


          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });  
  
$(".und'.$modal['id_produto'].'").click(function() {
  $("[name=opcao-medida]").val("und")
  $(".carrinho-add-valor'.$modal['id_produto'].'").text("Valor (R$)")
  $(".carrinho-valor'.$modal['id_produto'].'").text("Valor (UND)")
  $(".carrinho-subtotal'.$modal['id_produto'].'").text("Subtotal (R$)")
  $(".rs'.$modal['id_produto'].'").css("background-color","#fff")
  $(".kg'.$modal['id_produto'].'").css("background-color","#fff")
  $(".und'.$modal['id_produto'].'").css("background-color","#000")
  $(".rs'.$modal['id_produto'].'").css("color","#000")
  $(".kg'.$modal['id_produto'].'").css("color","#000")
  $(".und'.$modal['id_produto'].'").css("color","#fff")
  $(".rs'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".kg'.$modal['id_produto'].'").removeClass("medida_ativo")
  $(".und'.$modal['id_produto'].'").addClass("medida_ativo")


          var add_medida = new FormData($("#carrinho_produtos'.$modal['id_produto'].'")[0]);
 
            $.ajax({
                type: "POST",
                //dataType: "json",
                url: "../model/Carrinho.class.php",
                //async: true,
                contentType: false,
                processData: false,
                data: add_medida,
                success: function(dados) {
//alert (dados)
                 },
                 error: function(response){
                    alert ("erro")
                 }
            });

            return false;
        });      

listar_medida()
function listar_medida(){

    $.post("../model/Carrinho.class.php",function(dados) {

      id=0

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){

            $(".rs"+dados[id]).css("background-color","#000")
            $(".kg"+dados[id]).css("background-color","#fff")
            $(".und"+dados[id]).css("background-color","#fff")
            $(".rs"+dados[id]).css("color","#fff")
            $(".kg"+dados[id]).css("color","#000")
            $(".und"+dados[id]).css("color","#000")
            $(".rs"+dados[id]).addClass("medida_ativo")
            $(".kg"+dados[id]).removeClass("medida_ativo")
            $(".und"+dados[id]).removeClass("medida_ativo")


            if (dados[id+4]=="rs"){
              $(".carrinho-add-valor"+dados[id]).text("Valor (R$)")
              $(".carrinho-valor"+dados[id]).text("Valor (UND)")
              $(".carrinho-subtotal"+dados[id]).text("Subtotal (R$)")
              $(".rs"+dados[id]).css("background-color","#000")
              $(".kg"+dados[id]).css("background-color","#fff")
              $(".und"+dados[id]).css("background-color","#fff")
              $(".rs"+dados[id]).css("color","#fff")
              $(".kg"+dados[id]).css("color","#000")
              $(".und"+dados[id]).css("color","#000")
              $(".rs"+dados[id]).addClass("medida_ativo")
              $(".kg"+dados[id]).removeClass("medida_ativo")
              $(".und"+dados[id]).removeClass("medida_ativo")
            } else if (dados[id+4]=="kg"){   
              $(".carrinho-add-valor"+dados[id]).text("Peso (Kg)")
              $(".carrinho-valor"+dados[id]).text("Valor (UND)")
              $(".carrinho-subtotal"+dados[id]).text("Subtotal em (Kg)")
              $(".rs"+dados[id]).css("background-color","#fff")
              $(".kg"+dados[id]).css("background-color","#000")
              $(".und"+dados[id]).css("background-color","#fff")
              $(".rs"+dados[id]).css("color","#000")
              $(".kg"+dados[id]).css("color","#fff")
              $(".und"+dados[id]).css("color","#000")
              $(".rs"+dados[id]).removeClass("medida_ativo")
              $(".kg"+dados[id]).addClass("medida_ativo")
              $(".und"+dados[id]).removeClass("medida_ativo")
            } else if (dados[id+4]=="und"){       
              $(".carrinho-add-valor"+dados[id]).text("Quantidade (UND)")
              $(".carrinho-valor"+dados[id]).text("Valor (UND)")
              $(".carrinho-subtotal"+dados[id]).text("Subtotal (UND)")
              $(".rs"+dados[id]).css("background-color","#fff")
              $(".kg"+dados[id]).css("background-color","#fff")
              $(".und"+dados[id]).css("background-color","#000")
              $(".rs"+dados[id]).css("color","#000")
              $(".kg"+dados[id]).css("color","#000")
              $(".und"+dados[id]).css("color","#fff")
              $(".rs"+dados[id]).removeClass("medida_ativo")
              $(".kg"+dados[id]).removeClass("medida_ativo")
              $(".und"+dados[id]).addClass("medida_ativo")
            } 

/*
            if (dados[id+4]=="rs"){
            $(".rs").css("background-color","#000")
            $(".kg").css("background-color","#fff")
            $(".und").css("background-color","#fff")
            $(".rs").css("color","#fff")
            $(".kg").css("color","#000")
            $(".und").css("color","#000")
            $(".rs").addClass("medida_ativo")
            $(".kg").removeClass("medida_ativo")
            $(".und").removeClass("medida_ativo")
            $(".opcao-medida").val("rs")

          } else if (dados[id+4]=="kg"){
            $(".rs").css("background-color","#fff")
            $(".kg").css("background-color","#000")
            $(".und").css("background-color","#fff")
            $(".rs").css("color","#000")
            $(".kg").css("color","#fff")
            $(".und").css("color","#000")
            $(".rs").removeClass("medida_ativo")
            $(".kg").addClass("medida_ativo")
            $(".und").removeClass("medida_ativo")
            $(".opcao-medida").val("kg")

          } else if (dados[id+4]=="und"){
            $(".rs").css("background-color","#fff")
            $(".kg").css("background-color","#fff")
            $(".und").css("background-color","#000")
            $(".rs").css("color","#000")
            $(".kg").css("color","#000")
            $(".und").css("color","#fff")
            $(".rs").removeClass("medida_ativo")
            $(".kg").removeClass("medida_ativo")
            $(".und").addClass("medida_ativo")
            $(".opcao-medida").val("und")
          }         
*/
          $(".item-medida"+dados[id]).addClass("item-medida-modal"+dados[id]) 


          $(".item-medida-modal"+dados[id]).click(function() {
               
                       var add_pdt_modal = new FormData($("#modal_produtos")[0]);
           
                      $.ajax({
                          type: "POST",
                          //dataType: "json",
                          url: "../model/Carrinho.class.php",
                          //async: true,
                          contentType: false,
                          processData: false,
                          data: add_pdt_modal,
                          success: function(dados) {

                           },
                           error: function(response){
                              alert ("erro")
                           }
                      });
                      

                      return false;
                  }); 
            $(".modal-qtd-produto"+dados[id]).val(dados[id+6])
            $(".modal-qtd-produto"+dados[id]).addClass("modal-qtd-produto-ativo"+dados[id])
            $(".modal-qtd-produto-ativo"+dados[id]).keyup(function() {
            qtd = $(".modal-qtd-produto'.$modal['id_produto'].'").val()
            $(".qtd-produto'.$modal['id_produto'].'").val(qtd)
            
                   var add_carrinho = new FormData($("#modal_produtos")[0]);
       
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
          
     
      id+=7

    }  

    }


//alert (id+1)
// $(".dependente-registro-atual").val(id+1)
        

    }, "JSON");


}



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













