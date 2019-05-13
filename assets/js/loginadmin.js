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
        required:  "<div style='color:red;font-size:12px;'>Digite a senha</div",
        minlength: "<div style='color:red;font-size:12px;'>Deve conter no mínimo 6 caracteres</div>"
      }
    }
  });
});

