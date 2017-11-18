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
		$this->renderizar('/home/cadastro/index');
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
		$senha = md5($_POST["senha"]);

		if(Usuario::login($email,$senha)){
			if(isset($_SESSION["logado"])){
					//permissao 1 - admin (criar usuario, permissao etc)
					if($_SESSION["permission"] == 1){
						$this->renderizar('/admin/index');
					}
					//qualquer outra permissao vai para Dashboard normal (gerente, vendedor)
					else{
						header('Location: /estoque-de-moveis/home/');
					}
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

        $passwordHashed = $senha === $senhaConfirmacao ? md5($senha) : null;

        if ( $nome && $email && $senha && $senhaConfirmacao && $passwordHashed ) {
            if( Usuario::cadastra($nome,$email,$passwordHashed) ) {
                header('Location: /estoque-de-moveis/home/');
            }
        }

      }

}
