<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP4 : web dynamique</title>
        <meta charset="utf-8" />
    </head>
<body>
    <?php
        include('connexion.php');
        $requete = 'SELECT * FROM utilisateurs';//La requere SQL
			$resultat = mysqli_query($connexion, $requete); //Executer la requete
			
			if ( $resultat == FALSE ){
				echo "<p>Erreur d'exécution de la requete :".mysqli_error($connexion)."</p>" ;
				die();
			}
			else {
				$nbreLignes = mysqli_num_rows($resultat); //Nombre de ligne du retour de la requete
				
				echo "Le Nombre des adhérents est : $nbreLignes <br>";
				
				//lire le tableau des resulats ligne par ligne
				
				if($nbreLignes>0){
                    echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>id</th>";
                                echo "<th>Nom</th>";
                                echo "<th>Prenom</th>";
                                echo "<th>Pseudo</th>";
                                echo "<th>Email</th>";
                                echo "<th>Mot de Passe</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";

                        while($UneLigne = $resultat->fetch_assoc()){
                            echo "<tr>";
                            foreach ($UneLigne as $key=>$value) {
                                    echo "<td>$UneLigne[$key]</td>";    
                            }
                        }        
                        echo "<tr>";
                        
                        echo "</tbody>";
                    echo "</table>";
                }
                else
                    echo "aucune ligne";
                
                mysqli_close($connexion);//Fermer la connexion
            }
		?>
</body>

</HTML>
