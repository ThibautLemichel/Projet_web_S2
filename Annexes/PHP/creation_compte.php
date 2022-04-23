<?php
session_start();

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp'])){
    if (isset($_POST['admin'])){
        $admin = 1;
    }else{
        $admin = 0;
    }
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    

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

    echo "$nom<br>";
    echo "$prenom<br>";
    echo "$email<br>";
    echo "$pseudo<br>";
    echo "$mdp<br>";
    echo "$admin<br>";
    echo "<br>";
    echo verificationEmail($email).'<br>';
    echo verificationMotDePasse($mdp).'<br>';

    
    if (!verificationEmail($email) || !verificationMotDePasse($mdp)){
        echo "Erreur";
    }else{
        include('connexion.php');
        
        $requete = "SELECT MAX(Id) AS Maximum FROM utilisateurs";
        $resultat = mysqli_query($connexion, $requete);
        
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }

        $indice = mysqli_fetch_assoc($resultat);
        $indice = (int)$indice['Maximum']; 
        $indice++;

        $requete = "INSERT INTO `utilisateurs`(`Id`, `Nom`, `Prenom`, `Pseudo`, `Email`, `MotDePasse`, `Admin`) VALUES ('$indice','$nom','$prenom','$pseudo','$email','$mdp','$admin');";
        $resultat = mysqli_query($connexion, $requete);
        
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }

        $requete = "SELECT Pseudo, `Admin` FROM utilisateurs WHERE Email = '$email' && MotDePasse = '$mdp'";
        $resultat = mysqli_query($connexion, $requete);

        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            header("Location:Index.php");
        }
        $user = mysqli_fetch_assoc($resultat);

        $_SESSION['Pseudo'] = $user['Pseudo'];
        $_SESSION['Admin'] = $user['Admin'];
        header("Location:../../Index.php");
        mysqli_close($connexion);
    }
    
}

?>
<link rel="stylesheet" href="Annexes/CSS/ProjetChien.css" />

<form action="" method="POST">
    <h3>Inscription</h3>
    <fieldset>
        <label>Nom :</label>
        <input type="text" name='nom'><br>
        <label>Prénom :</label>
        <input type="text" name='prenom'><br>
        <label>Adresse email :</label>
        <input type="text" name='email'><br>
        <label>Pseudo :</label>
        <input type="text" name='pseudo'><br>
        <label>Mot de passe :</label>
        <input type="text" name='mdp'><br>
        <label>Voulez-vous être administrateur ? : </label>
        <input type="checkbox" name='admin'><br>
        <br>
        <button>Envoyer</button>
    </fieldset>
</form>