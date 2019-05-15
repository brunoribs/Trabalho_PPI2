<?php
    include_once('Carro.php');
    include_once('CarroDAO.php');

    $carro = new Carro(0, "Ka", "Ford", "IKS2E65", 1, 2017);
    $carro = new Carro(0, "Fiesta", "Ford", "ILA2A61", 1, 2018);
    $carro = new Carro(0, "Palio", "Fiat", "MLA2R80", 1, 2018);

			
    $dao= new CarroDAO;    
    $carro = $dao->inserir($carro);

    $carro = $dao->buscarPorId(2);
    $carro = new Carro(2, "Fiesta Sedan", "Ford", "ILA2A61", 2, 2018);
    $dao->atualizar($carro);

    $dao->deletar(3);				


    $carros =  $dao->listar();	
    print_r($carros);
?>