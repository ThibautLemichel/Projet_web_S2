<?php
session_start();
include('connexion.php');

function verificationEmail($chaine){
    $regle = "/[a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3}/";
    return preg_match($regle, $chaine);
}

function verificationMotDePasse($chaine){
    if(strlen($chaine) > 8 && preg_match("/[0-9]/", $chaine) == 1 && preg_match("/[A-Z]/", $chaine) && preg_match("/[a-z]/", $chaine) == 1){ // Vérifie si les règles sont respectés
        return 1; 
    }else{
        return 0;
    }
}

if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email']) || !isset($_POST['mdp'])){
    header('Location: ../Pages/informations.php');
}

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$mdp = $_POST['mdp'];
$pseudo = $_POST['pseudo'];
$email = $_COOKIE['email'];

if (!verificationEmail($email) || !verificationMotDePasse($mdp)){
    header('Location: ../Pages/informations.php');
}

$requete = "UPDATE `utilisateurs` SET `Nom`= '{$nom}',`Prenom`= '{$prenom}',`Pseudo`= '{$pseudo}',`MotDePasse`= '{$mdp}' WHERE `Email` = '{$email}'";
$resultat = mysqli_query($connexion, $requete);

header('Location: ../Pages/informations.php');

?>