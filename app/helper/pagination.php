<?php
	require_once("app/controllers/Produto.php");

	$produtosPorPagina = 10;
	$estoqueCount = Produto::getEstoqueCount();

	if ($estoqueCount >= 0){
		$qtdPaginas = intval(ceil($estoqueCount / $produtosPorPagina));

		for ($i=1; $i<=$qtdPaginas; $i++) { 
			echo "<a href=''>" . $i . "</a>";
		}
	}

?>