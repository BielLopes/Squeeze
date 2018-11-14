<?php

	require_once "Conect.php";

	class UserDAO extends Conect{
        
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

		
		function updateUser($user){
			$situacao = TRUE;
			try{
				$conect = $this->conectar();
                $query = "UPDATE `usuario` SET `Nome`='{$user->getNmUser()}',`Login`='{$user->getLogin()}', `Senha`='{$user->getSenha()}',`E-mail`='{$user->getEmail()}' WHERE ID_Usuario = {$user->getIdUser()}";
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
			try{
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
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
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

		//Retorna o nome
		function pesquisaNomePorId($id){
			$nome = "";
			try{
				$conect = $this->conectar();
                $query = "SELECT `Nome` FROM `usuario` WHERE ID_Usuario=$id";
				$rs = $conect->query($query);
				$conect->close();
				$registro = mysqli_fetch_assoc($rs);
				$nome = $registro['Nome'];
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $nome;
		}


		/*Retorna um array de Ids*/
		function pesquisaPorNome($nome){
			$IdsUser = array();
			try{
				$conect = $this->conectar();
				$query = "SELECT `ID_Usuario` AS `ID` FROM `usuario` WHERE Nome LIKE '%{$nome}%'";
				$rs = $conect->query($query);
				$conect->close();
				if(mysqli_num_rows($rs) > 0){
					while($row = mysqli_fetch_assoc($rs)){
						array_push($IdsUser, $row['ID']);
					}
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $IdsUser;
		}
    }