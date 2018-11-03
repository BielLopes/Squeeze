<?php
    class Migo{
		private  $id_User;
		private  $id_Amigo;


		function __construct($_id_User, $_id_Amigo){
			$this->setIdUser($_id_User);
			$this->setIdMigo($_id_Amigo);
		}
		function getIdUser(){
			return $this->id_User;
		}
		function setIdUser($_id_User){
			$this->id_User = $_id_User;
		}

		function getIdMigo(){
			return $this->id_Amigo;
        }
		function setIdMigo($_id_Amigo){
			$this->id_Amigo = $_id_Amigo;
		}

	}
