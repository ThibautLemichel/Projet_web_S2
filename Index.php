<!DOCTYPE html>
<link rel="stylesheet" href="Annexes/CSS/Header.css" />
<link rel="stylesheet" href="Annexes/CSS/Acceuil.css" />
<link rel="stylesheet" href="Annexes/CSS/login.css" />
<link rel="stylesheet" href="Annexes/CSS/header_login.css" />

<html lang="fr-fr">

<head>
    <meta charset="utf-8" />
    <title>Projet chien</title>
    <meta name="description" content="Trouve le chien de tes rêves" />
    <meta name="keywords" content="chien, toutou, animaux de compagnies, meilleur ami de l'homme, meilleur ami de la femme" />
    <meta name="author" content=" Enzo Sergiani Thibaut Lemichel Hippolyte Deparis" />
</head>

<body>
    <?php include('Annexes/PHP/header_index.php'); ?>
    <div id="main">
        <?php
        if (!isset($_SESSION['Pseudo'])) {
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
                                <input type="text" name="passwd" placeholder="Mot de passe" required>
                                </br>
                                <input type="submit" name="Envoyer" value="Connecter" class="bouton_login" />
                                
                            </fieldset>
                        </form>
                        <a href='Annexes/PHP/creation_compte.php'><button id="button_creation_compte">Créer un compte</button></a>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
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