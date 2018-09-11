<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// L'utilsateur doit être connecté
if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
    if (isset($_GET) && isset($_GET['id'])) {
        $pub_id = htmlspecialchars($_GET['id']);
        // L'id doit être une valeur numérique
        if (is_numeric($pub_id)) {
            // Faut-il ajouter ou supprimer ?
            $add = true;
            if (isset($_GET['action']) && $_GET['action']=='remove')
                $add = false;

            // Modification panier
            if ($add) {
                // L'élément doit déjà être présent
                $_SESSION["cart"]->add($pub_id, 1);
            } else {
                $_SESSION["cart"]->remove($pub_id, 1);
            }
        }
    } else {
        // L'id n'est pas défini mais l'utilsiateur veut peut être vider le panier ?
        if (isset($_GET['action']) && $_GET['action']=='clear') {
            $_SESSION["cart"]->clear();
        }
    }
}

header("Location: showcart.php");

