<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
<title>HackIM'17 - Web200</title>
          <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

<form method="post" name="loginfrm" id="loginfrm" action="home.php">
<div class="box">
<h1>HackIM'17 - Web200</h1>
<h3>Login</h3>
<input type="username" id="password" name="username" value="username" onFocus="field_focus(this, 'username');" onblur="field_blur(this, 'username');" class="email" />
  
<input type="password" id="password" name="password" value="password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'password');" class="email" />
  
<a href="#" onclick="login()"><div class="btn">Sign In</div></a> <!-- End Btn -->

<a href="register.php"><div id="btn2">Sign Up</div></a> <!-- End Btn2 -->
 <br />
  <span id="msg" style="color:red">
  <?php
  	if (isset($_GET['msg'])){
  		if ($_GET['msg'] == 1){
  			print "Invalid username or password.";
  		}else if ($_GET['msg'] == 2){
  			print "Please login to view this page.";
  		}else if ($_GET['msg'] == 3){
  			print "You have been logged out.";
  		}else{
        print "Maybe it's not always an injection :)";
      }

  	}

  ?>

  </span> 
</div> <!-- End Box -->
  
</form>

    
        <script src="js/index.js"></script>
   
  </body>
</html>
