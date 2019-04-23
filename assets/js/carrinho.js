$(document).ready(function(){

consulta_carrinho()
function consulta_carrinho(){

    $.post('../model/Carrinho.class.php',function(dados) {
//alert (dados)
      id=0
      valor_produtos=1
      valor_total=2
      qtd_total=3

    for (var i = 0; i < dados.length; i++) {                        

    if (i==id){
     //alert (dados[i+1])
      var qtd = $(".qtd-produto"+dados[id]).val()
      
      $(".valor-produto"+dados[id]).text("R$ "+qtd*dados[id+valor_produtos])
      $(".carrinho-valor-total").text("R$ "+dados[id+2])
      $(".carrinho-compra-alert").text(dados[id+3])
      $(".cont_add_produto").show() 

      //=======================
      
      $(".add-carrinho"+dados[id]).hide()
      $(".remover-produto"+dados[id]).show()
      
      /*
      $("[name=remover-produto]").hide()
      if ($("[name=remover-produto]").hasClass("produto-adicionado")){
      $("[name=add-produto]").hide()
      $("[name=remover-produto]").show()
      } else {
      $("[name=add-produto]").show()
      $("[name=remover-produto]").hide()
      }
      */
 //    alert(dados[id])
//var qtd = $(".carrinho-qtd-produto").val()
              //    alert (qtd)
              // R$
//var rs = $(".modal-qtd-produto").val()  
//$(".valor").text("R$ "+rs)               
// Kg

//UND
//var teste = $(".modal-qtd-produto").val()  
//$(".valor").text("R$ "+teste)    

     
      id+=4

    }  

    }


//alert (id+1)
// $('.dependente-registro-atual').val(id+1)
        

    }, 'JSON');


}
setInterval(consulta_carrinho, 100)




}) //Fim do JQUERY