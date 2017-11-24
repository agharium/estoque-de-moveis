<?php
	require_once("app/models/Produto.php");

	$produtosPorPagina = 10;
	$estoqueCount = Produto::getEstoqueCount();

	if ($estoqueCount >= 0){
		$qtdPaginas = intval(ceil($estoqueCount / $produtosPorPagina));

		for ($i=1; $i<=$qtdPaginas; $i+1) { 
			echo "<a href=''>" . $i . "</a>";
		}
	}

?>