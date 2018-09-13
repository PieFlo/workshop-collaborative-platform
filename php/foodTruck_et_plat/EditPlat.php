<?php
include("../functions.php");
$objetPdo = getdatabase();
session_start();
if (!isset($_SESSION['nom']) and !isset($_SESSION['mdp']) and !isset($_SESSION['idTruck'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../index.php");
    exit;

}
if (isset($_GET['idPlat'])) {
    var_dump($_POST);
    var_dump($_GET);
    $idPlat = $_GET['idPlat'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Modifier sa re7</title>
    </head>
    <body>
    <form name="form" method="post" action="EditAction.php">
        <p><input type="text" name="nom" placeholder="Intitulé de la recette"></p>
        <p><input type="text" name="prix" placeholder="prix"></p>
        <p><input type="text" name="regime" placeholder="Regime spécifique"></p>
        <p><input type="text" name="allergies" placeholder="Allergies spécifique"></p>
        <p><input type="hidden" name='idPlat' value="<? echo $_GET["idPlat"]; ?>"></p>
        <p><input name="submit" type="submit" value="Modifier"/></p>
    </form>
    </body>
    </html>
<?php
  //  var_dump($_POST);
  //  if ((!empty($_POST['nom']))
   //     AND (!empty($_POST['prix']))
    //    AND (!empty($_POST['regime']))
    //    AND (!empty($_POST['allergies']))) {
        /*$nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $regime = $_POST['regime'];
        $allergies = $_POST['allergies'];

        $req = $bdd->prepare("UPDATE plat 
                              SET nom = :nom,
                                  prix = :prix,
                                  regime = :regime,
                                  allergies = :allergies,
                              WHERE idPlat =".$_GET['idPlat']);

        //$req->execute(array('nom' => $nom , 'prix' => $prix , 'regime' => $regime , 'allergies' => $allergies));

        $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $req->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
        $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
        $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);

        $req->$execute();

        $req->closeCursor();*/

       // $bdd = $objetPdo->prepare('UPDATE plat set nom=:nom, prix=:prenom, regime=:regime, allergies=:allergies
//WHERE idEtudiant=:num LIMIT 1');
//LIMIT raison de sécu pour enlever qu'une ligne par une ligne si jamais on aurait oublié WHERE


//on associe les paramètres nommés à une valeur
       // $bdd->bindValue(':num', $_GET['idPlat'], PDO::PARAM_INT);
      //  $bdd->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
      //  $bdd->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
       // $bdd->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
      //  $bdd->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);


//exécution de la requête
     //   $executeIsOk = $bdd->execute();

    }
  //  else{
      //  echo "Erreur";
 //   }
//}
    ?>




