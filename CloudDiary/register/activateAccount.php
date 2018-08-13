<?php
include '../databaseConnect.php';
$mail = $_GET["mail"]; 
$active = 1;

$sql = "UPDATE users SET active=? WHERE mail=?";
$db->prepare($sql)->execute([$active, $mail]);
$db = null;

echo "Your account is activated! You can now log in.";
echo "<br> <a href='../login/index.html'>Take me to login page!</a>";
?>