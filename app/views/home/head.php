<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:200,300,400,500|Montserrat">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<link rel="stylesheet" href="//rawgit.com/agharium/estoque-de-moveis/master/css/custom-css.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<?php if ($title == "Estoque de Móveis - Painel de Controle"){
		echo
	"<link rel='stylesheet' href='https://rawgit.com/agharium/estoque-de-moveis/master/css/offscreen-menu.css'>";
	} ?>

	<title> <?php echo $title ?> </title>
</head>
<body>
	<?php if ($title == "Estoque de Móveis - Painel de Controle"){
		echo
	"<input type='checkbox' id='menu-toggle' />
	<div class='content-container'>";
	} ?>
	<div class="logo-container">
		<h1 class="logo-initials text-center animated fadeInDown" > C. E. M. </h1>
		<h3 class="text-center animated fadeInDown"> Controle de Estoque de Móveis </h3>
	</div>
