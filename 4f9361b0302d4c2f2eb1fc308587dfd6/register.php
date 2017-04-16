<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>HackIM'17 - Web200</title>
          <link rel="stylesheet" href="css/style.css">
<script src="js/index.js"></script>
  </head>

  <body>

<form method="post" name="registerfrm" id="registerfrm" action="register.php">
<div class="box">
<h1>HackIM'17 - Web200</h1>
<h3>Register</h3>
<input type="username" name="username" value="username" onFocus="field_focus(this, 'username');" onblur="field_blur(this, 'username');" class="email" />
  
<input type="password" id="password" name="password" value="password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'password');" class="email" />

<input type="password" id="nwpwd" name="nwpwd" value="password" onFocus="field_focus(this, 'nwpwd');" onblur="field_blur(this, 'nwpwd');" class="email" />
  
<a href="index.php"><div class="btn">Go back</div></a> <!-- End Btn -->

<a href="#" onclick="register()"><div id="btn2">Register</div></a> <!-- End Btn2 -->
  <br />
  <span id="msg" style="color:red">
  <?php

include("../web200private/dbconfig.php");

if (isset($_POST['username']) AND $_SERVER['REQUEST_METHOD']==='POST' AND isset($_POST['password'])){

  $username = mysqli_real_escape_string($con,$_POST['username']);
 $pass = md5($_POST['password']);
  $nwpwd = md5($_POST['nwpwd']);

  if ($pass !==$nwpwd){
  	echo "Password confirmation mismatch.";
  	die();
  }

  $q = "SELECT username from users where username='" . $username .  "'";

  $result = mysqli_query($con,$q);
			if ($result){
				
				if (mysqli_num_rows($result)>0){
					echo "User already exists!";
				}
				else{
					$q = "INSERT INTO users (username, password,role) VALUES ('$username', '$pass','limited')";

					$result = mysqli_query($con,$q);
					print mysql_error();

					if ($result){
							print "User created. Please login to continue.";
						
			
					}

				}
			
			}
		}
?>
    </span>
</div> <!-- End Box -->
  
</form>
    
  </body>
</html>
