$(document).ready( function() {
  $("#cadastro").validate({    
    rules:{
      nome:{        
        required: true, minlength: 6
      },
      email:{    
        required: true, email: true
      },
      password:{    
        required: true, minlength: 6
      },
      password_again:{
        required: true, minlength: 6, equalTo: "#password"
    }
    },    
    messages:{
      nome:{
        required: "<div style='color: red;'>Digite o nome</div>",
        minlength: "<div style='color: red;'>O nome deve conter, no minimo, 6 caracteres</div>"
      },
      email:{
        required: "<div style='color: red;'>Digite o e-mail</div",
        email: "<div style='color: red;'>Digite um e-mail válido</div>"
      },
      password:{
        required: "<div style='color: red;'>Digite a senha</div"  ,
        minlength: "<div style='color: red;'>A senha deve conter, no minimo, 6 caracteres</div>"     
      },
      password_again:{
        required: "<div style='color: red;'>Digite a confirmação da senha</div",
        equalTo: "<div style='color: red;'>O valor deve ser identico ao campo Senha</div",
        minlength: "<div style='color: red;'>A senha de confirmação deve conter, no minimo, 6 caracteres</div>"     
      }
    }
  });
});


