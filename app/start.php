<?php
	define('VIEW_PATH', 'app/views');
	session_start();
	date_default_timezone_set('America/Sao_Paulo');

	require_once 'controllers/Controller.php';
	require_once 'helper/PseudoCrypt.php';
	require_once 'models/Usuario.php';
 	require_once 'models/ProdutoModel.php';

	require_once 'core/app.php';
