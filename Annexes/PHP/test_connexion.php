<?php
session_start();
include("connexion.php");

if (!isset($_POST['email']) || !isset($_POST['passwd'])){
    echo "Information manquante";
    header("Location:../../index.php");
}
else{
    $email = $_POST['email'];
	$mdp = $_POST['passwd'];

    $requete = "SELECT Pseudo, `Admin`, Prenom, Nom, Email FROM utilisateurs WHERE Email = '$email' && MotDePasse = '$mdp'";
    $resultat = mysqli_query($connexion, $requete);

	if ( $resultat == FALSE ){
    	echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		header("Location:Index.php");
	}
    $user = mysqli_fetch_assoc($resultat);

    $_SESSION['Pseudo'] = $user['Pseudo'];
    $_SESSION['Admin'] = $user['Admin'];
    setcookie('Prenom', $user['Prenom'], time() + (365*24*3600));
    setcookie('Nom', $user['Nom'], time() + (365*24*3600));
    setcookie('Email', $user['Email'], time() + (365*24*3600));
    header("Location:../../Index.php");
    mysqli_close($connexion);
}
?>