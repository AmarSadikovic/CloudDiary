<?php

include '../databaseConnect.php';

if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
	$mail = strip_tags($_POST["mail"]);
	$password = strip_tags($_POST["password"]);
	$mailTaken = false;

	$stmt = $db->prepare('SELECT mail FROM users');
	$stmt->execute(array());
	foreach ($stmt as $row) {
		$mailInDB = $row['mail'];
		if($mail == $mailInDB){
			$mailTaken = true;
		}
	}
	if(!$mailTaken){
		//Insert data to database
		$sql = "INSERT users SET mail=?, password=?";
		$db->prepare($sql)->execute([$mail, $password]);
	//Send mail to complete registration
		sendMail($mail);
	//Go to login page
		//header("Location: ../login/index.html");
		echo "Follow the activation code inside your login email";
		echo "<br> <a href='../login/index.html'>Back to login page</a>";

	}else{
		echo "<script>
		alert('Mail is already taken!'); 
		window.history.go(-1);
		</script>";
	}
}else{
	echo "<script>
	alert('Mail invalid'); 
	window.history.go(-1);
	</script>";
}

function sendMail($mail){
	$host = $_SERVER['HTTP_HOST'];
	$script_uri = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));
	$urlToClick = $host.$script_uri."/activateAccount.php?mail=".$mail; //Specifie where to go.
	$subject = "CloudDiary Registration";
	$message = "
	<html>
	<head>
	<h3>Please Follow the link to complete registration</h3>
	<a href='http://".$urlToClick."'>Follow the link to complete registration</a>
	</body>
	</html>
	";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <CloudDiary@hotmail.com>' . "\r\n";
	mail($mail,$subject,$message,$headers);
}
?>