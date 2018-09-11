<?php
// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// Le contrôleur
// On regarde comment a été appellé la page
$pub_id = -1;
$publisher = null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $pub_id = htmlspecialchars($_GET['id']);
    // L'id doit être une valeur numérique
    if (is_numeric($pub_id)) {
        addPublisherToCart($pub_id);
    }
}

// Redirection vers la page principale
header("Location: listeediteur.php");
?>

