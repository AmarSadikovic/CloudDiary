<?php
include '../../databaseConnect.php';


$id = $_POST["id"];

$db_id = $db->prepare("DELETE FROM post WHERE id = :id");
$db_id->bindValue(':id', $id);
$db_id->execute();

echo "<script>
alert('Succesfully deleted post'); 
</script>";
header("Location: listPosts.php");

?>