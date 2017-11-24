<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
<div class="container">
	<div style="display: flex; width: 75%; margin: 0 auto; padding: 25px;">
		<div style="justify-content: right; align-self: center; margin-left: 50px; width: 100%">

			<!--
			dados[0] = Codigo produtos
			dados[1] = quantidade atual no estoque
			dados[2] = Tipo. Pode ser entrada ou saida
			-->

			<h4> Registrar <?php echo $dados[2]; ?> de produto no Estoque </h4>
			<form action="/estoque-de-moveis/produto/registrar" method="post">
				<table>
					<tbody>
						<input type="hidden" name="tipoRegistro" value="<?php echo $dados[2]; ?>">
						<input type="hidden" name="qtdAtual" value="<?php echo $dados[1]; ?>">
						<input type="hidden" name="codigoRegistro" value="<?php echo $dados[0]; ?>">
						<tr>
							<td><b> Código do Produto </b></td>
							<td> <?php echo $dados[0]; ?></td>
						</tr>
						<tr>
							<td><b> Quantidade Disponivel </b></td>
							<td> <?php echo $dados[1]; ?></td>
						</tr>
						<tr>
							<td><b> Data </b></td>
							<td> <input type="datetime-local" name="dataRegistro" style="width:100%" /></td>
						</tr>
						<tr>
							<td><b> Quantidade </b><span style="color:red">*</span></td>
							<td> <input type="number" min="0" name="quantidadeRegistro" required/></td>
						</tr>
					</tbody>
				</table>
				<input type="submit" value="Registrar" style="float:right" />
			</form>
		</div>
	</div>

</div>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
