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

    echo "*------------------------------------*";
    echo "<br>";
    echo $nom.'<br>';
    echo $prenom.'<br>';
    echo $email.'<br>';
    echo $mdp.'<br>';
    echo $pseudo.'<br>';
    echo $admin.'<br>';
    echo "*------------------------------------*";
    echo "<br>";


    $_SESSION['Pseudo'] = $pseudo;
    $_SESSION['Admin'] = $admin;
    $_SESSION['Password'] = $mdp;

    setcookie('Prenom', $prenom, time() + (365*24*3600));
    setcookie('Nom', $nom, time() + (365*24*3600));
    setcookie('Email', $email, time() + (365*24*3600));


    echo $_COOKIE['nom'].'<br>';
    echo $_COOKIE['prenom'].'<br>';
    echo $_COOKIE['email'].'<br>';
    echo $_SESSION['Password'].'<br>';
    echo $_SESSION['Pseudo'].'<br>';
    echo $_SESSION['Admin'].'<br>';
    echo "*------------------------------------*";
    echo "<br>";

    header("Location:../../Index.php");
    mysqli_close($connexion);
}   
?>