<?php
	$server = $_SERVER['SERVER_NAME'];
	$cssFolder = "\"";
	if ($server == "localhost"){
		$cssFolder .= "/estoque-de-moveis";
	}
	$cssFolder .= "/css/custom-css.css\""; 

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	<link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	<link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
	<link rel="stylesheet" href=<?php echo $cssFolder ?>>
	<title> <?php echo $title ?> </title>
</head>
<body>