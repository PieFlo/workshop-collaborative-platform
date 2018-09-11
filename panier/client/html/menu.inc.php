<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Accueil</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/client/controller/listeediteur.php">Liste des éditeurs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                $nbCommands = 0;
                if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
                    $nbCommands = getNbCommandes($_SESSION["loginUser"]);
                    ?>
                    <li><a href='/client/controller/showcmd.php'><i class="fa fa-list" aria-hidden="true"></i>&nbsp;Commandes effectuées
                            <span class="badge"><?= $nbCommands ?></span>
                        </a>
                    </li>
                <?php
                }

                ?>
                <li><a href='/client/controller/showcart.php'><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Panier
                        <span id="nbCartItems" class="badge">0</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
                    echo "<li><a href='/share/controller/logout.php'><span class='glyphicon glyphicon-off'></span>&nbsp;Déconnexion</a></li>";
                }
                else {
                    echo "<li><a href='/share/controller/login.php'>Connexion</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
