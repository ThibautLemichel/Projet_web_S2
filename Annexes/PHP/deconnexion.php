<?php 
	session_start();
	if(isset($_SESSION['Pseudo'])){
		session_unset();
		session_destroy();
		setcookie("Nom", "", time() - 3600);
		setcookie("Prenom", "", time() - 3600);
		setcookie("Email", "", time() - 3600);
		header("Location:../../Index.php");
	}
?>