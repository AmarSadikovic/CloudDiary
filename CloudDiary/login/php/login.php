<?php
include '../../databaseConnect.php';

if(isset($_SESSION)){
	session_unset(); 
	session_destroy();
}else{
	session_start();
}
if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
	$mail = strip_tags($_POST["mail"]);
	$password = strip_tags($_POST["password"]);
	$active = 1;

	$stmt = $db->prepare('SELECT * FROM users WHERE mail = :mail and active = :active and password = :password');
	$stmt->execute(array('mail' => $mail, 'active' => $active, 'password' => $password));

	if($stmt->rowCount() > 0){
	//Redirect to login homepage
		$_SESSION["mail"] = $mail;
		//setcookie("mail", $mail, time() + (259200 * 30), "/"); // 86400 = 1 day
		header("Location: ../../firstpage/php/listPosts.php");
	}else{
		echo "<script>
		alert('Failed to login'); 
		window.history.go(-1);
		</script>";
	}
}else{
	echo "<script>
	alert('Mail invalid'); 
	window.history.go(-1);
	</script>";
}
?>

