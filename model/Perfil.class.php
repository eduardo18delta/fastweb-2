<?php 

include_once 'autoload.php';

class Perfil extends Conexao
{

    public function listarenderecos($idusuario)
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM endereco WHERE cliente_fk='$idusuario'";
            $resultado = $conexao->query($query);           
            $numeroenderecos = $resultado->rowCount();
            return $numeroenderecos;
    }

    public function listarlistasdecompras($idusuario)
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM lista_compras WHERE cliente_fk='$idusuario'";
            $resultado = $conexao->query($query);           
            $numerolistadecompras = $resultado->rowCount();
            return $numerolistadecompras;
    }

    public function listarhistorico($idusuario)
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM pedido WHERE cliente_fk='$idusuario'";
            $resultado = $conexao->query($query);           
            $numerolistadecompras = $resultado->rowCount();
            return $numerolistadecompras;
    }

    public function listarvalorpedido($idusuario)
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM pedido WHERE cliente_fk='$idusuario'";
            $resultado = $conexao->query($query);           
            $lista = $resultado->fetchAll();
            return $lista;
    }

    function listarvaloritemPedido($id_pedido){
     $conexao = Conexao::conectarBanco();
     $query = "
     SELECT 
     produtos.desconto,
     item_pedido.valor
     FROM item_pedido JOIN produtos ON item_pedido.produto_fk=produtos.id_produto WHERE item_pedido.pedido_fk='$id_pedido';
     ";
     $resultado = $conexao->query($query);
     $lista = $resultado->fetchAll();
     return $lista;
     
     }

    public function listargeralhistorico($idusuario)
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM pedido WHERE cliente_fk='$idusuario' ORDER BY id DESC LIMIT 3";
            $resultado = $conexao->query($query);           
            $lista = $resultado->fetchAll();
            return $lista;
    }

}

