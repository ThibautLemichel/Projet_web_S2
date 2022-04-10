<?php
    session_start();
?>


<!DOCTYPE html>
<link rel="stylesheet" href="Annexes/CSS/ProjetChien.css" />
<link rel="stylesheet" href="Annexes/CSS/Acceuil.css" />
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
                <li><a href="Annexes/HTML/Contact.html">Contactez-nous</a></li>  <!--grandes pages-->
            </ul>
        </nav>  <!--Ici finit le menu en haut de la page-->
        
    </div>

    <div id="main">
        <div id="Titre">
            <div class="Titre">
                <h1>Bienvenue </h1>
            </div>
        </div>
        <?php
        if (!isset($_SESSION['login'])){
        ?>
        <form action="" method="post">
            <fieldset>
                <legend>Formulaire d'authentification</legend>
                <label>Email :</label>
                <input type="text" name="email" placeholder="Entrez votre adresse mail" required>
                <label>Password :</label>
                <input type="text" name="passwd"  placeholder="Entrez votre mot de passe" required>
                <input type="submit" name="Envoyer" value="Envoyer"/>
            </fieldset>
        </form>
        <?php
         }
         if(isset($_POST['email']) && isset($_POST['passwd'])){
			$email = $_POST['email'];
			$mdp = $_POST['passwd'];
            
            //include('Annexes/PHP/connexion.php');
            include('Annexes/PHP/connexion.php');
            
            $requete_email = "SELECT Email WHERE Email = $email";
            $requete_mdp = "SELECT MotDePasse WHERE Email = $email";
            $resultat_email = mysqli_query($connexion, $resultat_email);
            $resultat_mdp = mysqli_query($connexion, $resultat_mdp);
            
            if ($resultat_email == 1){
                echo "Mail valide<br>";
            }else{
                echo "Mail pas valide<br>";
            }
            if ($resultat_mdp == 1){
                echo "MdP valide<br>";
            }else{
                echo "MdP pas valide<br>";
            }
			 
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
