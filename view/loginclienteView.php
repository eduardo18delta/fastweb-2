<?php include_once '../controller/facebookloginController.php'; ?>
<?php include_once '../view/menuView.php'; ?>

	<body>
		<div class="container">
			<div class="row justify-content-center mt-4">
				<div class="col-md-4">
					<div class="form-signin">
						<h2 class="text-center">Login Cliente</h2>
						<?php
							if(isset($_SESSION['msg']))
							{
								echo $_SESSION['msg'];
								unset($_SESSION['msg']);
							}
						?>
						<form method="POST" action="../controller/loginclienteController.php">				
							<div class="form-group">
								<input type="text" name="email" placeholder="Digite o seu usuário" class="form-control">
							</div>
									
							<div class="form-group">									
								<input type="password" name="password" placeholder="Digite a sua senha" class="form-control">
							</div>
					
							<div class="form-group">									
								<input type="submit" name="btnLogin" value="Acessar" class="btn btn-success btn-block">
							</div>	
					
							<div class="form-group">													<div class="row justify-content-center">	
									<a class="btn btn-info"href="cadastroclienteView.php">	
										<i class="far fa-edit"></i>
										Cadastrar
									</a>							
									<a class="ml-2 btn btn-primary" href="<?php echo $loginUrl; ?>">	<i class="fab fa-facebook"></i>
										Login com Facebook
									</a>
								</div>	
							</div>
						</form>	
					</div>															
				</div>
			</div>		
		</div>	

<?php include_once '../view/footerView.php'; ?>