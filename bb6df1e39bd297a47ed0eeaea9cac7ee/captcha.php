<?php

session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', true);
$text = $_SESSION['key'];
// Create a 100*30 image
$im = imagecreate(150, 30);
$font = dirname(__FILE__) . '/fonts/arial.ttf';

// White background and blue text
$bg = imagecolorallocate($im, 255, 255, 255);
$blue = imagecolorallocate($im, 0, 0, 255);
$black = imagecolorallocate($im, 0, 0, 0);
$red = imagecolorallocate($im, 255,0,0);

// Write the string at the top left

imageline($im, 0,rand(5,10), 200, rand(5,30), $red);
imageline($im, 0,rand(0,10), 200, rand(5,10), $red);
imagettftext($im, 18, 0, 10, 20, $blue, $font, $text);
imageline($im, 0,rand(15,30), 200, rand(10,24), $red);
imageline($im, 0,rand(5,10), 200, rand(10,24), $red);

// Output the image
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>
