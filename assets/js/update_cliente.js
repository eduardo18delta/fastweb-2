 // Validação edição de usuário administrativo
$(document).ready( function() {
  $("#trocarsenha").validate({    
    rules:{      
      newpassword:{    
        required: true, minlength: 6
      },
      password_again:{
        required: true, minlength: 6, equalTo: "#newpassword"
      }
    },    
    messages:{     
      newpassword:{
        required: "<div style='color: red;'>Digite a senha</div>"  ,
        minlength: "<div style='color: red;'>A senha deve conter, no minimo, 6 caracteres</div>"     
      },
      password_again:{
        required: "<div style='color: red;'>Digite a confirmacão da senha</div>",
        equalTo: "<div style='color: red;'>O valor deve ser idêntico ao campo anterior</div>",
        minlength: "<div style='color: red;'>A senha de confirmação deve conter, no minimo, 6 caracteres</div>"     
      }
    }
  });
});