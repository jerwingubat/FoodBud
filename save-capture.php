<?php
include_once ('config.php');

// Get the incoming image data
$image = $_POST["image"];

// Remove image/jpeg from left side of image data
// and get the remaining part
$image = explode(";", $image)[1];

// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];

// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);

// Convert back from base64
$image = base64_decode($image);

// Save the image as filename.jpeg
$code="uploads/filename" .  mt_rand() . ".jpeg";
$_SESSION['imgCode']=$code;

file_put_contents($code, $image);

// Sending response back to client
echo "Done";

?>