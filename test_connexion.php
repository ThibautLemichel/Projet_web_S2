<?php
include("connexion.php");

if (!isset($_POST['email']) || !isset($_POST['passwd'])){
    echo "Information manquante";
    header("Location:index.php");
}
else{
    (string)$email = $_POST['email'];
	(string)$mdp = $_POST['passwd'];

    $requete_email = "SELECT Email FROM `utilisateurs` WHERE Email = $email";
    $requete_mdp = "SELECT MotDePasse WHERE Email = $email";
    $resultat_email = mysqli_query($connexion, $requete_email);
    $resultat_mdp = mysqli_query($connexion, $requete_mdp);

    var_dump($resultat_email);
    var_dump($resultat_mdp);
    /*
    if (!$resultat_email){
        echo "Email non valide : $email";
    }else{
        echo "Email valide : $email";
        if (!$resultat_mdp){
            echo "Mot de passe non valide : $mdp";
        }else{
            echo "Mot de passe valide : $mdp";
        }
    }
    */
}
?>