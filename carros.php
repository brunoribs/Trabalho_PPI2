<?php
	include_once 'Carro.php';
	include_once 'CarroDAO.php';
	
	if (version_compare(phpversion(), '7.1', '>=')) {
    	ini_set( 'serialize_precision', -1 );
	}
	

	
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Se tem id, busca o carro por id
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);

				$dao= new CarroDAO;		
				$carro = $dao->buscarPorId($id);
				
				$carro_json = json_encode($carro);
				header('Content-Type:application/json');
				echo($carro_json);
			}
			//senão, retorna todos os carros
			else
			{
				$dao= new CarroDAO;
				$carros =  $dao->listar();	

				$carro_json = json_encode($carros);
				header('Content-Type:application/json');
				echo($carro_json);			
			}
			break;
		case 'POST':
			$data = file_get_contents("php://input");
			$var = json_decode($data);
			$carro = new Carro(0, $var->modelo, $var->marca, $var->placa, $var->categoria, $var->ano);
			
			$dao= new CarroDAO;
			$carro = $dao->inserir($carro);

			$carro_json = json_encode($carro);
			header('HTTP/1.1 201 Created');
			header('Content-Type:application/json');
			echo($carro_json);
			break;

		case 'PUT':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				$data = file_get_contents("php://input");
				$var = json_decode($data);
				$carro = new Carro($id, $var->modelo, $var->marca, $var->placa, $var->categoria, $var->ano);

				$dao= new CarroDAO;
				$dao->atualizar($carro);
				
				$carro_json = json_encode($carro);
				header('Content-Type:application/json');
				echo($carro_json);				
			}
			break;
		case 'DELETE':
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);

				$dao= new CarroDAO;
				$carro = $dao->buscarPorId($id);
				$dao->deletar($id);				
				
				$carro_json = json_encode($carro);
				header('Content-Type:application/json');
				echo($carro_json);
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
 
?>