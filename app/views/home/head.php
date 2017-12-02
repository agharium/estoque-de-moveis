<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:200,300,400,500|Montserrat">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<link rel="stylesheet" href="//rawgit.com/agharium/estoque-de-moveis/master/css/custom-css.css">
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
	<link rel="stylesheet" href="//rawgit.com/agharium/estoque-de-moveis/master/css/hint.min.css">

	<?php if ($title == "Estoque de Móveis - Painel de Controle"){
		echo
	"<link rel='stylesheet' href='https://rawgit.com/agharium/estoque-de-moveis/master/css/offscreen-menu.css'>";
	} ?>

	<title> <?php echo $title ?> </title>

	<style>
		.active{
			background-color: #9b4dca !important;
			color: white !important;
		}
	</style>
</head>
<body>
	<?php if ($title == "Estoque de Móveis - Painel de Controle"){
		echo
	"<input type='checkbox' id='menu-toggle' />
	<label for='menu-toggle' class='menu-icon' style='position: fixed;'><i class='fa fa-bars'></i></label>
	<div class='content-container'>";
	} ?>
	<div class="logo-container">
		<h1 class="logo-initials text-center animated fadeInDown" > C. E. M. </h1>
		<h3 class="text-center animated fadeInDown"> Controle de Estoque de Móveis </h3>
		<a href="/estoque-de-moveis/home" title="Inicio"><img src="https://i.imgur.com/pAolggd.png" alt="logo" style="width: 150px;"></a>
	</div>
