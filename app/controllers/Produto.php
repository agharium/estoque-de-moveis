<?php
    require_once 'Controller.php';
    /**
     *
     */
    class Produto extends Controller
    {

      public function detalhes($produto_cod='')
      {
        $this->renderizar("/home/produto/detalhes");
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
