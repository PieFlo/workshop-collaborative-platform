<?php
include("../functions.php");
$objetPdo = getdatabase();
var_dump($_POST);
if ((!empty($_POST['nom']))
    AND (!empty($_POST['prix']))
    AND (!empty($_POST['regime']))
    AND (!empty($_POST['idPlat']))
    AND (!empty($_POST['allergies'])
    )) {
$bdd = $objetPdo->prepare('UPDATE plat set nom=:nom, prix=:prenom, regime=:regime, allergies=:allergies
WHERE idPlat = :idPlat');
//LIMIT raison de sécu pour enlever qu'une ligne par une ligne si jamais on aurait oublié WHERE
$executeIsOk=$bdd->execute(array(":idPlat" => $_POST['idPlat'], ":nom" => $_POST['nom'], ":prix" => $_POST['prix'], ":regime" => $_POST['regime'], ":allergies" => $_POST['allergies']));

//on associe les paramètres nommés à une valeur
//$bdd->bindValue(':idPlat', $_POST['idPlat'], PDO::PARAM_INT);
//$bdd->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
//$bdd->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
//$bdd->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
//$bdd->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);


//exécution de la requête
//$executeIsOk = $bdd->execute();

}
else{
echo "Erreur";
}

?>