<html>
<head>
<title>
Level 2
</title>
</head>
<body>
<h1>Level 2</h1>
<h2> All your base are belong to us! </h2>
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
$FLAG = md5('This was very simple!'); //70e6766da6d53898bcd7766a04175836
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
if ($u === "alice" && $p === "isveryscaredofthedarkness"){

return true;
}
}
?>

</body>
</html>

<!--
DB backed up in 61e39e8f7629bebee925289b0da83b0a19034b00 on 17th April 2016
-->