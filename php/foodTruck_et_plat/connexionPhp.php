<?php
session_start();



include("../functions.php");

$bdd = getDataBase();

    if (isset($_POST['nom']) AND isset($_POST['mdp']))
    {



        // Vérification des identifiants


        $req = $bdd->prepare('SELECT idTruck , nom , mdp  FROM foodtruck WHERE mdp = :mdp AND nom = :nom');
        $req->execute(array(
            'nom' => $_POST['nom'],
            'mdp' => $_POST['mdp']));

        $resultat = $req->fetch();


        if (!$resultat)
        {
            $_SESSION["pasConnecter"] = 1;
            header ("Location: connexionFoodTruck.php");
        }
        else
        {
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['idTruck']=$resultat['idTruck'];
            $_SESSION['mdp']=$resultat['mdp'];
            header("Location: DisplayPlat.php");
            exit();
        }
    }

    else

    {
        header("Location: connexionFoodTruck.php");
        exit();



}



?>