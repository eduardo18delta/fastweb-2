<?php 

include_once 'autoload.php';

class Menu extends Conexao
{

	public function listarusuarios()
    	{       
        	$conexao = Conexao::conectarBanco();
        	$query = "SELECT * FROM users";
        	$resultado = $conexao->query($query);        	
        	$numerousers = $resultado->rowCount();
        	return $numerousers;
    }

    public function listarcargos()
    	{       
        	$conexao = Conexao::conectarBanco();
        	$query = "SELECT * FROM cargo";
        	$resultado = $conexao->query($query);        	
        	$numerousers = $resultado->rowCount();
        	return $numerousers;
    }

}

