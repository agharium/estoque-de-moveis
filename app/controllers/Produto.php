<?php
    require_once 'Controller.php';
    require_once 'app/models/ProdutoModel.php';

    class Produto extends Controller
    {

      public function index()
      {
        if( isset($_SESSION['logado']) ){
    	     $this->renderizar('/home/dashboard/index',ProdutoModel::getProdutos());
    	  }else{
    			 $this->renderizar('/home/login/index');
    		}
      }

      public function detalhes($produto_cod='')
      {
        $this->renderizar("/home/produto/detalhes",ProdutoModel::getProdutoById($produto_cod));
        //echo "Detalhes Produto " . $produto_cod;
      }

      public function adicionar()
      {
        echo "Adicionar Produto.";
      }

      public function editar($produto_cod='')
      {
        $this->renderizar("/home/produto/editar",ProdutoModel::getProdutoById($produto_cod));
        //echo "Editar Produto " . $produto_cod;
      }

      public function remover($produto_cod='')
      {
        
      }

    }
