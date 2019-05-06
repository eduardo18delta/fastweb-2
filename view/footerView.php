<!-- Footer -->
  <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright Fastweb © - fastweb.com.br‎.</span>
      </div>
  </footer>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
<script src='https://cdn.jsdelivr.net/npm/sweetalert2'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="../assets/js/cadastrouser.js"></script>
<script src="../assets/js/cadastrocargos.js"></script>
<script src="../assets/js/cadastroprodutos.js"></script>

</body>
	</html>
	<!--==teste==-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Produto de teste</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<!--<script type="text/javascript" src="jquery.js"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
<script>

function enviaPagseguro(){

$.post('../controller/pagseguroController.php','',function(data){
	//alert (data)
$('#code').val(data);
$('#comprar').submit();
//window.location.href='https://pagseguro.uol.com.br/v2/checkout/payment.html?code'+data;
})
}

</script>

</head>

<body>
<div>
<h1>Produto de teste</h1>
<p> 299,00</p>
<button onclick="enviaPagseguro()">Comprar</button>
</div>

<form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">

<input type="hidden" name="code" id="code" value="" />

</form>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
</body>
</html>

