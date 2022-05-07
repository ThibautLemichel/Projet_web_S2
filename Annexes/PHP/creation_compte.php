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

    function verificationTexte($chaine){
        if (!mb_eregi('^[[:alnum:]]*$', $chaine)){
            return True;
        }else{
            return False;
        }
    }

    echo "$nom<br>";
    echo "$prenom<br>";
    echo "$email<br>";
    echo "$pseudo<br>";
    echo "$mdp<br>";
    echo "$admin<br>";
    echo "<br>";
    echo verificationTexte($nom);
    echo verificationTexte($prenom).'<br>';
    echo verificationEmail($email).'<br>';
    echo verificationTexte($pseudo).'<br>';
    echo verificationMotDePasse($mdp).'<br>';


    
    if (!verificationEmail($email) || !verificationMotDePasse($mdp)){
        echo "Erreur";
    }else{
        include('connexion.php');
        
        
        $requete = "SELECT Email, MotDePasse WHERE Email = $email";
        $resultat = mysqli_query($connexion, $requete);
        
        if ( $resultat == FALSE ){
            echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
            die();
        }

        $verif = mysqli_fetch_assoc($resultat);
        if ($verif['Email'] == $email && $verif['MotDePasse'] == $mdp){
            echo "<p>Erreur, compte déjà existant.</p>";
            die();

            mysqli_close($connexion);
            header("Location:../../Index.php");
        }
        else{
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

            if ( $resultat != FALSE ){
                $user = mysqli_fetch_assoc($resultat);

                $_SESSION['Pseudo'] = $user['Pseudo'];
                $_SESSION['Admin'] = $user['Admin'];
                setcookie("Nom", $nom, time() + (365*24*3600));
                setcookie("Prenom", $prenom, time() + (365*24*3600));
                setcookie("Email", $email, time() + (365*24*3600));
                
                mysqli_close($connexion);
                header("Location:../../Index.php");
            }
        }
    }
    
}

?>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="../CSS/creation_compte2.css">
    <!--<link rel="stylesheet" href="../CSS/creation_compte.css">-->
</head>
<body>
    <form action="" method="POST" id="form">
    <h3>Inscription</h3>
        <label>Nom :</label><br>
        <input type="text" name='nom' required>
        <br><br>
        <label>Prénom :</label><br>
        <input type="text" name='prenom' required>
        <br><br>
        <label>Adresse email :</label><br>
        <?php
            if (isset($email) && !verificationMotDePasse($email)){
                echo "Adresse mail non valide (xxxxx.xxxxx@xxxxx.xxx)<br>";
            }
        ?>
        <input type="text" name='email' required>
        <br><br>
        <label>Pseudo :</label><br>
        <input type="text" name='pseudo' required>
        <br><br>
        <label>Mot de passe :   </label><br>
        <?php
            if (isset($mdp) && !verificationMotDePasse($mdp)){
                echo "Mot de passe non valide (8 caractères, majuscules, minuscules et chiffres)<br>";
            }
        ?>
        <input type="text" name='mdp' required>
        <br><br>
        <label>Voulez-vous être administrateur ?</label><br>
        <input type="checkbox" name='admin'>
        <br><br>
        <br>
        <button>Envoyer</button>
    </form>
</body>
