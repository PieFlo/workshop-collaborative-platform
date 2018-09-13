<?php
include("./functions.php");
$bdd = getdatabase();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['id'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modifier le plat</title>
    </head>
    <body>
    <form name="form" method="post" action="">
        <p><input type="text" name="nom" placeholder="Intitulé de la recette"></p>
        <p><input type="text" name="prix" placeholder="Ingrédients"></p>
        <p><input type="text" name="imagePlat" placeholder="Étapes essentielles"></p>
        <p><input type="number" name="quantite" placeholder="Image"></p>
        <p><input type="time" name="regime" placeholder="Temps de préparation"></p>
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
                              WHERE idPlat =" . $_GET["id"]);

        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
        $req->bindValue(':imagePlat', $_POST['imagePlat'], PDO::PARAM_STR);
        $req->bindValue(':quantite', $_POST['quantite'], PDO::PARAM_INT);
        $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
        $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);

        $req->execute();

        $req->closeCursor();
    }
}
?>



