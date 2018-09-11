<?php

function getDataBase()
{
    $host = "localhost";  
   $dbName = "workshop2";
   $login = "root";
   // $port = "";port ='.$port.';
   $password = "";

    try
    {
        // Création de l’objet $bdd de type Pdo avec affichage des erreurs
        $bdd = new PDO('mysql:host='.$host.';dbname='.$dbName.'; charset=utf8', $login, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());
    }
    
    // retourne l’objet de type Pdo
    return $bdd;
}

function genererMDP($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}
?>