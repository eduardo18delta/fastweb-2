<?php 

session_start();

require_once '../model/autoload.php';


$produtos = new Produtos(); 

$lista_produtos=$produtos->listar();?>


<?php foreach ($listadecompras as $lista):?>
                                
                                <div class="btn btn-primary d-flex justify-content-between">
                                    <div class="fas fa-plus icon-plus"></div>
                                    <div><?= $lista['nome']?></div> 
                                    <div class="d-flex"> 
                                        <div data-toggle="modal" data-target="#modalprodutos" class="btn btn-success">Adicionar Produto</div>
                                        <div class="btn btn-primary"><i class="fas fa-edit"></i></div>
                                        <div class="btn btn-primary"><i class="fas fa-trash"></i></div>
                                             
                                    </div>             
                                </div>
                                  
                                <div class="bg-default">Adicione produtos na lista</div>
                                
                                <?php endforeach?>  

 ?>

