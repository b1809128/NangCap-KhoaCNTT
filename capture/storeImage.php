<?php

$img = $_POST['image'];
// $folderPath = `C:/xampp/htdocs/joomla/capture`;
$folderPath = `http://192.168.1.254/images/giang-vien/`;


$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);
$fileName = 'nhqhuy' . '.jpg';

$file = $folderPath . $fileName;
file_put_contents($file, $image_base64);

// print_r($fileName);
header("Refresh:0; url=http://localhost/joomla/capture");

// if (file_exists('/images/giang-vien/tmtan')) {
//     echo "/images/giang-vien/tmtan";
// } else {
//     echo "/images/capture";
// }
