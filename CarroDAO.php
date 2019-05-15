<?php
    include_once 'Carro.php';
	include_once 'PDOFactory.php';

    class CarroDAO
    {
        public function inserir(Carro $carro)
        {
            $qInserir = "INSERT INTO carro(modelo,marca,placa,categoria,ano) VALUES (:modelo,:marca,:placa,:categoria,:ano)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":modelo",$carro->modelo);
            $comando->bindParam(":marca",$carro->marca);
            $comando->bindParam(":placa",$carro->placa);
            $comando->bindParam(":categoria",$carro->categoria);
            $comando->bindParam(":ano",$carro->ano);
            $comando->execute();
            $carro->id = $pdo->lastInsertId();
            return $carro;
        }

        public function deletar($id)
        {
            $qDeletar = "DELETE from carro WHERE id=:id";            
            $carro = $this->buscarPorId($id);
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
            return $carro;
        }

        public function atualizar(Carro $carro)
        {
            $qAtualizar = "UPDATE carro SET modelo=:modelo, marca=:marca, placa=:placa, categoria=:categoria, ano=:ano WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":modelo",$carro->modelo);
            $comando->bindParam(":marca",$carro->marca);
            $comando->bindParam(":placa",$carro->placa);
            $comando->bindParam(":categoria",$carro->categoria);
            $comando->bindParam(":ano",$carro->ano);
            $comando->bindParam(":id",$carro->id);
            $comando->execute();
            return $carro;        
        }

        public function listar()
        {
		    $query = 'SELECT * FROM carro';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $carros=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $carros[] = new Carro($row->id,$row->modelo,$row->marca,$row->placa,$row->categoria,$row->ano);
            }
            return $carros;
        }

        public function buscarPorId($id)
        {
 		    $query = 'SELECT * FROM carro WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Carro($result->id,$result->modelo,$result->marca,$result->placa,$result->categoria,$result->ano);           
        }
    }
?>