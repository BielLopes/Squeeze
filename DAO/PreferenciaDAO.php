<?php

	class PreferenciaDAO{
        public function conectar(){
			$host = 'localhost';
			$usuario = 'root';
			$senha = '';
			$database = 'squeeze';
			$conexao = new mysqli($host, $usuario, $senha, $database);

			return $conexao;
		}
		
		function criaPreferencia($id_User, $id_Genero){
            try{
				$conect = $this->conectar();
                $query = "INSERT INTO `preferencia`(`ID_Genero`, `ID_Usuario`) VALUES ($id_Genero, $id_User)";
				$conect->query($query);
                $conect->close();
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
        }

        function deletaPreferencia($id_User, $id_Genero){
            try{
				$conect = $this->conectar();
                $query = "DELETE FROM `preferencia` WHERE ID_Genero=$id_Genero AND ID_Usuario=$id_User";
				$conect->query($query);
                $conect->close();
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
		}

		function preferenciasDoUsuario($id_User){
			$preferencias = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT `ID_Genero`, `ID_Usuario` FROM `preferencia` WHERE ID_Usuario=$id_User";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					array_push($preferencias, $row['ID_Genero']);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $preferencias;
		}
		
    }