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

    public function listarlistasdecompras()
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM lista_compras";
            $resultado = $conexao->query($query);           
            $numerolistadecompras = $resultado->rowCount();
            return $numerolistadecompras;
    }

    public function listarhistorico()
        {       
            $conexao = Conexao::conectarBanco();
            $query = "SELECT * FROM pedido";
            $resultado = $conexao->query($query);           
            $numerolistadecompras = $resultado->rowCount();
            return $numerolistadecompras;
    }


}

