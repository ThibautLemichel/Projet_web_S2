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
                $prenom = $_COOKIE['Prenom'];
                $nom = $_COOKIE['Nom'];
                $email = $_COOKIE['Email'];
                $mdp = $_SESSION['Password'];
                $pseudo = $_SESSION['Pseudo'];
                ?>
                <input type="text" class="form" placeholder="Votre nom" value= "<?php echo $prenom; ?>"/>
                <input type="text" class="form" placeholder="Votre Prenom" value= "<?php echo $nom; ?>"/>
                <input type="text" class="form" placeholder="Votre Email" value= "<?php echo $email; ?>"/>
                <input type="text" class="form" placeholder="Votre mot de passe" value= "<?php echo $mdp; ?>"/>
                <input type="text" class="form" placeholder="Votre pseudo" value= "<?php echo $pseudo; ?>"/>
                <input type="submit" class="form" value="Mettre à jour" />
            </div>
        </div>
    </div>
    <?php include("../PHP/footer_annexes.php") ?>
</body>
</html>