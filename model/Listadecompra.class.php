<?php 

require_once "autoload.php";

class Listadecompras extends Conexao
{
    public $cliente_fk ;
    public $nome;


    public function listaListadecompras($idusuario)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "SELECT * FROM lista_compras where cliente_fk = $idusuario ORDER BY lista_compras.id DESC";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function cadastrarListadecompras()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarListadecompras = $conexao->prepare("

        INSERT INTO lista_compras
        (id, nome, cliente_fk) VALUES 
        (NULL, :nome, :cliente_fk);");
        
        $this->cadastrarListadecompras->bindValue(":cliente_fk", $this->cliente_fk, PDO::PARAM_STR);
        $this->cadastrarListadecompras->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->cadastrarListadecompras->execute();
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Lista cadastrada com sucesso!
        </div>";
    }

    public function deletarListadecompras()
    {
        $conexao = Conexao::conectarBanco();
        $this->deletaritem = $conexao->prepare("DELETE FROM item_lista_compras WHERE lista_compras_fk = :id;");
        $this->deletaritem->bindValue(":id", $this->id, PDO::PARAM_STR);
        $this->deletaritem->execute();
        $this->deletar = $conexao->prepare("DELETE FROM lista_compras WHERE id = :id;");
        $this->deletar->bindValue(":id", $this->id, PDO::PARAM_STR);        
        $this->deletar->execute();
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-danger mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Lista deletada com sucesso!
        </div>";
    }
    
    public function addlistaCarrinho()
    {
        $conexao = Conexao::conectarBanco();
        $query = "SELECT 
        item_lista_compras.id,
        produtos.id_produto,
        produtos.medida
        FROM item_lista_compras 
        JOIN lista_compras 
        JOIN produtos 
        ON item_lista_compras.lista_compras_fk=lista_compras.id AND item_lista_compras.produtos_fk=produtos.id_produto 
        WHERE lista_compras.id = $this->id;";
        $resultado = $conexao->query($query);
        $itemlistadecompras = $resultado->fetchAll();

        foreach ($itemlistadecompras as $lista){
            $id_produto = $lista['id_produto'];
              if(!isset($_SESSION['carrinho'][$id_produto])){
               $_SESSION['carrinho'][$id_produto] = 1;
            }else{ 
               $_SESSION['carrinho'][$id_produto] += 1;
            } 

            if ($lista['medida']==1){
        $_SESSION['teste2'][$id_produto]="rs";
      }
      if ($lista['medida']==2){
        $_SESSION['teste2'][$id_produto]="kg";
      }
      if ($lista['medida']==3){
        $_SESSION['teste2'][$id_produto]="kg";
      }
      if ($lista['medida']==4){
        $_SESSION['teste2'][$id_produto]="und";
      }    
      if ($lista['medida']==5){
        $_SESSION['teste2'][$id_produto]="und";
      }
      if ($lista['medida']==6){
        $_SESSION['teste2'][$id_produto]="und";
      }
      if ($lista['medida']==7){
        $_SESSION['teste2'][$id_produto]="und";
      }
    
        
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Lista adicionada no carrinho com sucesso!
        </div>";  
        } 
    }

    public function atualizar()
    {
        $conexao = Conexao::conectarBanco();
        $this->updateProduto = $conexao->prepare("

        UPDATE lista_compras SET nome = :nome WHERE id = :id ");
      
        $this->updateProduto->bindValue(":id", $this->id, PDO::PARAM_STR);      
        $this->updateProduto->bindValue(":nome", $this->nome, PDO::PARAM_STR); 
        $this->updateProduto->execute();
        $_SESSION['msgcadastro'] = "
        <div class='alert alert-success mt-4'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close>
            <span aria-hidden='true'>&times;</span>
            </button>Lista alterada com sucesso!
        </div>";
    }

}


