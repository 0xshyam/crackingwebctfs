<?php
session_start();
error_reporting(0);
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
				if (isset($_GET['file'])){
					//echo encrypt()."<br />";
					$filename = decrypt($_GET['file']);
					//echo $filename;	
					if ($filename == "flag-hint" OR $filename == "flagflagflagflag"){
						readfile("../web500private/thisistheflagfolder/".$filename.".txt");
					}else{
						echo "Not allowed to read this file!";
					}


				}

				function decrypt($enc){
					$key = "TheTormentofTantalus";

					$data = base64_decode($enc);
					$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

					$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $key, true),substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$iv),"\0");

					return $decrypted;
				}

				function encrypt(){
					$plain = "flagflagflagflag";
					$plain = "flag-hint";
					$key = "TheTormentofTantalus";

					$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);
					$encrypted = base64_encode($iv.mcrypt_encrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $key, true),$plain,MCRYPT_MODE_CBC,$iv));
					return $encrypted;
				}
			?>
		</div>

	</div>
        <script src="js/index.js"></script>
  </body>
</html>

<!--

	function decrypt($enc){
					$key = ??; //stored elsewhere

					$data = base64_decode($enc);
					$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

					$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128,hash('sha256', $key, true),substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$iv),"\0");

					return $decrypted;
				}

-->
