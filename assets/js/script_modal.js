
$(document).ready(function(){

$(".background_modal").fadeOut("fast"); 
$(".modal").css("display", "block"); 

$(".rm-medida").click(function(){
  $add = $(".valor-medida input").val()
  $total = $add--
  $(".valor-medida input").val($add)
})

$(".add-medida").click(function(){
  $add = $(".valor-medida input").val()
  $total = $add++
  $(".valor-medida input").val($add)
})

 



    //identifica o slideshow
    $slide_img = $(".slides_img");
    //inicialmente esconde os slides
    $slide_img.find("img.slide_produtos").hide();
    //encontra o prmeiro slide e ativa-o
    $medida_ativo = $slide_img.find("img.slide_produtos").first().addClass("medida_ativo").show();


    $slide2 = $(".slides_img");
    //inicialmente esconde os slides
    $slide2.find("img.slide_produtos").hide();
    //encontra o prmeiro slide e ativa-o
    $medida_ativo2 = $slide_img.find("img.slide_produtos").first().addClass("medida_ativo2").show();

    $("#slide_direita").click(function(){



      $medida_ativo2.hide();
      //esconde o slide atual
      $medida_ativo.hide();

      //procura o proximo
      $medida_ativo = $slide_img.find("img.medida_ativo").next();
      if(!$medida_ativo.length) $medida_ativo = $slide_img.find("img.slide_produtos").first();//volta ao primeiro
      //remove o marcador do slide anterior
      $slide_img.find("img.medida_ativo").removeClass("medida_ativo");
      //coloca o marcador e mostra
      $medida_ativo.addClass("medida_ativo").show();


    });
    //ao clicar mostra o slide anterior

    $("#slide_esquerda").click(function(){


      $medida_ativo2.hide();
      $medida_ativo.hide();
      $medida_ativo = $slide_img.find("img.medida_ativo").prev();
      if(!$medida_ativo.length) $medida_ativo = $slide_img.find("img.slide_produtos").last();//volta ao ultimo
      $slide_img.find("img.medida_ativo").removeClass("medida_ativo");
      $medida_ativo.addClass("medida_ativo").show();


    });



    $(".img_produto_hover01").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_01").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
     });
    $(".img_produto_hover02").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_02").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
     });
     $(".img_produto_hover03").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_03").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
    });
     $(".img_produto_hover04").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_04").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
    });
     $(".img_produto_hover05").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_05").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
    });
     $(".img_produto_hover06").hover(function(){
      $medida_ativo.hide();
      $medida_ativo2.hide();
      $medida_ativo2 = $slide2.find(".produto_img_06").addClass("medida_ativo2").show();
      $medida_ativo = $medida_ativo2
    });


/*

   // POSIÇÃO ABSOLUTA DO CONTEUDO NA TELA
    var pos_x = $(".produto_img_01").offset().left; //posição horizontal da imagem do produto
    var pos_y = $(".produto_img_01").offset().top; //posição verticao da imagem do produto

    // LARGURA E ALTURA DO CONTAINER
    var container_x = $("#container_image").width(); //largura do container onde fica a imagem de zoom
    var container_y = $("#container_image").height(); //altura do container onde fica a imagem de zoom
    
    // LARGURA E ALTURA DO CONTEUDO
    var conteudo_x = $("#image01").width(); //largura da imagem de zom
    var conteudo_y = $("#image01").height(); //altura da imagem de zoom
    
    // LARGURA E ALTURA DO#thumb
    var thumb_x = $(".produto_img_01").width(); // largura da imagem don produto
    var thumb_y = $(".produto_img_01").height(); //altura da imagem do produto
    
    // QUANTOS PX DO CONTEÚDO FICAM PRA FORA DO CONTAINER
    var diferenca_x = conteudo_x - container_x; //largura do container - a largura da imagem de zoom
    var diferenca_y = conteudo_y - container_y; //altura do container - a altura da imagem de zoom
    
     // alert (diferenca_x)
     // alert (diferenca_y)
    // POSICAO INICIAL ( na metade da tela)
    var metade_x = - parseInt(diferenca_x / 2);
    var metade_y = - parseInt(diferenca_y / 2);
    
 // POSICIONANDO CONTEUDO
   $(".container_zoom").hide()
   $("#image01").hide()
   $("#image02").hide()
   $("#image03").hide()
   $("#image04").hide()
   $("#image05").hide()
   $("#image06").hide()
    $(".produto_img_01").mousemove(function(e){
      $(".avaliacao").css("display", "none")
      $(".container_zoom").show()
      $("#image01").show()
      porcentagem_x = parseInt( e.pageX / thumb_x * 100);
      porcentagem_y = parseInt( e.pageY / thumb_y * 100);

      leftPosition = parseInt(0 - (diferenca_x  / 100 * porcentagem_x ));
      topPosition = parseInt(0 - (diferenca_y  / 100 * porcentagem_y ));
      $("#image01").css({
        "right":leftPosition,
        "top":topPosition

      });
     //$("#image01").animate({height: "250%"},0)
     //$("#image01").animate({width: "350%"},0)
     
    });         
    
$(".produto_img_01").mouseout(function(e){
  $(".avaliacao").css("display", "block")
   $(".container_zoom").hide()
   $("#image01").hide()
})


//========

// POSIÇÃO ABSOLUTA DO CONTEUDO NA TELA
    var pos_x = $(".produto_img_02").offset().left; //posição horizontal da imagem do produto
    var pos_y = $(".produto_img_02").offset().top; //posição verticao da imagem do produto

    // LARGURA E ALTURA DO CONTAINER
    var container_x = $("#container_image").width(); //largura do container onde fica a imagem de zoom
    var container_y = $("#container_image").height(); //altura do container onde fica a imagem de zoom
    
    // LARGURA E ALTURA DO CONTEUDO
    var conteudo_x = $("#image02").width(); //largura da imagem de zom
    var conteudo_y = $("#image02").height(); //altura da imagem de zoom
    
    // LARGURA E ALTURA DO#thumb
    var thumb_x = $(".produto_img_02").width(); // largura da imagem don produto
    var thumb_y = $(".produto_img_02").height(); //altura da imagem do produto
    
    // QUANTOS PX DO CONTEÚDO FICAM PRA FORA DO CONTAINER
    var diferenca_x = conteudo_x - container_x; //largura do container - a largura da imagem de zoom
    var diferenca_y = conteudo_y - container_y; //altura do container - a altura da imagem de zoom
    
     // alert (diferenca_x)
     // alert (diferenca_y)
    // POSICAO INICIAL ( na metade da tela)
    var metade_x = - parseInt(diferenca_x / 2);
    var metade_y = - parseInt(diferenca_y / 2);
    
 // POSICIONANDO CONTEUDO
   $(".container_zoom").hide()
   $("#image01").hide()
   $("#image02").hide()
   $("#image03").hide()
   $("#image04").hide()
   $("#image05").hide()
   $("#image06").hide()
    $(".produto_img_02").mousemove(function(e){
      $(".avaliacao").css("display", "none")
      $(".container_zoom").show()
      $("#image02").show()
      porcentagem_x = parseInt( e.pageX / thumb_x * 100);
      porcentagem_y = parseInt( e.pageY / thumb_y * 100);

      leftPosition = parseInt(0 - (diferenca_x  / 100 * porcentagem_x ));
      topPosition = parseInt(0 - (diferenca_y  / 100 * porcentagem_y ));
      $("#image02").css({
        "right":leftPosition,
        "top":topPosition

      });
     $("#image02").animate({height: "250%"},0)
     $("#image02").animate({width: "350%"},0)
     
    });         
    
$(".produto_img_02").mouseout(function(e){
  $(".avaliacao").css("display", "block")
   $(".container_zoom").hide()
   $("#image02").hide()
})
*/



//Animação de alerta ao adicionar produto no carrinho
/*
$(".cont_add_produto").hide()
var cont_add_produto=0
$(".add-carrinho").click(function(){

   // if ($(".vender").hasClass("acesso_permitido")) {

            $(".cont_add_produto").show()
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "85px"},100)
            $(".cont_add_produto").animate({right: "95px"},100)
            $(".cont_add_produto").animate({right: "90px"},100)

            cont_add_produto++
            $(".cont_add_produto").text(cont_add_produto)

         /*   } else {
            $(".background_login").fadeIn();
            }
          
})
*/

//AJAx

$('[name=add-carrinho]').click(function() {
           // var cont_pacientes = $('#consulta_pacientes').serialize();
           // alert (cont_pacientes)
             var add_carrinho = new FormData($('#modal_produtos')[0]);
 
            $.ajax({
                type: 'POST',
                //dataType: 'json',
                url: '../model/Carrinho.class.php',
                //async: true,
                contentType: false,
                processData: false,
                data: add_carrinho,
                success: function(response) {
         
                   if (response=='null') {
                    //alert ('SELECIONE PACIENTES')
                    alert(response)
                   } else {
                  $(".cont_add_produto").show() 
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "85px"},100)
                  $(".cont_add_produto").animate({right: "95px"},100)
                  $(".cont_add_produto").animate({right: "90px"},100)
                  $(".cont_add_produto").text(response)
                if (response==1) {
               // alert ("ok")

        } else {
               // alert ("erro")
             }

                 }

                 },
                 error: function(response){
                    alert ('erro')
                 }
            });
            
        
            return false;
        });

//================REMOVER CARRINHO========================


// Ajax recept
/*
$(".qtd-produto19").keyup(function() {
           // var cont_pacientes = $('#consulta_pacientes').serialize();
           //alert ("ok")
             var add_carrinho = new FormData($('#carrinho_produtos')[0]);
 
            $.ajax({
                type: 'POST',
                //dataType: 'json',
                url: '../controller/ajaxcarrinhoController2.php',
                //async: true,
                contentType: false,
                processData: false,
                data: add_carrinho,
                success: function(dados) {
               
                 id=0
                  valor_produtos=1
                  valor_total=2
                  qtd_total=3

                for (var i = 0; i < dados.length; i++) {                        

                if (i==id){
                  //var qtd = $(".carrinho-qtd-produto").val()
                  //alert (qtd)
//alert (qtd)
               //   $(".valor-produto"+dados[id]).text(qtd)
                  //$("body").css("background-color","red")
                  
                 //alert(dados[id+2])

                  id+=2
                }  

                }

                

                 },
                 error: function(response){
                    alert ('erro')
                 }
            });
            
        
            return false;
        });
*/

//==========================CONSULTA DEPENDEnTES=======================
//$(".qtd-produto").keyup(function(){
//        alert("ok")
//      })




  $(".rs").css("background-color","#fff")
  $(".kg").css("background-color","#fff")
  $(".und").css("background-color","#000")
  $(".rs").css("color","#000")
  $(".kg").css("color","#000")
  $(".und").css("color","#fff")
  $(".und").addClass("medida_ativo")

consulta_medida()
function consulta_medida(){

    $.post('../parts/medida.php',function(dados) {
//alert (dados)
      id=0

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){
//====================


$(".rs").click(function(){
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
})

$(".kg").click(function(){
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
})

$(".und").click(function(){
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
})

//====================
if ($(".rs").hasClass("medida_ativo")) {
// R$
var rs = $(".modal-qtd-produto").val()  
$(".valor").text("R$ "+rs)
}
if ($(".kg").hasClass("medida_ativo")) {               
// Kg
var kg = $(".modal-qtd-produto").val() 
total = (kg*dados[id+1])/dados[id+2]
$(".valor"+dados[id]).text("R$ "+total) 
}   
if ($(".und").hasClass("medida_ativo")) { 
//UND
var und = $(".modal-qtd-produto").val()  
total = und*dados[id+1]
$(".valor"+dados[id]).text("R$ "+total)  
}
      id+=3

    }  

    }


//alert (id+1)
// $('.dependente-registro-atual').val(id+1)
        

    }, 'JSON');


}
setInterval(consulta_medida, 100)





}); //fim do jquery

