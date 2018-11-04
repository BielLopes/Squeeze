<?php

    require_once "Conect.php";

	class GeneroDAO extends Conect{

        function retornaAll(){
            $generos = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT `Nome`, `ID_Genero` As ID FROM `genero`";
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

        /*function criaPreferencia($id_User, $id_Genero){
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
        }*/
    }