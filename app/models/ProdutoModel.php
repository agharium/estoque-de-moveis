<?php
    require_once("Database.php");

    class ProdutoModel {
        private $codigo;
        private $nome;
        private $descricao;
        private $img;
        private $preco;
        private $quantidade;

        //Relatórios
        public $entrada_data;
        public $entrada_quantidade;
        public $saida_data;
        public $saida_quantidade;

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getNome(){
            return $this->nome;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function setImg($img){
            $this->img = $img;
        }

        public function getImg(){
            return $this->img;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        public function getQuantidade(){
            return $this->quantidade;
        }

        ################## CRUD ##################
        public function insertProduto($produto)
        {
          $ok         = false;
          $conn       = Database::getConnection();

          if($produto->getImg() == "") $produto->setImg("http://via.placeholder.com/250x250");

          $stmt       = $conn->prepare(
                                "INSERT INTO
                                      produto
                                   (produto_nome,
                                   produto_descricao,
                                   produto_img,
                                   produto_preco,
                                   produto_quantidade)
                                VALUES
                                   (?,?,?,?,?)"
                                 );

          $stmt->bind_param(
                            'sssdi',
                            $produto->getNome(),
                            $produto->getDescricao(),
                            $produto->getImg(),
                            $produto->getPreco(),
                            $produto->getQuantidade()
                            );
          if($stmt->execute()){
            $ok = true;
          }

          $stmt->close();
          $conn->close();
          return $ok;
        }

        public function getProdutoById($id)
        {
          $conn     = Database::getConnection();

          $stmt     = $conn->prepare("SELECT * FROM produto WHERE produto_codigo = ? LIMIT 1");
          $stmt->bind_param("i",intval($id));
          $stmt->execute();
    			$stmt->bind_result($codigo,$nome,$descricao,$img,$preco,$quantidade);
        	$stmt->store_result();

          $produto  = null;

          if ( $stmt->num_rows == 1 ){

            while ($result = $stmt->fetch() ) {
              $produto = new ProdutoModel();
              $produto->setCodigo($codigo);
              $produto->setNome($nome);
              $produto->setDescricao($descricao);
              $produto->setImg($img);
              $produto->setPreco($preco);
              $produto->setQuantidade($quantidade);
            }

          }
          $stmt->close();
          $conn->close();

          return $produto;

        }

        public function getProdutosLike($nomeProd)
        {
          $conn       = Database::getConnection();

          $stmt     = $conn->prepare("SELECT * FROM produto WHERE produto_nome LIKE CONCAT('%',?,'%') ");
          $stmt->bind_param("s",$nomeProd);
          $stmt->execute();
    			$stmt->bind_result($codigo,$nome,$descricao,$img,$preco,$quantidade);
        	$stmt->store_result();

          $produtos = null;

          if ( $stmt->num_rows > 0 ) {
              $produtos = array();
              // output data of each row
              while( $result = $stmt->fetch() ) {

                  $produto = new ProdutoModel();
                  $produto->setCodigo($codigo);
                  $produto->setNome($nome);
                  $produto->setDescricao($descricao);
                  $produto->setImg($img);
                  $produto->setPreco($preco);
                  $produto->setQuantidade($quantidade);

                  array_push($produtos,$produto);
              }
          }

          $conn->close();
          return $produtos;
        }

        public function getProdutos($pagination=false, $num=0) {
          $conn       = Database::getConnection();

          $sql        = "SELECT * FROM produto ";
          if($pagination) $sql.= "LIMIT $num, 10";

          $result     = $conn->query($sql);

          if ($result->num_rows > 0) {
              $produtos = array();
              // output data of each row
              while($row = $result->fetch_assoc()) {

                  $produto = new ProdutoModel();
                  $produto->setCodigo($row["produto_codigo"]);
                  $produto->setNome($row["produto_nome"]);
                  $produto->setDescricao($row["produto_descricao"]);
                  $produto->setImg($row["produto_img"]);
                  $produto->setPreco($row["produto_preco"]);
                  $produto->setQuantidade($row["produto_quantidade"]);

                  array_push($produtos,$produto);
              }

              return $produtos;
          } else {
              echo "0 results";
          }
          $conn->close();
          return null;
        }


        public function updateProduto($produto)
        {
          $ok         = false;
          $conn       = Database::getConnection();

          $stmt       = $conn->prepare(
                                "UPDATE
                                        produto
                                 SET
                                        produto_nome = ?,
                                        produto_descricao = ?,
                                        produto_img = ?,
                                        produto_preco = ?,
                                        produto_quantidade = ?
                                 WHERE
                                        produto_codigo = ?"
                                );
          $stmt->bind_param(
                            'sssdii',
                            $produto->getNome(),
                            $produto->getDescricao(),
                            $produto->getImg(),
                            $produto->getPreco(),
                            $produto->getQuantidade(),
                            $produto->getCodigo()
                            );

          if($stmt->execute()){
            $ok       = true;
          }

          $stmt->close();
          $conn->close();
          return $ok;
        }

        public function deletarProdutoById($id)
        {
          $ok         = false;
          $conn       = Database::getConnection();

          $stmt       = $conn->prepare("DELETE FROM produto WHERE produto_codigo = ?");
          $stmt->bind_param('i',intval($id));
          if($stmt->execute()){
            $ok       = true;
          }

          $stmt->close();
          $conn->close();
          return $ok;
        }
        # FIM CRUD #

        ##################### ENTRADAS E SAIDAS DE PRODUTOS #####################

        public function registraEntradaSaida( $codigo, $tipo, $data, $qtd )
        {
          $ok         = false;
          $conn       = Database::getConnection();

          $conn->autocommit(FALSE);

          try {
            $stmt     = $conn->prepare("INSERT INTO produto_". $tipo ."
                                  (produto_codigo, produto_" .$tipo. "_data,produto_" .$tipo. "_quantidade)
                                  VALUES (?,?,?) ");

            $stmt->bind_param( "isi", $codigo,$data,$qtd );

            if ( $stmt->execute() ) {

                  $operacao = $tipo == "entrada" ? "+" : "-";

                  $stmt = $conn->prepare("UPDATE produto SET produto_quantidade = produto_quantidade ".$operacao." ? WHERE produto_codigo = ? ");

                  $stmt->bind_param( "ii", $qtd,$codigo );

                  if ( $stmt->execute() ) {
                    $ok = true;
                  }

            }
          } catch (Exception $e) {
            $conn->rollback();
            echo mysqli_error($conn);
            $ok = false;
          }
          $conn->commit();

          $stmt->close();
          $conn->close();

          return $ok;

        }


        ##################### RELATÓRIOS #####################
        public function relatorioProdutoEntrada($data_inicial, $data_final){
          $conn       = Database::getConnection();
          $stmt       = $conn->prepare("
                                        SELECT
                                          produto_entrada.*, produto.*
                                        FROM
                                          produto_entrada, produto
                                        WHERE
                                          produto_entrada.produto_entrada_data BETWEEN ? AND ?
                                        AND produto_entrada.produto_codigo = produto.produto_codigo
                                        ");
          $stmt->bind_param("ss", $data_inicial, $data_final);
          if($stmt->execute()){
            if ($result->num_rows > 0) {
              $produtos = array();
              while($row = $result->fetch_assoc()) {
                $produto = new Produto();
                //Não sei se vocês querem que eu retorne mais algo aqui além disso
                $produto->codigo              = $row["produto_codigo"];
                $produto->nome                = $row["produto_nome"];
                $produto->descricao           = $row["produto_descricao"];
                $produto->img                 = $row["produto_img"];
                $produto->preco               = $row["produto_preco"];
                $produto->quantidade          = $row["produto_quantidade"];
                $produto->entrada_data        = $row["produto_entrada_data"];
                $produto->entrada_quantidade  = $row["produto_entrada_quantidade"];
                array_push($produtos, $produto);
              }
              return $produtos;
            }
          }
          $stmt->close();
          $conn->close();
          return NULL;
        }

        public function relatorioProdutoSaida($data_inicial, $data_final){
          $conn       = Database::getConnection();
          $stmt       = $conn->prepare("
                                        SELECT
                                          produto_saida.*, produto.*
                                        FROM
                                          produto_saida, produto
                                        WHERE
                                          produto_saida.produto_saida_data BETWEEN ? AND ?
                                        AND produto_saida.produto_codigo = produto.produto.codigo
                                        ");
          $stmt->bind_param("ss", $data_inicial, $data_final);
          if($stmt->execute()){
            if ($result->num_rows > 0) {
              $produtos = array();
              while($row = $result->fetch_assoc()) {
                $produto = new Produto();
                //Não sei se vocês querem que eu retorne mais algo aqui além disso
                $produto->codigo              = $row["produto_codigo"];
                $produto->nome                = $row["produto_nome"];
                $produto->descricao           = $row["produto_descricao"];
                $produto->img                 = $row["produto_img"];
                $produto->preco               = $row["produto_preco"];
                $produto->quantidade          = $row["produto_quantidade"];
                $produto->saida_data          = $row["produto_saida_data"];
                $produto->saida_quantidade    = $row["produto_saida_quantidade"];
                array_push($produtos, $produto);
              }
              return $produtos;
            }
          }
          $stmt->close();
          $conn->close();
          return NULL;
        }
    }

    class ProdutoRelatorio extends ProdutoModel {
      private $produto;
      private $produto_data;
      private $produto_quantidade;
    }
?>
