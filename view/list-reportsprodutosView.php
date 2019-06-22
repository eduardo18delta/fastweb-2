<?php 
require( '../assets/lib/fpdf182/fpdf.php' );
$pdf =new FPDF ();

$pdf -> AddPage ();
$pdf -> SetFont ( 'Arial' , '' , 16 );
$pdf->AliasNbPages();
//$pdf->SetFont('Arial','',8);

require_once '../model/autoload.php'; 
$produtos = new Produtos(); 
$lista=$produtos->listar();

$menu = new Menu();

$numeroprodutos = $menu->listarprodutos();

$categorias = new Categoria();

$listacategorias=$categorias->listarCategorias();

session_start();



$pdf->SetDrawColor(160,160,160);

$pdf->Image("../assets/img/logo.png", 100,17,15,15);

//$titulo="Relatório de produtos em estoque";
//escreve no pdf largura,altura,conteudo,borda,quebra de linha,alinhamento
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,$numeroprodutos.' Produtos em estoque',0,0,'L'); 
$pdf->Cell(0,5,'http://www.fastwebstore.com.br',0,1,'R'); 
$pdf->Cell(0,0,'',1,1,'L'); 
$pdf->Ln(17);

$pdf->SetFont('Arial','B',16);

$pdf->cell(0,10,"RELATORIO DE PRODUTOS",0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->setFillColor(230,230,230); 
        //$pdf->Cell(5,10,'id',0,0,'C',1);
        $pdf->Cell(10,10,'',0,0,'C',1);
                $pdf->Cell(50,10,'Nome',0,0,'C',1);
                $pdf->Cell(40,10,'Valor',0,0,'C',1);
                $pdf->Cell(40,10,'Quantidade ',0,0,'C',1);
                $pdf->Cell(40,10,'Medida',0,1,'C',1);

  foreach($lista as $produtos){


                $pdf->SetFont('Arial','',12);
                //$pdf->Cell(5,10,$produtos['id_produto'],1,0,'C');
                  $pdf->Cell(10,10,$pdf->Image('../assets/img/upload_produtos/'.$produtos['img_01'], $pdf->GetX(), $pdf->GetY(), 10),1,0,'',false);
            
                $pdf->Cell(50,10,$produtos['nome'],1,0,'C');
                $pdf->Cell(40,10,number_format($produtos['valor'],2,",","."),1,0,'C');
                $pdf->Cell(40,10,$produtos['quantidade'],1,0,'C');

                if ($produtos['medida']==1){
                  $pdf->Cell(40,10,'R$',1,1,'C');
                }
                if ($produtos['medida']==2){
                  $pdf->Cell(40,10,'Kg',1,1,'C');
                }
                if ($produtos['medida']==3){
                  $pdf->Cell(40,10,'Kg',1,1,'C');
                }
                if ($produtos['medida']==4){
                  $pdf->Cell(40,10,'Und',1,1,'C');
                }    
                if ($produtos['medida']==5){
                  $pdf->Cell(40,10,'Und',1,1,'C');
                }
                if ($produtos['medida']==6){
                  $pdf->Cell(40,10,'Und',1,1,'C');
                }
                if ($produtos['medida']==7){
                  $pdf->Cell(40,10,'Und',1,1,'C');
                }
               


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