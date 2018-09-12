<?php
//protection pour le backoffice
session_start();
include("../functions.php");

$bdd = getDatabase();
var_dump($_POST);
/*idTruck int not null auto_increment,
nom varchar(250),
email varchar(250),
logo varchar(250),
imageMenu varchar(250),
arrive time(0),
depart time(0),
campus varchar(250),
primary key(idTruck)*/

if((isset($_POST['nom'])) and (isset($_POST['prix'])) and (isset($_POST['quantite'])) and (isset($_POST['regime'])) AND (isset($_POST['allergies']))  AND (isset($_POST['idCamion']))) {


    $req = $bdd->prepare('INSERT INTO plat (nom, prix, quantite, regime, allergies , idCamion ) VALUES( :nom, :prix, :quantite, :regime, :allergies , :idCamion)');

    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':prix', $_POST['prix'], PDO::PARAM_STR);
    $req->bindValue(':quantite', $_POST['quantite'], PDO::PARAM_STR);
    $req->bindValue(':regime', $_POST['regime'], PDO::PARAM_STR);
    $req->bindValue(':allergies', $_POST['allergies'], PDO::PARAM_STR);
    $req->bindValue(':idCamion', $_POST['idCamion'], PDO::PARAM_INT);

    if ($req->execute()){
        echo 'Enregistrement reussi';
        $_SESSION["enregistrement"] = 1;
        var_dump($_SESSION);
        header('Location: insertPlatForm.php');
        /* $to = $_POST['email'];
         // Subject
         $subject = 'Inscription Biocash';
         $id = $_POST['email'];
         session_start();
         $mdp = $_SESSION['mdp'];
         // Message
         $msg = "Bonjour votre inscription chez Biocash a été validée, \n voici votre Identifiant client : ".$id."\n votre mot de passe : ".$mdp." ";

 // Function mail()
         mail($to, $subject, $msg);*/


    } else {
        echo 'Veuillez remplir tous les champs';
    }
    $req->closeCursor();
}
else{
    echo "ERREUR";
}



?>