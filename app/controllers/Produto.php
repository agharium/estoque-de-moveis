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

      public function update()
      {
        $codigoProduto = isset($_POST["codigoProduto"]) ? intval($_POST["codigoProduto"]) : null;
        $nomeProduto = isset($_POST["nomeUpdate"]) ? $_POST["nomeUpdate"] : null;
        $descricaoProduto = $_POST["descricaoUpdate"];
        $precoProduto = isset($_POST["precoUpdate"]) ? $_POST["precoUpdate"] : null;
        $quantidadeProduto = isset($_POST["quantidadeUpdate"]) ? $_POST["quantidadeUpdate"] : null;
        $imagemProduto = $_POST["imgProduto"];

        if ( $codigoProduto && $nomeProduto && $precoProduto && $quantidadeProduto ) {
          if($_FILES['imagemUpdate']['name'] != "" || $_FILES['imagemUpdate']['size'] != 0){
              include 'app/helper/imageUpload.php';

              if ($uploadOk == 1) { //$uploadok vem do include acima

                if (move_uploaded_file($_FILES["imagemUpdate"]["tmp_name"], $target_file)) {
                    $imagemProduto = $target_file;
                }

              }
          }

          $produto = new ProdutoModel();
          $produto->setCodigo($codigoProduto);
          $produto->setNome($nomeProduto);
          $produto->setDescricao($descricaoProduto);
          $produto->setImg($imagemProduto);
          $produto->setPreco($precoProduto);
          $produto->setQuantidade($quantidadeProduto);

          if ( ProdutoModel::updateProduto($produto) )
            header('Location: /estoque-de-moveis/home/');

        }

      }

      public function remover($produto_cod='')
      {
        if ( ProdutoModel::deletarProdutoById($produto_cod) ) {
          header('Location: /estoque-de-moveis/home/');
        }
      }

    }
