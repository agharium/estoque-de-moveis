<?php
	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(HOME_PATH . "head.php");
?>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
		<div class="padding">
			<table id="table">
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>1</td>
						<td>Produto 1</td>
						<td>R$ 100</td>
						<td>10</td>
					</tr>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>2</td>
						<td>Produto 2</td>
						<td>R$ 200</td>
						<td>20</td>
					</tr>
					<tr>
						<td><input type="radio" name="select"></td>
						<td>3</td>
						<td>Produto 3</td>
						<td>R$ 300</td>
						<td>30</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	<script>
		var hover = true;

		$(document).ready(function(){
			$("tbody tr").hover(function() {
				if (hover){
					$(this).toggleClass("tr-hover");
				}
		    });

			$("tbody tr").click(function() {
				var selectedRadio = $("table").find('input:radio:checked');
				var radio = $(":first-child > :first-child", this);

				if(!radio.is(':checked') && selectedRadio.length == 0){
					document.cookie = "produto=" + $(this).find('td:nth-child(2)').html();
					console.log("Cookie adicionado: " + document.cookie);
			    	
			    	hover = false;
			        
			        radio.prop("checked", true);
				} else if (radio.is(':checked')) {
					document.cookie = "produto=" + 0;
					console.log("Cookie removido: " + document.cookie);

					hover = true;

			        radio.prop("checked", false);
				}
		    });
		});
	</script>

	<style type="text/css">
		.tr-hover {
			background: #2ecc71;
			font-weight: 500;
			cursor: pointer;
		}

		th, td {
			text-align: center;
		}

		td:first-child, th:first-child {
			display: none;
		}

		input[name="selected"] {
		  	pointer-events: none;
		}
	</style>

<?php	
	require(HOME_PATH . "footer.php");
?>