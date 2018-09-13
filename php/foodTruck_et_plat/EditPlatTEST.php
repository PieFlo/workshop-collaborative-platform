<?php
include("../functions.php");
$bdd = getdatabase();
session_start();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['idPlat'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modifier le plat</title>
    </head>
    <body>
    <form name="form" method="post" action="">
        <p><input type="text" name="nom" placeholder="nom plat"></p>
        <p><input type="number" name="prix" placeholder="Prix"></p>
        <p><input type="text" name="imagePlat" placeholder="Image plate"></p>
        <p><input type="number" name="quantite" placeholder="quantite"></p>
        <p><input type="text" name="regime" placeholder="Regime"></p>
        <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
        <p><input name="submit" type="submit" value="Modifier"/></p>
    </form>
    </body>
    </html>
    <?php
    if ((!empty($_POST['nom']))
        AND (!empty($_POST['prix']))
        AND (!empty($_POST['imagePlat']))
        AND (!empty($_POST['quantite']))
        AND (!empty($_POST['regime']))
        AND (!empty($_POST['allergies']))) {

        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $imagePlat = $_POST['imagePlat'];
        $quantite = $_POST['quantite'];
        $regime = $_POST['regime'];
        $allergies = $_POST['allergies'];

        $req = $bdd->prepare("UPDATE plat 
                              SET nom = '$nom',
                                  prix = '$prix',
                                  imagePlat = '$imagePlat',
                                  quantite = '$quantite',
                                  regime = '$regime',
                                  allergies = '$allergies' 
                              WHERE idPlat =" . $_GET["idPlat"]);

        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':prix', $_POST['prix'], PDO::PARAM_INT);
        $req->bindValue(':imagePlat', $_POST['imagePlat'], PDO::PARAM_STR);
        $req->bindValue(':quantite', $_POST['quantite'], PDO::PARAM_INT);
        $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
        $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);

        $req->execute();

        $req->closeCursor();
    }
}
?>



