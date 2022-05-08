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

    $nom = $user['Nom'];
    $prenom = $user['Prenom'];
    $email = $user['Email'];
    $pseudo = $user['Pseudo'];
    $admin = $user['Admin'];

    setcookie('prenom', "", time() - 3600,"/","", 0, 0);
    setcookie('nom', "", time() - 3600,"/","", 0, 0);
    setcookie('email', "", time() - 3600,"/","", 0, 0);

    $_SESSION['Pseudo'] = $pseudo;
    $_SESSION['Admin'] = $admin;
    $_SESSION['Password'] = $mdp;

    setcookie('prenom', $prenom, time() + (365*24*3600),"/","", 0, 0);
    setcookie('nom', $nom, time() + (365*24*3600),"/","", 0, 0);
    setcookie('email', $email, time() + (365*24*3600),"/","", 0, 0);

    header("Location:../../Index.php");
    mysqli_close($connexion);
}   
?>