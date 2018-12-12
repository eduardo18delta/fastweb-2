$(document).ready( function() {
  $("#cadastroproduto").validate({    
    rules:{
      nome:{        
        required: true, minlength: 6
      },
      valor:{    
        required: true
      },
      fornecedor:{    
        required: true, minlength: 6
      },
      validade:{
        required: true,  date: true
      },
      quantidade:{
        required: true,  minlength: 1
      },
      marca:{
        required: true,  minlength: 6
      }
    },    
    messages:{
      nome:{
        required: "<div style='color: red;'>Digite o nome</div>",
        minlength: "<div style='color: red;'>O nome deve conter, no minimo, 6 caracteres</div>"
      },
      valor:{
        required: "<div style='color: red;'>Digite o valor</div"        
      },
      fornecedor:{
        required: "<div style='color: red;'>Digite o fornecedor</div>",
        minlength: "<div style='color: red;'>O fornecedor deve conter, no minimo, 6 caracteres</div>"
      },
      validade:{
        required: "<div style='color: red;'>Digite a validade</div>",
        date: "<div style='color: red;'>Digite uma data valida</div>"
      },
      quantidade:{
        required: "<div style='color: red;'>Digite a quantidade</div>",
        minlength: "<div style='color: red;'>O quantidade deve conter, no minimo, 1 caracteres</div>"
      },
      marca:{
        required: "<div style='color: red;'>Digite a marca</div>",
        minlength: "<div style='color: red;'>O marca deve conter, no minimo, 6 caracteres</div>"
      }
    }
  });
});


