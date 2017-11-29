<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
<div class="container">
	<h2 class="text-center"> <?php echo $dados->getNome(); ?> </h2>
	<div style="display: flex; width: 75%; margin: 0 auto; padding: 25px;">
		<div style="justify-content: left; align-self: center;">
			<img src="
			<?php
				if (strpos($dados->getImg(), 'http') !== false){
					echo $dados->getImg();
				} else{
					echo "/estoque-de-moveis/" . $dados->getImg();
				}
			?>
			" style="width:250px;">
		</div>
		<div style="justify-content: right; align-self: center; margin-left: 50px; width: 100%">
			<table>
				<tr>
					<td><b> ID </b></td>
					<td> <?php echo $dados->getCodigo(); ?> </td>
				</tr>
				<tr>
					<td><b> Nome </b></td>
					<td> <?php echo $dados->getNome(); ?> </td>
				</tr>
				<tr>
					<td><b> Preço </b></td>
					<td> R$ <?php echo $dados->getPreco(); ?> </td>
				</tr>
				<tr>
					<td><b> Quantidade </b></td>
					<td> <?php echo $dados->getQuantidade(); ?> </td>
				</tr>
			</table>

			<div style="text-align: center">
				<!-- Ações de Produtos -->

				<a href="/estoque-de-moveis/produto/registro/<?php echo $dados->getCodigo().'-'.$dados->getQuantidade(); ?>-entrada" class="icone-entrada" title="Registrar entrada">
					<!-- <i class="fa fa-sign-in"></i> -->
					Registrar Entrada
				</a>
				&nbsp;|
				<a href="/estoque-de-moveis/produto/registro/<?php echo $dados->getCodigo().'-'.$dados->getQuantidade(); ?>-saida" class="icone-saida" title="Registrar saída">
					<!-- <i class="fa fa-sign-out"></i> -->
					Registrar Saída
				</a>
				<?php if ($pm==2): ?>
					&nbsp;|
					<a href="/estoque-de-moveis/produto/editar/<?php echo PseudoCrypt::hash($dados->getCodigo()); ?>" class="icone-editar" title="Editar">
						<!-- <i class='fa fa-pencil'></i> -->
						Editar
					</a>
					&nbsp;|
					<a onclick="confirmDialog(<?php echo $dados->getCodigo(); ?>)" style="cursor:pointer" class="icone-remover" title="Remover">
						<!-- <i class='fa fa-trash-o'></i> -->
						Remover
					</a>
				<?php endif; ?>

				<!-- Fim das Ações -->
			</div>

		</div>
	</div>
</div>

<!-- dialog pra excluir produto -->
<script type="text/javascript">
	function confirmDialog(codigo) {
		if ( confirm("Voce deseja realmente apagar?") ) {
			location.href = "/estoque-de-moveis/produto/remover/" + codigo;
		}
	}
</script>
<!-- fim do dialog -->

<?php
	require(VIEW_PATH . "/home/footer.php");
?>
