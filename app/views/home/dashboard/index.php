<?php
	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(HOME_PATH . "head.php");
	echo $_COOKIE["produto"];
?>
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
	
	<script>
		/*function tabelaHandler() {
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
                            document.cookie = "produto=" + id;
                     	};
		            };
		        currentRow.onclick = createClickHandler(currentRow);
		    }
		}
		window.onload = tabelaHandler();*/

		$(document).ready(function(){
		    $("table tr").hover(function() {
		    	console.log($(this).closest('tr').find('td:first-child').html());
		        $(this).toggleClass("tr-hover");
		    });
		});
	</script>

	<style type="text/css">
		tbody tr {
			cursor: pointer;
		}


		/*tbody tr:hover*/
		.tr-hover {
			background: #2ecc71;
			font-weight: 500;
		}

		th, td {
			text-align: center;
		}
	</style>

<?php	
	require(HOME_PATH . "footer.php");
?>