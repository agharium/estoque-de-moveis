<?php
	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(HOME_PATH . "head.php");
?>

	<h1 class="logo text-center animated fadeInDown" > Controle de Estoque de Móveis </h1>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
		<div class="padding">
			<table id="table">
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
		function load(){
			tabelaHandler();
		}

		function tabelaHandler() {
		    var table = document.getElementById("table");
		    var rows = table.getElementsByTagName("tr");
		    for (i = 0; i < rows.length; i++) {
		        var currentRow = table.rows[i];
		        var createClickHandler = 
		            function(row) 
		            {
		                return function() { 
                            var cell = row.getElementsByTagName("td")[0];
                            var id = cell.innerHTML;
                            alert("id:" + id);
                     	};
		            };

		        currentRow.onclick = createClickHandler(currentRow);
		    }
		}

		window.onload = load();
	</script>

	<style type="text/css">
		tbody tr {
			cursor: pointer;
		}

		tbody tr:hover {
			background: red;
		}
	</style>
<?php	
	require(HOME_PATH . "footer.php");
?>