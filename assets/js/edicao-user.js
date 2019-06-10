 // Validação edição de usuário administrativo
$(document).ready( function() {
  $("#editarusuario").validate({    
    rules:{
      nome:{        
        required: true, minlength: 6 
      },
      email:{    
        required: true,email: true
      },
      password1:{    
        required: true, minlength: 6
      },
      password2:{
        required: true, minlength: 6, equalTo: "#password1"
      },
      permissao:{
        required: true
      },
      cargo:{
        required: true
      }
    },    
    messages:{
      nome:{
        required:  "<div style='color:red;font-size:12px;'>Digite um nome</div>",        
        minlength:     "<div style='color:red;font-size:12px;'>Mínimo de 6 caracteres</div>"
      },
      email:{
        required:  "<div style='color:red;font-size:12px;'>Digite um email</div>",
        email: "<div style='color:red;font-size:12px;'>Digite um email válido</div>"
      },
      password1:{
        required: "<div style='color: red;'>Digite a senha</div>"  ,
        minlength: "<div style='color: red;'>A senha deve conter, no minimo, 6 caracteres</div>"     
      },
      password2:{
        required: "<div style='color: red;'>Digite a confirmacão da senha</div>",
        equalTo: "<div style='color: red;'>O valor deve ser identico ao campo anterior</div>",
        minlength: "<div style='color: red;'>A senha de confirmação deve conter, no minimo, 6 caracteres</div>"     
      },
      permissao:{
        required: "<div style='color: red;'>Escolha uma permissão</div>"
      },
      cargo:{
        required: "<div style='color: red;'>Escolha um cargo</div>"
      }
    }
  });
});