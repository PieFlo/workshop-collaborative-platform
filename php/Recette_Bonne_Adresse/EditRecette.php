<?php
include("./functions.php");
$bdd = getdatabase();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['id'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modifier sa re7</title>
    </head>
    <body>
    <form name="form" method="post" action="">
        <p><input type="text" name="nom" placeholder="Intitulé de la recette"></p>
        <p><input type="text" name="ingredient" placeholder="Ingrédients"></p>
        <p><input type="text" name="steps" placeholder="Étapes essentielles"></p>
        <p><input type="text" name="imageRecette" placeholder="Image"></p>
        <p><input type="time" name="tempsPreparation" placeholder="Temps de préparation"></p>
        <p><input type="text" name="regime" placeholder="Regime spécifique"></p>
        <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
        <p><input type="number" name="budget" placeholder="Budget"></p>
        <p><input name="submit" type="submit" value="Modifier"/></p>
    </form>
    </body>
    </html>
    <?php
    if ((!empty($_POST['nom']))
        AND (!empty($_POST['ingredient']))
        AND (!empty($_POST['steps']))
        AND (!empty($_POST['imageRecette']))
        AND (!empty($_POST['tempsPreparation']))
        AND (!empty($_POST['regime']))
        AND (!empty($_POST['allergies']))
        AND (!empty($_POST['budget']))) {

        $nom = $_POST['nom'];
        $ingredient = $_POST['ingredient'];
        $steps = $_POST['steps'];
        $imageRecette = $_POST['imageRecette'];
        $tempsPreparation = $_POST['tempsPreparation'];
        $regime = $_POST['regime'];
        $allergies = $_POST['allergies'];
        $budget = $_POST['budget'];

        $req = $bdd->prepare("UPDATE recette 
                              SET nom = '$nom',
                                  ingredient = '$ingredient',
                                  steps = '$steps',
                                  imageRecette = '$imageRecette',
                                  tempsPreparation = '$tempsPreparation',
                                  regime = '$regime',
                                  allergies = '$allergies',
                                  budget = '$budget' 
                              WHERE idRecette =" . $_GET["id"]);

        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':ingredient', $_POST['ingredient'], PDO::PARAM_STR);
        $req->bindValue(':steps', $_POST['steps'], PDO::PARAM_STR);
        $req->bindValue(':imageRecette', $_POST['imageRecette'], PDO::PARAM_STR);
        $req->bindValue(':tempsPreparation', $_POST['tempsPreparation'], PDO::PARAM_INT);
        $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
        $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);
        $req->bindValue(':budget', $_POST['budget'], PDO::PARAM_INT);

        $req->execute();

        $req->closeCursor();
    }
}
?>



