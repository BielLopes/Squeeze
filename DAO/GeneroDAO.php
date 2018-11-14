<?php

    require_once "Conect.php";
    require_once "DuoInterface.php";
    require_once "../Model/Genero.php";

	class GeneroDAO extends Conect implements DuoInterface{

        function retornaAll(){
            $generos = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT `Nome`, `ID_Genero` As ID FROM `genero` ORDER by ID_Genero DESC";
				$rs = $conect->query($query);
                $conect->close();
                while($row = mysqli_fetch_assoc($rs)){
                    $genero = new Genero($row['Nome'], $row['ID']); 
					array_push($generos, $genero);
                }
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
            return $generos;
        }

        
        function retornaNomePorID($id_Genero){
            $name = "";
            try{
				$conect = $this->conectar();
				$query = "SELECT `Nome` FROM `genero` WHERE ID_Genero=$id_Genero";
				$rs = $conect->query($query);
				$conect->close();
                $row = mysqli_fetch_assoc($rs);
                $name = $row['Nome']; 
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}

			return $name;
        }
        function maisBadalados(){
            $generos = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT DISTINCT genero.ID_Genero AS ID, genero.Nome FROM genero INNER JOIN preferencia ON genero.ID_Genero = preferencia.ID_Genero WHERE 1";
				$rs = $conect->query($query);
				while($row = mysqli_fetch_assoc($rs)){
                    $genero = new Genero($row['Nome'], $row['ID']);
                    $query2 = "SELECT COUNT(genero.ID_Genero) AS result FROM genero INNER JOIN preferencia ON genero.ID_Genero = preferencia.ID_Genero WHERE genero.ID_Genero = {$row['ID']}";
                    $rs2 = $conect->query($query2);
                    $row2 = mysqli_fetch_assoc($rs2);
                    $genero->setVezes($row2['result']);
                    array_push($generos, $genero);
                }
                $conect->close();
                for($i=0; $i < (count($generos)-1); $i++){
                    for($j=($i+1); $j < count($generos); $j++){
                        if($generos[$i]->getVezes() < $generos[$j]->getVezes()){
                            $controle = $generos[$i];
                            $generos[$i] = $generos[$j];
                            $generos[$j] = $controle;
                        }
                    }
                }
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $generos;
        }

        function ordemAlfabetica(){
            $generos = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT ID_Genero AS ID, Nome FROM genero where 1  ORDER BY Nome ASC";
				$rs = $conect->query($query);
				$conect->close();
				while($row = mysqli_fetch_assoc($rs)){
					$genero = new Genero($row['Nome'], $row['ID']);
					array_push($generos, $genero);
				}
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			
			return $generos;
        }

    }