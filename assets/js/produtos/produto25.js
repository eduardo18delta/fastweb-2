
      $(document).ready(function(){
     
      $(".produto25").click(function(){ 

      $(".background_modal").fadeIn();
      $(".produto25").addClass("addproduto25")
      $(".nome").text("Eduardo teste")
      $(".valor").text("R$ 12,00")
      $(".descricao").text("Alimentos")

    
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/ffaeee13c1372e0133e34875b0e0cb80")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/03c2c1550f81dee4a8da282b80e74904")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/7713396da913ef4e5cab9e3b3b09699d")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/1276a0176597e03b2a9b836d39adf311")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/aacc02cac1613befe32c2ff842f15170")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/ffaeee13c1372e0133e34875b0e0cb80")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/03c2c1550f81dee4a8da282b80e74904")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/7713396da913ef4e5cab9e3b3b09699d")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/1276a0176597e03b2a9b836d39adf311")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/aacc02cac1613befe32c2ff842f15170")

      $(".produto_img_01").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")
      $(".produto_img_02").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")
      $(".produto_img_03").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")
      $(".produto_img_04").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")
      $(".produto_img_05").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")
      $(".produto_img_06").attr("onerror","this.src='../assets/img/upload_produtos/31955594485b06dbf909bb65b4910f89'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto25").removeClass("addproduto25")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

});

