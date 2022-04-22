<?php
    session_start();
?>


<!DOCTYPE html>

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
    <div id="header">
            <img id="logo" src="Annexes/Images/LogoChien1.jpg" alt="Notre super logo" />
        <p><a href="Annexes/HTML/index.html">Les toutous</a></p>
        <nav> <!--Ici commence le menu en haut de la page-->
            <ul>
                <li class="menu-deroulant">
                    <a href="Annexes/HTML/Trouvez un chien.html">Trouvez votre chien</a>  <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="Annexes/HTML/Races.html">Races</a></li>    <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/HTML/Refuges.html">Refuges</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                    <a href="../HTML/Tout savoir sur l'adoption.html">Tout savoir sur l'adoption</a> <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="Annexes/HTML/Comment bien se préparer.html">Comment bien se preparer à l'arrivée</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/HTML/Pourquoi prendre un chiot.html">Pourquoi prendre un chiot</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/HTML/Les premiers jours de son arrivée.html">Les premiers jours de son arrivée</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                <a href="">Notre communauté</a>
                    <ul class="sous-menu">
                        <li><a href="Annexes/HTML/Contact.html">Contactez-nous</a></li>  <!--grandes pages-->
                        <li><a href="Annexes/PHP/forum.php">Nos forums</a></li>
                    </ul>
                </li>
            </ul>
        </nav>  <!--Ici finit le menu en haut de la page-->
        
    </div>

    <div id="main">
        <?php
        if (!isset($_SESSION['Pseudo'])){
        ?>
        <div id="Titre">
            <div class="Titre">
                <h1>Bienvenue</h1>
            </div>
        </div>
        <form action="Annexes/PHP/test_connexion.php" method="post" class="login">
            <fieldset> 
                <input type="text" name="email" placeholder="Adresse mail" required>
                </br>
                <input type="text" name="passwd"  placeholder="Mot de passe" required>
                </br>
                <input type="submit" name="Envoyer" value="Connecter" class="bouton_login"/>
            </fieldset>
        </form>
        <div class='creation_compte'>
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
                <h3><a href="Annexes/HTML/Trouvez un chien.html">Trouver un chien</a></h3>
                <p>Il y a bien entendu beaucoup de façon d'en trouver un, tout d'abord se présente à vous le choix entre un chiot ou un chien adultes, et par la suite viendra le choix du mode d'adoption, que ce soit en refuge, chez un éleveur, ou chez une personne ne pouvant plus s'occuper de son animal.</p>
            </div>
            <div id="image2">
                <img src="Annexes/Images/famille.jpeg" alt="image d'une famille avec un chien" width="400" />
            </div>
            <div id="texte2">
                <h3><a href="Annexes/HTML/Tout savoir sur l'adoption.html">Tout savoir sur l'adoption</a></h3>
                <p>L'adoption d'un chien est une démarche responsable ayant murement était réfléchie dans un climat d'affection pour favoriser son intégration à la famille, car oui un animal de compagnie est un nouveau membre de la famille. Il est aussi indispensable de répondre à tous ses besoins et à ses soins qui peuvent être inattendu et onéreux. </p>
            </div>
        </div>
    </div>
    

    <div class="footer">
        <div class="liste1">
            <ul>
                <li>
                    <a href="Annexes/HTML/Trouvez un chien.html">Trouvez votre chien</a>
                    <ul>
                        <li><a href="Annexes/HTML/Races.html">Races</a></li>
                        <li><a href="Annexes/HTML/Refuges.html">Refuges</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="liste2">
            <ul>
                <li>
                    <a href="../HTML/Tout savoir sur l'adoption.html">Tout savoir sur l'adoption</a>
                    <ul>
                        <li><a href="Annexes/HTML/Comment bien se préparer.html">Comment bien se preparer à l'arrivée</a></li>
                        <li><a href="Annexes/HTML/Pourquoi prendre un chiot.html">Pourquoi prendre un chiot</a></li>
                        <li><a href="Annexes/HTML/Les premiers jours de son arrivée.html">Les premiers jours de son arrivée</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="liste3">
            <ul>
                <li><a href="Annexes/HTML/Contact.html">Contactez-nous</a></li>
            </ul>
        </div>
        <div class="social">
            <a href="https://www.instagram.com/?hl=fr"><img src="Annexes/Images/instagram.png" alt="icone instagram" /></a>
            <a href="https://twitter.com/?lang=fr"><img src="Annexes/Images/twitter.png" alt="icone twitter" /></a>
            <a href="https://fr-fr.facebook.com/"><img src="Annexes/Images/facebook.png" alt="icone facebook" /></a>
        </div>
    </div>
</body>

</HTML>
