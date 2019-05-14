<?php

/*$user = "postgresql"
$senha = "postgresql"
$conexao = "pgsql:host=localhost:5432;dbname=app_produtos";
$pdo = new PDO($conexao,$user,$senha);*/

        $db_host = "localhost";
        $db_nome = "bd_trabalho_ppi2";
        $db_usuario = "postgres";
        $db_senha = "posgresql";
        $db_driver = "pgsql";

        $db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);

 ?>