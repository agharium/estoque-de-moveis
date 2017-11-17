<?php
    /**
     *
     */
    class Produto
    {

      public function detalhes($produto_cod='')
      {
        echo "Detalhes do Produto " . $produto_cod;
      }

      public function adicionar()
      {
        echo "Adicionar Produto.";
      }

      public function editar($produto_cod='')
      {
        echo "Editar Produto " . $produto_cod;
      }

      public function remover($produto_cod='')
      {
        echo "Remover Produto " . $produto_cod;
      }
    }
