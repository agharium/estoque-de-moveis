<?php
	require_once("app/controllers/Produto.php");

	$produtosPorPagina 			= 10;
	$estoqueCount						= Produto::getEstoqueCount();

	if ($estoqueCount >= 0){
		$qtdPaginas 					= intval(ceil($estoqueCount / $produtosPorPagina));

		echo "<div style='text-align: center;'>";
		for ($i=1; $i<=$qtdPaginas; $i++) {
			echo "<a href='/estoque-de-moveis/produto/page/$i'>" . $i . "</a> &nbsp;";
		}
		echo "</div>";
	}

?>
