<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/client/class/Cart.php");
require ($INC_DIR. "/model/publisher.php");


// On démarre les sessions
session_start();

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
require ($INC_DIR. "/client/view/publishers.php");