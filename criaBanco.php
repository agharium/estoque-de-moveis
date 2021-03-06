<?php
  // Name of the file
  $filename             = 'estoque_empresa.sql';
  // MySQL host
  $mysql_host           = 'localhost';
  // MySQL username
  $mysql_username       = 'root';
  // MySQL password
  $mysql_password       = '';
  // Database name
  $mysql_database       = 'estoque_empresa';

  // Connect to MySQL server
  $conn                 = mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysqli_error($conn));

  mysqli_query($conn, "DROP DATABASE IF EXISTS `estoque_empresa`;");
  mysqli_query($conn, "CREATE DATABASE `estoque_empresa`;");

  $conn                 = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database) or die('Error connecting to MySQL server: ' . mysqli_error($conn));

  // Temporary variable, used to store current query
  $templine             = '';
  // Read in entire file
  $lines                = file($filename);
  // Loop through each line
  foreach ($lines as $line){
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
      continue;

    // Add this line to the current segment
    $templine           .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';'){
        // Perform the query
        mysqli_query($conn, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($conn) . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
  }
  echo "Banco Criado. <a href='/estoque-de-moveis/home/'> Ir para home </a>";
  ?>
