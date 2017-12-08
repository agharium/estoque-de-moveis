<?php

	if ( !$pagBusca ) {
		require_once("app/controllers/Produto.php");

		$produtosPorPagina 	= 10;
		$estoqueCount		= Produto::getEstoqueCount();
		$paginaAtual		= isset($_GET["num"]) ? $_GET["num"] : 1;

		if ($estoqueCount >= 0){
			$qtdPaginas 	= intval(ceil($estoqueCount / $produtosPorPagina));

			echo "<br><div style='text-align: center;'>";

			$paginas = geraArrayPaginas($paginaAtual, $qtdPaginas);
			foreach ($paginas as $valor) {
				if ($valor == "..."){
					imprimeBotao($paginaAtual, $valor);
				} else if ($valor == "<") {
					imprimeBotao($paginaAtual-1, $valor);
				} else if ($valor == ">") {
					imprimeBotao($paginaAtual+1, $valor);
				} else if ($valor == $paginaAtual) { 
					imprimeBotao($valor, $valor, "active");
				} else {
					imprimeBotao($valor, $valor);
				}
			}

			echo "</div>";
		}
	}

	function imprimeBotao($caminho, $caracter, $ativo = ''){
		echo " <a class='button button-outline " . $ativo . "' href='/estoque-de-moveis/produto/page/" . $caminho . "'> " . $caracter ." </a> ";
	}

	function geraArrayPaginas($paginaAtual, $qtdPaginas){
	    // INICIO DO ALGORITIMO
		$arrayPaginas = array();

		// seta pra esquerda
		if ($paginaAtual > 1){
			array_push($arrayPaginas, "<");
		}

		// se a quantidade de paginas for maior que 9
		if ($qtdPaginas > 9){
			// primeira pagina
			if ($paginaAtual > 1){
				array_push($arrayPaginas, 1);
			}
			
			// calculo de paginas atras e paginas na frente
			$paginasAtras = ($paginaAtual < $qtdPaginas) ? 3 : 4;
			$paginasFrente = ($paginaAtual > 1) ? 3 : 4;

			if ($paginaAtual < $qtdPaginas/2){
				for ($i = 3; $i > 0; $i--){
					if ($paginaAtual - $i <= 1){
						$paginasAtras--;
						$paginasFrente++;
					}
				}
			} else {
				for ($i = 3; $i > 0; $i--){
					if ($paginaAtual + $i >= $qtdPaginas){
						$paginasFrente--;
						$paginasAtras++;
					}
				}
			}

			// paginas de trás
			for ($paginasAtras; $paginasAtras > 0; $paginasAtras--){
				if ($paginaAtual - $paginasAtras > 1){
					array_push($arrayPaginas, $paginaAtual - $paginasAtras);
				}
			}

			// numero atual
			array_push($arrayPaginas, $paginaAtual);

		    // paginas da frente
			for ($i = 1; $i <= $paginasFrente; $i++){
				if ($paginaAtual + $i < $qtdPaginas){
					array_push($arrayPaginas, $paginaAtual + $i);
				}
			}

			// ultima pagina
			if ($paginaAtual < $qtdPaginas){
				array_push($arrayPaginas, $qtdPaginas);
			}

			// verificação pra impressão dos dots
			if ($arrayPaginas[1]+1 < $arrayPaginas[2]){
				array_splice($arrayPaginas, 2, 0, "...");
			}

			$tam = count($arrayPaginas)-1;
			if ($arrayPaginas[$tam]-1 > $arrayPaginas[$tam-1]){
				array_splice($arrayPaginas, $tam, 0, "...");
			}
		} /* se a quantidade de páginas for menor ou igual a 9 */ else {
			for ($i=1; $i <= $qtdPaginas; $i++){
				array_push($arrayPaginas, $i);
			}
		}

		// seta pra direita
		if ($paginaAtual < $qtdPaginas){
			array_push($arrayPaginas, ">");
		}

		return $arrayPaginas;
	}

?>
