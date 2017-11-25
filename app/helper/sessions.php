<?php
  if(!isset($_SESSION['logado'])){
     header('Location: /estoque-de-moveis/');
  }
  if(isset($_SESSION['user'])){
    $user     = $_SESSION['user'];
  }
  if(isset($_SESSION['permission'])){
    $pm       = $_SESSION['permission'];
  }
