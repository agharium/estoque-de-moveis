<?php

require_once 'Controller.php';

Class Home extends Controller {

	//Caminho para diretorio home: app/views/home/

	//Estrutura da HOME:

	// home
	//  --cadastro
	//    --index.php
	//  --dashboard
	//    --index.php
	//  --login
	//    --index.php
	// footer.php
	// head.php

	public function index() {
		$this->renderizar('login/index');
	}

	public function cadastro() {
		$this->renderizar('cadastro/index');
	}
	
	public function dashboard(){
		$this->renderizar('dashboard/index');
	}
	
}