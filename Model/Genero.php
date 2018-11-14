<?php
class Genero{
		private  $id;
		private  $name;
		private  $vezesPreferido;


		function __construct($_name, $_id){
			$this->setName($_name);
			$this->setId($_id);
			$this->setVezes(0);
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

		function getVezes(){
			return $this->vezesPreferido;
        }
		function setVezes($_vezesPreferido){
			$this->vezesPreferido = $_vezesPreferido;
		}

	}
