<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
	<i id="hamburguer" class="fa fa-bars fa-2x" aria-hidden="true"></i>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
		<a href="#"><i id="adicionar" class='fa fa-plus'></i></a>
		<div class="padding">
			<table id="table">
				<thead>
					<tr>
						<th></th>
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
						  <td><input type="radio" name="select"></td>
						  <td><?php echo $produto->getCodigo(); ?></td>
						  <td><?php echo $produto->getNome(); ?></td>
						  <td><?php echo "R$ ".$produto->getPreco(); ?></td>
						  <td><?php echo $produto->getQuantidade(); ?></td>
							<td>
								<a href="/estoque-de-moveis/produto/detalhes/<?php echo $produto->getCodigo(); ?>" class="icone-visualizar"><i class='fa fa-eye'></i></a>
								&nbsp;
								<a href="/estoque-de-moveis/produto/editar/<?php echo $produto->getCodigo(); ?>" class="icone-editar"><i class='fa fa-pencil'></i></a>
								&nbsp;
								<a href="/estoque-de-moveis/produto/remover/<?php echo $produto->getCodigo(); ?>" class="icone-remover"><i class='fa fa-trash-o'></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>

	<div class="slideout-sidebar">
		<ul>
			<li><i class="fa fa-user"></i> <?php echo $user; ?></li>
			<a href="/estoque-de-moveis/home/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
		</ul>
	</div>
	<script src="https://use.fontawesome.com/62b09b342d.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$("#hamburguer").click(function() {
				$("#menu-toggle").prop("checked", !($("#menu-toggle").prop("checked")));
		});
	</script>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
