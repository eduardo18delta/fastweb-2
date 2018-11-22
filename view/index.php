<?php 



session_start();


if (isset($_SESSION['user'])) {

 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sistema de Login</title>
 </head>
 <body>

 	<h1>Bem-vindo</h1>
 	<hr>
 	<h2>Area restrita</h2>
 
 </body>
 </html>


 <?php 

} else {

	header("Location: ../login.php?acess_denied");
}



  ?>