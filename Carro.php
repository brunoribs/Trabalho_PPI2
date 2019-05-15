<?php
    class Carro {
        public $id;
        public $modelo;
        public $marca;
        public $placa;
        public $categoria;
        public $ano;

        function __construct($id, $modelo, $marca, $placa, $categoria, $ano){
            $this->id = $id;
            $this->modelo = $modelo;
            $this->marca = $marca;
            $this->placa = $placa;
            $this->categoria = $categoria;
            $this->ano = $ano;
        }
    }
?>