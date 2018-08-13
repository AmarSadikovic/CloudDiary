<?php
include '../../databaseConnect.php';
$id = $_GET["id"]; 

$stmt = $db->prepare('SELECT * FROM post WHERE id = '.$id);
$stmt->execute(array());
foreach ($stmt as $row) {
	$title = $row["title"];
	$message = $row["message"];
}
$html = file_get_contents("../post.html");
$html = str_replace('---$title---', $title, $html);
$html = str_replace('---$message---', $message, $html);
$html = str_replace('---$id---', $id, $html);
echo $html;

?>