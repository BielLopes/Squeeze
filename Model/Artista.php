<?php
class Artista{
		private  $id;
        private  $name;
        private  $id_genero;


		function __construct($_name, $_id, $_id_genero){
			$this->setName($_name);
            $this->setId($_id);
            $this->setId_Genero($_id_genero);
		}
		function getId(){
			return $this->id;
		}
		function setId($_id){
			$this->id = $_id;
		}


		function getName(){
			return $this->name;
        }
		function setName($_name){
			$this->name = $_name;
        }
        

        function getId_Genero(){
			return $this->idUser;
		}
		function setId_Genero($_id){
			$this->id = $_id;
		}

	}
