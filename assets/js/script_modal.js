
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
    $ativo = $slide_img.find("img.slide_produtos").first().addClass("ativo").show();


    $slide2 = $(".slides_img");
    //inicialmente esconde os slides
    $slide2.find("img.slide_produtos").hide();
    //encontra o prmeiro slide e ativa-o
    $ativo2 = $slide_img.find("img.slide_produtos").first().addClass("ativo2").show();

    $("#slide_direita").click(function(){



      $ativo2.hide();
      //esconde o slide atual
      $ativo.hide();

      //procura o proximo
      $ativo = $slide_img.find("img.ativo").next();
      if(!$ativo.length) $ativo = $slide_img.find("img.slide_produtos").first();//volta ao primeiro
      //remove o marcador do slide anterior
      $slide_img.find("img.ativo").removeClass("ativo");
      //coloca o marcador e mostra
      $ativo.addClass("ativo").show();


    });
    //ao clicar mostra o slide anterior

    $("#slide_esquerda").click(function(){


      $ativo2.hide();
      $ativo.hide();
      $ativo = $slide_img.find("img.ativo").prev();
      if(!$ativo.length) $ativo = $slide_img.find("img.slide_produtos").last();//volta ao ultimo
      $slide_img.find("img.ativo").removeClass("ativo");
      $ativo.addClass("ativo").show();


    });



    $(".img_produto_hover01").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_01").addClass("ativo2").show();
      $ativo = $ativo2
     });
    $(".img_produto_hover02").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_02").addClass("ativo2").show();
      $ativo = $ativo2
     });
     $(".img_produto_hover03").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_03").addClass("ativo2").show();
      $ativo = $ativo2
    });
     $(".img_produto_hover04").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_04").addClass("ativo2").show();
      $ativo = $ativo2
    });
     $(".img_produto_hover05").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_05").addClass("ativo2").show();
      $ativo = $ativo2
    });
     $(".img_produto_hover06").hover(function(){
      $ativo.hide();
      $ativo2.hide();
      $ativo2 = $slide2.find(".produto_img_06").addClass("ativo2").show();
      $ativo = $ativo2
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

$(".rs").css("background-color","#fff")
  $(".kg").css("background-color","#fff")
  $(".und").css("background-color","#000")
  $(".rs").css("color","#000")
  $(".kg").css("color","#000")
  $(".und").css("color","#fff")

$(".rs").click(function(){
  $(".rs").css("background-color","#000")
  $(".kg").css("background-color","#fff")
  $(".und").css("background-color","#fff")
  $(".rs").css("color","#fff")
  $(".kg").css("color","#000")
  $(".und").css("color","#000")
})

$(".kg").click(function(){
  $(".rs").css("background-color","#fff")
  $(".kg").css("background-color","#000")
  $(".und").css("background-color","#fff")
  $(".rs").css("color","#000")
  $(".kg").css("color","#fff")
  $(".und").css("color","#000")
})

$(".und").click(function(){
  $(".rs").css("background-color","#fff")
  $(".kg").css("background-color","#fff")
  $(".und").css("background-color","#000")
  $(".rs").css("color","#000")
  $(".kg").css("color","#000")
  $(".und").css("color","#fff")
})




}); //fim do jquery

