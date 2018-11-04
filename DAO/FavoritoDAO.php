<?php

	require_once "Conect.php";
	require_once "../Model/Artista.php";

	class FavoritoDAO extends Conect{

        private $ID_User;

        function __construct($_id_User){
			$this->ID_User = $_id_User;
        }

        function include($favorito){
            $situacao = TRUE;
			try{
				$conect = $this->conectar();
                $query = "INSERT INTO `favorito_artista`(`ID_Artista`, `ID_Usuario`) VALUES ($ID_User, {$favorito->getIdArtista()})";
				$conect->query($query);
				$conect->close();
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
        }
        function delete($favorito){
            $situacao = TRUE;
			try{
				$conect = $this->conectar();
                $query = "DELETE FROM `favorito_artista` WHERE ID_FA={$favorito->getId()} AND ID_Usuario=$ID_User";
				$conect->query($query);
				$conect->close();
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
        }
        function isFavorited($id_Artista){
            $situacao = FALSE;
			try{
				$conect = $this->conectar();
                $query = "SELECT * FROM `favorito_artista` WHERE ID_Artista=$id_Artista AND ID_Usuario=$ID_User";
				$row = $conect->query($query);
                $conect->close();
                if(mysqli_num_rows($row) == 1){
                    $situacao = TRUE;
                }
			}catch(Exception $ex){
				$situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $situacao;
		}
		//Retorna um array de nomes
        function migosFavoritaram($id_Artista){
            $names= array();
			try{
				$conect = $this->conectar();
                $query = "SELECT usuario.Nome AS `Name` FROM usuario inner join amigos on amigos.ID_Usuario = usuario.ID_Usuario INNER join favorito_artista on favorito_artista.ID_Usuario = amigos.ID_Usuario where amigos.ID_Usuario2 =$ID_User AND favorito_artista.ID_Artista = $id_Artista";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					array_push($names, $row['Name']);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $names;
		}
		//Retornar um array de Artistas Ordenados pelos mais recentes
        function allEmOrdem(){
			$artistas = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT artista.ID_Artista AS `ID`, artista.Nome AS `Name`, artista.ID_Genero FROM `artista` INNER JOIN `favorito_artista` ON favorito_artista.ID_Artista = artista.ID_Artista WHERE favorito_artista.ID_Usuario = $ID_User order by favorito_artista.ID_FA DESC";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					$artista = new Artista($row['Name'], $row['ID'], $row['ID_Genero']);
					array_push($artistas, $artista);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $artistas;
		}
		//Retornar um array de Artistas Favoritados Peloes Migos
        function allArtistasDosMigos(){
			$artistas = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT DISTINCT artista.ID_Artista AS `ID`, artista.Nome AS `Name`, artista.ID_Genero FROM `artista` INNER JOIN `favorito_artista` ON favorito_artista.ID_Artista = artista.ID_Artista INNER JOIN `amigos` ON favorito_artista.ID_Usuario = amigos.ID_Usuario WHERE amigos.ID_Usuario2 = $ID_User order by favorito_artista.ID_FA DESC";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					$artista = new Artista($row['Name'], $row['ID'], $row['ID_Genero']);
					array_push($artistas, $artista);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $artistas;
        }
    }