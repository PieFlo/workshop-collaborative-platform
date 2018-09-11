<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// Le contrôleur
$message = '';

if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
    // Obtention de la bd
    $bdd = getDataBase();

    // Obtention de la liste
    $carts = getCart();
    if ($carts) {
        // On enregistre la commande
        $newId = insertCommand($_SESSION["loginUser"], $bdd);
        if ($newId == 0) {
            $message = "La commande n'a pas pu être créé";
        } else {
            $items = $carts->getItems();
            // On enregistre chaque élément dans la BD
            foreach ($items as $item) {
                insertCommandDetail($newId, $item->getId(), $item->getQuantity(), $bdd);
            }
            // on envoie le mail: A FAIRE !!
            /// TODO
            // On vide la commande dans la session
            clearCart();
        }
    }
    // La vue
    header("Location: /client/controller/listeediteur.php");
} else {
    // On redirige vers la connexion
    // La vue
    $redirection="http://". $_SERVER['SERVER_NAME'] ."/client/controller/cartvalidate.php";
    require ($INC_DIR. "/share/view/login.php");
}

