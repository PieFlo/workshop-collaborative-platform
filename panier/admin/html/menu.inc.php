<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Accueil</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/admin/controller/listepubrecherche.php">Liste des éditeurs</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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
