<html>
<body>

<h1>Ajouter une recette</h1>
<form name="form" method="post" action="" enctype="multipart/form-data">
    <p><input type="text" name="nom" placeholder="Intitulé de la recette"></p>
    <p><input type="text" name="ingredient" placeholder="Ingrédients"></p>
    <p><input type="text" name="steps" placeholder="Étapes essentielles"></p>
    <input type="file" name="imageRecette"/><br>
    <p><input type="time" name="tempsPreparation" placeholder="Temps de préparation"></p>
    <p><input type="text" name="regime" placeholder="Regime spécifique"></p>
    <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
    <p><input type="number" name="budget" placeholder="Budget"></p>
    <p><input name="submit" type="submit" value="Ajouter"/></p>
</form>
</body>
</html>

<?php
// UPLOAD FILE TO DIRECTORY
$name= $_FILES['imageRecette']['name'];

$tmp_name= $_FILES['imageRecette']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

// $description = $_POST['description'];

if (isset($name)) {

    $path= '../../images/';

    if (!empty($name)){
        if (move_uploaded_file($tmp_name, $path.$name)) {
            echo 'enregistré dans le dossier !<br>';

        }
    }
}
//protection pour le backoffice
/*session_start();
if (!isset($_SESSION['idAdmin'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../login/formAdmin.php");
    exit;
}*/
include("../functions.php");

$bdd = getDatabase();

if((isset($_POST['nom']))
    and (isset($_POST['ingredient']))
    and (isset($_POST['steps']))
    // and (isset($_POST['$name']))
    and (isset($_POST['tempsPreparation']))
    and (isset($_POST['regime']))
    and (isset($_POST['allergies']))
    and (isset($_POST['budget']))){

    $req = $bdd->prepare("INSERT INTO recette values ( NULL, :nom, :ingredient, :steps, :imageRecette, :tempsPreparation, :regime, :allergies, :budget,NULL, NULL)");

    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':ingredient', $_POST['ingredient'], PDO::PARAM_STR);
    $req->bindValue(':steps', $_POST['steps'], PDO::PARAM_STR);
    $req->bindParam(':imageRecette', $name, PDO::PARAM_STR);
    $req->bindValue(':tempsPreparation', $_POST['tempsPreparation'], PDO::PARAM_INT);
    $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
    $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);
    $req->bindValue(':budget', $_POST['budget'], PDO::PARAM_INT);

    if ($req->execute()) {

        echo 'Enregistrement réussi';

    } else {

        echo 'Veuillez remplir tous les champs';

    }
    $req->closeCursor();
    header('Location: DisplayRecette.php');
}
?>