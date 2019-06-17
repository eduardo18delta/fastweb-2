 // Validação troca de senha
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


 // Validação atualizar dados
$(document).ready( function() {
  $("#updatecliente").validate({    
    rules:{      
      nome:{    
        required: true, minlength: 6
      },
      email:{
        required: true, email: true 
      },
      telefone:{
        required: true, minlength: 15
      }
    },
    messages:{     
      nome:{
        required:  "<div style='color: red;'>Digite um nome</div>",
        minlength: "<div style='color: red;'>O nome deve conter, no minimo, 6 caracteres</div>"     
      },
      email:{
        required:  "<div style='color:red;'>Digite um e-mail</div>",        
        email:     "<div style='color:red;'>Digite um e-mail válido</div>"
      },
      telefone:{
        required:  "<div style='color: red;'>Digite um telefone</div><br>"  ,
        minlength: "<div style='color: red;'>Digite um telefone válido</div>"     
      }
    }
  });
});