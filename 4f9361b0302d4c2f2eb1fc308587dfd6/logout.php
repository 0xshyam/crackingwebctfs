<?php
session_start();
session_destroy();
setcookie("u", "", time() - 3600);
setcookie("r", "", time() - 3600);
header("Location: index.php?msg=3");
?>