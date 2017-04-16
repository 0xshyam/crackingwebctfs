<?php
	$dbuser='ulanbator';
	$dbpass='u2r2kapntkqa9plk9kav';
	$host='localhost';
	$db = 'hackimweb200';	
	$con = mysqli_connect($host, $dbuser, $dbpass,$db);
	if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
?>
