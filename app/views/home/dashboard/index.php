<?php
	require_once 'app/helper/sessions.php';

	$title = "Estoque de Móveis - Painel de Controle";
	$footer = false;
	require(VIEW_PATH . "/home/head.php");
?>
	<div class="container">
		<h2 class="text-center"> PRODUTOS </h2>
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
			<li class="menu-link"><i class="fa fa-user"></i> <?php echo $user; ?></li>
			<li class="menu-link"><a href="/estoque-de-moveis/home/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
		</ul>
	</div>
	<script src="https://use.fontawesome.com/62b09b342d.js"></script>
<?php
	require(VIEW_PATH . "/home/footer.php");
?>
