<!DOCTYPE html>
<html>
<head>
    <title>Edition d'un éditeur</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require ($INC_DIR. "/html/header.inc.html");
    ?>
</head>

<body>
<div id="wrapper">
    <div id="page-wrapper">

        <h2>Non autorisé</h2>

        <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
        <?php
        if (isset($_SESSION["roleUser"])) {
            echo "<a href='/share/controller/logout.php'>Déconnexion</a>";
        } else {
            echo "<a href='/share/controller/login.php'>Connexion</a>";
        }
        ?>

    </div>
</div>
</body>
</html>