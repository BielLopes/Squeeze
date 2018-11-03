<?php

    class Conect {
        public function conectar(){
			$host = 'localhost';
			$usuario = 'root';
			$senha = '';
			$database = 'squeeze';
			$conexao = new mysqli($host, $usuario, $senha, $database);

			return $conexao;
		}
    }