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

  $("#input-foto-produto-01").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-01");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-foto-produto-02").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-02");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#input-foto-produto-03").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-03");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#input-foto-produto-04").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-04");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-foto-produto-05").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-05");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-foto-produto-06").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-produto-06");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});




});


