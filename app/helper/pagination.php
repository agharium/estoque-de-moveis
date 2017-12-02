<?php

	if ( !$pagBusca ) {
		require_once("app/controllers/Produto.php");

		$produtosPorPagina 					= 10;
		$estoqueCount								= Produto::getEstoqueCount();
		$numeroAtual								= isset($_GET["num"]) ? $_GET["num"] : 1;

		if ($estoqueCount >= 0){
			$qtdPaginas 							= intval(ceil($estoqueCount / $produtosPorPagina));

			echo "<div style='text-align: center;'>";

			if( ($numeroAtual - 1) != 0 ) echo "<a class='button button-outline' href='/estoque-de-moveis/produto/page/" . ($numeroAtual - 1) . "'> < </a>";
			echo "&nbsp;";

			$classeAtiva = "";
			for ($i=1; $i<=$qtdPaginas && $i < 10; $i++) {
				if($i == $numeroAtual) $classeAtiva = "active";
				echo "<a class='button button-outline ".$classeAtiva."' href='/estoque-de-moveis/produto/page/$i'>" . $i . "</a> &nbsp;";
				$classeAtiva = "";
			}
			if ($qtdPaginas >= 10){
				echo "...";
				echo "&nbsp;";
				echo "<a class='button button-outline ".$classeAtiva."' href='/estoque-de-moveis/produto/page/$qtdPaginas'>" . $qtdPaginas . "</a> &nbsp";
			}

			if( $numeroAtual != $qtdPaginas ) echo "<a class='button button-outline' href='/estoque-de-moveis/produto/page/" . ($numeroAtual + 1) . "'> > </a>";

			echo "</div>";
		}
	}

?>
