
<html>
<body>

<h1>Ajouter une bonne adresse</h1>
<form name="form" method="post" action="">
    <p><input type="text" name="nom" placeholder="Intitulé du lieu"></p>
    <p><input type="text" name="address" placeholder="Adresse"></p>
    <p><input type="text" name="description" placeholder="Description"></p>
    <p><input type="text" name="siteWeb" placeholder="Site web"></p>
    <p><input type="text" name="regime" placeholder="Regime spécifique"></p>
    <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
    <p><input type="number" name="budget" placeholder="Budget"></p>
    <p><input name="submit" type="submit" value="Ajouter"/></p>
</form>
</body>
</html>

<?php
//protection pour le backoffice
/*session_start();
if (!isset($_SESSION['idAdmin'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../login/formAdmin.php");
    exit;
}*/
include("./functions.php");

$bdd = getDatabase();

if((isset($_POST['nom']))
    and (isset($_POST['address']))
    and (isset($_POST['description']))
    and (isset($_POST['siteWeb']))
    and (isset($_POST['regime']))
    and (isset($_POST['allergies']))
    and (isset($_POST['budget']))){


    $req = $bdd->prepare('INSERT INTO bonneaddresse ( nom, address, description, siteWeb, regime, allergies, budget) 
                                  VALUES(:nom, :address, :description, :siteWeb, :regime, :allergies, :budget)');

    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
    $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $req->bindValue(':siteWeb', $_POST['siteWeb'], PDO::PARAM_STR);
    $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
    $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);
    $req->bindValue(':budget', $_POST['budget'], PDO::PARAM_INT);

    if ($req->execute()) {

        echo 'Enregistrement réussi';

    } else {

        echo 'Veuillez remplir tous les champs';

    }
    $req->closeCursor();
    header('Location: DisplayBonneAdresse.php');
}
?>