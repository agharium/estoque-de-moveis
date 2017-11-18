<?php

$target_dir = VIEW_PATH."/uploads/";
$file = $target_dir . basename($_FILES["imagemUpdate"]["name"]);
$uploadOk = 1;
$errorMsg = '';
$imageFileType = pathinfo($file,PATHINFO_EXTENSION);
$hashedFilename = md5($nomeProduto . time());
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

// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 1) {
//
//   if (move_uploaded_file($_FILES["imagemUpdate"]["tmp_name"], $target_file)) {
//       echo "<b>The file ". basename( $_FILES["imagemUpdate"]["name"]). " has been uploaded.</b>";
//   } else {
//       echo "<b>Sorry, there was an error uploading your file.</b><br>";
//       echo $errorMsg;
//   }
//
// }
