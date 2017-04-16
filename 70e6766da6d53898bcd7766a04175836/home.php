<?php
//error_reporting(0);
error_reporting(E_ALL);
session_start();

if (!(isset($_SESSION['user']))){
    header("Location: index.php?msg=2");
 }

$a = $_GET['page'];
if ((substr($a,0,1) == "/") OR (substr($a,0,1) == ".")){
	print "Cannot include file.";
}else{
	include($a);	
}

?>
