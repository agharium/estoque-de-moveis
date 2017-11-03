<?php
	require_once("Permissao.php");

	class Usuario{
		private $codigo;
		private $nome;
		private $email;
		private $criacao;
		private $senha;
		private $Permissao;

		public function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		public function getCodigo(){
			return $this->codigo;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setCriacao($criacao){
			$this->criacao = $criacao;
		}

		public function getCriacao(){
			return $this->criacao;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getSenha(){
			//Cuidado com a utilização do retorno desse cara
			return $this->senha;
		}

		public function setPermissao($Permissao){
			$this->Permissao = $Permissao;
		}

		public function getPermissao(){
			return $this->Permissao;
		}
	}
?>
