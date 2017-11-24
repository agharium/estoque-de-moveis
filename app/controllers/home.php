<?php

require_once 'Controller.php';
require_once 'app/models/Usuario.php';
require_once 'app/models/ProdutoModel.php';

Class Home extends Controller {

	public function index() {
		if(isset($_SESSION['logado'])){
	     $this->renderizar('/home/dashboard/index',ProdutoModel::getProdutos());
	  }else{
			 $this->renderizar('/home/login/index');
		}
	}

	public function cadastro() {
		if(isset($_SESSION['logado'])){
	     $this->renderizar('/home/cadastro/index');
	  }else{
			 header('Location: /estoque-de-moveis/home');
		}
	}

	public function logout()
	{
		session_destroy();
		session_unset();
		header('Location: /estoque-de-moveis/');
	}

	public function logar()
	{
		$email = $_POST["usuario"];
		$senha = $_POST["senha"];

		if(Usuario::login($email,$senha)){
			if(isset($_SESSION["logado"])){
					header('Location: /estoque-de-moveis/home/');
			}
		} else {
					$this->renderizar('/home/login/index','Usuario ou senha incorretos.');
		}

	}

	public function cadastrar()
      {
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
        $email = isset($_POST["usuario"]) ? $_POST["usuario"] : null;
        $senha = isset($_POST["senha"]) ? $_POST["senha"] : null;
        $senhaConfirmacao = isset($_POST["senhaConfirmacao"]) ? $_POST["senhaConfirmacao"] : null;
				$permissao = isset($_POST["permissao"]) ? $_POST["permissao"] : null;

        $passwordHashed = $senha === $senhaConfirmacao ? password_hash($senha,PASSWORD_DEFAULT) : null;

        if ( $nome && $email && $senha && $senhaConfirmacao && $passwordHashed && $permissao ) {
            if( Usuario::cadastra($nome,$email,$passwordHashed,$permissao) ) {
                header('Location: /estoque-de-moveis/home/');
            }
        }

      }

}
