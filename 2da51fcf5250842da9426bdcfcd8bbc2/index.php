<html>
<head>
<title>
HackIM'17 - Web100
</title>
</head>
<body>
<h1>HackIM'17 - Web100</h1>
<form method="POST" autocomplete="off">
<p>Username: <input type="text" name="user" id="user"></p>
<p>Password: <input type="password" name="pass" id="pass"></p>

<p>
<input type="submit" value="Submit"/> 
<input type="reset" value="Reset"/>
</p>
</form>

<?php
error_reporting(0);
$FLAG = md5('Level1IsJustTheBeginning!'); //4f9361b0302d4c2f2eb1fc308587dfd6
if (!empty($_POST['user']) && !empty($_POST['pass'])) {

if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
if ($_SERVER['HTTP_X_FORWARDED_FOR'] === "127.0.0.1"){ //$_SERVER['SERVER_ADDR']){
if(checklogin($_POST['user'],$_POST['pass'])){
    echo "<font style=\"color:#FF0000\"><h3>The flag is: $FLAG</h3><br\></font\>";
}else{
    echo "<font style=\"color:#FF0000\">Invalid credentials! Please try again!<br\></font\>";
}
}
}
else{

echo "IP not allowed to login! Please contact your administrator for access. IP logged.";
}
}

function checklogin($u,$p)
{
if ($u === "coldplay" && $p === "paradise"){

return true;
}
}
?>

</body>
</html>

<?php
echo str_repeat("\n", 5000);
echo "<!-- MmI0YjAzN2ZkMWYzMDM3NWU1Y2Q4NzE0NDhiNWI5NWM= -->";
?>
