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

  $("#input-img-produto-01").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-01");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-img-produto-02").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-02");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#input-img-produto-03").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-03");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#input-img-produto-04").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-04");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-img-produto-05").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-05");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#input-img-produto-06").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-img-produto-06");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


for (var i = 0; i < 6; i++) {


$("#upd-input-img-produto-01").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $(".upd-img-produto-01");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd-input-img-produto-02").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#upd-img-produto-02");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#upd-input-img-produto-03").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#upd-img-produto-03");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});


$("#upd-input-img-produto-04").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#upd-img-produto-04");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd-input-img-produto-05").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#upd-img-produto-05");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

$("#upd-input-img-produto-06").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#upd-img-produto-06");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-img-produto"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

});

//alert (i)
}


$(".rs").css("background-color","#fff")
$(".rs").css("color","#000")
$(".kg").css("background-color","#fff")
$(".kg").css("color","#000")
$(".und").css("background-color","#fff")
$(".und").css("color","#000")

$(".rs").click(function(){
  if ($(".rs").hasClass("ativo")) {
  $(".rs").val("")
  $(".rs").css("background-color","#fff")
  $(".rs").css("color","#000")
  $(".rs").removeClass("ativo")
  var teste = $(".medida").val()
  teste2 = parseInt(teste) - 1
  $(".medida").val(teste2)
  } else {
  $(".rs").css("background-color","#000")
  $(".rs").css("color","#fff")
  $(".rs").addClass("ativo")
  var teste = $(".medida").val() 
  teste2 =parseInt(teste) + 1
  $(".medida").val(teste2)
  }
})

$(".kg").click(function(){
  if ($(".kg").hasClass("ativo")) {
  $(".kg").css("background-color","#fff")
  $(".kg").css("color","#000")
  $(".kg").removeClass("ativo")
  var teste = $(".medida").val()
  teste2 = parseInt(teste) - 2
  $(".medida").val(teste2)
  } else {
  $(".kg").css("background-color","#000")
  $(".kg").css("color","#fff")
  $(".kg").addClass("ativo")
  var teste = $(".medida").val()
  teste2 = parseInt(teste) + 2
  $(".medida").val(teste2)
  }
})

$(".und").click(function(){
  if ($(".und").hasClass("ativo")) {
  $(".und").css("background-color","#fff")
  $(".und").css("color","#000")
  $(".und").removeClass("ativo")
  var teste = $(".medida").val()
  teste2 = parseInt(teste) - 4
  $(".medida").val(teste2)
  } else {
  $(".und").css("background-color","#000")
  $(".und").css("color","#fff")
  $(".und").addClass("ativo")
  var teste = $(".medida").val()
  teste2 = parseInt(teste) + 4
  $(".medida").val(teste2)
  }
})


});


