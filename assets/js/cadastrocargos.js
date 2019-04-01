$(document).ready( function() {
  $("#cadastrocargo").validate({    
    rules:{
      cargo:{        
        required: true, minlength: 6
      }
    },    
    messages:{
      cargo:{
        required: "<div style='color: red;'>Digite o cargo</div>",
        minlength: "<div style='color: red;'>O cargo deve conter, no minimo, 6 caracteres</div>"
      }          
    }
  });
});


