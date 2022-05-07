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

<body>
    <?php include("../PHP/header_annexes.php") ?>

    <div id="body">
        <div id="titre">
            <h2>Conctactez nous</h2>
        </div>
        <div id="box">
            <div id="formulaire">
                <?php
                if (isset($_COOKIE['Nom']) && isset($_COOKIE['Prenom']) && isset($_COOKIE['Email'])){
                    $nom = $_COOKIE['Nom'];
                    $prenom = $_COOKIE['Prenom'];
                    $email = $_COOKIE['Email'];
                }else{
                    $nom = "";
                    $prenom = "";
                    $email = "";
                }
                ?>
                <h3>Message</h3>
                <input type="text" class="form" placeholder="Votre Nom" value= "<?php echo $nom; ?>"/>
                <input type="text" class="form" placeholder="Votre Prénom" value= "<?php echo $prenom; ?>"/>
                <input type="text" class="form" placeholder="Votre E-mail" value= "<?php echo $email; ?>"/>
                <textarea placeholder="Ecrivez votre message ici" class="form"></textarea>
                <input type="submit" class="form" value="Envoyer" />
            </div>
            <div id="information">
                <h3>Autres moyens de nous contacter</h3>
                <div>
                    <img src="../Images/espace-reserve-a-la-carte.png" alt="icone localisation" width="30" />
                    <p>41 Bd Vauban<br />59800 Lille</p>
                </div>
                <div>
                    <img src="../Images/appel.png" alt="icone d'un téléphone" width="10%" />
                    <p>+33 6 45 65 76 87</p> <!--ce numéro n'est pas valide-->
                </div>
                <div>
                    <a href="https://www.instagram.com/?hl=fr"><img src="../Images/instagram.png" alt="icone instagram" /></a>
                    <a href="https://twitter.com/?lang=fr"><img src="../Images/twitter.png" alt="icone twitter" /></a>
                    <a href="https://fr-fr.facebook.com/"><img src="../Images/facebook.png" alt="icone facebook" /></a>
                </div>
            </div>
            <div id="carte">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2530.6184689284264!2d3.046571715287809!3d50.6342040795012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d578da129f7d%3A0xd134d73fb7f4c699!2sJunia%20ISEN%20Lille!5e0!3m2!1sfr!2sfr!4v1638266744445!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <?php include("../PHP/footer_annexes.php") ?>
</body>
</html>