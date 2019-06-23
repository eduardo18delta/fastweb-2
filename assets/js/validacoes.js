// Validação login do administrativo 
$(document).ready( function() {
  $("#loginadmin").validate({    
    rules:{
      email:{        
        required: true, email: true 
      },
      password:{    
        required: true,minlength: 6 
      }
    },    
    messages:{
      email:{
        required:  "<div style='color:red;font-size:12px;'>Digite um e-mail</div>",        
        email:     "<div style='color:red;font-size:12px;'>Digite um e-mail válido</div>"
      },
      password:{
        required:  "<div style='color:red;font-size:12px;'>Digite a senha</div>",
        minlength: "<div style='color:red;font-size:12px;'>Deve conter no mínimo 6 caracteres</div>"
      }
    }
  });
});


// Validação login do Cliente 
$(document).ready( function() {
  $("#logincliente").validate({    
    rules:{
      email:{        
        required: true, email: true 
      },
      password:{    
        required: true,minlength: 6 
      }
    },    
    messages:{
      email:{
        required:  "<div style='color:red;font-size:12px; position: absolute; left: 0px; bottom: -18px'>Digite um e-mail</div>",        
        email:     "<div style='color:red;font-size:12px; position: absolute; left: 0px; bottom: -18px'>Digite um e-mail válido</div>"
      },
      password:{
        required:  "<div style='color:red;font-size:12px; position: absolute; left: 0px; bottom: -18px'>Digite a senha</div>",
        minlength: "<div style='color:red;font-size:12px; position: absolute; left: 0px; bottom: -18px'>Deve conter no mínimo 6 caracteres</div>"
      }
    }
  });
});

// Validação cadastro de cliente
$(document).ready( function() {
  $("#cadcliente").validate({    
    rules:{
      nome:{        
        required: true, minlength: 6
      },
      email:{    
        required: true, email: true
      },
      telefone:{    
        required: true, minlength: 15
      },
      sexo:{    
        required: true
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
        required: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite o nome</div>",
        minlength: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>O nome deve conter, no minimo, 6 caracteres</div>"
      },
      email:{
        required: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite o e-mail</div>",
        email: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite um e-mail válido</div>"
      },
      telefone:{
        required:  "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite o telefone</div>",        
        minlength: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Insira um número de telefone válido</div>"
      },
      sexo:{
        required: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Escolha o sexo</div>",        
      },
      password:{
        required: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite a senha</div>"  ,
        minlength: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>A senha deve conter, no minimo, 6 caracteres</div>"     
      },
      password_again:{
        required: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>Digite a confirmacão da senha</div>",
        equalTo: "<div style='color: red; position: absolute; left: 0px; bottom: -19px'>O valor deve ser identico ao campo anterior</div>",
        minlength: "<div style='color: red; position: absolute; left: 0px; bottom: -19px; font-size: 12px'>A senha de confirmação deve conter, no minimo, 6 caracteres</div>"     
      }
    }
  });
});

// Mascara de telefone cadastro do cliente
 $(document).ready(function(){            
            $('#telefone').mask('(00) 00000-0000');
        });