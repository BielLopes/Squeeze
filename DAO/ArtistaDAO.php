<?php

    require_once "Conect.php";
    require_once "DuoInterface.php";
    require_once "../Model/Artista.php";

	class ArtistaDAO extends Conect implements DuoInterface{
        /*Retorna um array de artistas*/
        function maisBadalados(){
            $artistas = array();
           /* $query2 = "";
            $rs2 = NULL;w
            $row2 = NULL;
            $i = 0;
            $j = 0;
            $controle = NULL;*/
			try{
				$conect = $this->conectar();
                $query = "SELECT DISTINCT artista.ID_Artista AS `ID`, artista.Nome AS `Name`, artista.ID_Genero FROM `artista` INNER JOIN `favorito_artista` ON favorito_artista.ID_Artista = artista.ID_Artista WHERE 1";
				$rs = $conect->query($query);
				while($row = mysqli_fetch_assoc($rs)){
                    $artista = new Artista($row['Name'], $row['ID'], $row['ID_Genero']);
                    $query2 = "SELECT COUNT(artista.ID_Artista) AS result FROM `artista` INNER JOIN `favorito_artista` ON favorito_artista.ID_Artista = artista.ID_Artista WHERE artista.ID_Artista = {$artista->getId()}";
                    $rs2 = $conect->query($query2);
                    $row2 = mysqli_fetch_assoc($rs2);
                    $artista->setVezes($row2['result']);
                    array_push($artistas, $artista);
                }
                $conect->close();
                for($i=0; $i < count($artistas); $i++){
                    for($j=($i+1); $j < count($artistas); $j++){
                        if($artistas[$i]->getVezes() < $artistas[$j]->getVezes()){
                            $controle = $artistas[$i];
                            $artistas[$i] = $artistas[$j];
                            $artistas[$j] = $controle;
                        }
                    }
                }
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $artistas;
        }

        /*Retorna um array de artistas*/
        function ordemAlfabetica(){
            $artistas = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT ID_Artista AS `ID`, Nome AS `Name`, ID_Genero FROM `artista` where 1  ORDER BY Nome ASC";
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

        /*Retorna um array de artistas*/
        function doGenero($ID_Genero){
            $artistas = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT ID_Artista AS `ID`, Nome AS `Name`, ID_Genero FROM `artista` where ID_Genero = $ID_Genero  ORDER BY ID_Artista DESC";
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

        function porId($id){
            $artista = null;
            try{
				$conect = $this->conectar();
                $query = "SELECT ID_Artista AS `ID`, Nome AS `Name`, ID_Genero FROM `artista` where ID_Artista=$id";
				$rs = $conect->query($query);
				$conect->close();
				$row = mysqli_fetch_assoc($rs);
				$artista = new Artista($row['Name'], $row['ID'], $row['ID_Genero']);

			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $artista;

        }
    }