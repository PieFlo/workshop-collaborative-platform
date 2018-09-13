<?php
//protection pour le backoffice
session_start();

include("../functions.php");

$bdd = getDatabase();
var_dump($_SESSION);
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

if((isset($_POST['nom'])) and (isset($_POST['email'])) and (isset($_POST['arrive'])) and (isset($_POST['depart'])) AND (isset($_POST['campus']))  AND (isset($_SESSION['mdp']))) {

    $mdp = $_SESSION['mdp'];
    $pass = sha1($mdp);


    $req = $bdd->prepare('INSERT INTO foodtruck (nom, email, arrive, depart, campus , mdp ) VALUES( :nom, :email, :arrive, :depart, :campus , :mdp)');

    $req->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $req->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $req->bindValue(':arrive', $_POST['arrive'], PDO::PARAM_STR);
    $req->bindValue(':depart', $_POST['depart'], PDO::PARAM_STR);
    $req->bindValue(':campus', $_POST['campus'], PDO::PARAM_STR);
    $req->bindValue(':mdp', $pass, PDO::PARAM_STR);

    if ($req->execute()){
        echo 'Enregistrement reussi';
        $_SESSION["nom"] = $_POST['nom'];
        $_SESSION["mdp"] = $pass;

        $reponse = $bdd->prepare("SELECT idTruck FROM foodtruck WHERE nom = ? and mdp = ?");
        $reponse->execute([$_SESSION['nom'] , $_SESSION['mdp']]);
        $arr = $reponse->fetch();
        if($arr){
            $_SESSION['idTruck']=$arr['idTruck'];
        }
        $reponse = null;


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
var_dump($_SESSION['idTruck']);
?>