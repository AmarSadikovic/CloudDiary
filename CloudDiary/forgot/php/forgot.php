<?php
include '../../databaseConnect.php';
if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
	$mail = strip_tags($_POST["mail"]);
	$mailExist = false;
	$password;

	$stmt = $db->prepare('SELECT mail, password FROM users');
	$stmt->execute(array());
	foreach ($stmt as $row) {
		$mailInDB = $row['mail'];
		if($mail == $mailInDB){
			$mailExist = true;
			$password = $row['password'];
		}
	}
	if($mailExist){
		$host = $_SERVER['HTTP_HOST'];
		$subject = "CloudDiary Registration";
		$message = "Your password is: ".$password;

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		$headers .= 'From: <CloudDiary@hotmail.com>' . "\r\n";
		mail($mail,$subject,$message,$headers);
		echo "<script>
		alert('Mail containing password has been sent!'); 
		window.history.go(-1);
		</script>";

	}else{
		echo "<script>
		alert('Mail is not registered to an account'); 
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