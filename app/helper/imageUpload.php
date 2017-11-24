<?php

$target_dir = VIEW_PATH."/uploads/";
$file = $target_dir . basename($_FILES["imagemUpdate"]["name"]);
$uploadOk = 1;
$errorMsg = '';
$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
$hashedFilename = substr(md5(time()),0,9);
$target_file = $target_dir . $hashedFilename . "." . $imageFileType;

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["imagemUpdate"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
    $errorMsg = "Precisa ser uma imagem.<br>";
}

//Check extension path of image
if (($check[2] !== IMAGETYPE_GIF) && ($check[2] !== IMAGETYPE_JPEG) && ($check[2] !== IMAGETYPE_PNG)) {
  $uploadOk = 0;
  $errorMsg = "Tipo de imagem nao aceito.<br>";
}

// Check if file already exists
if (file_exists($target_file)) {
  $uploadOk = 0;
  $errorMsg .= "Ja existe esta imagem.<br>";
}

if ($uploadOk == 1) {

  if (move_uploaded_file($_FILES["imagemUpdate"]["tmp_name"], $target_file)) {
      $imagemProduto = $target_file;
  }

}
