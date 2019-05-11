<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pedidos</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
</head>

<body>
 <h1>PEDIDOS</h1>
 
 <?php
 require_once '../model/autoload.php'; 

$pedido = new Pedido(); 
 
$result = $pedido->listarPedidos();

foreach ($result as $lista){

 echo '<p><strong>'.$lista["descricao"].' '.$lista["id"].'</strong> <br> <strong>Status:</strong> '.$lista["status"].'</p>';
 }
 ?> 
</body>
</html>