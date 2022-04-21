<?php
session_start();
date_default_timezone_set("Europe/Paris");

if(!isset($_POST['message'])){
    header('Location : forum.php'); //! Ne redirige pas
}else{
    $indice = $_POST['indice'];
    $sujet = $_POST['sujet'];
    $pseudo = $_SESSION['Pseudo'];
    $message = $_POST['message'];
    $date = date('Y-m-d H:i:s');
    
    echo "Indice : $indice<br>";
    echo "Sujet : $sujet<br>";
    echo "Pseudo : $pseudo<br>";
    echo "Message : $message<br>";
    echo "Date : $date<br>";
    
    
    include("connexion.php");
    $requete = "INSERT INTO forum (Indice, Sujet,  Pseudo, `Message`, `Date`) VALUES ($indice, '$sujet', '$pseudo', '$message', '$date')";
    $resultat = mysqli_query($connexion,$requete);
    
    if ( $resultat == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }  
    mysqli_close($connexion);
    header("Location:forum.php");
}

?>