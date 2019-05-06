$(document).ready(function(){

listar_medida()
function listar_medida(){

    $.post('../model/Carrinho.class.php',function(dados) {

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
     
      id+=6

    }  

    }


//alert (id+1)
// $('.dependente-registro-atual').val(id+1)
        

    }, 'JSON');


}



consulta_carrinho()
function consulta_carrinho(){

    $.post('../model/Carrinho.class.php',function(dados) {

      id=0
      valor_produtos=1
      valor_total=2
      qtd_total=3

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){

      var qtd = $(".qtd-produto"+dados[id]).val()

      $(".valor-produto"+dados[id]).text("R$ "+dados[id+valor_produtos])
      $(".carrinho-valor-total").text("R$ "+dados[id+2])
      $(".carrinho-compra-alert").text(dados[id+3])
      $(".cont_add_produto").show() 

      //=======================
      
      $(".add-carrinho"+dados[id]).hide()
      $(".remover-produto"+dados[id]).show()
      
            

$(".item-medida").click(function() {
     
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

     
      id+=6

    }  

    }


//alert (id+1)
// $('.dependente-registro-atual').val(id+1)
        

    }, 'JSON');


}
setInterval(consulta_carrinho, 1000)




}) //Fim do JQUERY