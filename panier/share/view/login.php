<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    include_once ($INC_DIR. "/html/header.inc.html");
    ?>
</head>

<body>
<h2>Connexion</h2>

<?php
// l'utlisateteur vient-il de la page "connect.php" ?
if (isset($error) && $error == 1) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        L'identifiant ou le mot de passe est incorrect.
    </div>
    <?php
}
?>

<form action="/share/controller/login.php" method="POST">
    <div class="form-group">
        <label for="login">Nom </label>
        <input type="text" class="form-control" name="login" placeholder="Entrez votre login"  />
    </div>
    <label for="password">Mot de passe </label>
    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe"  />
    </div>

    <br />
    <input type="submit" value="Connecter" class="btn btn-primary" />


    <input type="hidden", name="redirect" value="<?= (isset($redirection) ? $redirection : "") ?>" />
</form>