<?php
include '../../databaseConnect.php';
session_start();
if(isset($_POST["title"]) && isset($_POST["message"]) ){
	$title = $_POST["title"];
	$message = $_POST["message"];
	$mail = $_SESSION["mail"];
	//$mail = $_COOKIE["mail"];
	$id;
	$db_id = $db->prepare("SELECT id FROM users WHERE mail = :mail");
	$db_id->bindValue(':mail', $mail);
	$db_id->execute();
	$result = $db_id->fetch(PDO::FETCH_ASSOC);
	$id = $result["id"];
	
	$sql = "INSERT post SET title=?, message=?, users_id=?";
	$db->prepare($sql)->execute([$title, $message, $id]);
	header("Location: listPosts.php");

}

?>