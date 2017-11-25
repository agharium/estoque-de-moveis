<?php
    require_once "app/models/ProdutoModel.php";
    error_reporting(0);

    for ($i=1; $i <= $qtd; $i++) {

      $produto = new ProdutoModel();

      $produto->setNome("Produto " . $i);
      $produto->setDescricao("Descricao " .$i);
      $produto->setImg("");
      $produto->setPreco(rand(1,20));
      $produto->setQuantidade(rand(1,10));

      ProdutoModel::insertProduto($produto);

    }

    echo "Dados inseridos...";
