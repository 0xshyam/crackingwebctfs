<?php
error_reporting(0);
//session_start();

if (!(isset($_SESSION['user']))){
    header("Location: index.php?msg=2");
}

print "<h2>Welcome Bob!</h2>";
print "<h4>You have 1 unread message</h4>";
?>

<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th>From</th>
    <th>Sent on</th>
    <th>Message</th>
  </tr>
  <tr>
    <td>James A</td>
    <td>15:04:2017:06:33:15</td>
    <td>Hey mate, Just dropping this message before you come in to work. I have moved the flag file to my home directory. Build your code accordingly. See you at the party later. Bye!
    </td>
  </tr>

</table>
<p>
<a href="logout.php">Logout User</a>
</p>
</body>
</html>



