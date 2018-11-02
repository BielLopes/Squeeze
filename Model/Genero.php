<?php
class Genero{
		private  $id;
		private  $name;


		function __construct($_name, $_id){
			$this->setName($_name);
			$this->setId($_id);
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

	}
