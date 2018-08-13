<?php
include '../../databaseConnect.php';
session_start();

$mail = $_SESSION["mail"];
//$mail = $_COOKIE["mail"];
$id;

$db_id = $db->prepare("SELECT id FROM users WHERE mail = :mail");
$db_id->bindValue(':mail', $mail);
$db_id->execute();
$result = $db_id->fetch(PDO::FETCH_ASSOC);

$id = $result["id"];



$stmt = $db->prepare('SELECT * FROM post WHERE users_id = '.$id);
$stmt->execute(array());
$html2 = file_get_contents("../firstpage.html");
echo $html2;
foreach ($stmt as $row) {
	echo 
	"<div class='container'>
	<div class='row'>
	<div class='col-md-offset-2 col-md-8'>
	<ul class='list-group'>
	<li class='list-group-item'><a href='post.php?id=".$row["id"]."'>
	".$row["title"]."
	</li>
	</ul>
	</div>
	</div>
	</div>";
}


?>

