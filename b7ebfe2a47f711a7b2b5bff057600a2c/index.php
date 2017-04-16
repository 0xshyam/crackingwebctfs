<?php
session_start();
//error_reporting(0);
ini_set('display_errors', false);
$oldkey = "";
if (isset($_POST)){
	$oldkey = $_SESSION['key'];
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>HackIM'17 - Web500</title>
    <link rel="stylesheet" href="css/style.css">
</head>

  <body>

    <div class="wrapper">
	<div class="container">
<h1 style="color:black">HackIM'17 - Web500</h1><p>&nbsp;</p>
		
<?php
include("../web500private/dbconfig.php");
ini_set('display_errors', 1); 

$key= substr(strtoupper(md5(md5(rand(10000000,999999999)))),0,2);
$_SESSION['key'] = $key;
?>
	<form class="form" method="POST" autocomplete="off">
			<input id="username" name="username" type="text" placeholder="Username">
			<input id="password" name="password" type="password" placeholder="Password">
			<p><br /></p>
			<p><img src="captcha.php"/></p>
			<input type="text" name="key" id="key" placeholder="CAPTCHA">
			<button id="submit" value="Login" type="submit">Login</button>
		</form>
		
		<p>
		<?php
if (!empty($_POST['username']) && !empty($_POST['password']) &&!empty($_POST['key']) && (isset($_POST))) {

	$agent = ($_SERVER['HTTP_USER_AGENT']);
	$q = "SELECT bid from useragents where agent LIKE '".$agent."%'";
		
	if ($_POST['key'] === $oldkey)
	{
		if ($_POST['username'] === 'ori' AND $_POST['password'] === 'frettchen'){
			header('Location: ba3988db0a3167093b1f74e8ae4a8e83.php?file=uWN9aYRF42LJbElOcrtjrFL6omjCL4AnkcmSuszI7aA=');
	}else{
			print "<br /><p style='color:red'>Invalid credentials</p> <h3>";
	}


	$result = mysqli_query($con,$q);
	if ($result){
		if (mysqli_num_rows($result)==0){
			echo "Your browser is not supported!";
		}
	}

	if (!mysqli_query($con,$q)) {
    		printf("%s\n", mysqli_error($con));
			}
		}else{
			echo "<font style=\"color:#FF0000\"><br \>Invalid CAPTCHA!</font>"; 
		}

	}
// else{
	
// 	echo "<font style=\"color:#FF0000\"><br \>All fields are required.</font>"; //empty fields submitted
// }

?>

</p>
</div>

</div>
        <script src="js/index.js"></script>
  </body>
</html>
