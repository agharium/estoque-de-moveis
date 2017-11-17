<?php
	require_once("Database.php");
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

		//boolean
		public function login($email, $senha)
		{
			$conn = Database::getConnection();
			$usuario_nome='';
			$permissao_codigo='';

			$stmt = $conn->prepare("SELECT usuario_nome,permissao_codigo
				 										from usuario WHERE usuario_email = ? AND usuario_senha = ? LIMIT 1");
			$stmt->bind_param("ss", $email, $senha);
			$stmt->execute();
			$stmt->bind_result($usuario_nome,$permissao_codigo);
    	$stmt->store_result();

			if($stmt->num_rows == 1)  //To check if the row exists
        {
            while($stmt->fetch()) //fetching the contents of the row
						{
							$_SESSION['logado'] = true;
              $_SESSION['permission'] = $permissao_codigo;
              $_SESSION['user'] = $usuario_nome;
            }

						$stmt->close();
						return true;
        }
			$conn->close();
			return false;

		}
	}
?>
