<?php
    session_start();
?>


<!DOCTYPE html>
<link rel="stylesheet" href="Annexes/CSS/ProjetChien.css"/>
<link rel="stylesheet" href="Annexes/CSS/Acceuil.css"/>
<html lang="fr-fr">
<head>
    <meta charset="utf-8" />
    <title>Projet chien</title>
    <meta name="description" content="Trouve le chien de tes rêves" />
    <meta name="keywords" content="chien, toutou, animaux de compagnies, meilleur ami de l'homme, meilleur ami de la femme" />
    <meta name="author" content="Thibaut Lemichel" />
</head>

<body>
    <?php include('Annexes/PHP/header_index.php'); ?>
    <div id="main">
        <?php
        if (!isset($_SESSION['Pseudo'])){
        ?>
        <div id="Titre">
            <div class="Titre">
                <h1>Bienvenue</h1>
            </div>
        </div>
        <div class=popup>
            <div class="box">
                <a href="#popup1" class="button">Se connecter</a>
            </div>
            <div id="popup1" class="popupp">
                <div class="popup1">
                    <h2>Se connecter</h2>
                    <a href="#" class="cross">&times;</a>
                    <form action="Annexes/PHP/test_connexion.php" method="post" class="login">
                        <fieldset> 
                        <input type="text" name="email" placeholder="Adresse mail" required>
                        </br>
                        <input type="text" name="passwd"  placeholder="Mot de passe" required>
                        </br>
                        <input type="submit" name="Envoyer" value="Connecter" class="bouton_login"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="creation_compte">
            <h3>Vous n'avez pas de compte ?</h3>
            <a href='Annexes/PHP/creation_compte.php'>Créer un compte</a>
        </div>
        <?php
         }else{
            echo "<a href='Annexes/PHP/deconnexion.php' class='deconnexion'>Déconnexion</a>";
         ?>
         <div id="Titre">
            <div class="Titre">
                <?php echo "<h1>Bienvenue $_SESSION[Pseudo]</h1>" ?>
            </div>
        </div>
        <?php
         }
        ?>
        <div id="Fixed">
            <div id="image1">
                <img src="Annexes/Images/chein+maitre.jpg" alt="image d'un chien et de son maitre" />
            </div>
            <div id="texte1">
                <h3><a href="Annexes/Pages/Trouvez un chien.php">Trouver un chien</a></h3>
                <p>Il y a bien entendu beaucoup de façon d'en trouver un, tout d'abord se présente à vous le choix entre un chiot ou un chien adultes, et par la suite viendra le choix du mode d'adoption, que ce soit en refuge, chez un éleveur, ou chez une personne ne pouvant plus s'occuper de son animal.</p>
            </div>
            <div id="image2">
                <img src="Annexes/Images/famille.jpeg" alt="image d'une famille avec un chien" width="400" />
            </div>
            <div id="texte2">
                <h3><a href="Annexes/Pages/Tout savoir sur l'adoption.php">Tout savoir sur l'adoption</a></h3>
                <p>L'adoption d'un chien est une démarche responsable ayant murement était réfléchie dans un climat d'affection pour favoriser son intégration à la famille, car oui un animal de compagnie est un nouveau membre de la famille. Il est aussi indispensable de répondre à tous ses besoins et à ses soins qui peuvent être inattendu et onéreux. </p>
            </div>
        </div>
    </div>
    <?php include("Annexes/PHP/footer_index.php"); ?>
</body>

</HTML>
