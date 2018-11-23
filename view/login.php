<!DOCTYPE html>
<html>
<head>
	<title>Sistema Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.min.css">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<!-- GoogleFonts - OpenSans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!-- Fontawesome 5.0-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>

<!-- Init of Bootstrap -->

<div class="container">
	
	<div class="col-md-12 col-md-offset-6">
		<h1>Login Fastweb</h1>

			<form method="POST" class="log" action="../controller/loginController.php" autocomplete="off">

				<br><br><p>Entre na sua conta:</p><br>
			
				<input type="email" name="email" class="form-control field" placeholder="example@email.com" autofocus required><br>
				
				<input type="password" name="password" class="form-control field" placeholder="********" required><br>
			
				<button class="btn btn-default" type="submit">
					 <i class="fa fa-lock"></i> Entrar
				</button><br><br>
			</form>
	
			<p id="credits">Fastweb <?php echo date("Y"); ?> - Todos os direitos Reservados - 2018</p>
		

	</div>

</div>

</body>
</html>
