<?php
	require_once 'app/helper/PseudoCrypt.php';
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
	<div class="container">
		<h2 class="text-center"> ESTOQUE </h2>
		<a href="#"><i class="add" class='fa fa-plus'></i></a>
		<div class="padding">
			<table class="produtos-table">
				<thead>
					<tr>
						<th class="hidden-cell"></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
						<th>Quantidade</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dados as $produto): ?>
						<tr>
						  <td class="hidden-cell"><input type="radio" name="select"></td>
						  <td><?php echo $produto->getCodigo(); ?></td>
						  <td><?php echo $produto->getNome(); ?></td>
						  <td><?php echo "R$ ".$produto->getPreco(); ?></td>
						  <td><?php echo $produto->getQuantidade(); ?></td>
							<td>
								<a href="/estoque-de-moveis/produto/registro/<?php echo $produto->getCodigo().'-'.$produto->getQuantidade(); ?>-entrada" class="icone-entrada">
									<i style="cursor: pointer" title="Registrar entrada" class="fa fa-sign-in"></i>
								</a>
								&nbsp;
								<a href="/estoque-de-moveis/produto/registro/<?php echo $produto->getCodigo().'-'.$produto->getQuantidade(); ?>-saida" class="icone-saida">
									<i style="cursor: pointer" title="Registrar saída" class="fa fa-sign-out"></i>
								</a>
								&nbsp;
								<?php if ($pm==2): ?>
								<a href="/estoque-de-moveis/produto/detalhes/<?php echo PseudoCrypt::hash($produto->getCodigo()); ?>" class="icone-visualizar" title="Visualizar"><i class='fa fa-eye'></i></a>
								&nbsp;
								<a href="/estoque-de-moveis/produto/editar/<?php echo PseudoCrypt::hash($produto->getCodigo()); ?>" class="icone-editar" title="Editar"><i class='fa fa-pencil'></i></a>
								&nbsp;
								<a onclick="confirmDialog(<?php echo $produto->getCodigo(); ?>)" style="cursor:pointer" class="icone-remover" title="Remover"><i class='fa fa-trash-o'></i></a>
							<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<?php require_once("app/helper/pagination.php"); ?>
	</div>
	</div>

	<!-- Menu Drawer -->
	<div class="slideout-sidebar">
		<ul>
			<li class="menu-link">
				<i class="fa fa-user"></i>
				<?php echo $pm==2?"Gerente:" : "Vendedor:"; ?>
				<br>
				<?php echo $user; ?>
			</li>
			<?php if ($pm==2): ?>
				<li class="menu-link">
					<span class="accordion">
						<i class="fa fa-plus"></i>
						Cadastrar
					</span>
					<div class="panel" style="display: none;padding-left: 10px;padding-top: 10px;">
						<a href="/estoque-de-moveis/produto/adicionar">Produtos</a><br>
						<a href="/estoque-de-moveis/home/cadastro">Contas</a>
					</div>
				<?php endif; ?>
			<li class="menu-link"><a href="/estoque-de-moveis/home/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
		</ul>
	</div>

	<!-- accordion simples -->
	<script>
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		    acc[i].onclick = function(){
		        this.classList.toggle("active");
		        var panel = this.nextElementSibling;
		        if (panel.style.display === "block") {
		            panel.style.display = "none";
		        } else {
		            panel.style.display = "block";
		        }
		    }
		}
	</script>

	<!-- fim do accordion -->


	<!-- dialog pra excluir produto -->
	<script type="text/javascript">
		function confirmDialog(codigo) {
			if ( confirm("Voce deseja realmente apagar?") ) {
				location.href = "/estoque-de-moveis/produto/remover/" + codigo;
			}
		}
	</script>
	<!-- fim do dialog -->

	<!-- font awesome -->
	<script src="https://use.fontawesome.com/62b09b342d.js"></script>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
