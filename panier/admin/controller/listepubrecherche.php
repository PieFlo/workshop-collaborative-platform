<?php
// On démarre les sessions
session_start();
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];

// Si l'utilisateur n'est pas connecté ou s'il n'est pas admin alors on l'envoir vers la page erreur
if (! isset($_SESSION["roleUser"]) || $_SESSION["roleUser"] != 100) {
    // La vue
    require ($INC_DIR. "/share/view/unauthorized.php");
    exit;
}


// Le modèle
require ($INC_DIR. "/model/publisher.php");

// Le contrôleur

$nom = "";
$state = "";
// Obtention des variables POST du formulaire de recherche
if (isset($_POST["cbState"])) {
    $nom = htmlspecialchars($_POST["nom"]);
    $state = htmlspecialchars($_POST["cbState"]);
}

// Obtention de la liste
$publishers = getPublishers($nom, $state);

// La view
require ($INC_DIR. "/admin/view/publishers.php");
