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
    <?php include("../PHP/header_annexes.php") ?>
    <h1>Nos forums</h1>
    
    <?php
    include("../PHP/connexion.php");
                    
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
    <?php include("../PHP/footer_annexes.php") ?>
</body>
</HTML>
