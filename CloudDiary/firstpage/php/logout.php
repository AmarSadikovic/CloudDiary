<?php
if(isset($_SESSION)){
	session_unset(); 
	session_destroy();
}
//Delete cookie
header("Location: ../../login/index.html");

?>