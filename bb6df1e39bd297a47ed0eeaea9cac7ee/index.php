<?php
session_start();
error_reporting(0);
ini_set('display_errors', false);
$oldkey = "";
if (isset($_POST)){
	$oldkey = $_SESSION['key'];
}

include("dbconfig.php");
?>

<html>
<title>HackIM'17 - Web400</title>
<body>
	<h1>HackIM'17 - Web400</h1>
<form method="POST" autocomplete="off">
	<p>Username: <input type="text" name="user" id="user"></p>
	<p>Password: <input type="password" name="pass" id="pass"></p>
	<p>CAPTCHA: <input type="text" name="key" id="key"></p>
	<p><img src="captcha.php"/></p>
			<p>
			<input type="submit" value="Submit"/> 
			<input type="reset" value="Reset"/>
			</p>
</form>

<?php
$key= substr(strtoupper(md5(md5(rand(100000000000,99999999999999)))),0,8);
$_SESSION['key'] = $key;

// echo $_POST['key']."<br />";
// echo $_SESSION['key']."<br />";
// echo $oldkey;
$FLAG = md5('ThingsAreGettingWarmer!!!'); //b7ebfe2a47f711a7b2b5bff057600a2c
if (!empty($_POST['user']) && !empty($_POST['pass']) &&!empty($_POST['key']) && (isset($_POST))) {

if ($_POST['key'] === $oldkey)
{

$user = $_POST['user'];
$pass = $_POST['pass'];


$q = "SELECT * FROM users where username='".mysqli_real_escape_string($con,$user)."'" ;
//echo $q;

	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}
	
	$result = mysqli_query($con,$q);
	$row_cnt = mysqli_num_rows($result);

	if ($row_cnt > 0) {
	
		$row = mysqli_fetch_array($result);
		//echo $row[2];
		
		if ($row)
		{
		$phash = $row[2];
//		echo $phash;
		if ((password_verify($pass, $phash))===true)
			{
			echo "<p><font style=\"color:#FF0000\"><h3>The flag is: $FLAG</h3><br\></font></p>";
			}else
			{
				echo "<font style=\"color:#FF0000\"><br \>Invalid password!</font>";
			}
		}
	}
	else{
		echo "<font style=\"color:#FF0000\"><br \>Invalid password!</font>";
	}
}else{
			echo "<font style=\"color:#FF0000\"><br \>Invalid CAPTCHA!</font>"; //empty fields submitted
	}

}else{
		echo "<font style=\"color:#FF0000\"><br \>Please submit all fields!</font>"; //empty fields submitted
	}




?>

</body>
</html>
<?php //pass = kztu6fe1m68mwf7vl1g3grjzmocia043pmno83q3ati98c8r324dzc0hc7n41p6tdjg6p7ld ?>
<!-- The partial password is: kztu6fe1m68mwf7vl1g3grjzmocia043pmno83q3ati98c8r324dzc0hc7n41p6tdjg6p -->
<!-- sql file exported and backed up -->
