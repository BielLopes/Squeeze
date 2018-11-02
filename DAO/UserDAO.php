<?php

	require_once '../Model/User.php';

	class UserDAO{
        public function conectar(){
			$host = 'localhost';
			$usuario = 'root';
			$senha = '';
			$database = 'squeeze';
			$conexao = new mysqli($host, $usuario, $senha, $database);

			return $conexao;
        }
        
        function Novo($user){
			$situacao = TRUE;
			try{
				$conect = $this->conectar();
                $query = "INSERT INTO `usuario`(`Nome`, `Login`, `Senha`, `E-mail`) VALUES ('{$user->getNmUser()}','{$user->getLogin()}','{$user->getSenha()}','{$user->getEmail()}')";
				$conect->query($query);
				$conect->close();
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}


		//Retorna Verdadeiro Quando Login não existe
		function verificaLogin($login){
			$conect = $this->conectar();
			$query = "SELECT `Login` FROM `usuario` WHERE Login='$login'";
			$row = $conect->query($query);
			$conect->close();
			if(mysqli_num_rows($row) == 0){
				return true;
			}else{
				if(mysqli_num_rows($row) == 1){
					return false;
				}
			}
		}
		


		function buscarPorLogin($login){
			try{
				$conect = $this->conectar();
				$query = "SELECT `ID_Usuario` AS `ID`, `Nome`, `Senha`, `E-mail` AS `email` FROM `usuario` WHERE Login='$login'";
				$resultado = $conect->query($query);
				$conect->close();
				$registro = mysqli_fetch_assoc($resultado);
				$email = $registro['email'];
				$Id = $registro['ID'];
				$senha = $registro['Senha'];
				$nome = $registro['Nome'];
				$user = new User($nome, $email, $senha, $login);
				$user->setIdUser($Id);
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $user;
		}

		function Deleta($id){
			$situacao = TRUE;
			try{
				$conect = $this->conectar();
                $query = "DELETE FROM `usuario` WHERE ID_Usuario=$id";
				$conect->query($query);
				$conect->close();
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}
    }