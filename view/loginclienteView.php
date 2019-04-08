<?php include_once '../controller/facebookloginController.php'; ?>
<?php include_once '../view/menuView.php'; ?>

	<body>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<div class="form-signin">
						<h2 class="text-center">Login Cliente</h2>
						<?php
							if(isset($_SESSION['msg']))
							{
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}

							if(isset($_SESSION['msgcad']))
							{
								echo $_SESSION['msgcad'];
								unset($_SESSION['msgcad']);
							}
						?>
						<form method="POST" action="valida.php">				
							<div class="form-group">
								<input type="text" name="usuario" placeholder="Digite o seu usuário" class="form-control">
							</div>
									
							<div class="form-group">									
								<input type="password" name="senha" placeholder="Digite a sua senha" class="form-control">
							</div>
					
							<div class="form-group">									
								<input type="submit" name="btnLogin" value="Acessar" class="btn btn-success btn-block">
							</div>	
					
							<div class="form-group">										
								<h4>Você ainda não possui uma conta?</h4>
								<a href="cadastroclienteView.php">Crie grátis</a>
							</div>

							<div class="form-group">										
								<a href="<?php echo $loginUrl; ?>">
									<button type="button" class="btn btn-primary">Facebook</button>
								</a>
							</div>	
						</form>	
					</div>															
				</div>
			</div>		
		</div>	

<?php include_once '../view/footerView.php'; ?>