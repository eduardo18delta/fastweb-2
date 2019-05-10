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

    public function salvarPedido($cliente_fk, $endereco_fk, $valor, $pedido_efetuado, $pagamento_autorizado, $nf_emitida)
    {
        $conexao = Conexao::conectarBanco();
        $this->salvarPedido = $conexao->prepare("

        INSERT INTO pedido (cliente_fk, endereco_fk, status_fk, valor, pedido_efetuado, pagamento_autorizado, nf_emitida) VALUES (:cliente_fk, :endereco_fk, "0", :valor, :pedido_efetuado, :pagamento_autorizado, :nf_emitida);
        ");
        $this->salvarPedido->bindValue(":cliente_fk",$cliente_fk);
        $this->salvarPedido->bindValue(":endereco_fk",$endereco_fk); 
        $this->salvarPedido->bindValue(":valor",$valor);
        $this->salvarPedido->bindValue(":pedido_efetuado",$pedido_efetuado); 
        $this->salvarPedido->bindValue(":pagamento_autorizado",$pagamento_autorizado);
        $this->salvarPedido->bindValue(":nf_emitida",$nf_emitida); 
        $this->salvarPedido->execute();
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
















