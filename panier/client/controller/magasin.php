<?php
function getDataBase()
{
    $host = "localhost";
    $dbName = "web_avance";
    $port = "3307";
    $login = "root";
    $password = "";
    try
    {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName .';port='.$port. ';charset=utf8', $login, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());

    }
    return $bdd;
}

function getMagasin($bdd)
{
// On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query('SELECT * FROM  stores');

// On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) {
        $donnees{"stor_name"};
    }
}