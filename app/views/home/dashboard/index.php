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
	</div>

	<div class="slideout-sidebar">
		<ul>
			<li><i class="fa fa-eye"></i> Detalhes </li>
			<li><i class="fa fa-pencil"></i> Editar </li>
			<li><i class="fa fa-trash-o"></i> Remover </li>
		</ul>
	</div>

	<script src="https://use.fontawesome.com/62b09b342d.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		var selectedRadio = null;
		var lastSelectedRow = null;

		$("tbody tr").hover(function() {
			var rowRadio = $(":first-child > :first-child", this);

			if (!rowRadio.is(':checked')){
				$(this).toggleClass("tr-hover");
			}
	    });

		$("tbody tr").click(function() {
			var rowRadio = $(":first-child > :first-child", this);

			if(!rowRadio.is(':checked')){
				document.cookie = "produto=" + $(this).find('td:nth-child(2)').html();
				console.log("Cookie adicionado: " + document.cookie);
		        
		        rowRadio.prop("checked", true);
		        $("#menu-toggle").prop("checked", true);
		        selectedRadio = rowRadio;
		        
		        if (lastSelectedRow){
		        	lastSelectedRow.toggleClass("tr-hover");
		        }
		        lastSelectedRow = $(this);

			} else if (rowRadio.is(':checked')) {
				document.cookie = "produto=" + 0;
				console.log("Cookie removido: " + document.cookie);

		        rowRadio.prop("checked", false);
		        $("#menu-toggle").prop("checked", false);
		        selectedRadio = null;
		        lastSelectedRow = null;
			}
	    });
	</script>

<?php	
	require(HOME_PATH . "footer.php");
?>