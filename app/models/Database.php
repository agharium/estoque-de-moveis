<?php
  /**
   *
   */
  class Database
  {

    public function getConnection()
    {
      $servername = "localhost";
      $username = "root";
      $password = "";
      $db = "estoque_empresa";

      // Create connection
      $conn = new mysqli($servername, $username, $password,$db);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      return $conn;
    }

  }
