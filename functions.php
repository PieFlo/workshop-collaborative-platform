<?php
/**
 * Created by PhpStorm.
 * User: Caio
 * Date: 11-Sep-18
 * Time: 10:34 AM
 */
    function getDataBase()
    {
        $host = "localhost";
        $dbName = "workshop2";
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