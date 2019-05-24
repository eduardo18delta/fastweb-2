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
    
    function listarPedidos($id_clientes){
     $conexao = Conexao::conectarBanco();
     $query = "
     SELECT pedido.id, status_pedido.status, pedido.valor, clientes.nome, endereco.rua, endereco.numero, endereco.bairro, endereco.cidade, endereco.estado, endereco.cep FROM pedido JOIN clientes JOIN endereco JOIN status_pedido ON pedido.cliente_fk=clientes.id AND pedido.endereco_fk=endereco.id AND pedido.status_fk=status_pedido.id WHERE clientes.id='$id_clientes' ORDER BY pedido.id DESC;
     ";
     $resultado = $conexao->query($query);
     $lista = $resultado->fetchAll();
     return $lista;
     
     }

     function listaritemPedidos($id_pedido){
     $conexao = Conexao::conectarBanco();
     $query = "
     SELECT 
     produtos.id_produto,
     produtos.nome,
     produtos.descricao,
     produtos.peso,
     produtos.medida,
     produtos.desconto,
     produtos.cod_barra,
     produtos.destaque,
     produtos.categoria_fk,
     produtos.img_01,
     item_pedido.id,
     item_pedido.pedido_fk,
     item_pedido.produto_fk,
     item_pedido.valor,
     item_pedido.quantidade
     FROM item_pedido JOIN produtos ON item_pedido.produto_fk=produtos.id_produto WHERE item_pedido.pedido_fk='$id_pedido';
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

    public function salvarPedido($cliente_fk, $endereco_principal, $valor, $pedido_efetuado, $pagamento_autorizado, $nf_emitida)
    {
        $conexao = Conexao::conectarBanco();
        $this->salvarPedido = $conexao->prepare("

        INSERT INTO pedido (cliente_fk, endereco_fk, status_fk, valor, pedido_efetuado, pagamento_autorizado, nf_emitida) VALUES (:cliente_fk, :endereco_principal, 1, :valor, :pedido_efetuado, :pagamento_autorizado, :nf_emitida);
        ");
        $this->salvarPedido->bindValue(":cliente_fk",$cliente_fk);
        $this->salvarPedido->bindValue(":endereco_principal",$endereco_principal); 
        $this->salvarPedido->bindValue(":valor",$valor);
        $this->salvarPedido->bindValue(":pedido_efetuado",$pedido_efetuado); 
        $this->salvarPedido->bindValue(":pagamento_autorizado",$pagamento_autorizado);
        $this->salvarPedido->bindValue(":nf_emitida",$nf_emitida); 
        $this->salvarPedido->execute();
    }


    public function salvaritemPedido($pedido_fk, $produto_fk, $valor, $quantidade)
    {
        $conexao = Conexao::conectarBanco();
        $this->salvarPedido = $conexao->prepare("

        INSERT INTO item_pedido (pedido_fk, produto_fk, valor, quantidade) VALUES (:pedido_fk,:produto_fk,:valor,:quantidade);

        ");
        $this->salvarPedido->bindValue(":pedido_fk",$pedido_fk);
        $this->salvarPedido->bindValue(":produto_fk",$produto_fk); 
        $this->salvarPedido->bindValue(":valor",$valor);
        $this->salvarPedido->bindValue(":quantidade",$quantidade); 
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


    public function atualizarvalorPedido($reference, $valor)
    {
        $conexao = Conexao::conectarBanco();
        $this->atualizarCliente = $conexao->prepare("UPDATE pedido SET valor = :valor where id = :reference");
        $this->atualizarCliente->bindValue(":reference",$reference);
        $this->atualizarCliente->bindValue(":valor",$valor); 
        $this->atualizarCliente->execute();

    }    


}
















