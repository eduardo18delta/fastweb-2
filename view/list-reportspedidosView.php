<?php 
require( '../assets/lib/fpdf182/fpdf.php' );
$pdf =new FPDF ();

$pdf -> AddPage ();
$pdf -> SetFont ( 'Arial' , '' , 16 );
$pdf->AliasNbPages();
//$pdf->SetFont('Arial','',8);

require_once '../model/autoload.php'; 

$perfil = new Perfil();

$idusuario = "1";

$pedido = new Pedido(); 

$result = $pedido->listartodosPedidos();

$numerohistorico = $pedido->listarqtdPedido();
$geralhistorico = $perfil->listargeralhistorico($idusuario);
$valorpedido = $perfil->listarvalorpedido($idusuario);

$somatotal = 0;

foreach ($result as $id_pedido) {

  $qtd_produto[$id_pedido['id']] = 0;

  $valoritempedido = $perfil->listarvaloritemPedido($id_pedido['id']);
  foreach ($valoritempedido as $lista_produto){
    $valor_sem_desconto = ($lista_produto['valor']*(101+$lista_produto['desconto']))/100;
    $economia = $valor_sem_desconto - $lista_produto['valor'];
    $somatotal+=$economia;

    $qtd_produto[$id_pedido['id']]++;

  }
  
}

session_start();



$pdf->SetDrawColor(160,160,160);

$pdf->Image("../assets/img/logo.png", 100,17,15,15);

//$titulo="Relatório de usuarios em estoque";
//escreve no pdf largura,altura,conteudo,borda,quebra de linha,alinhamento
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,$numerohistorico.' pedidos cadastrados no sistema',0,0,'L'); 
$pdf->Cell(0,5,'http://www.fastwebstore.com.br',0,1,'R'); 
$pdf->Cell(0,0,'',1,1,'L'); 
$pdf->Ln(17);

$pdf->SetFont('Arial','B',16);

$pdf->cell(0,10,"RELATORIO DE COMPRAS",0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->setFillColor(230,230,230); 
				//$pdf->Cell(5,10,'id',0,0,'C',1);
				$pdf->Cell(10,10,'N',0,0,'C',1);
                $pdf->Cell(50,10,'Nome',0,0,'C',1);
                $pdf->Cell(20,10,'QTD',0,0,'C',1);
                $pdf->Cell(20,10,'Valor ',0,0,'C',1);
                $pdf->Cell(30,10,'Data',0,0,'C',1);
                $pdf->Cell(50,10,'Status',0,1,'C',1);
    if ($numerohistorico>0) { 

              foreach ($result as $lista_pedido){
               //foreach ($geralhistorico as $lista){ 
                $pdf->SetFont('Arial','',12);  
                    $pdf->Cell(10,10,$lista_pedido['id'],1,0,'C');               
                    $pdf->Cell(50,10,$lista_pedido['nome'],1,0,'C');
                    $pdf->Cell(20,10,$qtd_produto[$lista_pedido['id']],1,0,'C');
                    $pdf->Cell(20,10,"R$ ".number_format($lista_pedido['valor'],2,",","."),1,0,'C');
                    $pdf->Cell(30,10,$lista_pedido['pedido_efetuado'],1,0,'C'); 
                    $pdf->Cell(50,10,"Pagamento confirmado",1,1,'C'); 

              /*
              $pdf->SetFont('Arial','',12);                 
                    $pdf->Cell(50,10,$lista_pedido['nome'],1,0,'C');
                    $pdf->Cell(60,10,$qtd_produto[$lista_pedido['id']],1,0,'C');
                    $pdf->Cell(40,10,$lista_pedido['valor'],1,0,'C');
                    $pdf->Cell(30,10,$lista_pedido['pedido_efetuado'],1,1,'C');  
            */          
    }


} else { 

    //Aqui será exibido as últimas compras realizadas
}



/*******definindo o rodapé*************************/
//posiciona verticalmente 270mm
$pdf->SetY("270"); 
//data atual
$data=date("d/m/Y");
$conteudo="criado em ".$data;
$texto="Sistema Fastweb";
//imprime uma celula... largura,altura, texto,borda,quebra de linha, alinhamento
$pdf->Cell(0,0,'',1,1,'L'); 
//imprime uma celula... largura,altura, texto,borda,quebra de linha, alinhamento
$pdf->Cell(0,5,$texto,0,0,'L'); 
//imprime uma celula... largura,altura, texto,borda,quebra de linha, alinhamento
$pdf->Cell(0,5,$conteudo,0,1,'R');

$pdf -> Output ();


?>