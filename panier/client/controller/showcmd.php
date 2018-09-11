<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// Le contrôleur

// Obtention de la liste
$commandes = null;

if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
    $commandes = getCommandes($_SESSION["loginUser"]);
}

// La vue
require ($INC_DIR. "/client/view/commandes.php");
