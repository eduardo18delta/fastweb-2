
      $(document).ready(function(){
     
      $(".produto22").click(function(){ 

      $(".background_modal").fadeIn();
      $(".produto22").addClass("addproduto22")
      $(".nome").text("Teste ")
      $(".valor").text("R$ 21.31,00")
      $(".descricao").text("Alimentos")

    
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/10ea5a2bb2ee8b8303b9e3235f49ea1e")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/1b7c9edc4ea327232f03c2c31db37ed7")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/b189d34859732ea29a7b023d6e354c5f")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/4e65434f0711d177776f9c7977146f58")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/d3ada958d6ac66e224db18bd740031d5")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/10ea5a2bb2ee8b8303b9e3235f49ea1e")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/1b7c9edc4ea327232f03c2c31db37ed7")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/b189d34859732ea29a7b023d6e354c5f")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/4e65434f0711d177776f9c7977146f58")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/d3ada958d6ac66e224db18bd740031d5")

      $(".produto_img_01").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")
      $(".produto_img_02").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")
      $(".produto_img_03").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")
      $(".produto_img_04").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")
      $(".produto_img_05").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")
      $(".produto_img_06").attr("onerror","this.src='../assets/img/upload_produtos/f903deccca0bef7c4bc28b48e36e2d08'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto22").removeClass("addproduto22")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

});

