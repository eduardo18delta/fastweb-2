
      $(document).ready(function(){
     
      $(".produto23").click(function(){ 

      $(".background_modal").fadeIn();
      $(".produto23").addClass("addproduto23")
      $(".nome").text("gjhgjh")
      $(".valor").text("R$ 1.5,00")
      $(".descricao").text("Bebidas não Alcoólicas")

    
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/84b9138d4661a667ca6976c50e290f48")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/97e6ba558f2c4a1e59adce9eaa6526cd")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/020d8b890b5afb846887a17a79575f46")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/e4f3d0fe825081497cbe23526d24097f")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/8212e3300952aa60d692eee2083a9fb2")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/84b9138d4661a667ca6976c50e290f48")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/97e6ba558f2c4a1e59adce9eaa6526cd")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/020d8b890b5afb846887a17a79575f46")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/e4f3d0fe825081497cbe23526d24097f")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/8212e3300952aa60d692eee2083a9fb2")

      $(".produto_img_01").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")
      $(".produto_img_02").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")
      $(".produto_img_03").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")
      $(".produto_img_04").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")
      $(".produto_img_05").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")
      $(".produto_img_06").attr("onerror","this.src='../assets/img/upload_produtos/dde49d0826d07ed964f76ea2a58ef0b1'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto23").removeClass("addproduto23")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

});

