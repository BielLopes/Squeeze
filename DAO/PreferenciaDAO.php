<?php

	require_once "Conect.php";

	class PreferenciaDAO extends Conect{
		
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


		/*Retorna um array com o ID dos gêneros selecionados*/
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
                                  
		function migosPreferem($id_genero, $id_User){
			$names = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT DISTINCT usuario.Nome AS `Name` FROM usuario inner join amigos on amigos.ID_Usuario = usuario.ID_Usuario INNER join preferencia on preferencia.ID_Usuario = amigos.ID_Usuario where amigos.ID_Usuario2 =$id_User AND preferencia.ID_Genero = $id_genero";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					$nome = $row['Name'];
					array_push($names, $nome);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $names;
		}
		
    }