<?php
    require_once("Database.php");
    require_once("Usuario.php");

    class Produto{
        private $codigo;
        private $nome;
        private $descricao;
        private $img;
        private $preco;
        private $quantidade;

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

        public function getProdutos() {
          $conn = Database::getConnection();

          $sql = "SELECT * FROM produto";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              $produtos = array();
              // output data of each row
              while($row = $result->fetch_assoc()) {

                  $produto = new Produto();
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
    }
?>
