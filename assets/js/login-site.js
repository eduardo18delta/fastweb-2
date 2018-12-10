$(document).ready( function() {
  $("#login-site").validate({
    rules:{
      email:{
        required: true, email: true
      },
      password:{
        required: true, minlength: 6
      },
    },
    messages:{
      email:{
        required: "<p style='float:right;'>Digite o e-mail</p>",
        email: "<div style='color: red;'>Digite um e-mail válido</div>"
      },
      password:{
        required: "<div style='color: red;'>Digite a senha</div"  ,
        minlength: "<div style='color: red;'>A senha deve conter, no minimo, 6 caracteres</div>"
      },
    }
  });
});
