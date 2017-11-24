<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	define('VIEW_PATH', 'app/views');

	require_once 'app/start.php';

	$app = new App();
