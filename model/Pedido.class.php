<?php 


require_once "autoload.php";

Class Pedido extends Conexao{

    public $id;


    public function consultarPedido($reference)
    {       
        $conexao = Conexao::conectarBanco();
        $query = "
        SELECT * FROM pedido where id = $reference 
        ";
        //$this->atualizarCliente->bindValue(":reference",$reference);
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }
    
    function listarPedidos(){
     $conexao = Conexao::conectarBanco();
     $query = "
     SELECT pedido.descricao, pedido.id, status_pedido.status FROM pedido INNER JOIN status_pedido on pedido.status_fk = status_pedido.id order by pedido.id;
     ";
     $resultado = $conexao->query($query);
     $lista = $resultado->fetchAll();
     return $lista;
     
     }

     function consultarUltimoPedido()
     {
        $conexao = Conexao::conectarBanco();
        $query = "
        SELECT * FROM pedido
        ";
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista; 
         
     }

    public function salvarPedido()
    {
        $conexao = Conexao::conectarBanco();
        $this->cadastrarCliente = $conexao->prepare("

        INSERT INTO pedido (descricao, status_fk) VALUES ('Pedido de Teste', 1)

        ");
        $this->cadastrarCliente->execute();
    }

    public function atualizarPedido($reference, $status)
    {
        $conexao = Conexao::conectarBanco();
        $this->atualizarCliente = $conexao->prepare("UPDATE pedido SET status_fk = :status where id = :reference");
        $this->atualizarCliente->bindValue(":reference",$reference);
        $this->atualizarCliente->bindValue(":status",$status); 
        $this->atualizarCliente->execute();

    }

    


}
















