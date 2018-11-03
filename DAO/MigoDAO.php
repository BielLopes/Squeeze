<?php
    
    require_once "Conect.php";
    
    /*error_reporting(0);
	ini_set('display_errors', FALSE);*/

    class MigoDAO extends Conect{

        function meusMigos($id_User){
            $migos = array();
			try{
				$conect = $this->conectar();
                $query = "SELECT `ID_Usuario2` AS `ID` FROM `amigos` WHERE ID_Usuario=$id_User";
                $rs = $conect->query($query);
                $conect->close();
                while($row = mysqli_fetch_assoc($rs)){
                    $migo = new Migo($id_User, $row['ID']);
					array_push($migos, $migo);
                }
                /*Houve uma pivotação sobre a relação de Amizade, que facilmente pode ser pivotada mais uma
                  vez para se tornar um esquema de seguindo e seguidores
                $query = "SELECT `ID_Usuario` AS `ID`, `ID_Usuario2` AS `ID2` FROM `amigos` WHERE ID_Usuario2=$id_User";
				$rs = $conect->query($query);
                $conect->close();
                while($row = mysqli_fetch_assoc($rs)){
					$migo = new Migo($row['ID'], $row['ID2']);
					array_push($migos, $migo);
                }*/
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			return $migos;
        }

        /*Adicionar Amizade*/
        function gosteiDesse($novaAmizade){
            $situacao = TRUE;
            try{
				$conect = $this->conectar();
                $query = "INSERT INTO `amigos`(`ID_Usuario`, `ID_Usuario2`) VALUES ({$novaAmizade->getIdUser()}, {$novaAmizade->getIdMigo()})";
                $rs = $conect->query($query);
                $query = "INSERT INTO `amigos`(`ID_Usuario`, `ID_Usuario2`) VALUES ({$novaAmizade->getIdMigo()}, {$novaAmizade->getIdUser()})";
                $rs = $conect->query($query);
                $conect->close();
            }catch(Exception $ex){
                $situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
            return $situacao;
        }

        /*Deletar Amizade*/
        function odeioEsse($deletaAmizade){
            $situacao = TRUE;
            try{
				$conect = $this->conectar();
                $query = "DELETE FROM `amigos` WHERE (ID_Usuario={$deletaAmizade->getIdUser()} AND ID_Usuario2={$deletaAmizade->getIdMigo()}) OR (ID_Usuario={$deletaAmizade->getIdMigo()} AND ID_Usuario2={$deletaAmizade->getIdUser()})";
                $rs = $conect->query($query);
                $conect->close();
            }catch(Exception $ex){
                $situacao = FALSE;
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
            }
            return $situacao;
        }
        
    }