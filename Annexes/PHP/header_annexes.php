<div id="header">
        <img id="logo" src="../Images/LogoChien1.jpg" alt="Notre super logo" />
        <p><a href="../../index.php">Les toutous</a></p>
        <?php
        if (!isset($_SESSION['Pseudo'])) {
        ?>
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
            <?php
        } else {
            echo "<a href='Annexes/PHP/deconnexion.php' class='deconnexion'><button id='button_creation_compte'>Déconnexion</button></a>";
        ?>
            <!--<div id="Titre">
                <div class="Titre">
                    <?php //echo "<h1>Bienvenue $_SESSION[Pseudo]</h1>" ?>
                </div>
            </div>-->
        <?php
        }
        ?>
        <nav>
            <!--Ici commence le menu en haut de la page-->
            <ul>
                <li class="menu-deroulant">
                    <a href="../Pages/Trouvez un chien.php">Trouvez votre chien</a>  <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="../Pages/Chiots.php">Chiots</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="../Pages/Races.php">Races</a></li>    <!--sous-pages des grandes pages-->
                        <li><a href="../Pages/Refuges.php">Refuges</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                    <a href="../Pages/Tout savoir sur l'adoption.php">Tout savoir sur l'adoption</a> <!--grandes pages-->
                    <ul class="sous-menu">
                        <li><a href="../Pages/Comment bien se préparer.php">Comment bien se preparer à l'arrivée</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="../Pages/Pourquoi prendre un chiot.php">Pourquoi prendre un chiot</a></li>  <!--sous-pages des grandes pages-->
                        <li><a href="../Pages/Les premiers jours de son arrivée.php">Les premiers jours de son arrivée</a></li>  <!--sous-pages des grandes pages-->
                    </ul>
                </li>
                <li class="menu-deroulant">
                <a href="">Notre communauté</a>
                    <ul class="sous-menu">
                        <li><a href="../Pages/Contact.php">Contactez-nous</a></li>  <!--grandes pages-->
                        <li><a href="../Pages/forum.php">Nos forums</a></li>
                    </ul>
                </li>
            </ul>
        </nav>  <!--Ici finit le menu en haut de la page-->
</div>