<?php
	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require_once("../head.php");
?>
	<h1 class="logo text-center fadein" id="logo"> Controle de Estoque de Móveis </h1>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
		<div class="padding">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>Produto 1</td>
						<td>R$ 100</td>
						<td>10</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Produto 2</td>
						<td>R$ 200</td>
						<td>20</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<script type="text/javascript">
		window.onload = function() {
    		document.getElementById("logo").className += " loaded";
		}
	</script>

<?php	
	require_once("../footer.php");
?>