
      $(document).ready(function(){
     
      $(".produto20").click(function(){ 

      $(".background_modal").fadeIn();
      $(".produto20").addClass("addproduto20")
      $(".nome").text("Fanta Uva ")
      $(".valor").text("R$ 9,00")
      $(".descricao").text("Bebidas não Alcoólicas")

    
$(".desfocar").css("filter", "blur(10px)");

      $(".img_produto_hover01").attr("src","../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa")
      $(".img_produto_hover02").attr("src","../assets/img/upload_produtos/593da924cfadeaa4bf333dfc3ff92363")
      $(".img_produto_hover03").attr("src","../assets/img/upload_produtos/833f99fd6b975acccb571c95d07ce1ee")
      $(".img_produto_hover04").attr("src","../assets/img/upload_produtos/7da31bed56bb7196965de4fd57f5ee62")
      $(".img_produto_hover05").attr("src","../assets/img/upload_produtos/ee94686aef781e8d1d99e9e1b64e9f7c")
      $(".img_produto_hover06").attr("src","../assets/img/upload_produtos/70f311d5be83f42ecf024e9c15f81fa6")

      $(".produto_img_01").attr("src","../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa")
      $(".produto_img_02").attr("src","../assets/img/upload_produtos/593da924cfadeaa4bf333dfc3ff92363")
      $(".produto_img_03").attr("src","../assets/img/upload_produtos/833f99fd6b975acccb571c95d07ce1ee")
      $(".produto_img_04").attr("src","../assets/img/upload_produtos/7da31bed56bb7196965de4fd57f5ee62")
      $(".produto_img_05").attr("src","../assets/img/upload_produtos/ee94686aef781e8d1d99e9e1b64e9f7c")
      $(".produto_img_06").attr("src","../assets/img/upload_produtos/70f311d5be83f42ecf024e9c15f81fa6")

      $(".produto_img_01").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")
      $(".produto_img_02").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")
      $(".produto_img_03").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")
      $(".produto_img_04").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")
      $(".produto_img_05").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")
      $(".produto_img_06").attr("onerror","this.src='../assets/img/upload_produtos/ac1bcbaaf50f00fa26c326d09b1649aa'")

      })
      
      $(".fechar_modal").click(function(){
        $(".background_modal").fadeOut();
        $(".produto20").removeClass("addproduto20")
        $(".desfocar").css("filter", "blur(0px)");
      })
      

});

