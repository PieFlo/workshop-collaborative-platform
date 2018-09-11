<?php
function getDataBase()
{
    $host = "localhost";
    $dbName = "publishers";
    $port = "3307";
    $login = "root";
    $password = "";
    try {
        $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';port=' . $port . ';charset=utf8', $login, $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        $bdd = null;
        die('Erreur : ' . $e->getMessage());

    }
    return $bdd;
}
?>