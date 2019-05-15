<?php

include_once('Carro.php');
include_once('CarroDAO.php');


class CarroController {
    public function listar($request, $response, $args) {
        $dao= new CarroDAO;    
        $carros =  $dao->listar();
                
        return $response->withJson($carros);    
    }
    
    public function buscarPorId($request, $response, $args) {
        $id = $args['id'];
        
        $dao= new CarroDAO;    
        $carro = $dao->buscarPorId($id);
        
        return $response->withJson($carro);
    }

    public function inserir( $request, $response, $args) {
        $p = $request->getParsedBody();
        $carro = new Carro(0,$p['modelo'],$p['marca'],$p['placa'],$p['categoria'],$p['ano']);
    
        $dao = new CarroDAO;
        $carro = $dao->inserir($carro);
    
        return $response->withJson($carro,201);    
    }
    
    public function atualizar($request, $response, $args) {
        $id = $args['id'];
        $p = $request->getParsedBody();
        $carro = new Carro($id,$p['modelo'],$p['marca'],$p['placa'],$p['categoria'],$p['ano']);
    
        $dao = new CarroDAO;
        $carro = $dao->atualizar($carro);
    
        return $response->withJson($carro);    
    }

    public function deletar($request, $response, $args) {
        $id = $args['id'];

        $dao = new CarroDAO;
        $carro = $dao->deletar($id);
    
        return $response->withJson($carro);  
    }
}