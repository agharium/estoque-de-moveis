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
			$conn 				= Database::getConnection();
			$success 			= false;

			$stmt 				= $conn->prepare("SELECT usuario_nome,usuario_senha,permissao_codigo
				 										from usuario WHERE usuario_email = ? LIMIT 1");
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($usuario_nome,$usuario_senha,$permissao_codigo);
    	$stmt->store_result();

			if($stmt->num_rows == 1) {
        while($stmt->fetch()) {

					if ( password_verify($senha, $usuario_senha) ) {
						$_SESSION['logado'] = true;
						$_SESSION['permission'] = $permissao_codigo;
						$_SESSION['user'] = $usuario_nome;

						$success = true;
					}//fim if password verify

        } //fim while
      }//fim if num rows

			$stmt->close();
			$conn->close();
			return $success;

		}

		public function cadastra($nome,$email,$senha,$permissao)
		{
			$conn 				= Database::getConnection();

			$sql 					= "INSERT INTO usuario (usuario_nome, usuario_email, usuario_senha,permissao_codigo)
			VALUES (?,?,?,?)";

			$stmt 				= $conn->prepare($sql);

			$stmt->bind_param("sssi",$nome,$email,$senha,$permissao);

			if($stmt->execute()){
				return true;
			}

			$stmt->close();
			$conn->close();
			return false;
		}
	}
?>
