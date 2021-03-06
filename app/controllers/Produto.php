<?php

    class Produto extends Controller
    {

      public function index()
      {
        if( isset($_SESSION['logado']) ){
    	     $this->renderizar('/home/dashboard/index',ProdutoModel::getProdutos(true));
    	  }else{
    			 $this->renderizar('/home/login/index');
    		}
      }

      public function detalhes($produto_cod='')
      {
        $produtos = ProdutoModel::getProdutoById(PseudoCrypt::unhash($produto_cod));
        if($produtos){
          $this->renderizar("/home/produto/detalhes", $produtos);
        } else {
          header('Location: /estoque-de-moveis/home/');
        }

      }

      public function adicionar()
      {
        $this->renderizar('/home/produto/adicionar');
      }

      public function editar($produto_cod='')
      {
        $produtos = ProdutoModel::getProdutoById(PseudoCrypt::unhash($produto_cod));
        if($produtos){
          $this->renderizar("/home/produto/editar", $produtos);
        } else {
          header('Location: /estoque-de-moveis/home/');
        }

      }

      public function remover($produto_cod='')
      {
        if ( ProdutoModel::deletarProdutoById($produto_cod) ) {
          header('Location: /estoque-de-moveis/home/');
        }

      }

      public function registro($urlInfo='')
      {
        $registro = explode('-',$urlInfo);

        if( $registro[2] == "entrada" || $registro[2] == "saida" ){
          $this->renderizar('/home/produto/registro',$registro);
        }
        else {
          header('Location: /estoque-de-moveis/home/');
        }
      }

      public function pesquisa()
      {
        $busca = isset($_GET["produtoNome"]) ? $_GET["produtoNome"]:null;

        if($busca){

              $codigo = null;

              if ( ctype_digit($busca) ) {
                  $codigo = $busca;
              }

              if($codigo){
                  header('Location: /estoque-de-moveis/produto/detalhes/' . PseudoCrypt::hash($codigo));
              }
              else{
                  $this->renderizar('/home/dashboard/index', ProdutoModel::getProdutosLike($busca), $pagBusca = true);
              }

        }

      }

      public function insert()
      {
        $nomeProduto              = isset($_POST["nome"]) ? $_POST["nome"] : null;
        $descricaoProduto         = $_POST["descricao"];
        $precoProduto             = isset($_POST["preco"]) ? floatval($_POST["preco"]) : null;
        $quantidadeProduto        = isset($_POST["quantidade"]) ? intval($_POST["quantidade"]) : null;
        $imagemProduto            = 'http://via.placeholder.com/250x250';


        if ( $nomeProduto && $precoProduto ){
            if($_FILES['imagemUpdate']['name'] != "" || $_FILES['imagemUpdate']['size'] != 0){
              include 'app/helper/imageUpload.php';
            }

        $produto = new ProdutoModel();
        $produto->setNome($nomeProduto);
        $produto->setDescricao($descricaoProduto);
        $produto->setImg($imagemProduto);
        $produto->setPreco($precoProduto);
        $produto->setQuantidade($quantidadeProduto);

        if ( ProdutoModel::insertProduto($produto) ) {
          header('Location: /estoque-de-moveis/home/');
        }

        }
      }

      public function update()
      {
        $codigoProduto              = isset($_POST["codigoProduto"]) ? intval($_POST["codigoProduto"]) : null;
        $nomeProduto                = isset($_POST["nomeUpdate"]) ? $_POST["nomeUpdate"] : null;
        $descricaoProduto           = $_POST["descricaoUpdate"];
        $precoProduto               = isset($_POST["precoUpdate"]) ? $_POST["precoUpdate"] : null;
        $quantidadeProduto          = isset($_POST["quantidadeUpdate"]) ? $_POST["quantidadeUpdate"] : null;
        $imagemProduto              = $_POST["imgProduto"];

        if ( $codigoProduto && $nomeProduto && $precoProduto && $quantidadeProduto ) {
          if($_FILES['imagemUpdate']['name'] != "" || $_FILES['imagemUpdate']['size'] != 0){
              include 'app/helper/imageUpload.php';
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

        public function registrar()
        {
          $tipo       = isset($_POST["tipoRegistro"]) ? $_POST["tipoRegistro"] : null;
          $codigo     = isset($_POST["codigoRegistro"]) ? intval($_POST["codigoRegistro"]) : null;
          $qtdAtual   = isset($_POST["qtdAtual"]) ? intval($_POST["qtdAtual"]) : null;

          # se nenhuma Data for setada, ele pega a data e hora atual #
          $data = '';
          if (!empty($_POST["dataRegistro"])) {
            $data = $_POST["dataRegistro"];
          } else {
            $data = date('Y-m-d H:i:s');
          }

          # verificação de quantidade. Tem que ser maior que 0 em ambos os casos (entrada e saida)
          # E na saida nao pode sair mais do que tem atualmente no estoque #

          $qtdRegistro = null;
          if (isset($_POST["quantidadeRegistro"]) && $_POST["quantidadeRegistro"] > 0 ) {


            if ( $tipo == "entrada" ) {
                $qtdRegistro = $_POST["quantidadeRegistro"];
            }

            if ( $tipo == "saida" ) {
                if ( $_POST["quantidadeRegistro"] <= $qtdAtual ) {
                    $qtdRegistro = $_POST["quantidadeRegistro"];
                }
            }


          }

          # se todas as variaveis tiverem OK ele registra #
          if ( $tipo && $codigo && $qtdRegistro ) {

                if ( ProdutoModel::registraEntradaSaida( $codigo, $tipo, $data, $qtdRegistro ) ) {
                    header('Location: /estoque-de-moveis/home/');
                }

          } else {
            echo "ocorreu um erro. <a href='/estoque-de-moveis/home/'> Voltar </a>";
          }

        }

        #### PAGINACAO ####
        public function page($num='')
        {
          $_GET["num"] = $num;
          $this->renderizar('/home/dashboard/index',ProdutoModel::getProdutos(true, ($num - 1) * 10 ));
        }

        public function getEstoqueCount()
        {
          return count(ProdutoModel::getProdutos());
        }

        public function gerarInserts($value='')
        {
          $qtd = $value != '' ? $value : 100;
          include 'app/helper/factory.php';
        }

}
