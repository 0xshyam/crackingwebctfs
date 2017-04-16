<html>
<head>
<title>
Level 3
</title>
</head>
<body>
<h1>Level 3</h1>
<h2></h2>
<form method="POST" action= "index.php" autocomplete="off">
<p>Username: <input type="text" name="user" id="user"></p>
<p>Password: <input type="password" name="pass" id="pass"></p>

<p>
<input type="submit" value="Submit"/> 
<input type="reset" value="Reset"/>
</p>
</form>

<?php
  	if (isset($_GET['msg'])){
  		if ($_GET['msg'] == 1){
  			print "Invalid username or password.";
  		}else if ($_GET['msg'] == 2){
  			print "Please login to view this page.";
  		}else if ($_GET['msg'] == 3){
  			print "You have been logged out.";
  		}else{
        print "";
      }

  	}

  ?>
<?php
error_reporting(0);
session_start();

if (!empty($_POST['user']) && !empty($_POST['pass'])) {

if(checklogin($_POST['user'],$_POST['pass'])){
	$_SESSION['user'] = 'bob';
	header('Location: home.php?page=mail.php')  ;  
}else{
    echo "<font style=\"color:#FF0000\">Invalid credentials! Please try again!<br\></font\>";
}

}

function checklogin($u,$p)
{
	if ($u === "bob" && $p === "bob"){
		return true;
	}
}
?>

</body>
</html>

<!-- Made by Bob Andrews ©2017 -->
