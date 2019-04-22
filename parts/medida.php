<?php
      
class Medida{

public function calcularMedida(){  
           


require_once '../model/autoload.php'; 
$produtos = new Produtos(); 
$listadestaque=$produtos->listarDestaque();

        foreach($listadestaque as $destaque){

        

        $medida[]=$destaque['id_produto']; // ID do Produto
        $medida[]=$destaque['valor']; //Valor da soma de cada produtos
        $medida[]=$destaque['peso']; //Peso de produtos
        

}



echo json_encode($medida);  

}


}

$modal = new Medida;
$modal->calcularMedida();


?>