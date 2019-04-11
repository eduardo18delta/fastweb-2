
      $(document).ready(function(){
     
      $(".produto21").click(function(){ 

      $(".background_modal").fadeIn();
      $(".produto21").addClass("addproduto21")
      $(".nome").text("Bebida quente")
      $(".valor").text("R$ 1,00")
      $(".descricao").text("Bebidas não Alcoólicas")

    
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/889f9fbfd6d2d8eef376f066a0bb5148")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/83ed3ecd38eee3caa6f08e36a9957a6d")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/b2b745af514aeee1ac9a6d460ab991d3")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/3dfd46839f8a8ecabb17ae5b35e56ba1")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/dbfe066325d3e95cf05669c53c044d38")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/889f9fbfd6d2d8eef376f066a0bb5148")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/83ed3ecd38eee3caa6f08e36a9957a6d")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/b2b745af514aeee1ac9a6d460ab991d3")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/3dfd46839f8a8ecabb17ae5b35e56ba1")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/dbfe066325d3e95cf05669c53c044d38")

      $(".produto_img_01").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")
      $(".produto_img_02").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")
      $(".produto_img_03").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")
      $(".produto_img_04").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")
      $(".produto_img_05").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")
      $(".produto_img_06").attr("onerror","this.src='../assets/img/upload_produtos/5e040e1a72432e8cd1f5e71c4a21952b'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto21").removeClass("addproduto21")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

});

