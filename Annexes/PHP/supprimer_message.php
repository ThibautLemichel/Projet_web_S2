<?php

if(!isset($_GET['Message'])){
    header('Location : forum.php');
}else{
    include("connexion.php");

    $message = $_GET['Message'];
    
    $requete = "DELETE FROM forum WHERE `Message` = '$message'";
    $resultat = mysqli_query($connexion,$requete);

    if ( $resultat == FALSE ){
        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
        die();
    }  
    mysqli_close($connexion);
    header("Location:forum.php");
}

?>