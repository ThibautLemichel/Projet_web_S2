<?php

if(!isset($_GET['Sujet'])){
    header('Location : forum.php');
}else{
    include("connexion.php");

    $sujet = $_GET['Sujet'];
    
    $requete = "DELETE FROM forum WHERE `Sujet` = '$sujet'";
    $resultat = mysqli_query($connexion,$requete);

    if ( $resultat == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }  
    mysqli_close($connexion);
    header("Location:forum.php");
}

?>