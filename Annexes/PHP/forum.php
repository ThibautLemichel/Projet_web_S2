<?php session_start(); ?>

<!DOCTYPE html>
<link rel="stylesheet" href="../CSS/ProjetChien.css" />
<link rel="stylesheet" href="../CSS/forum.css"/>
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
        <img id="logo" src="../Images/LogoChien1.jpg" alt="Notre super logo" />
        <p><a href="../../Index.php">Les toutous</a></p>
        <nav> <!--Ici commence le menu en haut de la page-->
            <ul>
                <li class="menu-deroulant">
                    <a href="../HTML/Trouvez un chien.html">Trouvez votre chien</a>  <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="../HTML/Races.html">Races</a></li>    <!--sous-pages des grandes pages-->
                        <li><a href="../HTML/Refuges.html">Refuges</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                    <a href="../HTML/Tout savoir sur l'adoption.html">Tout savoir sur l'adoption</a> <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="../HTML/Comment bien se préparer.html">Comment bien se preparer à l'arrivée</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="../HTML/Pourquoi prendre un chiot.html">Pourquoi prendre un chiot</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="../HTML/Les premiers jours de son arrivée.html">Les premiers jours de son arrivée</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                <a href="">Notre communauté</a>
                    <ul class="sous-menu">
                        <li><a href="../HTML/Contact.html">Contactez-nous</a></li>  <!--grandes pages-->
                        <li><a href="../PHP/forum.php">Nos forums</a></li>
                    </ul>
                </li>
            </ul>
        </nav>  <!--Ici finit le menu en haut de la page-->
    </div>
    <h1>Nos forums</h1>
    
    <?php
    include("connexion.php");
                    
    $requete_limite = 'SELECT MAX(Indice) AS Maximum FROM forum';
	$resultat_limite = mysqli_query($connexion, $requete_limite);
                
	if ( $resultat_limite == FALSE ){
    	echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
		die();
	}      
    $limite = mysqli_fetch_assoc($resultat_limite);
    $limite = (int)$limite['Maximum']; 


    for ($i = 1; $i <= $limite; $i++){ // Affiche tous les forums
        echo "<div>";
            echo "<table>";
                echo "<tbody>";
                    echo "<tr>";
                        $requete = "SELECT Sujet FROM forum  WHERE Indice = '{$i}'";
                        $resultat = mysqli_query($connexion, $requete);

                        if ( $resultat == FALSE ){
                        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                        die();
                        }
                        $forum = mysqli_fetch_assoc($resultat);
                        if (isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
                            echo "<tr>";
                                echo "<td colspan='2' class='supprimer'><a href='supprimer_sujet.php?Sujet=$forum[Sujet]'>Supprimer le sujet</a></td>";
                            echo "</tr>";
                        }
                        echo "<td colspan='2' class='Sujet'>$forum[Sujet]</td>";
                    echo "</tr>";
                        $requete = "SELECT Sujet, Pseudo, `Date`, `Message` FROM `forum` WHERE Indice = '{$i}' ORDER BY `Date` ASC";
                        $resultat = mysqli_query($connexion, $requete);
                    
                        if ( $resultat == FALSE ){
                        echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
                        die();
                        }
                        foreach ($resultat as $forum) {
                            echo "<tr>";
                            if (isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1){
                                echo "<tr>";
                                    echo "<td colspan='2' class='supprimer'><a href='supprimer_message.php?Message=$forum[Message]'>Supprimer le message</a></td>";
                                echo "</tr>";
                            }
                                echo "<td class='Pseudo' >$forum[Pseudo]</td>";
                                echo "<td class='Date'>$forum[Date]</td>";
                            echo "</tr>";
                            echo "<tr>";
                                echo "<td colspan='2' class='Message'>$forum[Message]</td>";
                            echo "</tr>";
                        }
                        if (isset($_SESSION['Pseudo'])){
                            echo "<tr>";
                                echo "<form action='ajout_message.php' method='POST'>";
                                echo "<td colspan='2'><textarea name='message' placeholder='Votre message...'></textarea></td>";
                                echo "<input type='hidden' name='indice' value='$i'>";
                                echo "<input type='hidden' name='sujet' value='$forum[Sujet]'>";

                            echo "</tr>";
                            echo "<tr>";
                                echo "<td colspan='2'><button>Envoyer</button></td>";
                                echo "</form>";
                            echo "</tr>";
                        }else{
                            echo "<tr>";
                                echo "<td colspan='2' style=text-align:center>Connectez-vous pour pouvoir ajouter une message.</td>";
                            echo "</tr>";
                        }


                echo "</tbody>";
            echo "</table>";
        echo "</div>";
    }
    if (isset($_SESSION['Pseudo'])){
        echo "<div class='ajout_sujet'>";
            echo "<form method='POST' action='ajout_sujet.php'>";
                echo "<h3>Vous voulez créer un nouveau sujet ?</h3>";
                echo "<p></p>";
                echo "<input type='hidden' name='indice' value='($i)'>";
                echo "<input type='text' placeholder='Nom du sujet...' name='sujet'></input>";
                echo "<td colspan='2'><textarea name='message' placeholder='Votre message'></textarea></td>";
                echo "<td colspan='2'><button>Envoyer</button></td>";
            echo "</form>";
        echo "</div>";
    }else{
        echo "<div class='ajout_sujet'>";
            echo "<h4 style=text-align:center>Connectez-vous pour pouvoir créer un sujet.</h4>";
        echo "</div>";
    }  
    ?>

    <div class="footer">
        <div class="liste1">
            <ul>
                <li>
                    <a href="../HTML/Trouvez un chien.html">Trouvez votre chien</a>
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
                        <li><a href="../HTML/Comment bien se préparer.html">Comment bien se preparer à l'arrivée</a></li>
                        <li><a href="../HTML/Pourquoi prendre un chiot.html">Pourquoi prendre un chiot</a></li>
                        <li><a href="../HTML/Les premiers jours de son arrivée.html">Les premiers jours de son arrivée</a></li>
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
            <a href="https://www.instagram.com/?hl=fr"><img src="../Images/instagram.png" alt="icone instagram" /></a>
            <a href="https://twitter.com/?lang=fr"><img src="../Images/twitter.png" alt="icone twitter" /></a>
            <a href="https://fr-fr.facebook.com/"><img src="../Images/facebook.png" alt="icone facebook" /></a>
        </div>
    </div>
</body>
</HTML>
