<?php include_once '../controller/facebookloginController.php'; ?>
<?php include_once '../view/menuView.php'; ?>


<!-- Adicionando JQuery -->
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {
            
    $("#input-foto-perfil").on('change', function () {
 
    if (typeof (FileReader) != "undefined") {
 
        var image_holder = $("#add-foto-perfil");
        image_holder.empty();
 
        var reader = new FileReader();
        reader.onload = function (e) {
            $("<img />", {
                "src": e.target.result,
                "class": "resul-foto-perfil"
            }).appendTo(image_holder);
        }
        image_holder.show();
        reader.readAsDataURL($(this)[0].files[0]);
    } else{
        alert("Este navegador nao suporta FileReader.");
    }

  });

        }); // FIm do Jquery

    </script>

  <div class="container">
    <div class="row justify-content-center mt-4">
      <div class="col-md-4">
        <div class="form-signin">
          <?php
            if(isset($_SESSION['msg']))
            {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
            }
          ?>      
          <form id="cadcliente"  method="POST" action="../controller/cadclientesController.php" enctype="multipart/form-data">
            <div class="form-group d-flex justify-content-center">
              <label for="input-foto-perfil" class="foto-perfil" id="add-foto-perfil">
                <img src="../assets/img/perfil.jpg" width="100%" height="100%">
              </label>
              <input type="file" name="foto-perfil" id="input-foto-perfil" class="d-none">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="nome" placeholder="Digite o seu nome" class="form-control">
            </div>

            <div class="input-group  form-group">   
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
              </div>       
              <input type="text" name="email" placeholder="Digite o seu e-mail" class="form-control">
            </div>

            <div class="input-group  form-group">      
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
              </div>       
              <input id="telefone" type="text" name="telefone" placeholder="Digite o seu telefone" class="form-control">
            </div>

            <div class="input-group form-group">    
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-ankh"></i></span>
              </div>        
              <select class="form-control" name="sexo">
                <option disable="" value="">Escolha o sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
              </select>
            </div>

            <div class="input-group form-group">  
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>           
              <input id="password" type="password" name="password" placeholder="Digite a senha" class="form-control">
            </div>

            <div class="input-group form-group">   
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>          
              <input type="password" name="password_again" placeholder="Repita a senha" class="form-control">
            </div>
          
            <div class="form-group">
                <input type="submit" name="btnCadUsuario" value="Cadastrar" class="btn btn-success btn-block">
            </div>
          
            <div class="form-group">
              Lembrou? <a href="loginclienteView.php">Clique aqui</a> para logar
            </div>          

            <div class="form-group">
              <a class="ml-2 btn btn-primary" href="<?=$loginUrl;?>">  <i class="fab fa-facebook"></i> Cadastro com Facebook
                  </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
   
<?php include_once '../view/footerView.php'; ?>