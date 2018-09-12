<?php
include("./functions.php");
$bdd = getdatabase();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['id'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modifier la bonne addresse</title>
    </head>
    <body>
    <form name="form" method="post" action="">
        <p><input type="text" name="nom" placeholder="Intitulé du lieu"></p>
        <p><input type="text" name="address" placeholder="Adresse"></p>
        <p><input type="text" name="description" placeholder="Description"></p>
        <p><input type="text" name="siteWeb" placeholder="Site web"></p>
        <p><input type="text" name="regime" placeholder="Regime spécifique"></p>
        <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
        <p><input type="number" name="budget" placeholder="Budget"></p>
        <p><input name="submit" type="submit" value="Modifier"/></p>
    </form>
    </body>
    </html>
    <?php
    if ((!empty($_POST['nom']))
        AND (!empty($_POST['address']))
        AND (!empty($_POST['description']))
        AND (!empty($_POST['siteWeb']))
        AND (!empty($_POST['regime']))
        AND (!empty($_POST['allergies']))
        AND (!empty($_POST['budget']))) {

        $nom = $_POST['nom'];
        $address = $_POST['address'];
        $description = $_POST['description'];
        $siteWeb = $_POST['siteWeb'];
        $regime = $_POST['regime'];
        $allergies = $_POST['allergies'];
        $budget = $_POST['budget'];

        $req = $bdd->prepare("UPDATE bonneaddresse 
                              SET nom = '$nom',
                                  address = '$address',
                                  description = '$description',
                                  siteWeb = '$siteWeb',
                                  regime = '$regime',
                                  allergies = '$allergies',
                                  budget = '$budget' 
                              WHERE idBonAddresse =" . $_GET["id"]);

        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
        $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $req->bindValue(':siteWeb', $_POST['siteWeb'], PDO::PARAM_STR);
        $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
        $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);
        $req->bindValue(':budget', $_POST['budget'], PDO::PARAM_INT);

        $req->execute();

        $req->closeCursor();
    }
}
?>