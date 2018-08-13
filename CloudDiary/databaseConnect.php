<?php 

$user = "root"; //user name (Default: root);
$password ="";	//password to database
$myDb = "diary"; //Name of database

$db = new PDO('mysql:host=localhost:3304;dbname=diary;charset=utf8mb4', $user, $password);

?>