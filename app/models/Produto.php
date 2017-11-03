<?php
    require_once("Usuario.php");

    class Produto{
        private $codigo;
        private $nome;
        private $descricao;
        private $img;
        private $preco;
        private $Usuario;

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

        public function setUsuario($Usuario){
            $this->Usuario = $Usuario;
        }

        public function getUsuario(){
            return $this->Usuario;
        }
    }
?>
