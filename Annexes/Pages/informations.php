<!DOCTYPE html>
<link rel="stylesheet" href="../CSS/ProjetChien.css" />
<link rel="stylesheet" href="../CSS/Contact.css" />
<html lang="fr-fr">
<head>
    <meta charset="utf-8" />
    <title>Projet chien</title>
    <meta name="description" content="Trouve le chien de tes rêves" />
    <meta name="keywords" content="chien, toutou, animaux de compagnies, meilleur ami de l'homme, meilleur ami de la femme" />
    <meta name="author" content="Thibaut Lemichel" />
</head>
<?php session_start() ?>
<body>
    <?php include("../PHP/header_annexes.php") ?>

    <div id="body">
        <div id="titre">
            <h2>Mettre à jour vos informations</h2>
        </div>
        <div id="box">
            <div id="formulaire">
                <?php              
                $prenom = $_COOKIE['prenom'];
                $nom = $_COOKIE['nom'];
                $mdp = $_SESSION['Password'];
                $pseudo = $_SESSION['Pseudo'];
                ?>
                <form method="POST" action="../PHP/MaJ_utilisateur.php">
                    <input type="text" name="nom" placeholder="Votre nom" value= "<?php echo $nom; ?>"/>
                    <input type="text" name="prenom" placeholder="Votre Prenom" value= "<?php echo $prenom; ?>"/>
                    <input type="text" name="mdp" placeholder="Votre mot de passe" value= "<?php echo $mdp; ?>"/>
                    <input type="text" name="pseudo" placeholder="Votre pseudo" value= "<?php echo $pseudo; ?>"/>
                    <input type="submit" value="Mettre à jour" />
                </form>
            </div>
        </div>
    </div>
    <?php include("../PHP/footer_annexes.php") ?>
</body>
</html>