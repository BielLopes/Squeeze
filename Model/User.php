<?php
class User{
		private  $idUser;
		private  $nmUser;
		private  $email;
		private  $login;
		private  $senha;

		function __construct($_name, $_email, $_senha, $_login){
			$this->setNmUser($_name);
			$this->setEmail($_email);
			$this->setSenha($_senha);
			$this->setLogin($_login);
		}

		function getIdUser(){
			return $this->idUser;
		}
		function setIdUser($_idUser){
			$this->idUser = $_idUser;
		}

		function getNmUser(){
			return $this->nmUser;
		}
		function setNmUser($_nmUser){
			$this->nmUser = $_nmUser;
		}
		function getSenha(){
			return $this->senha;
		}
		function setSenha($_senha){
			$this->senha = $_senha;
		}

		function getEmail(){
			return $this->email;
		}
		function setEmail($_email){
			$this->email = $_email;
		}

		function getLogin(){
			return $this->login;
		}

		function setLogin($_login){
			$this->login = $_login;
		}

	}
