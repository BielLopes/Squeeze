<?php
    class Favorito{
		private  $id_User;
        private  $id_Artista;
        private  $id;


		function __construct(){
			$this->setIdUser("");
			$this->setIdArtista("");
        }
        
        function getId(){
			return $this->id;
		}
		function setId($_id){
			$this->id = $_id;
		}

		function getIdUser(){
			return $this->id_User;
		}
		function setIdUser($_id_User){
			$this->id_User = $_id_User;
		}

		function getIdArtista(){
			return $this->id_Artista;
        }
		function setIdArtista($_id_Artista){
			$this->id_Artista = $_id_Artista;
		}

	}