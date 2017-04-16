<html>
<head>
<title>
Level 4
</title>
</head>
<body>
<h1>Level 4</h1>
<h2>Too much JavaScript for today! :)</h2>
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
$FLAG = md5('BringOnTheNeXtLevel!'); //2da51fcf5250842da9426bdcfcd8bbc2
#print $FLAG;
if (!empty($_POST['user']) && !empty($_POST['pass'])) {

if(checklogin($_POST['user'],$_POST['pass'])){
    echo "<font style=\"color:#FF0000\"><h3>The flag is: $FLAG</h3><br\></font\>";
}else{
    echo "<font style=\"color:#FF0000\">Invalid credentials! Please try again!<br\></font\>";
}

}

function checklogin($u,$p)
{
if ($u === "snape" && $p === "hatedjamespotter"){
return true;
}
}
?>

</body>
</html>
