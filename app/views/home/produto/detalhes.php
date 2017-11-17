<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
<div class="container">
	<h2 class="text-center"> NOME OU ID DO PRODUTO AQUI </h2>
	<div style="display: flex; width: 75%; margin: 0 auto; padding: 25px;">
		<div style="justify-content: left; align-self: center;">
			<img src="http://via.placeholder.com/250x250">
		</div>
		<div style="justify-content: left; align-self: center; margin-left: 50px; width: 100%">
			<table>
				<tr>
					<td><b> ID </b></td>
					<td> yay </td>
				</tr>
				<tr>
					<td><b> Nome </b></td>
					<td> yay </td>
				</tr>
				<tr>
					<td><b> Preço </b></td>
					<td> yay </td>
				</tr>
				<tr>
					<td><b> Quantidade </b></td>
					<td> yay </td>
				</tr>
			</table>
		</div>
	</div>
	
</div>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
