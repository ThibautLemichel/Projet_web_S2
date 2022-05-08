<?php session_start() ?>
<div id="header">
    <div class="topheader">
        <div>
            <img id="logo" src="Annexes/Images/LogoChien1.jpg" alt="Notre super logo" />
        </div>
        <div>
            <p><a href="index.php">Les toutous</a></p>
        </div>
        <?php
        if (!isset($_SESSION['Pseudo'])) {
        ?>
        <div class="toppopup">
                <div class="topbox">
                    <a href="#toppopup1" class="topbutton">Se connecter</a>
                </div>
                <div id="toppopup1" class="toppopupp">
                    <div class="toppopup1">
                        <h2>Se connecter</h2>
                        <a href="#" class="topcross">&times;</a>
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
            <?php
        } else {
            echo "<a href='Annexes/PHP/deconnexion.php' class='deconnexion1'><button id='button_deconnexion'>Déconnexion</button></a>";}
        ?>
        </div>
        <nav> <!--Ici commence le menu en haut de la page-->
            <ul>
                <li class="menu-deroulant">
                    <a href="Annexes/Pages/Trouvez un chien.php">Trouvez votre chien</a>  <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="Annexes/Pages/Races.php">Races</a></li>    <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/Pages/Refuges.php">Refuges</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                    <a href="Annexes/Pages/Tout savoir sur l'adoption.php">Tout savoir sur l'adoption</a> <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="Annexes/Pages/Comment bien se préparer.php">Comment bien se preparer à l'arrivée</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/Pages/Pourquoi prendre un chiot.php">Pourquoi prendre un chiot</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="Annexes/Pages/Les premiers jours de son arrivée.php">Les premiers jours de son arrivée</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                <a href="#">Notre communauté</a>
                    <ul class="sous-menu">
                        <li><a href="Annexes/Pages/Contact.php">Contactez-nous</a></li>  <!--grandes pages-->
                        <li><a href="Annexes/Pages/forum.php">Nos forums</a></li>
                        <?php if (isset($_SESSION['Pseudo'])){ ?>
                        <li><a href="Annexes/Pages/informations.php">Information à modifier</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>  <!--Ici fin du menu en haut de la page-->
        
</div>