<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', true);

include("../web200private/dbconfig.php");
include("../web200private/functions.php");

if (isset($_POST['username']) AND $_SERVER['REQUEST_METHOD']==='POST' AND isset($_POST['password'])){

  $username = mysqli_real_escape_string($con,$_POST['username']);
  $pass = md5($_POST['password']);

  $q = "SELECT * from users where username='" . $username .  "' AND password='" . $pass . "'";
 $result = mysqli_query($con,$q);
      if ($result){

      if (mysqli_num_rows($result)>0){
            for ($i=0; $i<mysqli_num_rows($result); $i++) {
              $row = mysqli_fetch_assoc($result);
              $_SESSION['username']=$row['username'];
              $_SESSION['role']=$row['role'];
              setcookie('u',usercookie($username));
              setcookie('r',rolecookie($row['role']));
              header("Location: home.php");
            }
          }
        else{
          header("Location: index.php?msg=1");
        }
        
      
      }

}else{

  if (!(isset($_SESSION['username']))){
    header("Location: index.php?msg=2");
  }
}

?>
<html>
<head>
  <title>HackIM'17 - Web200</title>
<link rel="stylesheet" href="css/home.css">
</head>
<body>
  <h1>HackIM'17 - Web200</h1>
<ul>
  <li>
    Home
  </li>
   <a href="logout.php"><li>
    Logout
  </li></a>

</ul>
<?php
$FLAG = md5('Level2IsSimplerThanYouThought:)'); //bb6df1e39bd297a47ed0eeaea9cac7ee
if (isset($_SESSION['username'])) {
  if (rolecookie('admin')==$_COOKIE['r']) {
    print "<h1>Welcome admin user!</h1><h3>Congratulations! The flag is: $FLAG</h3>";
  }else if(rolecookie('limited')==$_COOKIE['r']){
    print "<h1>Welcome limited user!</h1><h3>You do not possess the necessary powers. Try harder!</h3>";
  }
}
?>
</body>
</html>
