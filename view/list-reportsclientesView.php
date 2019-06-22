<?php 
require( '../assets/lib/fpdf182/fpdf.php' );
$pdf =new FPDF ();

$pdf -> AddPage ();
$pdf -> SetFont ( 'Arial' , '' , 16 );
$pdf->AliasNbPages();
//$pdf->SetFont('Arial','',8);

require_once '../model/autoload.php'; 
$clientes = new cliente(); 
$lista=$clientes->listar();

$menu = new Menu();

$numeroclientes = $menu->listarclientes();

session_start();

$pdf->SetDrawColor(160,160,160);

$pdf->Image("../assets/img/logo.png", 100,17,15,15);

//$titulo="Relatório de clientes em estoque";
//escreve no pdf largura,altura,conteudo,borda,quebra de linha,alinhamento
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,$numeroclientes.' clientes cadastrados no sistema',0,0,'L'); 
$pdf->Cell(0,5,'http://www.fastwebstore.com.br',0,1,'R'); 
$pdf->Cell(0,0,'',1,1,'L'); 
$pdf->Ln(17);

$pdf->SetFont('Arial','B',16);

$pdf->cell(0,10,"RELATORIO DE CLIENTES",0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->setFillColor(230,230,230); 
				//$pdf->Cell(5,10,'id',0,0,'C',1);
				$pdf->Cell(10,10,'',0,0,'C',1);
                $pdf->Cell(50,10,'Nome',0,0,'C',1);
                $pdf->Cell(58,10,'E-mail',0,0,'C',1);
                $pdf->Cell(40,10,'Contato ',0,0,'C',1);
                $pdf->Cell(22,10,'Sexo',0,1,'C',1);

	foreach($lista as $clientes){


                $pdf->SetFont('Arial','',12);
                //$pdf->Cell(5,10,$clientes['id_cliente'],1,0,'C');
                if ($clientes['foto_perfil']==NULL) {
                $pdf->Cell(10,10,$pdf->Image('../assets/img/perfil.jpg', $pdf->GetX(), $pdf->GetY(), 10),1,0,'',false);  
                } else {
                $pdf->Cell(10,10,$pdf->Image('../assets/img/upload_perfil/'.$clientes['foto_perfil'], $pdf->GetX(), $pdf->GetY(), 10),1,0,'',false);
                }
                  
            
                $pdf->Cell(50,10,$clientes['nome'],1,0,'C');
                $pdf->Cell(58,10,$clientes['email'],1,0,'C');
                $pdf->Cell(40,10,$clientes['telefone'],1,0,'C');
                $pdf->Cell(22,10,$clientes['sexo'],1,1,'C');
	     
               


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