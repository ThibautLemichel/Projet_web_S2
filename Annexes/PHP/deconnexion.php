<?php 
	session_start();
	if(isset($_SESSION['Pseudo'])){
		session_unset();
		session_destroy();
		header("Index.php");
	}
?>
